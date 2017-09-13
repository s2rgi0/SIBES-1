<!DOCTYPE html>
<html>
<head>
	<title>MARN | SIBES</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link rel=stylesheet href="css/estilo_mostrar.css" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<link rel="shortcut icon" type="image/ico" href="/imagen/favicon.ico" />
	<script src="//cdn.jsdelivr.net/webshim/1.14.5/polyfiller.js"></script>

<script language="JavaScript">
	function nobackbutton(){
   window.location.hash="no-back-button";
   window.location.hash="Again-No-back-button" //chrome
   window.onhashchange=function(){window.location.hash="no-back-button";}
}
</script>
<script type="text/javascript">

	$(document).ready(function(){

		$('#Avista_link').click(function(){

			//alert('avis vamos')
			$('#frm-avista').submit();

		});

		$('#Info_link').click(function(){

			//alert('avis vamos EDITAR')
			$('#frm-Info').submit();

		});

		$('#mapa-AVIS').click(function(){

            $('#MAPA-frm').submit();

        })

		$('#id_inicio_sibes').click(function(){

  			//alert('iremos al comienzo')
  			$('#frm-inicio-esp').submit();

  		});

  		$('#id_agregar_usr').click(function(){

  			//alert('iremos agregar usuario')
  			$('#frm-agregar-usr').submit();

  		});

  		$('#id_estado_usr').click(function(){

  			//alert('iremos estado usuario')
  			$('#frm-estado-usr').submit();

  		});

  		$('#id_agregar_esp').click(function(){

  			//alert('agregar especie')
  			$('#frm-agregar-esp').submit();

  		});


  		$('#id_consultar_esp').click(function(){

  			//alert('consultar_especie especie')
  			$('#frm-consultar-esp').submit();

  		});

  		$('#id_agregar_esp_rep').click(function(){

  			//alert('agregar especie')
  			$('#frm-agregar-esp').submit();

  		});


  		$('#id_consultar_esp_rep').click(function(){

  			//alert('consultar_especie especie')
  			$('#frm-consultar-esp').submit();

  		});

  		$('#id_colector').click(function(){

        //alert('iremos al comienzo')
        $('#frm-colector').submit();

      });

  		$('#id_colectoX').click(function(){

        //alert('iremos al comienzo')
        $('#frm-colector-tabla').submit();

      });

	})

</script>
<style type="text/css">
	.navbar{
    box-shadow: 0 7px 10px 0 rgba(0, 0, 0, 0.2);
  }
</style>



</head>
<body  onload="nobackbutton();" ><!-- -->
<header>
<!--
    <img src="imagen/cafe.jpg" alt="SIBES" class="img-responsive" >
-->
</header>
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

<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>

@for ($i = 0; $i < 1 ; $i++)

<form method="get" action="Avistamiento" id="frm-avista" >
	<input type="hidden" id="id_especie" name="id_especie" value="{{ $esp1_array[ $i ]->idEspecie }}">
	<input type="hidden" id="id_usuario" name="id_usuario" value="{{ $usuario[0]->idUsuario }}">
</form>
<form method="get" action="GET_especie" id="frm-Info" >
	<input type="hidden" id="id_especie" name="esp_id" value="{{ $esp1_array[ $i ]->idEspecie }}">
	<input type="hidden" id="id_usuario" name="id_usuario" value="{{ $usuario[0]->idUsuario }}">
</form>
<form id="frm-inicio-esp" method="get" action="incio_sibes" >
	<input type="hidden" name="id_usuario" value="{{ $usuario[0]->idUsuario }}" >
</form>
<form method="get" action="mapa_show" id="MAPA-frm" >
	<input type="hidden" id="id_especie" name="id_especie" value="{{ $esp1_array[ $i ]->idEspecie }}">
	<input type="hidden" id="id_usuario" name="id_usuario" value="{{ $usuario[0]->idUsuario }}">
</form>
<form id="frm-inicio-esp" method="get" action="incio_sibes" >
	<input type="hidden" name="id_usuario" value="{{ $usuario[0]->idUsuario }}" >
</form>
<form id="frm-agregar-esp" method="get" action="agregar_especie" >
	<input type="hidden" name="id_usuario" value="{{ $usuario[0]->idUsuario }}" >
