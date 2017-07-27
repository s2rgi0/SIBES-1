<!DOCTYPE html>
<html>
<head>
	<title> MARN | SIBES </title>

	 <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

	 	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link href="/themes/explorer/theme.css" media="all" rel="stylesheet" type="text/css"/>
        <link rel=stylesheet href="css/estilo_mostrar.css" type="text/css">
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="/js/plugins/sortable.js" type="text/javascript"></script>
       
        <script src="/themes/explorer/theme.js" type="text/javascript"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" type="text/javascript"></script>
        <link rel="shortcut icon" type="image/ico" href="/imagen/favicon.ico" />

<script async defer    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAyc-0JilQZiy7Nls1hdG9-n-wUctabeVQ&callback=initMap">
</script>

<script>

      function initMap() {
        
        var centro = {lat: 13.7954, lng: -89.000};


        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 9,
          center: centro
        });

        @foreach( $coord as $cord )

        var lat = '{{$cord->latitudAvistamiento}}';
        var long = '{{$cord->longitudAvistamiento}}';

        console.log('aqui viene latit')


        console.log(lat)

        var uluru = new google.maps.LatLng( lat , long );
        
        var marker_{{$cord->idAvistamiento}} = new google.maps.Marker({
          position: uluru,
          map: map
        });
        
        @endforeach


      }
</script>





<style>
    #map {
    	
    	width: 100%;
        height: 600px;
        background-color: grey;
    }
</style>
<script type="text/javascript">
    
    $(document).ready(function(){

        $('#Info-AVIS').click(function(){

            $('#AVIS-frm').submit();

        })

        $('#Esp-AVIS').click(function(){
            
            $('#frm-avista').submit();

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



        
    })

</script>
</head>
<body>

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


@foreach( $espec as $esp )
	<form method="get" action="informacion_avis" id="AVIS-frm" >
        <input type="hidden" name="id_especie" value="{{ $esp->idEspecie }}" >
        <input type="hidden" name="id_usuario" value="{{ $usuario[0]->idUsuario }}" >
    </form>
    <form method="get" action="Avistamiento" id="frm-avista" >
        <input type="hidden" name="id_especie" value="{{ $esp->idEspecie }}" >
        <input type="hidden" name="id_usuario" value="{{ $usuario[0]->idUsuario }}" >
    </form>

    </form>
@endforeach
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
<nav>
  	<ul class="nav nav-tabs">

        <li role="presentation" id="Info-AVIS" ><a>Especie</a></li>

        <li role="presentation" id="Esp-AVIS" ><a>Avistamientos</a></li>

        <li role="presentation" class="active" ><a>Mapa</a></li>
		
	</ul>
</nav>

<center>

	<div id="map"></div>

</center>


</body>
</html>