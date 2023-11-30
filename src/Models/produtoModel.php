<?php
    require_once(__DIR__."/../Configurations/connect.php");

    class ProdutoModel extends Connect{
        private $id;
        private $nome_produto;
        private $descricao;
        private $valor_produto;
        private $quantidade_produto;

        public function __construct()
        {
            parent::__construct();
        }

        public function getId(){
            return $this->id;
        }

        public function setId($id){
            $this->id = $id;
            return $this;
        }

        public function getNomeProduto(){
            return $this->nome_produto;
        }

        public function setNomeProduto($nome_produto){
            $this->nome_produto = $nome_produto;
            return $this;
        }

        public function getDescricao(){
            return $this->descricao;
        }

        public function setDescricao($descricao){
            $this->descricao = $descricao;
            return $this;
        }

        public function getValorProduto(){
            return $this->valor_produto;
        }

        public function setValorProduto($valor_produto){
            $this->valor_produto = $valor_produto;
            return $this;
        }

        public function getQuantidadeProduto(){
            return $this->quantidade_produto;
        }
        
        public function getAll(){
            $sql = "SELECT * FROM produto";
            $stmt = $this->connection->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function setQuantidadeProduto($quantidade_produto){
            $this->quantidade_produto = $quantidade_produto;
            return $this;
        }

        public function insertProduto($produto){
            $sql = "INSERT INTO produto (nome_produto, descricao, valor_produto, quantidade_produto) VALUES (:nome_produto, :descricao, :valor_produto, :quantidade_produto)";
            $stmt = $this->connection->prepare($sql);
            $stmt->bindValue(':nome_produto', $produto->getNomeProduto());
            $stmt->bindValue(':descricao', $produto->getDescricao());
            $stmt->bindValue(':valor_produto', $produto->getValorProduto());
            $stmt->bindValue(':quantidade_produto', $produto->getQuantidadeProduto());
            $stmt->execute();
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

    }

?>