<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Equilibra</title>
    
    <link rel="stylesheet" href="style.css">

</head>
<body>

    <div class="login-card">
        <h1 class="titulo-logo">
            <img src="logoEquilibra.PNG" alt="Logo Equilibra" class="logo-img">
            Equilibra
        </h1>
        <p>Acesse sua conta para gerenciar suas finanças.</p>

        <form action="login_backend.php" method="POST">
            
            <div class="input-group">
                <label for="email">E-mail</label>
                <input type="email" id="email" name="email" placeholder="seu@email.com" required>
            </div>

            <div class="input-group">
                <label for="senha">Senha</label>
                <input type="password" id="senha" name="senha" placeholder="••••••••" required>
            </div>

            <button type="submit" class="btn-entrar">Entrar</button>

        </form>

        <div class="link-cadastro">
            Ainda não tem uma conta? <a href="cadastro.php">Crie agora</a>
        </div>
    </div>

</body>
</html>