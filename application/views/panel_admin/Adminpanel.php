<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Panel</title>
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
            <h1 class="col-md-12 text-center">ADMIN PANEL</h1>
           <br><br><br>
           <div class="col-md-3"></div>
            <div class="col-md-2 text-center staff ">
                <a href="<?php echo base_url() ?>alumno/listado"> <img src="<?php echo base_url() ?>assets/images/add-user.png" alt="alumnos" height="80px" width="80px"></a>
                <br>Alumnos
            </div>
            <div class="col-md-2 text-center staff">
                 <a href="<?php echo base_url() ?>pagos/listado"> <img src="<?php echo base_url() ?>assets/images/salary.png" alt="pagos" height="80px" width="80px"></a>
                <br>Pagos
            </div>
            <div class="col-md-2 text-center staff">
                 <a href="<?php echo base_url() ?>asistencia/listado"> <img src="<?php echo base_url() ?>assets/images/register.png" alt="asistencias" height="80px" width="80px"></a>
                <br>Asistencias
            </div>
            <div class="col-md-3"></div>
           <div class="col-md-3"></div>
            <div class="col-md-2 text-center staff ">
                <a href="<?php echo base_url() ?>alta_taller/listado"> <img src="<?php echo base_url() ?>assets/images/digital.png" alt="talleres" height="80px" width="80px"></a>
                <br>Registrar talleres
            </div>
            <div class="col-md-2 text-center staff">
                 <a href="<?php echo base_url() ?>staff/staff_listado"> <img src="<?php echo base_url() ?>assets/images/idea.png" alt="staff" height="80px" width="80px"></a>
                <br>Staff
            </div>
             <div class="col-md-2 text-center staff">
                  <a href="<?php echo base_url() ?>paquetes/paquetes_listado"> <img src="<?php echo base_url() ?>assets/images/box.png" alt="staff" height="80px" width="80px"></a>
                 <br>Kit
             </div>             
            <div class="col-md-3"></div>

            <div class="col-md-3"></div>
            <div class="col-md-2 text-center staff ">
                <a href="<?php echo base_url() ?>eventos/listado"> <img src="<?php echo base_url() ?>assets/images/calendar.png" alt="eventos" height="80px" width="80px"></a>
                <br>Eventos
            </div>
            <div class="col-md-2 text-center staff">
                 <a href="<?php echo base_url() ?>expositores/listado"> <img src="<?php echo base_url() ?>assets/images/conference.png" alt="staff" height="80px" width="80px"></a>
                <br>Expositores
            </div>
            <div class="col-md-2 text-center staff">
                 <a href="<?php echo base_url() ?>reportes"> <img src="<?php echo base_url() ?>assets/images/paper.png" alt="staff" height="80px" width="80px"></a>
                <br>Reportes
            </div>
            <div class="col-md-3"></div>
                         
        </div>
        <div class="overlay"></div>

    </div>
    

    
</body>
</html>