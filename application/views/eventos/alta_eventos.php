<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Alta Evento</title>

    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/css/styleform.css">
    <link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Fugaz+One&display=swap" rel="stylesheet">
</head>

<body style="background-image: url(<?php echo base_url() ?>assets/images/c1.png);">
    <div class="form-taller text-center">
        <br>
        <h1>Alta Eventos</h1>        
        <form action="" class="alta-evento" style="margin-top: 200px" id="form_data">
            <div class="form-group">
                <p for="name">Tipo de Evento</p>
                <input type="text" class="form-control" id="tipo" name="tipo" placeholder="Evento">
            </div>
            <div class="form-group">
                <p for="name">Nombre del Evento</p>
                <input type="text" class="form-control" id="nombre" name="name" placeholder="Nombre Evento">
            </div>
            <div class="form-group">
                <p for="name">Descripción</p>
                <textarea rows="4" cols="50" class="form-control desc" id="descripcion" name="desc"></textarea>
            </div>
            <div class="form-group">
                <p for="name">Lugar</p>
                <input type="text" class="form-control" id="lugar" name="lugar" placeholder="Lugar">
            </div>
            <div class="form-group">
                <p for="name">Fecha</p>
                <input type="date" class="form-control" id="fecha" name="date" placeholder="Fecha">
            </div>
            <div class="form-group">
                <p for="name">Expositor</p>
                <select class="form-control" id="expositor">
                    <option value="">Seleccione un expositor</option>
                        <?php foreach ($expositores as $key) {?>
                            <option value="<?php echo $key->nombre.' '.$key->paterno.' '.$key->materno ?>"><?php echo $key->nombre.' '.$key->paterno.' '.$key->materno ?></option>
                        <?php }?>
                </select>
            </div>
            <div class="form-group">
                <p for="name">Encargado</p>
                 <select class="form-control" id="encargado">
                    <option value="">Seleccione un encargado</option>
                        <?php foreach ($usuarios as $key) {?>
                            <option value="<?php echo $key->nombre.' '.$key->apepat.' '.$key->apemat ?>"><?php echo $key->nombre.' '.$key->apepat.' '.$key->apemat ?></option>
                        <?php }?>
                </select>
            </div>
            <div class="form-group">
                <p for="name">Cupo</p>
                <input type="text" class="form-control" id="cupo" name="cupo" placeholder="Cupo">
            </div>
            <div class="form-group">
                <input type="button"class="form-control" value="Registrar" id="btn_registrar" style="background-color:red; color:white; border-color: red">
                <!--<button type="button" class="form-control" id="btn_registrar" style="background-color:red;color:white">REGISTRAR</button>-->
            </div>
        </form>

    </div>
</body>
