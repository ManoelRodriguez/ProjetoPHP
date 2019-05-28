<?php
require'Banco.php';
require 'Usuario.php';

$id = $_GET['id'] ?? null;

if(!is_null($id)){
    $usuarios = new Usuario('usuarios');
    $usuarios->delete($id);
    header('LOCATION: sair.php');
}
