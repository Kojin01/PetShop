$(function(){
    //chamando outra função.
    pagarPagamento();
    //Chamando a função.
    clickMenu();
    //Criando uma função cachamada clickMenu.
    function clickMenu(){
        //Se um usuario clicar em uma div com uma class "row" ele executa.
        $(".row").click(function(){
            //Usuário clicou na div, vai criar uma variavel com o valor de preço,
            //Dentro dessa div que o usuário clicou tem um elemento chamando preco ele vai receber o valor desse elemento.
            var preco = $(this).attr("preco");
            //Usuário clicou na div, vai criar uma variavel com o nome do produto,
            //Dentro dessa div que o usuário clicou tem um elemento chamando nomeProduto ele vai receber o valor desse elemento.
            var nomeProduto = $(this).attr("nomeProduto");
            $.ajax({
                url: include_path+"ajax/ajaxCarrinho.php",
                data:{precoProduto:preco,nomeProduto:nomeProduto},
                method:"post",
                dataType:"JSON",
            }).done(function(data){
                var carrinho = Object.values(data);
                var total = 0;
                for (let i = 0; i < carrinho.length; i++) {
                    total += carrinho[i]['quantidadeProduto']
                }
                //console.log(objets[0]['quantidadeProduto']);
                $(".quantidade").html(total);
            })
        })
    }
    function pagarPagamento(){
        $("a.pagarAgora").click(function(e){
            e.preventDefault();
            $.ajax({
                url:include_path+"ajax/finalizarPagamento.php",
                method:'post',
                data:{finalizar:"finalizarPagamento"},
            }).done(function(data){
                var isOpenLightBox = PagSeguroLightbox({
                    code:data,
                },{
                    success: function(transactionCode){
                        inserirPagamento();
                    },
                    abort: function(){
                        console.log("fechou a janela");
                    }
                });
            })
        })
    }
    function inserirPagamento(){
        $.ajax({
            url:include_path+"ajax/finalizarPagamento.php",
            data:{inserir:"inserir"},
            method:'post',
        }).done(function(data){
            $(".aviso-compra").html("Você acabou de compra em nossa loja, Suas compras foram inseridas em nosso banco de dados");
            $(".aviso-compra").fadeIn(2000,function(){
                $(".aviso-compra").fadeOut(1000*30);
            });
        })
    }
})