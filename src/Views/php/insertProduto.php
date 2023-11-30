<?php
    include_once('../../Controllers/produtoController.php');

    $produtoController = new ProdutoController;
    $produtoModel = new ProdutoModel;

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $produtoModel->setNomeProduto($_POST['nome_produto']);
        $produtoModel->setDescricao($_POST['descricao']);
        $produtoModel->setValorProduto($_POST['valor_produto']);
        $produtoModel->setQuantidadeProduto($_POST['quantidade_produto']);

        $produtoController->insertProduto($produtoModel);
    }
?>