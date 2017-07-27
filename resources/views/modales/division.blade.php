	<script type="text/javascript">
    function prueba(){
	document.getElementById('rei_input_mod').focus();
//document.getElementById("pao").focus();
        }


 </script>

<!-- Modal  DIVISION -->


	<div class="modal fade" id="DIV_Modal" role="dialog">

  		<div class="modal-dialog">

  	    <!-- Modal content-->
  	    <div class="modal-content">
  	      <div class="modal-header">
  	        <button type="button" class="close close_div" data-dismiss="modal">&times;</button>
  	        <h4 class="modal-title">Desea ingresar una nueva división?</h4>
  	      </div>
  	      <br>

  	      	<form method="post" action="ingr_div_modal" id="div_modal" name="fdivision" >
  	      	<input name="_token" type="hidden" value="{{ csrf_token() }}"/>
  	      	<div class="modal-body">

  	        	<div class="row">
  	        	<div class="col-xs-4">
  	        		<label >Reino: </label>
  	        	</div>
  	        	<div class="col-xs-4">
  	        			<select style="width:200px;height: 32px;" class="reino_modal" name="rei_mod" id="rm_id"  onchange="prueba();" >
						<option value="0" disabled="true" selected="true">  -- Reino --  </option>
						<option></option>
					</select>
  	        	</div>

  	      		</div>
  	      		<br>
				<div class="row">
				<div class="col-xs-4">
					<label>Division:</label>
				</div>
				<div class="col-xs-4">
					<input required type="text" style="width:200px;float: left; height: 30px;" name="rei_input_mod" id="rei_input_mod" >
				</div>

				</div>
				<br>
				<center>
				<div class="form-group">

					<div class="alert alert-danger" style="display: none;" id="msg-error">
						<ul style="list-style-type:none" >

							<li style="float: left;"  id="_rei_input_mod" >{{ $errors->first('rei_input_mod') }}</li><br>
							<li style="float: left;"  id="_rei_mod"   >{{ $errors->first('rei_mod') }}</li><br>

						</ul>
					</div>

				</div>
				</center>




  	      	</div>


  	      	<div class="modal-footer">
  	      		<button type="submit" class="btn btn-success" id="g_div" > Guardar </button>
 	        	<button type="button" class="btn btn-success can_div" data-dismiss="modal">Cancelar</button>
  	      	</div>


  	      	</form>
  	      	<br>


  	    </div>

  		</div>

  	</div>
