<!DOCTYPE html>
<html>
<head>
  <title>MARN | SIBES</title>
  <meta charset="utf-8">
  <meta content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0" name="viewport">
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link rel=stylesheet href="css/estilo_menu.css" type="text/css">

<!--  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">-->
  <link rel=stylesheet href="css/estilo_busqueda.css" type="text/css">
  <link rel="shortcut icon" type="image/ico" href="/imagen/favicon.ico" />
  <link rel="stylesheet" type="text/css" href="css/side_bar_nav.css">



<style type="text/css">

    .carousel{
        box-shadow: 0 7px 10px 0 rgba(0, 0, 0, 0.3);
    }

   @media screen and (min-width: 1000px) {

    .cuerpo{
      height:500px;/*creo que no es necesario esto*/
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


<!-- Este solamente muestra la informacion -->

  <div class="row" id="publico_sibes">

    <div class="col-md-2 side_BAR " >
 <div id="yolo">
      @include('publico.menu.menu_side_bar')
      @include('publico.menu.menu_forms')
</div>

    </div>
    <div class="col-md-12" >
    <div class="contenido" >



            <article>
            <div class="container-fluid">


            <div class="form-group row">

            <div class="col-xs-12 col-md-6"  >

            <br>
            <div class="panel" style="width: 100%;" >
              <div class="row" style="padding-left: 40px;padding-right: 40px;" ><h4><label> Nombre:</label>  {{ $avista[0]->nombreSubespecie }} , {{ $avista[0]->nombreEspecie }} <!--<label class="btn btn-success" id="desc_avista_uni"  >  Descargar <span class="glyphicon glyphicon-save" aria-hidden="true"  ></span> </label> --></h4> </div>

            </div>

            <div class="panel" style="width: 100%;">

            <div class="form-group row" style="padding-left: 20px;" >
                <div class="col-xs-12 col-md-5">
                <br>
                    <label for="id_fecha_avis">Fecha de Avistamiento:</label>
                </div>
                <div class="col-xs-12 col-md-3">
                <br>
                    <p id="fecha-view" > {{ $avista[0]->fechaHoraAvistamiento  }} </p>
                </div>
            </div>

            <div class="form-group row " style="padding-left: 20px;" >
                <div class="col-xs-12 col-md-5">
                   <label>Colector: </label>
                </div>
                <div class="col-xs-12 col-md-3">
                   <p id="col-view" >{{ $avista[0]->nombreColector }}</p>
                </div>
             </div>

              <div class="form-group row " style="padding-left: 20px;" >
                <div class="col-xs-12 col-md-5">
                    <label>Dapartamento:</label>
                </div>
                <div class="col-xs-12 col-md-3">
                    <p id="ejem-view" > {{ $avista[0]->nombreDepartamento }} </p>
                </div>
             </div>
              <div class="form-group row " style="padding-left: 20px;" >
                <div class="col-xs-12 col-md-5">
                    <label>Suelo :</label>
                </div>
                <div class="col-xs-12 col-md-3">
                    <p id="ejem-view" > {{ $avista[0]->nombreSuelo }} </p>
                </div>
              </div>
              <div class="form-group row " style="padding-left: 20px;" >
                <div class="col-xs-12 col-md-5">
                    <label>Clase de tierra:</label>
                </div>
                 <div class="col-xs-12 col-md-3">

                    <p id="ejem-view" > {{ $avista[0]->nombreClaseDeTierra }} </p>
                </div>
              </div>





              </div>

              </div>


              @if( $avista[0]->fotografiaAvistamiento )
              <br>
              <div class="col-xs-12 col-md-6">
                  <center>
                        <img src="/imagen_especie/{{ $avista[0]->nombreEspecie }}/{{ $avista[0]->nombreSubespecie }}/{{ $avista[0]->fotografiaAvistamiento }}"  id="img-avista" class="img-rounded" width="400" height="350">
                 </center>
              </div>


            @else
              <br>
              <div class="col-xs-12 col-md-6">
                  <center>
                        <img src="/imagen/placeholder.png"  id="img-avista" class="img-rounded" width="400" height="350">
                 </center>
              </div>


            @endif

            </div>


         <!-- EMPIEZAN DESCRIPCIONES -->


              <div class="panel" style="width: 100%;" >
              <br>
                <div class="form-group row">
                <div class="col-xs-12 col-md-12">
                  <div style="padding-left:20px;padding-right: 20px;" >
                    <label for="clima-avista">
                        Descripcion del Clima:
                     </label>
                    <p id="clima-avista" style="text-align: justify;">  {{ $avista[0]->descripcionClimaAvistamiento }} </p>
                   </div>
                </div>
                </div>

                <div class="form-group row">
                <div class="col-xs-12 col-md-12">
                  <div style="padding-left:20px;padding-right: 20px;" >
                    <label for="eco-avista">
                        Descripcion del Ecosistema:
                     </label>
                    <p id="eco-avista" style="text-align: justify;" >  {{ $avista[0]->ecosistemaAvistamiento }} </p>
                   </div>
                </div>
                </div>


                <div class="form-group row">
                  <div class="col-xs-12 col-md-12">
                    <div style="padding-left: 20px;padding-right: 20px;" >
                      <label for="fisio-avista">
                          Descripcion de  Fisiografía:
                      </label>
                      <p id="fisio-avista"  style="text-align: justify;" > {{ $avista[0]->fisiografiaAvistamiento }} </p>
                    </div>
                  </div>
                  </div>

               <div class="form-group row">
                  <div class="col-xs-12 col-md-12">
                    <div style="padding-left: 20px;padding-right: 20px;" >
                      <label for="geo-avista">
                          Descripcion del Geología:
                      </label>
                      <p id="geo-avista" style="text-align: justify;"  > {{ $avista[0]->geologiaAvistamiento }} </p>
                    </div>
                  </div>
                </div>

              <div class="form-group row" style="padding-left: 20px;padding-right: 20px;" >
                  <div class="col-xs-12 col-md-12">
                        <label for="HidroTextarea">
                          Descripcion de Hidrografía :
                        </label>
                        <p id="hidro-avista" style="text-align: justify;"  >{{ $avista[0]->hidrografiaAvistamiento }}</p>
                        <!--
                        <textarea class="form-control" id="Hidro-VER" rows="3"  name="hidro_avis">
                        </textarea>
                        -->
                    </div>
                  </div>
              </div>


                <!-- Documentos PDF IMAGEN -->
          <br>
          <div class="panel" style="width: 100%;">
            <div class="form-group row">
                <div class="col-xs-12 col-md-12">
                  <div style="padding-left: 20px;padding-right: 20px;" >
                  <br>
                    <label>
                      Publicacion en PDF:
                  </label>
                  <br>
                    <div style=";border-radius: 3px;border: 1px solid  #b0a54f ; padding: 7px;" >
                      <div  style="padding-left: 30px;width: 50%">
                      @foreach( $pdf as $doc )

                        <div class="row" >{{ $doc->nombrePublicacion}}
                        <a href="/publicacion_especie/{{ $doc->nombreEspecie}}/{{ $doc->nombrePublicacion}}" target="_blank" class="btn btn-default btn-sm" style="float: right;" >documento PDF</a>
                        </div>

                      @endforeach
                    </div>
                    </div>



                  <br>
                  </div>

                </div>
              </div>


          </div>

          </div>
          </article>


          <form action="avis_sub_excel" method="get" id="frm-uni-avis" >

            <input type="hidden" name="id_sub" value="{{$avista[0]->idAvistamiento}}" >

          </form>

          </div>
    </div>

  </div>





    <script src="js/jquery-3.2.1.min.js"> </script>
    <script src="js/bootstrap.min.js"> </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    @include('publico.menu.script_menu')


</body>
</html>