</form>
<form id="frm-consultar-esp" method="get" action="consultar_especie" >
	<input type="hidden" name="id_usuario" value="{{ $usuario[0]->idUsuario }}" >
</form>
<form id="frm-agregar-usr" method="get" action="Agregar_usuarios" >
	<input type="hidden" name="id_usuario" value="{{ $usuario[0]->idUsuario }}" >
</form>
<form id="frm-estado-usr" method="get" action="estado_usuario" >
	<input type="hidden" name="id_usuario" value="{{ $usuario[0]->idUsuario }}" >
</form>
<form id="frm-colector" method="get" action="Agregar_Colector" >
  <input type="hidden" name="id_usuario" value="{{ $usuario[0]->idUsuario }}" >
</form>
<form id="frm-colector-tabla" method="get" action="Tabla_Colectores" >
  <input type="hidden" name="id_usuario" value="{{ $usuario[0]->idUsuario }}" >
</form>



<nav>

  	<ul class="nav nav-tabs">


		<li role="presentation" class="active" id="" ><a>Especie</a></li>

		<li role="presentation"  id="Avista_link" ><a>Avistamientos</a></li>

		<li role="presentation"  id="mapa-AVIS" ><a>Mapa</a></li>



		<input type="hidden" id="id_especie" name="id_especie" value="{{ $esp1_array[ $i ]->idEspecie }}">

	</ul>

</nav>





<div class="container-fluid" >
<div class="row">
	<div class="col-xs-6  col-md-12">
		<h3 class="titulo"> Información de Especie&nbsp; <label class="btn btn-default btn-group " id="Info_link"  style="float: right ;" >Editar  <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
		</label> <label class="btn btn-default btn-group " id="id_consultar_esp_rep"  style="float: right ;" >  Consultar  <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
		</label><label class="btn btn-default btn-group " id="id_agregar_esp_rep"  style="float: right ;" > Agregar  <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
		</label></h3>

	</div>

</div>


	<!--                    AQUI ESTA LA INFORMACION DE ESPECIE                    -->

	<div  class="panel">
	<!--  PRUEBA DE BOTONES -->
	<form  method="POST" action="/guardar_especie" id="frm-especie" enctype="multipart/form-data"  >

    	<div class="panel-body" >
    	<input name="_token" type="hidden" value="{{ csrf_token() }}"/>
		<input type="hidden" id="id_especie" name="id_especie" value="{{ $esp1_array[ $i ]->idEspecie }}">
		<input  type="hidden" name="id_genero" value="{{ $esp1_array[ $i ]->idGenero }}">
		<input  type="hidden" name="n_esp" value="{{ $esp1_array[ $i ]->nombreEspecie }}">
		<div class="row">
		<h4 class="taxo"> &nbsp;Taxonomía de la Especie:</h4>
		<h4 class="nombreh4 style="color: #122D85;" >&nbsp;{{ $esp1_array[ $i ]->nombreEspecie }} </h4>

		</div>

		<div class="row">

			<div class="col-xs-12 col-lg-2">
                  <label>Reino </label><br>
                  <label class="show1">{{ $esp1_array[ $i ]->nombreReino }} </label>
            </div>
            <!--!<div class="col-xs-6 col-lg-1">
                    <label style="float: left;" >{{ $esp1_array[ $i ]->nombreReino }} </label>
            </div>-->
			<div class="col-xs-12 col-lg-2 ">
                  <label > División </label><br>
                  <label class="show1"   >{{ $esp1_array[ $i ]->nombreDivision }}</label>
            </div>
           <!-- <div class="col-xs-6 col-lg-1">
                    <label style="float: left;" >{{ $esp1_array[ $i ]->nombreDivision }}</label>
            </div>-->
            <div class="col-xs-12 col-lg-2 ">
                  <label> Clase</label><br>
                  <label  class="show1" " >{{ $esp1_array[ $i ]->nombreClase }} </label>
            </div>
            <!--<div class="col-xs-6 col-lg-1">
            		<label style="float: left;" >{{ $esp1_array[ $i ]->nombreClase }} </label>
            </div>-->
            <div class="col-xs-12 col-lg-2">
                  <label> Orden</label><br>
                  <label class="show1"  >{{ $esp1_array[ $i ]->nombreOrden }}  </label>
            </div>
            <div class="col-xs-12 col-lg-2">
                  <label> Familia</label><br>
                  <label class="show1" "  >{{ $esp1_array[ $i ]->nombreFamilia }}</label>

            </div>
            <div class="col-xs-12 col-lg-2">
                  <label> Género</label><br>
                  <label  class="show1" >{{ $esp1_array[ $i ]->nombreGenero }} </label>
            </div>

      	</div><!--Primera  fila-->
