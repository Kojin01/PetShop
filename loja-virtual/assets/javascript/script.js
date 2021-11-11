$(function(){
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
                url: include_path+"ajaxCarrinho.php",
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
})