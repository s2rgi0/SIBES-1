<!-- Modal  Nueva Especie El metodo agarra_esp se encuentra en la 
clase ModalesController app->Http->Controllers->ModalesControlller -->


  <div class="modal fade" id="N_ESP_Modal" role="dialog">

      <div class="modal-dialog modal-md ">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title"></h4>
          </div>
          <br>

            <form method="GET" action="agarra_esp" id="N_ESP_modal" name="fdivision" >
            <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
            <div class="modal-body">
            

              <div class="row">
                <center>
                  <h4>¿Desea ingresar la especie <a id="esp_agr" style="color:#8e7200;">  </a>, al catalogo?</h4>
                </center>
                <input type="hidden" name="id_usuario" value="{{ $usuario[0]->idUsuario }}" >
                <input type="hidden" name="esp_id"  value="" class="n_e_id" >

              </div>
              <br>

            </div>


            <div class="modal-footer">
              <center>

              <button type="submit" class="btn btn-success btn-lg n_e" id="g_n_esp" style="background-color: #b0a54f ; border-color: #8e7200 ;" > Si </button>
              <button type="button" class="btn btn-success btn-lg cerrar_esp" data-dismiss="modal" style="background-color: #b0a54f ; border-color: #8e7200 ;" > No </button>

              </center>

            </div>


            </form>
            <br>


        </div>

      </div>

</div>

<!-- Modal  Nueva SUBESPECIE los metodos de estas acciones estan en Modales Controller -->

<div class="modal fade" id="N_SUB_Modal" role="dialog">
  <div class="modal-dialog  modal-md ">
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title"></h4>
          </div>
          <br>
            <form method="GET" action="agarra_sub" id="N_SUB_modal" >
            <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
            <div class="modal-body">

            <div class="row">
              <center>
                <h4>¿Desea ingresar la Subespecie <a id="sub_agr" style="color:#8e7200;">  </a>, al catalogo?</h4>
              </center>
            </div>
            <br>
            <input type="hidden" name="sub_id"  value="" class="s_n_id" >
            <input type="hidden" name="id_usuario" value="{{ $usuario[0]->idUsuario }}" >
            </div>
            <div class="modal-footer">
              <center>
                <button type="submit" class="btn btn-success n_s  btn-lg " id="g_n_esp" style="background-color: #b0a54f ; border-color: #8e7200 ;" > Si </button>
                <button type="button" class="btn btn-success cerrar_sub  btn-lg " data-dismiss="modal" style="background-color: #b0a54f ; border-color: #8e7200 ;" > No </button>
              </center>
            </div>
            </form>
            <br>
        </div>
      </div>
</div>


<!--MODAL CUANDO especie tiene estado == 1 -->

<div class="modal fade" id="MSG_continuar_sub" role="dialog" >
  <div class="modal-dialog modal-md ">
    <!-- Modal content-->
      <div class="modal-content" style=" vertical-align: middle;" >
        <div class="modal-header">
          <button type="button" class="close cerrar_continuar" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"></h4>
        </div>
        <form action="Informacion_Sub" method="GET" id="busqueda3-frm" >           
            <div class="modal-body">
              <div class="row">
              <center>
                  <h4>La subespecie ya existe, desea ver su informacion ? </h4>
              </center>
              </div>
            </div>
            <div class="modal-footer">
              <center>
              <input type="hidden" name="id_usuario" value="{{ $usuario[0]->idUsuario }}" >
                <input type="hidden" name="id_sub" id="subespecie_id2" value="" >  

                <button type="submit" class="btn btn-success btn-lg" id="btn-continuar" style="background-color: #b0a54f ; border-color: #8e7200 ;"> Continuar </button>
                <label class="btn btn-success btn-lg" id="btn-erase-sub" style="background-color: #b0a54f ; border-color: #8e7200 ;">Cancelar </label>              
              </center>
            </div>
          </form>
        </div>
  </div>
</div>

<div class="modal fade" id="MSG_continuar_esp" role="dialog" >
  <div class="modal-dialog modal-md ">
    <!-- Modal content-->
      <div class="modal-content" style=" vertical-align: middle;" >
        <div class="modal-header">
          <button type="button" class="close cerrar_continuar" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"></h4>
        </div>
        <form action="Informacion" method="GET" id="busqueda2-frm" >     
            
            <div class="modal-body">
              <div class="row">
              <center>
                  <h4>La especie ya existe, desea ver su informacion ? </h4>
              </center>
              </div>
            </div>
            <div class="modal-footer">
              <center>
              <input type="hidden" name="id_usuario" value="{{ $usuario[0]->idUsuario }}" >
                <input type="hidden" name="id_sub" id="subespecie_id23" value="" >
                <input type="hidden" name="id_esp" id="especie_id23" value="" >
                <button type="submit" class="btn btn-success btn-lg" id="btn-continuar" style="background-color: #b0a54f ; border-color: #8e7200 ;" > Continuar </button>             
                <label class="btn btn-success btn-lg" id="btn-erase-esp" style="background-color: #b0a54f ; border-color: #8e7200 ;" >Cancelar </label>        
              </center>
            </div>
          </form>
        </div>
  </div>
</div>
