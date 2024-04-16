<?php
// Inicie a sessão antes de qualquer saída
session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Contatos</title>
</head>

<body>
    <form action="" method="GET">
        <fieldset>
            <legend>Contatos</legend>
            <label>
                Nome:
                <input type="text" name="nome" required>
            </label>
            <label>
                Telefone:
                <input type="tel" name="telefone">
            </label>
            <label>
                Email:
                <input type="email" name="email" required>
            </label>
            <input type="submit" value="Cadastrar">
        </fieldset>
    </form>

    <?php
    // Inicialize $_SESSION['contatos'] como um array se ainda não existir
    if (!isset($_SESSION['contatos'])) {
        $_SESSION['contatos'] = [];
    }

    // Verifique se todos os campos do formulário foram enviados
    if (isset($_GET['nome'], $_GET['telefone'], $_GET['email'])) {
        // Sanitize e armazene os dados recebidos
        $nome = filter_var($_GET['nome'], FILTER_SANITIZE_STRING);
        $telefone = filter_var($_GET['telefone'], FILTER_SANITIZE_STRING);
        $email = filter_var($_GET['email'], FILTER_SANITIZE_EMAIL);

        // Crie um array com os dados recebidos
        $contato = [
            'nome' => $nome,
            'telefone' => $telefone,
            'email' => $email
        ];

        // Adicione o contato ao array de contatos na sessão
        $_SESSION['contatos'][] = $contato;
    }

    // Recupere a lista de contatos armazenada na sessão
    $contatos = $_SESSION['contatos'] ?? [];

    // Exiba os contatos em uma tabela
    if (!empty($contatos)) {
        echo "<table>";
        echo "<tr><th>Nome</th><th>Telefone</th><th>Email</th></tr>";
        foreach ($contatos as $contato) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($contato['nome'], ENT_QUOTES, 'UTF-8') . "</td>";
            echo "<td>" . htmlspecialchars($contato['telefone'], ENT_QUOTES, 'UTF-8') . "</td>";
            echo "<td>" . htmlspecialchars($contato['email'], ENT_QUOTES, 'UTF-8') . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "Nenhum contato cadastrado.";
    }
    ?>

</body>

</html>