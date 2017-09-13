<!DOCTYPE html>
<html>
<head>
    <title>MARN | SIBES</title>
    <meta charset="utf-8">
    <meta content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0" name="viewport">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel=stylesheet href="css/esencial.css" type="text/css">
    <link rel=stylesheet href="css/estilo_menu.css" type="text/css">
    <link rel=stylesheet href="css/estilo_mostrar.css" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Advent+Pro|Baloo|Raleway" " rel="stylesheet">
    <link rel="shortcut icon" type="image/ico" href="/imagen/favicon.ico" />
    <link rel="stylesheet" type="text/css" href="css/side_bar_nav.css">

    <style type="text/css">

    .carousel{
        box-shadow: 0 7px 10px 0 rgba(0, 0, 0, 0.3);
    }

    @media screen and (min-width: 1000px) {

        .cuerpo{
        height:600px;
        }

    }

    @media screen and (min-width: 700px) {

        header{
            position: fixed;
            z-index: 500;
        }
        .side_BAR{
            position: fixed;
            z-index: 500;
            padding-top: 107px;
        }
        .contenido{
            padding-top: 105px;
            padding-left: 25%;"
        }

    }


    </style>
<style>
    body{
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

    <div class="col-md-3 side_BAR " >

       @include('publico.menu.menu_side_bar')
       @include('publico.menu.menu_forms')

    </div>
    <div class="col-md-11" >
    <div class="contenido" >
    @if( count($especie) > 0 )

        <br>
        <div style="float: left;color: #54a049;" ><h3>Resultados Busqueda</h3>
        @if(count($especie) == 1)
            <h5 style="color: #417a38 ;" ><b>Se encontro 1 resultado</b></h5>
        @else
            <h5 style="color: #417a38 ;" ><b>Se encontraron {{ count($especie) }} resultados</b></h5>
        @endif


        </div>
        <br>

        <br><br>
        <br>
        @include('publico.tablas.tabla_reinos')

    @else

        <br><br>
        <br>

        <div style="float: left;" ><h3>{{ $msg }}</h3></div>


    @endif

    </div>



    </div>
    </div>


    </article>



<script src="js/jquery-3.2.1.min.js"> </script>
<script src="js/bootstrap.min.js"> </script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
@include('publico.menu.script_menu')


</body>
</html>
