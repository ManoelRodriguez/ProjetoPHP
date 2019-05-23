<?php

class Banco
{
    private $dsn = "sqlite:artilharia.sqlite";
    protected $pdo;
    
    public function conectar() 
    {
        $this ->pdo = new PDO($this->dsn);
    }
}
