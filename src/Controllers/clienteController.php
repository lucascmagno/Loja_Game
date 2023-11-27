<?php
    require_once("src/Configurations/connect.php");
    require_once("src/Models/clienteModel.php");

    class ClienteController extends Connect{
        private $model;
        
        public function __construct()
        {
            $this->model = new ClienteModel();
            parent::__construct();
        }
        
        public function getAll(){
            $sql = "SELECT * FROM cliente";
            $stmt = $this->connection->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        
        public function insertCliente($cliente){
            $sql = "INSERT INTO cliente (nome, cpf, email, senha, telefone, endereco, cidade, estado, cep) VALUES (:nome, :cpf, :email, :senha, :telefone, :endereco, :cidade, :estado, :cep)";
            $stmt = $this->connection->prepare($sql);
            $stmt->bindValue(':nome', $cliente->getNome());
            $stmt->bindValue(':cpf', $cliente->getCpf());
            $stmt->bindValue(':email', $cliente->getEmail());
            $stmt->bindValue(':senha', $cliente->getSenha());
            $stmt->bindValue(':telefone', $cliente->getTelefone());
            $stmt->bindValue(':endereco', $cliente->getEndereco());
            $stmt->bindValue(':cidade', $cliente->getCidade());
            $stmt->bindValue(':estado', $cliente->getEstado());
            $stmt->bindValue(':cep', $cliente->getCep());
            $stmt->execute();
        }

        public function updateCliente($cliente){
            $sql = "UPDATE cliente SET nome = :nome, cpf = :cpf, email = :email, senha = :senha, telefone = :telefone, endereco = :endereco, cidade = :cidade, estado = :estado, cep = :cep WHERE id = :id";
            $stmt = $this->connection->prepare($sql);
            $stmt->bindValue(':nome', $cliente->getNome());
            $stmt->bindValue(':cpf', $cliente->getCpf());
            $stmt->bindValue(':email', $cliente->getEmail());
            $stmt->bindValue(':senha', $cliente->getSenha());
            $stmt->bindValue(':telefone', $cliente->getTelefone());
            $stmt->bindValue(':endereco', $cliente->getEndereco());
            $stmt->bindValue(':cidade', $cliente->getCidade());
            $stmt->bindValue(':estado', $cliente->getEstado());
            $stmt->bindValue(':cep', $cliente->getCep());
            $stmt->bindValue(':id', $cliente->getId());
            $stmt->execute();
        }

        public function deleteCliente($id){
            $sql = "DELETE FROM cliente WHERE id = :id";
            $stmt = $this->connection->prepare($sql);
            $stmt->bindValue(':id', $id);
            $stmt->execute();
        }
    }

?>