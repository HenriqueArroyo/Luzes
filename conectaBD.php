<?php
// Configurações do banco de dados
$endereco = 'localhost';
$banco = 'luzes';
$usuario = 'postgres';
$senha = 'postgres';

try {
    // Conexão com o banco de dados
    $pdo = new PDO(
        "pgsql:host=$endereco;port=5432;dbname=$banco",
        $usuario,
        $senha,
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
    );



    $sql_setor = "CREATE TABLE IF NOT EXISTS Setor (
    ID_setor SERIAL PRIMARY KEY);
    
    INSERT INTO Setor (ID_setor) 
                VALUES (1);
    INSERT INTO Setor (ID_setor) 
    VALUES (2);";
    $pdo->exec($sql_setor);

    // Criação da tabela responsavel
    $sql_responsavel = "CREATE TABLE IF NOT EXISTS Responsavel (
    ID_responsavel SERIAL PRIMARY KEY,
    NOME VARCHAR(100) NOT NULL,
    EMAIL VARCHAR(255) NOT NULL,
    SENHA VARCHAR(255),
    ID_setor int,
    FOREIGN KEY(ID_setor) REFERENCES Setor (ID_Setor)
    );
    
    INSERT INTO Responsavel (ID_responsavel, NOME, EMAIL, SENHA,  ID_setor) 
                VALUES (1, Admin, 0000@g.com, 000, 1);";
    $pdo->exec($sql_responsavel);

    $sql_sala = "CREATE TABLE IF NOT EXISTS Sala (
    ID_sala SERIAL PRIMARY KEY,
    ID_setor int,
    FOREIGN KEY(ID_setor) REFERENCES Setor (ID_Setor)
        );
    INSERT INTO Sala (ID_sala, ID_setor) 
    VALUES (1, 1);
    ";
    $pdo->exec($sql_sala);


    $sql_funcionario = "CREATE TABLE IF NOT EXISTS Funcionario(
        ID_funcionario SERIAL PRIMARY KEY,
        NOME VARCHAR(100) NOT NULL,
    EMAIL VARCHAR(255) NOT NULL,
    SENHA VARCHAR(255), 
    ID_responsavel int,
    FOREIGN KEY(ID_responsavel) REFERENCES responsavel (ID_responsavel),  
    ID_sala int,
    FOREIGN KEY(ID_sala) REFERENCES sala (ID_sala), )";
    $pdo->exec($sql_funcionario);


    $sql_estoque = "CREATE TABLE IF NOT EXISTS Estoque (
    ID_estoque SERIAL PRIMARY KEY,
    item VARCHAR(100) NOT NULL,
    quantidade INT NOT NULL,
    ID_sala int,
    FOREIGN KEY(ID_sala) REFERENCES sala (ID_sala)
    )";
    $pdo->exec($sql_estoque);

    $sql_patrimonio = "CREATE TABLE IF NOT EXISTS Patrimonio (
        codigo VARCHAR(100) PRIMARY KEY,
        item VARCHAR(100) NOT NULL,
        status VARCHAR(100) NOT NULL,
        ID_sala int,
        FOREIGN KEY(ID_sala) REFERENCES sala (ID_sala))";
    $pdo->exec($sql_patrimonio);






    echo "Tabelas criadas com sucesso!";
} catch (PDOException $e) {
    echo "Falha ao conectar ao banco de dados. <br/>";
    die($e->getMessage());
}
?>