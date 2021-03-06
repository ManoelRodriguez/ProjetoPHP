<?php
require 'Banco.php';
require 'Jogador.php';
require 'Usuario.php';
$usuario = new Usuario('usuarios');
$usuarios = $usuario->select(); //$usuarios vira um vetor de vetores, e possui cada linha da tabela 
$email = $_POST['email'] ?? null;
$senha = $_POST['senha'] ?? null;
if (!is_null($_POST['email']))
{
    $usuario->select2($_POST['email'], $_POST['senha']);
    foreach ($usuarios as $usuario)
    {
        if ($usuario['email'] == $_POST['email'] && $usuario['senha'] == $_POST['senha'])
        {
            session_start(); //Habilita o VETOR $_SESSION
            $_SESSION['email'] = $email;
            $_SESSION['senha'] = $senha;
            header('LOCATION: principal.php?email=' . $_POST['email'] . '&senha' . $_POST['senha']);
        }
    }
}
session_start();
if (isset($_SESSION['email']))
{
    header('LOCATION: principal.php');
}
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>Login</title>
        <!-- Bootstrap core CSS -->
        <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom fonts for this template -->
        <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">

        <!-- Plugin CSS -->
        <link href="vendor/magnific-popup/magnific-popup.css" rel="stylesheet" type="text/css">

        <!-- Custom styles for this template -->
        <link href="css/freelancer.css" rel="stylesheet">

    </head>
    <body>
        <nav class="navbar navbar-expand-lg bg-secondary fixed-top text-uppercase" id="mainNav">
            <div class="container">
                <a class="navbar-brand js-scroll-trigger" href="index.php">Anota Gols</a>
                <button class="navbar-toggler navbar-toggler-right text-uppercase bg-primary text-white rounded" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">

                        <li class="nav-item mx-0 mx-lg-1">
                            <a class="nav-link py-3 px-0 px-lg-3 rounded" href="login.php" id="entrar" style="position: absolute; right: 10px; margin-top: -30px; font-size: 20px">Entrar</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

    <center>
        <h2 style="margin-top: 200px">Login</h2>  
        <form method="post" style="margin-top: 50px; width: 350px; ">
            <input type="email" name="email" placeholder="E-mail" class="form-control" style="margin-bottom: 20px;" required >
            <input type="password" name="senha" placeholder="Senha" class="form-control" style="margin-bottom: 20px;" required>
            <button class="btn btn-primary" name="login"><a style="text-decoration: none; color: black">Entrar</a></button>
        </form>
    </center>

    <center>

        <footer style="position: absolute; bottom: 0; width: 100%">
            <hr width="">
            Copyright &copy Fatec - 2019
        </footer>
    </center>

</body>
</html>