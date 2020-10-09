<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Panel Staff|alumno</title>

    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/css/styleform.css">
    <link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Fugaz+One&display=swap" rel="stylesheet">

    <!--<script src="js/animation.js"></script>-->
</head>

<body style="background-image: url(<?php echo base_url() ?>assets/images/c1.png);">
    
    <div class="container">
        <br>
        <div class="">
            <h3 class="title1"><b>Listado de Staff</b></h3>
            <button type="button" class="btn btn-light listado" id="nuevo">Nuevo</button>
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col"></th>
                        <th scope="col">ID UAA</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Cargo</th>
                        <th scope="col">Grado y Grupo</th>
                        <th scope="col">Horas de Servicio</th>
                        <th scope="col">Telefono</th>
                        <th scope="col">Email</th>
                    </tr>
                </thead>
                <tbody id="lista_staff">
                </tbody>
            </table>
        </div>
    </div>
</body>

<div class="modal fade" id="modal_staff" data-backdrop="static" data-keyboard="false" identificador="" accion="" style="color:black">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header" style="background-color: gray; color: white">
                <h4 class="modal-title">Editar Staff</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" id="form_pago">
                    <div class="form-group row">
                        <label class="col-md-2 control-label">ID UAA</label>
                        <div class="col-md-4">
                            <input id="id_uaa" type="number" class="form-control" placeholder="id uaa" />
                        </div>
                        <label class="col-md-2 control-label">Nombre</label>
                        <div class="col-md-4">
                            <input id="nombre" type="text" class="form-control" placeholder="nombre(s)" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2 control-label">Apellido Paterno</label>
                        <div class="col-md-4">
                            <input id="apepat" type="text" class="form-control" placeholder="apellido paterno" />
                        </div>
                        <label class="col-md-2 control-label">Apellido Materno</label>
                        <div class="col-md-4">
                            <input id="apemat" type="text" class="form-control" placeholder="apellido materno" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2 control-label">Grado</label>
                        <div class="col-md-4">
                            <input id="grado" type="text" class="form-control" placeholder="grado" />
                        </div>
                        <label class="col-md-2 control-label">Grupo</label>
                        <div class="col-md-4">
                            <input id="grupo" type="text" class="form-control" placeholder="grupo" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2 control-label">Cargo</label>
                        <div class="col-md-4">
                            <input id="cargo" type="text" class="form-control" placeholder="cargo" />
                        </div>
                        <label class="col-md-2 control-label">Horas de Servicio</label>
                        <div class="col-md-4">
                            <input id="hrs_servicio" type="text" class="form-control" placeholder="hrs servicio" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2 control-label">Teléfono</label>
                        <div class="col-md-4">
                            <input id="telefono" type="text" class="form-control" placeholder="telefono" />
                        </div>
                        <label class="col-md-2 control-label">Email</label>
                        <div class="col-md-4">
                            <input id="email" type="text" class="form-control" placeholder="email" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2 control-label">Clave</label>
                        <div class="col-md-4">
                            <input id="clave" type="password" class="form-control" placeholder="clave" />
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <div class="col-md-6 text-left">
                </div>
                <div class="col-md-6 text-right">
                    <button type="button" class="btn btn-inverse" id="editar_staff" style="background-color:black ;color: white">Aceptar</button>
                </div>
            </div>
        </div>
    </div>
</div>

</html>