<!----><!----><!----><!----><!----><!----><!----><!----><!---->
          	<div class="row" >
			<hr style="border-color: #8e7200; " >
			</div>
<!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->

<!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
	<div class="row"><!--FILa-->
		<div class="col-xs-12 col-md-4">	<!--Columna1-->
		<div class="row"> <!--FILa-1- interna-->
		<div class="col-xs-12 col-md-12"><!--col1.1-->
			<label> Nombre Común</label>
			<br>
			<ul style="list-style-type:none"  style="float: left;"  class="show1" >
				@foreach( $nc_esp as $nc )
 				<li>{{ $nc->nombreComun }}</li>
 				@endforeach
  			</ul>

		</div><!--col1.2-->
		</div><!--col1.3-->

		<div class="row">
		<div class="col-xs-12 col-md-12"><!--col2.1-->
			<label> Nombre Ingles:</label>

			<label class="show1"  > {{ $esp1_array[ $i ]->nombreEnIngles }} </label>

		</div><!--col2.1-->

		</div>
		<br><br>

		</div><!--columna1-->


<!----><!----><!----><!----><!--COLUMNA 2--><!----><!----><!----><!----><!----><!---->
<div class="col-xs-12 col-md-4"><!--Columna2-->
	<div class="row" style="float: left;"><!--FILa-1 interna-->
		<div class="col-xs-12 col-md-12 ">

			<label >Apéndice CITES:</label>
			@foreach(  $a_esp as $a )
					<label  class="show1 "  > {{  $a->nombreApendiceCITES }} </label>
			@endforeach
			<br>
			<label >Categoría MARN:</label>
			@foreach(  $c_esp as $c )
				<label class="show1"  > {{ $c->nombreCategoriaMARN }} </label>
			@endforeach
			<br>
			<label >Categoría UICN:</label>
			@foreach( $u_esp as $a )
				<label class="show1"  > {{ $a->nombreCategoriaUICN }} </label>
			@endforeach
			<br>
			<label  > Procedencia Especie:</label>
			@foreach( $p_esp as $p )
			<label class="show1" > {{ $p->nombreProcedenciaDeLaEspecie }} </label>
			@endforeach
		</div>
	</div><!--FILa-1f interna-->
</div><!--Columna2-->
<!----><!----><!----><!----><!--COLUMNA 3--><!----><!----><!----><!----><!----><!---->
<div class="col-xs-12 col-md-4"><!--Columna3-->
	<div class="row"> <!--FILa-1- interna-->
		<div class="col-xs-12 col-md-12 ">
			<!--<label> Fotografía de Especie</label><br>-->

			@if(count($esp1_array[ $i ]->fotografiaEspecie)==1)

			<center>
			<img src="/imagen_especie/{{ $esp1_array[ $i ]->nombreEspecie }}/{{ $esp1_array[ $i ]->fotografiaEspecie }}" class="img-rounded" width="304" height="236">
			</center>


			<!--<div class="img ">
			<img src="/imagen_especie/{{ $esp1_array[ $i ]->nombreEspecie }}/{{ $esp1_array[ $i ]->fotografiaEspecie }}" style="    max-width: 225px;  height: auto;"   >
			</div>-->

			@else

			<center>
				<img src="/imagen/placeholder.png" class="img-rounded" width="304" height="236">
			</center>


			@endif

		<br>

		</div>

	</div>




	</div><!--Columna3-->
	</div>	<!--Fila-->
<!----><!----><!----><!----><!--COLUMNA 3--><!----><!----><!----><!----><!----><!---->


<div class="row"> <!--FILa-2- interna-->
	<div class="col-xs-12 col-md-12">
			<label for="name">Descripción de Ejemplar</label>

			<p class="show1" >
			{{ $esp1_array[ $i ]->descripcionDelEjemplar }}
		</p>
	</div>
</div>



</div><!--panel body-->
</form>

</div><!--panel-->

</div><!--contanier-->

    @endfor





</body>

</html>
