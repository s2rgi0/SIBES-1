<link rel=stylesheet href="css/menu.css" type="text/css">

<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button  style="background-color: white;" type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#"></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li id="id_inicio_sibes" ><a >Inicio <span class="sr-only">(current)</span></a></li>
        <li class="dropdown">
          <a href="" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Especie <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li id="id_agregar_esp" ><a >Agregar</a></li>
            <li id="id_consultar_esp" ><a >Consultar</a></li>
          </ul>
        </li>
        <li ><a href="/SistemadeBiodiversidadsv" target="_blank">Publico</a></li>
         <li><a href="pdf/Quinto informe Nacional para el CDB.pdf" target="_blank">Ayuda</a></li>
       </ul>

       <ul class="nav navbar-nav navbar-right">
        <li ><a href="{{ action('SibesController@login_usr') }}">Salir</a></li>
       </ul>
    </div><!-- /.navbar-collapse -->
    </div><!-- /.navbar-collapse -->


  </div><!-- /.container-fluid -->
</nav>
