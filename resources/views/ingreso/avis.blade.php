<!DOCTYPE html>
<html>
<head>
    <title>MARN | SIBES</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel=stylesheet href="css/estilo_mostrar.css" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <link href="/css/fileinput.css" media="all" rel="stylesheet" type="text/css"/>
    <link rel="shortcut icon" type="image/ico" href="/imagen/favicon.ico" />
    <link rel="stylesheet" type="text/css" href="sweetalert/dist/sweetalert.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="/js/plugins/sortable.js" type="text/javascript"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="//cdn.jsdelivr.net/webshim/1.14.5/polyfiller.js"></script>
    <script src="sweetalert/dist/sweetalert.min.js"></script>


<script>
    webshims.setOptions('forms-ext', {types: 'date'});
    webshims.polyfill('forms forms-ext');
</script>
<script type="text/javascript">

    $(document).ready(function(){

        $('#Info-AVIS').click(function(){

            $('#AVIS-frm').submit();

        })

        $('#mapa-AVIS').click(function(){

            $('#MAPA-frm').submit();

        })

        $('#id_colector').click(function(){

        //alert('iremos al comienzo')
        $('#frm-colector').submit();

      });

    })

</script>
<style type="text/css">
    .navbar{
            box-shadow: 0 7px 10px 0 rgba(0, 0, 0, 0.2);
        }
</style>




</head>
<body>

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

    @foreach( $especie as $esp )

    <form method="get" action="informacion_avis" id="AVIS-frm" >
        <input type="hidden" name="id_especie" value="{{ $esp->idEspecie }}" >
        <input type="hidden" name="id_usuario" value="{{ $usuario[0]->idUsuario }}" >
    </form>
    <form method="get" action="mapa_show" id="MAPA-frm" >
        <input type="hidden" name="id_especie" value="{{ $esp->idEspecie }}" >
        <input type="hidden" name="id_usuario" value="{{ $usuario[0]->idUsuario }}" >
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
    <form method="get" action="Avistamiento" id="frm-avista-refresh" >
        <input type="hidden" id="id_especie" name="id_especie" value="{{ $esp->idEspecie }}">
        <input type="hidden" id="id_usuario" name="id_usuario" value="{{ $usuario[0]->idUsuario }}">
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

        <li role="presentation" class="active"  ><a>Avistamientos</a></li>

        <li role="presentation" id="mapa-AVIS" ><a>Mapa</a></li>

    </ul>
</nav>
        <input type="hidden" name="id_esp" value="{{ $esp->idEspecie }}" >
        <div  class="row" style="padding-right: 30px;padding-left: 30px;" ><H4>  <label style="padding-left: 20px;" >Avistamientos de la especie: </label> {{ $esp->nombreEspecie }} <label class="btn btn-default" id="agr_avista" style="float: right;" >  Agregar avistamiento <span class="glyphicon glyphicon-plus" aria-hidden="true"  ></span> </label> </H4> </div>

        <hr>

<div class="row" >
<div class="col-lg-2" >

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
        <center>

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
       </center>





</div>
<div class="col-lg-10" >

    <div class="container-fluid">

        <table class="table table-striped table-bordered" width="100%" cellspacing="0" style="background-color: white;">
        <thead>
            <tr>
                <th>Id</th>
                <th>Fecha ingreso</th>
                <th>Departamento</th>
                <th>Colector</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody class="row_avista">

            @foreach( $avista as $v_r )
            <tr>
                <td> {{ $v_r->idAvistamiento }} </td>
                <td> {{ $v_r->fechaIngresodeInformacionBD }}   </td>
                <td> {{ $v_r->nombreDepartamento }} </td>
                <td> {{ $v_r->nombreColector }} </td>
                <td class="grid_avista" id="grid_avista" >
                    <button class="btn btn-primary btn-Ver " value="{{ $v_r->idAvistamiento }}" ><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></button>
                    <button class="btn btn-success btn-Editar " value="{{ $v_r->idAvistamiento }}" ><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></button>

                </td>

            </tr>
            @endforeach

        </tbody>
    </table>

    </div>


</div>
</div>






    @endforeach





@include('modales.avi_mod')

