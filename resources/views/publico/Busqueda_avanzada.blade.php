<!DOCTYPE html>
<html>
<head>

  <title> MARN | SIBES </title>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel=stylesheet href="css/estilo_menu.css" type="text/css">

<link rel=stylesheet href="css/estilo_busqueda.css" type="text/css">

<!--SELECT-->
<link rel="stylesheet" href="http://css.cdn.tl/normalize.css" />
<link href="css/select2.css" rel="stylesheet"/>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<link rel="shortcut icon" type="image/ico" href="/imagen/favicon.ico" />
<link rel="stylesheet" type="text/css" href="css/side_bar_nav.css">
<link href="https://fonts.googleapis.com/css?family=Advent+Pro|Baloo|Raleway|Roboto|Ubuntu|Play" " rel="stylesheet">
<script src="sweetalert/dist/sweetalert.min.js"></script>
<link rel="stylesheet" type="text/css" href="sweetalert/dist/sweetalert.css">


<script src="js/zelect.js"></script>
<!--SELECT -->


<!-- menu -->
<style type="text/css">

    @media screen and (min-width: 400px) {
    body {

    }
    .panel
    {
      width:60%;

    }


}

@media screen and (min-width: 1000px) {
    body {
        height: 100%;
    }

    .cuerpo{
      height:250px;
    }

}



</style>


<!--MOVIEMIENTO DE LOS SELECT -->

<script type="text/javascript">

function alpha1(){

$("#cargador").hide();
//$("#reino_id").select2("open");
//setTimeout ("$('#reino_id').select2('open');", 2000);
//document.getElementById('reino_id').focus();


}

function delta(){

setTimeout ("$('#division_id').select2();", 3000);
        }
function prueba2(){
setTimeout ("$('#clase_id').select2();", 3000);
        }
 function prueba3(){
setTimeout ("$('#orden_id').select2();", 3000);
       }
 function prueba4(){
setTimeout ("$('#familia_id').select2();", 3000);
    }
 function prueba5(){
setTimeout ("$('#genero_id').select2();", 3000);
 }
 function prueba6(){
setTimeout ("$('#especie_id').select2();", 3000);
}
function prueba7(){
setTimeout ("$('#subespecie_id').select2();", 3000);
 }
 function prueba8(){
setTimeout ("$('#btn_Bug').select2();", 3000);
  }
 </script>
<!--MOVIEMIENTO DE LOS SELECT -->



</head>
<body onload="alpha1();">


    <header>
         @include('parciales.nav')
    </header>


<div id="cargador" style="background-color: white;
    width: 100%;
    bottom: 0px;
    position: fixed;
    z-index: 10000;
    height: 100%;">
</div>

  <div class="row">

    <div class="col-md-2" >

    <nav class="navbar navbar-inverse sidebar " role="navigation" style="background-color: #aa913f;"  >
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

            <li id="id_ahu" ><a>Ahuachapan  ({{ $d_ahua }}) </a></li>
            <li id="id_sta" ><a>Santa Ana ({{ $d_sant }}) </a></li>
            <li id="id_son" ><a>Sonsonate ({{ $d_sons }}) </a></li>
            <li id="id_cha" ><a>Chalatenango ({{ $d_chal }}) </a></li>
            <li id="id_lli" ><a>La Libertad ({{ $d_lali }}) </a></li>
            <li id="id_ssl" ><a>San Salvador  ({{ $d_ssal}}) </a></li>
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
                <li id="reino_Ani" ><a>Animalia ({{ $r_ani }}) </a></li>
                <li id="reino_Bac" ><a>Bacteria ({{ $r_bac }}) </a></li>
                <li id="reino_Chr" ><a>Chromista ({{ $r_chro }}) </a></li>
                <li id="reino_Fun" ><a>Fungi ({{ $r_fun }}) </a></li>
                <li id="reino_Pla" ><a>Plantae ({{ $r_pla }}) </a></li>
                <li id="reino_Pro" ><a>Protozoa ({{ $r_pro }}) </a></li>
          </ul>
        </li>

        <li class="dropdown">
          <a class="dropdown-toggle" style="color: white;" data-toggle="dropdown"><i class="glyphicon glyphicon-search"></i>  Consulta  <span class="caret" ></span><span style="font-size:16px;" class="pull-right hidden-xs showopacity white"></span></a>
          <ul class="dropdown-menu forAnimate" role="menu">
                <li id="Busc_reg" ><a href="/Consulta_General" >Busqueda</a></li>
                <li id="Busc_ava" ><a href="/Busqueda_Avanzada" >Consulta Avanzada</a></li>
          </ul>
        </li>




        <li ><a><button  type="submit" class="btn btn-success btn-guardar btn-md" id="btn_Excel_" style="width: 150px;" >Descargar <span class="glyphicon glyphicon-save" aria-hidden="true"  ></span></button></a></li>

      </ul>
    </div>

    </div>
    <div class="cuerpo" ></div>
    </nav>

  </div>




  <div class="col-md-6" >


  <div class="container">

  <center>
  <br>
    <h3 style="font-family: 'Ubuntu',  sans-serif;" ><b>Catálogo de Especies SIBES</b></h3>
    <br>

  <div class="panel" >
    <form action="/mostrar" method="GET" name="busqueda" id="consulta-esp-frm" >
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

    </div>





