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
            <h3 class="title1"><b>Asistencias de Alumnos</b></h3>
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">ID UAA</th>
                        <th scope="col">Asistencias en Eventos</th>
                        <th scope="col">Asistencias en Talleres</th>
                        <th scope="col">Congreso Completado (1 taller, 4 eventos)</th>
                    </tr>
                </thead>
                <tbody id="lista_asistencias">
                </tbody>
            </table>
        </div>

        <br>
        <div class="">
            <h3 class="title1"><b>Pagos</b></h3>
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">ID UAA</th>
                        <th scope="col">Costo del Paquete</th>
                        <th scope="col">Monto Pagado</th>
                        <th scope="col">Monto a Deber</th>
                        <th scope="col">Congreso Pagado</th>
                    </tr>
                </thead>
                <tbody id="lista_pagos">
                </tbody>
            </table>
        </div>
        <br>
        <div class="">
            <h3 class="title1"><b>Paquetes Vendidos</b></h3>
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Nombre del Paquete</th>
                        <th scope="col">Contenido</th>
                        <th scope="col">Precio</th>
                        <th scope="col">Número de Ventas</th>
                    </tr>
                </thead>
                <tbody id="lista_paquetes">
                </tbody>
            </table>
        </div>
        <br>
        <div class="">
            <h3 class="title1"><b>Asistencias en Eventos</b></h3>
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Nombre del Evento</th>
                        <th scope="col">Descripción</th>
                        <th scope="col">Tipo</th>
                        <th scope="col">Lugar</th>
                        <th scope="col">Fecha</th>
                        <th scope="col">Expositor</th>
                        <th scope="col">Número de Asistencias</th>
                    </tr>
                </thead>
                <tbody id="lista_eventos">
                </tbody>
            </table>
        </div>

        <br>
        <div class="">
            <h3 class="title1"><b>Asistencias en Talleres</b></h3>
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Nombre del Taller</th>
                        <th scope="col">Descripción</th>
                        <th scope="col">Lugar</th>
                        <th scope="col">Fecha</th>
                        <th scope="col">Hora</th>
                        <th scope="col">Expositor</th>
                        <th scope="col">Número de Asistencias</th>
                    </tr>
                </thead>
                <tbody id="lista_talleres">
                </tbody>
            </table>
        </div>        
    </div>
</body>

</html>
