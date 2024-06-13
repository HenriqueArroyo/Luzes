<?php function template_header($title)
{
    echo <<<EOT
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title><?=$title?></title>
        <link href="css/style.css" rel="stylesheet" type="text/css"> 
        <link href="css/styleFooter.css" rel="stylesheet" type="text/css"> 
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css"> 
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    </head>

    <body> 

        <div class="navnav"> 
            <nav class="navbar navbar-expand-lg navbar-light bg-danger">
                <img id="logo" src="/img/SENAI_São_Paulo_logo-removebg-preview.png" alt="Logo">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                 <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse"> 
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="login.php">Login <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="cadastro.php">Registra <span class="sr-only">(current)</span></a>
                        </li> 
                    </ul>
                </div>
            </nav>
        </div>


            <div class="nav2">
            </div>
    </body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</html>
EOT;
}


function template_footer($footer)
{
    ?> 
    
    <div class= "container-fluid" > 
    <footer>
	<p>&copy; 2023 - Todos os direitos reservados</p>
	<nav>
		<ul>
			<li><a >Termos de uso</a></li>
			<li><a >Política de privacidade</a></li>
			<li><a >Sobre nós</a></li>
			<li><a >Contato</a></li>
		</ul>
	</nav>
</footer> 
</div>
<?php
}

function template_headerLog($title)
{
    echo <<<EOT
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title><?=$title?></title>
        <link href="css/style.css" rel="stylesheet" type="text/css">
                <link href="css/styleFooter.css" rel="stylesheet" type="text/css">

        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css"> 
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    </head>

    <body> 

        <div class="navnav"> 
            <nav class="navbar navbar-expand-lg navbar-light bg-danger">
                <img id="logo" src="/img/SENAI_São_Paulo_logo-removebg-preview.png" alt="Logo">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                 <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse"> 
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="listarFuncionarios.php">Gerenciamento <span class="sr-only">(current)</span></a>
                        </li>
                          <li class="nav-item active">
                            <a class="nav-link" href="cadastroEstoque.php">Novo Estoque <span class="sr-only">(current)</span></a>
                        </li>
                           <li class="nav-item active">
                            <a class="nav-link" href="cadastroPatrimonio.php">Novo Patrimonio <span class="sr-only">(current)</span></a>
                        </li>
                           <li class="nav-item active">
                            <a class="nav-link" href="index.php">Sair <span class="sr-only">(current)</span></a>
                        </li>
                    </ul>

                </div>
            </nav>
        </div>


            <div class="nav2">
            </div>
    </body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</html>
EOT;
}

function template_headerSala($title)
{
    echo <<<EOT
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title><?=$title?></title> 
        <link href="css/styleTabela.css" rel="stylesheet" type="text/css"> 
        <link href="css/style.css" rel="stylesheet" type="text/css">
        <link href="css/styleFooter.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css"> 
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    </head>

    <body> 

        <div class="navnav"> 
            <nav class="navbar navbar-expand-lg navbar-light bg-danger">
                <img id="logo" src="/img/SENAI_São_Paulo_logo-removebg-preview.png" alt="Logo">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                 <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse"> 
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="indexLog.php">Home <span class="sr-only">(current)</span></a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>


            <div class="nav2">
            </div>
    </body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</html>
EOT;
}