<!DOCTYPE html>
<html>
<head>
 	<meta name="csrf-token" content="{{ csrf_token() }}">
		<title>MARN | SIBES</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel=stylesheet href="css/estilo_mostrar.css" type="text/css">
    <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <link href="/css/fileinput.css" media="all" rel="stylesheet" type="text/css"/>

        <link href="/themes/explorer/theme.css" media="all" rel="stylesheet" type="text/css"/>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="/js/plugins/sortable.js" type="text/javascript"></script>
        <script src="/themes/explorer/theme.js" type="text/javascript"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" type="text/javascript"></script>
        <link rel="shortcut icon" type="image/ico" href="/imagen/favicon.ico" />
        <script src="sweetalert/dist/sweetalert.min.js"></script>
        <link rel="stylesheet" type="text/css" href="sweetalert/dist/sweetalert.css">

	 <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
    <style type="text/css">
    	#nombre_comun{


    		background-color: #c6b9b9 ;

    	}


    </style>

</head>
<body >
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


@for ($i = 0; $i < $elementCount ; $i++)

<form method="get" action="Avistamiento" id="frm-avista" >
	<input type="hidden" id="id_esp_avis" name="id_especie" value="{{ $esp1_array[ $i ]->idEspecie }}">
</form>
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
<form method="get" action="GET_especie" id="frm-Info" >
	
	<input type="hidden" id="id_especie" name="esp_id" value="{{ $esp1_array[ $i ]->idEspecie }}">
	<input type="hidden" id="id_usuario" name="id_usuario" value="{{ $usuario[0]->idUsuario }}">

</form>


	<nav>

  		<ul class="nav nav-tabs">

	  	  	<li role="presentation" class="active" id="" ><a>Especie</a></li>

	  		<!--<li role="presentation"  id="Avista_link" ><a>Avistamientos</a></li>

			<li role="presentation"  id="Mapa_link" ><a>Mapa</a></li>-->

		</ul>



	</nav>

	<input type="hidden" id="id_esp_avis" name="id_especie" value="{{ $esp1_array[ $i ]->idEspecie }}">




<div class="container-fluid" >
<div class="row">
	<div class="col-xs-12 col-md-12">

		<h3 class="titulo"> Ingreso de Información&nbsp; <label class="btn btn-default btn-group " id="Agregar_link"  style="float: right ;" >
			Agregar  <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
		</label>
		</h3>
	</div>

