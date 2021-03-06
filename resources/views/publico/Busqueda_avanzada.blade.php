<!DOCTYPE html>
<html>
<head>

  <title> MARN | SIBES </title>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="css/bootstrap.min.css" rel="stylesheet">
<link rel=stylesheet href="css/estilo_menu.css" type="text/css">
<link rel=stylesheet href="css/estilo_busqueda.css" type="text/css">

<!--SELECT-->
<link rel="stylesheet" href="http://css.cdn.tl/normalize.css" />
<link href="css/select2.css" rel="stylesheet"/>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<link rel="shortcut icon" type="image/ico" href="/imagen/favicon.ico" />
<link rel="stylesheet" type="text/css" href="css/side_bar_nav.css">
<link href="https://fonts.googleapis.com/css?family=Advent+Pro|Baloo|Raleway|Roboto|Ubuntu|Play" " rel="stylesheet">
<script src="sweetalert/dist/sweetalert.min.js"></script>
<link rel="stylesheet" type="text/css" href="sweetalert/dist/sweetalert.css">


<script src="js/zelect.js"></script>
<!--SELECT -->


<!-- menu -->
<style type="text/css">
.carousel{
        box-shadow: 0 7px 10px 0 rgba(0, 0, 0, 0.3);
    }



@media screen and (min-width: 600px) {
    .panel
    {
      width:75%;
    }
}

@media screen and (min-width: 1000px) {

    .cuerpo{
      height:600px;
    }
    .side_BAR{
      position: fixed;
      z-index: 500;
      padding-top: 100px;
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
            padding-top: 110px;
            padding-left: 30%;
        }
    }



</style>
<style>
body  {
    background-image: url("/imagen/patron2.png");
      }
</style>

<!--MOVIEMIENTO DE LOS SELECT -->

<script type="text/javascript">

function alpha1(){

$("#cargador").hide();

}

function delta(){

setTimeout ("$('#division_id').select2();", 3000);
        }
function prueba2(){
setTimeout ("$('#clase_id').select2();", 3000);
        }
 function prueba3(){
setTimeout ("$('#orden_id').select2();", 3000);
       }
 function prueba4(){
setTimeout ("$('#familia_id').select2();", 3000);
    }
 function prueba5(){
setTimeout ("$('#genero_id').select2();", 3000);
 }
 function prueba6(){
setTimeout ("$('#especie_id').select2();", 3000);
}
function prueba7(){
setTimeout ("$('#subespecie_id').select2();", 3000);
 }
 function prueba8(){
setTimeout ("$('#btn_Bug').select2();", 3000);
  }
 </script>
<!--MOVIEMIENTO DE LOS SELECT -->



</head>
<body onload="alpha1();">


  <header>
         @include('parciales.nav')
  </header>



  <div class="row" id="publico_sibes">

  <div class="col-md-2 side_BAR"  >

      @include('publico.menu.menu_side_bar')
      @include('publico.menu.menu_forms')

  </div>




  <div class="col-md-10" >


  <div class="container contenido">

  <center>
  <br>
  <h4 style="font-family: 'Ubuntu',  sans-serif;" ><b>Consulta el Catálogo de Especies de El Salvador</b></h4>
  <br>
  <div class="panel" >
  <br>
  <form action="/mostrar" method="GET" name="busqueda" id="consulta-esp-frm" >

