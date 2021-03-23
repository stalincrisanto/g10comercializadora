<?php
    require '../modelo/login.php';

    $MU = new Login();

    $correo_usuario = htmlspecialchars($_POST['correo_usuario'],ENT_QUOTES,'UTF-8');
    $contraseña_usuario = htmlspecialchars($_POST['contraseña_usuario'],ENT_QUOTES,'UTF-8');

    $consulta = $MU->VerificarUsuarioPerfil($correo_usuario,$contraseña_usuario);
    $data = json_encode($consulta);
    if(count($consulta)>0)
    {
        echo $data;
    }
    else 
    {
        echo 0;
    }
?>