</div>




	<div  class="panel">

		<div class="panel-body" >
		<form  method="POST" action="/guardar_especie" id="frm-especie" enctype="multipart/form-data"  >
		<input name="_token" type="hidden" value="{{ csrf_token() }}"/>
		<input type="hidden" id="id_especie" name="id_especie" value="{{ $esp1_array[ $i ]->idEspecie }}">
		<input  type="hidden" name="id_genero" value="{{ $esp1_array[ $i ]->idGenero }}">
		<input  type="hidden" name="n_esp" value="{{ $esp1_array[ $i ]->nombreEspecie }}">
		<div class="row">
		<div class="col-xs-12">
		<h4 class="taxo"> &nbsp;&nbsp;Taxonomía de Especie</h4>
		<h4><label  class="espec">&nbsp;{{ $esp1_array[ $i ]->nombreEspecie }}</label> </h4>
		</div>
		</div>
		<br>
		<div class="row">
			<div class="col-xs-12 col-lg-2">
                  <label>Reino </label><br>
                  <label class="show1">{{ $esp1_array[ $i ]->nombreReino }} </label>
            </div>
         	<div class="col-xs-12 col-lg-2 ">
                  <label > División </label><br>
                  <label class="show1"   >{{ $esp1_array[ $i ]->nombreDivision }}</label>
            </div>
            <div class="col-xs-12 col-lg-2 ">
                  <label> Clase</label><br>
                  <label  class="show1" " >{{ $esp1_array[ $i ]->nombreClase }} </label>
            </div>
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

       	<div class="row" >
			<hr style="border-color: #8e7200;" >
		</div>
		<!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
		<div class="row"><!--FILa-->
		<div class="col-xs-12 col-md-4">	<!--Columna1-->
		<div class="row"> <!--FILa-1- interna-->
		<div class="col-xs-12 col-md-12"><!--col1.1-->
			<label> Nombre Común</label>
			<input type="text" style="width:175px;height: 22px;" id="nc_input" name="nc_input" class="input_nc" >
			<button type="submit" class="btn btn-success btn-xs" id="g_nc" value="nombre_comun" >
				<span class="glyphicon glyphicon-plus" aria-hidden="true"  ></span>
			</button>

		</div><!--col1.2-->
		<div class="col-xs-12 col-md-6"><!--col1.3-->
			<ul style="list-style-type:none"  style="float: left;" class="nom_com"  >
				@foreach( $nc_esp as $nc )
 				<li>{{ $nc->nombreComun }}</li>
 				@endforeach
  			</ul>
  		</div><!--col1.3-->
		</div><!--col1.3-->
		<div class="row">
		<div class="col-xs-12 col-md-12"><!--col2.1-->
			<label> Nombre Ingles</label>
			<input type="text" style="width:200px;height: 22px;" name="nom_ingles" id="nombre_ingles" value="{{ $esp1_array[ $i ]->nombreEnIngles }}" >
		</div><!--col2.1-->
		</div>

		<div class="" style="display: none;color:#ff3700;" id="_nom_ingles" ><span class="help-block" ><strong style="color:  #00ff19 ;" >{{ $errors->  first('nom_ingles') }}</strong></span>  </div>

		</div><!--columna1-->

<!----><!----><!----><!----><!--COLUMNA 2--><!----><!----><!----><!----><!----><!---->
<div class="col-xs-12 col-md-4"><!--Columna2-->
<div class="row" style="float: left;">
	<div class="col-xs-6 col-md-12 ">
		<label class="hidden-xs">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Clase Tipo</label>

		@if( count( $t_esp  ) == 1 )
			<select style="width:200px;" class="especie" name="clase_tipo" id="clase_id" >
				@foreach( $t_esp  as $a )
				<option value="{{ $a->idClaseDeTipo }}" selected="selected" >{{ $a->nombreClaseDeTipo }}</option>
				@endforeach
				@foreach( $tipo as $a )
				<option value="{{ $a->idClaseDeTipo }}" >{{ $a->nombreClaseDeTipo }}</option>
				@endforeach
			</select>
		@else
			<select style="width:200px;" class="especie" name="clase_tipo" id="clase_id" >
			<option valueid="0" disabled="true" selected="true">  -- Clase Tipo --</option>
				@foreach( $tipo as $a )
					<option value="{{ $a->idClaseDeTipo }}" >{{ $a->nombreClaseDeTipo }}</option>
				@endforeach
			</select>

		@endif
		<div class="" style="display: none;color:#ff3700;float: right;" id="_clase_tipo" ><span class="help-block" ><strong style="color:  #00ff19 ;" >{{ $errors->  first('clase_tipo') }}</strong></span>  </div>

	</div>
</div><!--FILa-1 interna-->
<!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
<div class="row" style="float: left;"><!--FILa-2 interna-->
<div class="col-xs-6 col-md-12">
	<label class="hidden-xs">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Apéndice CITES</label>
	@if( count( $a_esp ) == 1 )
		<select style="width:200px;" class="especie" name="append_cites" id="append_id" >
			@foreach( $a_esp as $a )
				<option value="{{ $a->idApendiceCITES }}" selected="selected" >{{ $a->nombreApendiceCITES }}</option>
			@endforeach
			@foreach( $append as $a )
				<option value="{{ $a->idApendiceCITES }}" >{{ $a->nombreApendiceCITES }}</option>
			@endforeach
		</select>
	@else
		<select style="width:200px;" class="especie" name="append_cites" id="append_id" >
			<option valueid="0" disabled="true" selected="true">  -- Apendice CITES --</option>
			@foreach( $append as $a )
				<option value="{{ $a->idApendiceCITES }}" >{{ $a->nombreApendiceCITES }}</option>
			@endforeach
		</select>
	@endif
	<div class="" style="display: none;color:#ff3700;float: right;" id="_append_cites" ><span class="help-block" ><strong style="color:  #f44242 ;" >{{ $errors->  first('append_cites') }}</strong></span>  </div>


