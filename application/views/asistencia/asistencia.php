
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Registro de Asistencias</title>

    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/css/styleform.css">
    <link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Fugaz+One&display=swap" rel="stylesheet">
</head>

<body style="background-image: url(<?php echo base_url() ?>assets/images/c1.png);">
    <div class="form-taller text-center">
        <br>
        <h3 class="col-md-12  title1"><b>CONGRESO DE CIENCIAS EXACTAS | Universidad Autónoma de Aguascalientes</b></h3>
            <h1 class="col-md-12 text-center">STAFF > Asistencia</h1>
            <br><br><br>
        <form action="" class="asist" style="margin-top: 250px">
            <div class="form-group">
                <p for="name">Tipo</p>
                <select class="form-control" id="tipo">
                    <option value="">Seleccione Uno</option>
                    <option value="EVENTO">Evento</option>
                    <option value="TALLER">Taller</option>
                </select>
            </div>
            <div class="form-group" id="taller">
                <p for="name">Descripcion</p>
                <select class="form-control" id="descripcion_taller">
                    <option value="">Seleccione uno</option>
                        <?php foreach ($talleres as $key) {?>
                            <option value="<?php echo $key->nombre?>"><?php echo $key->nombre?></option>
                        <?php }?>
                </select>
            </div>
            <div class="form-group" id="evento">
                <p for="name">Descripcion</p>
                <select class="form-control" id="descripcion_evento">
                    <option value="">Seleccione uno</option>
                        <?php foreach ($eventos as $key) {?>
                            <option value="<?php echo $key->nombre?>"><?php echo $key->nombre?></option>
                        <?php }?>
                </select>
            </div>
            <div class="form-group">
                <p for="name">ID Alumno</p>
                <input type="text" class="form-control" id="id_uaa" name="id" placeholder="ID Alumno">
            </div>            
            <div class="form-group">
                <input type="button" style="margin-top: 35px; background-color: red; border-color: red; color: white " class="form-control" id="btn_registrar" value="Registrar">
            </div>
        </form>

    </div>
</body>