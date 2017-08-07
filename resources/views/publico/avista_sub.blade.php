
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

    @media screen and (min-width: 1000px) {
    body {

    }

    .cuerpo{
      height:600px;
    }

}

@media screen and (min-width: 700px) {

        .side_BAR{
            position: fixed;
            z-index: 1;
        }
        .contenido{
            padding-left: 17%;"
        }
    }

</style>



</head>
<body>

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

            <form id="frm-desc-avista" action="Exportar_excel_sub" method="get" >
                
                <input type="hidden" name="id_sub" value="{{ $esp->idSubespecie }}" >
                <input type="hidden" name="nom_sub" value="{{ $esp->nombreSubespecie }}" >

            </form>
        <br>



        <div class="row">

        <div class="col-md-7" >

            <div class="panel" style="width: 100%;" >

            <div class="row"  style="padding-right: 20px;padding-left: 40px;" >
                <H3><label >Nombre Subespecie:  </label> {{ $esp->nombreEspecie }} , {{ $esp->nombreSubespecie }} </H3></div>


        </div>
        <br>

            <div class="panel" style="width:100%;"  >


                <div class="row" style="padding-left: 20px;" >

                <div class="col-xs-12 col-md-6" style="padding-left: 40px;" >

                <h3>Taxonomia</h3>

                <div class="row"><label>Reino : </label>{{ $esp->nombreReino }}</div>
                <div class="row"><label > División : </label> {{ $esp->nombreDivision }}</div>
                <div class="row"><label> Clase : </label> {{ $esp->nombreClase }}</div>
                <div class="row"><label> Orden : </label> {{ $esp->nombreOrden }} </div>
                <div class="row"><label> Familia : </label>{{ $esp->nombreFamilia }}</div>
                <div class="row"><label> Género :  </label>{{ $esp->nombreGenero }}</div>

                <div class="row" ><label> Nombre Comun :  </label>

                    @foreach(  $nc_sub as $nc )
                        
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
                <div class="row"><label>Clase de tipo : </label> {{ $esp->nombreClaseDeTipo }} </div>
                <div class="row"><label>Procedencia : </label> {{ $esp->nombreProcedenciaDeLaEspecie }} </div>
                <div class="row"><label>Categoria MARN : </label> {{ $esp->nombreCategoriaMARN }} </div>
                <div class="row"><label>Categoria UICN : </label> {{ $esp->nombreCategoriaUICN }} </div>
                <div class="row"><label>Apendice CITES : </label> {{ $esp->nombreApendiceCITES }} </div>
                <div class="row"> <label>No. Avistamientos : </label> {{$no_avis}} </div>
                <br>


                </div>


                </div>

                </div>

            </div>
            <br>
            <div class="panel" style="width: 100%;" >
            <br>
            <div class="row" style="padding-left: 40px;padding-right: 40px;" ><label> Descripccion del Ejemplar : </label><p>{{ $esp->descripcionDelEjemplar }}</p></div>
            <br>
            </div>

        </div>

        @if( $esp->fotografiaEspecie )
            <br>
            <div class="col-md-2" style="padding-left: 50px;" >
            <center>
            <img src="/imagen_especie/{{$esp->nombreEspecie}}/{{$esp->nombreSubespecie}}/{{$esp->fotografiaEspecie}}"  id="img-avista" class="img-rounded" width="380" height="330" >
            <br><br>
            <label class="btn btn-success" id="desc_avista" style="width:200px;background-color: #b9c14d ;border-color: #b9c14d; " >  Descargar <span class="glyphicon glyphicon-save" aria-hidden="true"  ></span> 
            </center>
            </div>
        @else
            <br>
            <div class="col-md-2"  >
            <center>
            <img src="/imagen/placeholder.png"  id="img-avista" class="img-rounded" width="380" height="330" >
            <br><br>
            <label class="btn btn-success" id="desc_avista" style="width:200px;background-color: #b9c14d ;border-color: #b9c14d; " >  Descargar <span class="glyphicon glyphicon-save" aria-hidden="true"  ></span> 
            </center>            
            </div>
        @endif

        </div>
        <br>

        @endforeach
        <br><br>

        <div class="container-fluid" style="width:65%;float: left;" >


            @include('publico.tablas.tablas_avista_sub')


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
