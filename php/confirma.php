<?php

require_once 'Crud.php';

if(isset($_GET['id']) && !empty($_GET['id'])) {
    $crud = new Crud();
    if($crud->confirmed($_GET['id']))
        echo 'Este e-mail já foi confirmado. Efetue o login clicando <a href="../login.html">aqui</a>.';
    else {
        if(!$crud->hasID($_GET['id'])) {
            echo 'Código incorreto. Tente efetuar um novo cadastro.<br>';
            return;
        }
        
        $crud->setStatus(1);
        $crud->update($_GET['id']);
        echo 'Cadastro confirmado com sucesso. Efetue o login clicando <a href="../login.html">aqui</a>.';
    }
} else
    echo 'Código incorreto. Tente efetuar um novo cadastro.';