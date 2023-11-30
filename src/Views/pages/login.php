<?php
    $sucess = isset($_GET['sucess']) ? $_GET['sucess'] : null;
    if($sucess == 'true'){
        echo "<script>alert('Cadastro realizado com sucesso!')</script>";
    }else if($sucess == 'false'){
        echo "<script>alert('Erro ao cadastrar!')</script>";
    }

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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
    <h1>Login</h1>
    <nav>
        <a href="../../../index.php">Página Inicial</a>
        <a href="./cadastro.php">Cadastro</a>
    </nav>
</header>

<main>
    <form id="loginForm" action="../php/login.php" method="post">
        <label for="usuario">Usuário:</label>
        <input type="text" id="usuario" name="usuario" required>

        <label for="senha">Senha:</label>
        <input type="password" id="senha" name="senha" required>

        <button type="submit">Entrar</button>
    </form>
</main>

</body>
</html>
