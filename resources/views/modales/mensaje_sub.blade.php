   <!-- Modal MODAL DE EXTIO SUBESPECIE -->


  <div class="modal fade " id="Exito_Sub_Modal"   role="dialog">

      <div class="modal-dialog modal-md ">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title"> </h4>
          </div>
            <form method="get" action="Informacion_Sub" id="frm-exito-sub" >
            <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
            <div class="modal-body">
             <input type="hidden" name="id_sub_esp" id="id_reporte_especie" value="{{ $esp1_array[ $i ]->idEspecie }}">
             <input type="hidden" name="id_sub" id="id_reporte_especie" value="{{ $esp1_array[ $i ]->idSubespecie }}">
             <input type="hidden" name="id_usuario" value="{{ $usuario[0]->idUsuario }}" >

      <div class="row">

        <div style="padding: 20px;" >
          <center>
            <p><h4>{{$msg_exito}}{{ $esp1_array[ $i ]->nombreSubespecie }},{{$msg_exito2}}.</h4></p>
          </center>
        </div>


      </div>
      </div>
            <div class="modal-footer" style="border-color: #8e7200;" >

              <button type="submit" class="btn btn-success" id="btn-exito" style="background-color: #b0a54f ; border-color: #8e7200 ;" > ACEPTAR </button>

            </div>
            </form>
            <br>
        </div>

      </div>

    </div>
