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
    body {

    }

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




    <div class="row">

        <div class="col-md-3" >

            @include('publico.menu.menu_side_bar')
            @include('publico.menu.menu_forms')

       </div>
       <div class="col-md-6" >

       @if( count($especie) > 0 )

            <br><h1>Departamento {{ $dpto }} 
            <!--  
            <label class="btn btn-success" id="depto_tax"  >  Descargar <span class="glyphicon glyphicon-save" aria-hidden="true"  ></span> </label>
            -->
            </h1>
            <h4>Se encontraron {{ count($especie) }} resultados</h4>
            <center>
                @include('publico.tablas.tabla_reinos')
            </center>

       @else
            <br>
            <br><h1>Departamento {{ $dpto }} </h1><br>
            <h3>No se encontro resultados en su busqueda</h3>
       @endif

        
       



       </div>

    

    </div>
<form action="depto_taxo" method="get" id="frm-depto">
    <input type="hidden" name="dep_tax" value="{{ $dpto }}" >
</form>


<script src="js/jquery-3.2.1.min.js"> </script>
<script src="js/bootstrap.min.js"> </script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
@include('publico.menu.script_menu')






</body>
</html>
