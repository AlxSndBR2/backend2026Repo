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
            <a href="index.php" class="menu-item"><span>㗊</span> Visão Geral</a>
            <!-- Relatórios ganha a classe 'ativo' -->
            <a href="relatorios.php" class="menu-item ativo"><span>⏱️</span> Relatórios</a>
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

    <!-- CONTEÚDO PRINCIPAL -->
    <main class="main-content">
        
        <header class="top-header">
            <h1>Relatórios de Transações</h1>
            <a href="nova_transacao.php" class="btn-primario">+ Nova Transação</a>
        </header>

        <!-- Painel da Tabela -->
        <section class="painel-relatorios">
            
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
                        
                        <!-- Exemplo 1: Receita -->
                        <tr>
                            <td><strong>Freelance</strong></td>
                            <td>30/11/2026</td>
                            <td><span class="badge-tipo receita">Receita</span></td>
                            <td class="valor-verde">R$ 200,00</td>
                            <td>
                                <div class="grupo-acoes">
                                    <a href="editar_transacao.php?id=1" class="btn-acao btn-editar">✏️ Editar</a>
                                    
                                    <form action="excluir_transacao.php" method="POST" class="form-excluir">
                                        <input type="hidden" name="id" value="1">
                                        <button type="submit" class="btn-acao btn-excluir">🗑️ Excluir</button>
                                    </form>
                                </div>
                            </td>
                        </tr>

                        <!-- Exemplo 2: Despesa -->
                        <tr>
                            <td><strong>Moradia</strong></td>
                            <td>28/11/2026</td>
                            <td><span class="badge-tipo despesa">Despesa</span></td>
                            <td class="valor-vermelho">- R$ 150,00</td>
                           <td>
                                <div class="grupo-acoes">
                                    <a href="editar_transacao.php?id=1" class="btn-acao btn-editar">✏️ Editar</a>
                                    
                                    <form action="excluir_transacao.php" method="POST" class="form-excluir">
                                        <input type="hidden" name="id" value="1">
                                        <button type="submit" class="btn-acao btn-excluir">🗑️ Excluir</button>
                                    </form>
                                </div>
                            </td>

                    </tbody>
                </table>
            </div>
        </section>

    </main>
</body>
</html>