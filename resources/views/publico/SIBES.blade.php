<!DOCTYPE html>
<html>
<head>
    <title>MARN | SIBES</title>
    <meta content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0" name="viewport">

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

    @media screen and (min-width: 1000px) {

        .cuerpo{
        height:300px;
        }

    }

    </style>


</head>
<body>

    <header>
         @include('parciales.nav')
    </header>

    <article>

    <div class="row">

    <div class="col-md-4" >

       @include('publico.menu.menu_side_bar')
       @include('publico.menu.menu_forms')

    </div>
    <div class="col-md-6" >

    <br>


        <br><br>
        <h2 style="font-family: 'Baloo', cursive; color: #aa913f;" >Sistema de Biodiversidad de El Salvador </h2>
        <br>
        <p ALIGN="justify" style="color:#54a049; " >Bienvenido al Sistema de Biodiversidad SIBES, este proyecto nace como una iniciativa del Ministerio de Medio Ambiente y Recursos Naturales MARN con el proposito de velar por la Biodiversidad de nuestro país. Aqui puedes encontrar información acerca la diferente fauna y flora que se puede encontrar en los distintos ecosistemas del territorio salvadoreño, también se cuenta con la opcion de descargar la información de tus especies favoritas en el vinculo de Descargas, toma tu tiempo y disfrutalo.</p>
        
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


</body>
</html>
