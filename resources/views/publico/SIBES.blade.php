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
        <h2 style="font-family: 'Baloo', cursive; color: #aa913f;" >SISTEMA DE BIODIVERSIDAD </h2>
        <h2 style="font-family: 'Baloo', cursive;color: #aa913f;" > EL SALVADOR</h2>
        <h2 style="font-family: 'Baloo', cursive;color: #aa913f;" > prueba git</h2>


    </div>
    </div>


    </article>



<script src="js/jquery-3.2.1.min.js"> </script>
<script src="js/bootstrap.min.js"> </script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
@include('publico.menu.script_menu')


</body>
</html>
