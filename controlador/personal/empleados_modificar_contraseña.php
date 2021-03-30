<?php

    require '../../modelo/personal/empleados.php';

    $MU = new ModeloEmpleados();

    $contraseña_actual = hash('sha256',$_POST['contraseña_actual']); 
    $contraseña_nueva = hash('sha256',$_POST['contraseña_nueva']); 
    $id_usuario = htmlspecialchars($_POST['id_usuario'],ENT_QUOTES,'UTF-8');

    $consulta = $MU->CambiarContraseña($id_usuario,$contraseña_actual,$contraseña_nueva);

    echo $consulta;

?>