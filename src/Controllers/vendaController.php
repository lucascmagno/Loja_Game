<?php
    require_once("src/Configurations/connect.php");
    require_once("src/Models/vendaModel.php");

    class VendaController extends Connect{
        private $model;

        public function __construct()
        {
            $this->model = new VendaModel();
            parent::__construct();
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