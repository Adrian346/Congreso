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
        <h1>Alta Paquetes</h1>
        <form action="" class="alta-paquetes">
            <div class="form-group">
                <p for="name">Nombre</p>
                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre Paquete">
            </div>
            <div class="form-group">
                <p for="name">Contenido</p>
                 <textarea rows="4" cols="50" class="form-control desc" id="contenido" name="desc" placeholder="Contenido del paquete..."></textarea>
            </div>
            <div class="form-group">
                <p for="name">Precio</p>
                <input type="number" class="form-control" id="precio" name="precio" placeholder="Precio">
            </div>
            <div class="form-group">
                <input type="button" id="registrar" class="form-control" value="Registrar" style="background-color: red; color: white; border-color: red; border-radius: 5px">
            </div>
        </form>

    </div>
</body>
