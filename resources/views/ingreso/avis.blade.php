<!DOCTYPE html>
<html>
<head>
    <title>MARN | SIBES</title>
     <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link href="/css/fileinput.css" media="all" rel="stylesheet" type="text/css"/>
        <link rel=stylesheet href="css/estilo_mostrar.css" type="text/css">
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="/js/plugins/sortable.js" type="text/javascript"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" type="text/javascript"></script>
        <link rel="shortcut icon" type="image/ico" href="/imagen/favicon.ico" />
        <script src="//cdn.jsdelivr.net/webshim/1.14.5/polyfiller.js"></script>
        <script src="sweetalert/dist/sweetalert.min.js"></script>
        <link rel="stylesheet" type="text/css" href="sweetalert/dist/sweetalert.css">

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

    })

</script>




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


<nav>
    <ul class="nav nav-tabs">

        <li role="presentation" id="Info-AVIS" ><a>Especie</a></li>

        <li role="presentation" class="active"  ><a>Avistamientos</a></li>

        <li role="presentation" id="mapa-AVIS" ><a>Mapa</a></li>

    </ul>
</nav>
        <input type="hidden" name="id_esp" value="{{ $esp->idEspecie }}" >
        <div  class="row" style="padding-right: 30px;padding-left: 30px;" ><H3>  <label style="padding-left: 20px;" >Avistamiento de: </label> {{ $esp->nombreEspecie }} <label class="btn btn-default" id="agr_avista" style="float: right;" >  Agregar <span class="glyphicon glyphicon-plus" aria-hidden="true"  ></span> </label> </H3> </div>
        
        
        <br><br>


    <div class="row" style="padding-left: 40px;" >

        <div class="col-xs-12 col-lg-2">
            <label>Reino </label><br>
            <label class="show1">{{ $esp->nombreReino }} </label>
        </div>
        <div class="col-xs-12 col-lg-2 ">
            <label > División </label><br>
            <label class="show1"   >{{ $esp->nombreDivision }}</label>
        </div>
        <div class="col-xs-12 col-lg-2 ">
            <label> Clase</label><br>
            <label  class="show1" " >{{ $esp->nombreClase }} </label>
        </div>
        <div class="col-xs-12 col-lg-2">
            <label> Orden</label><br>
            <label class="show1"  >{{ $esp->nombreOrden }}   </label>
        </div>
        <div class="col-xs-12 col-lg-2">
            <label> Familia</label><br>
            <label class="show1" "  >{{ $esp->nombreFamilia }}</label>
        </div>
        <div class="col-xs-12 col-lg-2">
            <label> Género</label><br>
            <label  class="show1" >{{ $esp->nombreGenero }} </label>
        </div>

    </div>



    @endforeach
    <hr>


    <div class="container-fluid">



        <table class="table table-striped table-bordered" width="100%" cellspacing="0" style="background-color: white;">
        <thead>
            <tr>
                <th>Id</th>
                <th>Fecha Ingreso</th>
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

@include('modales.avi_mod')

<!--  Modal para agregar avistamiento  -->

