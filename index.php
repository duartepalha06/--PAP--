<?php
    include_once 'assets/db/database.php';
    include_once 'assets/db/dbmanager.php';
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>1000 STEPS</title>
    <link rel="stylesheet" href="assets/css/style.css">

</head>

<body>

    <!--INICIO BANNER-->
    <div class="banner">
        <!--INICIO CONTAINER-->
        <div class="container">
            <?php include_once "assets/content/nav.php"?>
            <!--INICIO TEXTO DO BANNER-->
            <div class="linha">
                <div class="col-2">
                    <h1>Escolha um novo <br>Estilo de Vida</h1>
                    <p>Para uma mudança de estilo, experimente 1000 Steps</p>
                    <br><a href="produtos.php" class="btn">Ver Produtos &#8594;</a>
                </div>
                <div class="col-2">
                    <img src="assets/img/banner-1.png" alt="">
                </div>
            </div>
            <!--FIM TEXTO DO BANNER-->
        </div>
        <!--FIM CONTAINER-->
    </div>
    <!--FIM BANNER-->
    <!--INICIO PRODUTOS-->
    <div class="corpo-categorias">
        <h2 class="titulo">Produtos em Destaque</h2>
        <!--INICIO LINHA DO PRODUTO-->
        <div class="linha" id="product-container">
            <?php
            foreach ($produtos['data'] as $produto) {
            ?>
            <div class="col-4">
                <a href="detalhes_produto.php?produtoId=<?= $produto->produtoId ?>" title="">
                    <img src="data:image/png;base64,<?php echo $produto->foto; ?>" alt="" width="230px" height="230px">
                </a>
                <h4><?php echo $produto->nomeProduto; ?></h4>
                <div class="classificacao">
                    <?php
                        $filledStars = floor($produto->rating);
                        $halfStar = ($produto->rating - $filledStars) > 0;
                        $emptyStars = 5 - $filledStars - ($halfStar ? 1 : 0);

                        for ($i = 0; $i < $filledStars; $i++) {
                            echo '<ion-icon name="star"></ion-icon>';
                        }

                        if ($halfStar) {
                            echo '<ion-icon name="star-half-outline"></ion-icon>';
                        }

                        for ($i = 0; $i < $emptyStars; $i++) {
                            echo '<ion-icon name="star-outline"></ion-icon>';
                        }
                    ?>
                </div>
                <p><?php echo $produto->preco; ?></p>
            </div>
            <?php
            }
            ?>
        </div>
    </div>
    <!--FIM PRODUTOS-->

    <!--INICIO OFERTAS-->
    <div class="ofertas">
        <div class="corpo-categorias">
            <div class="linha">
                <div class="col-2">
                    <img src="assets/img/banner-2.png " alt="" class="oferta-img">
                </div>
                <div class="col-2">
                    <p>Produto Exclusivo da Loja</p>
                    <h1>Air Jordan 1 Purple</h1>
                    <small>Para uma mudança de estilo, experimente 1000 Steps</small>
                    <br> <br> 
                    <a href="detalhes_produto.php?produtoId=1" class="btn-1" title="">Comprar Agora</a>
                </div>
            </div>
        </div>
    </div>
    <!--FIM OFERTAS-->

    <!--INICIO RODAPÉ-->
    <?php include_once "assets/content/footer.php"?>
    <!--FIM RODAPÉ-->
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="assets/js/app.js"></script>
</body>

</html>