<!---->
    <div class="col-xs-12 hidden-lg" >
      <input type="hidden" name="estadoMarn" class="estadoMarn" >
    </div>
    <div class="row">

      <div style="padding-top: 5px;padding-bottom: 5px;" >
        <input type="radio" name="gender" value="male"checked class="taxon" > Taxonomia <input type="radio" name="gender" value="female" class="aviston" > Avistamiento  
      </div>


      <center>

        <button  type="submit" class="btn btn-success btn-guardar btn-md" id="btn_Buscar" style="width: 200px;" >Buscar <span class="glyphicon glyphicon-search" aria-hidden="true"  ></span></button>

        <!--
        <button  type="submit" class="btn btn-success btn-guardar btn-md" id="btn_Excel_" style="width: 200px;" >Descargar Excel <span class="glyphicon glyphicon-save" aria-hidden="true"  ></span></button>
        -->
      </center>
    </div>
    <br>


    </form>

  </div>


  </center>

<center>

<input type="hidden" id="taxo" name="taxo"  >
<input type="hidden" id="avisto" name="avisto"  >      

<form method="get" id="frm-excel-especie" action="Excel_especies_sub" >

  <input type="hidden" id="id_sub" name="id_sub"  >
  <input type="hidden" id="id_esp" name="id_esp"  >
  <input type="hidden" id="id_gen" name="id_gen"  >
  <input type="hidden" id="id_fam" name="id_fam"  >
  <input type="hidden" id="id_ord" name="id_ord"  >
  <input type="hidden" id="id_cla" name="id_cla"  >
  <input type="hidden" id="id_div" name="id_div"  >
  <input type="hidden" id="id_rei" name="id_rei"  >

</form>
<form method="get" id="frm-excel-avistos" action="Excel_avistamientos" >
   
  <input type="hidden" id="id_sub_v" name="id_sub"  >
  <input type="hidden" id="id_esp_v" name="id_esp"  >
  <input type="hidden" id="id_gen_v" name="id_gen"  >
  <input type="hidden" id="id_fam_v" name="id_fam"  >
  <input type="hidden" id="id_ord_v" name="id_ord"  >
  <input type="hidden" id="id_cla_v" name="id_cla"  >
  <input type="hidden" id="id_div_v" name="id_div"  >
  <input type="hidden" id="id_rei_v" name="id_rei"  >
  
</form>

  <div class="" >
    <!--
    <button  type="submit" class="btn btn-success btn-guardar btn-md" id="btn_Excel" style="width: 200px;float: left;display: none;" >Descargar Excel <span class="glyphicon glyphicon-save" aria-hidden="true"  ></span></button>
    -->
  </div>


@include('publico.menu.menu_forms')


</center>

</div>
<br><br>

  <div id="tabla_res" style="font-size:small;"   >

  </div>
</div>
</div>

<div class="container" >




</div>

@include('scripts.buscar_pub')

<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
@include('publico.menu.script_menu')

<script type="text/javascript">

      $("#reino_id").select2({
            placeholder: "Reino",
            allowClear: false
        });

      $("#division_id").select2({
            placeholder: "Division",
            allowClear: false
        });

      $("#clase_id").select2({
            placeholder: "Clase",
            allowClear: false
        });


      $("#orden_id").select2({
            placeholder: "Orden",
            allowClear: false
        });

         $("#familia_id").select2({
            placeholder: "Familia",
            allowClear: false
        });

           $("#genero_id").select2({
            placeholder: "Genero",
            allowClear: false
        });

              $("#especie_id").select2({
            placeholder: "Especie",
            allowClear: false
        });

               $("#subespecie_id").select2({
            placeholder: "Subespecie",
            allowClear: false
        });





</script>


</body>
</html>
