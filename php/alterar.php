<?php

if(isset($_GET['id']) && !empty($_GET['id'])) {
    $id = filter_var($_GET['id'], FILTER_SANITIZE_STRING);

    require_once 'Crud.php';
    $crud = new Crud();
    if(!$crud->hasID($id)) {
        header('Location: ../index.html');
    }
} else {
    header('Location: ../index.html');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="atualizar.php" method="post" name="form_updt">
        <input type="hidden" name="id" value="<?= $id; ?>">
        <input type="password" name="password1" placeholder="Digite uma nova senha" required>
        <input type="password" name="password2" placeholder="Confirme sua senha" required>
        <input type="submit" value="Atualizar" name="form_updt">
    </form>
</body>
</html>