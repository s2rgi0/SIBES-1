<!-- Este MODAL o ventana emergente se ultiliza para modificar los 
Avistamientos de ESPECIE -->

<div class="modal fade " id="VER_Avista_Modal"   role="dialog">

      <div class="modal-dialog modal-lg ">

        <!-- Modal content-->
        <div class="modal-content">
        <div class="modal-header"  id="modal-h">
            <button type="button" class="close close-editar" data-dismiss="modal">&times;</button>
            <h4 class="modal-title"> Modificar Información del avistamiento de la especie: {{ $esp->nombreEspecie }}  </h4>
        </div>

        <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
        <input type="hidden" name="_token" value="{{ Session::token() }}">

        <div class="modal-body" id="modal-body-ver">


            <label  id="label_especie" ></label>
            <form id="frm-editar" method="post" action="SAVE_edit" enctype="multipart/form-data" >

            <input type="hidden" name="id_esp_ver" value="" id="id_esp_ver" >
            <input type="hidden" name="id_avis_ver" value="" id="id_avis_ver" >
            <input type="hidden" name="nom_esp_ver" value="" id="nom_esp" >


            <input name="_token" type="hidden" value="{{ csrf_token() }}"/>

            <article>
            <div class="container-fluid">

              <div class="form-group row">

                <div class="col-xs-12 col-md-4">
                     <label for="id_fecha_ing">
                        Fecha Ingreso:
                    </label>
                    <input class="form-control" id="id_fecha_ing2" readonly="" type="date" name="fecha_ing_ver" >

                </div>
                <div class="col-xs-12 col-md-4 ">

                    <label for="id_fecha_avis">
                      Fecha Avistamiento:
                    </label>
                    <input class="form-control" id="fecha_avis2" type="date" name="fecha_av_ver" >

                </div>
                <div class="col-xs-12 col-md-4 ">

                    <label for="id_hora_avis">
                      Hora Avistamiento:
                    </label>
                    <input class="form-control" id="hora_avis"  type="time" name="hora_av_ver" >

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
                    <select class="form-control" id="idFInfo_ver" name="fuente_avis_ver" >
                        <option disabled="true" selected="true" value="0">
                            --- Fuente de Información ---
                        </option>
                    </select>
                    
                    <center>
                      <div class="" style="display: none;color:#ff3700;font-size:small;" id="_fuente_avis_ver" ><span class="help-block" ><strong style="color:  #f44242 ;float: right;" >{{ $errors->  first('fuente_avis_ver') }}</strong></span>  </div>
                    </center>

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


<div class="row" style="padding-left: 20px;border-radius: 4px;border: 1px solid  #bfbfbf ;padding: 7px;" >
<div style="padding-left: 20px;" >
 <label > N </label>
 <input id="Latitud-VER"  name="lati_avis_ver" style="width: 50px;border-radius: 4px;border: 1px solid  #bfbfbf;height: 30px;" >
 <label>°</label>
 <input name="lati_min_ver" id="lati_min_ver" style="width: 50px;border-radius: 4px;border: 1px solid  #bfbfbf;height: 30px;">
 <label> '</label>
 <input name="lati_sec_ver" id="lati_sec_ver" style="width: 60px;border-radius: 4px;border: 1px solid  #bfbfbf;height: 30px;">
 <label> "</label>    
</div>

</div>


                  <!-- <input class="form-control" id="Latitud-VER"  name="lati_avis_ver" placeholder="N 13° 40' 40.848''" > -->
                  
                  <center>
                    <div class="" style="display: none;color:#ff3700;font-size:small;" id="_lati_avis_ver" ><span class="help-block" ><strong style="color:  #f44242 ;float: right;" >{{ $errors->  first('lati_avis_ver') }}</strong></span>  </div>
                  </center>
                  <center>
                    <div class="" style="display: none;color:#ff3700;font-size:small;" id="_lati_min_ver" ><span class="help-block" ><strong style="color:  #f44242 ;float: right;" >{{ $errors->  first('lati_min_ver') }}</strong></span>  </div>
                  </center>
                  <center>
                    <div class="" style="display: none;color:#ff3700;font-size:small;" id="_lati_sec_ver" ><span class="help-block" ><strong style="color:  #f44242 ;float: right;" >{{ $errors->  first('lati_sec_ver') }}</strong></span>  </div>
                  </center>

                  </div>
                  <div class="col-xs-12 col-md-4">
                    <label>
                        Longitud:
                    </label>

