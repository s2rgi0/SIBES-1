<!-- Modal  Nueva Especie -->


  <div class="modal fade" id="N_ESP_Modal" role="dialog">

      <div class="modal-dialog modal-sm ">

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
                  <h4>¿Desea ingresar la especie?</h4>
                </center>

                <input type="hidden" name="esp_id"  value="" class="n_e_id" >

              </div>
              <br>

            </div>


            <div class="modal-footer">
              <center>

                <button type="submit" class="btn btn-success btn-lg n_e" id="g_n_esp" > Si </button>
              <button type="button" class="btn btn-success btn-lg cerrar_esp" data-dismiss="modal"> No </button>

              </center>

            </div>


            </form>
            <br>


        </div>

      </div>

</div>


    <!-- Modal  Nueva SUBESPECIE  -->
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
                <h4>¿Desea ingresar la Subespecie?</h4>
              </center>
            </div>
            <br>

            <input type="" name="sub_id"  value="" class="s_n_id" >
            </div>


            <div class="modal-footer">

              <center>

                <button type="submit" class="btn btn-success n_s  btn-lg " id="g_n_esp" > Si </button>
                <button type="button" class="btn btn-success cerrar_sub  btn-lg " data-dismiss="modal"> No </button>

              </center>

            </div>


            </form>
            <br>


        </div>

      </div>

</div>





<!--vemos informacion de especie-->

<div class="modal fade" id="MSG_esp" role="dialog" >
  <div class="modal-dialog modal-md ">
    <!-- Modal content-->
      <div class="modal-content" style=" vertical-align: middle;" >
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"></h4>
        </div>
          <form method="post" action="N_ESP_modal" id="N_ESP_modal" >
            <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
            <div class="modal-body">
              <div class="row">
              <center>
                  <h4>Debe ingresar una especie</h4>
                  </center>
              </div>
            </div>
            <div class="modal-footer">
              <center>
                <button type="button" class="btn btn-success btn-lg " data-dismiss="modal"> Aceptar </button>
              </center>
            </div>
          </form>
        </div>
  </div>
</div>


<!--vemos informacion de subespecie-->

<div class="modal fade" id="MSG_sub" role="dialog" >
  <div class="modal-dialog modal-md ">
    <!-- Modal content-->
      <div class="modal-content" style=" vertical-align: middle;" >
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"></h4>
        </div>
          <form method="post" action="N_ESP_modal" id="N_ESP_modal" >
            <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
            <div class="modal-body">
              <div class="row">
              <center>
                  <h4>Debe ingresar una especie</h4>
                  </center>
              </div>
            </div>
            <div class="modal-footer">
              <center>
                <button type="button" class="btn btn-success btn-lg " data-dismiss="modal"> Aceptar </button>
              </center>
            </div>
          </form>
        </div>
  </div>
</div>

