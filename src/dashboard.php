<?php
session_start();
require_once 'conecta.php';

// Pega direto da sessão, sem rodeios
$id_logado = $_SESSION['usuario_id'];

// Soma das Receitas
$sql_receita = $pdo->prepare("SELECT SUM(valor) as total FROM transacoes WHERE tipo = 'receita' AND usuario_id = ?");
$sql_receita->execute([$id_logado]);
$receitas = $sql_receita->fetch()['total'] ?? 0;

// Soma das Despesas
$sql_despesa = $pdo->prepare("SELECT SUM(valor) as total FROM transacoes WHERE tipo = 'despesa' AND usuario_id = ?");
$sql_despesa->execute([$id_logado]);
$despesas = $sql_despesa->fetch()['total'] ?? 0;

$saldo = $receitas - $despesas;

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visão Geral - Equilibra</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="layout-dashboard">

    <aside class="sidebar">
        <div class="sidebar-logo">
            <img src="logoEquilibra.PNG" alt="Logo Equilibra" class="logo-sidebar">
            Equilibra
        </div>

        <nav class="sidebar-menu">
            <!-- Visão Geral ganha a classe 'ativo' -->
            <a href="index.php" class="menu-item ativo"><span>㗊</span> Visão Geral</a>
            <a href="relatorios.php" class="menu-item"><span>⏱️</span> Relatórios</a>
            <a href="configuracoes.php" class="menu-item"><span>⚙️</span> Configurações</a>
        </nav>
        </nav>

        <div class="sidebar-footer">
            <button class="btn-tema">🌙 Escuro</button>
            <div class="usuario-info">
                <div class="avatar">A</div>
                <div class="dados-usuario">
                    <strong>Admin</strong>
                    <a href="login.php" class="link-sair">Sair</a>
                </div>
            </div>
        </div>
    </aside>

    <main class="main-content">
        
        <header class="top-header">
            <h1>Visão Geral</h1>
            <a href="nova_transacao.php" class="btn-primario">+ Nova Transação</a>
        </header>

        <section class="cards-resumo">
            <div class="card-valor">
    <span class="titulo-card">Entradas</span>
    <h2 style="color: #28a745;">R$ <?= number_format($receitas, 2, ',', '.') ?></h2>
</div>

<div class="card-valor">
    <span class="titulo-card">Saídas</span>
    <h2 style="color: #dc3545;">R$ <?= number_format($despesas, 2, ',', '.') ?></h2>
</div>

<div class="card-valor">
    <span class="titulo-card">Saldo Total</span>
    <h2 style="color: #333;">R$ <?= number_format($saldo, 2, ',', '.') ?></h2>
</div>
    </main>
</body>
</html>