<div class="row" style="padding-left: 20px;border-radius: 4px;border: 1px solid  #bfbfbf ;padding: 7px;" >
<div style="padding-left: 20px;" >
 <label > O </label>
 <input  id="Longitud-VER"  name="long_avis_ver" style="width: 50px;border-radius: 4px;border: 1px solid  #bfbfbf;height: 30px;" >
 <label>°</label>
 <input name="long_min_ver"  id="long_min_ver" style="width: 50px;border-radius: 4px;border: 1px solid  #bfbfbf;height: 30px;">
 <label> '</label>
 <input name="long_sec_ver"  id="long_sec_ver" style="width: 60px;border-radius: 4px;border: 1px solid  #bfbfbf;height: 30px;">
 <label> "</label>    
</div>

</div>





  <!-- <input class="form-control" id="Longitud-VER"  name="long_avis_ver" placeholder="O 89° 6' 26.499''" > -->              



                  <center>
                    <div class="" style="display: none;color:#ff3700;font-size:small;" id="_long_avis_ver" ><span class="help-block" ><strong style="color:  #f44242 ;float: right;" >{{ $errors->  first('long_avis_ver') }}</strong></span>  </div>
                  </center>
                    <center>
                    <div class="" style="display: none;color:#ff3700;font-size:small;" id="_long_min_ver" ><span class="help-block" ><strong style="color:  #f44242 ;float: right;" >{{ $errors->  first('long_min_ver') }}</strong></span>  </div>
                  </center>
                  <center>
                    <div class="" style="display: none;color:#ff3700;font-size:small;" id="_long_sec_ver" ><span class="help-block" ><strong style="color:  #f44242 ;float: right;" >{{ $errors->  first('long_sec_ver') }}</strong></span>  </div>
                  </center>

                  </div>
                  <div class="col-xs-12 col-md-4">
                    <label>
                        Altura:
                    </label>
                    <input class="form-control" id="Altura-VER"  name="alt_avis_ver">

                    <center>
                      <div class="" style="display: none;color:#ff3700;font-size:small;" id="_alt_avis_ver" ><span class="help-block" ><strong style="color:  #f44242 ;float: right;" >{{ $errors->  first('alt_avis_ver') }}</strong></span></div>
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
                  <center>
                      <div class="" style="display: none;color:#ff3700;font-size:small;" id="_foto-graf_ver" ><span class="help-block" ><strong style="color:  #f44242 ;float: right;" >{{ $errors->  first('foto-graf_ver') }}</strong></span></div>
                  </center>
                </div>

                <div class="col-xs-12 col-md-6" >
                  <label>
                    Numero de Especies Observadas:
                  </label>
                  <input class="form-control" id="num_av
                  is_edit"  name="num_avis_edit">
                  <center>
                      <div class="" style="display: none;color:#ff3700;font-size:small;" id="_num_avis_edit" ><span class="help-block" ><strong style="color:  #f44242 ;float: right;" >{{ $errors->first('num_avis_edit') }}</strong></span>  </div>
                  </center>
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
              <div class="form-group row" >
                <div class="col-xs-12 col-md-6" >
                  <label>
                      Publicacion en PDF:
                  </label>
                  <br>
                </div>
              </div>
              <div class="form-group row">
              <div class="col-xs-12 col-md-6">
                <!-- 
                <input id="id_PubPDF_edit"  name="PDF_file" type="file" >
                <br>
                 -->
                  <input aria-describedby="fileHelp" class="form-control-file" id="id_PubPDF_edit" type="file" name="pdf_avista_doc_edit" >

                  <br>
                  <center>
                    <div class="" style="display: none;color:#ff3700;font-size:small;" id="_pdf_avista_doc_edit" ><span class="help-block" ><strong style="color:  #f44242 ;float: right;" >{{ $errors->  first('pdf_avista_doc_edit') }}</strong></span></div>
                  </center>

              </div>
              <div class="col-xs-12 col-md-6" >
                <button class="btn btn-default" type="submit" id="guardar_link_edit" style="width: 100%;">Agregar documento PDF  <span class="glyphicon glyphicon-plus" aria-hidden="true"  ></span></button>                  
              </div>
              </div>
              <div class="form-group row" >

                <div class="col-xs-12 col-md-12" >
                  <div  style=" border-radius: 3px;border: 1px solid #cccccc ; padding: 7px;background-color: white; "  >
                    <table  width="100%">
                    <thead></thead>
                    <tbody class="row_pdf_edit" >
                      
                    </tbody>                    
                  </table>
                  </div>
                </div>                
                
              </div> 
              <div class="form-group row" >
              <div>
                <center>

                    <button class="btn btn-success" type="submit" id="guardar_editar" style="background-color: #b0a54f;border-color: #8e7200 ;width: 200px;">
                        Guardar
                    </button>

                </center>
              </div>
              </div>          

                

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
            <h4 class="modal-title"> Información  de Avistamiento de la especie: {{ $esp->nombreEspecie }} </h4>
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
                <div class="col-xs-12 col-md-12">
                    <label for="id_fecha_avis">Fecha de Avistamiento:</label>
                    <p id="fecha-view" > </p>
                </div>
              </div>
              <div class="form-group row" >
                <div class="col-xs-12 col-md-12 ">
                    <label for="id_fecha_avis">Hora Avistamiento: </label>
                    <p id="hora-view" > </p>
              </div>  
              </div>              
              <div class="form-group row ">
                <div class="col-xs-12 col-md-12">
                   <label>Colector: </label>
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
              <div class="form-group row ">
                <div class="col-xs-12 col-md-12">
                    <label>Numero de Especies Observadas:</label>
                    <p id="num_avis_ver" ></p>
                </div>
              </div>

             </div>
             <div class="col-xs-12 col-md-6">
                  <center>
                        <img src="/imagen/placeholder.png"  id="img-avista" class="img-rounded" width="400" height="350">
                 </center>
                </div>
              <!--              Falta publi id_PubP           -->
                <br>

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

                      <p id="dep-view" ></p>
                  </div>

                  <div class="col-xs-12 col-md-4">
                      <label>
                          Municipio:
                      </label>

                      <p id="mun-view" ></p>

                  </div>
                  <div class="col-xs-12 col-md-4">
                      <label>
                          Canton:
                      </label>
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
                    <label>
                        Latitud:
                    </label>

                    <p id="lati-vista" ></p>

                  </div>
                  <div class="col-xs-12 col-md-4">
                    <label>
                        Longitud:
                    </label>


                    <p id="long-vista" ></p>
                  </div>
                  <div class="col-xs-12 col-md-4">
                    <label>
                        Altura:
                    </label>


                    <p id="altu-vista" ></p>
                  </div>
              </div>

              <div class="form-group row">
                <div class="col-xs-12 col-md-6">
                  <label>
                      Suelo:
                  </label>

                  <p id="suelo-vista" ></p>

                </div>
                <div class="col-xs-12 col-md-6">
                  <label>
                      Clase de Tierra:
                  </label>

                  <p id="tierra-vista"  ></p>


                </div>
               </div>

               <div class="form-group row">
                <div class="col-xs-12 col-md-6">
                    <label for="ClimaTextarea">
                        Descripcion del Clima:
                     </label>
                    <p id="clima-avista" ></p>

                </div>
                <div class="col-xs-12 col-md-6">
                    <label for="EcoTextarea">
                        Descripcion del Ecosistema:
                    </label>
                    <p id="eco-avista" ></p>

                </div>
                </div>

                <div class="form-group row">
                  <div class="col-xs-12 col-md-6">
                      <label for="FisioTextarea">
                          Descripcion de  Fisiografía:
                      </label>
                      <p id="fisio-avista" ></p>

                  </div>
                  <div class="col-xs-12 col-md-6">
                      <label for="GeoTextarea">
                          Descripcion del Geología:
                      </label>
                      <p id="geo-avista" ></p>
                                <!--
                                <textarea class="form-control" id="Geo-VER" rows="3"  name="geo_avis">
                                </textarea>
                                -->
                  </div>
                </div>

                <div class="form-group row">
                    <div class="col-xs-12 col-md-6">
                        <label for="HidroTextarea">
                          Descripcion de Hidrografía :
                        </label>
                        <p id="hidro-avista" ></p>
                        <!--
                        <textarea class="form-control" id="Hidro-VER" rows="3"  name="hidro_avis">
                        </textarea>
                        -->
                    </div>
                  <div class="col-xs-12 col-md-6">
                      <label for="usoTextarea">
                                    Usos de la Especies
                      </label>
                      <p id="usos-avista" ></p>
                      <!--
                      <textarea class="form-control" id="uso-VER" rows="3"  name="usos_avis">
                      </textarea>
                      -->

                  </div>
                </div>
                <!-- Documentos PDF IMAGEN -->

              <div class="form-group row">
                <div class="col-xs-12 col-md-12">
                  <label>
                      Publicacion en PDF:
                  </label>
                  <br>
                  <div style=" border-radius: 3px;border: 1px solid  #b0a54f ; padding: 7px; " >

                    <table  width="100%">
                      <thead></thead>
                      <tbody class="row_pdf" >
                      
                      </tbody>                    
                    </table>
                    
                  </div>
                  <p id="publicacion_PDF" ></p>
                  
                </div>
              </div>

            </div>
            </article>
            </form>

        </div>

      </div>
      </div>
