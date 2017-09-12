
      <!-- Modal  CLASE -->


  <div class="modal fade" id="CLA_Modal" role="dialog">

      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close close_cla" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Desea ingresar una nueva clase?</h4>
          </div>
          <br>

            <form method="post" action="ingr_cla_modal" id="cla_modal" name="fclase" >
            <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
            <div class="modal-body">
            <!--
            <div class="row">
            <div class="col-xs-4">
              <label >Reino: </label>
            </div>
             <div class="col-xs-4">
              <select style="width:200px;height: 32px;" class="reinoc_modal" name="rei_mod" id="rcm_id">
            <option value="0" disabled="true" selected="true">  -- Reino --  </option>
            <option></option>
        </select>
             </div>

            </div>
            <br>
            <div class="row">
            <div class="col-xs-4">
              <label >División:</label>
            </div>
            <div class="col-xs-4">
              <select style="width:200px;height: 32px;" class="divisionc" name="div_mod" id="dm_id">
            <option value="0" disabled="true" selected="true">   División  </option>
            <option></option>
          </select>
            </div>

        </div>
        -->
      <input type="hidden" name="div_mod" id="id_div">
      <div class="row">
        <div class="col-xs-4">
          <label style="float: right;"> Clase:</label>
        </div>
          <div class="col-xs-4">
            <input required type="text" style="width:200px;float: left; height: 30px;" name="cla_input_mod" id="cla_input_mod">
          </div>
      </div>
        <center>
        <div class="form-group">

          <div class="alert alert-danger" style="display: none;" id="msg-error-clase">
            <ul style="list-style-type:none" >

              <li style="float: left;"  id="_cla_input_mod" >{{ $errors->first('cla_input_mod') }}</li><br>
              <li style="float: left;"  id="_div_mod"   >{{ $errors->first('div_mod') }}</li><br>

            </ul>
          </div>

        </div>
        </center>
            </div>


            <div class="modal-footer">
              <button type="submit" class="btn btn-success" id="g_cla" style="background-color: #b0a54f ; border-color: #8e7200 ;" > Guardar </button>
            <button type="button" class="btn btn-success can_cla" data-dismiss="modal" style="background-color: #b0a54f ; border-color: #8e7200 ;" >Cancelar</button>
            </div>


            </form>
            <br>


        </div>

      </div>

    </div>
