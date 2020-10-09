<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Panel Admin|Eventos</title>

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
           <h3 class="title1"><b>Listado de Eventos</b></h3>
           <button type="button" class="btn btn-light listado" id="nuevo">Nuevo</button>
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col"></th>
                        <th scope="col">Tipo</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Descripcion</th>
                        <th scope="col">Lugar</th>
                        <th scope="col">Fecha</th>
                        <th scope="col">Expositor</th>
                        <th scope="col">Encargado</th>
                        <th scope="col">Cupo</th>
                    </tr>
                </thead>
                <tbody id="tabla_eventos">
                    <tr>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</body>

<div class="modal fade" id="modal_evento" data-backdrop="static" data-keyboard="false" identificador="" accion=""  style="color:black">
  <div class="modal-dialog modal-lg">
     <div class="modal-content">
        <div class="modal-header" style="background-color: gray; color: white">
           <h4 class="modal-title">Editar Evento</h4>
           <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        </div>
        <div class="modal-body">
           <form class="form-horizontal" id="form_evento">
              <div class="form-group row">
                 <label class="col-md-2 control-label">Tipo</label>
                 <div class="col-md-4">
                    <input id="tipo" type="text" class="form-control" placeholder="Tipo del evento" />
                 </div>
                 <label class="col-md-2 control-label">Nombre</label>
                 <div class="col-md-4">
                    <input id="nombre" type="text" class="form-control" placeholder="Nombre del Evento" />
                 </div>
              </div>
              <div class="form-group row">
                 <label class="col-md-2 control-label">Descripcion</label>
                 <div class="col-md-4">
                    <input id="descripcion" type="text" class="form-control" placeholder="Descipcion" />
                 </div>
                 <label class="col-md-2 control-label">Lugar</label>
                 <div class="col-md-4">
                    <input id="lugar" type="text" class="form-control" placeholder="Lugar" />
                 </div>
              </div>
              <div class="form-group row">
                 <label class="col-md-2 control-label">Fecha</label>
                 <div class="col-md-4">
                    <input id="fecha" type="date" class="form-control" placeholder="Fecha" />
                 </div>
                 <label class="col-md-2 control-label">Expositor</label>
                 <div class="col-md-4">
                    <select class="form-control" id="expositor">
                           <option value="0">Seleccione expositor</option>
                           <?php foreach ($paquetes as $key) {?>
                              <option value="<?php echo $key->nombre ?>"><?php echo $key->nombre ?></option>
                           <?php }?>
                        </select>
                 </div>
              </div>
              <div class="form-group row">
                 <label class="col-md-2 control-label">Encargado</label>
                 <div class="col-md-4">
                    <input id="encargado" type="text" class="form-control" placeholder="Encargado" />
                 </div>
                 <label class="col-md-2 control-label">Cupo</label>
                 <div class="col-md-4">
                    <input id="cupo" type="text" class="form-control" placeholder="Cupo" />
                 </div>
              </div>
           </form>
        </div>
        <div class="modal-footer">
           <div class="col-md-6 text-left">
           </div>
           <div class="col-md-6 text-right">
              <button type="button" class="btn btn-inverse" id="editar_evento" style="background-color:black ;color: white">Aceptar</button>
           </div>
        </div>
     </div>
  </div>
</div>

</html>
