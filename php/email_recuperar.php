<?php

try {

    $msg = 'Olá, '.$nome.'<br> Click no link para alterar sua senha: <a href="http://localhost/projetos/cadastro-com-confirmacao/php/recuperar.php?id='.$id.'">Confirmar</a>';


    $mailer = new PHPMailer\PHPMailer\PHPMailer();
    $mailer->isSMTP();
    $mailer->isHTML(true);
    $mailer->CharSet = 'UTF-8';
    $mailer->SMTPAuth = true;
    $mailer->SMTPSecure = 'ssl';
    $mailer->Host = 'smtp.gmail.com';
    $mailer->Port = 465;
    $mailer->Username = 'email@gmail.com';
    $mailer->Password = 'senha';
    $mailer->From = 'email@gmail.com';
    $mailer->FromName = 'Verificação de e-mail de nova conta LC PHP';
    $mailer->Subject = 'LC PHP - Eterno Aprendiz';
    $mailer->Body = $msg;
    $mailer->SMTPOptions = array(
        'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
        )
    );

    $mailer->addAddress($inputEmail);
    $mailer->Send();
} catch (Exception $e) {}