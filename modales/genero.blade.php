      <!-- Modal  GENERO -->
  <div class="modal fade" id="GEN_Modal" role="dialog">

      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close close_gen" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Desea ingresar un nuevo género?</h4>
          </div>
          <br>

            <form method="post" action="ingr_gen_modal" id="gen_modal" name="fgenero" >
            <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
            <div class="modal-body">
              <!--
            <div class="row">
                <div class="col-xs-4">
                  <label >Reino:</label>
                </div>
                <div class="col-xs-4">
                  <select style="width:200px;height: 32px;" class="reinog" name="rei_mod" id="rgm_id">
              <option value="0" disabled="true" selected="true">-- Reino --</option>

            </select>
                </div>
            </div>
            <br>
            <div class="row">
            <div class="col-xs-4">
              <label>División:</label>
            </div>
            <div class="col-xs-4">
              <select style="width:200px;height: 32px;" class="divisiong " name="div_gen" id="dg_id">
            <option value="0" disabled="true" selected="true">-- División--</option>
        </select>
            </div>

            </div>
          <br>
          <div class="row">
          <div class="col-xs-4">
            <label >Clase : </label>
          </div>
            <div class="col-xs-4">
              <select style="width:200px;height: 32px;" class="claseg " name="cla_gen" id="dcm_id">
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
              <select style="width:200px;height: 32px;" class="ordeng " name="ord_gen" id="cm_id">
            <option value="0" disabled="true" selected="true">  -- Orden --  </option>

          </select>
            </div>

            </div>
            <br>
            <div class="row">
            <div class="col-xs-4">
              <label >Familia:</label>
            </div>
            <div class="col-xs-4">
              <select style="width:200px;height: 32px;" class="familiag " name="fam_gen" id="fg_id">
            <option value="0" disabled="true" selected="true">  -- Familia --  </option>

        </select>
            </div>

            </div>
          <br>
          -->
          <input type="hidden" name="fam_gen" id="id_fam">
      <div class="row">
      <div class="col-xs-4">
        <label  style="float:right;" > Género:</label>

      </div>
            <div class="col-xs-4">
              <input required type="text" style="width:200px;float: left; height: 30px;" name="gen_input" id="gen_input_mod" >
            </div>


      </div>
     <center>
        <div class="form-group">

          <div class="alert alert-danger" style="display: none;" id="msg-error-genero">
            <ul style="list-style-type:none" >

              <li style="float: left;"  id="_gen_input" >{{ $errors->first('gen_input') }}</li><br>
              <li style="float: left;"  id="_fam_gen"   >{{ $errors->first('fam_gen') }}</li><br>

            </ul>
          </div>

        </div>
        </center>





            </div>


            <div class="modal-footer">
              <button type="submit" class="btn btn-success" id="g_gen" style="background-color: #b0a54f ; border-color: #8e7200 ;" > Guardar </button>
            <button type="button" class="btn btn-success can_gen" data-dismiss="modal" style="background-color: #b0a54f ; border-color: #8e7200 ;" >Cancelar</button>
            </div>


            </form>
            <br>


        </div>

      </div>

    </div>
