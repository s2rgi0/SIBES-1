<!DOCTYPE html>
<html>
<head>

  <title> MARN | SIBES </title>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="css/bootstrap.min.css" rel="stylesheet">
<link rel=stylesheet href="css/estilo_busqueda.css" type="text/css">

<!--SELECT-->

<link href="css/select2.css" rel="stylesheet"/>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<link rel="shortcut icon" type="image/ico" href="/imagen/favicon.ico" />
<script src="js/zelect.js"></script>
<script src="sweetalert/dist/sweetalert.min.js"></script>
<link rel="stylesheet" type="text/css" href="sweetalert/dist/sweetalert.css">




<!--SELECT -->

<!--MOVIEMIENTO DE LOS SELECT -->

<script type="text/javascript">

function alpha1(){

$("#cargador").hide();
//$("#reino_id").select2("open");
//setTimeout ("$('#reino_id').select2('open');", 2000);
//document.getElementById('reino_id').focus();
}

function delta(){

setTimeout ("$('#division_id').select2();", 4000);
        }
function prueba2(){
setTimeout ("$('#clase_id').select2();", 4000);
        }
 function prueba3(){
setTimeout ("$('#orden_id').select2();", 4000);
       }
 function prueba4(){
setTimeout ("$('#familia_id').select2();", 4000);
    }
 function prueba5(){
setTimeout ("$('#genero_id').select2();", 4000);
 }
 function prueba6(){
setTimeout ("$('#especie_id').select2();", 4000);
}
function prueba7(){
setTimeout ("$('#subespecie_id').select2();", 4000);
 }
 function prueba8(){
setTimeout ("$('#btn_gug').select2();", 4000);
  }
 </script>
<!--MOVIEMIENTO DE LOS SELECT -->



</head>
<body onload="alpha1();">
<header>
    <!--
    <img src="imagen/cafe.jpg" alt="SIBES" class="img-responsive" >
    -->
</header>
<div id="cargador" style="background-color: white;
    width: 100%;
    bottom: 0px;
    position: fixed;
    z-index: 10000;
    height: 100%;"></div>



    @if( $usuario[0]->idTipo == 1   )
      <nav>
            @include('parciales.menu')
      </nav>

    @endif

    @if( $usuario[0]->idTipo == 2   )

      <nav>
        @include('parciales.menuUseRegis')
      </nav>

    @endif

<form id="frm-agregar-esp" method="get" action="agregar_especie" >
  <input type="hidden" name="id_usuario" value="{{ $usuario[0]->idUsuario }}" >
</form>

<form id="frm-consultar-esp" method="get" action="consultar_especie" >
  <input type="hidden" name="id_usuario" value="{{ $usuario[0]->idUsuario }}" >
</form>
<form id="frm-inicio-esp" method="get" action="incio_sibes" >
  <input type="hidden" name="id_usuario" value="{{ $usuario[0]->idUsuario }}" >
</form>
<form id="frm-agregar-usr" method="get" action="Agregar_usuarios" >
  <input type="hidden" name="id_usuario" value="{{ $usuario[0]->idUsuario }}" >
</form>
<form id="frm-estado-usr" method="get" action="estado_usuario" >
  <input type="hidden" name="id_usuario" value="{{ $usuario[0]->idUsuario }}" >
</form>
<input type="hidden" id="usr_id" name="" value="{{ $usuario[0]->idUsuario }}" >



<!--
<div style="width: 100%; height: 100%;background-color: lightblue;">hola</div> -->
<div class="container">

  <center>
  <br>
    <h3><b>Consultar Catálogo de Especies</b></h3>
    <br>

  <div class="panel" >
    <form action="/mostrar" method="GET" name="busqueda" id="consulta-esp-frm" >
    <br>

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
    <br>

    <div class="row">
      <center>
        <button  type="submit" class="btn btn-success btn-guardar btn-md" id="btn_Buscar" style="width: 200px;background-color: : orange;" >Buscar <span class="glyphicon glyphicon-search" aria-hidden="true"  ></span></button>
      </center>
    </div>
    <br>


    </form>

  </div>


  </center>

<center>
    <div id="msg_res" style="color:#527041;"   >

    </div>
  <br>
  <div id="tabla_res" style="font-size:small;" >


  </div>


</center>
  





</div>

@include('scripts.jquery_consulta_int_esp')


<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>

<script type="text/javascript">

      $("#reino_id").select2({
            placeholder: "Select a Name",
            allowClear: false
        });

      $("#division_id").select2({
            placeholder: "Select a Name",
            allowClear: false
        });

      $("#clase_id").select2({
            placeholder: "Select a Name",
            allowClear: false
        });


      $("#orden_id").select2({
            placeholder: "Select a Name",
            allowClear: false
        });

         $("#familia_id").select2({
            placeholder: "Select a Name",
            allowClear: false
        });

           $("#genero_id").select2({
            placeholder: "Select a Name",
            allowClear: false
        });

              $("#especie_id").select2({
            placeholder: "Select a Name",
            allowClear: false
        });

               $("#subespecie_id").select2({
            placeholder: "Select a Name",
            allowClear: false
        });

</script>


</body>
</html>

