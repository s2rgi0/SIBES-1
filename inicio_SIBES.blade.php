<!DOCTYPE html>
<html>
<head>
  <title> MARN | SIBES </title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
     <meta content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0" name="viewport">
     <link href="https://fonts.googleapis.com/css?family=Advent+Pro|Baloo|Raleway" " rel="stylesheet">
     <link rel="shortcut icon" type="image/ico" href="/imagen/favicon.ico" />

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="//cdn.jsdelivr.net/webshim/1.14.5/polyfiller.js"></script>
    <script language="JavaScript">
  function nobackbutton(){
   window.location.hash="no-back-button";
   window.location.hash="Again-No-back-button" //chrome
   window.onhashchange=function(){window.location.hash="no-back-button";}
}
</script>
<style>
  nav{
    box-shadow: 0 7px 10px 0 rgba(0, 0, 0, 0.2);
  }


body{
    background-image: url("/imagen/patron2.png");
  }
</style>

</head>
<body onload="nobackbutton();">

<header>
         @include('parciales.nav')
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

<script type="text/javascript">

  $(document).ready(function(){

    $('input:text').val('');

  });

  $('#id_agregar_esp').click(function(){

    //alert('agregar especie')
    $('#frm-agregar-esp').submit();

  });


  $('#id_consultar_esp').click(function(){

    //alert('consultar_especie especie')
    $('#frm-consultar-esp').submit();

  });


      $('#id_agregar_usr').click(function(){

        //alert('iremos agregar usuario')
        $('#frm-agregar-usr').submit();

      });

      $('#id_estado_usr').click(function(){

        //alert('iremos estado usuario')
        $('#frm-estado-usr').submit();

      });

      $('#id_inicio_sibes').click(function(){

        //alert('iremos al comienzo')
        $('#frm-inicio-esp').submit();

      });

      $('#id_colector').click(function(){

        //alert('iremos al comienzo')
        $('#frm-colector').submit();

      });

      $('#id_colectoX').click(function(){

        //alert('iremos al comienzo')
        $('#frm-colector-tabla').submit();

      });

</script>


<div class="row">
    <div class="col-md-3">

    </div>
    <div class="col-md-6">
    <center>
    <br>
    <h2 style="font-family: 'Raleway', sans-serif; color: #aa913f;" >SISTEMA DE BIODIVERSIDAD </h2>
    <h2 style="font-family: 'Baloo', cursive;color: #aa913f;" > EL SALVADOR</h2>
    <br>
    <img src="imagen/hoja.png" alt="SIBES" class="img-responsive" width="25%" >


    </div>
    <div class="col-md-3">

    </div>
</div>



  @foreach( $usuario as $xr )


  <form id="frm-agregar-esp" method="get" action="agregar_especie" >
    <input type="hidden" name="id_usuario" value="{{ $xr->idUsuario }}" >
  </form>

  <form id="frm-consultar-esp" method="get" action="consultar_especie" >
    <input type="hidden" name="id_usuario" value="{{ $xr->idUsuario }}" >
  </form>

  @endforeach
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

</body>



</html>
