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
<body>
    <header>
    <nav class="navBar">
           <ul>
                <li><a href="../">Home</a></li>
                <li><a href="finalizar.php">Finalizar compras</a></li>
           </ul>
        </nav>
        <div style="clear: both;"></div>
    </header>
    <div class="container">
        <table>
            <tr>
            <td>Produtos</td>
            <td>Quantidade</td>
            <td>Preço</td>
            </tr>
            <?php 
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
            <?php }?>
        </table>
        <div class="pagar">
            <div class="buttom-preco">Preço total das compras <span><?php echo $total?>$</span></div>
        </div>
        <div style="clear: both;"></div>
    </div>
</body>
</html>