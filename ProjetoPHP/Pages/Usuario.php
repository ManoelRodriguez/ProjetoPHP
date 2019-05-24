<?php

class Usuario extends Banco {

    private $id;
    private $nome;
    private $sobrenome;
    private $email;
    private $senha;

    public function __construct($id)
    {
        $this->id = $id;
        $this->conectar();
    }

    public function select()
    {
        $instrucao = $this->pdo->query("SELECT * FROM USUARIO");
        return $instrucao->fetchAll();
    }

    public function inserir($valores)
    {
        $sql = "INSERT INTO USUARIO(NOME, SOBRENOME, EMAIL, SENHA) VALUES (?";
        for ($i = 1; $i < count($valores); $i++)
        {
            $sql .= ',?';
        }
        $sql .= ')';
        $instrucao = $this->pdo->prepare($sql);
        for ($i = 0; $i < count($valores); $i++)
        {
            $instrucao->bindParam(($i + 1), $valores[$i]);
        }
        return $instrucao->execute();
    }

}
