<?php
require_once 'conecta.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        // Criptografa a senha no banco
        $senha_segura = password_hash($_POST['senha'], PASSWORD_DEFAULT);

        $stmt = $pdo->prepare("INSERT INTO usuarios (nome, email, senha) VALUES (?, ?, ?)");
        $stmt->execute([$nome, $email, $senha_segura]);

        // Redireciona para o login com sucesso
        header("Location: index.php?msg=cadastro_sucesso");
        exit;
    } catch (Exception $e) {
        header("Location: cadastro.php?msg=erro");
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro - Equilibra</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="login-card">
        
        <h1 class="titulo-logo">
            <img src="logoEquilibra.PNG" alt="Logo Equilibra" class="logo-img">
            Equilibra
        </h1>
        <p>Crie sua conta para gerenciar suas finanças.</p>

        <!-- O formulário aponta para o arquivo do PHP-->
        <form action="" method="POST">
            
            <div class="input-group">
                <label for="nome">Nome Completo</label>
                <input type="text" id="nome" name="nome" placeholder="Como quer ser chamado?" required>
            </div>

            <div class="input-group">
                <label for="email">E-mail</label>
                <input type="email" id="email" name="email" placeholder="seu@email.com" required>
            </div>

            <div class="input-group">
                <label for="senha">Senha</label>
                <input type="password" id="senha" name="senha" placeholder="Crie uma senha forte" required>
            </div>
            <button type="submit" class="btn-entrar">Criar Conta</button>
        </form>

        <div class="link-cadastro">
            Já tem uma conta? <a href="index.php">Faça login</a>
        </div>
    </div>

</body>
</html>