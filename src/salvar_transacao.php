<?php
require_once 'conecta.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $valor = $_POST['valor'];
    $tipo = $_POST['tipo'];
    $data = $_POST['data_transacao'];
    $categoria = $_POST['categoria'];

    // SQL sem o campo usuario_id
    $sql = "INSERT INTO transacoes (valor, tipo, data_transacao, categoria) VALUES (?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    
    if ($stmt->execute([$valor, $tipo, $data, $categoria])) {
        header("Location: dashboard.php?sucesso=1");
    } else {
        echo "Erro ao salvar!";
    }
}
?>