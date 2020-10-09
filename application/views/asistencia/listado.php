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
        <div class="form-group">
          <br>
          <label for="name">Ingrese el ID del alumno a buscar</label>
          <input type="text" class="form-control" id="id_uaa_buscar" placeholder="enter ID">
        </div>
        <div class="form-group text-center">
           <button type="button" class="btn btn-danger" id="btn-buscar-asistencias">BUSCAR</button>
        </div>
       
        <br>
        <div class="">
           <h3 class="title1"><b>Asistencias</b></h3>
            <table class="table">
              <button type="button" class="btn btn-light listado" id="nuevo">Nuevo</button>
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Tipo</th>
                        <th scope="col">Descripcion</th>
                        <th scope="col">Fecha</th>
                    </tr>
                </thead>
                <tbody id="tabla_asistencias">
                    <tr>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
