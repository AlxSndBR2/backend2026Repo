<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bem-vindo ao Equilibra</title>
    <style>
        /* Estilos da Tela de Entrada */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            /* Degradê moderno: Azul escuro para um verde água (focado em finanças) */
           background: linear-gradient(135deg, #ffffff 0%, #4f46e5 100%);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            color: white;
            text-align: center;
        }

        .container {
            padding: 20px;
        }

        h1 {
            font-size: 3rem;
            margin-bottom: 10px;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
        }

        p {
            font-size: 1.2rem;
            margin-bottom: 30px;
            opacity: 0.9;
        }

        .btn-entrar {
            display: inline-block;
            padding: 15px 40px;
            font-size: 1.2rem;
            font-weight: bold;
            color:#4f46e5;
            background-color: white;
            border: none;
            border-radius: 50px;
            cursor: pointer;
            text-decoration: none;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            box-shadow: 0 10px 20px rgba(0,0,0,0.2);
        }

        .btn-entrar:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 25px rgba(0,0,0,0.3);
            background-color: #f0f0f0;
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>Equilibra</h1>
        <p>Sua vida financeira em perfeita harmonia.</p>
        
        <a href="dashboard.php" class="btn-entrar">Acessar Meu Painel</a>
    </div>

</body>
</html>