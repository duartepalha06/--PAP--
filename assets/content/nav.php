<!-- INICIO NAVEBAR -->
<div class="navebar">
    <div class="logo">
        <a href="index.php" title="">
            <?php $logoImage = (basename($_SERVER['PHP_SELF']) == 'index.php') ? 'logo.png' : 'logoEscura.png'; ?>
            <img src="assets/img/<?php echo $logoImage; ?>" alt="1000Steps" width="175px">
        </a>
    </div>

    <!-- INICIO MENU NAVEBAR -->
    <nav>
        <ul id="MenuItens" class="black">
            <?php $isLoggedIn = isset($_SESSION['id']); ?>
            <li><a href="index.php" title="">Inicio</a></li>
            <li><a href="sobre.php" title="">Sobre Nos</a></li>
            <li><a href="produtos.php" title="">Produtos</a></li>
            <?php if (!$isLoggedIn) : ?>
                <li><a href="login.php" title="">Login</a></li>
            <?php else : ?>
                <li><a href="perfil.php" title="">Minha Conta</a></li>
            <?php endif; ?>
            <li><a href="admin.php" title="">Admin</a></li>
        </ul>
    </nav>
    <!-- FIM MENU NAVEBAR -->
    <img src="assets/img/menu.png" alt="" class="menu-celular" onclick="menucelular()">
</div>
<!-- FIM NAVEBAR -->
