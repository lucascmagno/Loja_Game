<?php
include '../../Controllers/ClienteController.php';

$userModel = new ClienteModel;
$clienteController = new ClienteController;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $userModel->setNome($_POST['nome']);
    $userModel->setEmail($_POST['email']);
    $userModel->setTelefone($_POST['telefone']);
    $userModel->setSenha($_POST['senha']);
    $userModel->setCep($_POST['cep']);
    $userModel->setEndereco($_POST['endereco']);

    $clienteController->insertCliente($userModel);
}
?>
