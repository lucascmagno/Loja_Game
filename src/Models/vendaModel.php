<?php
    require_once '../../Configurations/connect.php';

    class VendaModel extends Connect{
        private $id;
        private $id_cliente;
        private $id_produto;
        private $valor_total;
        private $data_venda;

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

        public function getIdCliente(){
            return $this->id_cliente;
        }

        public function setIdCliente($id_cliente){
            $this->id_cliente = $id_cliente;
            return $this;
        }

        public function getIdProduto(){
            return $this->id_produto;
        }

        public function setIdProduto($id_produto){
            $this->id_produto = $id_produto;
            return $this;
        }

        public function getValorTotal(){
            return $this->valor_total;
        }

        public function setValorTotal($valor_total){
            $this->valor_total = $valor_total;
            return $this;
        }

        public function getDataVenda(){
            return $this->data_venda;
        }

        public function setDataVenda($data_venda){
            $this->data_venda = $data_venda;
            return $this;
        }

        public function getAll(){
            $sql = "SELECT * FROM venda";
            $stmt = $this->connection->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function insertVenda($venda){
            $sql = "INSERT INTO venda (id_cliente, id_produto, valor_total, data_venda) VALUES (:id_cliente, :id_produto, :valor_total, :data_venda)";
            $stmt = $this->connection->prepare($sql);
            $stmt->bindValue(':id_cliente', $venda->getIdCliente());
            $stmt->bindValue(':id_produto', $venda->getIdProduto());
            $stmt->bindValue(':valor_total', $venda->getValorTotal());
            $stmt->bindValue(':data_venda', $venda->getDataVenda());
            $stmt->execute();
        }

        public function updateVenda($venda){
            $sql = "UPDATE venda SET id_cliente = :id_cliente, id_produto = :id_produto, valor_total = :valor_total, data_venda = :data_venda WHERE id = :id";
            $stmt = $this->connection->prepare($sql);
            $stmt->bindValue(':id_cliente', $venda->getIdCliente());
            $stmt->bindValue(':id_produto', $venda->getIdProduto());
            $stmt->bindValue(':valor_total', $venda->getValorTotal());
            $stmt->bindValue(':data_venda', $venda->getDataVenda());
            $stmt->bindValue(':id', $venda->getId());
            $stmt->execute();
        }

        public function deleteVenda($id){
            $sql = "DELETE FROM venda WHERE id = :id";
            $stmt = $this->connection->prepare($sql);
            $stmt->bindValue(':id', $id);
            $stmt->execute();
        }

    }

?>