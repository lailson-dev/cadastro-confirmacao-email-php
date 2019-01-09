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
        $sql = 'UPDATE usuarios SET status = :status WHERE MD5(id) = :id AND status = 0';
        $stmt = Conexao::prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':status', $this->status);
        
        return $stmt->execute();
    }

    public function updatePass($id)
    {
        $sql = 'UPDATE usuarios SET senha = :senha WHERE md5(id) = :id';
        $stmt = Conexao::prepare($sql);
        $stmt->bindParam(':senha', $this->senha);
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

    public function hasLogin()
    {
        $sql  = 'SELECT * FROM usuarios WHERE usuario = :usuario AND senha = :senha AND status = 1';
        $stmt = Conexao::prepare($sql);
        $stmt->bindParam(':usuario', $this->usuario);
        $stmt->bindParam(':senha', $this->senha);
        $stmt->execute();

        return $stmt->fetch();
    }

    public function hasID($id)
    {
        $sql  = 'SELECT * FROM usuarios WHERE MD5(id) = :id';
        $stmt = Conexao::prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        return $stmt->fetch();
    }

    public function hasEmail()
    {
        $sql = 'SELECT id, nome FROM usuarios WHERE email = :email';
        $stmt = Conexao::prepare($sql);
        $stmt->bindParam(':email', $this->email);
        $stmt->execute();

        return $stmt->fetch();
    }

    public function confirmed($id)
    {
        $sql  = 'SELECT * FROM usuarios WHERE MD5(id) = :id AND status = 1';
        $stmt = Conexao::prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        return $stmt->fetch();
    }

    public function passwordRecovery()
    {
        $sql = 'SELECT id FROM usuarios WHERE md5(email) = :email';
        $stmt = Conexao::prepare($sql);
        $stmt->bindParam(':email', $this->email);
        $stmt->execute();

        return $stmt->fetch();
    }
    

}