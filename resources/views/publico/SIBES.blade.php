<!DOCTYPE html>
<html>
<head>
    <title>MARN | SIBES</title>
    <meta charset="utf-8">
    <meta content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0" name="viewport">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/estilo_esencial.css" rel="stylesheet">
    <link rel=stylesheet href="css/estilo_menu.css" type="text/css">
    <link rel=stylesheet href="css/estilo_mostrar.css" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Advent+Pro|Baloo|Raleway" " rel="stylesheet">
    <link rel="shortcut icon" type="image/ico" href="/imagen/favicon.ico" />
    <link rel="stylesheet" type="text/css" href="css/side_bar_nav.css">
    <link href="https://fonts.googleapis.com/css?family=Advent+Pro|Baloo|Raleway" " rel="stylesheet">


    <style type="text/css">

    .carousel{
        box-shadow: 0 7px 10px 0 rgba(0, 0, 0, 0.3);
    }

    @media screen and (min-width: 800px) {

        .cuerpo{
        height:300px;
        }

    }

    </style>
    <style>
        body  {
            background-image: url("/imagen/patron2.png");
        }
</style>


</head>
<body>

    <header>
         @include('parciales.nav')
    </header>

    <article>

    <div class="row" id="publico_sibes">

    <div class="col-md-4" >

       @include('publico.menu.menu_side_bar')
       @include('publico.menu.menu_forms')

    </div>
    <div class="col-md-6" >


    <br>
        <!--

        <div class="container-fluid">
            Current viewport width:<span id="monitor"></span>
        </div>

         -->

        <br><br>
        <h2 style="font-family: 'Baloo', cursive; color: #aa913f;" >Sistema de Biodiversidad de El Salvador </h2>
        <br>
        <p ALIGN="justify" style="color:#54a049; " >Bienvenido al sistema de información de biodiversidad en El Salvador (SIBES), este proyecto nace como una iniciativa del Ministerio de Medio Ambiente y Recursos Naturales (MARN) con el propósito de velar por la biodiversidad de nuestro país. Aquí puedes encontrar información acerca la diferente fauna y flora que se encuentra en los distintos ecosistemas del territorio salvadoreño, también se cuenta con la opción de descargar de información de tus especies favoritas en él vinculo de descargas, toma tu tiempo y disfrútalo.</p>

        <center>
        <br><br>
        <img src="imagen/hoja.png" alt="SIBES" class="img-responsive" width="13%" >

        </center>




    </div>
    </div>

    </article>



<script src="js/jquery-3.2.1.min.js"> </script>
<script src="js/bootstrap.min.js"> </script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
@include('publico.menu.script_menu')
<script type="text/javascript">
    $('#monitor').html($(window).width());

$(window).resize(function() {
    var viewportWidth = $(window).width();
    $('#monitor').html(viewportWidth);
});
</script>


</body>
</html>
