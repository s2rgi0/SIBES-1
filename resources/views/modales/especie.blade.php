      <!-- Modal  ESPECIE -->
  <div class="modal fade" id="ESP_Modal" role="dialog">

      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close close_esp" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Desea ingresar una nueva especie?</h4>
          </div>
          <br>

            <form method="post" action="ingr_esp_modal" id="esp_modal" name="fespecie" >
            <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
            <div class="modal-body">
            <!--
            <div class="row">
            <div class="col-xs-4">
              <label  >Reino:</label>
            </div>
             <div class="col-xs-4">
              <select style="width:200px;height: 32px;" class="reinoe " name="rei_mod" id="rem_id">
            <option value="0" disabled="true" selected="true">  --Reino --  </option>
        </select>

             </div>
              </div>
            <br>
            <div class="row">
              <div class="col-xs-4">
                <label >División:</label>
              </div>
               <div class="col-xs-4">
                  <select style="width:200px;height: 32px;" class="divisione " name="div_esp" id="rm_id">
            <option value="0" disabled="true" selected="true">-- División --</option>
            <option></option>
          </select>
               </div>

            </div>
          <br>
          <div class="row">
            <div class="col-xs-4">
                <label>Clase:</label>
            </div>
              <div class="col-xs-4">
                <select style="width:200px;height: 32px;" class="clasee " name="cla_esp" id="dcm_id">
          <option value="0" disabled="true" selected="true">  -- Clase --  </option>
          </select>
              </div>
          </div>
            <br>
            <div class="row">
              <div class="col-xs-4">
                <label >Orden:</label>
              </div>
                <div class="col-xs-4">
                  <select style="width:200px;height: 32px;" class="ordene " name="ord_esp" id="cm_id">
            <option value="0" disabled="true" selected="true">-- Orden --</option>
          </select>
                </div>


            </div>
            <br>
            <div class="row">
              <div class="col-xs-4">
                <label >Familia:</label>
              </div>
               <div class="col-xs-4">
                  <select style="width:200px;height: 32px;" class="familiae " name="fam_esp" id="fe_id">
            <option value="0" disabled="true" selected="true">-- Familia --  </option>
            <option></option>
          </select>
               </div>
            </div>
            <br>
            <div class="row">
              <div class="col-xs-4">
                  <label>Género:</label>
              </div>
                <div class="col-xs-4">
                  <select style="width:200px;height: 32px;" class="generoe " name="gen_esp" id="ge_id">
            <option value="0" disabled="true" selected="true"> --Género--</option>
          </select>
                </div>
            </div>
          <br>
          -->
          <input type="hidden" name="gen_esp" id="id_gen">
      <div class="row">
        <div class="col-xs-4">
          <label style="float: right;" > Especie:</label>
        </div>
         <div class="col-xs-4">
          <input required type="text" style="width:200px;float: left; height: 30px;" name="esp_input" id="esp_input" >
         </div>

      </div>
      <center>
        <div class="form-group">

          <div class="alert alert-danger" style="display: none;" id="msg-error-especie">
            <ul style="list-style-type:none" >

              <li style="float: left;"  id="_esp_input" >{{ $errors->first('esp_input') }}</li><br>
              <li style="float: left;"  id="_gen_esp"   >{{ $errors->first('gen_esp') }}</li><br>

            </ul>
          </div>

        </div>
        </center>



            </div>


            <div class="modal-footer">
              <button type="submit" class="btn btn-success" id="g_esp" style="background-color: #b0a54f ; border-color: #8e7200 ;" > Guardar </button>
            <button type="button" class="btn btn-success can_esp" data-dismiss="modal" style="background-color: #b0a54f ; border-color: #8e7200 ;" >Cancelar</button>
            </div>


            </form>
            <br>


        </div>

      </div>

    </div>
