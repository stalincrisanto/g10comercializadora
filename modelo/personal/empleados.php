<?php

class ModeloEmpleados
{
    private $conexion;
    function __construct()
    {
        require_once '../../modelo/conexion.php';
        $this->conexion = new Conexion;
        $this->conexion->conectar();
    }

    function ListarEmpleados()
    {
        $sql = $this->conexion->conexion->query("SELECT concat_ws(' ',xeusu_usuari.NOMBRES_USUARIO,xeusu_usuari.APELLIDOS_USUARIO) AS 
        NOMBRES, xeusu_usuari.CORREO_USUARIO, xeusu_usuari.TELEFONO_USUARIO,
        xeusu_usuari.DIRECCION_USUARIO,xeusu_usuari.CEDULA_USUARIO,xeusu_usuari.IMAGEN_USUARIO, 
        xeprf_perfil.NOMBRE_PERFIL,xepru_prfusu.ESTADO
        FROM xepru_prfusu
        INNER JOIN xeusu_usuari ON xeusu_usuari.CODIGO_USUARIO = xepru_prfusu.ID_PERFIL_USUARIO
        INNER JOIN xeprf_perfil ON xeprf_perfil.CODIGO_PERFIL = xepru_prfusu.CODIGO_PERFIL");
        $arreglo = array();
        if ($sql->num_rows > 0) {
            while ($result = $sql->fetch_assoc()) {
                $arreglo["data"][] = $result;
            }
            return $arreglo;
            $this->conexion->cerrar();
        } else {
            return -1;
        }
    }

    function RegistrarEmpleado($nombres_empleado,$apellidos_empleado,$nacimiento_empleado,$cedula_empleado
                              ,$telefono_empleado,$direccion_empleado,$correo_empleado,$perfil_empleado,$contrasena_empleado)
    {
        $sql = $this->conexion->conexion->query("SELECT xeusu_usuari.NOMBRES_USUARIO,xeusu_usuari.APELLIDOS_USUARIO,xeusu_usuari.CEDULA_USUARIO
                                                 FROM xeusu_usuari WHERE xeusu_usuari.NOMBRES_USUARIO='" . $nombres_empleado . "'
                                                 AND xeusu_usuari.APELLIDOS_USUARIO='" . $apellidos_empleado . "'
                                                 OR xeusu_usuari.CEDULA_USUARIO='" . $cedula_empleado . "'");
        
        $sql_correo = $this->conexion->conexion->query("SELECT xeusu_usuari.CORREO_USUARIO 
                                                        FROM xeusu_usuari 
                                                        WHERE xeusu_usuari.CORREO_USUARIO='".$correo_empleado."'");
        if ($sql->num_rows > 0) 
        {
            return 2;
            $this->conexion->cerrar();
        }
        else if($sql_correo->num_rows > 0)
        {
            return 3;
            $this->conexion->cerrar();
        } 
        else 
        {
            $sql = "INSERT INTO xeusu_usuari(CORREO_USUARIO,CONTRASENA_USUARIO,FECHACREACION_USUARIO,IMAGEN_USUARIO,NOMBRES_USUARIO,APELLIDOS_USUARIO,
                                            FECHANACIMIENTO_USUARIO,TELEFONO_USUARIO,CEDULA_USUARIO,DIRECCION_USUARIO,ACCESO_PRIMERA_VEZ)
                    VALUES ('$correo_empleado', '$contrasena_empleado',NOW(),'imagen','$nombres_empleado','$apellidos_empleado','$nacimiento_empleado','$telefono_empleado','$cedula_empleado','$direccion_empleado','si')";

            if ($this->conexion->conexion->query($sql) === TRUE) {
                $codigo_usuario = $this->conexion->conexion->insert_id;
                $sql_tbl2 = "INSERT INTO xepru_prfusu (CODIGO_PERFIL,CODIGO_USUARIO,FECHA_ASIGNACION,OBSERVACIONES,ESTADO)
                             VALUES ('$perfil_empleado','$codigo_usuario',NOW(),'Ninguna','Activo')";
                $this->conexion->conexion->query($sql_tbl2);
                return 1;
                $this->conexion->cerrar();
            } else {
                return 0;
                $this->conexion->cerrar();
            }
        }
    }

    function CambiarContraseña($id_usuario,$contraseña_actual,$contraseña_nueva)
    {
        $sql_buscar_usuario = $this->conexion->conexion->query ("SELECT xeusu_usuari.CONTRASENA_USUARIO FROM xeusu_usuari WHERE xeusu_usuari.CODIGO_USUARIO ='".$id_usuario."' ");
        
        if ($sql_buscar_usuario->num_rows > 0) 
        {
            $result = $sql_buscar_usuario->fetch_assoc();
            if ($contraseña_actual == $result["CONTRASENA_USUARIO"])  
            {
                $sql = "UPDATE xeusu_usuari SET CONTRASENA_USUARIO='".$contraseña_nueva."' WHERE CODIGO_USUARIO='".$id_usuario."'";
                if ($this->conexion->conexion->query($sql) === TRUE) 
                {
                    return 1;
                } 
                else 
                {
                    return 0;
                }
            }
            else
            {
                return 2;
            }
            $this->conexion->cerrar();
        }
    }

    /**function ModificarEvaluador($id_evaluador,$cedula_evaluador,$nombre_evaluador,$apellido_evaluador,$nacimiento_evaluador,
    $correo_personal_evaluador,$correo_institucional_evaluador,$telefono_evaluador)
    {
        $sql2 = "UPDATE evaluadores SET CEDULA_EVALUADOR='".$cedula_evaluador."',NOMBRE_EVALUADOR='".$nombre_evaluador."',APELLIDO_EVALUADOR='".$apellido_evaluador."',NACIMIENTO_EVALUADOR='".$nacimiento_evaluador."',CORREO_PERSONAL_EVALUADOR='".$correo_personal_evaluador."',CORREO_INSTITUCIONAL_EVALUADOR='".$correo_institucional_evaluador."',CELULAR_EVALUADOR='".$telefono_evaluador."' WHERE ID_EVALUADOR='".$id_evaluador."'";
        if ($this->conexion->conexion->query($sql2) === TRUE) 
        {
            return 1;
        } 
        else 
        {
            return 0;
        }
    }

    function EliminarEvaluador($id_evaluador)
    {
        $sql = "DELETE FROM evaluadores WHERE ID_EVALUADOR='" . $id_evaluador . "'";

        if ($this->conexion->conexion->query($sql) === TRUE) 
        {
            return 1;
        } 
        else 
        {
            return 0;
        }
    }**/
}

?>