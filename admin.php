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

<style>
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

.a-admin {
    display: inline-block;
    margin-top: 1px;
    padding: 3px;
    background-color: black;
    color: white;
    border-radius: 5px;
}

table {
    border-collapse: collapse;
    width: 100%;
    margin-top: 15px;
}

th,
td {
    border: 1px solid #dddddd;
    text-align: center;
    padding: 8px;
}

th {
    background-color: #f2f2f2;
}

td img {
    display: block;
    margin: auto;
}

#searchInput {
    display: flex;
    border-radius: 15px;
    border: none;
    width: 250px;
    height: 40px;
    padding-left: 15px;
    background-color: #E8F0FE;
    color: #343434;
    margin-top: 15px;
}

#searchInput:focus {
    outline: none;
    border-color: #007BFF;
}
</style>


<body>
    <!--INICIO BANNER-->
    <div class="novomenu">
        <!--INICIO CONTAINER-->
        <div class="container">
            <?php include_once "assets/content/nav.php"?>
        </div>
        <!--FIM CONTAINER-->
    </div>

    <p>Total de Produtos:
        <?= isset($totalProdutos['data'][0]->total) ? $totalProdutos['data'][0]->total : '0' ?></p>

    <a class="a-admin" href="assets/admin/inserir_produto.php">Inserir Produto</a>

    <!-- Search Bar -->
    <input type="text" id="searchInput" placeholder="Search for products..." onkeyup="searchTable()">


    <table id="productTable">
        <tr>
            <th style="cursor: pointer;">Produto ID</th>
            <th style="cursor: pointer;">Nome</th>
            <th style="cursor: pointer;">Descrição</th>
            <th style="cursor: pointer;">Preço</th>
            <th style="cursor: pointer;">Rating</th>
            <th>Foto</th>
            <th>Ações</th>
        </tr>
        <?php if (is_array($produtos['data'])) : ?>
        <?php foreach ($produtos['data'] as $produto) : ?>
        <tr>
            <td><?= $produto->produtoId ?></td>
            <td><?= $produto->nomeProduto ?></td>
            <td><?= $produto->descricao ?></td>
            <td><?= $produto->preco ?>€</td>
            <td><?= $produto->rating ?></td>
            <td>
                <img src="data:image/png;base64,<?= $produto->foto ?>" alt="" class="img-admin"
                    onclick="toggleImageSize(this)">
            </td>
            <td>
                <a href="assets/admin/visualizar_produto.php?produtoId=<?= $produto->produtoId ?>"
                    class="a-admin">Visualizar</a>
                <br>
                <a href="assets/admin/editar_produto.php?produtoId=<?= $produto->produtoId ?>"
                    class="a-admin">Editar</a>
                <br>
                <a href="assets/admin/excluir_produto.php?produtoId=<?= $produto->produtoId ?>"
                    class="a-admin">Excluir</a>
            </td>
        </tr>
        <?php endforeach; ?>
        <?php else : ?>
        <tr>
            <td colspan="7">Não existem produtos.</td>
        </tr>
        <?php endif; ?>
    </table>


    <!--FIM BANNER-->
    <!--INICIO RODAPÉ-->
    <?php include_once "assets/content/footer.php"?>
    <!--FIM RODAPÉ-->
    <script>
    function toggleImageSize(img) {
        img.classList.toggle('expanded');

        document.addEventListener('click', function closeImage(event) {
            if (!img.contains(event.target)) {
                img.classList.remove('expanded');
                document.removeEventListener('click', closeImage);
            }
        });
    }

    document.addEventListener('DOMContentLoaded', function() {
        var table = document.getElementById("productTable");
        table.addEventListener('click', function(e) {
            if (e.target.tagName === 'TH') {
                var columnIndex = e.target.cellIndex;
                sortTable(columnIndex);
            }
        });

        function sortTable(n) {
            var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
            table = document.getElementById("productTable");
            switching = true;
            dir = "asc";
            while (switching) {
                switching = false;
                rows = table.rows;
                for (i = 1; i < (rows.length - 1); i++) {
                    shouldSwitch = false;
                    x = rows[i].getElementsByTagName("TD")[n];
                    y = rows[i + 1].getElementsByTagName("TD")[n];
                    if (dir == "asc") {
                        if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
                            shouldSwitch = true;
                            break;
                        }
                    } else if (dir == "desc") {
                        if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
                            shouldSwitch = true;
                            break;
                        }
                    }
                }
                if (shouldSwitch) {
                    rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
                    switching = true;
                    switchcount++;
                } else {
                    if (switchcount == 0 && dir == "asc") {
                        dir = "desc";
                        switching = true;
                    }
                }
            }
        }
    });

    function searchTable() {
        var input, filter, table, tr, td, i, j, txtValue;
        input = document.getElementById("searchInput");
        filter = input.value.toUpperCase();
        table = document.getElementById("productTable");
        tr = table.getElementsByTagName("tr");
        for (i = 0; i < tr.length; i++) {
            tr[i].style.display = ""; // Reset display style for each row
            td = tr[i].getElementsByTagName("td");
            for (j = 0; j < td.length; j++) {
                txtValue = td[j].textContent || td[j].innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                    break;
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }
    </script>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="assets/js/app.js"></script>
</body>

</html>