<?php

class Login
{
    private $conexion;
    function __construct()
    {
        require_once 'conexion.php';
        $this->conexion = new Conexion;
        $this->conexion->conectar();
    }

    function VerificarUsuario($usuario, $contrasena)
    {
        $contraseña_encrip = hash('sha256', $contrasena);
        $sql = $this->conexion->conexion->query("SELECT * FROM usuarios WHERE usuario='" . $usuario . "'");
        $arreglo = array();
        if ($sql->num_rows > 0) {
            $result = $sql->fetch_assoc();

            if ($contraseña_encrip == $result["CONTRASENA_USUARIO"]) {
                $arreglo = $result;
            }
            return $arreglo;
            $this->conexion->cerrar();
        }
        else
        {
            return 0;
        } 
    }

    function VerificarUsuarioPerfil($correo_usuario, $contraseña_usuario)
    {
        $sql = $this->conexion->conexion->query("SELECT xeusu_usuari.CODIGO_USUARIO,xeprf_perfil.NOMBRE_PERFIL, xeusu_usuari.CORREO_USUARIO, xeusu_usuari.CONTRASENA_USUARIO,xepru_prfusu.ESTADO,
        concat_ws(' ',xeusu_usuari.NOMBRES_USUARIO,xeusu_usuari.APELLIDOS_USUARIO) AS USUARIO
                FROM xepru_prfusu
                INNER JOIN xeprf_perfil ON xeprf_perfil.CODIGO_PERFIL = xepru_prfusu.CODIGO_PERFIL
                INNER JOIN xeusu_usuari ON xeusu_usuari.CODIGO_USUARIO = xepru_prfusu.CODIGO_USUARIO
                WHERE xeusu_usuari.CORREO_USUARIO = '" . $correo_usuario . "' ");
        $arreglo = array();
        if ($sql->num_rows > 0) 
        {
            $result = $sql->fetch_assoc();
            if ($contraseña_usuario == $result["CONTRASENA_USUARIO"])  
            {
                $arreglo = $result;
            }
            return $arreglo;
            $this->conexion->cerrar();
        }
        else if($sql->num_rows == 0)
        {
            return $arreglo;
        }
    }

    /**function ListarUsuarios()
    {
        $sql = $this->conexion->conexion->query("SELECT usuarios.ID_USUARIO,usuarios.USUARIO,usuarios.NOMBRE_USUARIO,usuarios.APELLIDO_USUARIO,usuarios.CORREO_USUARIO,usuarios.STATUS_USUARIO,roles.NOMBRE_ROL 
            FROM usuarios
            INNER JOIN roles ON usuarios.ID_ROL = roles.ID_ROL");
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

    function RegistrarUsuario($nombre_usuario, $apellido_usuario, $correo_usuario, $usuario, $contrasena, $genero_usuario, $rol_usuario)
    {
        $sql = $this->conexion->conexion->query("SELECT * FROM usuarios WHERE usuario='" . $usuario . "'");
        if ($sql->num_rows > 0) 
        {
            return 2;
            $this->conexion->cerrar();
        } 
        else 
        {
            $sql = "INSERT INTO usuarios (ID_ROL,USUARIO,CONTRASENA_USUARIO,NOMBRE_USUARIO,APELLIDO_USUARIO,CORREO_USUARIO,STATUS_USUARIO,GENERO)
                    VALUES ('$rol_usuario', '$usuario','$contrasena','$nombre_usuario','$apellido_usuario','$correo_usuario','Activo','$genero_usuario')";

            if ($this->conexion->conexion->query($sql) === TRUE) {
                return 1;
                $this->conexion->cerrar();
            } else {
                return 0;
                $this->conexion->cerrar();
            }
        }
    }

    function ModificarStatus($id_usuario,$status_usuario)
    {
        $sql = "UPDATE usuarios SET STATUS_USUARIO='" . $status_usuario . "' WHERE ID_USUARIO='" . $id_usuario . "'";

        if ($this->conexion->conexion->query($sql) === TRUE) 
        {
            return 1;
        } 
        else 
        {
            return 0;
        }
    }

    function ModificarUsuario($id_usuario, $nombre_usuario, $apellido_usuario, $correo_usuario, $usuario, $genero_usuario, $rol_usuario)
    {
        $sql = "UPDATE usuarios SET ID_ROL='".$rol_usuario."', USUARIO='".$usuario."',NOMBRE_USUARIO='".$nombre_usuario."',APELLIDO_USUARIO='".$apellido_usuario."',CORREO_USUARIO='".$correo_usuario."',GENERO='".$genero_usuario."' WHERE ID_USUARIO='".$id_usuario."'";
        if ($this->conexion->conexion->query($sql) === TRUE) 
        {
            return 1;
        } 
        else 
        {
            return 0;
        }
    }

    function ObtenerUsuarioPorId($id_usuario)
    {
        $sql = $this->conexion->conexion->query("SELECT * FROM usuarios WHERE id_usuario='" . $id_usuario . "'");
        //$arreglo = array();
        if ($sql->num_rows > 0) {
            $result = $sql->fetch_assoc();
            return $result;
            $this->conexion->cerrar();
        } 
        else 
        {
            return -1;
        }
    }

    function ModificarContraseña($contranu,$id_usuario)
    {
        $sql = "UPDATE usuarios SET CONTRASENA_USUARIO='" . $contranu . "' WHERE ID_USUARIO='" . $id_usuario . "'";

        if ($this->conexion->conexion->query($sql) === TRUE) 
        {
            return 1;
        } 
        else 
        {
            return 0;
        }
    }

    function RestablecerContrasena($email,$contrasena)
    {
        $sql = $this->conexion->conexion->query("SELECT * FROM usuarios WHERE CORREO_USUARIO='" . $email . "'");
        if ($sql->num_rows == 0) 
        {
            return 2;
            $this->conexion->cerrar();
        }
        else
        {
            $sql = "UPDATE usuarios SET CONTRASENA_USUARIO='" . $contrasena . "' WHERE CORREO_USUARIO='" . $email . "'";
            if ($this->conexion->conexion->query($sql) === TRUE) 
            {
                return 1;
            } 
            else 
            {
                return 0;
            }
        }  
    }**/
}
