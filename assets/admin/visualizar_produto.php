<?php
include_once '../db/database.php';
include_once '../db/dbmanager.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>1000 STEPS</title>
    <link rel="stylesheet" href="../css/style.css">
</head>

<style>
.center-admin {
    text-align: center;
    justify-content: center;
    align-items: center;
    display: flex;
    flex-direction: row;
}

.a-admin {
    display: inline-block;
    margin-top: 15px;
    padding: 10px;
    background-color: black;
    color: white;
    border-radius: 5px;
}

.img-admin {
    max-width: 200px;
    max-height: 200px;
    width: auto;
    height: auto;
    transition: max-width 0.5s, max-height 0.5s;
    cursor: pointer;
}

.img-admin.expanded {
    max-width: 800px;
    max-height: 800px;
}
</style>

<body>
    <!--INICIO BANNER-->
    <div class="novomenu">
        <!--INICIO CONTAINER-->
        <div class="container">
            <!-- INICIO NAVEBAR -->
            <div class="navebar">
                <div class="logo">
                    <a href="../../index.php" title="">
                        <?php $logoImage = (basename($_SERVER['PHP_SELF']) == '../../index.php') ? 'logo.png' : 'logoEscura.png'; ?>
                        <img src="../img/<?php echo $logoImage; ?>" alt="1000Steps" width="175px">
                    </a>
                </div>

                <!-- INICIO MENU NAVEBAR -->
                <nav>
                    <ul id="MenuItens" class="black">
                        <?php $isLoggedIn = isset($_SESSION['id']); ?>
                        <li><a href="../../index.php" title="">Inicio</a></li>
                        <li><a href="../../sobre.php" title="">Sobre Nos</a></li>
                        <li><a href="../../produtos.php" title="">Produtos</a></li>
                        <?php if (!$isLoggedIn) : ?>
                        <li><a href="../../login.php" title="">Login</a></li>
                        <?php else : ?>
                        <li><a href="../../perfil.php" title="">Minha Conta</a></li>
                        <?php endif; ?>
                        <li><a href="../../admin.php" title="">Admin</a></li>
                    </ul>
                </nav>
                <!-- FIM MENU NAVEBAR -->
                <img src="../img/menu.png" alt="" class="menu-celular" onclick="menucelular()">
            </div>
            <!-- FIM NAVEBAR -->
        </div>
        <!--FIM CONTAINER-->
    </div>



    <?php
    $produtoId = isset($_GET['produtoId']) ? $_GET['produtoId'] : null;

    if ($produtoId !== null) {
        $produtoDetalhes = $db->detalhesProduto($produtoId);

        if ($produtoDetalhes['status'] === 'success' && count($produtoDetalhes['data']) > 0) {
            $produto = $produtoDetalhes['data'][0];
            function generateStarRating($rating)
            {
                $stars = '';
                $fullStars = floor($rating);
                $halfStar = ceil($rating - $fullStars);
            
                for ($i = 0; $i < $fullStars; $i++) {
                    $stars .= '<ion-icon name="star"></ion-icon>';
                }
            
                if ($halfStar) {
                    $stars .= '<ion-icon name="star-half-outline"></ion-icon>';
                }
            
                for ($i = $fullStars + $halfStar; $i < 5; $i++) {
                    $stars .= '<ion-icon name="star-outline"></ion-icon>';
                }
            
                return $stars;
            }
            ?>
    <div class="center-admin">
        <div class="caixa">
            <h1>Detalhes do Produto</h1>
            <p>ID: <?= $produto->produtoId ?></p>
            <p>Nome: <?= $produto->nomeProduto ?></p>
            <p>Descrição: <?= $produto->descricao ?></p>
            <p>Preço: <?= $produto->preco ?>€</p>
            <p>Rating: <span class="rating"><?= generateStarRating($produto->rating) ?></span></p>
            <img src="data:image/png;base64,<?= $produto->foto ?>" alt="" class="img-admin"
                onclick="toggleImageSize(this)">
            <br>
            <a class="a-admin" href="../../admin.php">Voltar atrás</a>
            <a class="a-admin" href="./excluir_produto.php?produtoId=<?= $produto->produtoId ?>">Excluir</a>
            <a class="a-admin" href="./editar_produto.php?produtoId=<?= $produto->produtoId ?>">Editar</a>
        </div>
    </div>
    <?php
        } else {
            echo "<p>Produto não encontrado.</p>";
            ?>
    <a href="../../ListaProdutos.php">Voltar atrás</a>
    <?php
        }
    } else {
        echo "<p>ID do produto não fornecido.</p>";
    }
    ?>


    <!--FIM BANNER-->
    <!--INICIO RODAPÉ-->
    <?php include_once "../content/footer.php"?>
    <!--FIM RODAPÉ-->

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="../js/app.js"></script>

    <script>
    function toggleImageSize(img) {
        img.classList.toggle('expanded');

        if (img.classList.contains('expanded')) {
            img.style.width = 'auto';
            img.style.height = 'auto';
        }

        document.addEventListener('click', function closeImage(event) {
            if (!img.contains(event.target)) {
                img.style.width = 'auto';
                img.style.height = 'auto';

                img.classList.remove('expanded');
                document.removeEventListener('click', closeImage);
            }
        });
    }
    </script>

</body>

</html>