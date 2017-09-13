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



<div class="contanier">
<center>
<div  style="width:700px;" >
<div class="row">
  <div class="col-xs-6 col-sm-12">
     <center><h3>Agregar Colector</h3></center>
  </div>
</div>
<br>

  <form class="form-horizontal" method="post" action="Guardar_Colector_dos" id="frm-colector_agr" >
  <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
  <input type="hidden" name="id_usuario" value="{{ $usuario[0]->idUsuario }}" >


  <div class="form-group row">
    <label for="textCodU" class=" col-sm-6 col-lg-3 control-label hidden-xs ">Nombre:</label>
    <div class=" col-xs-6  col-sm-6 col-lg-9">
      <input type="text" class="form-control " id="nombre_Colector" name="nombre_Colector"  placeholder="Nombre Colector">
    </div><div class="" style="display: none;color:#ff3700;font-size:small;" id="_nombre_Colector" ><span class="help-block" ><strong style="color:  #990000 ;" >{{ $errors->  first('nombre_Colector') }} </strong></span></div>
  </div>

  <div class="form-group">

    <label for="textNomdU" class=" col-sm-6 col-lg-3 control-label hidden-xs" >Descripcion:</label>
    <div class=" col-xs-6 col-sm-6 col-lg-9">
      <textarea class="form-control" id="descri_Colector" rows="2" name="descri_Colector" placeholder="breve descripcion del colector" ></textarea>
    </div><div class="" style="display: none;color:#ff3700;font-size:small;" id="_descri_Colector" ><span class="help-block" ><strong style="color:  #990000 ;" >{{ $errors->  first('descri_Colector') }} </strong></span></div>

  </div>


  <div class="form-group">
    <div class=" col-xs-6 col-sm-12">
&nbsp;&nbsp;
    <button type="submit" class="btn btn-default  btn btn-default "  id="btn_agr_usr"  style="width: 200px;"  >Agregar
      </button>

    </div>
  </div>

</form>
</div>
</center>
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

      $('#id_colectoX').click(function(){

        //alert('iremos al comienzo')
        $('#frm-colector-tabla').submit();

      });

    $("#frm-colector_agr button").click(function(ev){

      ev.preventDefault();


      if($(this).attr("id")=="btn_agr_usr"){
        //alert('VAMOS AQUI ')
        var form = document.querySelector('#frm-colector_agr');
        var formdata = new FormData(form);
        console.log(form)
        console.log(formdata)
        $.ajax({
          type : 'post',
          url  : '{!! URL::to('Guardar_Colector') !!}',
          data : formdata,
                contentType: false,
                processData: false,
                cache : false,
                success:function(data){
                  console.log(data.errors)

                  $('#_descri_Colector').fadeOut();
                  $('#_nombre_Colector').fadeOut();

                  if(data.success == false ){
                    $('#_nombre_Colector,#_descri_Colector').text('');
                    //$('#avis-error').fadeIn();
                    $.each(data.errors , function(index,value){
                    $('#_'+index).fadeIn();
                    $('#_'+index).text(value);
                    });
                  }else{

                    swal("Colector ingresado!", "", "success")
                     //delay(200)
                    form.submit();

                  }


                },
                error:function(){

                }
        })

      }


    });



});





</script>



</body>









</html>
