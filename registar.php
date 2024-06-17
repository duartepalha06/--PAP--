<?php
    include_once 'assets/db/database.php';
    include_once 'assets/db/dbmanager.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>1000 STEPS</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body id="body2">
    <div class="novomenu">
        <!--INICIO CONTAINER-->
        <div class="container">
            <?php include_once "assets/content/nav.php"?>
        </div>
        <!--FIM CONTAINER-->
    </div>
    <div id="login">
        <div class="caixa">
            <img src="assets/img/logoEscura.png" alt="1000Steps" width="300px">
            <h1>Registar</h1>
            <div class="nome">
                <input type="nome" placeholder="Nome">
            </div>
            <div class="email">
                <input type="email" placeholder="E-mail">
            </div>
            <div class="senha">
                <input type="password" placeholder="Senha">
            </div>
            <div class="registar">
            <p id="criar">Já tens uma conta? <a href="login.php">Entra.</a></p>
                <input type="submit" value="Registar">
            </div>
        </div>
    </div>
    <!--INICIO RODAPÉ-->
    <?php include_once "assets/content/footer.php"?>
    <!--FIM RODAPÉ-->

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="assets/js/app.js"></script>
</body>

</html>