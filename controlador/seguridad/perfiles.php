<?php

    require '../../modelo/seguridad/perfiles.php';
    $MU = new ModeloPerfiles();
    $consulta = $MU->ListarPerfiles();

    if($consulta)
    {
        echo json_encode($consulta);
    }
    else
    {
        echo'{
            "sEcho": 1,
		    "iTotalRecords": "0",
		    "iTotalDisplayRecords": "0",
		    "aaData": []
        }';
    }

?>