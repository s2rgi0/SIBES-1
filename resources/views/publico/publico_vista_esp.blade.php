<!DOCTYPE html>
<html>
<head>
  <title>MARN | SIBES</title>
  <link rel=stylesheet href="css/estilo_menu.css" type="text/css">
   <link rel=stylesheet href="css/estilo_busqueda.css" type="text/css">
  <link rel="shortcut icon" type="image/ico" href="/imagen/favicon.ico" />
  <link rel="stylesheet" type="text/css" href="css/side_bar_nav.css">


  <style type="text/css">


    @media screen and (min-width: 1000px) {
    body {

    }

    .cuerpo{
      height:500px;
    }

}


  </style>



</head>
<body>

<!-- Este solamente muestra la informacion -->


  <div class="row">

    <div class="col-md-2" >
<div id="yolo" style="position: fixed;">
      @include('publico.menu.menu_side_bar2')
      @include('publico.menu.menu_forms')

</div>
    </div>
    <div class="col-md-10" >


            <article>
            <div class="container-fluid">

            <div class="form-group row">


            <div class="col-xs-12 col-md-6"  >

            <br>
            <div class="panel" style="width: 100%;" >
              <div class="row" style="padding-left: 40px;padding-right: 40px;" ><h3><label> Nombre:</label>  {{ $avista[0]->nombreEspecie }}  </h3> </div>

            </div>

            <div class="panel" style="width: 100%;" >

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
                        <img src="/imagen_especie/{{ $avista[0]->nombreEspecie }}/{{ $avista[0]->fotografiaAvistamiento }}"  id="img-avista" class="img-rounded" width="400" height="350">
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
                  <div style="padding-left:20px;" >
                    <label for="clima-avista">
                        Descripcion del Clima
                     </label>
                    <p id="clima-avista" >  {{ $avista[0]->descripcionClimaAvistamiento }} </p>
                  </div>
                </div>
                </div>
                <div class="form-group row">
                <div class="col-xs-12 col-md-12">
                  <div style="padding-left:20px;" >
                    <label for="eco-avista">
                        Descripcion del Ecosistema
                     </label>
                    <p id="eco-avista" >  {{ $avista[0]->ecosistemaAvistamiento }} </p>
                  </div>
                </div>
                </div>


                <div class="form-group row">
                  <div class="col-xs-12 col-md-12">
                    <div style="padding-left: 20px;" >
                      <label for="FisioTextarea">
                          Descripcion de  Fisiografía
                      </label>
                      <p id="fisio-avista" > {{ $avista[0]->fisiografiaAvistamiento }} </p>
                    </div>
                  </div>
                  </div>

                <div class="form-group row">
                  <div class="col-xs-12 col-md-12">
                    <div style="padding-left: 20px;" >
                      <label for="geo-avista">
                          Descripcion del Geología
                      </label>
                      <p id="geo-avista" > {{ $avista[0]->geologiaAvistamiento }} </p>
                    </div>
                  </div>
                  </div>



                <div class="form-group row" style="padding-left: 20px;" >
                    <div class="col-xs-12 col-md-12">
                        <label for="hidro-avista">
                          Descripcion de Hidrografía
                        </label>
                        <p id="hidro-avista" >{{ $avista[0]->hidrografiaAvistamiento }}</p>

                    </div>

                </div>
              </div>


                <!-- Documentos PDF IMAGEN -->
          <br>
          <div class="panel" style="width: 100%;">
            <div class="form-group row">
                <div class="col-xs-12 col-md-12">
                  <div style="padding-left: 20px;" >
                  <br>
                    <label>
                      Publicacion en PDF:
                  </label>
                  <br>
                      <p id="publicacion_PDF" >

                        {{ $avista[0]->publicacionPdf }}

                      </p>
                  <br>
                  </div>

                </div>
              </div>


          </div>

          </div>
          </article>

          <form action="avis_esp_excel" method="get" id="frm-uni-avis" >

            <input type="hidden" name="id_esp" value="{{$avista[0]->idAvistamiento}}" >

          </form>


    </div>




  </div>







    <script src="js/jquery-3.2.1.min.js"> </script>
    <script src="js/bootstrap.min.js"> </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    @include('publico.menu.script_menu')


</body>
</html>
