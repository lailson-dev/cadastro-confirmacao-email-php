<?php

require_once 'Conexao.php';

class Crud extends Conexao 
{

    private $id;
    private $nome;
    private $usuario;
    private $email;
    private $senha;
    private $status;
    
    public function setNome($nome){$this->nome = $nome;}
    public function setUsuario($usuario){$this->usuario = $usuario; }
    public function setEmail($email){$this->email = $email;}
    public function setSenha($senha){$this->senha = $senha;}
    public function setStatus($status){$this->status = $status;}
    public function getId(){return $this->id;}

    public function insert()
    {
        $sql  = 'INSERT INTO usuarios (nome, usuario, email, senha, status) VALUES (:nome, :usuario, :email, :senha, :status)';
        $stmt = Conexao::prepare($sql);
        $stmt->bindParam(':nome', $this->nome);
        $stmt->bindParam(':usuario', $this->usuario);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':senha', $this->senha);
        $stmt->bindParam(':status', $this->status);
                
        return $stmt->execute();
        $this->id = $stmt->lastInsertId();
    }

    public function update($id)
    {
        $sql = 'UPDATE usuarios SET status = :status WHERE id = :id';
        $stmt = Conexao::prepare($sql);
        $stmt->bindParam(':id', $id);
        
        return $stmt->execute();
    }

    public function hasUser($email)
    {
        $sql  = 'SELECT * FROM usuarios WHERE email = :email';
        $stmt = Conexao::prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        return $stmt->fetch();
    }
    

}