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
    <div class="novomenu">
        <!--INICIO CONTAINER-->
        <div class="container">
            <?php include_once "assets/content/nav.php"?>
        </div>
        <!--FIM CONTAINER-->
    </div>
    <!--FIM BANNER-->

    <!--INICIO PRODUTOS-->
    <div class="corpo-categorias">
        <div class="linha linha2">
            <h2>Todos</h2>
        </div>
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
        <!--FIM LINHA DO PRODUTO-->
        <div class="paginacao">
            <span>1</span>
            <span>&#8594;</span>
        </div>

    </div>
    <!--FIM PRODUTOS-->

    <!--INICIO RODAPÉ-->
    <?php include_once "assets/content/footer.php"?>
    <!--FIM RODAPÉ-->
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="assets/js/app.js"></script>
</body>

</html>