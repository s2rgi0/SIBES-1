  <!-- Modal MODAL DE EXTIO -->


  <div class="modal fade " id="Exito_Modal"   role="dialog">

      <div class="modal-dialog modal-md ">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title"> </h4>
          </div>
            <form method="get" action="Informacion" id="frm-exito" >
            <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
            <div class="modal-body">
             <input type="hidden" name="id_esp" id="id_reporte_especie" value="{{ $esp1_array[ $i ]->idEspecie }}">
             <input type="hidden" name="id_usuario" value="{{ $usuario[0]->idUsuario }}" >
            <br>
      <div class="row">

        <div style="padding: 20px;" >
          <center>
            <p><h4>{{$msg_exito}}{{ $esp1_array[ $i ]->nombreEspecie }},{{$msg_exito2}}.</h4></p>
          </center>
        </div>

      </div>

            </div>
            <br>
            <div class="modal-footer"  style="border-color: #8e7200;"  >

              <center>
              <button type="submit" class="btn btn-success" id="btn-exito" style="background-color: #b0a54f ; border-color: #8e7200 ;" > Aceptar </button>
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
          <p><h4> No se puede agregar la especie al catálogo de El Salvador </h4></p>
        </center>

      </div>

            </div>
            <br>
            <div class="modal-footer">

              <center><button type="submit" class="btn btn-success" id="btn-error" style="background-color: #b0a54f ; border-color: #8e7200 ;" > Aceptar </button></center>

            </div>
            </form>
            <br>
        </div>

      </div>

    </div>
