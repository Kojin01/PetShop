<?php 
    include("../config.php");
    $totalDeItens = new methods;
    $total = $totalDeItens->getTotalItens();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/style/style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet">
    <title>Finalizar pagamentos</title>
</head>
<base base="<?php echo INCLUDE_PATH;?>" />
<body>
    <header>
    <nav class="navBar">
           <ul>
                <li><a href="../">Home</a></li>
                <li><a href="carrinho.php">Carrinho (<span class="teste"><?php echo $total?></span>)</a></li>
           </ul>
        </nav>
        <div style="clear: both;"></div>
    </header>
    <div class="container">
    <div class="aviso-compra"></div>
        <table>
            <tr>
            <td>Produtos</td>
            <td>Quantidade</td>
            <td>Preço</td>
            </tr>
            <?php 
                if(isset($_SESSION['carrinho'])){
                    $total = 0;
                    foreach ($_SESSION['carrinho'] as $key => $value) {
                        $preco = $value['precoProduto'] * $value['quantidadeProduto'];
                        $total += $preco;
            ?>
            <tr>
                <td><?php echo $key?></td>
                <td><?php echo $value["quantidadeProduto"]?></td>
                <td><?php echo $preco?>$</td>
            </tr>
            <?php }}else{
                echo '<div class="aviso">Você não tem nada no carrinho!</div>';
            } ?>
        </table>
        <?php if(isset($_SESSION['carrinho'])){?>
        <div class="pagar">
            <div class="buttom-preco">Preço total das compras <span><?php echo $total?>$</span></div>
            <div class="buttom-pagar">
                <a class="pagarAgora" href="">Pagar agora</a>
            </div>
        </div>
        <div style="clear: both;"></div>
        <?php } ?>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="<?php echo URL?>pagseguro/api/v2/checkout/pagseguro.lightbox.js"></script>
    <script src="../assets/javaScript/contantes.js"></script>
    <script src="../assets/javaScript/script.js"></script>
</body>
</html>