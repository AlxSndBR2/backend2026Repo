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
            <div class="card">
                <div class="card-titulo">Entradas <span class="icone-verde">↑</span></div>
                <div class="card-valor valor-verde">R$ 11.200,00</div>
            </div>
            <div class="card">
                <div class="card-titulo">Saídas <span class="icone-vermelho">↓</span></div>
                <div class="card-valor valor-vermelho">R$ 10.357,00</div>
            </div>
            <div class="card">
                <div class="card-titulo">Saldo Total <span class="icone-cinza">$</span></div>
                <div class="card-valor valor-neutro">R$ 843,00</div>
            </div>
        </section>

        <section class="secao-transacoes">
            <h3 class="titulo-secao">Últimas Transações</h3>
            
            <div class="lista-transacoes">
                
                <div class="item-transacao">
                    <div class="info-esquerda">
                        <strong>Freelance</strong>
                        <span>2025-11-30</span>
                    </div>
                    <div class="info-direita">
                        <span class="valor-verde">+ R$ 200,00</span>
                        <a href="#" class="btn-lixeira">🗑️</a>
                    </div>
                </div>

                <div class="item-transacao">
                    <div class="info-esquerda">
                        <strong>Outras Despesas</strong>
                        <span>2025-11-28</span>
                    </div>
                    <div class="info-direita">
                        <span class="valor-vermelho">- R$ 7.000,00</span>
                        <a href="#" class="btn-lixeira">🗑️</a>
                    </div>
                </div>

                <div class="item-transacao">
                    <div class="info-esquerda">
                        <strong>Compras</strong>
                        <span>2025-11-27</span>
                    </div>
                    <div class="info-direita">
                        <span class="valor-vermelho">- R$ 150,00</span>
                        <a href="#" class="btn-lixeira">🗑️</a>
                    </div>
                </div>

            </div>
        </section>

    </main>
</body>
</html>