<!-- ESTA ES LA ventana emergente O Modal para agregar  LOS avistamientoS  -->

<div class="modal fade " id="Avista_Modal"   role="dialog">

      <div class="modal-dialog modal-lg ">

        <!-- Modal content-->
        <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close close-avis" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">  Ingrese la información del avistamiento  </h4>
        </div>
        <form method="get" action="SAVE_avista" id="frm-avista" enctype="multipart/form-data" >
            <input type="hidden" name="_token" value="{{ Session::token() }}">

        @foreach( $especie as $esp )

            <input type="hidden" name="id_esp" id="id_esp" class="form-control" value="{{ $esp->idEspecie }}" >
            <input type="hidden" name="nom_esp" value="{{ $esp->nombreEspecie }}" >

        @endforeach
            <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
            <div class="modal-body">

            <div class="container-fluid">
                <div class="form-group row">

                    <div class="col-xs-12 col-md-4">
                        <label for="id_fecha_ing">
                                    Fecha de ingreso:
                        </label>
                        <input class="form-control" id="id_fecha_ingr" readonly="" type="date" name="fecha_ing" value="{{ date('Y-m-d') }}" >

                    </div>

                    <div class="col-xs-12 col-md-4">
                        <label for="id_fecha_avis">
                                    Fecha de avistamiento:
                        </label>
                        <input class="form-control" id="fecha_avis" type="date" max="{{ date('Y-m-d') }}" name="fecha_av" >
                        <!--
                        <div class="alert alert-danger" style="display: none;" id="_fecha_av" > {{ $errors->first('fecha_av') }} </div>
                        -->
                        <center>
                            <div class="" style="display: none;color:#ff3700;font-size:small;" id="_fecha_av" ><span class="help-block" ><strong style="color:  #f44242 ;float: right;" >{{ $errors->  first('fecha_av') }}</strong></span>  </div>
                        </center>

                    </div>
                    <div class="col-xs-12 col-md-4">
                        <label for="id_fecha_avis">
                                    Hora de avistamiento:
                        </label>
                        <input class="form-control" id="fecha_avis" type="time" name="hora_av" >
                    </div>


                </div>
                        <div class="form-group row ">
                        <div class="col-xs-12 col-md-4">
                                <label>
                                    Colector:
                                </label>
                                <select class="form-control" id="id_colectore" name="col_avis" >
                                    <option disabled="true" selected="true" value="0">
                                        --- Colector ---
                                    </option>
                                </select>

                        <center>
                            <div class="" style="display: none;color:#ff3700;font-size:small;" id="_col_avis" ><span class="help-block" ><strong style="color:  #f44242 ;float: right;" >{{ $errors->  first('col_avis') }}</strong></span>  </div>
                        </center>
                        </div>

                        <div class="col-xs-12 col-md-4">
                            <label>
                                Fuente de información:
                            </label>
                                <!--
                                <input class="form-control" id="idFInfo" name="fuente_avis" >
                                -->
                                <select class="form-control" id="idFInfo" name="fuente_avis" >
                                    <option disabled="true" selected="true" value="0">
                                        --- Fuente de Información ---
                                    </option>
                                </select>

                        <center>
                            <div class="" style="display: none;color:#ff3700;font-size:small;" id="_fuente_avis" ><span class="help-block" ><strong style="color:  #f44242 ;float: right;" >{{ $errors->  first('fuente_avis') }}</strong></span>  </div>
                        </center>

                        </div>
                            <div class="col-xs-12 col-md-4">
                                <label>
                                    Ejemplar depositado:
                                </label>
                                <input class="form-control" id="idFInfo" name="ejem_avis" >

                            </div>
                        </div>
                        <div "="" class="form-group row">
                            <div class="col-xs-12 col-md-12">
                                <h4>
                                    Lugar de recolecta
                                </h4>
                            </div>
                        </div>
                        <div  class="form-group row ">

                            <div class="col-xs-12 col-md-4">
                                <label>
                                    Departamento:
                                </label>
                                <select class="form-control" id="id_departamento"  name="depar_avis">
                                    <option disabled="true" selected="true" value="0">
                                        ---Departamento---
                                    </option>
                                </select>
                                <!--
                                <div class="alert alert-danger" style="display: none;" id="_depar_avis" > {{ $errors->  first('depar_avis') }} </div>-->
                        <center>
                            <div class="" style="display: none;color:#ff3700;font-size:small;" id="_depar_avis" ><span class="help-block" ><strong style="color:  #f44242 ;float: right;" >{{ $errors->  first('depar_avis') }}</strong></span>  </div>
                        </center>
                            </div>

                        <div class="col-xs-12 col-md-4">
                                <label>
                                    Municipio:
                                </label>
                                <select class="form-control" id="id_municipio" name="mun_avis" >
                                    <option disabled="true" selected="true" value="0">
                                        ---Municipio---
                                    </option>
                                </select>

                        <center>
                            <div class="" style="display: none;color:#ff3700;font-size:small;" id="_mun_avis" ><span class="help-block" ><strong style="color:  #f44242 ;float: right;" >{{ $errors->  first('mun_avis') }}</strong></span>  </div>
                        </center>
                        </div>
                    <div class="col-xs-12 col-md-4">
                        <label>
                            Cantón:
                        </label>
                        <select class="form-control" id="id_canton" name="canton_avis" >
                            <option disabled="true" selected="true" value="0">
                                ---Cantón---
                            </option>
                        </select>
                                <!--
                                <div class="alert alert-danger" style="display: none;" id="_canton_avis" > {{ $errors->first('canton_avis') }} </div>
                                -->
                    <center>
                            <div class="" style="display: none;color:#ff3700;font-size:small;" id="_canton_avis" ><span class="help-block" ><strong style="color:  #f44242 ;float: right;" >{{ $errors->  first('canton_avis') }}</strong></span>  </div>
                    </center>
                    </div>
                    </div>

                        <div class="form-group row">
                            <div class="col-xs-12 col-md-12">
                                <h4>
                                    Coordenadas geográfica
                                </h4>
                            </div>
                        </div>
                        <div class="form-group row">
                        <div class="col-xs-12 col-md-4">
                            <label>Latitud: </label><a style="color: #c2c2a3;" > N 13° 40' 40.848''</a>

