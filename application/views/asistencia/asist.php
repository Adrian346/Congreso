<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Pase de lista</title>

    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/css/styleStaffPanel.css">
    <link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100&display=swap" rel="stylesheet">

</head>

<body style="background-image: url(<?php echo base_url() ?>assets/images/c1.png);">
    <div class="container">
        <br>
        <div class="row contenido">
            <h3 class="col-md-12  title1"><b>CONGRESO DE CIENCIAS EXACTAS | Universidad Autónoma de Aguascalientes</b></h3>
            <br><br><br>
            <h1 class="col-md-12 text-center">STAFF > Asistencia</h1>
            <br><br><br>
            <div class="col-md-6 text-center staff">
                <form action="">
                    <div class="form-group">
                        <label for="name">Ingrese el ID del alumno a buscar</label>
                        <input type="text" class="form-control" id="id" placeholder="enter ID">
                    </div>
                    <input type="submit" name="" value="BUSCAR">
                </form>
            </div>
        </div>
        <div class="overlay"></div>
    </div>

</body>
</html>