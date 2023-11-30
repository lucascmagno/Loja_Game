<?php
    require_once(__DIR__."/../Configurations/connect.php");
    require_once(__DIR__."/../Models/produtoModel.php");

    class ProdutoController extends Connect{
        private $model;

        public function __construct()
        {
            $this->model = new ProdutoModel();
            parent::__construct();
        }

        public function getAll(){
            $sql = "SELECT * FROM produto";
            $stmt = $this->connection->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function insertProduto($produto){
            $sql = "INSERT INTO produto (nome_produto, valor_produto, quantidade_produto, descricao) VALUES (:nome_produto, :valor_produto, :quantidade_produto, :descricao)";
            $stmt = $this->connection->prepare($sql);
            $stmt->bindValue(':valor_produto', $produto->getValorProduto());
            $stmt->bindValue(':quantidade_produto', $produto->getQuantidadeProduto());
            $stmt->bindValue(':nome_produto', $produto->getNomeProduto());
            $stmt->bindValue(':descricao', $produto->getDescricao());
            $stmt->execute();

            if($stmt->rowCount() > 0){
                header('Location: ../../Views/pages/cadastroProduto.php?sucess=true');
            }else{
                header('Location: ../../Views/pages/cadastroProduto.php?sucess=false');
            }
        }

        public function updateProduto($produto){
            $sql = "UPDATE produto SET nome_produto = :nome_produto, descricao = :descricao, valor_produto = :valor_produto, quantidade_produto = :quantidade_produto WHERE id = :id";
            $stmt = $this->connection->prepare($sql);
            $stmt->bindValue(':nome_produto', $produto->getNomeProduto());
            $stmt->bindValue(':descricao', $produto->getDescricao());
            $stmt->bindValue(':valor_produto', $produto->getValorProduto());
            $stmt->bindValue(':quantidade_produto', $produto->getQuantidadeProduto());
            $stmt->bindValue(':id', $produto->getId());
            $stmt->execute();
        }

        public function deleteProduto($id){
            $sql = "DELETE FROM produto WHERE id = :id";
            $stmt = $this->connection->prepare($sql);
            $stmt->bindValue(':id', $id);
            $stmt->execute();
        }

        public function getProdutoById($id){
            $sql = "SELECT * FROM produto WHERE idproduto = :id";
            $stmt = $this->connection->prepare($sql);
            $stmt->bindValue(':id', $id);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }
    }
?>