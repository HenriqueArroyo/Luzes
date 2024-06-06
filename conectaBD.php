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



     // Criação da tabela Setor
     $sql_setor = "CREATE TABLE IF NOT EXISTS Setor (
        ID_setor SERIAL PRIMARY KEY
    )";
    $pdo->exec($sql_setor);

    // Verificar se a tabela Setor já foi criada e dados inseridos
    $sql_check_setor = "SELECT COUNT(*) FROM Setor";
    $stmt_check_setor = $pdo->query($sql_check_setor);
    $setor_existe = $stmt_check_setor->fetchColumn();

     



    if ($setor_existe == 0) {
      

        // Inserção de dados na tabela Setor
        $sql_insert_setor = "INSERT INTO Setor (ID_setor) VALUES (1), (2)";
        $pdo->exec($sql_insert_setor);
    }

    $sql_responsavel = "CREATE TABLE IF NOT EXISTS Responsavel (
        ID_responsavel SERIAL PRIMARY KEY,
        NOME VARCHAR(100) NOT NULL,
        EMAIL VARCHAR(255) NOT NULL,
        SENHA VARCHAR(255),
        ID_setor int,
        FOREIGN KEY(ID_setor) REFERENCES Setor(ID_setor)
    )";
    $pdo->exec($sql_responsavel);

    // Verificar se a tabela Responsavel já foi criada e dados inseridos
    $sql_check_responsavel = "SELECT COUNT(*) FROM Responsavel";
    $stmt_check_responsavel = $pdo->query($sql_check_responsavel);
    $responsavel_existe = $stmt_check_responsavel->fetchColumn();



    if ($responsavel_existe == 0) {
        // Criação da tabela Responsavel
   

        // Inserção de dados na tabela Responsavel
        $sql_insert_responsavel = "INSERT INTO Responsavel (ID_responsavel, NOME, EMAIL, SENHA, ID_setor) 
            VALUES (1, 'Henrique Arroyo', 'henrique.arroyo@adm.com', '3232', 1), (2, 'Eduardo Ananias', 'eduardo.ananias@adm.com', '2012', 2), (3, 'Leonardo Vitalino', 'leonardo.vitalino@adm.com', '123', 2)";
        $pdo->exec($sql_insert_responsavel);
    }



    $sql_sala = "CREATE TABLE IF NOT EXISTS Sala (
        ID_sala SERIAL PRIMARY KEY,
        ID_setor int,
        FOREIGN KEY(ID_setor) REFERENCES Setor(ID_setor)
    )";
    $pdo->exec($sql_sala);
    // Verificar se a tabela Sala já foi criada e dados inseridos
    $sql_check_sala = "SELECT COUNT(*) FROM Sala";
    $stmt_check_sala = $pdo->query($sql_check_sala);
    $sala_existe = $stmt_check_sala->fetchColumn();


      // Criação da tabela Sala



    if ($sala_existe == 0) {
      

        // Inserção de dados na tabela Sala
        $sql_insert_sala = "INSERT INTO Sala (ID_sala, ID_setor) VALUES (1, 1), (2, 1), (3 , 1), (4, 2), (5, 2), (6, 2)";
        $pdo->exec($sql_insert_sala);
    }


        $sql_funcionario = "CREATE TABLE IF NOT EXISTS Funcionario(
            ID_funcionario SERIAL PRIMARY KEY,
            NOME VARCHAR(100) NOT NULL,
            EMAIL VARCHAR(255) NOT NULL,
            SENHA VARCHAR(255), 
            ID_responsavel int,
            FOREIGN KEY(ID_responsavel) REFERENCES Responsavel(ID_responsavel),  
            ID_sala int,
            FOREIGN KEY(ID_sala) REFERENCES Sala(ID_sala)
        )";
        $pdo->exec($sql_funcionario);


        $sql_estoque = "CREATE TABLE IF NOT EXISTS Estoque (
            ID_estoque SERIAL PRIMARY KEY,
            item VARCHAR(100) NOT NULL,
            quantidade INT NOT NULL,
            ID_sala int,
            FOREIGN KEY(ID_sala) REFERENCES Sala(ID_sala)
        )";
        $pdo->exec($sql_estoque);
 


        $sql_patrimonio = "CREATE TABLE IF NOT EXISTS Patrimonio (
            codigo VARCHAR(100) PRIMARY KEY,
            item VARCHAR(100) NOT NULL,
            status VARCHAR(100) NOT NULL,
            ID_sala int,
            FOREIGN KEY(ID_sala) REFERENCES Sala (ID_sala)
        )";
        $pdo->exec($sql_patrimonio);
    





} catch (PDOException $e) {
    echo "Falha ao conectar ao banco de dados. <br/>";
    die($e->getMessage());
}
?>