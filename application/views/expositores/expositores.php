<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Alta Expositor</title>

    <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/styleform.css">
    <link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Fugaz+One&display=swap" rel="stylesheet">
</head>

<body style="background-image: url(<?php echo base_url() ?>assets/images/c1.png);">
    <div class="form-expositor text-center">
        <h1>Alta Expositores</h1>
        <div class="alta-expositor">
            <div class="form-group">
                <p for="name">Nombre Expositor</p>
                <input type="text" class="form-control" id="nombre" placeholder="Nombre(s)">
            </div>
            <div class="form-group">
                <p for="name">Apellido Paterno</p>
                <input type="text" class="form-control" id="paterno" placeholder="Apellido Paterno">
            </div>
            <div class="form-group">
                <p for="name">Apellido Materno</p>
                <input type="text" class="form-control" id="materno" placeholder="Apellido Materno">
            </div>
            <div class="form-group">
                <p for="name">Experiencia</p>
                <input type="text" class="form-control" id="experiencia" placeholder="Experiencia">
            </div>
            <div class="form-group">
                <p for="name">Imparte</p>
                <input type="text" class="form-control" id="imparte" placeholder="Imparte">
            </div>

            <div class="form-group">
                <input type="submit" class="form-control" id="btn_registrar" value="Registrar"/>
            </div>
        </div>

    </div>
</body>