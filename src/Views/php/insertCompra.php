<?php
    include_once '../../Controllers/vendaController.php';

    $compraController = new VendaController;
    $compraModel = new VendaModel;

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $compraModel->setIdCliente($_POST['idusuario']);
        $compraModel->setIdProduto($_POST['idproduto']);
        $compraModel->setValorTotal($_POST['valor_compra']);

        $compraController->insertVenda($compraModel);
    }

?>