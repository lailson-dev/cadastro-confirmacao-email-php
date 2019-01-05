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

    if($crud->hasUser($email)) {
        echo 'O email informado já está registrado em nosso sistema.';
    }
    else {
        if($crud->insert()) {
            require_once '../PHPMailer/src/PHPMailer.php';
            require_once '../PHPMailer/src/SMTP.php';

            $id = md5($crud->getId());

            include_once 'email.php';

            echo 'Cadastro efetuado com sucesso!<br>';
            echo 'Um e-mail de confirmação foi enviado para '.$email.'. Por favor, verifique sua caixa de entrada ou spam.';
        } else
            echo 'Falha ao registrar!';
    }
}