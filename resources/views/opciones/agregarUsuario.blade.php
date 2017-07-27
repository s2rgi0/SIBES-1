<!DOCTYPE doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Agregar Usuario</title>
        <meta content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0" name="viewport">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link rel=stylesheet href="css/estilo_busqueda.css" type="text/css">
        <link rel="shortcut icon" type="image/ico" href="/imagen/favicon.ico" />
        <script src="sweetalert/dist/sweetalert.min.js"></script>
        <link rel="stylesheet" type="text/css" href="sweetalert/dist/sweetalert.css">

    </head>
    <body>

    
<header>
    <img src="imagen/cafe_1.jpg" alt="SIBES" class="img-responsive" >
</header>

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



<div class="contanier">
<center>
<div  style="width:700px;" >
<div class="row">
  <div class="col-xs-6 col-sm-12">
     <center><h3>Agregar Usuario</h3></center>
  </div>
</div>
<br>

  <form class="form-horizontal" method="post" action="agregar_usr_dos" id="frm-agr-usr" >
  <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
  <input type="hidden" name="id_usuario" value="{{ $usuario[0]->idUsuario }}" >

  <div class="form-group row ">
    <label for="textTipoU" class="col-lg-3  col-sm-6 control-label hidden-xs ">Tipo Usuario:</label>
    <div class=" col-xs-6  col-sm-6 col-lg-9">

     <select class="form-control" id="textTipoU" name="textTipoU">
     <option value="0" disabled="false" selected="true"><center>--Seleccionar--</center></option>
      @foreach( $tipo as $tip )
        <option value="{{$tip->idTipo}}" > {{$tip->tipoUsuario}} </option>
      @endforeach

      </select>
    </div><div class="" style="display: none;color:#ff3700;font-size:small;" id="_textTipoU" ><span class="help-block" ><strong style="color:  #990000 ;" >{{ $errors->  first('textTipoU') }} </strong></span></div>
  </div>

  <div class="form-group row">
    <label for="textCodU" class=" col-sm-6 col-lg-3 control-label hidden-xs ">Nombre:</label>
    <div class=" col-xs-6  col-sm-6 col-lg-9">
      <input type="text" class="form-control " id="textCodU" name="textCodU"  placeholder="Nombre Usuario">
    </div><div class="" style="display: none;color:#ff3700;font-size:small;" id="_textCodU" ><span class="help-block" ><strong style="color:  #990000 ;" >{{ $errors->  first('textCodU') }} </strong></span></div>
  </div>
  <div class="form-group">

    <label for="textNomdU" class=" col-sm-6 col-lg-3 control-label hidden-xs" >Usuario:</label>
    <div class=" col-xs-6 col-sm-6 col-lg-9">
      <input type="text" class="form-control" id="textNomdU" name="textNomdU"  placeholder=" Usuario">
    </div><div class="" style="display: none;color:#ff3700;font-size:small;" id="_textNomdU" ><span class="help-block" ><strong style="color:  #990000 ;" >{{ $errors->  first('textNomdU') }} </strong></span></div>
  </div>

  <div class="form-group">

    <label for="texContraU" class=" col-sm-6 col-lg-3 control-label hidden-xs" >Contraseña</label>
    <div class=" col-xs-6 col-lg-9">
      <input type="password" class="form-control" id="texContraU" name="texContraU"  placeholder="Contraseña">
    </div><div class="" style="display: none;color:#ff3700;font-size:small;" id="_texContraU" ><span class="help-block" ><strong style="color:  #990000 ;" >{{ $errors->  first('texContraU') }} </strong></span></div>



  </div>

  <div class="form-group">
    <div class=" col-xs-6 col-sm-12">
&nbsp;&nbsp;      <button type="submit" class="btn btn-default  btn btn-success "  id="btn_agr_usr"  style="width: 200px;background-color: : orange;"  >Agregar
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

  

$('#textTipoU').val('0');

$('#textCodU').val('');

$('#textNomdU').val('');

$('#texContraU').val('');

$('input:text').val('');

  
$('#frm-agr-usr')[0].reset();


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

    $("#frm-agr-usr button").click(function(ev){

      ev.preventDefault();


      if($(this).attr("id")=="btn_agr_usr"){
        //alert('VAMOS AQUI ')
        var form = document.querySelector('#frm-agr-usr');
        var formdata = new FormData(form);
        console.log(form)
        console.log(formdata)
        $.ajax({
          type : 'post',
          url  : '{!! URL::to('agregar_usr') !!}',
          data : formdata,
                contentType: false,
                processData: false,
                cache : false,
                success:function(data){
                  console.log(data.errors)

                  $('#_textTipoU').fadeOut();
                  $('#_textCodU').fadeOut();
                  $('#_textNomdU').fadeOut();
                  $('#_texContraU').fadeOut();
                  //$('#textTipoU').fadeOut();
                  if(data.success == false ){
                    $('#_textTipoU,#_textCodU,#_textNomdU,#_texContraU').text('');
                    //$('#avis-error').fadeIn();
                    $.each(data.errors , function(index,value){
                    $('#_'+index).fadeIn();
                    $('#_'+index).text(value);
                    });
                  }else{

                    swal("Usuario ingresado!", "", "success")
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
