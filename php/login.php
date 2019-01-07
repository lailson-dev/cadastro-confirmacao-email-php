<?php

require_once 'Crud.php';

if($_POST && !empty($_POST)) {
    $usuario = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
    $senha   = md5(filter_var($_POST['password'], FILTER_SANITIZE_STRING));

    $crud = new Crud();
    $crud->setUsuario($usuario);
    $crud->setSenha($senha);

    if($crud->hasLogin())
        echo 'Bem vindo à vida!';
    else
        echo 'Usuário ou senha incorreto. Ou seu cadastro ainda não foi confirmado.';
}