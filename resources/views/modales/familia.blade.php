      <!-- Modal  FAMILIA -->
  <div class="modal fade" id="FAM_Modal" role="dialog">

      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close close_fam" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Desea ingresar una nueva familia?</h4>
          </div>
          <br>

            <form method="post" action="ingr_fam_modal" id="fam_modal" name="ffamilia" >
            <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
            <div class="modal-body">

            <div class="row">
            <div class="col-xs-4">
              <label >Reino : </label>
            </div>
             <div class="col-xs-4">
              <select style="width:200px;height: 32px;" class="reinof " name="rei_mod" id="rfm_id">
            <option value="0" disabled="true" selected="true">  -- Reino --  </option>
            <option></option>
          </select>
             </div>
          </div>
            <br>
            <div class="row">
             <div class="col-xs-4">
              <label>División:</label>
             </div>
              <div class="col-xs-4">
                <select style="width:200px;height: 32px;" class="divisionf" name="div_fam" id="dfm_id">
            <option value="0" disabled="true" selected="true">  -- División--  </option>
            <option></option>
          </select>
              </div>
          </div>

          <br>
          <div class="row">
           <div class="col-xs-4">
            <label >Clase:</label>
           </div>
            <div class="col-xs-4">
                <select style="width:200px;height: 32px;" class="clasef " name="cla_fam" id="dcm_id">
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
                <select style="width:200px;height: 32px;" class="ordenf " name="ord_fam" id="df_id">
            <option value="0" disabled="true" selected="true">-- Orden -- </option>
            <option></option>
          </select>
              </div>

            </div>
            <br>
      <div class="row">
       <div class="col-xs-4">
        <label > Familia:</label>
       </div>
        <div class="col-xs-4">
          <input required type="text" style="width:200px;float: left; height: 30px;" name="fam_input" id="fam_input" >
        </div>

      </div>


      <br>
      <center>
        <div class="form-group">

          <div class="alert alert-danger" style="display: none;" id="msg-error-familia">
            <ul style="list-style-type:none" >

              <li style="float: left;"  id="_fam_input" >{{ $errors->first('fam_input') }}</li><br>
              <li style="float: left;"  id="_ord_fam"   >{{ $errors->first('ord_fam') }}</li><br>

            </ul>
          </div>

        </div>
        </center>





            </div>


            <div class="modal-footer">
              <button type="submit" class="btn btn-success" id="g_fam" > Guardar </button>
            <button type="button" class="btn btn-success can_fam" data-dismiss="modal">Cancelar</button>
            </div>


            </form>
            <br>


        </div>

      </div>

    </div>
