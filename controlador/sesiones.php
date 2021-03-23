<?php 

    $id_usuario = $_POST['id'];
    $correo_usuario = $_POST['correo'];
    $nombres_usuario = $_POST['nombres'];
    $perfil_usuario = $_POST['perfil'];

    session_start();
    $_SESSION['sesion_id_usuario'] = $id_usuario;
    $_SESSION['sesion_correo_usuario'] = $correo_usuario;
    $_SESSION['sesion_nombres_usuario'] = $nombres_usuario;
    $_SESSION['sesion_perfil_usuario'] = $perfil_usuario;

?>