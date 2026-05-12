-- Tabela de Usuários
CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    senha VARCHAR(255) NOT NULL
);

-- Tabela de Transações com o Relacionamento
CREATE TABLE transacoes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    valor DECIMAL(10,2) NOT NULL,
    tipo VARCHAR(50) NOT NULL,
    data DATE NOT NULL,
    categoria VARCHAR(100) NOT NULL,
    usuario_id INT NOT NULL,
    CONSTRAINT fk_usuario_transacao FOREIGN KEY (usuario_id) REFERENCES usuarios(id) ON DELETE CASCADE
);