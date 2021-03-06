var table;
function ListarEmpleados()
{
    table = $("#tabla_empleados").DataTable({
        "responsive":true,
        "ordering":true,
        "paging": true,
        "searching": { "regex": true },
        "lengthMenu": [ [10, 25, 50, 100, -1], [10, 25, 50, 100, "All"] ],
        "pageLength": 10,
        "destroy":true,
        "async": false ,
        "processing": true,
        "ajax":{
            url:"../controlador/personal/empleados.php",
            type:'POST'
        },
        "columns":[
            {"data":"IMAGEN_USUARIO"},  
            {"data":"NOMBRES"},
            {"data":"CORREO_USUARIO"},
            {"data":"TELEFONO_USUARIO"},
            {"data":"DIRECCION_USUARIO"},
            {"data":"CEDULA_USUARIO"},
            {"data":"NOMBRE_PERFIL"},
            {"data":"ESTADO",
            render: function (data, type, row ) {
                if(data=='Activo'){
                    return "<span class='label label-success'>"+data+"</span>";                   
                }else{
                  return "<span class='label label-danger'>"+data+"</span>";                 
                }
              }
            },
            {"defaultContent":`
            <button style='font-size:13px;' type='button' class='editar btn btn-primary'><i class='fa fa-edit'></i></button>&nbsp;
            <button style='font-size:13px;' type='button' class='eliminar btn btn-danger'><i class='fa fa-trash-o'></i></button>&nbsp;
            `}
            /**{"data":"STATUS_USUARIO",
            render: function (data, type, row ) {
                if(data=='Activo'){
                    return "<button style='font-size:13px;' type='button' class='editar btn btn-primary'><i class='fa fa-edit'></i></button>&nbsp;<button style='font-size:13px;' type='button' class='desactivar btn btn-danger'><i class='fa fa-close'></i></button>&nbsp;<button style='font-size:13px;' type='button' class='activar btn btn-warning' disabled><i class='fa fa-check'></i></button>";                   
                }else{
                  return "<button style='font-size:13px;' type='button' class='editar btn btn-primary'><i class='fa fa-edit'></i></button>&nbsp;<button style='font-size:13px;' type='button' class='desactivar btn btn-danger' disabled><i class='fa fa-close'></i></button>&nbsp;<button style='font-size:13px;' type='button' class='activar btn btn-warning'><i class='fa fa-check'></i></button>";                 
                }
              }
            },**/  
        ],

        "language":idioma_espanol,
        select: true
    });
}

function ModalRegistroEmpleado()
{
    $("#modal_registro_empleado").modal({backdrop:'static',keyboard:false}) 
    $("#modal_registro_empleado").modal('show');
    //VALIDACION DE LA CEDULA
    document.getElementById('cedula_usuario').addEventListener('input', function() {
      campo = event.target;
      var cad = document.getElementById("cedula_usuario").value.trim();
      var total = 0;
      var longitud = cad.length;
      var longcheck = longitud - 1;
  
      if (cad !== "" && longitud === 10) {
        for (i = 0; i < longcheck; i++) {
          if (i % 2 === 0) {
            var aux = cad.charAt(i) * 2;
            if (aux > 9) aux -= 9;
            total += aux;
          } else {
            total += parseInt(cad.charAt(i)); // parseInt o concatenar?? en lugar de sumar
          }
        }
  
        total = total % 10 ? 10 - total % 10 : 0;
  
        if (cad.charAt(longitud - 1) == total) {
          $(this).css("border", "");
          $("#cedulaOK").html("");
          $("#validar_cedula").val("correcto");
        }
        else {
          $(this).css("border", "1px solid red");
          $("#cedulaOK").html("Cedula Incorrecta");
          $("#validar_cedula").val("incorrecto");
        }
  
  
      }
    });


    $.ajax({
      url: "../controlador/seguridad/perfiles.php",
      type: "POST",
    }).done(function (resp) {
      let datos_perfiles = JSON.parse(resp);
      let cadena = "";
      cadena += "<option value=''>Perfil - Descripci??n</option>";
      if (datos_perfiles.length > 0) {
        for (let i = 0; i < datos_perfiles.length; i++) {
          cadena +=
            "<option value='" +
            datos_perfiles[i].CODIGO_PERFIL +
            "'>" +
            datos_perfiles[i].NOMBRE_PERFIL +
            " - " +
            datos_perfiles[i].DESCRIPCION +
            "</option>";
        }
        $("#perfil_usuario").html(cadena);
      } else {
        cadena += "<option value=''>No se encontraron resultados</option>";
        $("#perfil_usuario").html(cadena);
      }
    });

}

