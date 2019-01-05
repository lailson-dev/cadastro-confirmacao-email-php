<?php

require_once 'Crud.php';

$crud = new Crud();

if(isset($_POST) && !empty($_POST))
{
    $nome       = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
    $usuario    = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
    $email      = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    $senha      = md5(filter_var($_POST['password'], FILTER_SANITIZE_STRING));   

    $crud->setNome($nome);
    $crud->setUsuario($usuario);
    $crud->setEmail($email);
    $crud->setSenha($senha);
    $crud->setStatus(0);

    if($crud->insert())
        echo 'Cadastro efetuado com sucesso!';
    else 
        echo 'Falha ao registrar!';
}