</div>
</div><!--FILa-2interna-->
<!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->

<div class="row" style="float: left;"> <!--FILa-3- interna-->
	<div class="col-xs-12 col-md-12 ">
		<label class="hidden-xs" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Categoría MARN</label>

		@if(count( $c_esp) == 1)

		<select style="width:200px;" class="especie" name="cat_marn" id="categoria_id" >
			@foreach( $c_esp as $c )
			<option value="{{ $c->idCategoriaMARN }}" selected="selected" >{{ $c->nombreCategoriaMARN }}</option>
			@endforeach
			@foreach( $cat as $c )
				<option value="{{ $c->idCategoriaMARN }}" selected="selected" >{{ $c->nombreCategoriaMARN }}</option>
			@endforeach
				<option value="0" disabled="true" >   -- Categoria MARN -- </option>
		</select>

	@else

		<select style="width:200px;" class="especie" name="cat_marn" id="categoria_id" >
			<option value="0" disabled="true" selected="true">  -- Categoria MARN --</option>
			@foreach( $cat as $c )
			<option value="{{ $c->idCategoriaMARN }}" >{{ $c->nombreCategoriaMARN }}</option>
			@endforeach
		</select>

	@endif

	<div class="" style="display: none;color:#ff3700;float: right;" id="_cat_marn" ><span class="help-block" ><strong style="color:  #f44242 ;" >{{ $errors->  first('cat_marn') }} </strong></span>  </div>


	</div>

</div><!--FILa-3-f interna-->
<!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
<div class="row" style="float: left;""><!--FILa-4 interna-->
		<div class="col-xs-12 col-md-12">
		<label class="hidden-xs">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Categoría UICN</label>

		@if( count( $u_esp ) == 1 )

			<select style="width:200px;" class="especie" name="cat_uicn" id="uicn_id" >

				@foreach( $u_esp as $a )
					<option value="{{ $a->idCategoriaUICN }}" selected="selected" >{{ $a->nombreCategoriaUICN }}</option>
				@endforeach



				@foreach( $uicn as $a )
					<option value="{{ $a->idCategoriaUICN }}" >{{ $a->nombreCategoriaUICN }}</option>
				@endforeach

			</select>

		@else

			<select style="width:200px;" class="especie" name="cat_uicn" id="uicn_id" >

				<option valueid="0" disabled="true" selected="true">  -- Categoria UICN --</option>
				@foreach( $uicn as $a )
					<option value="{{ $a->idCategoriaUICN }}" >{{ $a->nombreCategoriaUICN }}</option>
				@endforeach

			</select>

		@endif

		<div class="" style="display: none;color:#ff3700;float: right;" id="_cat_uicn" ><span class="help-block" ><strong style="color:  #f44242 ;" >  {{ $errors->  first('cat_uicn') }} </strong></span>  </div>


	</div>
	</div><!--FILa-4f interna-->
