<!DOCTYPE doctype html>
<html lang="es">
<head>
        <meta charset="utf-8">
        <title>MARN | SIBES</title>
        <meta content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0" name="viewport">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link rel=stylesheet href="css/estilo_busqueda.css" type="text/css">
        <script language="JavaScript">
          function nobackbutton(){
           window.location.hash="no-back-button";
           window.location.hash="Again-No-back-button" //chrome
           window.onhashchange=function(){window.location.hash="no-back-button";}
        }
        </script>
</head>
<body onload="nobackbutton();">
    <header>
      @include('parciales.nav')
    </header>

<div class="contanier">

<br><br><br><br>

<center>
 <form class="form-horizontal"   style="width: 500px;" action="auth_usuario" method="get" >
  <div class="form-group">
    <label for="nombre_usr" class="col-sm-2 control-label"  >Usuario</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="nombre_usr" placeholder="nombre usuario">
    </div>
  </div>

  <div class="form-group">
    <label for="ntento_usr" class="col-sm-2 control-label"  >Contraseña</label>
    <div class="col-sm-10">
      <input type="password" class="form-control" name="intento_usr" placeholder="contraseña">
    </div>
    <br>
    <br>
    @if( count($msg)== 1 )
      <label style="color: #ff3700 ;" > <strong>  {{$msg}}  </strong> </label>
    @endif
  </div>


  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-success btn-guardar btn-md"  style="width: 200px;background-color: : orange;" >Ingresar </button>

    </div>
  </div>

</form>


</center>

</div>
<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>

<script type="text/javascript">

  $(document).ready(function(){

    $('input:text').val('');


  });

</script>
</body>
</html>
