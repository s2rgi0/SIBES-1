<!DOCTYPE html>
<html>
<head>
	<title>SIBES | MARN</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	 <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
   <link rel="shortcut icon" type="image/ico" href="/imagen/favicon.ico" />
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" type="text/javascript"></script>
    <link rel=stylesheet href="css/estilo_mostrar.css" type="text/css">
    <script src="sweetalert/dist/sweetalert.min.js"></script>
    <link rel="stylesheet" type="text/css" href="sweetalert/dist/sweetalert.css">
<style>
nav{
    box-shadow: 0 7px 10px 0 rgba(0, 0, 0, 0.2);
  }
body{
    background-image: url("/imagen/patron2.png");
  }
</style>

</head>
<body>

<header>
    <img src="imagen/cafe_1.jpg" alt="SIBES" class="img-responsive" >
</header>
<nav>
	@include('parciales.menu')
</nav>

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
<form id="frm-colector-tabla" method="get" action="Tabla_Colectores" >
  <input type="hidden" name="id_usuario" value="{{ $usuario[0]->idUsuario }}" >
</form>
<form id="frm-colector" method="get" action="Agregar_Colector" >
  <input type="hidden" name="id_usuario" value="{{ $usuario[0]->idUsuario }}" >
</form>

<br>
<center><h1>Tabla de Usuarios</h1></center>
<br>
	<center>

		<table id="resultados" class="table table-striped table-bordered table-hover" width="100%" cellspacing="0" style="background-color: white;width: 70%;" > 
		<thead>
		<tr>
			
			<th>Nombre Completo </th>
      <th>Usuario </th>
      <th>Tipo Usuario</th>     
      <th>Accion</th>
				
		</tr>
		</thead> 
		<tbody class="row_usuarios">
			
			@foreach( $users as $usr )

				<tr>

					<td> {{ $usr->nomComp }} </td>
					<td> {{ $usr->nombreUsuario }} </td>
					<td> {{ $usr->tipoUsuario }} </td>
					<td>
						<button class="btn btn-default  btn-Baja "  value="{{ $usr->idUsuario }}"  >Dar Baja</button>
						<button class="btn btn-default btn-Roll " value="{{ $usr->idUsuario }}"  >Cambiar roll</button>
					</td>

				</tr>

			@endforeach
				
		</tbody>
		</table>

		
	</center>


<!--vemos informacion de subespecie-->

<div class="modal fade" id="EDIT_usr" role="dialog" >
  <div class="modal-dialog modal-md ">
    <!-- Modal content-->
      <div class="modal-content" style=" vertical-align: middle;" >
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"></h4>
        </div>
          <form method="post" action="Baja_usuar" id="frm-baja" >
            <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
            <div class="modal-body">
            <div class="row">
              	<center>
                  <h4>¿Desea dar de baja al usuario?</h4>
                </center>
                <input type="hidden" name="usar_baja" value="" id="usar_baja" class="" >				
            </div>
            </div>
            <div class="modal-footer">
              <center>
                <button type="submit" class="btn btn-default btn-md" id="save-baja" > Aceptar </button>
                </form>      
                <a class="btn btn-default btn-md" id="cerrar-save-baja">Cancelar</a>
              </center>
            </div>
          
        </div>
  </div>
</div>

<div class="modal fade" id="Roll_usr" role="dialog" >
  <div class="modal-dialog modal-md ">
    <!-- Modal content-->
      <div class="modal-content" style=" vertical-align: middle;" >
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"></h4>
        </div>
          <form method="post" action="Roll_usuar" id="frm-baja" >
            <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
            <div class="modal-body">
            <div class="row">
                <center>
                  <h4>¿Desea cambiar el roll?</h4>
                  <br>
                  <select class="form-control" id="tipo_usr" name="tipo_usr" style="width: 300px;" >
                    <option value="0" disabled="false" selected="true"><center>   --Seleccionar--  </center></option>

                    @foreach( $tipo as $tip )
                      <option value="{{$tip->idTipo}}" > {{$tip->tipoUsuario}} </option>
                    @endforeach

                  </select>
                </center>
                <input type="hidden" name="usar_roll" value="" id="usar_roll" class="" >        
            </div>
            </div>
            <div class="modal-footer">
              <center>
                <button type="submit" class="btn btn-default btn-md" id="save-roll" > Aceptar </button>
                </form>
                <a class="btn btn-default btn-md" id="cerrar-save-roll">Cancelar</a>
              </center>
            </div>
          
        </div>
  </div>