<!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
<div class="row" style="float: left;"><!--FILa-5 interna-->
		<div class="col-xs-12 col-md-12">
	<label class="hidden-xs"> Procedencia Especie&nbsp;</label>

	@if(count($p_esp) == 1)

			<select style="width:200px;" class="especie" name="proce_especie" id="procedencia_id"  >
				@foreach( $p_esp as $p )
				<option value="{{ $p->idProcedenciaDeLaEspecie }}" selected="selected" >{{ $p->nombreProcedenciaDeLaEspecie }}</option>
				@endforeach
				@foreach( $proc as $p )
				<option value="{{ $p->idProcedenciaDeLaEspecie }}" >{{ $p->nombreProcedenciaDeLaEspecie }}</option>
				@endforeach
				<option value="0" disabled="true" >  -- Procedencia Especie --</option>
			</select>

		@else

			<select style="width:200px;" class="especie" name="proce_especie" id="procedencia_id"  >
				<option value="0" disabled="true" selected="true">  -- Procedencia Especie --</option>
				@foreach( $proc as $p )
				<option value="{{ $p->idProcedenciaDeLaEspecie }}" >{{ $p->nombreProcedenciaDeLaEspecie }}</option>
				@endforeach
			</select>

		@endif

		<div class="" style="display: none;color:#ff3700;float: right;" id="_proce_especie" ><span class="help-block" ><strong style="color:  #f44242 ;" >  {{ $errors->  first('proce_especie') }} </strong></span>  </div>

</div>
	</div><!--FILa-5f- interna-->
<!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
	</div><!--Columna2-->


<!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
<div class="col-xs-12 col-md-4"><!--Columna3-->
	<div class="row"> <!--FILa-1- interclass="crop"na-->
	<br>
		<div class="col-xs-12 col-md-12 ">
				<label> Fotografía de Especie</label>
				<input type="file" name="file" id="file" >
		</div>
	</div>

</div><!--Columna3-->
<!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
</div><!--fila-->
<br>
<!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->
<div class="form-group row">
    <div class="col-xs-12 col-md-8">
        <label for="descripcion">Descripcion de Ejemplar:</label>
        <textarea class="form-control" name="descripcion_ejemplar" id="descripcion" rows="3">{{ $esp1_array[ $i ]->descripcionDelEjemplar }}</textarea>

    </div>
    <div class="col-xs-12 col-md-4">
    <br>
    <br>
			 <button type="submit" class="btn btn-success" value="guardado_especie">Guardar</button>

	</div>
</div>
<!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!---->

</form>
</div><!--PANELBODY-->
	</div><!--PANEL-->
	</div><!--contanier-->

@include('modales.mensajes')


  	@endfor