<!--REINO-->

  <div  style="width: 500px;" class="row" >
    <div class="col-sm-3  col-md-3 hidden-xs">
      <label  class="taxo">Reino : </label>
    </div>
    <div class="col-xs-8  col-sm-8 col-md-8">
      <select  class="reino " name="reino" id="reino_id" onchange="delta();" >
      <option value="0" disabled="false" selected="true"  >--Reino-- </option>

      @foreach($reino as $rei)
        <option value="{{$rei->idReino}}" > {{$rei->nombreReino}} </option>
      @endforeach

      </select>
    </div>

  </div>

  <!--DIVISION-->

    <div  style="width: 500px;"  class="row" >
    <div class="col-sm-3  col-md-3 hidden-xs">
      <label class="taxo">Division:</label>
    </div>
    <div class="col-xs-8  col-sm-8 col-md-8">
          <select class="division " id="division_id" name="division"  onchange="prueba2();">
        <option value="0" disabled="true" selected="true">--División-- </option>
        <option></option>
      </select>
    </div>

    </div>

  <!--CLASE-->

    <div  style="width: 500px;" class="row">
    <div class="col-xs-4 col-sm-3  col-md-3 hidden-xs">
      <label class="taxo">Clase:</label>
    </div>
    <div class="col-xs-8  col-sm-8 col-md-8">
      <select  class="clase" id="clase_id" name="clase" onchange="prueba3();" >
      <option value="0" disabled="true" selected="true">--Clase-- </option>
      <option></option>
    </select>
    </div>

    </div>

  <!--ORDEN-->

  <div  style="width: 500px;" class="row">
    <div class="col-xs-4 col-sm-3  col-md-3 hidden-xs">
      <label class="taxo">Orden: </label>
    </div>
    <div class="col-xs-8  col-sm-8 col-md-8">
    <select class="orden" id="orden_id" name="orden" onchange="prueba4();">
      <option value="0" disabled="true" selected="true">--Orden--</option>
      <option></option>
    </select>
    </div>

    </div>
      <!--Familia-->

    <div  style="width: 500px;" class="row">
    <div class="col-xs-4 col-sm-3  col-md-3 hidden-xs">
      <label class="taxo">Familia: </label>
    </div>
    <div class="col-xs-8  col-sm-8 col-md-8">
      <select class="familia" id="familia_id" name="familia"  onchange="prueba5();">
      <option value="0" disabled="true" selected="true">--Familia--</option>
      <option></option>
    </select>
    </div>

    </div>

  <!--Genero-->

    <div  style="width: 500px;" class="row">
    <div class="col-xs-4 col-sm-3  col-md-3 hidden-xs">
      <label class="taxo">Género: </label>
    </div>
    <div class="col-xs-8  col-sm-8 col-md-8">
    <select  class="genero" id="genero_id" name="genero"  onchange="prueba6();">
      <option value="0" disabled="true" selected="true">--Género--</option>
      <option></option>
    </select>
    </div>

    </div>

  <!--Especie-->

    <div style="width: 500px;"  class="row">
    <div class="col-xs-4 col-sm-3  col-md-3 hidden-xs">
      <label class="taxo"> Especie: </label>
    </div>
    <div class="col-xs-8  col-sm-8 col-md-8">
      <select class="especie" name="especie" id="especie_id" onchange="prueba7();">
        <option value="0" disabled="true" selected="false">--Especie--</option>
        <option></option>
      </select>
    </div>

    </div>

<!--SubEspecie-->

    <div  style="width: 500px;" class="row">
    <div class="col-xs-4 col-sm-3  col-md-3 hidden-xs">
      <label class="taxo"> Subespecie: </label>
    </div>
    <div class="col-xs-8  col-sm-8 col-md-8">
    <select  class="subespecie" name="subespecie"  id="subespecie_id" onchange="prueba8();">
      <option value="0" disabled="true" selected="false">--Subespecie--</option>
      <option></option>
    </select>
    </div>

    </div>

<!---->
    <div class="col-xs-12 hidden-lg" >
      <input type="hidden" name="estadoMarn" class="estadoMarn" >
    </div>
    <div class="row">

      <br>
        <button  type="submit" class="btn btn-success btn-guardar btn-md" id="btn_Buscar" style="background-color: #b0a54f ; border-color: #8e7200 ;width: 200px;" >Buscar <span class="glyphicon glyphicon-search" aria-hidden="true"  ></span></button>

    </div>
    <br>
    </form>

  </div>
  </center>
  <div id="msg_res" style="color:#660000;font-family: 'Ubuntu', bold sans-serif;"   >

  </div>
  <br>
  <div id="tabla_res" style="font-size:small;"   >
</div>
</div>
</div>
</div>


@include('scripts.buscar_pub')

<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>

@include('publico.menu.script_menu')

<script type="text/javascript">

      $("#reino_id").select2({
            placeholder: "Reino",
            allowClear: false
        });

      $("#division_id").select2({
            placeholder: "Division",
            allowClear: false
        });

      $("#clase_id").select2({
            placeholder: "Clase",
            allowClear: false
        });


      $("#orden_id").select2({
            placeholder: "Orden",
            allowClear: false
        });

         $("#familia_id").select2({
            placeholder: "Familia",
            allowClear: false
        });

           $("#genero_id").select2({
            placeholder: "Genero",
            allowClear: false
        });

              $("#especie_id").select2({
            placeholder: "Especie",
            allowClear: false
        });

               $("#subespecie_id").select2({
            placeholder: "Subespecie",
            allowClear: false
        });





</script>


</body>
</html>
