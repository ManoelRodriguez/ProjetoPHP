<?php
session_start();
if (!isset($_SESSION['email']))
{ //Se não houver usuário autenticado
    header('LOCATION: login.php'); //Redireciona para autenticação
}
?>
<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Anota Gols - Principal</title>

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

        <style>
            .img-fluid{
                border: 2px solid black;
                box-shadow: 2px black;
            }
        </style>

    </head>

    <body id="page-top">

        <!-- Navigation -->
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


        <!-- Jogadores -->
        <section class="portfolio" id="estrelas">
            <div class="container" id="acoes" style="height: 600px">
                <h2 class="text-center text-uppercase text-secondary mb-0" style="margin-top: 100px">Ações</h2>
                <hr class="star-dark mb-5">
                <div class="row">
                    <div class="col-md-6 col-lg-4">
                        <img class="img-fluid rounded" src="img/messi2.jpg" alt="">
                        <center><button class="btn btn-primary"><a href="classificacao.php" style="text-decoration: none; color: white">Classificação</a></button></center>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <img class="img-fluid rounded" src="img/cristiano2.jpeg" alt="">
                        <center><button class="btn btn-primary"><a href="novos-jogadores.php" style="text-decoration: none; color: white">Novos Jogadores</a></button></center>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <img class="img-fluid rounded" src="img/zidane.jpg" alt="">
                        <center><button class="btn btn-primary"><a href="minhas-informacoes.php" style="text-decoration: none; color: white">Minhas Informações</a></button></center>
                    </div>

                </div>
            </div>
        </section>


        <div class="copyright py-4 text-center text-white">
            <div class="container">
                <small>Copyright &copy; Fatec 2019</small>
            </div>
        </div>

        <!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
        <div class="scroll-to-top d-lg-none position-fixed ">
            <a class="js-scroll-trigger d-block text-center text-white rounded" href="#page-top">
                <i class="fa fa-chevron-up"></i>
            </a>
        </div>

        <!-- Bootstrap core JavaScript -->
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Plugin JavaScript -->
        <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
        <script src="vendor/magnific-popup/jquery.magnific-popup.min.js"></script>

        <!-- Contact Form JavaScript -->
        <script src="js/jqBootstrapValidation.js"></script>
        <script src="js/contact_me.js"></script>

        <!-- Custom scripts for this template -->
        <script src="js/freelancer.min.js"></script>

    </body>

</html>
