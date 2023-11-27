<?php
    require_once("src/Configurations/connect.php");
    
    class ClienteModel extends Connect{
        private $id;
        private $nome;
        private $cpf;
        private $email;
        private $senha;
        private $telefone;
        private $endereco;

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

        public function getNome(){
            return $this->nome;
        }

        public function setNome($nome){
            $this->nome = $nome;
            return $this;
        }

        public function getCpf(){
            return $this->cpf;
        }

        public function setCpf($cpf){
            $this->cpf = $cpf;
            return $this;
        }

        public function getEmail(){
            return $this->email;
        }

        public function setEmail($email){
            $this->email = $email;
            return $this;
        }

        public function getSenha(){
            return $this->senha;
        }

        public function setSenha($senha){
            $this->senha = $senha;
            return $this;
        }

        public function getTelefone(){
            return $this->telefone;
        }

        public function setTelefone($telefone){
            $this->telefone = $telefone;
            return $this;
        }

        public function getEndereco(){
            return $this->endereco;
        }

        public function setEndereco($endereco){
            $this->endereco = $endereco;
            return $this;
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