</div>


<script type="text/javascript">

	$(document).ready(function(){

		$(document).on('click','.btn-Baja',function(e){

			var id = $(this).val();
			//alert(id)
			$('#usar_baja').val(id);
			$('#EDIT_usr').modal('show');


		})


    $(document).on('click','.btn-Roll',function(e){

      var id = $(this).val();
      $('#tipo_usr').val('0');
      //alert(id)
      $('#usar_roll').val(id);
      $('#Roll_usr').modal('show');
    })	    	

	    
	    $('#save-baja').click(function(e){

	    	e.preventDefault();
	    	var id = $('#usar_baja').val();
	    	//alert(id)
	    	$.ajax({
	    		type : 'post',
	    		url  : '{!! URL::to('Baja_usuar') !!}',
                data : { 'id' : id ,"_token": "{{ csrf_token() }}", },
                success:function(data){
                	console.log('si se pudo')
                	$('#EDIT_usr').modal('hide');

                	$.ajax({
                		type : 'get',
	    				      url  : '{!! URL::to('usuarios_uno') !!}',
                		success:function(data){
                      swal("Se dio de Baja al usuario", "", "success")
                			console.log(data)
                			var div = $('.row_usuarios');
                			var i_e = "";
                			for(var i = 0 ; i < data.length ; i++ )
                       		{
                       	 	i_e+= '<tr><td>'+data[i].nomComp+'</td><td> '+ data[i].nombreUsuario +'</td><td>'+data[i].tipoUsuario+'</td><td><button class="btn btn-default btn-Baja" value="'+data[i].idUsuario+'" >Dar de Baja</button> <button class="btn btn-default btn-Roll" value="'+data[i].idUsuario+'" >Cambiar roll</button></td></tr>';
                       	 	}
                       	 	div.html(" ");
                        	div.append(i_e);
                		},
                		error:function(){

                		}
                	})
                },
                error:function(){
                	console.log('no se pudi')
                }
	    	})
	    })

      $('#save-roll').click(function(e){

        e.preventDefault();
        var id = $('#usar_roll').val();
        var id_rol = $('#tipo_usr').val();

        $.ajax({
          type : 'post',
          url  : '{!! URL::to('Roll_usuar') !!}',
                data : { 'id' : id , 'rol' : id_rol ,"_token": "{{ csrf_token() }}", },
                success:function(data){
                  console.log('si se pudo')
                  $('#Roll_usr').modal('hide');

                  $.ajax({
                    type : 'get',
                    url  : '{!! URL::to('usuarios_uno') !!}',
                    success:function(data){
                      swal("Se cambio el roll del usuario", "", "success")
                      console.log(data)
                      var div = $('.row_usuarios');
                      var i_e = "";
                      for(var i = 0 ; i < data.length ; i++ )
                          {
                          i_e+= '<tr><td>'+data[i].nomComp+'</td><td> '+ data[i].nombreUsuario +'</td><td>'+data[i].tipoUsuario+'</td><td><button class="btn btn-default btn-Baja" value="'+data[i].idUsuario+'" >Dar de Baja</button> <button class="btn btn-default btn-Roll" value="'+data[i].idUsuario+'" >Cambiar roll</button></td></tr>';
                          }
                          div.html(" ");
                          div.append(i_e);


                    },
                    error:function(){

                    }
                  })
                },
                error:function(){
                  console.log('no se pudi')
                }
        })
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

      $('#cerrar-save-baja').click(function(){

      $('#EDIT_usr').modal('hide');

      });
      $('#cerrar-save-roll').click(function(){

         $('#Roll_usr').modal('hide');

      });
      
      $('#id_colectoX').click(function(){

        //alert('iremos al comienzo')
        $('#frm-colector-tabla').submit();

      });

      $('#id_colector').click(function(){

        //alert('iremos al comienzo')
        $('#frm-colector').submit();

      });


      //alert('vamos a editar')

	});

</script>

</body>
</html>
