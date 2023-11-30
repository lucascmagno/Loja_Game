<?php
   require_once (__DIR__.'/../Configurations/connect.php');
   require_once (__DIR__.'/../Models/clienteModel.php');

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
            $sql = "INSERT INTO cliente (nome, email, telefone, senha, cep, endereco) VALUES (:nome, :email, :telefone, :senha, :cep, :endereco )";
            $stmt = $this->connection->prepare($sql);
            $stmt->bindValue(':nome', $cliente->getNome());
            $stmt->bindValue(':email', $cliente->getEmail());
            $stmt->bindValue(':telefone', $cliente->getTelefone());
            $stmt->bindValue(':senha', $cliente->getSenha());
            $stmt->bindValue(':cep', $cliente->getCep());
            $stmt->bindValue(':endereco', $cliente->getEndereco());
            $stmt->execute();

            if($stmt->rowCount() > 0){
                header('Location: ../../Views/pages/login.php?sucess=true');
            }else{
                header('Location: ../../Views/pages/cadastro.php?sucess=false');
            }
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

        public function login($usuario, $senha){
            $sql = "SELECT * FROM cliente WHERE nome = :usuario AND senha = :senha";
            $stmt = $this->connection->prepare($sql);
            $stmt->bindValue(':usuario', $usuario);
            $stmt->bindValue(':senha', $senha);
            $stmt->execute();

            if($stmt->rowCount() > 0){
                session_start();
                $_SESSION['usuario'] = $usuario;
                $_SESSION['senha'] = $senha;
                header('Location: /index.php?sucess=true');
            }else{
                header('Location: ../../Views/pages/login.php?sucess=false');
            }
        }
    }

?>