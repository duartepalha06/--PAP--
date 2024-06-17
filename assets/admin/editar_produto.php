<?php
include_once '../db/database.php';
include_once '../db/dbmanager.php';

$produtoId = isset($_GET['produtoId']) ? $_GET['produtoId'] : null;

if ($produtoId !== null) {
    $produtoDetalhes = $db->detalhesProduto($produtoId);

    if ($produtoDetalhes['status'] === 'success' && count($produtoDetalhes['data']) > 0) {
        $produto = $produtoDetalhes['data'][0];
    } else {
        header("Location: ../../admin.php");
        exit();
    }
} else {
    header("Location: ../../admin.php");
    exit();
}
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

.img {
    max-width: 100px;
    max-height: 100px;
    width: auto;
    height: auto;
}

.a-admin {
    display: inline-block;
    margin-top: 15px;
    padding: 10px;
    background-color: black;
    color: white;
    border-radius: 5px;
}

#inserir {
    text-align: center;
    justify-content: center;
    align-items: center;
    display: flex;
    flex-direction: row;
}

.form-container {
    margin: 0 auto;
    max-width: 400px;
    margin-top: 25px;
    padding-bottom: 25px;
    border: 2px solid #000;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.inserir input {
    border-radius: 15px;
    border: none;
    width: 250px;
    height: 40px;
    padding-left: 15px;
    background-color: #E8F0FE;
    color: #343434;
    margin-top: 15px;
}

input:focus {
    outline: none;
}

img-admin {
    max-width: 300px;
    max-height: 300px;
    width: auto;
    height: auto;
    margin-top: 10px;
}
</style>

<body>
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

    <div class="form-container">
        <div id="inserir">
            <div class="caixa">

                <h2>Editar Produto</h2>

                <form method="POST" action="../db/dbmanager.php" enctype="multipart/form-data">
                    <input type="hidden" name="produtoId" value="<?= $produto->produtoId ?>">
                    <input type="hidden" name="editar_produto" value="1">

                    <div class="inserir">
                        <label for="nomeProduto">Nome:</label>
                        <input type="text" name="nomeProduto" value="<?= $produto->nomeProduto ?>" required>
                    </div>
                    <div class="inserir">
                        <label for="Descricao">Descrição:</label>
                        <input type="text" name="descricao" value="<?= $produto->descricao ?>" required>
                    </div>

                    <div class="inserir">
                        <label for="preco">Preço:</label>
                        <input class="inserir" type="text" id="preco" name="preco" step="0.01"
                            value="<?= $produto->preco ?>" required>
                    </div>

                    <div class="inserir">
                        <label for="rating">Rating:</label>
                        <input class="inserir" type="text" id="rating" name="rating" value="<?= $produto->rating ?>"
                            required>
                    </div>

                    <label for="foto">Atualizar foto:</label>
                    <img class="img-admin" src="data:image/png;base64,<?= $produto->foto ?>" alt=""><br>
                    <input type="file" id="foto" name="foto" accept="image/*"><br>

                    <input class="a-admin" type="submit" value="Salvar Alterações">
                </form>
                <a href="../../admin.php" class="a-admin">Cancelar Alterações</a>

            </div>
        </div>
    </div>

    <?php if (isset($mensagemErro)) : ?>
    <p class="error-message"><?= $mensagemErro ?></p>
    <?php endif; ?>

    <!--INICIO RODAPÉ-->
    <?php include_once "../content/footer.php"?>
    <!--FIM RODAPÉ-->

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="../js/app.js"></script>
</body>

</html>