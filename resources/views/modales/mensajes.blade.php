  <!-- Modal MODAL DE EXTIO -->


  <div class="modal fade " id="Exito_Modal"   role="dialog">

      <div class="modal-dialog modal-md ">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title"> </h4>
          </div>
          <br>

            <form method="get" action="Informacion" id="frm-exito" >
            <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
            <div class="modal-body">
             <input type="hidden" name="id_esp" id="id_reporte_especie" value="{{ $esp1_array[ $i ]->idEspecie }}">
             <input type="hidden" name="id_usuario" value="{{ $usuario[0]->idUsuario }}" >
            <br>
      <div class="row">

        <center>
          <p><h4>{{ $msg_exito }}</h4></p>
        </center>

      </div>

            </div>
            <br>
            <div class="modal-footer">

              <center>
              <button type="submit" class="btn btn-success" id="btn-exito" > Aceptar </button>
              </center>

            </div>
            </form>
            <br>
        </div>

      </div>

    </div>


  

  <!-- Modal MODAL DE FALLA AL AGUARDAR -->


  <div class="modal fade " id="Error_Modal"   role="dialog">

      <div class="modal-dialog modal-md ">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close cerrar_comun" data-dismiss="modal">&times;</button>
            <h4 class="modal-title"> </h4>
          </div>
          <br>

            <form  id="frm-error" >
            <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
            <div class="modal-body">
             <input  type="hidden" name="id_esp" id="id_esp" value="{{ $esp1_array[ $i ]->idEspecie }}">

            <br>
      <div class="row">

        <center>
          <p><h4> Nose pudo guardar en el sistema </h4></p>
        </center>

      </div>

            </div>
            <br>
            <div class="modal-footer">

              <center><button type="submit" class="btn btn-success" id="btn-error" > Aceptar </button></center>

            </div>
            </form>
            <br>
        </div>

      </div>

    </div>
