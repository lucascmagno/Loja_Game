<?php
    include_once('../../Controllers/clienteController.php');

    $usuarioController = new ClienteController;
    $usuarioModel = new ClienteModel;

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $usuarioModel->setNome($_POST['usuario']);
        $usuarioModel->setSenha($_POST['senha']);

        $usuarioController->login($usuarioModel->getNome(), $usuarioModel->getSenha());
    }

?>