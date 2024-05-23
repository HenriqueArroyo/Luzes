<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <link rel="stylesheet" href="/css/styleCadastro.css">

    <title>Cadastro de Funcionario</title>
</head>
<body>
    <h1>Cadastro de Funcionario</h1>
    <form method="POST" action="processa_cadastro.php">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" required><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br>

        <label for="telefone">Telefone:</label>
        <input type="tel" id="telefone" name="telefone"><br>

        <label for="senha">Senha:</label>
        <input type="password" name="senha" id="senha"> 

        <div class="input-group mb-3">
  <label class="input-group-text" for="inputGroupSelect01">Setor:</label>
  <select class="form-select" id="inputGroupSelect01">
    <option selected>Escolha o setor</option>
    <option value="1">One</option>
    <option value="2">Two</option>
    <option value="3">Three</option>
  </select>
</div>

<label class="input-group-text" for="inputGroupSelect01">Responsavel:</label>
  <select class="form-select" id="inputGroupSelect01">
    <option selected>Escolha o responsavel</option>
    <option value="1">One</option>
    <option value="2">Two</option>
    <option value="3">Three</option>
  </select>
</div>





        <input type="submit" value="Cadastrar">
    </form>
</body>
</html>
