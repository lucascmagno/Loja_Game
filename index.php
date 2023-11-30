<?php

require_once (__DIR__.'/src/Controllers/produtoController.php');

$clienteController = new ProdutoController;

$data = $clienteController->getAll();

if($data == null){
    echo "<p>Nenhum produto cadastrado!</p>";
}

$sucess = $_GET['sucess'] ?? null;
if($sucess == 'true'){
    echo "<script>alert('Login realizado com sucesso!')</script>";
}else if($sucess == 'false'){
    echo "<script>alert('Erro ao realizar Login!')</script>";
}

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loja de Jogos</title>
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

        .card {
            border: 1px solid #ddd;
            background-color: #fff;
            padding: 1em;
            margin: 1em;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .card img {
            max-width: 100%;
            height: auto;
            border-radius: 5px;
            margin-bottom: 1em;
        }

        @media only screen and (min-width: 600px) {
            main {
                display: flex;
                flex-wrap: wrap;
                justify-content: space-around;
            }

            .card {
                flex: 0 0 48%;
            }
        }

        @media only screen and (min-width: 900px) {
            .card {
                flex: 0 0 30%;
            }
        }
    </style>
</head>
<body>

<header>
    <h1>Loja de Jogos</h1>
</header>

<nav>
    <a href="./src/Views/pages/cadastroProduto.php">Cadastre um Produto
    </a>
    <a href="./src/Views/pages/cadastro.php">Cadastro de Clientes</a>
    <a href="./src/Views/pages/login.php">Login</a>
    <a href="./src/Views/pages/carrinho.php">Seu Carrinho</a>
    <a href="#">Fale Conosco</a>
</nav>

<main>
    <?php foreach ($data as $row):?>
    <div class="card">
        <img src="https://lucascmagno.github.io/curso-html5-e-css3/img/spider2.jpg" alt="Jogo 1">
        <h2><?=$row['nome_produto']?></h2>
        <p><?=$row['descricao']?></p>
        <p>Valor: R$ <?=$row['valor_produto']?></p>
        <p>Quantidade em Estoque: <?=$row['quantidade_produto']?></p>
    </div>
    <?php endforeach?>

    <!-- Adicione mais cartões conforme necessário -->
</main>

</body>
</html>
