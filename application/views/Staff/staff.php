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
            <h3 class="title1"><b>CONGRESO DE CIENCIAS EXACTAS | Universidad Autónoma de Aguascalientes</b></h3>
            <h1 class="text-center">STAFF > Alumnos</h1>
            
            <div class="row staff">
                <h4 class="col-md-12 h4-alumno">Registro de Staff</h4>
                <form action="" class="alta-staff">
                   <div class="form-group">
                        <p for="name">ID UAA</p>
                        <input type="text" class="form-control" id="id" placeholder="ID">
                    </div>
                    <div class="form-group">
                        <p for="name">Nombre (s)</p>
                        <input type="text" class="form-control" id="nombre" placeholder="enter nombre">
                    </div>
                    <div class="row form-group">
                        <div class="col-md-6">
                            <p for="name">Apellido Paterno</p>
                            <input type="text" class="form-control" id="apeP" placeholder="enter apellido paterno">
                        </div>
                        <div class="col-md-6">
                            <p for="name">Apellido Materno</p>
                            <input type="text" class="form-control" id="apeM" placeholder="enter apellido materno">
                        </div>
                    </div>
                    <div class="form-group">
                        <p for="name">Cargo</p>
                        <input type="text" class="form-control" id="cargo" placeholder="enter cargo a ocupar">
                    </div>
                    <div class="row form-group">
                        <div class="col-md-6">
                            <p for="name">Semestre</p>
                            <input type="text" class="form-control" id="grado" placeholder="enter grado">
                        </div>
                        <div class="col-md-6">
                            <p for="name">Grupo</p>
                            <input type="text" class="form-control" id="grupo" placeholder="enter grupo">
                        </div>
                    </div>
                       <div class="row form-group">
                        <div class="col-md-6">
                            <p for="name">Horas de Servicio</p>
                            <input type="text" class="form-control" id="hora_s" placeholder="enter horas">
                        </div>
                        <div class="col-md-6">
                            <p for="name">Telefono</p>
                            <input type="text" class="form-control" id="tel" placeholder="enter telefono">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-6">
                            <p for="name">Correo</p>
                            <input type="email" class="form-control" id="email" placeholder="Email">
                        </div>
                        <div class="col-md-6">
                            <p for="name">Clave</p>
                            <input type="password" class="form-control" id="clave" placeholder="Clave">
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="button"class="form-control" value="Registrar" id="registrar" style="background-color:red; color:white; border-color: red">
                    </div>
                </form>
            </div>
        </div>
        <div class="overlay"></div>
    </div>
</body>
</html>
