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
           <h3 class="title1"><b>Listado de Paquetes</b></h3>
           <button type="button" class="btn btn-light listado" id="nuevo">Nuevo</button>
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col"></th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Contenido</th>
                        <th scope="col">Precio</th>
                    </tr>
                </thead>
                <tbody id="lista_staff">
                </tbody>
            </table>
        </div>
    </div>
</body>

<div class="modal fade" id="modal_paquete" data-backdrop="static" data-keyboard="false" identificador="" accion=""  style="color:black">
      <div class="modal-dialog">
         <div class="modal-content">
            <div class="modal-header" style="background-color: gray; color: white">
               <h4 class="modal-title">Editar Staff</h4>
               <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
               <form class="form-horizontal" id="form_pago">
                  <div class="form-group row">
                     <label class="col-md-4 control-label">Nombre</label>
                     <div class="col-md-8">
                        <input id="nombre" type="text" class="form-control" placeholder="nombre del paquete" />
                     </div>
                  </div>
                  <div class="form-group row">
                     <label class="col-md-4 control-label">Contenido</label>
                     <div class="col-md-8">
                        <textarea rows="4" cols="50" class="form-control desc" id="contenido" name="desc" placeholder="Contenido del paquete..."></textarea>
                     </div>
                  </div>
                  <div class="form-group row">
                     <label class="col-md-4 control-label">Precio</label>
                     <div class="col-md-8">
                        <input id="precio" type="number" class="form-control" placeholder="precio del paquete" />
                     </div>
                  </div>
               </form>
            </div>
            <div class="modal-footer">
               <div class="col-md-6 text-left">
               </div>
               <div class="col-md-6 text-right">
                  <button type="button" class="btn btn-inverse" id="editar_paquete" style="background-color:black ;color: white">Aceptar</button>
               </div>
            </div>
         </div>
      </div>
   </div>
</html>
