<script text="text/javascript" src="../js/personal/empleados.js?newversion"></script>
<header class="page-header">
    <h2>Empleados</h2>

    <div class="right-wrapper pull-right">
        <ol class="breadcrumbs">
            <li>
                <a href="index.html">
                    <i class="fa fa-home"></i>
                </a>
            </li>
            <li><span>Empleados</span></li>
        </ol>

        <a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
    </div>
</header>

<div class="row">
    <section class="panel panel-primary" id="panel-1" data-portlet-item="">
        <header class="panel-heading portlet-handler">
            <h2 class="panel-title">Gestión de Empleados</h2>
        </header>
        <div class="panel-body">
            <div class="form-group">
                <div class="col-lg-4">
                    <button type="button" onclick="ModalRegistroEmpleado();" class="mb-xs mt-xs mr-xs btn btn-sm btn-primary">
                        <i class="glyphicon glyphicon-plus"></i>
                        Agregar Empleado
                    </button>
                </div>
            </div>
            <table id="tabla_empleados" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th>Imagen</th>
                        <th>Nombres y Apellidos</th>
                        <th>Correo</th>
                        <th>Teléfono</th>
                        <th>Dirección</th>
                        <th>Cédula</th>
                        <th>Perfil</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Imagen</th>
                        <th>Nombres y Apellidos</th>
                        <th>Correo</th>
                        <th>Teléfono</th>
                        <th>Dirección</th>
                        <th>Cédula</th>
                        <th>Perfil</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </section>
</div>

<form autocomplete="FALSE" method='POST' enctype="multipart/form-data" onsubmit="return false" action="">
    <div class="modal fade" id="modal_registro_empleado" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"><b>Registro de Nuevo Empleado</b></h4>
                </div>
                <div class="modal-body">
                    <div class="form-row">
                        <div class="form-group col-md-7" style="border-style: ridge;">
                            <h4>Información Personal</h4><br>
                            <div class="form-group row">
                                <label for="" class="col-sm-3 col-form-label">Nombres</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="nombres_empleado" placeholder="Ingrese los nombres" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-3 col-form-label">Apellidos</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="apellidos_empleado" placeholder="Ingrese los apellidos" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-3 col-form-label">Nacimiento</label>
                                <div class="col-sm-8">
                                    <input type="date" class="form-control" id="nacimiento_empleado" placeholder="Seleccione la fecha de nacimiento" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-3 col-form-label">Cédula</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="cedula_usuario" placeholder="1700000001" />
                                    <label for="" id="cedulaOK" style="color: black;"></label>
                                    <input type="text" id="validar_cedula" hidden>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-5" style="border-style: ridge;">
                            <h4>Imagen del Usuario</h4>
                            <div class="card">
                                <img class="card-img-top card-user-img" src="../Plantilla/octopus/octopus/assets/images/user-default.png" width="205" height="205" alt="Card image cap" id="img_user">
                                <div class="card-body" style="width: auto;">
                                    <input type="file" value="Seleccionar archivo" style="color: transparent; background-color: transparent;" id="img_input" src="" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12" style="border-style: ridge;">
                            <div class="col-md-12">
                                <div class="tabs" style="text-align: center;">
                                    <ul class="nav nav-tabs">
                                        <li class="active">
                                            <a href="#info_contacto" data-toggle="tab">Información de Contacto</a>
                                        </li>
                                        <li>
                                            <a href="#info_usuario" data-toggle="tab">Información de Usuario</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content">
                                        <div id="info_contacto" class="tab-pane active">
                                            <div class="form-group row">
                                                <label for="" class="col-sm-3 col-form-label">Teléfono celular</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="telefono_empleado" placeholder="Ingrese el teléfono celular" />
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="" class="col-sm-3 col-form-label">Dirección domiciliaria</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="direccion_empleado" placeholder="Ingrese la dirección del domicilio" />
                                                </div>
                                            </div>
                                        </div>
                                        <div id="info_usuario" class="tab-pane">
                                            <div class="form-group row">
                                                <label for="" class="col-sm-3 col-form-label">Correo Electrónico</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="correo_empleado" placeholder="Ingrese el correo electrónico" />
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="" class="col-sm-3 col-form-label">Contraseña</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="contraseña_empleado" placeholder="Enviado de forma aleatoria a su correo electrónico" disabled=true />
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="" class="col-sm-3 col-form-label">Perfil de usuario</label>
                                                <div class="col-sm-8">
                                                    <select class="js-example-basic-single form-control" name="state" id="perfil_usuario" style="width: 100%;">
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><br><br><br><br>
                <div class="modal-footer"><br><br><br><br>
                    <button class="btn btn-primary" onclick="RegistrarEmpleado();"><i class="fa fa-check"></i>&nbsp;Registrar</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"></i>&nbsp;Cerrar</button>
                </div>
            </div>
        </div>
    </div>
</form>

<script>
    $(document).ready(function() {
        ListarEmpleados();
        $('.js-example-basic-single').select2();
    });

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#img_user').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }
    let src = document.getElementById("img_input");
    $("#img_input").change(function() {
        readURL(this);
    });
</script>