<?php

require_once 'Crud.php';

if(isset($_POST['form_updt']) && !empty($_POST['form_updt'])) {
    $id    = filter_var($_POST['id'], FILTER_SANITIZE_STRING);
    $pass1 = filter_var($_POST['password1'], FILTER_SANITIZE_STRING);
    $pass2 = filter_var($_POST['password2'], FILTER_SANITIZE_STRING);

    if($pass1 != $pass2)
        return;

    $pass = md5($pass1);
    
    $crud = new Crud();
    if($crud->hasID($id)) {
        $crud->setSenha($pass);
        $crud->updatePass($id);

        echo 'Sua senha foi alterada com sucesso. Clique <a href="../login.html">aqui</a> para efetuar o login';        
    }
    
}