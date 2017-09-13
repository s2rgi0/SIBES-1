
<!DOCTYPE html>
<html>
<head>
    <title>MARN | SIBES</title>
    <meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel=stylesheet href="css/estilo_menu.css" type="text/css">
<link rel=stylesheet href="css/estilo_busqueda.css" type="text/css">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
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
            padding-top: 105px;
        }
        .contenido{
            padding-left: 17%;
            padding-top: 105px;

        }
    }

</style>
<style>
body  {
    background-image: url("/imagen/patron2.png");
   
</style>



</head>
<body>

    <header >
         @include('parciales.nav')
    </header>

    <div class="row">

        <div class="col-sm-12 col-md-2 side_BAR " >

        <div id="yolo" >

            @include('publico.menu.menu_side_bar')
            @include('publico.menu.menu_forms')
            <br><br>


        </div>


        </div>
        <div class="col-md-12" >
        <div class="contenido" >
         

        @foreach( $especie as $esp )

            <form id="frm-desc-avista" action="Exportar_excel_esp" method="get" >

                <input type="hidden" name="id_esp" value="{{ $esp->idEspecie }}" >
                <input type="hidden" name="nom_esp" value="{{ $esp->nombreEspecie }}" >

            </form>
        <br>



        <div class="row">

        <div class="col-md-7" >

            <div class="panel" style="width: 100%;" >

            <div  class="row" style="padding-right: 20px;padding-left: 40px;" ><H4>  <label >Nombre Especie : </label> {{ $esp->nombreEspecie }} </H4> </div>


            </div>

            <div class="panel" style="width:100%;"  >


                <div class="row" style="padding-left: 20px;" >

                <div class="col-xs-12 col-md-6" style="padding-left: 40px;" >

                <h4><label>Taxonomia</label></h4>

                <div class="row"><label>Reino : </label>{{ $esp->nombreReino }}</div>
                <div class="row"><label > División : </label> {{ $esp->nombreDivision }}</div>
                <div class="row"><label> Clase : </label> {{ $esp->nombreClase }}</div>
                <div class="row"><label> Orden : </label> {{ $esp->nombreOrden }} </div>
                <div class="row"><label> Familia : </label>{{ $esp->nombreFamilia }}</div>
                <div class="row"><label> Género :  </label>{{ $esp->nombreGenero }}</div>

                <div class="row" ><label> Nombre Comun :  </label>

                    @foreach(  $nc_esp as $nc )
                        
                        {{ $nc->nombreComun }}
                        @if($loop->last)
                        @else,
                        @endif

                    @endforeach
              
                </div>




                <br>
                </div>
                <div class="col-md-6" >

                <div style="padding-right: 40px;" >

                <br>
                <div class="row"> <label> Nombre en ingles :  </label>{{ $esp->nombreEnIngles }}</div>
                <div class="row"><label>Procedencia : </label> {{ $esp->nombreProcedenciaDeLaEspecie }} </div>
                <div class="row"><label>Categoria MARN : </label> {{ $esp->nombreCategoriaMARN }} </div>
                <div class="row"><label>Categoria UICN : </label> {{ $esp->nombreCategoriaUICN }} </div>
                <div class="row"><label>Apendice CITES : </label> {{ $esp->nombreApendiceCITES }} </div>
                <div class="row"> <label>No. Avistamientos : </label> {{$no_avis}} </div>
                <br>


                </div>


                </div>

                </div>
                <div class="row" style="padding-left: 40px;padding-right: 40px;">

                    <label> Descripccion del Ejemplar : </label><p>{{ $esp->descripcionDelEjemplar }}</p><br>
                    
                </div>

            </div>
            <div class="panel" style="width: 100%;" >
            <br>
            <div class="row" style="padding-left: 40px;padding-right: 40px;" ><label> Descripccion del Ejemplar : </label><p>{{ $esp->descripcionDelEjemplar }}</p></div>
            <br>
            </div>

        </div>

        @if( $esp->fotografiaEspecie )
            <div class="col-md-3"  style="padding-left: 50px;"  >
            <center>
            <img src="/imagen_especie/{{ $esp->nombreEspecie }}/{{ $esp->fotografiaEspecie }}"  id="img-avista" class="img-rounded" width="380" height="330" >
            <br><br>
            <label style="width:200px;background-color: #b0a54f ;border-color: #8e7200 ;" class="btn btn-success" id="desc_avista"  >  Descarga <span class="glyphicon glyphicon-save" aria-hidden="true"  ></span> </label>
            </center>

            </div>
        @else
            <div class="col-md-3" style="padding-left: 20px;" >
            <center>
                <img src="/imagen/placeholder.png"  id="img-avista" class="img-rounded" width="380" height="330" >
            <br><br>
            <label style="width:200px;background-color: #b0a54f ;border-color: #8e7200 ;" class="btn btn-success" id="desc_avista"  >  Descarga <span class="glyphicon glyphicon-save" aria-hidden="true"  ></span> </label>
            </center>
            </div>
        @endif

        </div>
        
        @endforeach
        
        <h5 style="color: #54a049;" ><b>Lista de avistamientos de la especie {{ $esp->nombreEspecie }} en El Salvador</b></h5>
        
        <div class="container-fluid panel" style="width:95%;float: left;" >


            @include('publico.tablas.tablas_avista')


        </div>

        </div>

    </div>
    </div>
        

    <script src="js/jquery-3.2.1.min.js"> </script>
    <script src="js/bootstrap.min.js"> </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    @include('publico.menu.script_menu')

</body>
</html>
