<nav class="navbar navbar-inverse sidebar" role="navigation" style="background-color: #aa913f;" >
    <div class="container-fluid">

    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-sidebar-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>

    <div class="collapse navbar-collapse" id="bs-sidebar-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a  style="font-family: 'Raleway', sans-serif; color: #fff;" href="SistemadeBiodiversidadsv" > SIBES <span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-home"></span></a></li>

        <li class="dropdown">
          <a class="dropdown-toggle" style="color: white;" data-toggle="dropdown"><i class="glyphicon glyphicon-map-marker"></i> <i class="fi-crown"></i> Departamentos  <span class="caret"></span><span style="font-size:16px;" class="pull-right hidden-xs showopacity white"></span></a>
          <ul class="dropdown-menu forAnimate" role="menu">

            <li id="id_ahu" ><a>Ahuachapan ({{ $d_ahua }}) </a></li>
            <li id="id_sta" ><a>Santa Ana ({{ $d_sant }}) </a></li>
            <li id="id_son" ><a>Sonsonate ({{ $d_sons }}) </a></li>
            <li id="id_cha" ><a>Chalatenango ({{ $d_chal }}) </a></li>
            <li id="id_lli" ><a>La Libertad ({{ $d_lali }}) </a></li>
            <li id="id_ssl" ><a>San Salvador ({{ $d_ssal}})  </a></li>
            <li id="id_cus" ><a>Cuscatlan ({{ $d_cusc }}) </a></li>
            <li id="id_cab" ><a>Cabañas ({{ $d_caba }}) </a></li>
            <li id="id_lpz" ><a>La Paz ({{ $d_lapa }}) </a></li>
            <li id="id_svc" ><a>San Vicente ({{ $d_sanv }}) </a></li>
            <li id="id_usl" ><a>Usulutan ({{ $d_usul }}) </a></li>
            <li id="id_smg" ><a>San Miguel ({{ $d_sanm }}) </a></li>
            <li id="id_mor" ><a>Morazan ({{ $d_mora }}) </a></li>
            <li id="id_uni" ><a>La Union ({{ $d_laun }}) </a></li>
          </ul>
        </li>

        <li class="dropdown">
          <a class="dropdown-toggle" style="color: white;" data-toggle="dropdown"><i class="glyphicon glyphicon-grain"></i> Reino  <span class="caret " ></span><span style="font-size:16px;" class="pull-right hidden-xs showopacity white"></span></a>
          <ul class="dropdown-menu forAnimate" role="menu">
                <li id="reino_Ani" ><a>Animalia ({{ $r_ani }})  </a></li>
                <li id="reino_Bac" ><a>Bacteria ({{ $r_bac }})  </a></li>
                <li id="reino_Chr" ><a>Chromista ({{ $r_chro }}) </a></li>
                <li id="reino_Fun" ><a>Fungi ({{ $r_fun }})  </a></li>
                <li id="reino_Pla" ><a>Plantae ({{ $r_pla }})  </a></li>
                <li id="reino_Pro" ><a>Protozoa ({{ $r_pro }})  </a></li>
          </ul>
        </li>

        <li class="dropdown">
          <a class="dropdown-toggle" style="color: white;" data-toggle="dropdown"><i class="glyphicon glyphicon-search"></i>  Consulta  <span class="caret" ></span><span style="font-size:16px;" class="pull-right hidden-xs showopacity white"></span></a>
          <ul class="dropdown-menu forAnimate" role="menu">
                <li id="Busc_reg" ><a href="/Consulta_General" >Busqueda</a></li>
                <li id="Busc_ava" ><a href="/Busqueda_Avanzada" >Consulta Avanzada</a></li>
          </ul>
        </li>


        <li ><a><center> <label class="btn btn-success" id="depto_tax"  >  Descargar <span class="glyphicon glyphicon-save" aria-hidden="true"  ></span> </label> </center> </a></li>
       <!-- <li ><a></a></li>-->
      </ul>
    </div>

    </div>
    <div class="cuerpo" ></div>
    </nav>
