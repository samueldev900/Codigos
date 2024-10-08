
CREATE TABLE IF NOT EXISTS Tb_contrato (
    `codigo` VARCHAR(6) PRIMARY KEY,
    `prazo` DATETIME NOT NULL,
    `valor` INT NOT NULL,
    `data_inclusao` DATETIME DEFAULT CURRENT_TIMESTAMP,
    `convenio_servico` INT NOT NULL,
    FOREIGN KEY (convenio_servico) REFERENCES Tb_convenio_servico(codigo)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS Tb_convenio_servico(
`codigo` INT PRIMARY KEY AUTO_INCREMENT,
`convenio` INT NOT NULL,
`servico` VARCHAR(100),
FOREIGN KEY (convenio) REFERENCES Tb_convenio(codigo)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS Tb_convenio (
    `codigo` INT PRIMARY KEY AUTO_INCREMENT,
    `convenio` VARCHAR(100) NOT NULL,
    `verba` DECIMAL(15,2) NOT NULL,
    `banco` INT NOT NULL,
    FOREIGN KEY (`banco`) REFERENCES Tb_banco(`codigo`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS Tb_banco(
    `codigo` INT PRIMARY KEY AUTO_INCREMENT,
    `nome` VARCHAR(100)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;


-- Inserindo dados na tabela Tb_banco
INSERT INTO Tb_banco (nome) VALUES
('Banco do Brasil'),
('Caixa Econômica Federal'),
('Bradesco'),
('Santander'),
('Itaú');

-- Inserindo dados na tabela Tb_convenio
INSERT INTO Tb_convenio (convenio, verba, banco) VALUES
('Convênio Educacional', 500000.00, 1),  -- Banco do Brasil
('Convênio de Saúde', 800000.00, 2),     -- Caixa Econômica Federal
('Convênio de Transporte', 300000.00, 3),-- Bradesco
('Convênio Habitacional', 1000000.00, 4),-- Santander
('Convênio Alimentação', 450000.00, 5);  -- Itaú

-- Inserindo dados na tabela Tb_convenio_servico
INSERT INTO Tb_convenio_servico (convenio, servico) VALUES
(1, 'Bolsa de Estudos'),
(2, 'Atendimento Hospitalar'),
(3, 'Passe Estudantil'),
(4, 'Financiamento Imobiliário'),
(5, 'Cesta Básica');

-- Inserindo dados na tabela Tb_contrato
INSERT INTO Tb_contrato (prazo, valor, convenio_servico) VALUES
('2025-12-31 23:59:59', 200000, 1),
('2026-06-30 23:59:59', 400000, 2),
('2025-03-15 23:59:59', 150000, 3),
('2027-01-01 23:59:59', 1000000, 4),
('2024-11-30 23:59:59', 300000, 5);

/* ================================= FUNÇÃO PARA CRIAR IDs COM CÓDIGOS DE 6 DIGITOS DE NUMEROS ALEATÓRIOS (usei chat gpt pra essa função)============================================= */
DELIMITER //

CREATE TRIGGER before_insert_tb_contrato
BEFORE INSERT ON Tb_contrato
FOR EACH ROW
BEGIN
    DECLARE new_codigo VARCHAR(6);
    DECLARE exists_flag INT DEFAULT 1; 

    WHILE exists_flag DO
        
        SET new_codigo = LPAD(FLOOR(RAND() * 1000000), 6, '0');

        
        SELECT COUNT(*) INTO exists_flag
        FROM Tb_contrato
        WHERE codigo = new_codigo;

        SET exists_flag = IF(exists_flag = 0, 0, 1);
    END WHILE;

    SET NEW.codigo = new_codigo; 
END;

//

DELIMITER ;
/* ============================================================================ */

/* CONSULTA FEITA NA ATIVIDADE NUMERO 1 */

SELECT ctr.codigo, ctr.prazo, ctr.valor,ctr.data_inclusao, conv.verba, banco.nome
FROM tb_contrato AS ctr
JOIN tb_convenio_servico AS con_serv 
    ON ctr.convenio_servico = con_serv.codigo
JOIN tb_convenio AS conv
    ON con_serv.convenio = conv.codigo
JOIN tb_banco AS banco
    ON conv.banco = banco.codigo;


/* ===================Atividade 2================== */

INSERT INTO Tb_convenio (convenio, verba, banco) VALUES
('Convênio Estudantil', 500000.00, 1),  -- Banco do Brasil
('Convênio Esportivo', 450000.00, 2),   -- Caixa Econômica Federal
('Convênio Cultural', 300000.00, 3),    -- Bradesco
('Convênio Rural', 500000.00, 1),       -- Banco do Brasil
('Convênio Tecnológico', 800000.00, 2), -- Caixa Econômica Federal
('Convênio Urbano', 450000.00, 5),      -- Itaú
('Convênio Ambiental', 500000.00, 1),   -- Banco do Brasil
('Convênio de Lazer', 300000.00, 3),    -- Bradesco
('Convênio Social', 1000000.00, 4),     -- Santander
('Convênio Educacional Avançado', 800000.00, 2); -- Caixa Econômica Federal


INSERT INTO Tb_contrato (prazo, valor, convenio_servico) VALUES
('2025-12-31 23:59:59', 200000, 1),
('2026-06-30 23:59:59', 500000, 2),
('2025-03-15 23:59:59', 150000, 3),
('2027-01-01 23:59:59', 200000, 4),
('2026-11-30 23:59:59', 500000, 5),
('2024-12-15 23:59:59', 200000, 1),
('2027-02-20 23:59:59', 800000, 2),
('2025-10-30 23:59:59', 150000, 3),
('2026-07-15 23:59:59', 1000000, 4),
('2025-09-01 23:59:59', 500000, 5);


/* Resultado da consulta */

SELECT banco.nome AS banco_nome, 
       MIN(ctr.data_inclusao) AS data_inclusao_antiga, 
       MAX(ctr.data_inclusao) AS data_inclusao_recente, 
       SUM(conv.verba) AS total_verba, 
       SUM(ctr.valor) AS total_valor
FROM tb_contrato AS ctr
JOIN tb_convenio_servico AS con_serv 
    ON ctr.convenio_servico = con_serv.codigo
JOIN tb_convenio AS conv
    ON con_serv.convenio = conv.codigo
JOIN tb_banco AS banco
    ON conv.banco = banco.codigo
GROUP BY banco.nome;