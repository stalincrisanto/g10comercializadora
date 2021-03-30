<?php
    //Librerias para el envío del EMAIL
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    require 'PHPMailer/src/Exception.php';
    require 'PHPMailer/src/PHPMailer.php';
    require 'PHPMailer/src/SMTP.php';

    require '../../modelo/personal/empleados.php';

    $MU = new ModeloEmpleados();
    
    $nombres_empleado = htmlspecialchars($_POST['nombres_empleado'],ENT_QUOTES,'UTF-8'); //json_decode($_POST['nombres_empleado']);
    $apellidos_empleado = htmlspecialchars($_POST['apellidos_empleado'],ENT_QUOTES,'UTF-8');//json_decode($_POST['apellidos_empleado']);
    $nacimiento_empleado = htmlspecialchars($_POST['nacimiento_empleado'],ENT_QUOTES,'UTF-8');//json_decode($_POST['nacimiento_empleado']);
    $cedula_empleado = htmlspecialchars($_POST['cedula_empleado'],ENT_QUOTES,'UTF-8');//json_decode($_POST['cedula_empleado']);
    $telefono_empleado = htmlspecialchars($_POST['telefono_empleado'],ENT_QUOTES,'UTF-8');//json_decode($_POST['telefono_empleado']);
    $direccion_empleado = htmlspecialchars($_POST['direccion_empleado'],ENT_QUOTES,'UTF-8'); //json_decode($_POST['direccion_empleado']);
    $correo_empleado = htmlspecialchars($_POST['correo_empleado'],ENT_QUOTES,'UTF-8'); //json_decode($_POST['correo_empleado']);
    $perfil_empleado = htmlspecialchars($_POST['perfil_empleado'],ENT_QUOTES,'UTF-8');//json_decode($_POST['perfil_empleado'])
    $contrasena_email = htmlspecialchars($_POST['contrasena_empleado'],ENT_QUOTES,'UTF-8');//json_decode($_POST['perfil_empleado'])
    $contrasena_encriptada = hash('sha256',$_POST['contrasena_empleado']);
    
    //IMAGEN
    /**$img_input = $_FILES['img_input']['name'];
    $archivo = $_FILES['img_input']['tmp_name'];
    $ruta = "../../Plantilla/octopus/octopus/assets/images/users/".$img_input;
    move_uploaded_file($archivo,$ruta);**/
    
    
    $consulta = $MU->RegistrarEmpleado($nombres_empleado,$apellidos_empleado,$nacimiento_empleado,$cedula_empleado
                                        ,$telefono_empleado,$direccion_empleado,$correo_empleado,$perfil_empleado,$contrasena_encriptada);
    
    
    if($consulta == 1)
    {
        $mail = new PHPMailer(true);

        try {
            $mail->SMTPOptions = array(
                'ssl'=>array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true   
                )
            );
            //Server settings
            $mail->SMTPDebug = 0;                      // Enable verbose debug output
            $mail->isSMTP();                                            // Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
            $mail->Username   = 'comercializadorachinitos@gmail.com';                     // SMTP username
            $mail->Password   = 'laHnomurio13!!';                               // SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
            $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
            $mail->CharSet = 'UTF-8';
            //Recipients
            $mail->setFrom('comercializadorachinitos@gmail.com', 'G10 COMERCIALIZADORA');
            $mail->addAddress($correo_empleado);
            
            // Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = 'Clave de acceso por primera vez';
            $mail->Body    = 'Su contraseña para accede al sistema por primera vez es: <h4><b>'.$contrasena_email.'</b></h4>';

            $mail->send();
            echo 1;
        } catch (Exception $e) {
            echo 0;
        }
    }
    else
    {
        echo $consulta;
    }
    //$data = json_encode($consulta);
    //echo $consulta;
?>