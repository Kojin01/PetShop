<?php 
    include("config.php");
    $totalDeItens = new methods;
    $total = $totalDeItens->getTotalItens();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/style/style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet">
    <title>PetShop</title>
</head>
<base base="<?php echo INCLUDE_PATH;?>" />
<body>
    <header>
        <nav class="navBar">
           <ul>
               <li><a href="paginas/carrinho.php">Carrinho (<span class="quantidade"><?php echo $total?></span>)</a></li>
               <li><a href="paginas/finalizar.php">Finalizar compras</a></li>
           </ul>
        </nav>
        <div style="clear: both;"></div>
    </header>
    <section class="banner">
        <div class="container">
            <img src="assets/imagens/banner.jpg" alt="">
        </div>
    </section>
    <section class="card">
        <div class="card-title"> Produtos </div>
    </section>
    <section class="produtos">
            <div class="table">
                <div class="row" preco="100.00" nomeProduto="Cachorro">
                    <div class="card-title-produto">Ração para cachorros</div>
                    <div class="img">
                        <img src="assets/imagens/cachorro.jpg" alt="">
                    </div>
                    <div class="descricao">
                        <li>Ração para cachorro</li>
                        <li>Bom para a barrica do cachorro</li>
                        <li>Não deixa mau hálito</li>
                    </div>
                    <div class="preco">Preço: 100.00</div>
                </div>
                <div class="row" preco="100.00" nomeProduto="Gato">
                    <div class="card-title-produto">Ração para gatos</div>
                    <div class="img">
                        <img src="assets/imagens/gato.jpg" alt="">
                    </div>
                    <div class="descricao">
                        <li>Ração perfeita para gatos</li>
                        <li>Bom para a barrica do gato</li>
                        <li>Não deixa mau hálito</li>
                    </div>
                    <div class="preco">Preço: 100.00</div>
                </div>
                <div class="row" preco="150.00" nomeProduto="Hamster">
                    <div class="card-title-produto">Ração para hamster</div>
                    <div class="img">
                        <img src="assets/imagens/rato.jpg" alt="">
                    </div>
                    <div class="descricao">
                        <li>Ração perfeita para hamster</li>
                        <li>Bom para a barrica do hamster</li>
                        <li>Não deixa mau hálito</li>
                    </div>
                    <div class="preco">Preço: 150.00</div>
                </div>
                <div class="row" preco="150.00" nomeProduto="Cavalo">
                    <div class="card-title-produto">Ração para cavalo</div>
                    <div class="img">
                        <img src="assets/imagens/cavalo.jpg" alt="">
                    </div>
                    <div class="descricao">
                        <li>Ração perfeita para cavalo</li>
                        <li>Bom para a barrica do cavalo</li>
                        <li>Não deixa mau hálito</li>
                    </div>
                    <div class="preco">Preço: 150.00</div>
                </div>
                <div style="clear: both;"></div>
        </div>
    </section>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="assets/javaScript/contantes.js"></script>
    <script src="assets/javaScript/script.js"></script>
</body>
</html>