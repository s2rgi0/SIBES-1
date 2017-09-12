<!DOCTYPE html>
<html>
<head>
	<title> MARN | SIBES </title>
	<meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link rel=stylesheet href="css/estilo_esencial.css" type="text/css">
        <link rel=stylesheet href="css/estilo_mostrar.css" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
	<link rel="shortcut icon" type="image/ico" href="/imagen/favicon.ico" />
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="/js/plugins/sortable.js" type="text/javascript"></script>       
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" type="text/javascript"></script>
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
          map: map,
          id:{{$cord->idAvistamiento}}
        });
        
        

        marker_{{$cord->idAvistamiento}}.addListener('click',function(){
            console.log(this.id)
            var id = this.id
            var div = $('#modal-body-view')

            llenar_campos_avis( id, div );
            publi_pdf_avis( id, div);

            $('#VER_Avist').modal('show');


        })

        @endforeach

      }


    function llenar_campos_avis( id, div ){

            $.ajax({
                 type : 'get',
                url  : '{!! URL::to('get_Avista_BY_ID') !!}',
                data :  { 'id':id },
                success:function(data){
                    console.log(data)
                    console.log('si se pudo get la info')
                    div.find('#id_view').val(data[0].idAvistamiento);
                    div.find('#label_esp_v').text(data[0].idAvistamiento);
                    div.find('#fecha-view').text(data[0].fechaHoraAvistamiento);
                    div.find('#hora-view').text(data[0].horaAvistamiento);
                    div.find('#fecha-ing-view').text(data[0].fechaIngresodeInformacionBD);
                    div.find('#col-view').text(data[0].nombreColector);
                    div.find('#dep-view').text(data[0].nombreDepartamento);
                    div.find('#mun-view').text(data[0].nombreMunicipio);
                    div.find('#can-view').text(data[0].nombreCanton);
                    div.find('#fuente-view').text(data[0].nombreFuente);
                    div.find('#ejem-view').text(data[0].ejemplarDepositado);
                    div.find('#num_avis_ver').text(data[0].numeroEspecies);
                    div.find('#lati-vista').text(data[0].mostrar_lati);
                    div.find('#long-vista').text(data[0].mostrar_long);
                    div.find('#altu-vista').text(data[0].alturaAvistamiento);
                    div.find('#suelo-vista').text(data[0].nombreSuelo);
                    div.find('#tierra-vista').text(data[0].nombreClaseDeTierra);
                    div.find('#publicacion_PDF').text(data[0].publicacionPdf);
                    div.find('#clima-avista').text(data[0].descripcionClimaAvistamiento);
                    div.find('#eco-avista').text(data[0].ecosistemaAvistamiento);
                    div.find('#fisio-avista').text(data[0].fisiografiaAvistamiento);
                    div.find('#geo-avista').text(data[0].geologiaAvistamiento);
                    div.find('#hidro-avista').text(data[0].hidrografiaAvistamiento);
                    div.find('#usos-avista').text(data[0].usosDeLaEspecieAvistamiento);

                    if(data[0].fotografiaAvistamiento){

                        $('#img-avista').attr('src','/imagen_especie/'+data[0].nombreEspecie+'/'+data[0].fotografiaAvistamiento).fadeIn();    
                    }

                },error:function(){
                    console.log('no se pudo get la info')
                    llenar_campos_avis( id, div );
                }
            })            
        }

        function publi_pdf_avis( id, div){


            var fue = "";            
            $.ajax({
                        type : 'get',
                        url  : '{!! URL::to('Publi_PDF_AVIS') !!}',
                        data :  { 'id':id },
                        success:function(data){
                            console.log('success pdf info')
                            console.log(data)                            
                            fue = "";
                            for(var i = 0 ; i < data.length ; i++ )
                            {
                            fue+='<tr><td>'+data[i].nombrePublicacion+'<a href="/publicacion_especie/'+data[i].nombreEspecie+'/'+data[i].nombrePublicacion+'" target="_blank" class="btn btn-default btn-sm" style="float:right;">documento PDF</a></td></tr>';
                            }
                            div.find('.row_pdf').html(" ");
                            div.find('.row_pdf').append(fue);

                        },
                        error:function(){
                            console.log('error con fuente info ')
                            publi_pdf_avis( id, div);
                        }
                    })
        }      



</script>


<style type="text/css">
    .navbar{
            box-shadow: 0 7px 10px 0 rgba(0, 0, 0, 0.2);
        }
</style>


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
    <form id="frm-colector" method="get" action="Agregar_Colector" >
        <input type="hidden" name="id_usuario" value="{{ $usuario[0]->idUsuario }}" >
    </form>
    <form id="frm-colector-tabla" method="get" action="Tabla_Colectores" >
        <input type="hidden" name="id_usuario" value="{{ $usuario[0]->idUsuario }}" >
    </form>
<nav>
  	<ul class="nav nav-tabs">

        <li role="presentation" id="Info-AVIS" ><a>Especie</a></li>

        <li role="presentation" id="Esp-AVIS" ><a>Avistamientos</a></li>

        <li role="presentation" class="active" ><a>Mapa</a></li>
		
	</ul>
</nav>
<div class="row" >
    <div  class="col-lg-2">
        <br>
        <div class="col-xs-12">
            <!--<label> Fotografía de Especie</label><br>-->

            @if(count($esp->fotografiaEspecie)==1)
            <center>
                <img src="/imagen_especie/{{ $esp->nombreEspecie }}/{{ $esp->fotografiaEspecie }}" class="img-rounded" width="150" height="140">
            </center>
            @else
            <center>
                <img src="/imagen/placeholder.png" class="img-rounded" width="150" height="140">
            </center>
            @endif
           <br><br>
        </div>

   
        <div style="padding-left: 20px;" >

        <div class="col-xs-12 ">
            <label>Reino </label><br>
            <label class="show1">{{ $esp->nombreReino }} </label>
        </div><br>
        <div class="col-xs-12  ">
            <label > División </label><br>
            <label class="show1"   >{{ $esp->nombreDivision }}</label>
        </div><br>
        <div class="col-xs-12  ">
            <label> Clase</label><br>
            <label  class="show1" " >{{ $esp->nombreClase }} </label>
        </div><br>
        <div class="col-xs-12 ">
            <label> Orden</label><br>
            <label class="show1"  >{{ $esp->nombreOrden }}   </label>
        </div><br>
        <div class="col-xs-12 ">
            <label> Familia</label><br>
            <label class="show1" "  >{{ $esp->nombreFamilia }}</label>
        </div><br>
        <div class="col-xs-12 ">
            <label> Género</label><br>
            <label  class="show1" >{{ $esp->nombreGenero }} </label>
        </div>
            
        </div>
    </div>
    <div  class="col-lg-10">

        <center>

            <div id="map"></div>

        </center>
        
    </div>
</div>



@include('modales.avi_mod')


</body>
</html>
