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
            <img src="assets/img/logoEscura.png" alt="1000Steps">
            <h1>Login</h1>
            <div class="email">
                <input type="email" placeholder="E-mail">
            </div>
            <div class="senha">
                <input type="password" placeholder="Senha">
            </div>
            <div class="entrar">
                <p id="criar">Ainda não tem uma conta? <a href="registar.php">Crie uma.</a></p>
                <input type="submit" value="Entrar">
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