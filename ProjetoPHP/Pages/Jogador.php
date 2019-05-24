<?php

class Jogador extends Banco {

    private $id;
    private $nome;
    private $time;
    private $gols;

    public function __construct($id)
    {
        $this->id = $id;
        $this->conectar();
    }

    public function select()
    {
        $instrucao = $this->pdo->query("SELECT * FROM JOGADOR ORDER BY GOLS DESC");
        return $instrucao->fetchAll();
    }

    public function select2($id) //Essse select retornará somente os dados de um único jogador solicitado, na página Informacoes-jogadors.php
    {
        $instrucao = $this->pdo->query("SELECT * FROM JOGADOR WHERE ID = $id");
        return $instrucao->fetchAll();
    }

    public function inserir($valores)
    {
        $sql = "INSERT INTO JOGADOR(NOME, TIME, GOLS) VALUES (?";
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

    public function update($id, $nome, $time, $gols)
    {
        $sql = "UPDATE JOGADOR SET NOME = $nome, TIME = $time, GOLS = $gols   WHERE id = $id";
        $instrucao = $this->pdo->prepare($sql);
        return $instrucao->execute();
    }
    
    public function delete($id)
    {
        $sql = "DELETE FROM JOGADOR WHERE ID=:id";
        $instrucao = $this->pdo->prepare($sql);
        $instrucao->bindParam(':id', $id);
        return $instrucao->execute();
    }

    public function __get($id)
    {
        return $this->$id;
    }

}
