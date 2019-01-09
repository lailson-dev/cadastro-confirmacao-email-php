<?php

require_once 'Crud.php';

if(isset($_POST['form_rec']) && !empty($_POST['form_rec'])) {
    $crud = new Crud();
    $inputEmail = filter_var($_POST['email'], FILTER_SANITIZE_STRING);

    $crud->setEmail($inputEmail);

    if($crud->hasEmail()) {
        $result = $crud->hasEmail();
        $id = md5($result->id);
        $nome = $result->nome;

        require_once '../PHPMailer/src/PHPMailer.php';
        require_once '../PHPMailer/src/SMTP.php';
        include_once 'email_recuperar.php';

        echo "Um e-mail foi enviado para {$inputEmail} com as instruções para alteração da senha.";
    } else {
        echo 'Este e-mail não está registrado em nosso banco de dados';
        return;
    }
} else
    echo 'Ocorreu um erro. Tente novamente mais tarde';