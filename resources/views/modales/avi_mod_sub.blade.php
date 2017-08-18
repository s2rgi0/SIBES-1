<!-- Este MODAL o ventana emergente se ultiliza para modificar los 
Avistamientos de SUBESPECIE -->

<div class="modal fade " id="VER_Avista_Modal"   role="dialog">

      <div class="modal-dialog modal-lg ">

        <!-- Modal content-->
        <div class="modal-content">
        <div class="modal-header"  id="modal-h">
            <button type="button" class="close close-editar" data-dismiss="modal">&times;</button>
            <h4 class="modal-title"> Información del avistamiento  </h4>
        </div>

        <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
        <div class="modal-body" id="modal-body-ver">
        <input type="hidden" name="_token" value="{{ Session::token() }}">


            <label  id="label_especie" ></label>
            <form id="frm-editar_sub" method="post" action="SAVE_edit" enctype="multipart/form-data" >
            <input type="hidden" name="id_esp_ver" value="" id="id_esp_ver" >
            <input type="hidden" name="id_sub_ver" value="" id="id_sub_ver" >
            <input type="hidden" name="id_avis_ver" value="" id="id_avis_ver" >
            <input type="hidden" name="nom_esp_ver" value="" id="nom_esp" >
            <input type="hidden" name="nom_sub_ver" value="" id="nom_sub" >
            <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
            <article>
            <div class="container-fluid">

              <div class="form-group row">

                <div class="col-xs-12 col-md-4">
                     <label for="id_fecha_ing">
                        Fecha de Ingreso:
                    </label>
                    <input class="form-control" id="id_fecha_ing2" readonly="" type="date" name="fecha_ing_ver" >

                </div>


                <div class="col-xs-12 col-md-4 ">

                    <label for="id_fecha_avis">
                      Fecha de Avistamiento:
                    </label>
                    <input class="form-control" id="fecha_avis2" type="date" name="fecha_av_ver" >

                </div>

                <div class="col-xs-12 col-md-4 ">

                    <label for="id_hora_avis2">
                      Hora Avistamiento:
                    </label>
                    <input class="form-control" id="hora_avis22" type="time" name="hora_av_ver" >
                </div>

              </div>

              <div class="form-group row ">
                <div class="col-xs-12 col-md-4">
                  <label>
                      Colector:
                  </label>
                    <select class="form-control" id="id_colector2" name="col_avis_ver" >
                        <option disabled="true" selected="true" value="0">
                            --- Colector ---
                        </option>
                    </select>

                    <center>
                      <div class="" style="display: none;color:#ff3700;font-size:small;" id="_col_avis_ver" ><span class="help-block" ><strong style="color:  #f44242 ;float: right;" >{{ $errors->  first('col_avis_ver') }}</strong></span>  </div>
                    </center>

                </div>
                <div class="col-xs-12 col-md-4">
                    <label>
                        Fuente de Informacion:
                    </label>
                    <input class="form-control" id="idFInfo_ver" name="fuente_avis_ver" >

                </div>
                <div class="col-xs-12 col-md-4">
                    <label>
                        Ejemplar Depositado:
                    </label>
                    <input class="form-control" id="Ejem-Ver" name="ejem_avis_ver" >
                </div>
              </div>

              <!--            LUGAR DE RECOLECTA             -->

              <div "="" class="form-group row">
                <div class="col-xs-12 col-md-12">
                    <h4>
                        Lugar de Recolecta
                    </h4>
                </div>
              </div>

              <div  class="form-group row ">

                  <div class="col-xs-12 col-md-4">
                      <label>
                          Departamento:
                      </label>
                      <select class="form-control" id="id_departamento2"  name="depar_avis_ver">
                          <option disabled="true" selected="true" value="0">
                              ---Departamento---
                          </option>
                      </select>

                      <center>
                            <div class="" style="display: none;color:#ff3700;font-size:small;" id="_depar_avis_ver" ><span class="help-block" ><strong style="color:  #f44242 ;float: right;" >{{ $errors->  first('depar_avis_ver') }}</strong></span>  </div>
                      </center>
                  </div>

                  <div class="col-xs-12 col-md-4">
                      <label>
                          Municipio:
                      </label>
                      <select class="form-control" id="id_municipio2" name="mun_avis_ver" >
                          <option disabled="true" selected="true" value="0">
                              ---Municipio---
                          </option>
                      </select>

                      <center>
                            <div class="" style="display: none;color:#ff3700;font-size:small;" id="_mun_avis_ver" ><span class="help-block" ><strong style="color:  #f44242 ;float: right;" >{{ $errors->  first('mun_avis_ver') }}</strong></span>  </div>
                      </center>
                  </div>
                  <div class="col-xs-12 col-md-4">
                      <label>
                          Canton:
                      </label>
                      <select class="form-control" id="id_canton2" name="canton_avis_ver" >
                          <option disabled="true" selected="true" value="0">
                              ---Canton---
                           </option>
                      </select>

                      <center>
                            <div class="" style="display: none;color:#ff3700;font-size:small;" id="_canton_avis_ver" ><span class="help-block" ><strong style="color:  #f44242 ;float: right;" >{{ $errors->  first('canton_avis_ver') }}</strong></span>  </div>
                      </center>


                  </div>
              </div>

              <!-- Aqui termina lugar  -->

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
                    <input class="form-control" id="Latitud-VER"  name="lati_avis_ver">

                  <center>
                    <div class="" style="display: none;color:#ff3700;font-size:small;" id="_lati_avis_ver" ><span class="help-block" ><strong style="color:  #f44242 ;float: right;" >{{ $errors->  first('lati_avis_ver') }}</strong></span>  </div>
                  </center>

                  </div>

                  <div class="col-xs-12 col-md-4">
                    <label>
                      Longitud:
                    </label>
                    <input class="form-control" id="Longitud-VER"  name="long_avis_ver">
                    <center>
                      <div class="" style="display: none;color:#ff3700;font-size:small;" id="_long_avis_ver" ><span class="help-block" ><strong style="color:  #f44242 ;float: right;" >{{ $errors->  first('long_avis_ver') }}</strong></span>  </div>
                    </center>


                  </div>

                  <div class="col-xs-12 col-md-4">
                    <label>
                        Altura:
                    </label>
                    
                    <input class="form-control" id="Altura-VER"  name="alt_avis_ver">

                    <center>
                      <div class="" style="display: none;color:#ff3700;font-size:small;" id="_alt_avis_ver" ><span class="help-block" ><strong style="color:  #f44242 ;float: right;" >{{ $errors->  first('alt_avis_ver') }}</strong></span>  </div>
                    </center>

                  </div>

              </div>

              <!-- Documentos PDF IMAGEN -->

              <div class="form-group row">
                <div class="col-xs-12 col-md-6">
                  <label>
                    Fotografia de Avistamiento:
                  </label>
                    <br>
                      <input aria-describedby="fileHelp" class="form-control-file" id="idFoAvis" type="file" name="foto-graf_ver" >
                    <br>
                </div>
                
              </div>
              <div class="form-group row">
              <div class="col-xs-12 col-md-6">
                  <label>
                      Publicacion en PDF:
                  </label>
                  <br>
                      <input class="form-control frm-input" id="id_PubPDF_edit_sub"  name="PDF_file" type="text" >
                      <button class="btn btn-default" type="submit" id="guardar_link_edit_sub" style="width: 100%;">Agregar enlace  <span class="glyphicon glyphicon-plus" aria-hidden="true"  ></span></button>
                      <div id="link_edit_sub" >
                            <textarea class="form-control" id="pub_PDF_edit_sub" rows="3" name="pub_PDF_edit" disabled="false"></textarea>
                        </div>
                        <div id="esc_edit_sub" style="display: none;" >
                            <textarea id="publish_edit_sub" name="publish_edit_sub"></textarea>
                        </div>

                  <br>
                </div>
              </div>


               <div class="form-group row">
                <div class="col-xs-12 col-md-6">
                  <label>
                      Suelo:
                  </label>
                  <select class="form-control" id="id_suelo2"  name="suelo_avis_ver">
                      <option disabled="true" selected="true" value="0">
                          --- Suelo ---
                      </option>
                  </select>
                </div>
                <div class="col-xs-12 col-md-6">
                  <label>
                      Clase de Tierra:
                  </label>
                  <select class="form-control" id="id_tierra2"  name="tierra_avis_ver">
                      <option disabled="true" selected="true" value="0">
                          --- Clase de Tierra ---
                      </option>
                  </select>
                </div>
               </div>

               <div class="form-group row">
                            <div class="col-xs-12 col-md-6">
                                <label for="ClimaTextarea">
                                    Descripcion del Clima:
                                </label>
                                <textarea class="form-control" id="Clima-VER" rows="3"  name="clima_avis_ver"></textarea>
                        <center>
                            <div class="" style="display: none;color:#ff3700;font-size:small;" id="_clima_avis_ver" ><span class="help-block" ><strong style="color:  #f44242 ;float: right;" >{{ $errors->  first('clima_avis_ver') }}</strong></span>  </div>
                        </center>



                            </div>
                            <div class="col-xs-12 col-md-6">
                                <label for="EcoTextarea">
                                    Descripcion del Ecosistema:
                                </label>
                                <textarea class="form-control" id="Eco-VER" rows="3"  name="eco_avis_ver"></textarea>
                        <center>
                            <div class="" style="display: none;color:#ff3700;font-size:small;" id="_eco_avis_ver" ><span class="help-block" ><strong style="color:  #f44242 ;float: right;" >{{ $errors->  first('eco_avis_ver') }}</strong></span>  </div>
                        </center>




                            </div>
                </div>

                <div class="form-group row">
                            <div class="col-xs-12 col-md-6">
                                <label for="FisioTextarea">
                                    Descripcion de  Fisiografía:
                                </label>
                                <textarea class="form-control" id="Fisio-VER" rows="3"  name="fisio_Avis_ver"></textarea>
                        <center>
                            <div class="" style="display: none;color:#ff3700;font-size:small;" id="_fisio_Avis_ver" ><span class="help-block" ><strong style="color:  #f44242 ;float: right;" >{{ $errors->  first('fisio_Avis_ver') }}</strong></span>  </div>
                        </center>

                            </div>
                            <div class="col-xs-12 col-md-6">
                                <label for="GeoTextarea">
                                    Descripcion del Geología:
                                </label>
                                <textarea class="form-control" id="Geo-VER" rows="3"  name="geo_avis_ver"></textarea>
                        <center>
                            <div class="" style="display: none;color:#ff3700;font-size:small;" id="_geo_avis_ver" ><span class="help-block" ><strong style="color:  #f44242 ;float: right;" >{{ $errors->  first('geo_avis_ver') }}</strong></span>  </div>
                        </center>
                            </div>
                </div>

                <div class="form-group row">
                    <div class="col-xs-12 col-md-6">
                        <label for="HidroTextarea">
                          Descripcion de Hidrografía :
                        </label>
                         <textarea class="form-control" id="Hidro-VER" rows="3"  name="hidro_avis_ver"></textarea>
                <center>
                    <div class="" style="display: none;color:#ff3700;font-size:small;" id="_hidro_avis_ver" ><span class="help-block" ><strong style="color:  #f44242 ;float: right;" >{{ $errors->  first('hidro_avis_ver') }}</strong></span>  </div>
                </center>




                    </div>
                  <div class="col-xs-12 col-md-6">
                      <label for="usoTextarea">
                                    Usos de la Especies
                      </label>
                      <textarea class="form-control" id="uso-VER" rows="3"  name="usos_avis_ver"></textarea>
                <center>
                      <div class="" style="display: none;color:#ff3700;font-size:small;" id="_usos_avis_ver" ><span class="help-block" ><strong style="color:  #f44242 ;float: right;" >{{ $errors->  first('usos_avis_ver') }}</strong></span>  </div>
                </center>



                  </div>
                </div>

                <center>

                    <!--
                    <label id="guardar_editar" class="btn btn-success" >Guardar</label>
                    -->

                    <button class="btn btn-success" type="submit" id="guardar_editar" style="background-color: #b0a54f;border-color: #8e7200 ;width: 200px;">
                        Guardar
                    </button>

                </center>



            </div>
            </article>
            </form>

        </div>

      </div>
      </div>
