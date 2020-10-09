<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Panel Admin|Expositores</title>

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
           <h3 class="title1"><b>Listado de Alumnos</b></h3>
           <button type="button" class="btn btn-light listado" id="nuevo">Nuevo</button>
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col"></th>
                        <th scope="col">ID</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Ap Paterno</th>
                        <th scope="col">Ap Materno</th>
                        <th scope="col">Carrera</th>
                        <th scope="col">Semestre</th>
                        <th scope="col">Grupo</th>
                        <th scope="col">Paquete</th>
                    </tr>
                </thead>
                <tbody id="tabla_alumnos">
                    <tr>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</body>

<div class="modal fade" id="modal_alumno" data-backdrop="static" data-keyboard="false" identificador="" accion=""  style="color:black">
  <div class="modal-dialog modal-lg">
     <div class="modal-content">
        <div class="modal-header" style="background-color: gray; color: white">
           <h4 class="modal-title">Editar Alumno</h4>
           <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        </div>
        <div class="modal-body">
           <form class="form-horizontal" id="form_alumno">
              <div class="form-group row">
                 <label class="col-md-2 control-label">ID UAA</label>
                 <div class="col-md-4">
                    <input id="id_uaa" type="text" class="form-control" placeholder="ID UAA" />
                 </div>
                 <label class="col-md-2 control-label">Nombre(s)</label>
                 <div class="col-md-4">
                    <input id="nombre" type="text" class="form-control" placeholder="Nombre del Alumno" />
                 </div>
              </div>
              <div class="form-group row">
                 <label class="col-md-2 control-label">Ap Paterno</label>
                 <div class="col-md-4">
                    <input id="paterno" type="text" class="form-control" placeholder="Ap Paterno" />
                 </div>
                 <label class="col-md-2 control-label">Ap Materno</label>
                 <div class="col-md-4">
                    <input id="materno" type="text" class="form-control" placeholder="Ap Materno" />
                 </div>
              </div>
              <div class="form-group row">
                 <label class="col-md-2 control-label">Carrera</label>
                 <div class="col-md-4">
                    <input id="carrera" type="text" class="form-control" placeholder="Carrera" />
                 </div>
                 <label class="col-md-2 control-label">Semestre</label>
                 <div class="col-md-4">
                    <input id="semestre" type="text" class="form-control" placeholder="Semestre" />
                 </div>
              </div>
              <div class="form-group row">
                 <label class="col-md-2 control-label">Grupo</label>
                 <div class="col-md-4">
                    <input id="grupo" type="text" class="form-control" placeholder="Grupo" />
                 </div>
                 <label class="col-md-2 control-label">Paquete</label>
                 <div class="col-md-4">
                    <input id="paquete" type="text" class="form-control" placeholder="Paquete" />
                 </div>
              </div>
           </form>
        </div>
        <div class="modal-footer">
           <div class="col-md-6 text-left">
           </div>
           <div class="col-md-6 text-right">
              <button type="button" class="btn btn-inverse" id="editar_alumno" style="background-color:black ;color: white">Aceptar</button>
           </div>
        </div>
     </div>
  </div>
</div>

</html>
