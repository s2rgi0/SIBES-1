<!DOCTYPE html>
<html>
<head>
    <title>MARN | SIBES</title>
    <meta content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0" name="viewport">
            <link rel=stylesheet href="css/estilo_menu.css" type="text/css">

            <link rel=stylesheet href="css/estilo_mostrar.css" type="text/css">
            <link href="https://fonts.googleapis.com/css?family=Advent+Pro|Baloo|Raleway" " rel="stylesheet">
            <link rel="shortcut icon" type="image/ico" href="/imagen/favicon.ico" />
            <link rel="stylesheet" type="text/css" href="css/side_bar_nav.css">
            <script src="sweetalert/dist/sweetalert.min.js"></script>
            <link rel="stylesheet" type="text/css" href="sweetalert/dist/sweetalert.css">

    <style type="text/css">

    .carousel{
        box-shadow: 0 7px 10px 0 rgba(0, 0, 0, 0.3);
    }

    @media screen and (min-width: 1000px) {

        .cuerpo{
        height:600px;
        }
    }


    </style>
<style>
        body{
        background-image: url("/imagen/patron2.png");
        }
</style>


</head>
<body>

    <header>
         @include('parciales.nav')
    </header>

    <article>

    <div class="row">

    <div class="col-md-4" >

       @include('publico.menu.menu_side_bar')
       @include('publico.menu.menu_forms')

    </div>
    <div class="col-md-6" >

    <br><br>
        <center>
        <h2 style="font-family: 'Baloo', cursive; color: #aa913f;" >Ingresar Busqueda</h2>



    <br><br>
    <form action="Consulta_Publica" method="get" id="frm-consulta" >

        <div class="input-group">
        <input class="form-control" type="text" style="height: 46px;" id="consulta" name="consulta" placeholder="¿Que estas buscando?" >
        <br>

            <span class="input-group-btn"  >
                <button class="btn btn-default btn-lg" type="button" id="btn_consulta">
                    <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                </button>
            </span>
        </div><!-- /input-group -->
    </form>
    <div class="row" >
        <center>
            
            <h5 id="msg-consulta" style="color:#ff3700" ></h5>

        </center>
    </div>

    <br>
    <center>

        <br>
        <br>
        <img src="imagen/hoja.png" alt="SIBES" class="img-responsive" width="15%" >


    </center>


        </center>

    </div>
    </div>


    </article>



<script src="js/jquery-3.2.1.min.js"> </script>
<script src="js/bootstrap.min.js"> </script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
@include('publico.menu.script_menu')
<script type="text/javascript">
    
    $(document).ready(function(){

        $('#consulta').val('');
        $('#msg-consulta').text('')
        //alert('when the shit goes down')
        //swal("ey","","success")


        $("#frm-consulta button").click(function(ev){

            ev.preventDefault();
            $('#msg-consulta').fadeOut();

            var consul = $('#consulta').val();

            if($('#consulta').val()){

                $.ajax({
                        type : 'get',
                        url  : '{!! URL::to('Consulta_Publica_dos') !!}',
                        data : { 'consulta' : consul },
                        success:function(data){
                            console.log('success pdf info')
                            console.log(data)
                            console.log(data.length)                            
                            if( data.length > 0 ){

                                $('#frm-consulta').submit();
                            }else{

                                $('#msg-consulta').fadeIn();
                                $('#msg-consulta').text('La especie no se encontro en el registro de El Salvador')
                            }

                        },
                        error:function(){
                            console.log('error con fuente info ')
                           
                        }
                    })

            }else{

                //swal("no tiene nada","","success");

            }

            





        })




    });

</script>


</body>
</html>
