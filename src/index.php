<?php
// Inicia a sessão para o sistema lembrar quem está logado
session_start();
require_once 'conecta.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $senha_digitada = $_POST['senha'];

    // Busca o usuário pelo email
    $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE email = ?");
    $stmt->execute([$email]);
    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

    // password_verify compara a senha digitada com a senha criptografada do banco
    if ($usuario && password_verify($senha_digitada, $usuario['senha'])) {
        
        // Login com sucesso! Guarda as informações na sessão
        $_SESSION['usuario_id'] = $usuario['id'];
        $_SESSION['usuario_nome'] = $usuario['nome'];
        
        // Joga para a tela principal
        header("Location: dashboard.php");
        exit;
    } else {
        // E-mail ou senha incorretos
        header("Location: index.php?msg=credenciais_invalidas");
        exit;
    }
}
?>

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

        <form action="" method="POST">
            
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