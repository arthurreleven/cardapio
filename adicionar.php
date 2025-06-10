<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Prato</title>
    <link rel="icon" href="../favicon.png" type="image/png">
    <link rel="shortcut icon" type="image/x-icon" href="/caminho/para/seu/favicon.ico">
	<link rel="apple-touch-icon" href="/caminho/para/seu/apple-touch-icon.png">
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
        <label>Nome:
            <input name="nome" value="<?= $nome ?>" required>
        </label><br><br>

        <label>Descrição:<br>
            <textarea name="descricao" required rows="4" cols="40"><?= $descricao ?></textarea>
        </label><br><br>

        <label>Tempo de preparo (min):
            <input type="number" name="tempo" value="<?= $tempo ?>" required>
        </label><br><br>

        <label>Preço (R$):
            <input type="number" step="0.01" name="preco" value="<?= $preco ?>" required>
        </label><br><br>

        <button type="submit">Salvar</button>
    </form>
    <p><a href="index.php">Voltar ao cardápio</a></p>
</body>
</html>