<div class="row" style="padding-left: 20px;border-radius: 4px;border: 1px solid  #bfbfbf ;padding: 7px;" >
<div style="padding-left: 20px;" >
 <label > N </label>
 <input id="lati_avis"  name="lati_avis" style="width: 50px;border-radius: 4px;border: 1px solid  #bfbfbf;height: 30px;" >
 <label>°</label>
 <input name="lati_min" style="width: 50px;border-radius: 4px;border: 1px solid  #bfbfbf;height: 30px;">
 <label> '</label>
 <input name="lati_sec" style="width: 60px;border-radius: 4px;border: 1px solid  #bfbfbf;height: 30px;">
 <label> "</label>
</div>

</div>

                                <!--
                                <input id="lati_avis"  name="lati_avis" style="width: 50px;" >
                                 <div class="alert alert-danger" style="display: none;" id="_lati_avis" > {{ $errors->first('lati_avis') }} </div>
                                -->
<center>
    <div class="" style="display: none;color:#ff3700;font-size:small;" id="_lati_avis" ><span class="help-block" ><strong style="color:  #f44242 ;float: right;" >{{ $errors->  first('lati_avis') }}</strong></span>
    </div>
</center>
<center>
    <div class="" style="display: none;color:#ff3700;font-size:small;" id="_lati_min" ><span class="help-block" ><strong style="color:  #f44242 ;float: right;" >{{ $errors->  first('lati_min') }}</strong></span>
    </div>
</center>
<center>
    <div class="" style="display: none;color:#ff3700;font-size:small;" id="_lati_sec" ><span class="help-block" ><strong style="color:  #f44242 ;float: right;" >{{ $errors->  first('lati_sec') }}</strong></span>
    </div>
</center>
</div>

<div class="col-xs-12 col-md-4">
    <label>Longitud: </label><a style="color: #c2c2a3;" > O 89° 6' 26.499'' </a>
