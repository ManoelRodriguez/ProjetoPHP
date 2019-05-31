<?php
require 'Banco.php';
require 'Jogador.php';
require 'Usuario.php';
session_start();
if (!isset($_SESSION['email']))
{ //Se não houver usuário autenticado
    header('LOCATION: login.php'); //Redireciona para autenticação
}

$_SESSION['email'] ?? null;
$email = $_SESSION['email'];
$usuario = new Usuario('usuarios');
$usuarios = $usuario->select3($email);
if (!is_null($_POST['salvar']))
{
    $usuario->update($_POST['nome'], $_POST['sobrenome'], $_POST['email'], $_POST['senha']);
}
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>Anota Gols - Novos Jogadores</title>
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
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <?= $_SESSION['email'] ?>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="minhas-informacoes.php">Minhas Informações</a>
                                <a class="dropdown-item" href="classificacao.php">Classificação</a>
                                <a class="dropdown-item" href="classificacao.php">Alterações</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="sair.php">Sair</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

    <center>
        <h2 style="margin-top: 200px">Informações </h2>
        <hr class="star-light mb-5">
        <form method="post" style="margin-top: 50px; width: 300px; ">
            <?php foreach ($usuarios as $usuario): ?>
                <input type="text" name="nome" value="<?= $usuario['nome'] ?>" class="form-control" style="margin-bottom: 20px;">
                <input type="text" name="sobrenome" value="<?= $usuario['sobrenome'] ?>" class="form-control" style="margin-bottom: 20px;">
                <input type="text" name="email" value="<?= $usuario['email'] ?>" class="form-control" style="margin-bottom: 20px;">
                <input type="number" name="senha" value="<?= $usuario['senha'] ?>" class="form-control" style="margin-bottom: 20px;">
                <input class="btn btn-primary" type="submit" name="salvar" value="Salvar">
                <button class="btn btn-primary" style="margin-left: 50px" name="excluir"><a href="excluir-usuario.php?id=<?= $usuario['id'] ?>" style="text-decoration: none; color: white">Excluir</a></button>
            <?php endforeach; ?>

        </form>
    </center>

    <center>

        <footer>
            <hr width="">
            Copyright &copy Fatec - 2019
        </footer>
    </center>

</body>
</html>