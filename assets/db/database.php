<?php
ini_set('memory_limit', '256M');
include_once 'config.php';

class Database
{
    private function query($sql, $params = [])
    {
        try {
            $pdo = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $stmt = $pdo->prepare($sql);
            $stmt->execute($params);
            $lastID = $pdo->lastInsertId();
            $affectedRows = $stmt->rowCount();

            $results = $stmt->fetchAll(PDO::FETCH_CLASS);

            return [
                'status' => 'success',
                'data' => $results,
                'lastID' => $lastID,
                'affectedRows' => $affectedRows
            ];
        } catch (PDOException $e) {
            return [
                'status' => 'error',
                'data' => $e->getMessage(),
                'sql' => $sql,
                'params' => $params
            ];
        }
    }

    public function listarproduto()
    {
        $sql = "SELECT * FROM produto";
        return $this->query($sql);
    }

    public function detalhesProduto($produtoId)
    {
        if ($produtoId !== null) {
            $sql = "SELECT * FROM produto WHERE produtoId = ?";
            $params = [$produtoId];
            return $this->query($sql, $params);
        } else {
            return [    
                'data' => 'Produto ID não fornecido.'
            ];
        }
    }
                
    public function inserirProduto($nomeProduto, $descricao, $preco, $rating, $foto)
    {
        $sql = "INSERT INTO produto (nomeProduto, descricao, preco, rating, foto) VALUES (?, ?, ?, ?, ?)";
        $params = [
            $nomeProduto,
            $descricao,
            $preco,
            $rating,
            $foto
        ];
        return $this->query($sql, $params);
    }
    
    public function editarProduto($nomeProduto, $descricao, $preco, $rating, $foto, $produtoId)
    {
        if (!empty($foto)) {
            $sql = "UPDATE produto SET nomeProduto = ?, descricao = ?, preco = ?, rating = ?, foto = ? WHERE produtoId = ?";
            $params = [
                $nomeProduto,
                $descricao,
                $preco,
                $rating,
                $foto, 
                $produtoId
            ];
        } else {
            $sql = "UPDATE produto SET nomeProduto = ?, descricao = ?, preco = ?, rating = ? WHERE produtoId = ?";
            $params = [
                $nomeProduto,
                $descricao,
                $preco,
                $rating,
                $produtoId
            ];
        }
        return $this->query($sql, $params);
    }
                            
    public function eliminarProduto($produtoId)
    {
        $sql = "DELETE FROM produto WHERE produtoId = ?";
        $params = [$produtoId];
        return $this->query($sql, $params);
    }
        
    public function contarproduto()
    {
        $sql = "SELECT COUNT(*) as total FROM produto";
        return $this->query($sql);
    }
}