</div>





<div class="modal fade " id="PDF_avis"   role="dialog">
      <div class="modal-dialog modal-lg ">
        <!-- Modal content-->
        <div class="modal-content">
        <div class="modal-header"  id="modal-h">
            <button type="button" class="close close-pdf " data-dismiss="modal">&times;</button>
            <h4 class="modal-title"> Publicacion PDF avistamiento  {{ $esp->nombreEspecie }}</h4>
        </div>
        <div class="modal-body" id="modal-body-pdf">
            <form id="frm-docu_pdf" action="Guardar_PDF" method="post" enctype="multipart/form-data" >
            <input type="hidden" name="id_avis_pdf" value="" id="id_avis_pdf" >
            <input type="hidden" name="nom_esp_pdf" value="{{ $esp->nombreEspecie }}" id="nom_esp_pdf" >
            <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
            <article>
            <div class="container-fluid">
            <div class="form-group row">
            <div class="col-xs-12 col-md-12">     
              <div class="form-group row">
                <div class="col-xs-12 col-md-12">
                  <label>
                      Publicacion en PDF:
                  </label>
                  <br>
                      <p id="publicacion_PDF" ></p>
                      <input aria-describedby="fileHelp" class="form-control-file" id="pdf_avista_doc" type="file" name="pdf_avista_doc" >
                  <br>
                  <center>
                    <div class="" style="display: none;color:#ff3700;font-size:small;" id="_pdf_avista_doc" ><span class="help-block" ><strong style="color:  #f44242 ;float: right;" >{{ $errors->  first('pdf_avista_doc') }}</strong></span></div>
                  </center>
                </div>
              </div>
              <center>
                  <button class="btn btn-success" type="submit" id="guardar_pdf" style="background-color: #b0a54f;border-color: #8e7200 ;width: 200px;">
                        Guardar 
                  </button>
              </form>
              <a class="btn btn-success" id="cerrar-pdf" style="background-color: #b0a54f;border-color: #8e7200 ;width: 200px;">Cerrar</a>
              </center>
            </div>
            </div>
            </div>
            </article>
        </div>

      </div>
      </div>
</div>