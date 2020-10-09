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
        <br>
        <h1>Alta Pago</h1>
        <form action="" class="asist" id="form_data">
            <div class="form-group">
                <p for="name">ID Alumno</p>
                <input type="text" class="form-control" id="id_uaa" name="id" placeholder="ID Alumno">
            </div>
            <div class="form-group">
                <p for="name">Monto</p>
                <input type="text" class="form-control" id="monto" placeholder="Monto">
            </div>
            <div class="form-group">
                <input type="button" class="form-control" id="btn-registrar-pagos" value="Registrar" style="margin-top: 60px; background-color: red; color: white; border-color: red">
            </div>
        </form>

    </div>
</body>