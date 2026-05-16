<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro - Equilibra</title>
    <!-- Puxando o mesmo visual do Login -->
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <!-- Usamos a mesma classe 'login-card' para manter o mesmo tamanho e estilo -->
    <div class="login-card">
        
        <h1 class="titulo-logo">
            <img src="logoEquilibra.PNG" alt="Logo Equilibra" class="logo-img">
            Equilibra
        </h1>
        <p>Crie sua conta para gerenciar suas finanças.</p>

        <!-- O formulário aponta para o arquivo que os meninos do PHP vão criar -->
        <form action="salvar_usuario.php" method="POST">
            
            <div class="input-group">
                <label for="nome">Nome Completo</label>
                <!-- Novo campo de Nome -->
                <input type="text" id="nome" name="nome" placeholder="Como quer ser chamado?" required>
            </div>

            <div class="input-group">
                <label for="email">E-mail</label>
                <!-- O name="email" exato para o banco de dados -->
                <input type="email" id="email" name="email" placeholder="seu@email.com" required>
            </div>

            <div class="input-group">
                <label for="senha">Senha</label>
                <!-- O name="senha" exato para o banco de dados -->
                <input type="password" id="senha" name="senha" placeholder="Crie uma senha forte" required>
            </div>

            <!-- Podemos usar a mesma classe btn-entrar para o botão ficar com o mesmo visual -->
            <button type="submit" class="btn-entrar">Criar Conta</button>

        </form>

        <div class="link-cadastro">
            Já tem uma conta? <a href="index.php">Faça login</a>
        </div>
    </div>

</body>
</html>