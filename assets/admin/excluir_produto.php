<?php
include_once '../db/database.php';
include_once '../db/dbmanager.php';

$produtoId = isset($_GET['produtoId']) ? $_GET['produtoId'] : null;

if ($produtoId !== null) {
    $deleteResult = $db->eliminarProduto($produtoId);

    if ($deleteResult['status'] === 'success') {
        echo "Produto excluído com sucesso!";
        header('Location: ../../admin.php');
        exit();
    } else {
        echo "Erro ao excluir o produto.";
    }
} else {
    echo "ID do produto não fornecido.";
}
