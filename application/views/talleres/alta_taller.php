<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Alta Taller</title>

    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/css/styleform.css">
    <link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Fugaz+One&display=swap" rel="stylesheet">
</head>

<body style="background-image: url(<?php echo base_url() ?>assets/images/c1.png);">
    <div class="form-taller text-center">
        <h1>Alta Taller</h1>
        <form action="" class="alta-taller">
            <div class="form-group">
                <p for="name">Nombre del Taller</p>
                <input type="text" class="form-control" id="nombre" placeholder="Nombre">
            </div>
            <div class="form-group">
                <p for="name">Descripcion</p>
                <textarea rows="4" cols="50" class="form-control desc" id="descripcion"></textarea>
            </div>
            <div class="form-group">
                <p for="name">Lugar</p>
                <input type="text" class="form-control" id="lugar" >
            </div>
            <div class="form-group">
                <p for="name">Fecha del Taller</p>
                <input type="date" class="form-control" id="fecha" placeholder="Fecha Taller">
            </div>
            <div class="form-group">
                <p for="name">Horario</p>
                <input type="text" class="form-control" id="hora" placeholder="Horario">
            </div>
            <!--<div class="form-group">
                <p for="name">Expositor</p>
                <input type="text" class="form-control" id="conf" name="conf" placeholder="Nombre Conferencista">
            </div>-->
            <div class="form-group">
                <p for="name">Expositor</p>
    
                <select class="form-control" id="expositor">
                  <option value="0">Seleccione uno</option>
                     <?php foreach ($expositores as $key) {echo '<option value="' . $key->_id . '">' . $key->nombre .' '.$key->paterno .' '.$key->materno . '</option>';}?>
                  </select>

            </div>
            <div class="form-group">
                <p for="name">Cupo</p>
                <input type="text" class="form-control" id="cupo">
            </div>

            <div class="form-group">
                <input type="submit" class="form-control" id="btn_registrar" value="Registrar">
            </div>
        </form>

    </div>
</body>