</div>



<!-- Este solamente muestra la informacion -->


<div class="modal fade " id="VER_Avist"   role="dialog">
  <div class="modal-dialog modal-lg ">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header"  id="modal-h">
          <button type="button" class="close close-ver " data-dismiss="modal">&times;</button>
          <h4 class="modal-title"> Información  de Avistamiento  </h4>
      </div>
      <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
      <div class="modal-body" id="modal-body-view">
        <input type="hidden" name="id_avis" value="" id="id_view" >
        <input type="hidden" name="nom_esp" value="" id="nom_esp" >
        <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
          <form id="frm-ver" >
          <article>
            <div class="container-fluid">
              <div class="form-group row">
                <div class="col-xs-12 col-md-6">
                     <label for="id_fecha_ing">Fecha de Ingreso:</label>
                     <p id="fecha-ing-view" ></p>
              <div class="form-group row">
              <div class="col-xs-12 col-md-12 ">
                    <label for="id_fecha_avis">Fecha de Avistamiento: </label>
                    <p id="fecha-view" > </p>
              </div>
              <div class="col-xs-12 col-md-12 ">
                    <label for="id_fecha_avis">Hora Avistamiento: </label>
                    <p id="hora-view" > </p>
              </div>
              </div>
              <div class="form-group row ">
                <div class="col-xs-12 col-md-12">
                  <label> Colector:</label>
                  <p id="col-view" ></p>
                </div>
                </div>
                <div class="form-group row ">
                <div class="col-xs-12 col-md-12">
                    <label>Fuente de Informacion:</label>
                    <p id="fuente-view" ></p>
                </div>
                </div>
                <div class="form-group row ">
                <div class="col-xs-12 col-md-12">
                    <label>Ejemplar Depositado:</label>
                    <p id="ejem-view" ></p>
                </div>
              </div>
                </div>
                <div class="col-xs-12 col-md-6">
                 <center>
                        <img src="/imagen/placeholder.png"  id="img-avista" class="img-rounded" width="400" height="350">
                 </center>

              </div>

            
                    <br>
                     <!-- <img id="img-avista" src="/imagen/placeholder.png" style=" max-width: 250px;  height: auto;">-->
                    <br>
                </div>
              </div>
              <!--            LUGAR DE RECOLECTA             -->
              <div "="" class="form-group row">
                <div class="col-xs-12 col-md-12">
                    <h4>
                        Lugar de Recolecta
                    </h4>
                </div>
              </div>
              <div  class="form-group row ">
                <div class="col-xs-12 col-md-4">
                  <label> Departamento:</label>
                  <p id="dep-view" ></p>
                </div>
              <div class="col-xs-12 col-md-4">
                      <label> Municipio: </label>
                      <p id="mun-view" ></p>
              </div>
              <div class="col-xs-12 col-md-4">
                <label> Canton:</label>
                <p id="can-view" ></p>
                  </div>
              </div>

              <!-- Aqui termina lugar  -->

              <div class="form-group row">
               <div class="col-xs-12 col-md-12">
                    <h4>
                        Coordenadas Geografica
                    </h4>
                </div>
              </div>
              <div class="form-group row">
                  <div class="col-xs-12 col-md-4">
                    <label>Latitud:</label>
                    <p id="lati-vista" ></p>
                  </div>
                  <div class="col-xs-12 col-md-4">
                    <label>Longitud:</label>
                    <p id="long-vista" ></p>
                  </div>
                  <div class="col-xs-12 col-md-4">
                    <label>Altura:</label>
                    <p id="altu-vista" ></p>
                  </div>
              </div>
              <div class="form-group row">
                <div class="col-xs-12 col-md-6">
                  <label> Suelo: </label>
                  <p id="suelo-vista" ></p>
               </div>
                <div class="col-xs-12 col-md-6">
                  <label>Clase de Tierra:</label>
                  <p id="tierra-vista"  ></p>
               </div>
               </div>
               <div class="form-group row">
                <div class="col-xs-12 col-md-6">
                    <label for="ClimaTextarea">Descripcion del Clima:</label>
                    <p id="clima-avista" ></p>
                </div>
                <div class="col-xs-12 col-md-6">
                    <label for="EcoTextarea">Descripcion del Ecosistema:</label>
                    <p id="eco-avista" ></p>

                </div>
                </div>
                <div class="form-group row">
                  <div class="col-xs-12 col-md-6">
                      <label for="FisioTextarea"> Descripcion de  Fisiografía:</label>
                      <p id="fisio-avista" ></p>
                  </div>
                  <div class="col-xs-12 col-md-6">
                      <label for="GeoTextarea">
                          Descripcion del Geología:
                      </label>
                      <p id="geo-avista" ></p>
                  </div>
                </div>
                <div class="form-group row">
                    <div class="col-xs-12 col-md-6">
                        <label for="HidroTextarea">Descripcion de Hidrografía: </label>
                        <p id="hidro-avista" ></p>

                    </div>
                  <div class="col-xs-12 col-md-6">
                      <label for="usoTextarea">Usos de la Especies:</label>
                      <p id="usos-avista" ></p>
                 </div>
                </div>
                 <!-- Documentos PDF  -->
              <div class="form-group row">
                <div class="col-xs-12 col-md-6">
                  <label>Publicacion en PDF:</label>
                  <br>
                      <p id="publicacion_PDF_sub" ></p>
                  <br>
                </div>
              </div>

            </div>
            </article>
            </form>

        </div>

      </div>
      </div>
</div>

<div class="modal fade" id="MSG_exito_save" role="dialog" >
  <div class="modal-dialog modal-md ">
    <!-- Modal content-->
      <div class="modal-content" style=" vertical-align: middle;" >
        
        
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"></h4>
        </div>
         
            
            <div class="modal-body">
            <div class="row">
                <center>
                  <h4>Avistamiento guardado exitosamente</h4>
                </center>
                 <input type="hidden" name="id_usuario" value="{{ $usuario[0]->idUsuario }}" >

                 <center>

                  <button type="submit" class="btn btn-success" id="btn_guardo_avis"> OK </button>
            
                 </center>

        
            </div>
            </div>
            
          
        </div>
  </div>
</div>

