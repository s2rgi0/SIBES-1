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
    <style type="text/css">

    .carousel{
        box-shadow: 0 7px 10px 0 rgba(0, 0, 0, 0.3);
    }

    @media screen and (min-width: 1000px) {

        .cuerpo{
        height:300px;
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
            padding-top: 85px;
        }
        .contenido{
            padding-top: 70px;
            padding-left: 25%;"
        }

    }


    </style>


</head>
<body>

    <header >
         @include('parciales.nav')
    </header>

    <article>

    <div class="row">

    <div class="col-md-3 side_BAR" >

       @include('publico.menu.menu_side_bar')
       @include('publico.menu.menu_forms')

    </div>

    <div class="col-md-10">
        <div class="contenido">
            @if( count($especie) > 0 )

            <br>
            <h1 style="color: #54a049;" >Reino {{ $reino }} 
            <!--
            <label class="btn btn-success" id="reino_tax"  >  Descargar <span class="glyphicon glyphicon-save" aria-hidden="true"  ></span> </label>
            -->
            </h1>
            @if(count($especie) == 1) 
            <h4 style="color: #c3d64a ;" >Se encontro 1 resultado</h4>
            @else
            <h4 style="color: #c3d64a ;" >Se encontraron {{ count($especie) }} resultados</h4>
            @endif
            
            <center>
                @include('publico.tablas.tabla_reinos')
            </center>

        @else

            <br>
            <h1>Reino {{ $reino }}</h1>
            <br>
            <h3>No se encontro resultados en su busqueda</h3>

        @endif
            

        </div>

    </div>
    </div>


    </article>

    <form action="reino_taxo" method="get" id="frm-reino">
    <input type="hidden" name="reino_tax" value="{{ $reino }}" >
    </form>



<script src="js/jquery-3.2.1.min.js"> </script>
<script src="js/bootstrap.min.js"> </script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
@include('publico.menu.script_menu')


</body>
</html>
