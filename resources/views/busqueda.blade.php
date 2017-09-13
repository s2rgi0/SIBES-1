<!DOCTYPE html>
<html>
<head>
	<title> MARN | SIBES </title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="css/bootstrap.min.css" rel="stylesheet">
<link rel=stylesheet href="css/estilo_esencial.css" type="text/css">
<link rel=stylesheet href="css/estilo_busqueda.css" type="text/css">
<!--SELECT-->
<link rel="stylesheet" href="http://css.cdn.tl/normalize.css" />
<link href="css/select2.css" rel="stylesheet"/>
<link rel="stylesheet" type="text/css" href="sweetalert/dist/sweetalert.css">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<link rel="shortcut icon" type="image/ico" href="/imagen/favicon.ico" />
<script src="js/zelect.js"></script>
<script src="sweetalert/dist/sweetalert.min.js"></script>

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
setTimeout ("$('#btn_gg').select2();", 4000);
  }
 </script>
<!--MOVIEMIENTO DE LOS SELECT -->
<style>
nav{
    box-shadow: 0 7px 10px 0 rgba(0, 0, 0, 0.2);
  }
body{
    background-image: url("/imagen/patron2.png");
	}
</style>


</head>
<body onload="alpha1();" >

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
<form id="frm-logout" method="get" action="" >
  <input type="hidden" name="id_usuario" value="{{ $usuario[0]->idUsuario }}" >
</form>
<form id="frm-colector" method="get" action="Agregar_Colector" >
  <input type="hidden" name="id_usuario" value="{{ $usuario[0]->idUsuario }}" >
</form>
<form id="frm-colector-tabla" method="get" action="Tabla_Colectores" >
  <input type="hidden" name="id_usuario" value="{{ $usuario[0]->idUsuario }}" >
</form>




<!--
<div style="width: 100%; height: 100%;background-color: lightblue;">hola</div> -->
<div class="container">

	<center>
	<br>
		<h3><b>Ingreso de Especies al Catálogo de El Salvador</b></h3>
		<br>

	<div class="panel" >
		<form action="/mostrar" method="GET" name="busqueda" id="busqueda-frm" >
		<input type="hidden" name="id_usuario" value="{{ $usuario[0]->idUsuario }}" >
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
		<div class="col-xs-4  col-sm-1 col-md-1" style="padding-top: 5px;" >
			<a  class="btn btn-success btn-xs " id="refresh-btn" aria-label="Left Align" style="float: left;background-color: #b0a54f ; border-color: #8e7200 ;" >
				<span class="glyphicon glyphicon-refresh" aria-hidden="true"></span>
			</a>
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
		<div class="col-xs-4  col-sm-1 col-md-1"  style="padding-top: 5px;" >
			<a  class="btn btn-success btn-xs " id="agr_div" aria-label="Left Align" style="float: left;background-color: #b0a54f ; border-color: #8e7200 ;" >
				<span class="glyphicon glyphicon-menu-hamburger" aria-hidden="true"></span>
			</a>
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
		<div class="col-xs-1  col-sm-1 col-md-1 " style="padding-top: 5px;" >
			<a class="btn btn-success btn-xs " id="agr_cla" aria-label="Left Align" style="float: left;background-color: #b0a54f ; border-color: #8e7200 ;">
				<span class="glyphicon glyphicon-menu-hamburger" aria-hidden="true"></span>
			</a>
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
		<div class="col-xs-4 col-sm-1 col-md-1"  style="padding-top: 5px;" >
			<a class="btn btn-success btn-xs " id="agr_ord" aria-label="Left Align" style="float: left;background-color: #b0a54f ; border-color: #8e7200 ;">
			<span class="glyphicon glyphicon-menu-hamburger" aria-hidden="true"></span>
			</a>
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
		<div class="col-xs-4 col-sm-1  col-md-1"  style="padding-top: 5px;" >
			<a class="btn btn-success btn-xs " id="agr_fam" aria-label="Left Align" style="float: left;background-color: #b0a54f ; border-color: #8e7200 ;">
			<span class="glyphicon glyphicon-menu-hamburger" aria-hidden="true"></span>
			</a>
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
		<div class="col-xs-4  col-sm-1 col-md-1" style="padding-top: 5px;"  >
			<a class="btn btn-success btn-xs " id="agr_gen" aria-label="Left Align" style="float: left;background-color: #b0a54f ; border-color: #8e7200 ;">
				<span class="glyphicon glyphicon-menu-hamburger" aria-hidden="true"></span>
			</a>
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
		<div class="col-xs-4  col-sm-1 col-md-1"  style="padding-top: 5px;" >
			<a class="btn btn-success btn-xs " id="agr_esp" aria-label="Left Align" style="float: left;background-color: #b0a54f ; border-color: #8e7200 ;">
			<span class="glyphicon glyphicon-menu-hamburger" aria-hidden="true"></span>
			</a>
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
		<div class="col-xs-4 col-sm-1  col-md-1"  style="padding-top: 5px;" >
			<a class="btn btn-success btn-xs" id="agr_sub" aria-label="Left Align" style="float: left;background-color: #b0a54f ; border-color: #8e7200 ;">
				<span class="glyphicon glyphicon-menu-hamburger" aria-hidden="true"></span>
			</a>
		</div>
		<!--<div class="col-xs-12" >
			<input type="text" name="estadoMarn">
		</div>-->
		</div>
