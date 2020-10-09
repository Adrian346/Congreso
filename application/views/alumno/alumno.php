<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Panel Staff</title>

    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/css/styleStaffPanel.css">
    <link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100&display=swap" rel="stylesheet">
    <script src="js/animation.js"></script>
</head>


<body style="background-image: url(<?php echo base_url() ?>assets/images/c1.png);">
    <div class="container overlay" style="margin-left: 100px; margin-top: 70px">
        <br>
        <div class="row contenido">
            <h3 class="col-md-12  title1"><b>CONGRESO DE CIENCIAS EXACTAS | Universidad Autónoma de Aguascalientes</b></h3>
            <br><br><br>
            <h1 class="col-md-12 text-center">STAFF > Alumnos</h1>
            <br><br><br>
            <div class="col-md-6 staff">
                <h4>Registro de alumno</h4>
                <form action="" id="form_data">
                    <div class="form-group">
                        <label>Id UAA</label>
                        <input type="text" class="form-control" id="id_uaa" placeholder="enter ID">
                    </div>
                    <div class="form-group">
                        <label for="name">Nombre (s)</label>
                        <input type="text" class="form-control" id="nombre" placeholder="enter nombre">
                    </div>
                    <div class="row form-group">
                        <div class="col-md-6">
                            <label for="name">Apellido Paterno</label>
                            <input type="text" class="form-control" id="paterno" placeholder="enter apellido paterno">
                        </div>
                        <div class="col-md-6">
                            <label for="name">Apellido Materno</label>
                            <input type="text" class="form-control" id="materno" placeholder="enter apellido materno">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name">Carrera</label>
                        <input type="text" class="form-control" id="carrera" placeholder="enter carrera">
                    </div>
                    <div class="row form-group">
                        <div class="col-md-6">
                            <label for="name">Semestre</label>
                            <input type="text" class="form-control" id="semestre" placeholder="enter grado">
                        </div>
                        <div class="col-md-6">
                            <label for="name">Grupo</label>
                            <input type="text" class="form-control" id="grupo" placeholder="enter grupo">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Paquete </label>
                        <select class="form-control" id="paquete">
                           <option value="">Seleccione paquete</option>
                           <?php foreach ($paquetes as $key) {?>
                              <option value="<?php echo $key->nombre ?>"><?php echo $key->nombre ?></option>
                           <?php }?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="name">Pago $</label>
                        <input type="text" class="form-control" id="monto" placeholder="enter pago">
                    </div>
                    <div class="form-group text-center">
                        <button type="button" class="btn btn-danger" id="btn-registrar-alumno">REGISTRAR</button>
                    </div>                    
                </form>
            </div>
            <div class="col-md-6 text-center staff ">
                <form action="">
                    <div class="form-group">
                        <label for="name">Ingrese el ID del alumno a buscar</label>
                        <input type="text" class="form-control" id="id_buscar" placeholder="enter ID">
                    </div>
                    <button type="button" class="btn btn-danger" id="btn-buscar-alumno">BUSCAR</button>
                    <br><br><br>
                    <div class="form-group">
                        <div id="nombre_buscar"></div>
                    </div>
                    <div class="form-group">
                        <div id="paterno_buscar"></div>
                    </div>
                    <div class="form-group">
                        <div id="materno_buscar"></div>
                    </div>
                    <div class="form-group">
                        <div id="carrera_buscar"></div>
                    </div>
                    <div class="form-group">
                        <div id="semestre_buscar"></div><div id="grupo_buscar"></div>
                    </div>
                    <div class="form-group">
                        <div id="paquete_buscar"></div>
                    </div>
                    <div class="form-group">
                        <div id="pagos_buscar"></div>
                    </div>

                </form>
            </div>
        </div>
        <!--<div class="overlay"></div>-->
    </div>
</body>
</html>
