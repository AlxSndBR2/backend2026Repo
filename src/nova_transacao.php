<?php
session_start();
require_once 'conecta.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        // Usa a sessão direto na hora de salvar
        $id_logado = $_SESSION['usuario_id'];

        $stmt = $pdo->prepare("
            INSERT INTO transacoes 
            (usuario_id, valor, tipo, data_transacao, categoria) 
            VALUES (?, ?, ?, ?, ?)
        ");

        $stmt->execute([
            $id_logado, 
            $_POST['valor'],
            $_POST['tipo'],
            $_POST['data'],
            $_POST['categoria']
        ]);

        header("Location: relatorios.php?msg=sucesso");
        exit;

    } catch (Exception $e) {
        header("Location: relatorios.php?msg=erro");
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nova Transação - Equilibra</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="layout-dashboard">

    <!-- BARRA LATERAL (SIDEBAR) -->
    <aside class="sidebar">
        <div class="sidebar-logo">
            <img src="logoEquilibra.PNG" alt="Logo Equilibra" class="logo-sidebar">
            Equilibra
        </div>

        <nav class="sidebar-menu">
            <a href="dashboard.php" class="menu-item"><span>㗊</span> Visão Geral</a>
            <a href="relatorios.php" class="menu-item"><span>⏱️</span> Relatórios</a>
            <a href="configuracoes.php" class="menu-item"><span>⚙️</span> Configurações</a>
        </nav>

        <div class="sidebar-footer">
            <button class="btn-tema">🌙 Escuro</button>
            <div class="usuario-info">
                <div class="avatar">A</div>
                <div class="dados-usuario">
                    <strong>Admin</strong>
                    <!-- Como removemos o login, tirei o link que daria erro -->
                </div>
            </div>
        </div>
    </aside>

    <!-- CONTEÚDO PRINCIPAL -->
    <main class="main-content">
        
        <header class="top-header">
            <h1>Adicionar Transação</h1>
            <a href="relatorios.php" class="btn-voltar">← Voltar</a>
        </header>

        <!-- Formulário de Transação -->
        <div class="container-centralizado">
            <section class="painel-form">
                
                <!-- Action vazio faz o formulário enviar os dados para este mesmo arquivo -->
                <form action="" method="POST">
                    
                    <div class="row-inputs">
                        <div class="input-group">
                            <label for="valor">Valor (R$)</label>
                            <input type="number" step="0.01" id="valor" name="valor" placeholder="0.00" required>
                        </div>

                        <div class="input-group">
                            <label for="data">Data</label>
                            <input type="date" id="data" name="data" required>
                        </div>
                    </div>

                    <div class="row-inputs">
                        <div class="input-group">
                            <label for="tipo">Tipo</label>
                            <select id="tipo" name="tipo" required>
                                <option value="">Selecione...</option>
                                <!-- values em minúsculo para não quebrar a lógica de cores do relatório -->
                                <option value="receita">Receita (Entrada)</option>
                                <option value="despesa">Despesa (Saída)</option>
                            </select>
                        </div>

                        <div class="input-group">
                            <label for="categoria">Categoria</label>
                            <select id="categoria" name="categoria" required>
                                <option value="">Selecione uma categoria...</option>
                                
                                <!-- Agrupamento de Receitas -->
                                <optgroup label="Entradas (Receitas)">
                                    <option value="Salário">Salário</option>
                                    <option value="Freelance">Freelance</option>
                                    <option value="Investimentos">Investimentos</option>
                                    <option value="Outras Receitas">Outras Receitas</option>
                                </optgroup>

                                <!-- Agrupamento de Despesas -->
                                <optgroup label="Saídas (Despesas)">
                                    <option value="Moradia">Moradia (Aluguel)</option>
                                    <option value="Contas">Contas</option>
                                    <option value="Alimentação">Alimentação</option>
                                    <option value="Transporte">Transporte</option>
                                    <option value="Saúde">Saúde</option>
                                    <option value="Educação">Educação</option>
                                    <option value="Lazer">Lazer e Compras</option>
                                    <option value="Outras Despesas">Outras Despesas</option>
                                </optgroup>
                            </select>
                        </div>
                    </div>

                    <button type="submit" class="btn-primario btn-block">Salvar Transação</button>
                </form>
            </section>
        </div>

    </main>
</body>
</html>