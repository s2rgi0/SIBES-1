<!DOCTYPE doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>MARN | SIBES</title>
        <meta content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0" name="viewport">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link rel=stylesheet href="css/estilo_busqueda.css" type="text/css">
        <link rel="shortcut icon" type="image/ico" href="/imagen/favicon.ico" />
        <script src="sweetalert/dist/sweetalert.min.js"></script>
        <link rel="stylesheet" type="text/css" href="sweetalert/dist/sweetalert.css">

    </head>
    <style>
    nav{
    box-shadow: 0 7px 10px 0 rgba(0, 0, 0, 0.2);
    }
    body{
    background-image: url("/imagen/patron2.png");
    }
    </style>
    <body>



    <nav>
          @include('parciales.menu')
    </nav>
    <br>

<form id="frm-agregar-esp" method="get" action="agregar_especie" >
  <input type="hidden" name="id_usuario" value="{{ $usuario[0]->idUsuario }}" >
</form>
<form id="frm-consultar-esp" method="get" action="consultar_especie" >
  <input type="hidden" name="id_usuario" value="{{ $usuario[0]->idUsuario }}" >
</form>
<form id="frm-inicio-esp" method="get" action="incio_sibes" >
  <input type="hidden" name="id_usuario" value="{{ $usuario[0]->idUsuario }}" >
</form>
<form id="frm-agregar-usr" method="get" action="Agregar_usuarios" >
  <input type="hidden" name="id_usuario" value="{{ $usuario[0]->idUsuario }}" >
</form>
<form id="frm-estado-usr" method="get" action="estado_usuario" >
  <input type="hidden" name="id_usuario" value="{{ $usuario[0]->idUsuario }}" >
</form>
<form id="frm-colector" method="get" action="Agregar_Colector" >
  <input type="hidden" name="id_usuario" value="{{ $usuario[0]->idUsuario }}" >
</form>
<form id="frm-colector-tabla" method="get" action="Tabla_Colectores" >
  <input type="hidden" name="id_usuario" value="{{ $usuario[0]->idUsuario }}" >
</form>



<div class="container">
<center>
<div  style="width:700px;" >
<div class="row">
  <div class="col-xs-6 col-sm-12">
     <center><h3>Lista de Colectores</h3></center>
  </div>
</div>
<br>
  <table class="table table-striped table-bordered" width="100%" cellspacing="0" style="background-color: white;" >
    <thead>
    <td>Nombre</td>
    <td>Descripcion</td>
    </thead>
    <tbody>

    @foreach( $colector as $col )
      <tr>
        <td>{{ $col->nombreColector }}</td>
        <td><button class="btn btn-default btn-desc" value="{{ $col->idColector }}" id="btn-desc" > Descripción </button></td>
      </tr>

    @endforeach

    </tbody>
  </table>



</div>
</center>
</div>


<!--MODAL CUANDO especie tiene estado == 1 -->

<div class="modal fade" id="colector_desc" role="dialog" >
  <div class="modal-dialog modal-md ">
    <!-- Modal content-->
      <div class="modal-content" style=" vertical-align: middle;" >
        <div class="modal-header">
          <button type="button" class="close cerrar_continuar btn-cerrar" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"></h4>
        </div>
            <div class="modal-body-desc">
              <div class="row">

                  <div style="padding-left: 40px;">
                    <label for="GeoTextarea"  style="padding-top: 10px;">
                      Descripcion del colector:
                    </label> <a id="nom_col" style="color: #8e7200;" > </a>
                    <div style=" border-radius: 3px;border: 1px solid #cccccc ; padding: 7px;background-color: white;width: 90%;">
                      <p id="desc_col" ></p>
                    </div>
                    <br>
                  </div>

              </div>
            </div>
            <div class="modal-footer">
              <center>
              <input type="hidden" name="id_usuario" value="" >
                <input type="hidden" name="id_sub" id="subespecie_id2" value="" >

                <button type="submit" class="btn btn-success btn-lg btn-cerrar" id="btn-cerrar" style="background-color: #b0a54f ; border-color: #8e7200 ;"> Cerrar </button>
              </center>
            </div>
        </div>
  </div>
</div>


<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script type="text/javascript">

$(document).ready(function(){



$('#descri_Colector').val('');

$('#nombre_Colector').val('');

$('#frm-colector')[0].reset();


      $('#id_agregar_esp').click(function(){

        //alert('agregar especie')
        $('#frm-agregar-esp').submit();

      });


      $('#id_consultar_esp').click(function(){

        //alert('consultar_especie especie')
        $('#frm-consultar-esp').submit();

      });


      $('#id_inicio_sibes').click(function(){

        //alert('iremos al comienzo')
        $('#frm-inicio-esp').submit();

      });

      $('#id_agregar_usr').click(function(){

        //alert('iremos agregar usuario')
        $('#frm-agregar-usr').submit();

      });

      $('#id_estado_usr').click(function(){

        //alert('iremos estado usuario')
        $('#frm-estado-usr').submit();

      });

      $('#id_colector').click(function(){

        //alert('iremos al comienzo')
        $('#frm-colector').submit();

      });

      $('#id_colector').click(function(){

        //alert('iremos al comienzo')
        $('#frm-colector').submit();

      });

      $('#id_colectoX').click(function(){

        //alert('iremos al comienzo')
        $('#frm-colector-tabla').submit();

      });



    $(document).on('click','.btn-desc',function(e){

            var id = $(this).val();

            var div = $('#desc_col').parent().parent();
            //alert(div)
            //desc_Colector
             $.ajax({
                        type : 'get',
                        url  : '{!! URL::to('desc_Colector') !!}',
                        data :  { 'id':id },
                        success:function(data){
                            console.log('success pdf info')
                            console.log(data)
                            //desc_col
                            //alert(data[0].descripColector);

                            div.find('#nom_col').text(data[0].nombreColector)
                            div.find('#desc_col').text(data[0].descripColector)


                        },
                        error:function(){
                            console.log('error con fuente info ')
                                                 }
                    })


            $('#colector_desc').modal('show');

            console.log(id)

      })

    $('.btn-cerrar').click(function(){

      $('#colector_desc').modal('hide');
      $('#nom_col').text('');
      $('#desc_col').text('');

    });





});





</script>



</body>









</html>
