<?php
    require '../../modelo/menu/menu.php';

    $MU = new Menu();

    $codigo_perfil = htmlspecialchars($_POST['codigo_perfil'],ENT_QUOTES,'UTF-8');
    
    $consulta = $MU->VerificarSistemas($codigo_perfil);
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