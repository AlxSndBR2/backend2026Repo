<?php
require_once 'conecta.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // O ID vem escondido pelo formulário que o Alex já fez no front
    $id = $_POST['id'];

    $stmt = $pdo->prepare("DELETE FROM transacoes WHERE id = ?");
    $stmt->execute([$id]);

    // Depois de excluir, volta para a tela de relatórios
    header("Location: relatorios.php?msg=excluido");
    exit;
}
?>