<script type="text/javascript">


	$(document).ready(function(){

		$('#_clase_tipo').fadeOut();
		$('#_cat_uicn').fadeOut();
		$('#_cat_uicn').fadeOut();
		$('#_append_cites').fadeOut();
		$('#_proce_especie').fadeOut();


	    /////////////////////////////////////////////////////


			$("#frm-especie button").click(function(ev){

   				//alert($(this).attr("value"));
    			ev.preventDefault();
    			// cancel form submission
   				if($(this).attr("value")=="button-one"){
        		//do button 1 thing

    			    alert("Your ACtion on Button 1");
    			}
    			// $("#my-form").submit(); if you want to submit the form

   				if($(this).attr("value")=="button-two"){
       			//do button 1 thing

    			    alert("Your ACtion on Button 2");
    			}

    			if($(this).attr("value")=="button-three"){
        		//do button 1 thing

        		alert("Your ACtion on Button 3");
    			}
    			if($(this).attr("value")=="nombre_comun"){
        		//do button 1 thing

        		//alert("Your ACtion on Noombre COmun");

        			var id = $('#id_esp').val();
					var input = $('#nc_input').val();
					var par_i = $('#nc_input').parent().parent();
					var lista = "";
					console.log(input);


			 		if( !$('#nc_input').val()) {

			 			//alert('meta algo');
			 			$(".input_nc").val("");

    				}else{
						//alert('bueno aqui no se mete')
						$.ajax({
						type:'post',
						url : '{!! URL::to('ingr_nc') !!}',
						data : {'id':id,
								'nombre':input,
								 "_token": "{{ csrf_token() }}",
						},
						success:function(data){
							console.log('lo pudimos ingresar')
							var id_esp = $('#id_esp').val();
							var par = $('.nom_com').parent().parent();
							$.ajax({
							type : 'get',
							url : '{!! URL::to('buscaNombreComun') !!}',
							data : {'id':id_esp},
							success:function(data){
								console.log('success');
								console.log(data);
								console.log(data.length);
								for(var i = 0 ; i < data.length ; i++ ){
								lista+='<li>'+data[i].nombreComun+'</li>';
								}
								$(".input_nc").val("");
								par.find('.nom_com').html(" ");
								par.find('.nom_com').append(lista);
							},
							error:function(){
								console.log('error');
							}
							});
						},
						error:function(){
							console.log('no c pudo ingresar')
						}
						})
					}

				/////////////TERMINA IF//////////////
    			}
    			if($(this).attr("value")=="guardado_especie"){
        		//do button 1 thing

        			//alert("Your ACtion de Guardar especie");
        			var id = $('#id_especie').val();
					var pro_id = $('#procedencia_id').val();
					var cat_id = $('#categoria_id').val();
					var uic_id = $('#uicn_id').val();
					var cla_id = $('#clase_id').val();
					var descri = $('#descripcion').val();
					var ingles = $('#nombre_ingles').val();
					var par = $('.nom_com').parent().parent();
					var c_m = "";
					var p_e = "";
					var C_U = "";
					var a_s = "";

	       			var form = document.querySelector('#frm-especie');
	       			var formdata = new FormData(form);
	       			console.log(form)
	       			console.log(formdata)
	       			$.ajax({
	       				type : 'post',
	       				url  : '{!! URL::to('SAVE_Especie') !!}',
	       				data : formdata,
	       				contentType: false,
	       				processData: false,
	       				cache : false,
	       				success:function(data){
	       					console.log('se pudo ingresar')
	       					console.log(data.errors)

	       					if(data.success == false ){

	       						if(data.errors == 'no es una imagen'){
                                    //alert('no es una imagen')
                                   sweetAlert("Ingrese una imagen", "jpg,bmp o gif!", "error");   
                                }

	       						$('#_clase_tipo,#_append_cites,#_cat_marn,#_cat_uicn,#_proce_especie,#_nom_ingles').text('');

                                $.each(data.errors , function(index,value){
                                $('#_'+index).fadeIn();
                                $('#_'+index).text(value);
                                });
	       					}else{
	       						$("#Exito_Modal").modal('show')
	       					}

	       				},error:function(){
	       					console.log('errores al ingreso')
	       					sweetAlert("No se pudo ingresar", "intente de nuevo!", "error");   
	       					//$("#Error_Modal").modal('show')
	       					$('#frm-Info').submit();

	       				}
	       			})
	       			$("#frm-especie").get(0).reset();
	       		}


			});





        /////////////////////////////////////////////////////


		//alert('guerrila')

		$('#frm-exito').on('submit',function(e){
			e.preventDefault();
			var form = this;
			$("#Exito_Modal").modal('hide');
			form.submit();

		});

		$('#btn-exito').click(function(){

			$("#Exito_Modal").modal('show');

		});

		$('#btn-error').click(function(){

			$("#Error_Modal").modal('show');

		});

		$('#Avista_link').click(function(){

			//alert('avis vamos')
			$('#frm-avista').submit();

		})


		$('#Agregar_link').click(function(){

			//alert('GAregar especie vamos')
			$('#frm-agregar-esp').submit();

		})

		$('#id_agregar_esp').click(function(){

  			//alert('agregar especie')
  			$('#frm-agregar-esp').submit();

  		});


  		$('#id_consultar_esp').click(function(){

  			//alert('consultar_especie especie')
  			$('#frm-consultar-esp').submit();

  		});


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


	});



</script>
</body>
</html>