<div class="modal fade " id="Avista_Modal"   role="dialog">

      <div class="modal-dialog modal-lg ">

        <!-- Modal content-->
        <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close close-avis" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">  Ingrese la informacion del avistamiento  </h4>
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
                                    Fecha de Ingreso:
                        </label>
                        <input class="form-control" id="id_fecha_ingr" readonly="" type="date" name="fecha_ing" value="{{ date('Y-m-d') }}" >

                    </div>

                    <div class="col-xs-12 col-md-4">
                        <label for="id_fecha_avis">
                                    Fecha de Avistamiento:
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
                                    Hora de Avistamiento:
                        </label>
                        <input class="form-control" id="fecha_avis" type="time" name="hora_av" >
                    </div>


                </div>
                        <div class="form-group row ">
                            <div class="col-xs-12 col-md-4">
                                <label>
                                    Colector:
                                </label>
                                <select class="form-control" id="id_colector" name="col_avis" >
                                    <option disabled="true" selected="true" value="0">
                                        --- Colector ---
                                    </option>
                                </select>
                                <!--
                                <div class="alert alert-danger" style="display: none;" id="_col_avis" > {{ $errors->first('col_avis') }} </div>
                                -->
                        <center>
                            <div class="" style="display: none;color:#ff3700;font-size:small;" id="_col_avis" ><span class="help-block" ><strong style="color:  #f44242 ;float: right;" >{{ $errors->  first('col_avis') }}</strong></span>  </div>
                        </center>

                            </div>
                            <div class="col-xs-12 col-md-4">
                                <label>
                                    Fuente de Informacion:
                                </label>
                                <input class="form-control" id="idFInfo" name="fuente_avis" >

                            </div>
                            <div class="col-xs-12 col-md-4">
                                <label>
                                    Ejemplar Depositado:
                                </label>
                                <input class="form-control" id="idFInfo" name="ejem_avis" >

                            </div>
                        </div>
                        <div "="" class="form-group row">
                            <div class="col-xs-12 col-md-12">
                                <h4>
                                    Lugar de Recolecta
                                </h4>
                            </div>
                        </div>
                        <div  class="form-group row ">
                          <div class="col-xs-12 col-md-3 ">
                                <label>
                                    Zona:
                                </label>
                                <select class="form-control" id="id_zona" name="zona_avis" >
                                    <option disabled="true" selected="true" value="0">
                                        ---Zona---
                                    </option>
                                </select>

                            <!--
                                <div class="alert alert-danger" style="display: none;" id="_zona_avis" > {{ $errors->  first('zona_avis') }} </div>
                            -->
                        <center>
                            <div class="" style="display: none;color:#ff3700;font-size:small;" id="_zona_avis" ><span class="help-block" ><strong style="color:  #f44242 ;float: right;" >{{ $errors->  first('zona_avis') }}</strong></span>  </div>
                        </center>


                            </div>
                            <div class="col-xs-12 col-md-3">
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

                            <div class="col-xs-12 col-md-3">
                                <label>
                                    Municipio:
                                </label>
                                <select class="form-control" id="id_municipio" name="mun_avis" >
                                    <option disabled="true" selected="true" value="0">
                                        ---Municipio---
                                    </option>
                                </select>
                                <!--
                                <div class="alert alert-danger" style="display: none;" id="_mun_avis" > {{ $errors->first('mun_avis') }} </div>-->
                        <center>
                            <div class="" style="display: none;color:#ff3700;font-size:small;" id="_mun_avis" ><span class="help-block" ><strong style="color:  #f44242 ;float: right;" >{{ $errors->  first('mun_avis') }}</strong></span>  </div>
                        </center>

                            </div>
                            <div class="col-xs-12 col-md-3">
                                <label>
                                    Canton:
                                </label>
                                <select class="form-control" id="id_canton" name="canton_avis" >
                                    <option disabled="true" selected="true" value="0">
                                        ---Canton---
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
                                    Coordenadas Geografica
                                </h4>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-xs-12 col-md-4">
                                <label>
                                    Latitud:
                                </label>
                                <input class="form-control" id="lati_avis"  name="lati_avis">
                                <!--
                                 <div class="alert alert-danger" style="display: none;" id="_lati_avis" > {{ $errors->first('lati_avis') }} </div>
                                -->
                        <center>
                            <div class="" style="display: none;color:#ff3700;font-size:small;" id="_lati_avis" ><span class="help-block" ><strong style="color:  #f44242 ;float: right;" >{{ $errors->  first('lati_avis') }}</strong></span>  </div>
                        </center>
                        



                        </div>

                        <div class="col-xs-12 col-md-4">
                                <label>
                                    Longitud:
                                </label>
                                <input class="form-control" id="long_avis"  name="long_avis">
                                <!--
                                 <div class="alert alert-danger" style="display: none;" id="_long_avis" > {{ $errors->first('long_avis') }} </div>
                                -->
                        <center>
                            <div class="" style="display: none;color:#ff3700;font-size:small;" id="_long_avis" ><span class="help-block" ><strong style="color:  #f44242 ;float: right;" >{{ $errors->  first('long_avis') }}</strong></span>  </div>
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
                                <label>
                                    Fotografia de Avistamiento:
                                </label>
                                <br>
                                    <input aria-describedby="fileHelp" class="form-control-file" id="idFoAvis" type="file" name="foto_graf" >

                                <!--
                                <div class="alert alert-danger" style="display: none;" id="_foto-graf" > {{ $errors->first('foto-graf') }} </div>-->
                        <center>
                            <div class="" style="display: none;color:#ff3700;font-size:small;" id="_foto-graf" ><span class="help-block" ><strong style="color:  #f44242 ;float: right;" ><label id="_foto-grafy" ></label>{{ $errors->first('foto-graf') }}</strong></span>  </div>
                        </center>

                            </div>
                    
                    </div>
                       <div class="form-group row">

                        <div class="col-xs-12 col-md-6">
                                <label>
                                    Publicacion en PDF:
                                </label>
                                <br>

                    <div class="row">
                        <input class="form-control frm-input" id="id_PubPDF"  name="PDF_file" type="text" >

                        <button class="btn btn-default" type="submit" id="guardar_link" style="width: 100%;">Agregar enlace  <span class="glyphicon glyphicon-plus" aria-hidden="true"  ></span> </button>
                        <div id="link_esp" >                          
                            <textarea class="form-control" id="pub_PDF" rows="3" name="pub_PDF" disabled="false"></textarea>
                        </div>
                        <div id="escondido" style="display: none;" >
                            <textarea id="publish" name="publish"></textarea>
                        </div>

                        <br>
                    <!--<div class="alert alert-danger" style="display: none;" id="_PDF-file" > {{ $errors->first('PDF-file') }} </div>-->


                    </div>

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
                                    Clase de Tierra:
                                </label>
                                <select class="form-control" id="id_tierra"  name="tierra_avis">
                                    <option disabled="true" selected="true" value="0">
                                        --- Clase de Tierra ---
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
                                    Descripcion del Clima:
                                </label>
                                <textarea class="form-control" id="ClimaTextarea" rows="3"  name="clima_avis"></textarea>

                        <center>
                            <div class="" style="display: none;color:#ff3700;font-size:small;" id="_clima_avis" ><span class="help-block" ><strong style="color:  #f44242 ;float: right;" >{{ $errors->  first('clima_avis') }}</strong></span>  </div>
                        </center>




                            </div>
                            <div class="col-xs-12 col-md-6">
                                <label for="EcoTextarea">
                                    Descripcion del Ecosistema:
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
                                    Descripcion de  Fisiografía:
                                </label>
                                <textarea class="form-control" id="FisioTextarea" rows="3"  name="fisio_Avis"></textarea>

                        <center>
                            <div class="" style="display: none;color:#ff3700;font-size:small;" id="_fisio_Avis" ><span class="help-block" ><strong style="color:  #f44242 ;float: right;" >{{ $errors->  first('fisio_Avis') }}</strong></span>  </div>
                        </center>



                            </div>
                            <div class="col-xs-12 col-md-6">
                                <label for="GeoTextarea">
                                    Descripcion del Geología:
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
                                    Descripcion de Hidrografía :
                                </label>
                                <textarea class="form-control" id="HidroTextarea" rows="3"  name="hidro_avis"></textarea>

                        <center>
                            <div class="" style="display: none;color:#ff3700;font-size:small;" id="_hidro_avis" ><span class="help-block" ><strong style="color:  #f44242 ;float: right;" >{{ $errors->  first('hidro_avis') }}</strong></span>  </div>
                        </center>


                            </div>
                            <div class="col-xs-12 col-md-6">
                                <label for="usoTextarea">
                                    Usos de la Especies
                                </label>
                                <textarea class="form-control" id="usoTextarea" rows="3"  name="usos_avis"></textarea>

                        <center>
                            <div class="" style="display: none;color:#ff3700;font-size:small;" id="_usos_avis" ><span class="help-block" ><strong style="color:  #f44242 ;float: right;" >{{ $errors->  first('usos_avis') }}</strong></span>  </div>
                        </center>

                            </div>
                        </div>



                     





                        <center>
                            <button class="btn btn-success" type="submit" id="guardar_avista" >Guardar</button>
                        </center>
                    </form>
            </div>
  
        </div>

      </div>







</body>

@include('scripts.jquery_avis')

</html>