<div class="row" style="padding-left: 20px;border-radius: 4px;border: 1px solid  #bfbfbf ;padding: 7px;" >
<div style="padding-left: 20px;" >

 <label > O </label>
 <input id="lati_avis"  name="long_avis" style="width: 50px;border-radius: 4px;border: 1px solid  #bfbfbf;height: 30px;" >
 <label>°</label>
 <input name="long_min" style="width: 50px;border-radius: 4px;border: 1px solid  #bfbfbf;height: 30px;">
 <label> '</label>
 <input name="long_sec" style="width: 60px;border-radius: 4px;border: 1px solid  #bfbfbf;height: 30px;">
 <label> "</label>
</div>

</div>
<!--
 <input class="form-control" id="long_avis"  name="long_avis" placeholder="O 89° 6' 26.499'' " >
                                 <div class="alert alert-danger" style="display: none;" id="_long_avis" > {{ $errors->first('long_avis') }} </div>
                                -->
    <center>
        <div class="" style="display: none;color:#ff3700;font-size:small;" id="_long_avis" ><span class="help-block" ><strong style="color:  #f44242 ;float: right;" >{{ $errors->  first('long_avis') }}</strong></span>
        </div>
     </center>
    <center>
        <div class="" style="display: none;color:#ff3700;font-size:small;" id="_long_min" ><span class="help-block" ><strong style="color:  #f44242 ;float: right;" >{{ $errors->  first('long_min') }}</strong></span>
        </div>
    </center>
    <center>
        <div class="" style="display: none;color:#ff3700;font-size:small;" id="_long_sec" ><span class="help-block" ><strong style="color:  #f44242 ;float: right;" >{{ $errors->  first('long_sec') }}</strong></span>
        </div>
    </center>

                        </div>

                        <div class="col-xs-12 col-md-4">
                                <label>
                                    Altura:
                                </label>
                                <input class="form-control" id="alt_avis"  name="alt_avis">
                        <center>
                            <div class="" style="display: none;color:#ff3700;font-size:small;" id="_alt_avis" ><span class="help-block" ><strong style="color:  #f44242 ;float: right;" >{{ $errors->first('alt_avis') }}</strong></span>  </div>
                        </center>
                        </div>
                        </div>


                    <div class="form-group row">
                        <div class="col-xs-12 col-md-6">
                            <label>Fotografía de avistamiento: </label><a style="color: #a3a375;" > jpg, gif, png, bmp</a>
                            <br>
                                <input aria-describedby="fileHelp" class="form-control-file" id="idFoAvis" type="file" name="foto_graf" ><br>
                        <center>
                            <div class="" style="display: none;color:#ff3700;font-size:small;" id="_foto_graf" ><span class="help-block" ><strong style="color:  #f44242 ;float: right;" >{{ $errors->  first('foto_graf') }}</strong></span></div>
                        </center>
                        </div>
                        <div class="col-xs-12 col-md-6" >
                            <label>
                                    Numero de especies observadas:
                            </label>
                             <input class="form-control" id="num_avis"  name="num_avis">
                        <center>
                            <div class="" style="display: none;color:#ff3700;font-size:small;" id="_num_avis" ><span class="help-block" ><strong style="color:  #f44242 ;float: right;" >{{ $errors->first('num_avis') }}</strong></span>  </div>
                        </center>

                        </div>
                    </div>

                        <div class="form-group row">
                            <div class="col-xs-12 col-md-6">
                                <label>
                                    Suelo:
                                </label>
                                <select class="form-control" id="id_suelo"  name="suelo_avis">
                                    <option disabled="true" selected="true" value="0">
                                        --- Suelo ---
                                    </option>
                                </select>

                            <!--  <div class="alert alert-danger" style="display: none;" id="_suelo_avis" > {{ $errors->first('suelo_avis') }} </div> -->
                        <center>
                            <div class="" style="display: none;color:#ff3700;font-size:small;" id="_suelo_avis" ><span class="help-block" ><strong style="color:  #f44242 ;float: right;" >{{ $errors->  first('suelo_avis') }}</strong></span>  </div>
                        </center>

                            </div>
                            <div class="col-xs-12 col-md-6">
                                <label>
                                    Clase de tierra:
                                </label>
                                <select class="form-control" id="id_tierra"  name="tierra_avis">
                                    <option disabled="true" selected="true" value="0">
                                        --- Clase de tierra ---
                                    </option>
                                </select>
                        <!--    <div class="alert alert-danger" style="display: none;" id="_tierra_avis" > {{ $errors->first('tierra_avis') }} </div>
                            </div>-->

                        <center>
                            <div class="" style="display: none;color:#ff3700;font-size:small;" id="_tierra_avis" ><span class="help-block" ><strong style="color:  #f44242 ;float: right;" >{{ $errors->  first('tierra_avis') }}</strong></span>  </div>
                        </center>
                        </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-xs-12 col-md-6">
                                <label for="ClimaTextarea">
                                    Descripción del clima:
                                </label>
                                <textarea class="form-control" id="ClimaTextarea" rows="3"  name="clima_avis"></textarea>

                        <center>
                            <div class="" style="display: none;color:#ff3700;font-size:small;" id="_clima_avis" ><span class="help-block" ><strong style="color:  #f44242 ;float: right;" >{{ $errors->  first('clima_avis') }}</strong></span>  </div>
                        </center>




                            </div>
                            <div class="col-xs-12 col-md-6">
                                <label for="EcoTextarea">
                                    Descripción del ecosistema:
                                </label>
                                <textarea class="form-control" id="EcoTextarea" rows="3"  name="eco_avis"></textarea>

                        <center>
                            <div class="" style="display: none;color:#ff3700;font-size:small;" id="_eco_avis" ><span class="help-block" ><strong style="color:  #f44242 ;float: right;" >{{ $errors->  first('eco_avis') }}</strong></span>  </div>
                        </center>



                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-xs-12 col-md-6">
                                <label for="FisioTextarea">
                                    Descripción de  fisiografía:
                                </label>
                                <textarea class="form-control" id="FisioTextarea" rows="3"  name="fisio_Avis"></textarea>

                        <center>
                            <div class="" style="display: none;color:#ff3700;font-size:small;" id="_fisio_Avis" ><span class="help-block" ><strong style="color:  #f44242 ;float: right;" >{{ $errors->  first('fisio_Avis') }}</strong></span>  </div>
                        </center>



                            </div>
                            <div class="col-xs-12 col-md-6">
                                <label for="GeoTextarea">
                                    Descripción del geología:
                                </label>
                                <textarea class="form-control" id="GeoTextarea" rows="3"  name="geo_avis"></textarea>

                        <center>
                            <div class="" style="display: none;color:#ff3700;font-size:small;" id="_geo_avis" ><span class="help-block" ><strong style="color:  #f44242 ;float: right;" >{{ $errors->  first('geo_avis') }}</strong></span>  </div>
                        </center>



                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-xs-12 col-md-6">
                                <label for="HidroTextarea">
                                    Descripción de hidrografía :
                                </label>
                                <textarea class="form-control" id="HidroTextarea" rows="3"  name="hidro_avis"></textarea>

                        <center>
                            <div class="" style="display: none;color:#ff3700;font-size:small;" id="_hidro_avis" ><span class="help-block" ><strong style="color:  #f44242 ;float: right;" >{{ $errors->  first('hidro_avis') }}</strong></span>  </div>
                        </center>


                            </div>
                            <div class="col-xs-12 col-md-6">
                                <label for="usoTextarea">
                                    Usos de la especies
                                </label>
                                <textarea class="form-control" id="usoTextarea" rows="3"  name="usos_avis"></textarea>

                        <center>
                            <div class="" style="display: none;color:#ff3700;font-size:small;" id="_usos_avis" ><span class="help-block" ><strong style="color:  #f44242 ;float: right;" >{{ $errors->  first('usos_avis') }}</strong></span>  </div>
                        </center>

                            </div>
                        </div>

                        <center>
                            <button class="btn btn-success" type="submit" id="guardar_avista" style="background-color: #b0a54f;border-color: #8e7200 ;width: 200px;">Guardar</button>
                        </center>
                    </form>
            </div>

        </div>

      </div>







</body>

@include('scripts.jquery_avis')

</html>
