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
        console.log(resp)
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