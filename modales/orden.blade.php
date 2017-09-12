      <!-- Modal  ORDEN -->
  <div class="modal fade" id="ORD_Modal" role="dialog">

      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close close_ord" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Desea ingresar un nuevo orden?</h4>
          </div>
          <br>

            <form method="post" action="ingr_ord_modal" id="ord_modal" name="forden">
            <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
            <div class="modal-body">

            <!--
            <div class="row">
            <div class="col-xs-4">
              <label >Reino : </label>
            </div>
            <div class="col-xs-4">
              <select style="width:200px;height: 32px;" class="reinoo " name="rei_mod" id="rom_id">
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
              <select style="width:200px;height: 32px;" class="divisiono " name="div_ord" id="dcm_id">
            <option value="0" disabled="true" selected="true">  -- División--  </option>
            <option></option>
        </select>
            </div>
        </div>
                <br>

            <div class="row">
            <div class="col-xs-4">
              <label >Clase : </label>
            </div>
            <div class="col-xs-4">
              <select style="width:200px;height: 32px;" class="claseo" name="cla_ord" id="cm_id">
            <option value="0" disabled="true" selected="true">  -- Clase --  </option>
            <option></option>
          </select>
            </div>

            </div>
          -->
      <input type="hidden" name="cla_ord" id="id_cla" >
      <div class="row">
      <div class="col-xs-4">
      <label style="float: right;" > Orden : </label>
      </div>
      <div class="col-xs-4">
        <input required type="text" style="width:200px;float: left; height: 30px;" name="ord_input_mod" id="ord_input_mod" >
      </div>


      </div>

          <center>
        <div class="form-group">

          <div class="alert alert-danger" style="display: none;" id="msg-error-orden">
            <ul style="list-style-type:none" >

              <li style="float: left;"  id="_ord_input_mod" >{{ $errors->first('ord_input_mod') }}</li><br>
              <li style="float: left;"  id="_cla_ord"   >{{ $errors->first('cla_ord') }}</li><br>

            </ul>
          </div>

        </div>
        </center>

            </div>


            <div class="modal-footer">
              <button type="submit" class="btn btn-success" id="g_ord"  style="background-color: #b0a54f ; border-color: #8e7200 ;" > Guardar </button>
            <button type="button" class="btn btn-success can_ord" data-dismiss="modal" style="background-color: #b0a54f ; border-color: #8e7200 ;" >Cancelar</button>
            </div>


            </form>
            <br>


        </div>

      </div>

    </div>
