CREATE DATABASE sistema_SGF;
USE sistema_SGF;
CREATE TABLE Cargo (
    id_cargo INT AUTO_INCREMENT PRIMARY KEY,
    nome_cargo VARCHAR(100) NOT NULL,
    salario_base DECIMAL(10,2) NOT NULL
);
CREATE TABLE Funcionarios (
    id_funcionario INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    cpf VARCHAR(14) NOT NULL UNIQUE,
    data_admissao DATE NOT NULL,
    email VARCHAR(100),
    id_cargo INT,
    FOREIGN KEY (id_cargo) REFERENCES Cargo(id_cargo)
);
CREATE TABLE Folha_de_Pagamento (
    id_folha INT AUTO_INCREMENT PRIMARY KEY,
    id_funcionario INT,
    mes_referencia VARCHAR(7) NOT NULL,
    salario_base DECIMAL(10,2) NOT NULL,
    horas_extras DECIMAL(10,2) DEFAULT 0.00,
    descontos DECIMAL(10,2) DEFAULT 0.00,
    salario_liquido DECIMAL(10,2) NOT NULL,
    FOREIGN KEY (id_funcionario) REFERENCES Funcionarios(id_funcionario)
);