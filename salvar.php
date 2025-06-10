<?php
require_once 'model/PratoDAO.php';
require_once 'model/PratoDoCardapio.php';

// Validação
function validarDados($dados) {
    $erros = [];

// Verifica se o nome está definido, não está vazio e contém pelo menos uma letra
	if (!isset($dados['nome']) || trim($dados['nome']) === '') {
    $erros[] = "Nome é obrigatório.";
	} elseif (!preg_match('/[a-zA-ZÀ-ú\s]/u', $dados['nome'])) {
		$erros[] = "Nome deve conter letras válidas.";
	}

// Mesma lógica para a descrição
	if (!isset($dados['descricao']) || trim($dados['descricao']) === '') {
		$erros[] = "Descrição é obrigatória.";
	} elseif (!preg_match('/[a-zA-ZÀ-ú\s]/u', $dados['descricao'])) {
		$erros[] = "Descrição deve conter letras válidas.";
	}

    if (!isset($dados['tempo']) || !is_numeric($dados['tempo']) || $dados['tempo'] < 0) {
        $erros[] = "Tempo inválido.";
    }

    if (!isset($dados['preco']) || !is_numeric($dados['preco']) || $dados['preco'] < 0) {
        $erros[] = "Preço inválido.";
    }

    return $erros;
}

// Valida os dados
$erros = validarDados($_POST);
if ($erros) {
    echo "<!DOCTYPE html>
    <html lang='pt-br'>
    <head>
        <meta charset='UTF-8'>
		<link rel='icon' href='/favicon.png' type='image/png'>
        <title>Erros ao salvar prato</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                padding: 2em;
                background-color: #f4f4f4;
            }
            .erro-container {
                background: #ffe5e5;
                border: 1px solid #ff9999;
                padding: 20px;
                border-radius: 5px;
                max-width: 600px;
                margin: 0 auto;
                color: #990000;
            }
            .erro-container ul {
                padding-left: 20px;
            }
            .erro-container a {
                display: inline-block;
                margin-top: 15px;
                text-decoration: none;
                background: #d9534f;
                color: white;
                padding: 10px 20px;
                border-radius: 4px;
            }
            .erro-container a:hover {
                background: #c9302c;
            }
        </style>
    </head>
    <body>
        <div class='erro-container'>
            <h2>Ocorreu algum problema:</h2>
            <ul>";

foreach ($erros as $erro) {
    echo "<li>" . htmlspecialchars($erro) . "</li>";
}
$query = http_build_query([
    'nome' => $_POST['nome'] ?? '',
    'descricao' => $_POST['descricao'] ?? '',
    'tempo' => $_POST['tempo'] ?? '',
    'preco' => $_POST['preco'] ?? ''
]);
echo "    </ul>
        <a href='adicionar.php?$query'>Voltar ao formulário</a>
    </div>
</body>
</html>";
exit;
}


// Cria o objeto e atribui os dados
$prato = new PratoDoCardapio();
$prato->nome = $_POST['nome'];
$prato->descricao = $_POST['descricao'];
$prato->tempo_preparo = (int) $_POST['tempo']; // mapeia corretamente
$prato->preco = (float) $_POST['preco'];

// Salva no banco
$dao = new PratoDAO();
$dao->salvar($prato);

// Redireciona para o cardápio
header('Location: index.php');
exit;