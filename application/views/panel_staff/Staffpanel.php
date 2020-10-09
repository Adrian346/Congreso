<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Panel Staff</title>

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
            <h1 class="col-md-12 text-center">STAFF PANEL</h1>
           <br><br><br>
           <div class="col-md-2"></div>
            <div class="col-md-3 text-center staff ">
                <a href="<?php echo base_url() ?>alumno/listado"> <img src="<?php echo base_url() ?>assets/images/add-user.png" alt="agregar asistente" height="80px" width="80px"></a>
                <br>Alumnos 
            </div>
            <div class="col-md-3 text-center staff">
                 <a href="<?php echo base_url() ?>asistencia/listado"> <img src="<?php echo base_url() ?>assets/images/register.png" alt="asistencias" height="80px" width="80px"></a>
                <br>Asistencia
            </div>
            <div class="col-md-3 text-center staff">
                 <a href="<?php echo base_url() ?>pagos/listado"> <img src="<?php echo base_url() ?>assets/images/salary.png" alt="pagos" height="80px" width="80px"></a>
                <br>Pagos
            </div>
        </div>
        <div class="overlay"></div>

    </div>

</body>
</html>