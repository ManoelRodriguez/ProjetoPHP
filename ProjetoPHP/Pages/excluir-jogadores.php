<?php
require'Banco.php';
require 'Jogador.php';

$id = $_GET['id'] ?? null;

if(!is_null($id)){
    $jogadores = new Jogador('jogadores');
    $jogadores->delete($id);
    
}

header('LOCATION: classificacao.php');