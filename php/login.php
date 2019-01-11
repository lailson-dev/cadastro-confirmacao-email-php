<?php

require_once 'Crud.php';

if($_POST && !empty($_POST) || isset($_COOKIE['usuario'])) {
    $usuario = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
    $senha   = md5(filter_var($_POST['password'], FILTER_SANITIZE_STRING));
    $lembrar = isset($_POST['remember']);

    if($lembrar)
        setcookie('usuario', $usuario, time() + 86400);

    $crud = new Crud();
    $crud->setUsuario($usuario);
    $crud->setSenha($senha);

    if($crud->hasLogin() || isset($_COOKIE['usuario']))
        echo 'Bem vindo à vida!';
    else
        echo 'Usuário ou senha incorreto. Ou seu cadastro ainda não foi confirmado.';
}