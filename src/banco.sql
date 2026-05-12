CREATE TABLE transacoes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    valor DECIMAL(10,2) NOT NULL,
    tipo VARCHAR(50) NOT NULL,
    data_transacao DATE NOT NULL,
    categoria VARCHAR(100) NOT NULL
);