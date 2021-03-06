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

    public function select2($email, $senha)
    {
        $instrucao = $this->pdo->query("SELECT * FROM USUARIO WHERE EMAIL = '$email' AND SENHA = '$senha'");
        return $instrucao->fetchAll();
    }

    public function select3($email) //Essse select retornará somente os dados de um único jogador solicitado, na página Informacoes-jogadors.php
    {
        $instrucao = $this->pdo->query("SELECT * FROM USUARIO WHERE EMAIL = '$email'");
        return $instrucao->fetchAll();
    }

    public function selectNome($email)
    {
        $instrucao = $this->pdo->query("SELECT NOME FROM USUARIO WHERE EMAIL = $email");
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

    public function update($nome, $sobrenome, $email, $senha)
    {
        $sql = "UPDATE USUARIO SET NOME=:nome,SOBRENOME=:sobrenome,EMAIL=:email,SENHA=:senha WHERE EMAIL=:email";
        $instrucao = $this->pdo->prepare($sql);
        $instrucao->bindParam(':nome', $nome);
        $instrucao->bindParam(':sobrenome', $sobrenome);
        $instrucao->bindParam(':email', $email);
        $instrucao->bindParam(':senha', $senha);
        return $instrucao->execute();
    }

    public function delete($id)
    {
        $sql = "DELETE FROM USUARIO WHERE ID=:id";
        $instrucao = $this->pdo->prepare($sql);
        $instrucao->bindParam(':id', $id);
        return $instrucao->execute();
    }

}
