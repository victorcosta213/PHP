<?php
// Iniciar a sessão no início do arquivo
session_start();
?>
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Gerenciador de Tarefas</title>
</head>
<body>
    <h1>Gerenciador de Tarefas</h1>

    <!-- Formulário para adicionar nova tarefa -->
    <form action="" method="get">
        <fieldset>
            <legend>Nova Tarefa</legend>
            <label>
                Tarefa:
                <input type="text" name="nome" required>
            </label>
            <input type="submit" value="Cadastrar">
        </fieldset>
    </form>

    <?php
    // Adicionar nova tarefa à sessão
    if (isset($_GET['nome'])) {
        // Verificar se o array de tarefas existe na sessão, se não, criar um novo
        if (!isset($_SESSION['lista_tarefas'])) {
            $_SESSION['lista_tarefas'] = array();
        }
        // Adicionar a nova tarefa ao array
        $_SESSION['lista_tarefas'][] = $_GET['nome'];
    }

    // Obter lista de tarefas da sessão
    $lista_tarefas = isset($_SESSION['lista_tarefas']) ? $_SESSION['lista_tarefas'] : array();

    // Exibir todas as tarefas na tabela
    ?>
    <table>
        <tr>
            <th>Tarefas</th>
        </tr>
        <?php foreach ($lista_tarefas as $tarefa): ?>
            <tr>
                <td><?php echo htmlspecialchars($tarefa, ENT_QUOTES, 'UTF-8'); ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>