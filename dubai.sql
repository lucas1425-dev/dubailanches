CREATE DATABASE sistema_lanches;
USE sistema_lanches;

CREATE TABLE pedidos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome_cliente VARCHAR(100) NOT NULL,
    rua VARCHAR(100) NOT NULL,
    bairro VARCHAR(100) NOT NULL,
    numero VARCHAR(10) NOT NULL,
    forma_pagamento VARCHAR(50) NOT NULL,
    tipo_entrega ENUM('retirada', 'delivery') NOT NULL,
    lanches TEXT NOT NULL,
    adicionais TEXT,
    data TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
CREATE TABLE historico_pedidos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome_cliente VARCHAR(255),
    rua VARCHAR(255),
    bairro VARCHAR(255),
    numero VARCHAR(10),
    forma_pagamento VARCHAR(50),
    tipo_entrega VARCHAR(50),
    lanches TEXT,
    adicionais TEXT,
    data DATETIME,
    status VARCHAR(50)
);
ALTER TABLE pedidos ADD COLUMN status VARCHAR(50) DEFAULT 'Pendente';
ALTER TABLE pedidos ADD COLUMN telefone VARCHAR(15) NOT NULL;
select * from pedidos;
select * from historico_pedidos;

-- drop database sistema_lanches;