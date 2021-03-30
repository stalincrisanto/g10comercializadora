function VerificarUsuario()
{
    let correo_usuario = $("#correo_usuario").val();
    let contraseña_usuario = $("#contraseña_usuario").val();

    if(correo_usuario.length==0 || contraseña_usuario.length==0)
    {
        return Swal.fire("Mensaje de advertencia","Debe completar todos los campos","warning");
    }

    $.ajax({
        url: '../controlador/login.php',
        type: 'POST',
        data:{
            correo_usuario: correo_usuario,
            contraseña_usuario: contraseña_usuario
        }
    }).done(function(resp){
        if(resp == 0)
        {
            return Swal.fire("Error de ingreso","Usuario y/o contraseña incorrecta","error");
        }
        else
        {
            var datos = JSON.parse(resp);
            if(datos.ESTADO==="Inactivo")
            {
                return Swal.fire("Mensaje de advertencia","El usuario se encuentra inactivo, comuníquese con el administrador","warning");
            }
            if(datos.ACCESO_PRIMERA_VEZ === "si")
            {
                $.ajax({
                    url:'../controlador/sesiones.php',
                    type: 'POST',
                    data: {
                        id: datos.CODIGO_USUARIO,
                        perfil: datos.NOMBRE_PERFIL,
                        correo: datos.CORREO_USUARIO,
                        nombres: datos.USUARIO,
                        codigo_perfil: datos.CODIGO_PERFIL
                    }
                }).done(function(){
                    return window.location.replace("../login/acceso_primera_vez.php");
                })
            }
                $.ajax({
                    url:'../controlador/sesiones.php',
                    type: 'POST',
                    data: {
                        id: datos.CODIGO_USUARIO,
                        perfil: datos.NOMBRE_PERFIL,
                        correo: datos.CORREO_USUARIO,
                        nombres: datos.USUARIO,
                        codigo_perfil: datos.CODIGO_PERFIL
                    }
                }).done(function(resp)
                    {
                        let timerInterval
                        Swal.fire({
                        title: 'Bienvenido al sistema',
                        html: 'Ingresando',
                        timer: 2000,
                        timerProgressBar: true,
                        didOpen: () => {
                            Swal.showLoading()
                            timerInterval = setInterval(() => {
                            const content = Swal.getContent()
                            if (content) {
                                const b = content.querySelector('b')
                                if (b) {
                                b.textContent = Swal.getTimerLeft()
                                }
                            }
                            }, 100)
                        },
                        willClose: () => {
                            clearInterval(timerInterval)
                        }
                        }).then((result) => {
                        if (result.dismiss === Swal.DismissReason.timer) {
                            location.reload();
                        }
                        })
                    })
        }
    })
}

function AccesoPrimeraVez()
{
    let id_usuario = $("#id_usuario").val();
    let contraseña_usuario_nueva = $("#contraseña_usuario_nueva").val();
    let contraseña_usuario_repetir = $("#contraseña_usuario_repetir").val();
    
    if(contraseña_usuario_nueva.length==0 || contraseña_usuario_repetir.length==0)
    {
        return Swal.fire("Mensaje de advertencia","Debe completar todos los campos","warning");
    }

    if(contraseña_usuario_nueva != contraseña_usuario_repetir)
    {
        return Swal.fire("Mensaje de advertencia","Las contraseñas no conciden","warning");
    }

    $.ajax({
        url:'../controlador/primera_vez.php',
        type: 'POST',
        data: {
            id_usuario: id_usuario,
            contraseña_usuario_nueva: contraseña_usuario_nueva
        }
    }).done(function(resp){
        
        Swal.fire({
            icon: 'success',
            title: 'La contraseña a sido actualizada',
            showConfirmButton: false,
            timer: 2000
        }).then(function(resul){
            return window.location.replace("../login/index.php");
        })
    })
}