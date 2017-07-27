
    <!-- Modal  SUB.ESPECIE -->
  <div class="modal fade" id="SUB_Modal" role="dialog">

      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close close_sub" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Desea ingresar una nueva subespecie?</h4>
          </div>
          <br>

            <form method="post" action="ingr_sub_modal" id="sub_modal" name="fsubespecie" >
            <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
            <div class="modal-body">

            <div class="row">
                <div class="col-xs-4">
                  <label >Reino:</label>
                </div>
                <div class="col-xs-4">
                  <select style="width:200px;height: 32px;" class="reinosu " name="rei_mod" id="rem_su">
              <option value="0" disabled="true" selected="true">  -- Reino --  </option>
            </select>
                </div>

            </div>
            <br>
            <div class="row">
            <div class="col-xs-4">
              <label >División:</label>
            </div>
            <div class="col-xs-4">
                <select style="width:200px;height: 32px;" class="divisionsu " name="div_sub" id="d_su">
            <option value="0" disabled="true" selected="true">-- División -- </option>
          </select>
            </div>


            </div>
          <br>
          <div class="row">
          <div class="col-xs-4">
            <label >Clase:</label>
          </div>
            <div class="col-xs-4">
              <select style="width:200px;height: 32px;" class="clasesu " name="cla_sub" id="c_su">
            <option value="0" disabled="true" selected="true"> -- Clase --  </option>
        </select>
            </div>
            </div>
            <br>
            <div class="row">
            <div class="col-xs-4">
              <label >Orden:</label>
            </div>
            <div class="col-xs-4">
              <select style="width:200px;height: 32px;" class="ordensu " name="ord_sub" id="o_su">
            <option value="0" disabled="true" selected="true">-- Orden -- </option>
        </select>
            </div>
            </div>
            <br>
            <div class="row">
            <div class="col-xs-4">
              <label  >Familia : </label>
            </div>
            <div class="col-xs-4">
              <select style="width:200px;height: 32px;" class="familiasu " name="fam_sub" id="f_su">
            <option value="0" disabled="true" selected="true">-- Familia --</option>
        </select>
            </div>
            </div>
            <br>
            <div class="row">
            <div class="col-xs-4">
              <label >Género:</label>
            </div>
            <div class="col-xs-4">
              <select style="width:200px;height: 32px;" class="generosu " name="gen_sub" id="g_su">
            <option value="0" disabled="true" selected="true">-- Género--</option>
        </select>
            </div>

            </div>
            <br>
            <div class="row">
            <div class="col-xs-4">
              <label >Especie : </label>
            </div>
            <div class="col-xs-4">
              <select style="width:200px;height: 32px;" class="especiesu " name="esp_sub" id="e_su">
            <option value="0" disabled="true" selected="true">  -- Especie --  </option>
        </select>
            </div>
            </div>
          <br>
      <div class="row">
      <div class="col-xs-4">
        <label > Subespecie: </label>
      </div>
            <div class="col-xs-4">
              <input required type="text" style="width:200px;float: left; height: 30px;" name="sub_input" id="sub_input" >
            </div>


      </div>

      <br>
      <center>
        <div class="form-group">

          <div class="alert alert-danger" style="display: none;" id="msg-error-subespecie">
            <ul style="list-style-type:none" >

              <li style="float: left;"  id="_sub_input" >{{ $errors->first('sub_input') }}</li><br>
              <li style="float: left;"  id="_esp_sub"   >{{ $errors->first('esp_sub') }}</li><br>

            </ul>
          </div>

        </div>
        </center>




            </div>


            <div class="modal-footer">
              <button type="submit" class="btn btn-success" id="g_sub" > Guardar </button>
            <button type="button" class="btn btn-success can_sub" data-dismiss="modal">Cancelar</button>
            </div>


            </form>
            <br>


        </div>

      </div>

    </div>
