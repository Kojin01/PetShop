<?php //4111111111111111
    include("../config.php");
    $metodos = new methods();
    if(isset($_POST['finalizar']) && $_POST['finalizar'] == "finalizarPagamento"){
        $data['token'] = TOKEN;
        $data['email'] = EMAIL;
        $data['notificationURL'] = "http://localhost/loja-virtual/paginas/retorno.php";
        $data['currency'] = "BRL";
        $data['reference'] = uniqid();
        $_SESSION['reference'] = $data['reference'];
        $index = 1;
        foreach ($_SESSION['carrinho'] as $key => $value) {
            //Para o pagseguro indenticiar os itens vai ficar tipo assim / itemId1 = 1 etc.
            $data["itemId$index"] = $index;
            // Vai ficar como nome do produto, com o index fica itemDescription1 = nomeProduto
            $data["itemDescription$index"] = $value['nomeProduto'];
            //Vai ficar como quantidade do produto, com o index fica itemQuantity1 = quantidade dos produto;
            $data["itemQuantity$index"] = $value['quantidadeProduto'];
            //Vai ficar com o preço dos produtos, com o index fica itemAmount1 = preço dos produtos
            $data["itemAmount$index"] = number_format($value['precoProduto'],2,'.','');
            // para somar todos os produtos e ser uma soma total a api do pagseguro faz por eles mesmos, assim fica mais facil <:
            $index++;
        }
        $xmlCode = $metodos->curl(URL_WS,$data);
        echo $xmlCode;
    }
    // inserir no banco de dados
    if(isset($_POST['inserir']) == 'inserir'){
        $total = 0;
        foreach ($_SESSION['carrinho'] as $key => $value) {
            $total = $value['precoProduto'] * $value['quantidadeProduto'];
            $sql = $metodos->connect()->prepare("INSERT INTO `tb_admin.pedidos` VALUES(null,?,?,?,?,?)");
            $sql->execute(array($_SESSION['reference'],$value['nomeProduto'],$total,$value['quantidadeProduto'],"pendente"));
        }
        session_destroy();
        echo "Finalizou a compra";
    }
?>