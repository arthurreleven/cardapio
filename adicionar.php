<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Prato</title>
    <link rel="icon" href="/favicon.png" type="image/png">
    <link rel="shortcut icon" type="image/x-icon" href="/favicon.ico"> <link rel="apple-touch-icon" href="/apple-touch-icon.png"> <style>
        /* Estilos base do body, semelhantes ao listar.php */
        body {
            font-family: Arial, sans-serif;
            padding: 2em;
            background-color: #f9f9f9;
            color: #333; /* Cor do texto padrão */
            line-height: 1.6; /* Melhorar legibilidade */
        }
        h1 {
            color: #333;
            margin-bottom: 1.5em; /* Espaço abaixo do título */
        }
        /* Estilização do formulário */
        form {
            background: #fff;
            border: 1px solid #ddd;
            padding: 25px;
            border-radius: 8px; /* Bordas arredondadas */
            max-width: 500px; /* Largura máxima para o formulário */
            margin: 0 auto; /* Centraliza o formulário na página */
            box-shadow: 0 2px 4px rgba(0,0,0,0.1); /* Sutil sombra */
        }
        /* Estilização das labels (rótulos) */
        label {
            display: block; /* Cada label em uma nova linha */
            margin-bottom: 1em; /* Espaço abaixo de cada label */
            font-weight: bold; /* Deixa o texto do rótulo em negrito */
            color: #555;
        }
        /* Estilização dos campos de input e textarea */
        input[type="text"],
        input[type="number"],
        textarea {
            width: calc(100% - 20px); /* Ocupa quase 100% da largura do pai menos o padding */
            padding: 10px;
            margin-top: 5px; /* Espaço entre label e input */
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 1em;
            box-sizing: border-box; /* Garante que padding e borda não aumentem a largura total */
        }
        textarea {
            resize: vertical; /* Permite redimensionar apenas verticalmente */
            min-height: 80px; /* Altura mínima para a textarea */
        }
        /* Estilização do botão Salvar, semelhante ao listar.php */
        button[type="submit"] {
            background: #28a745;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            font-size: 1.1em;
            cursor: pointer;
            transition: background 0.3s ease; /* Transição suave de cor ao passar o mouse */
            margin-top: 1em; /* Espaço acima do botão */
        }
        button[type="submit"]:hover {
            background: #218838;
        }
        /* Estilização do link "Voltar ao cardápio" */
        p a {
            display: inline-block;
            margin-top: 2em; /* Espaço acima do link */
            background: #007bff; /* Cor azul para o botão de voltar */
            color: white;
            padding: 10px 15px;
            text-decoration: none;
            border-radius: 4px;
            transition: background 0.3s ease;
        }
        p a:hover {
            background: #0056b3; /* Azul mais escuro ao passar o mouse */
        }
    </style>
</head>
<body>
    <?php
    // Bloco PHP para preencher os campos do formulário, se houver dados na URL
    $nome = isset($_GET['nome']) ? htmlspecialchars($_GET['nome']) : '';
    $descricao = isset($_GET['descricao']) ? htmlspecialchars($_GET['descricao']) : '';
    $tempo = isset($_GET['tempo']) ? (int) $_GET['tempo'] : '';
    $preco = isset($_GET['preco']) ? htmlspecialchars($_GET['preco']) : '';
    ?>

    <h1>Adicionar novo prato</h1>
    <form method="POST" action="salvar.php">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" value="<?= $nome ?>" required><br>

        <label for="descricao">Descrição:</label>
        <textarea id="descricao" name="descricao" required rows="4" cols="40"><?= $descricao ?></textarea><br>

        <label for="tempo">Tempo de preparo (min):</label>
        <input type="number" id="tempo" name="tempo" value="<?= $tempo ?>" required><br>

        <label for="preco">Preço (R$):</label>
        <input type="number" step="0.01" id="preco" name="preco" value="<?= $preco ?>" required><br>

        <button type="submit">Salvar</button>
    </form>
    <p><a href="index.php">Voltar ao cardápio</a></p>
</body>
</html>