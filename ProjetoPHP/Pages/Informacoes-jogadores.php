<?php
require 'Banco.php';
require 'Jogador.php';
require 'Usuario.php';
$id = $_GET['id'] ?? null;
$jogador = new Jogador('jogadores');
$jogadores = $jogador->select2($id);
//if(!is_null('salvar')){
//    $jogador->update($_POST['nome'], $_POST['time'], $_POST['gols']);
//}
session_start();
if (!isset($_SESSION['email']))
{ //Se não houver usuário autenticado
    header('LOCATION: login.php'); //Redireciona para autenticação
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
<?php foreach ($jogadores as $jogador): ?>
                <input type="text" name="nome" value="<?= $jogador['nome'] ?>" class="form-control" style="margin-bottom: 20px;">
                <input type="text" name="time" value="<?= $jogador['time'] ?>" class="form-control" style="margin-bottom: 20px;">
                <input type="number" name="gols" value="<?= $jogador['gols'] ?>" class="form-control" style="margin-bottom: 20px;">
                <input class="btn btn-primary" type="submit" name="salvar" value="Salvar">
                <button class="btn btn-primary" style="margin-left: 50px" name="excluir"><a href="excluir-jogadores.php?id=<?= $jogador['id'] ?>" style="text-decoration: none; color: white">Excluir</a></button>
<?php endforeach; ?>

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