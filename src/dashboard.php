<?php
session_start();
require_once 'conecta.php';

// Pega direto da sessão
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
            <a class="menu-item ativo"><span>㗊</span> Visão Geral</a>
            <a href="relatorios.php" class="menu-item"><span>⏱️</span> Relatórios</a>
        </nav>
        </nav>

        <div class="sidebar-footer">
    
    <div class="usuario-info" style="display: flex; align-items: center; gap: 12px; padding: 15px 10px;">
        
        <div class="avatar" style="background-color: #cce0ff; width: 45px; height: 45px; border-radius: 50%; display: flex; align-items: center; justify-content: center;">
            
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#5a4fcf" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                <circle cx="12" cy="7" r="4"></circle>
            </svg>
            
        </div>
        
        <div class="dados-usuario" style="display: flex; flex-direction: column;">
            
            <strong style="color: #000; font-size: 15px;">
                <?= htmlspecialchars($_SESSION['usuario_nome'] ?? 'Usuário') ?>
            </strong>
            
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