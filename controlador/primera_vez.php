<?php

    require '../modelo/login.php';

    $MU = new Login();

    $id_usuario = $_POST['id_usuario'];
    $contraseña_usuario_nueva = hash('sha256',$_POST['contraseña_usuario_nueva']);

    $consulta = $MU->CambiarContraseñaPrimeraVez($id_usuario,$contraseña_usuario_nueva);
    
    $data = json_encode($consulta);
    session_start();
    session_destroy();
    echo $consulta;

    
    //header('Location: ../login/index.php');

?>