<?php
    $sucess = isset($_GET['sucess']) ? $_GET['sucess'] : null;
    if($sucess == 'true'){
        echo "<script>alert('Produto cadastrado com sucesso!')</script>";
    }else if($sucess == 'false'){
        echo "<script>alert('Erro ao cadastrar!')</script>";
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Produto</title>
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
            background-color: #444;
            padding: 0.5em;
        }

        nav a {
            color: #fff;
            text-decoration: none;
            padding: 0.5em 1em;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        nav a:hover {
            background-color: #555;
        }

        main {
            max-width: 600px;
            margin: 2em auto;
            padding: 1em;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        form {
            display: grid;
            gap: 1em;
        }

        label {
            display: block;
            margin-bottom: 0.5em;
        }

        input {
            width: 100%;
            padding: 0.5em;
            box-sizing: border-box;
        }

        textarea {
            width: 100%;
            padding: 0.5em;
            box-sizing: border-box;
        }

        button {
            padding: 0.5em 1em;
            background-color: #333;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #555;
        }
    </style>
</head>
<body>

<header>
    <h1>Cadastro de Produto</h1>
    <nav>
        <a href="../../../index.php">Página Inicial</a>
        <a href="./cadastro.php">Cadastro de Usuário</a>
        <a href="./login.php">Login</a>
    </nav>
</header>

<main>
    <form id="cadastroProdutoForm" action="../php/insertProduto.php" method="post">
        <label for="nomeJogo">Nome do Jogo:</label>
        <input type="text" id="nomeJogo" name="nome_produto" required>

        <label for="valorJogo">Valor do Jogo:</label>
        <input type="text" id="valorJogo" name="valor_produto" required>

        <label for="quantidadeJogo">Quantidade em Estoque:</label>
        <input type="text" id="quantidadeJogo" name="quantidade_produto" required>

        <label for="descricaoJogo">Descrição do Jogo:</label>
        <textarea id="descricaoJogo" name="descricao" rows="4" required></textarea>

        <button type="submit">Cadastrar Produto</button>
    </form>
</main>

</body>
</html>
