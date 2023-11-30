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

        .link-comprar {
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #0a0;
            color: #fff;
            padding: 0.5em;
            border-radius: 5px;
            text-decoration: none;
            margin-top: 1em;
        }

        .link-comprar img {
            width: 1.5em;
            margin-left: 0.5em;
        }

        .link-comprar:hover {
            background-color: #0d0;
        }


        a{
            text-decoration: none;
            color: #333;
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
        <img src="https://img.freepik.com/fotos-gratis/vista-da-configuracao-e-do-controlador-de-teclado-para-jogos-de-neon-iluminado_23-2149529357.jpg?w=1380&t=st=1701366882~exp=1701367482~hmac=1d5b6c4aa2a67c9944e8ddee09ce23937d38e9a204fec63ba402056955ec73e1" alt="Jogo 1">
        <h2><?=$row['nome_produto']?></h2>
        <p><?=$row['descricao']?></p>
        <p>Valor: R$ <?=$row['valor_produto']?></p>
        <p>Quantidade em Estoque: <?=$row['quantidade_produto']?></p>
        <a href="./src/Views/pages/carrinho.php?idproduto=<?=$row['idproduto']?>" class="link-comprar">Comprar<img src="./public/icons/cart3.svg" alt=""></a>
    </div>
    <?php endforeach?>

    <!-- Adicione mais cartões conforme necessário -->
</main>

</body>
</html>
