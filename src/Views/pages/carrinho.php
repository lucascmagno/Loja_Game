<?php
    include_once '../../Controllers/produtoController.php';
    $produtoController = new ProdutoController;
    $idproduto = $_GET['idproduto'] ?? null;
    $data = $produtoController->getProdutoById($idproduto);
    print_r($data);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrinho de Compras</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        header {
            background-color: #333;
            color: #fff;
            padding: 1em;
            text-align: center;
        }

        nav {
            display: flex;
            justify-content: space-around;
            background-color: #444;
            padding: 0.5em;
        }

        nav a {
            color: #fff;
            text-decoration: none;
        }

        main {
            padding: 1em;
        }

        .product {
            border: 1px solid #ddd;
            background-color: #fff;
            padding: 1em;
            margin: 1em;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .cart {
            border: 1px solid #333;
            background-color: #fff;
            padding: 1em;
            margin: 1em;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        form {
            margin-top: 1em;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        input {
            margin-bottom: 0.5em;
            padding: 0.5em;
        }

        button {
            padding: 0.5em 1em;
            background-color: #333;
            color: #fff;
            border: none;
            cursor: pointer;
        }
    </style>
</head>
<body>

<header>
    <h1>Carrinho de Compras</h1>
</header>

<nav>
    <a href="#">Produtos</a>
    <a href="#">Carrinho</a>
    <a href="#">Finalizar Compra</a>
</nav>

<main>
    <div class="product">
        <?php foreach ($data as $row => $key): ?>
            <h2><?=$data['nome_produto']?></h2>
            <p><?=$data['descricao']?></p>
            <p>Valor: R$ <?=$data['valor_produto']?></p>
            <button onclick="adicionarAoCarrinho()">Adicionar ao Carrinho</button>
        <?php endforeach ?>
    </div>

    <div class="cart" id="carrinho">
        <h2>Carrinho</h2>
        <ul id="listaCarrinho"></ul>
        <form id="formFrete">
            <label for="cep">Calcular Frete:</label>
            <input type="text" id="cep" name="cep" placeholder="Digite o CEP" required>
            <button type="button" onclick="calcularFrete()">Calcular</button>
        </form>
        <p id="totalCarrinho">Total do Carrinho: R$ 0,00</p>
    </div>
</main>

<script>
    var freteFixo = 30.00; // Preço fixo do frete

    function adicionarAoCarrinho() {
        // Lógica simulada para adicionar o produto ao carrinho
        var nomeProduto = "Nome do Produto";
        var valorProduto = 50.00;

        // Crie um item do carrinho
        var itemCarrinho = document.createElement("li");
        itemCarrinho.textContent = nomeProduto + " - R$ " + valorProduto.toFixed(2);

        // Adicione o item à lista do carrinho
        var listaCarrinho = document.getElementById("listaCarrinho");
        listaCarrinho.appendChild(itemCarrinho);

        // Atualize o total do carrinho ao adicionar um novo produto
        atualizarTotalCarrinho();
        alert("Produto adicionado ao carrinho!");
    }

    function calcularFrete() {
        // Lógica simulada para calcular o frete usando o CEP fornecido
        var cep = document.getElementById("cep").value;

        // Adicione o frete fixo ao carrinho
        var totalFrete = freteFixo;
        alert("Frete calculado para o CEP: " + cep);

        // Atualize o total do carrinho ao calcular o frete
        atualizarTotalCarrinho();
    }

    function atualizarTotalCarrinho() {
        // Calcule o total do carrinho somando os preços dos produtos e o frete
        var totalProdutos = calcularTotalProdutos();
        var totalCarrinho = totalProdutos + freteFixo;

        // Atualize a exibição do total do carrinho
        var totalCarrinhoElement = document.getElementById("totalCarrinho");
        totalCarrinhoElement.textContent = "Total do Carrinho: R$ " + totalCarrinho.toFixed(2);
    }

    function calcularTotalProdutos() {
        // Lógica simulada para calcular o total dos produtos no carrinho
        // Percorra os itens do carrinho e some os preços dos produtos
        var listaCarrinho = document.getElementById("listaCarrinho");
        var itensCarrinho = listaCarrinho.getElementsByTagName("li");
        var totalProdutos = 0;

        for (var i = 0; i < itensCarrinho.length; i++) {
            var textoItem = itensCarrinho[i].textContent;
            var valorProduto = parseFloat(textoItem.split(" - R$ ")[1]);
            totalProdutos += valorProduto;
        }

        return totalProdutos;
    }
</script>

</body>
</html>