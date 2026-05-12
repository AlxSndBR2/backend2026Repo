<?php
require_once 'conecta.php';

if ($pdo) {
    echo "<h1>Conexão com o banco 'app_db' feita com sucesso! 🚀</h1>";
} else {
    echo "<h1>Erro na conexão.</h1>";
}
?>