   <!-- Modal MODAL DE EXTIO SUBESPECIE -->


  <div class="modal fade " id="Exito_Sub_Modal"   role="dialog">

      <div class="modal-dialog modal-md ">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title"> </h4>
          </div>
          <br>

            <form method="get" action="Informacion_Sub" id="frm-exito-sub" >
            <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
            <div class="modal-body">
             <input type="hidden" name="id_sub_esp" id="id_reporte_especie" value="{{ $esp1_array[ $i ]->idEspecie }}">
             <input type="hidden" name="id_sub" id="id_reporte_especie" value="{{ $esp1_array[ $i ]->idSubespecie }}">
             <input type="hidden" name="id_usuario" value="{{ $usuario[0]->idUsuario }}" >
            <br>
      <div class="row">

        <center>
          <p><h4>{{$msg_exito}}</h4></p>
        </center>

      </div>

            </div>
            <br>
            <div class="modal-footer">

              <button type="submit" class="btn btn-success" id="btn-exito" > ACEPTAR </button>

            </div>
            </form>
            <br>
        </div>

      </div>

    </div>

