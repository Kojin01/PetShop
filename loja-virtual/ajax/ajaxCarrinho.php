<?php include("../config.php");
    $nomeProduto = $_POST['nomeProduto'];
    $precoProduto = $_POST['precoProduto'];

        //Verificando se existe a session carrinho caso for igual a false(Não existir) criar um como array.
        if(isset($_SESSION['carrinho']) == false){
             //criando asession carrinho como array.
            $_SESSION['carrinho'] = array(); 
        }
       /* 
        * Verificando se existe uma session com o nome 
        do produto dentor do carrinho se for igual a false(não existir) vai criar 
        um produto que vai ser um array e vai receber tres(3) parametros.
        *
        * Caso já exista ele so vai acrescentar a quantidade dentro da quantidadeProduto.
        */
        if(isset($_SESSION['carrinho'][$nomeProduto]) == false){
            $_SESSION['carrinho'][$nomeProduto] = array(
                    'nomeProduto' => $nomeProduto,
                    'precoProduto' => $precoProduto,
                    'quantidadeProduto' => 1,
            );
        }else{
            $_SESSION['carrinho'][$nomeProduto]['quantidadeProduto']++;
        }
        $data = $_SESSION['carrinho'];
        die(json_encode($data));
?>
