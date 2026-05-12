<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Transação - Equilibra</title>
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
            <!-- Mantemos Relatórios ativo, pois o usuário veio de lá -->
            <a href="relatorios.php" class="menu-item ativo"><span>⏱️</span> Relatórios</a>
            <a href="configuracoes.php" class="menu-item"><span>⚙️</span> Configurações</a>
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
            <h1>Editar Transação</h1>
            <!-- O botão de voltar agora leva de volta para os relatórios -->
            <a href="relatorios.php" class="btn-voltar">← Voltar</a>
        </header>

        <div class="container-centralizado">
            <section class="painel-form">
                
                <!-- O action agora aponta para o script de atualizar -->
                <form action="atualizar_transacao.php" method="POST">
                    
                    <!-- CAMPO OCULTO MUITO IMPORTANTE: O ID DA TRANSAÇÃO -->
                    <!-- O PHP vai preencher o value com o ID correto para o banco de dados saber qual linha atualizar -->
                    <input type="hidden" name="id" value="2"> 

                    <div class="row-inputs">
                        <div class="input-group">
                            <label for="valor">Valor (R$)</label>
                            <!-- O value="150.00" é um exemplo de como o PHP vai trazer o dado do banco -->
                            <input type="number" step="0.01" id="valor" name="valor" value="150.00" required>
                        </div>

                        <div class="input-group">
                            <label for="data">Data</label>
                            <!-- O value traz a data antiga -->
                            <input type="date" id="data" name="data" value="2026-11-28" required>
                        </div>
                    </div>

                    <div class="row-inputs">
                        <div class="input-group">
                            <label for="tipo">Tipo</label>
                            <select id="tipo" name="tipo" required>
                                <option value="">Selecione...</option>
                                <option value="Receita">Receita (Entrada)</option>
                                <!-- O PHP vai colocar a palavra 'selected' na opção que já estava salva -->
                                <option value="Despesa" selected>Despesa (Saída)</option>
                            </select>
                        </div>

                        <div class="input-group">
                            <label for="categoria">Categoria</label>
                            <select id="categoria" name="categoria" required>
                                <option value="">Selecione uma categoria...</option>
                                
                                <optgroup label="Entradas (Receitas)">
                                    <option value="Salário">Salário</option>
                                    <option value="Freelance">Freelance</option>
                                    <option value="Investimentos">Investimentos</option>
                                    <option value="Outras Receitas">Outras Receitas</option>
                                </optgroup>

                                <optgroup label="Saídas (Despesas)">
                                    <!-- O PHP vai colocar 'selected' na categoria antiga da pessoa -->
                                    <option value="Moradia" selected>Moradia (Aluguel/Contas)</option>
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

                    <!-- O texto do botão muda para refletir a ação de edição -->
                    <button type="submit" class="btn-primario btn-block">Atualizar Transação</button>
                </form>

            </section>
        </div>

    </main>
</body>
</html>