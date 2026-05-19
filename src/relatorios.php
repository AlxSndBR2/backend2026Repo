<?php
session_start();
require_once 'conecta.php';

// Pega direto da sessão
$id_logado = $_SESSION['usuario_id'];

// Busca as transações do usuário logado
$stmt = $pdo->prepare("SELECT * FROM transacoes WHERE usuario_id = ? ORDER BY data_transacao DESC");
$stmt->execute([$id_logado]);
$transacoes = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Sistema de Mensagens do Professor
$status = $_GET['msg'] ?? '';
$mensagens = [
    'sucesso' => 'Ação realizada com sucesso!',
    'excluido' => 'Transação removida do sistema.',
    'editado' => 'Transação atualizada com sucesso.',
    'erro' => 'Erro ao processar solicitação.',
    'tabela_pronta' => 'Banco de dados configurado!'
];
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relatórios - Equilibra</title>
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
            <!-- Relatórios ganha a classe 'ativo' -->
            <a href="relatorios.php" class="menu-item ativo"><span>⏱️</span> Relatórios</a>
        
        </nav>

        <div class="sidebar-footer">
            <button class="btn-tema">🌙 Escuro</button>
            <div class="usuario-info">
                <div class="avatar">A</div>
                <div class="dados-usuario"> 
                    <strong>Admin</strong>
                    <!-- Retirei o botão de Sair daqui, já que removemos o sistema de login -->
                </div>
            </div>
        </div>
    </aside>

    <!-- CONTEÚDO PRINCIPAL -->
    <main class="main-content">
        
        <header class="top-header">
            <h1>Relatórios de Transações</h1>
            <a href="nova_transacao.php" class="btn-primario">+ Nova Transação</a>
        </header>

        <!-- Painel da Tabela -->
        <section class="painel-relatorios">

            <!-- ALERTA DE MENSAGENS (Lógica do professor com estilo inline básico para garantir que apareça) -->
            <?php if ($status && isset($mensagens[$status])): ?>
                <div class="alert <?= $status === 'erro' ? 'error' : 'success' ?>" 
                     style="margin-bottom: 20px; padding: 15px; border-radius: 8px; font-weight: bold; text-align: center;
                            background-color: <?= $status === 'erro' ? '#f8d7da' : '#d4edda' ?>; 
                            color: <?= $status === 'erro' ? '#721c24' : '#155724' ?>;">
                    <?= $mensagens[$status] ?>
                </div>
            <?php endif; ?>
            
            <div class="tabela-responsiva">
                <table class="tabela-moderna">
                    <thead>
                        <tr>
                            <th>Categoria</th>
                            <th>Data</th>
                            <th>Tipo</th>
                            <th>Valor</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        <!-- LOOP PHP: Aqui ele repete a linha (<tr>) para cada item no banco -->
                        <?php foreach($transacoes as $t): ?>
                        <tr>
                            <td><strong><?= htmlspecialchars($t['categoria']) ?></strong></td>
                            
                            <!-- Formata a data para o padrão do Brasil -->
                            <td><?= date('d/m/Y', strtotime($t['data_transacao'])) ?></td>
                            
                            <!-- Usa o IF do PHP para decidir a cor da tag (Badge) -->
                            <td>
                                <?php if ($t['tipo'] === 'receita'): ?>
                                    <span class="badge-tipo receita">Receita</span>
                                <?php else: ?>
                                    <span class="badge-tipo despesa">Despesa</span>
                                <?php endif; ?>
                            </td>
                            
                            <!-- Usa o IF do PHP para decidir se o texto fica verde ou vermelho -->
                            <td class="<?= $t['tipo'] === 'receita' ? 'valor-verde' : 'valor-vermelho' ?>">
                                <?= $t['tipo'] === 'receita' ? '' : '- ' ?>R$ <?= number_format($t['valor'], 2, ',', '.') ?>
                            </td>
                            
                            <td>
                                <div class="grupo-acoes">
                                    <!-- Botão de Editar pegando o ID dinâmico -->
                                    <a href="editar_transacao.php?id=<?= $t['id'] ?>" class="btn-acao btn-editar">✏️ Editar</a>
                                    
                                    <!-- Formulário de Excluir do professor, adaptado com o seu botão -->
                                    <form action="excluir_transacao.php" method="POST" class="form-excluir" style="display:inline;" onsubmit="return confirm('Tem certeza que deseja excluir esta transação?')">
                                        <!-- O input hidden é um truque para enviar o ID sem bagunçar o CSS do seu botão -->
                                        <input type="hidden" name="id" value="<?= $t['id'] ?>">
                                        <button type="submit" class="btn-acao btn-excluir">🗑️ Excluir</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                        <!-- Fim do LOOP -->

                    </tbody>
                </table>
            </div>
        </section>

    </main>
</body>
</html>