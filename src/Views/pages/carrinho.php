<?php
include_once '../../Controllers/produtoController.php';
$produtoController = new ProdutoController;
$idproduto = $_GET['idproduto'] ?? null;
$data = $produtoController->getProdutoById($idproduto);

$idusuario = $_SESSION['idusuario'] ?? null;
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
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
        }

        .product {
            border: 1px solid #ddd;
            background-color: #fff;
            padding: 1em;
            margin: 1em;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            text-align: center;
            max-width: 300px;
        }

        .cart {
            border: 1px solid #333;
            background-color: #fff;
            padding: 1em;
            margin: 1em;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            text-align: center;
            max-width: 300px;
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

        #listaCarrinho {
            list-style: none;
            padding: 0;
        }

        #listaCarrinho li {
            margin-bottom: 0.5em;
        }

        #totalCarrinho {
            margin-bottom: 0.5em;
        }

        #botaoCompra {
            display: none; /* Inicialmente, o botão de compra fica oculto */
            padding: 0.5em 1em;
            background-color: #4CAF50;
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
    <?php if (!empty($data)): ?>
        <div class="product">
            <h2 id="nome"><?= $data['nome_produto'] ?></h2>
            <p><?= $data['descricao'] ?></p>
            <p id="valor">Valor: R$ <?= $data['valor_produto'] ?></p>
            <form action="processar_compra.php" method="post">
                <input type="hidden" name="id_produto" value="<?= $data['idproduto'] ?>">
                <button type="button" onclick="adicionarAoCarrinho()">Adicionar ao Carrinho</button>
            </form>
        </div>
    <?php else: ?>
        <p>Nenhum produto encontrado.</p>
    <?php endif; ?>

    <div class="cart" id="carrinho">
        <h2>Carrinho</h2>
        <ul id="listaCarrinho"></ul>
        <form id="formFrete" method="post" action="../php/insertCompra.php">
            <label for="cep">Calcular Frete:</label>
            <input type="text" id="cep" name="cep" placeholder="Digite o CEP" required>
            <button type="button" onclick="calcularFrete()">Calcular</button>
            <input type="text" disabled id="totalCarrinho" name="valor_compra" value="<?=$data['valor_produto']+30.00?>" >
            
            <input type="hidden" name="idproduto" value="<?= $data['idproduto'] ?>">
            <input type="hidden" name="idusuario" value="<?= $idusuario ?>">
            
            <!-- Botão de compra -->
            <button id="botaoCompra" onclick="comprarProduto()" type="submit">Comprar Agora</button>
        </form>
    </div>
</main>

<script>
    var freteFixo = 30.00; // Preço fixo do frete

    function adicionarAoCarrinho() {
        // Lógica simulada para adicionar o produto ao carrinho
        var nomeProduto = document.getElementById("nome").textContent;
        var valorProduto = document.getElementById("valor").textContent.split("R$ ")[1];

        // Crie um item do carrinho
        var itemCarrinho = document.createElement("li");
        itemCarrinho.textContent = nomeProduto + " - R$ " + parseFloat(valorProduto).toFixed(2);

        // Adicione o item à lista do carrinho
        var listaCarrinho = document.getElementById("listaCarrinho");
        listaCarrinho.appendChild(itemCarrinho);

        // Atualize o total do carrinho ao adicionar um novo produto
        atualizarTotalCarrinho();
        alert("Produto adicionado ao carrinho!");

        // Exiba o botão de compra após adicionar o produto ao carrinho
        exibirBotaoCompra();
    }

    function calcularFrete() {
        // Lógica simulada para calcular o frete usando o CEP fornecido
        var cep = document.getElementById("cep").value;

        // Adicione o frete fixo ao carrinho
        var totalFrete = freteFixo;
        alert("Frete calculado para o CEP: " + cep);

        // Atualize o total do carrinho ao calcular o frete
        atualizarTotalCarrinho();

        // Exiba o botão de compra após calcular o frete
        exibirBotaoCompra();
    }

    function exibirBotaoCompra() {
        // Exibe o botão de compra quando
        var botaoCompra = document.getElementById("botaoCompra");
        botaoCompra.style.display = "block";
    }

    function comprarProduto() {
        // Lógica simulada para a compra do produto
        var listaCarrinho = document.getElementById("listaCarrinho");
        var totalProdutos = calcularTotalProdutos();
        var totalCarrinho = totalProdutos + freteFixo;

        // Aqui você pode enviar os dados para o backend para processar a compra
        alert("Produto comprado com sucesso!\nTotal: R$ " + totalCarrinho.toFixed(2));

        // Limpar o carrinho após a compra
        listaCarrinho.innerHTML = "";

        // Atualizar o total do carrinho
        atualizarTotalCarrinho();

        // Ocultar o botão de compra após a conclusão da compra
        var botaoCompra = document.getElementById("botaoCompra");
        botaoCompra.style.display = "none";
    }

    function calcularTotalProdutos() {
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

    function atualizarTotalCarrinho() {
        var totalProdutos = calcularTotalProdutos();
        var totalCarrinho = totalProdutos + freteFixo;

        var totalCarrinhoElement = document.getElementById("totalCarrinho");
        totalCarrinhoElement.value = totalCarrinho.toFixed(2);
    }
</script>

</body>
</html>




