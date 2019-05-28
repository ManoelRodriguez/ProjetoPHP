<?php
require 'Banco.php';
require 'Jogador.php';
$jogador = new Jogador('jogadores');
$jogadores = $jogador->select();
session_start();
if (!isset($_SESSION['email']))
{ //Se não houver usuário autenticado
    header('LOCATION: login.php'); //Redireciona para autenticação
}
?>
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom fonts for this template -->
        <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">

        <!-- Plugin CSS -->
        <link href="vendor/magnific-popup/magnific-popup.css" rel="stylesheet" type="text/css">

        <!-- Custom styles for this template -->
        <link href="css/freelancer.css" rel="stylesheet">

        <style>
            #topo td{
                font-weight: bold;
            }
            .table{
                margin-top: 50px;
            }
        </style>

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
        <h1 style="margin-top: 200px">Artilharia</h1>
        <table class="table" style="width: 600px">
            <tr id="topo">
                <td>ID</td>
                <td>Nome</td>
                <td>Time</td>
                <td>Gols</td>
                <td><center>Informações</center></td>

            </tr>
            <?php foreach ($jogadores as $jogador): ?>
                <tr>
                    <td>#<?= $jogador['id']; ?></td>
                    <td><?= $jogador['nome']; ?></td>
                    <td><?= $jogador['time']; ?></td>
                    <td><?= $jogador['gols']; ?></td>
                    <td><center><button class="btn btn-primary"><a href="Informacoes-jogadores.php?id=<?= $jogador['id'] ?>" style="text-decoration: none; color: white">...</a></button></center></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </center>
    <footer>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </footer>
</body>
</html>
