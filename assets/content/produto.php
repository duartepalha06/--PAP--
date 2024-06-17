<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>1000 STEPS</title>
    <link rel="stylesheet" href="assets/css/style2.css">

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

    <!--INICIO PRODUTOS DETALHES-->
    <div class="corpo-categorias ver-produtos">
        <div class="linha">
            <div class="col-2">
                <img src="assets/img/produto-1.jpg" alt="" id="produtoImg">
            </div>
            <div class="col-2">
                <p>Nike Dunk Low Grey Fog</p>
                <h4>170€</h4>
                <form action="" method="post">
                    <select name="" id="">
                        <option value="">Selecione o Tamanho</option>
                        <option value="">39</option>
                        <option value="">40</option>
                        <option value="">41</option>
                        <option value="">42</option>
                        <option value="">43</option>
                        <option value="">44</option>
                    </select>
                    <input type="number" name="" id="" value="1">
                    <br>
                    <button type="submit" class="btn">Adicionar ao carrinho</button>
                </form>
                <h3>Descriçao:</h3>
                <p>Criadas para o campo, mas levadas para as ruas, as Nike Dunk Low Retro regressam com sobreposições bonitas e cores originais. </p>
            </div>
        </div>
    </div>
    <!--FIM PRODUTOS DETALHES-->

    <!--INICIO PRODUTOS-->
    <div class="corpo-categorias">
        <div class="linha linha2">
            <h2>Produtos Relacionados</h2>
            <p>Ver Mais</p>
        </div>
        <!--INICIO LINHA DO PRODUTO-->
        <div class="linha">
            <!--INICIO ITEM PRODUTO-->
            <div class="col-4">
                <a href="produto-1.html" title="">
                <img src="assets/img/produto-1.jpg" alt="" width="230px" height="230px">
                </a>
                <h4>Nike Dunk Low Grey Fog</h4>
                <div class="classificacao">
                    <ion-icon name="star"></ion-icon>
                    <ion-icon name="star"></ion-icon>
                    <ion-icon name="star"></ion-icon>
                    <ion-icon name="star"></ion-icon>
                    <ion-icon name="star-half-outline"></ion-icon>
                </div>
                <p>170€</p>
            </div>
            <!--FIM ITEM PRODUTO-->
            <!--INICIO ITEM PRODUTO-->
            <div class="col-4">
                <a href="produto-2.html" title="">
                <img src="assets/img/produto-2.jpg" alt="" width="230px" height="230px">
                </a>
                <h4>Nike Dunk Low Panda</h4>
                <div class="classificacao">
                    <ion-icon name="star"></ion-icon>
                    <ion-icon name="star"></ion-icon>
                    <ion-icon name="star"></ion-icon>
                    <ion-icon name="star"></ion-icon>
                    <ion-icon name="star"></ion-icon>
                </div>
                <p>150€</p>
            </div>
            <!--FIM ITEM PRODUTO-->
            <!--INICIO ITEM PRODUTO-->
            <div class="col-4">
                <a href="produto-3.html" title="">
                <img src="assets/img/produto-3.jpg" alt="" width="230px" height="230px">
                </a>
                <h4>Air Jordan 4 Retro Thunder</h4>
                <div class="classificacao">
                    <ion-icon name="star"></ion-icon>
                    <ion-icon name="star"></ion-icon>
                    <ion-icon name="star"></ion-icon>
                    <ion-icon name="star"></ion-icon>
                    <ion-icon name="star-outline"></ion-icon>
                </div>
                <p>270€</p>
            </div>
            <!--FIM ITEM PRODUTO-->
            <!--INICIO ITEM PRODUTO-->
            <div class="col-4">
                <a href="produto-4.html" title="">
                <img src="assets/img/produto-4.jpg" alt="" width="230px" height="230px">
                </a>
                <h4>Air Jordan 4 Red Cement</h4>
                <div class="classificacao">
                    <ion-icon name="star"></ion-icon>
                    <ion-icon name="star"></ion-icon>
                    <ion-icon name="star"></ion-icon>
                    <ion-icon name="star-half-outline"></ion-icon>
                    <ion-icon name="star-outline"></ion-icon>
                </div>
                <p>300€</p>
            </div>
            <!--FIM ITEM PRODUTO-->          
        </div>
        <!--FIM LINHA DO PRODUTO-->
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