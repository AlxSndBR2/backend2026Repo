<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Configurações - Equilibra</title>
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
            <a href="relatorios.php" class="menu-item"><span>⏱️</span> Relatórios</a>
            <!-- Configurações ganha a classe 'ativo' -->
            <a href="configuracoes.php" class="menu-item ativo"><span>⚙️</span> Configurações</a>
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
            <h1>Configurações da Conta</h1>
        </header>

        <div class="grid-configuracoes">
            
            <!-- 1. Editar E-mail e Dados -->
            <section class="painel-form">
                <h3>👤 Dados do Perfil</h3>
                <form action="atualizar_perfil.php" method="POST">
                    <div class="input-group">
                        <label for="nome">Nome de Exibição</label>
                        <!-- O PHP vai preencher o value="" com o nome atual do banco -->
                        <input type="text" id="nome" name="nome" value="Admin" required>
                    </div>

                    <div class="input-group">
                        <label for="email">E-mail</label>
                        <!-- O PHP vai preencher o value="" com o email atual -->
                        <input type="email" id="email" name="email" value="admin@equilibra.com" required>
                    </div>

                    <button type="submit" class="btn-primario">Salvar Alterações</button>
                </form>
            </section>

            <!-- 2. Editar Senha -->
            <section class="painel-form">
                <h3>🔒 Segurança e Senha</h3>
                <form action="atualizar_senha.php" method="POST">
                    <div class="input-group">
                        <label for="senha_atual">Senha Atual</label>
                        <input type="password" id="senha_atual" name="senha_atual" placeholder="Digite sua senha atual" required>
                    </div>

                    <div class="input-group">
                        <label for="nova_senha">Nova Senha</label>
                        <input type="password" id="nova_senha" name="nova_senha" placeholder="Digite a nova senha" required>
                    </div>

                    <button type="submit" class="btn-primario">Atualizar Senha</button>
                </form>
            </section>

            <!-- 3. Excluir Conta (Zona de Perigo) -->
            <section class="painel-form zona-perigo">
                <h3>⚠️ Zona de Perigo</h3>
                <p>Ao excluir sua conta, todos os seus dados, registros financeiros e relatórios serão apagados permanentemente. Esta ação não pode ser desfeita.</p>
                
                <form action="excluir_conta.php" method="POST" onsubmit="return confirm('Tem certeza absoluta que deseja excluir sua conta? Esta ação é irreversível.');">
                    <button type="submit" class="btn-perigo">Excluir Minha Conta</button>
                </form>
            </section>

        </div>

    </main>
</body>
</html>