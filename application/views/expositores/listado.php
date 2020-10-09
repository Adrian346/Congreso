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
           <h3 class="title1"><b>Listado de Expositores</b></h3>
           <button type="button" class="btn btn-light listado" id="nuevo_expositor">Nuevo</button>
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col"></th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Apellido Paterno</th>
                        <th scope="col">Apellido Materno</th>
                        <th scope="col">Experiencia</th>
                        <th scope="col">Imparte</th>
                    </tr>
                </thead>
                <tbody id="tabla_expositores">
                    <tr>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</body>

<div class="modal fade" id="modal_expositor" data-backdrop="static" data-keyboard="false" identificador="" accion=""  style="color:black">
  <div class="modal-dialog modal-lg">
     <div class="modal-content">
        <div class="modal-header" style="background-color: gray; color: white">
           <h4 class="modal-title">Editar Expositor</h4>
           <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        </div>
        <div class="modal-body">
           <form class="form-horizontal" id="form_expositor">
              <div class="form-group row">
                 <label class="col-md-2 control-label">Nombre</label>
                 <div class="col-md-4">
                    <input id="nombre" type="text" class="form-control" placeholder="Nombre de Expositor" />
                 </div>
                 <label class="col-md-2 control-label">Apellido Paterno</label>
                 <div class="col-md-4">
                    <input id="paterno" type="text" class="form-control" placeholder="Apellido Paterno" />
                 </div>
              </div>
              <div class="form-group row">
                 <label class="col-md-2 control-label">Apellido Materno</label>
                 <div class="col-md-4">
                    <input id="materno" type="text" class="form-control" placeholder="Apellido Materno" />
                 </div>
                 <label class="col-md-2 control-label">Experiencia</label>
                 <div class="col-md-4">
                    <input id="experiencia" type="text" class="form-control" placeholder="Experiencia" />
                 </div>
              </div>
              <div class="form-group row">
                 <label class="col-md-2 control-label">Imparte</label>
                 <div class="col-md-4">
                    <input id="imparte" type="text" class="form-control" placeholder="Imparte" />
                 </div>
              </div>
           </form>
        </div>
        <div class="modal-footer">
           <div class="col-md-6 text-left">
           </div>
           <div class="col-md-6 text-right">
              <button type="button" class="btn btn-inverse" id="editar_expositor" style="background-color:black ;color: white">Aceptar</button>
           </div>
        </div>
     </div>
  </div>
</div>

</html>
