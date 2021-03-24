<?php

class Menu
{
    private $conexion;
    function __construct()
    {
        require_once '../../modelo/conexion.php';
        $this->conexion = new Conexion;
        $this->conexion->conectar();
    }

    function VerificarSistemas($codigo_perfil)
    {
        $sql = $this->conexion->conexion->query("SELECT xesis_sistem.NOMBRE_SISTEMA AS SISTEMA,xerol_rol.NOMBRE_MENU as SUBSISTEMA
                FROM xerpf_rolprf
                INNER JOIN xesis_sistem ON xesis_sistem.CODIGO_SISTEMA = xerpf_rolprf.CODIGO_SISTEMA
                INNER JOIN xerol_rol ON xerol_rol.CODIGO_ROL = xerpf_rolprf.CODIGO_ROL
                WHERE xerpf_rolprf.CODIGO_PERFIL = '" . $codigo_perfil . "' ");
        $arreglo = array();
        if ($sql->num_rows > 0) 
        {
            while ($result = $sql->fetch_assoc()) {
                $arreglo[] = $result;
            }
            //$result = $sql->fetch_assoc();
            //$arreglo = $result;
            return $arreglo;
            $this->conexion->cerrar();
        }
        else if($sql->num_rows == 0)
        {
            return $arreglo;
        }
    }
}