<!---->
		<div class="col-xs-12  hidden-xs hidden-lg" >
			<input type="hidden" name="estadoMarn" class="estadoMarn" >
		</div>
		<br>
		<div class="row">
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<button  type="submit" class="btn btn-success btn-guardar btn-md" id="btn_Buscar" style="background-color: #b0a54f ; border-color: #8e7200 ;width: 200px;"  >Agregar <span class="glyphicon glyphicon-plus" aria-hidden="true"  ></span></button>
		</div>
		<br>
	</form>
	</div>
	</center>

	@include('modales.division')

	@include('modales.clase')

	@include('modales.orden')

	@include('modales.familia')

	@include('modales.genero')

	@include('modales.especie')

	@include('modales.subespecie')

	@include('modales.nueva')

</div>

@include('scripts.jquery')
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>

<script type="text/javascript">

      $("#reino_id").select2({
            placeholder: "Seleccione Reino",
            allowClear: false
        });


      $("#division_id").select2({
            placeholder: "Seleccione Division",
            allowClear: false
        });

      $("#clase_id").select2({
            placeholder: "Seleccione Clase",
            allowClear: false
        });


      $("#orden_id").select2({
            placeholder: "Seleccione Orden",
            allowClear: false
        });

         $("#familia_id").select2({
            placeholder: "Selecsione Famila",
            allowClear: false
        });

           $("#genero_id").select2({
            placeholder: "Seleccione Genero",
            allowClear: false
        });

              $("#especie_id").select2({
            placeholder: "Seleccione Especie",
            allowClear: false
        });

               $("#subespecie_id").select2({
            placeholder: "Seleccione SubEspecie",
            allowClear: false
        });
               //Division
         $("#rm_id").select2({
            placeholder: "--Reino--",
            allowClear: false
        });
         //clase
          $("#rcm_id").select2({
            placeholder: "--Reino--",
            allowClear: false
        });
         $("#dm_id").select2({
            allowClear: false
        });
         //ORden
         $("#rom_id").select2({
            allowClear: false
        });
         $("#dcm_id").select2({
            allowClear: false
        });
         $("#cm_id").select2({
            allowClear: false
        });
         //Familia
         $("#rfm_id").select2({
            allowClear: false
        });
         $("#dfm_id").select2({
            allowClear: false
        });
         $(".clasef").select2({ //problema
            allowClear: false
        });
         $("#df_id").select2({
            allowClear: false
        });
         //GEnero
         $("#rgm_id").select2({ //problema
            allowClear: false
        });
         $(".divisiong").select2({ //problema
            allowClear: false
        });
         $(".claseg").select2({ //problema
            allowClear: false
        });
         $(".ordeng").select2({ //problema
            allowClear: false
        });
         $(".familiag").select2({ //problema
            allowClear: false
        });
//MODAL ESPECIE
 $(".reinoe").select2({ //problema
            allowClear: false
        });
         $(".divisione").select2({ //problema
            allowClear: false
        });
         $(".clasee").select2({ //problema
            allowClear: false
        });
         $(".ordene").select2({ //problema
            allowClear: false
        });
         $(".familiae").select2({ //problema
            allowClear: false
        });
         $(".generoe").select2({ //problema
            allowClear: false
        });
   //MODAL SUB

 		$(".reinosu").select2({ //problema
            allowClear: false
        });
         $(".divisionsu").select2({ //problema
            allowClear: false
        });
         $(".clasesu").select2({ //problema
            allowClear: false
        });
         $(".ordensu").select2({ //problema
            allowClear: false
        });
         $(".familiasu").select2({ //problema
            allowClear: false
        });
         $(".generosu").select2({ //problema
            allowClear: false
        });
          $(".especiesu").select2({ //problema
            allowClear: false
        });





</script>


</body>
</html>
