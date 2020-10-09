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
<body>
    <nav class="navbar navbar-expand-lg">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!--<a class="navbar-brand" href="#">Navbar</a>-->

        <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">

                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url() ?>login/nivel_usuario">Menu Principal <img src="<?php echo base_url() ?>assets/images/back.png" alt=""></a>

                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <p class="user"><?=$usuario?></p>
                <a href="<?php echo base_url() ?>login/cerrar_sesion" class="btn btn-danger my-2 my-sm-0">Cerrar Sesión</a>
            </form>
        </div>
    </nav>
</body>

</html>
