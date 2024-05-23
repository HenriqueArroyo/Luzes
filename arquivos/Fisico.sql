CREATE TABLE Funcionarios (
    ID_FUNCIONARIO SERIAL PRIMARY KEY,
    NOME VARCHAR(50) NOT NULL,
    SOBRENOME VARCHAR(50),
    CARGO VARCHAR(50),
    DATA_CONTRATACAO DATE NOT NULL,
    SALARIO NUMERIC,
    NUM_AGENCIA INT,
    FOREIGN KEY(NUM_AGENCIA) REFERENCES Agencia (NUM_AGENCIA)
);

CREATE TABLE Agencia (
    NUM_AGENCIA SERIAL PRIMARY KEY,
    ENDERECO VARCHAR(255) NOT NULL,
    CIDADE VARCHAR(50) NOT NULL,
    CONTATO VARCHAR(14) NOT NULL,
    ESTADO VARCHAR(50) NOT NULL
);

CREATE TABLE Pagamento (
    ID_PAGAMENTO SERIAL,
    DATA_PAGAMENTO DATE NOT NULL,
    STATUS_PAGAMENTO VARCHAR(50) NOT NULL,
    FORMA_PAGAMENTO VARCHAR(50) NOT NULL,
    VALOR NUMERIC NOT NULL,
    ID_COMPROVANTE SERIAL,
    COMPROVANTE TEXT,
    PRIMARY KEY(ID_PAGAMENTO, ID_COMPROVANTE)
);

CREATE TABLE Carro (
    ID_CARRO SERIAL PRIMARY KEY,
    ANO INT NOT NULL,
    PLACA INT NOT NULL,
    MODELO VARCHAR(30) NOT NULL,
    TIPO VARCHAR(100) NOT NULL,
    MARCA VARCHAR(50) NOT NULL,
    DISPONIBILIDADE VARCHAR(20) NOT NULL
);

CREATE TABLE Manutencao (
    ID_MANUTENCAO SERIAL PRIMARY KEY,
    CUSTO NUMERIC NOT NULL,
    ICM NUMERIC NOT NULL,
    DESCRICAO TEXT,
    TIPO_MANUTENCAO VARCHAR(50) NOT NULL,
    DATA_MANUTENCAO DATE NOT NULL
);

CREATE TABLE Feedback (
    ID_FEEDBACK SERIAL PRIMARY KEY,
    DATA_FEEDBACK DATE NOT NULL,
    AVALIACAO VARCHAR(20),
    COMENTARIO TEXT NOT NULL
);

CREATE TABLE Cliente (
    ID_CLIENTE SERIAL PRIMARY KEY,
    NOME VARCHAR(100) NOT NULL,
    SOBRENOME VARCHAR(50) NOT NULL,
    ENDERECO VARCHAR(255) NOT NULL,
    CIDADE VARCHAR(50) NOT NULL,
    ESTADO VARCHAR(50) NOT NULL,
    EMAIL VARCHAR(255) NOT NULL,
    TELEFONE VARCHAR(14),
    ID_PAGAMENTO SERIAL,
    FOREIGN KEY(ID_PAGAMENTO) REFERENCES Pagamento (ID_PAGAMENTO)
);

CREATE TABLE Locacao (
    ID_LOCALIZACAO SERIAL PRIMARY KEY,
    DATA_LOCACAO DATE NOT NULL,
    DATA_DEVOLUCAO DATE NOT NULL,
    VALOR_TOTAL NUMERIC NOT NULL,
    ID_CLIENTE INT,
    ID_CARRO INT,
    FOREIGN KEY(ID_CLIENTE) REFERENCES Cliente (ID_CLIENTE),
    FOREIGN KEY(ID_CARRO) REFERENCES Carro (ID_CARRO)
);

CREATE TABLE Recebe (
    ID_CARRO INT,
    ID_MANUTENCAO INT,
    FOREIGN KEY(ID_CARRO) REFERENCES Carro (ID_CARRO),
    FOREIGN KEY(ID_MANUTENCAO) REFERENCES Manutencao (ID_MANUTENCAO)
);

CREATE TABLE Envia (
    ID_ENVIA SERIAL PRIMARY KEY,
    OBSERVACAO TEXT,
    ID_CLIENTE INT,
    ID_FEEDBACK INT,
    FOREIGN KEY(ID_CLIENTE) REFERENCES Cliente (ID_CLIENTE),
    FOREIGN KEY(ID_FEEDBACK) REFERENCES Feedback (ID_FEEDBACK)
);
