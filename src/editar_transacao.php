<?php
session_start();
require_once 'conecta.php';

$id_logado = $_SESSION['usuario_id'];

// ==========================================
// 1. LÓGICA DE SALVAR A EDIÇÃO (UPDATE)
// ==========================================
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $stmt = $pdo->prepare("
            UPDATE transacoes 
            SET valor = ?, tipo = ?, data_transacao = ?, categoria = ? 
            WHERE id = ? AND usuario_id = ?
        ");

        $stmt->execute([
            $_POST['valor'],
            $_POST['tipo'],
            $_POST['data'],
            $_POST['categoria'],
            $_POST['id_transacao'], // O ID escondido que vem do formulário
            $id_logado
        ]);

        header("Location: relatorios.php?msg=editado");
        exit;
    } catch (Exception $e) {
        header("Location: relatorios.php?msg=erro");
        exit;
    }
}

// ==========================================
// 2. LÓGICA DE CARREGAR OS DADOS (SELECT)
// ==========================================
$id_da_url = $_GET['id']; // Pega o ID que veio na URL (ex: editar_transacao.php?id=5)

$stmt = $pdo->prepare("SELECT * FROM transacoes WHERE id = ? AND usuario_id = ?");
$stmt->execute([$id_da_url, $id_logado]);
$t = $stmt->fetch(PDO::FETCH_ASSOC);

// Se o usuário tentar editar uma transação que não existe ou não é dele, chuta de volta
if (!$t) {
    header("Location: relatorios.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Transação - Equilibra</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="layout-dashboard">

    <main class="main-content" style="margin-left: 0; display: flex; justify-content: center; padding-top: 50px;">
        <div style="background: #f8f9fa; padding: 40px; border-radius: 10px; width: 100%; max-width: 600px;">
            
            <h1 style="margin-bottom: 30px;">Editar Transação</h1>

            <form action="" method="POST" class="form-moderno">
                
                <input type="hidden" name="id_transacao" value="<?= $t['id'] ?>">

                <div class="row-inputs" style="display: flex; gap: 20px; margin-bottom: 20px;">
                    <div class="input-group" style="flex: 1;">
                        <label>Valor (R$)</label>
                        <input type="number" step="0.01" name="valor" value="<?= $t['valor'] ?>" required style="width: 100%; padding: 10px; border-radius: 5px; border: 1px solid #ccc;">
                    </div>

                    <div class="input-group" style="flex: 1;">
                        <label>Data</label>
                        <input type="date" name="data" value="<?= $t['data_transacao'] ?>" required style="width: 100%; padding: 10px; border-radius: 5px; border: 1px solid #ccc;">
                    </div>
                </div>

                <div class="row-inputs" style="display: flex; gap: 20px; margin-bottom: 30px;">
                    <div class="input-group" style="flex: 1;">
                        <label>Tipo</label>
                        <select name="tipo" required style="width: 100%; padding: 10px; border-radius: 5px; border: 1px solid #ccc;">
                            <option value="receita" <?= $t['tipo'] === 'receita' ? 'selected' : '' ?>>Receita (Entrada)</option>
                            <option value="despesa" <?= $t['tipo'] === 'despesa' ? 'selected' : '' ?>>Despesa (Saída)</option>
                        </select>
                    </div>

                    <div class="input-group" style="flex: 1;">
                        <label>Categoria</label>
                        <select name="categoria" required style="width: 100%; padding: 10px; border-radius: 5px; border: 1px solid #ccc;">
                            <optgroup label="Entradas">
                                <option value="Salário" <?= $t['categoria'] === 'Salário' ? 'selected' : '' ?>>Salário</option>
                                <option value="Freelance" <?= $t['categoria'] === 'Freelance' ? 'selected' : '' ?>>Freelance</option>
                                <option value="Investimentos" <?= $t['categoria'] === 'Investimentos' ? 'selected' : '' ?>>Investimentos</option>
                            </optgroup>
                            <optgroup label="Saídas">
                                <option value="Moradia" <?= $t['categoria'] === 'Moradia' ? 'selected' : '' ?>>Moradia (Aluguel)</option>
                                <option value="Contas" <?= $t['categoria'] === 'Contas' ? 'selected' : '' ?>>Contas</option>
                                <option value="Alimentação" <?= $t['categoria'] === 'Alimentação' ? 'selected' : '' ?>>Alimentação</option>
                                <option value="Lazer" <?= $t['categoria'] === 'Lazer' ? 'selected' : '' ?>>Lazer e Compras</option>
                                </optgroup>
                        </select>
                    </div>
                </div>

                <div style="display: flex; gap: 10px;">
                    <button type="submit" class="btn-primario" style="flex: 1; padding: 15px; background: #5a4fcf; color: white; border: none; border-radius: 5px; font-weight: bold; cursor: pointer;">Atualizar Transação</button>
                    <a href="relatorios.php" style="padding: 15px; background: #ccc; color: #333; text-decoration: none; border-radius: 5px; font-weight: bold; text-align: center;">Cancelar</a>
                </div>
            </form>
        </div>
    </main>

</body>
</html>