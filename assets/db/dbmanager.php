<?php
include_once 'database.php';

$db = new Database();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['editar_produto']) && $_POST['editar_produto'] == 1) {
        $nomeProduto = $_POST['nomeProduto'];
        $descricao = $_POST['descricao'];
        $preco = $_POST['preco'];
        $rating = $_POST['rating'];
        $foto = '';

        if (isset($_FILES['foto']) && $_FILES['foto']['error'] === UPLOAD_ERR_OK) {
            $foto = base64_encode(file_get_contents($_FILES['foto']['tmp_name']));
        }

        $produtoId = $_POST['produtoId'];
        
        $resultado = $db->editarProduto($nomeProduto, $descricao, $preco, $rating, $foto, $produtoId);
        echo("Debug: Edit Product - " . print_r($resultado, true));

        if ($resultado['status'] === 'success') {
            header("Location: ../../admin.php");
            exit();
        } else {
            $mensagemErro = serialize($resultado['data']);
            error_log("Erro ao editar produto: $mensagemErro");
        }
    } else {
        $nomeProduto = $_POST['nomeProduto'];
        $descricao = $_POST['descricao'];
        $preco = $_POST['preco'];
        $rating = $_POST['rating'];
        $foto = '';

        if (isset($_FILES['foto']) && $_FILES['foto']['error'] === UPLOAD_ERR_OK) {
            $foto = base64_encode(file_get_contents($_FILES['foto']['tmp_name']));
        }

        $resultado = $db->inserirProduto($nomeProduto, $descricao, $preco, $rating, $foto);
        echo("Debug: Insert Product - " . print_r($resultado, true));
    

        if ($resultado['status'] === 'success') {
            header("Location: ../../admin.php");
            exit();
        } else {
            $mensagemErro = serialize($resultado['data']);
            error_log("Erro ao inserir produto: $mensagemErro");
        }
    }
}

$produtos = $db->listarproduto();
$totalProdutos = $db->contarproduto();