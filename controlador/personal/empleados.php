<?php

    require '../../modelo/personal/empleados.php';
    $MU = new ModeloEmpleados();
    $consulta = $MU->ListarEmpleados();

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