function RegistrarEmpleado()
{
  let nombres_empleado = $("#nombres_empleado").val();
  let apellidos_empleado = $("#apellidos_empleado").val();
  let nacimiento_empleado = $("#nacimiento_empleado").val();
  let cedula_empleado = $("#cedula_usuario").val();
  let telefono_empleado = $("#telefono_empleado").val();
  let direccion_empleado = $("#direccion_empleado").val();
  let correo_empleado = $("#correo_empleado").val();
  let perfil_empleado = $("#perfil_usuario").val();

  //CONTRASE??A
  let caracteres = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRST0123456789";
  let contrasena_empleado = "";
  for(let i = 0; i<10; i++)
  {
    contrasena_empleado += caracteres.charAt(Math.floor(Math.random()*caracteres.length));
  }

  //let img_input = $("#img_input").val();


  //var form = new FormData();
    //var myFormData = document.getElementById('img_input').files[0]; //get the file 
    //if (myFormData) {   //Check the file is emty or not
      //  form.append('img_input', myFormData); //append files
    //}    

  /**var fullPath = document.getElementById('img_input').value;
  if (fullPath) {
    var startIndex = (fullPath.indexOf('\\') >= 0 ? fullPath.lastIndexOf('\\') : fullPath.lastIndexOf('/'));
    var filename = fullPath.substring(startIndex);
    if (filename.indexOf('\\') === 0 || filename.indexOf('/') === 0) {
        filename = filename.substring(1);
    }
    alert(filename);
  }**/

  //alert(img_input);
  
  if(nombres_empleado.length==0||apellidos_empleado.length==0||telefono_empleado.length==0||
    direccion_empleado.length==0||correo_empleado.length==0)
  {
    return Swal.fire("Mensaje de advertencia","Debe completar todos los campos","warning");
  }
  $.ajax({
    url:"../controlador/personal/empleados_registro.php",
    type:'POST',
    data:{
        nombres_empleado: nombres_empleado,
        apellidos_empleado: apellidos_empleado,
        nacimiento_empleado: nacimiento_empleado,
        cedula_empleado: cedula_empleado,
        telefono_empleado: telefono_empleado,
        direccion_empleado: direccion_empleado,
        correo_empleado: correo_empleado,
        perfil_empleado: perfil_empleado,
        contrasena_empleado: contrasena_empleado
    },
}).done(function(resp){
  if(resp>0)
    {
        if(resp==1)
        {
            Swal.fire("Mensaje de confirmaci??n","Datos registrados de forma correcta","success")
            LimpiarRegistros
            ListarEmpleados();
            $("#modal_registro_empleado").modal('hide');
        }
        else if(resp == 2)
        {
            LimpiarRegistros();
            Swal.fire("Mensaje de advertencia","La c??dula ingresada ya se ha registrado anteriormente","warning")
        }
        else
        {
            LimpiarRegistros();
            Swal.fire("Mensaje de advertencia","El correo electr??nico ya ha sido utilizado en el sistema","warning")
        }
    }
    else
    {
        LimpiarRegistros();
        Swal.fire("Mensaje de error","No se pudo completar el registro","error");
    }
})
}

function LimpiarRegistros()
{
    $("#nombres_empleado").val("");
    $("#apellidos_empleado").val("");
    $("#nacimiento_empleado").val("");
    $("#cedula_usuario").val("");
    $("#telefono_empleado").val("");
    $("#direccion_empleado").val("");
    $("#correo_empleado").val("");
    $("#perfil_usuario").val("");
    $("#contrase??a_actual").val("");
    $("#contrase??a_nueva").val("");
    $("#contrese??a_nueva_repetir").val("");
}

function CambiarContrase??a()
{
  $("#modal_editar_contrase??a").modal({backdrop:'static',keyboard:false}) 
  $("#modal_editar_contrase??a").modal('show');
}

function EditarContrase??a()
{
  let contrase??a_actual = $("#contrase??a_actual").val();
  let contrase??a_nueva = $("#contrase??a_nueva").val();
  let contrese??a_nueva_repetir = $("#contrese??a_nueva_repetir").val();
  let id_usuario = $("#id_usuario").val();

  if(contrase??a_actual.length == 0 || contrase??a_nueva.length == 0 || contrese??a_nueva_repetir.length == 0)
  {
    return Swal.fire("Mensaje de advertencia","Debe completar todos los registros","warning");
  }
  if(contrase??a_nueva != contrese??a_nueva_repetir)
  {
    return Swal.fire("Mensaje de error","La contrase??a nueva no coincide en la repetici??n","error");
  }

  $.ajax({
    url:"../controlador/personal/empleados_modificar_contrase??a.php",
    type:'POST',
    data:{
        contrase??a_actual: contrase??a_actual,
        contrase??a_nueva: contrase??a_nueva,
        id_usuario: id_usuario
    }
  }).done(function(resp){
    if(resp>0)
    {
      if(resp==1)
      {
        Swal.fire("Mensaje de confirmaci??n","Datos registrados de forma correcta","success")
        LimpiarRegistros();
        $("#modal_registro_empleado").modal('hide');
      }
      else if(resp == 2)
      {
        LimpiarRegistros();
        return Swal.fire("Mensaje de error","La contrase??a actual ingresada no es correcta","error");
      }
    }
    else
    {
      LimpiarRegistros();
      $("#modal_registro_empleado").modal('hide');
      return Swal.fire("Mensaje de error","No se pudo completar la modificaci??n","error");
    }
  })
}