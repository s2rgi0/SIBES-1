<script type="text/javascript">

    $(document).ready(function(){


        ////ESTA FUNCION LLENA TODOS LOS SELECTS


        $('#agr_avista').click(function(){

            agr_avista();

        })


        function agr_avista(){

            //alert('agrregamos avistamiento')
            var r_z = "";
            var zona = $('#id_departamento').parent().parent();
            $('#pub_PDF').empty();
            $('#publish').empty();
            $('#pub_PDF').attr('disabled',true);
            document.getElementById("id_fecha_ingr").readOnly = true; 

            $.ajax({

                type : 'get',
                url  :  '{!! URL::to('Departamentos') !!}',
                //data : {},
                success:function(data){

                    console.log('si se pudo')
                    console.log(data)

                    r_z += '<option value="0" disabled="true" selected="true"> -- Departamento -- </option>';
                    for(var i = 0 ; i < data.length ; i++ )
                    {
                        r_z+='<option value="'+data[i].codigoDepartamento+'">'+data[i].nombreDepartamento+'</option>';
                    }
                    zona.find('#id_departamento').html(" ");
                    zona.find('#id_departamento').append(r_z);

                    //$('#Avista_Modal').modal('show')


                },error:function(){

                    console.log('no se pudo')
                    agr_avista();

                }

            })


            var f_i = "";
            var fuente = $('#idFInfo').parent().parent();
            $.ajax({
                type : 'get',
                url  :  '{!! URL::to('FuenteInfo') !!}',
                //data : {},
                success:function(data){
                    console.log('si se pudo')
                    console.log(data)
                    f_i += '<option value="0" disabled="true" selected="true"> -- Fuente de Información -- </option>';
                    for(var i = 0 ; i < data.length ; i++ )
                    {
                        f_i+='<option value="'+data[i].idFuente+'">'+data[i].nombreFuente+'</option>';
                    }
                    fuente.find('#idFInfo').html(" ");
                    fuente.find('#idFInfo').append(f_i);
                    //$('#Avista_Modal').modal('show')
                },error:function(){
                    console.log('no se pudo')
                    agr_avista();
                }
            })

            var suelo = $('#id_suelo').parent().parent();
            var a_s = "";

            $.ajax({

                type : 'get',
                url  :  '{!! URL::to('Suelos') !!}',
                //data : {},
                success:function(data){

                    console.log('si se pudo')
                    console.log(data)

                    a_s += '<option value="0" disabled="true" selected="true"> -- Suelo -- </option>';
                    for(var i = 0 ; i < data.length ; i++ )
                    {
                        a_s+='<option value="'+data[i].idSuelo+'">'+data[i].nombreSuelo+'</option>';
                    }
                    suelo.find('#id_suelo').html(" ");
                    suelo.find('#id_suelo').append(a_s);

                    //$('#Avista_Modal').modal('show')


                },error:function(){

                    console.log('no se pudo')
                    agr_avista();

                }

            })


            var tierra = $('#id_tierra').parent().parent();
            var a_c = "";

            $.ajax({

                type : 'get',
                url  :  '{!! URL::to('ClasedeTierra') !!}',
                //data : {},
                success:function(data){

                    console.log('si se pudo')
                    console.log(data)

                    a_c += '<option value="0" disabled="true" selected="true"> -- Clase de Tierra -- </option>';
                    for(var i = 0 ; i < data.length ; i++ )
                    {
                        a_c+='<option value="'+data[i].idClaseDeTierra+'">'+data[i].nombreClaseDeTierra+'</option>';
                    }
                    tierra.find('#id_tierra').html(" ");
                    tierra.find('#id_tierra').append(a_c);

                    //$('#Avista_Modal').modal('show')


                },error:function(){

                    console.log('no se pudo')
                    agr_avista();

                }

            })


            var colector = $('#id_colectore').parent().parent();
            var a_co = "";

            $.ajax({

                type : 'get',
                url  :  '{!! URL::to('Colectores') !!}',
                //data : {},
                success:function(data){

                    console.log('si se pudo colector')
                    console.log(data)

                    a_co += '<option value="0" disabled="true" selected="true"> -- Colector -- </option>';
                    for(var i = 0 ; i < data.length ; i++ )
                    {
                        
                        a_co+='<option value="'+data[i].idColector+'">'+data[i].nombreColector+'</option>';
                    }
                    colector.find('#id_colectore').html(" ");
                    colector.find('#id_colectore').append(a_co);

                    


                },error:function(){

                    console.log('no se pudo')
                    agr_avista();

                }

            })

            $('#Avista_Modal').modal('show')

        }

        ////////HACER SELECCION DE DEPARTAMENTOS////////////////////////---------------------+


        $(document).on('change','#id_zona',function(){

            var depa = $('#id_departamento').parent().parent();
            var d_a = "";
            var d_a2 = "";
            var d_a3 = "";



            var id_zona = $('#id_zona').val();

            $.ajax({
                type : 'get',
                url  : '{!! URL::to('get_departamento') !!}',
                data : { 'id' : id_zona },
                success:function(data){
                    console.log(data);


                    d_a += '<option value="0" disabled="true" selected="true"> -- Departamento -- </option>';
                    d_a2 += '<option value="0" disabled="true" selected="true"> -- Municipio -- </option>';
                    d_a3 += '<option value="0" disabled="true" selected="true"> -- Canton -- </option>';



                    for(var i = 0 ; i < data.length ; i++ )
                    {
                        d_a+='<option value="'+data[i].codigoDepartamento+'">'+data[i].nombreDepartamento+'</option>';
                    }
                    depa.find('#id_departamento').html(" ");
                    depa.find('#id_departamento').append(d_a);

                    depa.find('#id_municipio').html(" ");
                    depa.find('#id_municipio').append(d_a2);

                    depa.find('#id_canton').html(" ");
                    depa.find('#id_canton').append(d_a3);



                },
                error:function(data){
                    console.log('aqui no se peude')
                }
            })
        });

        ///////////////////HACER SELECCION DE MUNICIPIOS///////////////////////---------------------------------+

        $(document).on('change','#id_departamento',function(){

            var muni = $('#id_municipio').parent().parent();
            var d_a = "";
            var d_a2 = "";
            var id_departamento = $('#id_departamento').val();
            console.log(id_departamento)
            $.ajax({
                type : 'get',
                url  : '{!! URL::to('get_municipio') !!}',
                data : { 'id' : id_departamento },
                success:function(data){
                    console.log(data);
                     d_a += '<option value="0" disabled="true" selected="true"> -- Municipio -- </option>';
                     d_a2 += '<option value="0" disabled="true" selected="true"> -- Canton -- </option>';

                    for(var i = 0 ; i < data.length ; i++ )
                    {
                        d_a+='<option value="'+data[i].codigoMunicipio+'">'+data[i].nombreMunicipio+'</option>';
                    }
                    muni.find('#id_municipio').html(" ");
                    muni.find('#id_municipio').append(d_a);

                    muni.find('#id_canton').html(" ");
                    muni.find('#id_canton').append(d_a2);
                },
                error:function(data){
                    console.log('aqui no se peude')
                }
            })
        });


        $(document).on('change','#id_departamento2',function(){

            var muni = $('#id_municipio2').parent().parent();
            var d_a = "";
            var d_a2 = "";
            var id_departamento = $('#id_departamento2').val();
            $.ajax({
                type : 'get',
                url  : '{!! URL::to('get_municipio') !!}',
                data : { 'id' : id_departamento },
                success:function(data){
                    console.log(data);
                     d_a += '<option value="0" disabled="true" selected="true"> -- Municipio -- </option>';
                     d_a2 += '<option value="0" disabled="true" selected="true"> -- Canton -- </option>';
                    for(var i = 0 ; i < data.length ; i++ )
                    {
                        d_a+='<option value="'+data[i].codigoMunicipio+'">'+data[i].nombreMunicipio+'</option>';
                    }
                    muni.find('#id_municipio2').html(" ");
                    muni.find('#id_municipio2').append(d_a);

                    muni.find('#id_canton2').html(" ");
                    muni.find('#id_canton2').append(d_a2);
                },
                error:function(data){
                    console.log('aqui no se peude')
                }
            })
        });


        //////////HACER SELECCION DE CANTONES////////////////////////---------------------------------+

        $(document).on('change','#id_municipio',function(){

            var muni = $('#id_canton').parent().parent();
            var d_a = "";
            var id_departamento = $('#id_municipio').val();
            $.ajax({
                type : 'get',
                url  : '{!! URL::to('get_canton') !!}',
                data : { 'id' : id_departamento },
                success:function(data){
                    console.log(data);
                     d_a += '<option value="0" disabled="true" selected="true"> -- Canton -- </option>';
                    for(var i = 0 ; i < data.length ; i++ )
                    {
                        d_a+='<option value="'+data[i].codigoCanton+'">'+data[i].nombreCanton+'</option>';
                    }
                    muni.find('#id_canton').html(" ");
                    muni.find('#id_canton').append(d_a);
                },
                error:function(data){
                    console.log('aqui no se peude')
                }
            })
        });

        $(document).on('change','#id_municipio2',function(){

            var muni = $('#id_canton2').parent().parent();
            var d_a = "";
            var id_departamento = $('#id_municipio2').val();
            $.ajax({
                type : 'get',
                url  : '{!! URL::to('get_canton') !!}',
                data : { 'id' : id_departamento },
                success:function(data){
                    console.log(data);
                     d_a += '<option value="0" disabled="true" selected="true"> -- Canton -- </option>';
                    for(var i = 0 ; i < data.length ; i++ )
                    {
                        d_a+='<option value="'+data[i].codigoCanton+'">'+data[i].nombreCanton+'</option>';
                    }
                    muni.find('#id_canton2').html(" ");
                    muni.find('#id_canton2').append(d_a);
                },
                error:function(data){
                    console.log('aqui no se peude')
                }
            })
        });

        /////////------------------------------------------------------------///////////
        /////////BOTON QUE GUARDA EN FORMULARIO Y MUESTRA//EN GRID RESULTADOS///////////
        /////////------------------------------------------------------------///////////


        $('#frm-avista button').click(function(e){

            e.preventDefault();
            var id = $('#id_esp').val();
            var row = $('.row_avista').parent().parent();
            var date = $('#fecha_avis').val();
            var i_e = "";

            if($(this).attr("id")=="guardar_link"){

                //alert('enlaces especie')
                console.log('aquivamos enalcaxaeass')
                var input = $('#id_PubPDF').val();
                console.log(input);
                var id = $('#id_esp').val();
                console.log(id);

                if( $('#id_PubPDF').val() ){

                    //alert('si tiene algo')
                    
                    var link  = $('#id_PubPDF').val();
                    var div = $('#link_esp');
                    var esc = $('#escondido');
                    
                    div.find('#pub_PDF').append(link);
                    //div.find('#pub_PDF_2').val(link);
                    esc.find('#publish').append(link);

                    $("#id_PubPDF").val("");
                    
                    var espacio = '\n';
                    
                    div.find('#pub_PDF').append(espacio);
                    //div.find('#pub_PDF2').append(espacio);
                    esc.find('#publish').append(espacio);

                }else{
                    
                    //alert('no tiene algo')

                }

            }

            if($(this).attr("id")=="guardar_avista"){
                    //alert("on Button 1");
                    var form = document.querySelector('#frm-avista');
                    var formdata = new FormData(form);
                    console.log(form)
                    console.log(formdata)

            $('#_col_avis').fadeOut();
            $('#_zona_avis').fadeOut();
            $('#_mun_avis').fadeOut();
            $('#_depar_avis').fadeOut();
            $('#_canton_avis').fadeOut();
            $('#_tierra_avis').fadeOut();
            $('#_suelo_avis').fadeOut();
            $('#_lati_avis').fadeOut();
            $('#_long_avis').fadeOut();
            $('#_lati_min').fadeOut();
            $('#_long_min').fadeOut();
            $('#_lati_sec').fadeOut();
            $('#_long_sec').fadeOut();
            $('#_foto_graf').fadeOut();
            $('#_PDF-file').fadeOut();
            $('#_alt_avis').fadeOut();
            $('#_fecha_av').fadeOut();
            $('#_clima_avis').fadeOut();
            $('#_eco_avis').fadeOut();
            $('#_clima_avis').fadeOut();
            $('#_fisio_Avis').fadeOut();
            $('#_geo_avis').fadeOut();
            $('#_hidro_avis').fadeOut();
            $('#_fuente_avis').fadeOut();
            $('#_num_avis').fadeOut();

            var ult_avis = 0;

                    $.ajax({
                        type : 'post',
                        url  : '{!! URL::to('SAVE_avista') !!}',
                        data : formdata,
                        contentType: false,
                        processData: false,
                        cache : false,
                        success:function(data){

                            console.log('se pudo ingresar')
                            //$("#Exito_Modal").modal('show')
                            console.log(id);
                            console.log(data.errors)

                            if(data.success == false ){
                                swal("Faltan campos por completar!", "Verifique todos los campos", "warning")


                                if(data.errors == 'no es una imagen'){
                                    //alert('no es una imagen')
                                   sweetAlert("Ingrese una imagen", "jpg,bmp o gif!", "error");   
                                }

                                $('#_fuente_avis,#_num_avis,#_foto_graf,#_zona_avis,#_PDF-file,#_lati_avis,#_long_avis,#_lati_min,#_long_min,#_long_sec,#_lati_sec,#_col_avis,#_tierra_avis,#_suelo_avis,#_depar_avis,#_mun_avis,#_canton_avis,#_alt_avis,#_fecha_av,#_clima_avis,#_eco_avis,#_geo_avis,#_clima_avis,#_hidro_avis,#_fisio_Avis').text('');
                                //$('#avis-error').fadeIn();
                                $.each(data.errors , function(index,value){
                                $('#_'+index).fadeIn();
                                $('#_'+index).text(value);
                                });

                            }else{


                                swal({
                                    title: "Información ingresada correctamente!",
                                    text: "¿Desea agregar un documento PDF al avistamiento?",
                                    type: "success",
                                    showCancelButton: true,
                                    confirmButtonColor: "#54a049",
                                    confirmButtonText: "Documento PDF",
                                    cancelButtonText: "No gracias",
                                    closeOnConfirm: true,
                                    closeOnCancel: true
                                    },
                                function(isConfirm){
                                if (isConfirm) {
                                    $('#PDF_avis').modal('show');
                                } 
                                });



                                $.ajax({
                                type : 'get',
                                url  : '{!! URL::to('get_avista') !!}',
                                data : { 'id' : id },
                                success:function(data){
                                    console.log('vamos a extraer los avistamientos')
                                    console.log(data.length)

                                    for(var i = 0 ; i < data.length ; i++ )
                                    {
                                    i_e+= '<tr><td>'+data[i].idAvistamiento+'</td><td> '+data[i].fechaIngresodeInformacionBD+'</td><td>'+data[i].nombreDepartamento+'</td><td>'+data[i].nombreColector +'</td><td><button class="btn btn-primary btn-Ver" value="'+data[i].idAvistamiento+'" ><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></button> <button class="btn btn-success btn-Editar" value="'+data[i].idAvistamiento+'" ><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></button></td></tr>';
                                    
                                    $('#id_avis_pdf').val(data[i].idAvistamiento);
                                   
                                    }
                                    row.find('.row_avista').html(" ");
                                    row.find('.row_avista').append(i_e);
                                },
                                error:function(data){
                                    console.log('no vamos a poder extraerlos')
                                }
                            })
                                $("#frm-avista").get(0).reset();
                                $('#Avista_Modal').modal('hide');                 
                            }
                        },error:function(){
                            console.log('errores al ingreso')
                            $('#Avista_Modal').modal('hide')
                            sweetAlert("No se pudo ingresar", "intente de nuevo!", "error");   
                            //$('#frm-avista-refresh').submit();
                            //$("#Error_Modal").modal('show')
                        }
                    })
                    //$('#id_avis_pdf').val(ult_avis);
                    
                }
        })

        //////////////////////////////btn guardar pdf////////////////////////////////

        $("#frm-docu_pdf button").click(function(ev){

        ev.preventDefault();
        var form = document.querySelector('#frm-docu_pdf');
        var formdata = new FormData(form);
        console.log(form)
        console.log(formdata)
        $.ajax({
          type : 'post',
          url  : '{!! URL::to('Guardar_PDF') !!}',
          data : formdata,
                contentType: false,
                processData: false,
                cache : false,
                success:function(data){
                  console.log(data.errors)
                  $('#_pdf_avista_doc').fadeOut();                  
                  if(data.success == false ){
                    $('#_pdf_avista_doc').text('');
                    //$('#avis-error').fadeIn();
                    $.each(data.errors , function(index,value){
                    $('#_'+index).fadeIn();
                    $('#_'+index).text(value);
                    });
                  }else{

                    swal("documento pdf agregado exitosamente!", "", "success")
                    $('#pdf_avista_doc').val('');
                    $('#_pdf_avista_doc').fadeOut();               
                  }
                },
                error:function(){

                }
        })

        });

        $('#cerrar-pdf').click(function(){
            $('#PDF_avis').modal('hide');
            $('#pdf_avista_doc').val('');
            $('#_pdf_avista_doc').fadeOut();            
        });

        $('.close-pdf').click(function(){
            $('#PDF_avis').modal('hide');
            $('#pdf_avista_doc').val('');
            $('#_pdf_avista_doc').fadeOut();            
        });


        ///////////////////////////////BTN VER AVISTAMIENTO//////////////////////////-----+


        $(document).on('click','.btn-Ver',function(e){
            var id = $(this).val();
            var div = $('#modal-body-view')

            llenar_campos_avis( id, div );
            publi_pdf_avis( id, div);

            $('#VER_Avist').modal('show');

            console.log(id)


        })


        ////////////////////////////////funciones para ver avistamiento////////////////////////////


        function llenar_campos_avis( id, div ){

            $.ajax({
                 type : 'get',
                url  : '{!! URL::to('get_Avista_BY_ID') !!}',
                data :  { 'id':id },
                success:function(data){
                    console.log(data)
                    console.log('si se pudo get la info')
                    div.find('#id_view').val(data[0].idAvistamiento);
                    div.find('#label_esp_v').text(data[0].idAvistamiento);
                    div.find('#fecha-view').text(data[0].fechaHoraAvistamiento);
                    div.find('#hora-view').text(data[0].horaAvistamiento);
                    div.find('#fecha-ing-view').text(data[0].fechaIngresodeInformacionBD);
                    div.find('#col-view').text(data[0].nombreColector);
                    div.find('#dep-view').text(data[0].nombreDepartamento);
                    div.find('#mun-view').text(data[0].nombreMunicipio);
                    div.find('#can-view').text(data[0].nombreCanton);
                    div.find('#fuente-view').text(data[0].nombreFuente);
                    div.find('#ejem-view').text(data[0].ejemplarDepositado);
                    div.find('#num_avis_ver').text(data[0].numeroEspecies);
                    div.find('#lati-vista').text(data[0].mostrar_lati);
                    div.find('#long-vista').text(data[0].mostrar_long);
                    div.find('#altu-vista').text(data[0].alturaAvistamiento);
                    div.find('#suelo-vista').text(data[0].nombreSuelo);
                    div.find('#tierra-vista').text(data[0].nombreClaseDeTierra);
                    div.find('#publicacion_PDF').text(data[0].publicacionPdf);
                    div.find('#clima-avista').text(data[0].descripcionClimaAvistamiento);
                    div.find('#eco-avista').text(data[0].ecosistemaAvistamiento);
                    div.find('#fisio-avista').text(data[0].fisiografiaAvistamiento);
                    div.find('#geo-avista').text(data[0].geologiaAvistamiento);
                    div.find('#hidro-avista').text(data[0].hidrografiaAvistamiento);
                    div.find('#usos-avista').text(data[0].usosDeLaEspecieAvistamiento);

                    if(data[0].fotografiaAvistamiento){

                        $('#img-avista').attr('src','/imagen_especie/'+data[0].nombreEspecie+'/'+data[0].fotografiaAvistamiento).fadeIn();    
                    }

                },error:function(){
                    console.log('no se pudo get la info')
                    llenar_campos_avis( id, div );
                }
            })            
        }

        function publi_pdf_avis( id, div){


            var fue = "";            
            $.ajax({
                        type : 'get',
                        url  : '{!! URL::to('Publi_PDF_AVIS') !!}',
                        data :  { 'id':id },
                        success:function(data){
                            console.log('success pdf info')
                            console.log(data)                            
                            fue = "";
                            for(var i = 0 ; i < data.length ; i++ )
                            {
                            fue+='<tr><td>'+data[i].nombrePublicacion+'<a href="/publicacion_especie/'+data[i].nombreEspecie+'/'+data[i].nombrePublicacion+'" target="_blank" class="btn btn-default btn-sm" style="float:right;">documento PDF</a></td></tr>';
                            }
                            div.find('.row_pdf').html(" ");
                            div.find('.row_pdf').append(fue);

                        },
                        error:function(){
                            console.log('error con fuente info ')
                            publi_pdf_avis( id, div);
                        }
                    })



        }

        /////////////////////VEMOS AVISTAMIENTO PARA  MODIFICAR  ////////-----------------------+

        $(document).on('click','.btn-Editar',function(e){
            var id = $(this).val();
            var id_dep;
            var id_mun;
            var id_reg;
            var m_avis = $('#modal-body-ver')
            var header = $('#modal-h')
            $('#pub_PDF_edit').empty();
            $('#publish_edit').empty();
            $('#id_PubPDF_edit').val('');

            datos_avis( m_avis , id );
            fuenteInfo( m_avis , id );
            colector_avis( m_avis , id );
            dep_avis( m_avis , id );
            mun_avis( m_avis , id );
            canton_avis( m_avis , id );
            suelo_avis( m_avis , id );
            tierra_avis( m_avis , id );
            llenar_pdf_edit( m_avis , id );
            $('#VER_Avista_Modal').modal('show');

        })

////////////////////////// FUNCIONES PARA MODIFICAR DATOS DE AVISTAMIENTO /////////////////////


function llenar_pdf_edit( m_avis , id ){

    var fue = "";            
            $.ajax({
                        type : 'get',
                        url  : '{!! URL::to('Publi_PDF_AVIS') !!}',
                        data :  { 'id':id },
                        success:function(data){
                            console.log('success pdf info')
                            console.log(data)                            
                            fue = "";
                            for(var i = 0 ; i < data.length ; i++ )
                            {
                            fue+='<tr><td>'+data[i].nombrePublicacion+'</td></tr>';
                            }
                            m_avis.find('.row_pdf_edit').html(" ");
                            m_avis.find('.row_pdf_edit').append(fue);

                        },
                        error:function(){
                            console.log('error con fuente info ')
                            llenar_pdf_edit( m_avis , id );
                        }
                    })
}


function datos_avis( m_avis , id ){

    $.ajax({
                type : 'get',
                url  : '{!! URL::to('get_Avista_BY_ID') !!}',
                data :  { 'id':id },
                success:function(data){
                    console.log('funciono el get datos de avis')
                    console.log(data)
                    var m_avis = $('#modal-body-ver')
                    var header = $('#modal-h')
                    m_avis.find('#id_esp_ver').val(data[0].idEspecie);
                    m_avis.find('#id_avis_ver').val(data[0].idAvistamiento);
                    m_avis.find('#nom_esp').val(data[0].nombreEspecie);
                    //m_avis.find('#idFInfo_ver').val(data[0].fuenteDeInformacion);
                    m_avis.find('#Ejem-Ver').val(data[0].ejemplarDepositado);
                    m_avis.find('#num_avis_edit').val(data[0].numeroEspecies);
                    m_avis.find('#Latitud-VER').val(data[0].deg_lati);
                    m_avis.find('#Longitud-VER').val(data[0].deg_long);
                    m_avis.find('#lati_min_ver').val(data[0].min_lati);
                    m_avis.find('#long_min_ver').val(data[0].min_long);
                    m_avis.find('#lati_sec_ver').val(data[0].sec_lati);
                    m_avis.find('#long_sec_ver').val(data[0].sec_long);
                    m_avis.find('#Altura-VER').val(data[0].alturaAvistamiento);
                    m_avis.find('#Clima-VER').val(data[0].descripcionClimaAvistamiento);
                    m_avis.find('#Eco-VER').val(data[0].ecosistemaAvistamiento);
                    m_avis.find('#Fisio-VER').val(data[0].fisiografiaAvistamiento);
                    m_avis.find('#Geo-VER').val(data[0].geologiaAvistamiento);
                    m_avis.find('#Hidro-VER').val(data[0].hidrografiaAvistamiento);
                    m_avis.find('#uso-VER').val(data[0].usosDeLaEspecieAvistamiento);
                    m_avis.find('#fecha_avis2').val(data[0].fechaHoraAvistamiento);
                    m_avis.find('#hora_avis').val(data[0].horaAvistamiento);
                    m_avis.find('#id_fecha_ing2').val(data[0].fechaIngresodeInformacionBD);
                },
                error:function(){
                    console.log('no funciono el get avis ')
                    datos_avis( m_avis,id )
                }
            })
}

function fuenteInfo( m_avis , id ){        

        var fue = "";            
            $.ajax({
                        type : 'get',
                        url  : '{!! URL::to('get_Fuente_id') !!}',
                        data :  { 'id':id },
                        success:function(data){
                            console.log('success fuente info')
                            console.log(data)
                            fue = '<option value="'+data[0].idFuente+'">'+data[0].nombreFuente+'</option>';
                            m_avis.find('#idFInfo_ver').html(" ");
                            m_avis.find('#idFInfo_ver').append(fue);
                            $.ajax({
                                type:'get',
                                url :'{!! URL::to('FuenteInfo') !!}',
                                success:function(data){
                                    console.log('si se pudo conseguir fuente info')
                                    fue = "";
                                     for(var i = 0 ; i < data.length ; i++ )
                                    {
                                    fue+='<option value="'+data[i].idFuente+'">'+data[i].nombreFuente+'</option>';
                                    }
                                    m_avis.find('#idFInfo_ver').append(fue);
                                },error:function(){
                                    console.log('no ce pudo fuente info')
                                    fuenteInfo( m_avis ,id )
                                }
                            })
                        },
                        error:function(){
                            console.log('error con fuente info ')
                            fuenteInfo( m_avis ,id )
                        }
                    })
}

function colector_avis( m_avis , id ){

    var col = "";            

            $.ajax({
                        type : 'get',
                        url  : '{!! URL::to('get_Colector_id') !!}',
                        data :  { 'id':id },
                        success:function(data){
                            console.log('success colector')
                            console.log(data)
                            col = '<option value="'+data[0].idColector+'">'+data[0].nombreColector+'</option>';

                            m_avis.find('#id_colector2').html(" ");
                            m_avis.find('#id_colector2').append(col);
                            //--------------------------------------ADENTRO DE AJAX-----------COLECTOR------------------------

                            $.ajax({
                                type:'get',
                                url :'{!! URL::to('Colectores') !!}',
                                success:function(data){
                                    console.log('si se pudo conseguir colectores')
                                    col = "";
                                     for(var i = 0 ; i < data.length ; i++ )
                                    {
                                    col+='<option value="'+data[i].idColector+'">'+data[i].nombreColector+'</option>';
                                    }
                                    m_avis.find('#id_colector2').append(col);
                                },error:function(){
                                    console.log('no ce pudo colectores')
                                    colector_avis( m_avis ,id )
                                }
                            })
                        },
                        error:function(){
                            console.log('error con Colector')
                            colector_avis( m_avis ,id )
                        }
                    })
}

function dep_avis( m_avis , id ){

    var dep = "";

                    $.ajax({
                        type : 'get',
                        url  : '{!! URL::to('get_Departamento_id') !!}',
                        data :  { 'id':id },
                        success:function(data){
                            console.log('success Departamento')
                            console.log(data)
                            dep = '<option value="'+data[0].codigoDepartamento+'">'+data[0].nombreDepartamento+'</option>';

                            m_avis.find('#id_departamento2').html(" ");
                            m_avis.find('#id_departamento2').append(dep);
                            $.ajax({
                                type:'get',
                                url :'{!! URL::to('Departamentos') !!}',
                                success:function(data){
                                    console.log('si se pudo conseguir departamentos')
                                    dep = "";
                                     for(var i = 0 ; i < data.length ; i++ )
                                    {
                                    dep+='<option value="'+data[i].codigoDepartamento+'">'+data[i].nombreDepartamento+'</option>';
                                    }
                                    m_avis.find('#id_departamento2').append(dep);
                                    id_dep = $('#id_departamento2').val();
                                    console.log(id_dep)
                                },error:function(){
                                    console.log('no ce pudo departamentos')
                                    dep_avis( m_avis ,id )
                                }
                            })
                        },
                        error:function(){
                            console.log('error con Departamento')
                            dep_avis( m_avis ,id )
                        }
                    })
}

function mun_avis( m_avis , id ){

    var municipio = "";

                    $.ajax({
                        type : 'get',
                        url  : '{!! URL::to('get_Municipio_id') !!}',
                        data :  { 'id':id },
                        success:function(data){
                            console.log('success Municipio')
                            console.log(data)
                            municipio = '<option value="'+data[0].codigoMunicipio+'">'+data[0].nombreMunicipio+'</option>';
                            m_avis.find('#id_municipio2').html(" ");
                            m_avis.find('#id_municipio2').append(municipio);
                        },
                        error:function(){
                            console.log('error con Municipio')
                            mun_avis( m_avis , id )
                        }
                    })

}

function canton_avis( m_avis , id ){

    var canton = "";
                    $.ajax({
                        type : 'get',
                        url  : '{!! URL::to('get_Canton_id') !!}',
                        data :  { 'id':id },
                        success:function(data){
                            console.log('success Canton')
                            console.log(data)
                            canton = '<option value="'+data[0].codigoCanton+'">'+data[0].nombreCanton+'</option>';
                            m_avis.find('#id_canton2').html(" ");
                            m_avis.find('#id_canton2').append(canton);
                        },
                        error:function(){
                            console.log('error con Canton')
                            canton_avis( m_avis ,id )
                        }
                    })
}

function suelo_avis( m_avis , id ){

    var suelo = "";

                    $.ajax({
                        type : 'get',
                        url  : '{!! URL::to('get_Suelo_id') !!}',
                        data :  { 'id':id },
                        success:function(data){
                            console.log('success Suelo')
                            console.log(data)
                            suelo = '<option value="'+data[0].idSuelo+'">'+data[0].nombreSuelo+'</option>';
                            m_avis.find('#id_suelo2').html(" ");
                            m_avis.find('#id_suelo2').append(suelo);
                            //--------------------------------------------------adentro Suelo ........
                            $.ajax({
                                type:'get',
                                url :'{!! URL::to('Suelos') !!}',
                                success:function(data){
                                    console.log('si se pudo conseguir suelos')

                                    suelo = "";

                                     for(var i = 0 ; i < data.length ; i++ )
                                    {
                                    suelo+='<option value="'+data[i].idSuelo+'">'+data[i].nombreSuelo+'</option>';
                                    }
                                    m_avis.find('#id_suelo2').append(suelo);

                                },error:function(){
                                    console.log('no ce pudo suelos')
                                    suelo_avis( m_avis,id )
                                }
                            })
                        },
                        error:function(){
                            console.log('error con Suelo')
                            suelo_avis( m_avis,id )
                        }
                    })
}

function tierra_avis( m_avis , id ){

    var tierra = "";

                    $.ajax({
                        type : 'get',
                        url  : '{!! URL::to('get_Tierra_id') !!}',
                        data :  { 'id':id },
                        success:function(data){
                            console.log('success Tierra')
                            console.log(data)
                            tierra = '<option value="'+data[0].idClaseDeTierra+'">'+data[0].nombreClaseDeTierra+'</option>';

                            m_avis.find('#id_tierra2').html(" ");
                            m_avis.find('#id_tierra2').append(tierra);
                            $.ajax({
                                type:'get',
                                url :'{!! URL::to('ClasedeTierra') !!}',
                                success:function(data){
                                    console.log('si se pudo conseguir  Clase de tierras')
                                    tierra = "";

                                     for(var i = 0 ; i < data.length ; i++ )
                                    {
                                    tierra+='<option value="'+data[i].idClaseDeTierra+'">'+data[i].nombreClaseDeTierra+'</option>';
                                    }
                                    m_avis.find('#id_tierra2').append(tierra);

                                },error:function(){
                                    console.log('no ce pudo Clase de tierra')
                                    tierra_avis( m_avis,id )
                                }
                            })
                        },
                        error:function(){
                            console.log('error con Tierra')
                            tierra_avis( m_avis,id )
                        }
                    })

}



//////////////////////        GUARDA     DESPUES   DE     EDITAR       //////////////////////

$('#frm-editar button').click(function(e){
    e.preventDefault();

    if($(this).attr("id")=="guardar_link_edit"){

        if( $('#id_PubPDF_edit').val() ){

        var m_avis = $('#modal-body-ver');
        var id = $('#id_avis_ver').val();
        console.log(id);  

        var form = document.querySelector('#frm-editar');
        var formdata = new FormData(form);
        console.log(form)
        console.log(formdata)
        $.ajax({
          type : 'post',
          url  : '{!! URL::to('Guardar_PDF_edit') !!}',
          data : formdata,
                contentType: false,
                processData: false,
                cache : false,
                success:function(data){
                  console.log(data.errors)
                  $('#_pdf_avista_doc_edit').fadeOut();                  
                  if(data.success == false ){
                    $('#_pdf_avista_doc_edit').text('');
                    //$('#avis-error').fadeIn();
                    $.each(data.errors , function(index,value){
                    $('#_'+index).fadeIn();
                    $('#_'+index).text(value);
                    });
                  }else{

                    swal("documento pdf agregado exitosamente!", "", "success")
                    $('#id_PubPDF_edit').val('');
                    $('#_pdf_avista_doc_edit').fadeOut();               
                    llenar_pdf_edit( m_avis , id );  

                  }
                },
                error:function(){

                }
        })
        }else{
        }
    }

    if($(this).attr("id")=="guardar_editar"){

        $('#_foto-graf_ver').fadeOut();
        $('#_alt_avis_ver').fadeOut();
        $('#_lati_avis_ver').fadeOut();
        $('#_lati_min_ver').fadeOut();
        $('#_lati_sec_ver').fadeOut();
        $('#_long_avis_ver').fadeOut();
        $('#_long_sec_ver').fadeOut();
        $('#_long_min_ver').fadeOut();
        $('#_mun_avis_ver').fadeOut();
        $('#_depar_avis_ver').fadeOut();
        $('#_canton_avis_ver').fadeOut();
        $('#_col_avis_ver').fadeOut();
        $('#_clima_avis_ver').fadeOut();
        $('#_eco_avis_ver').fadeOut();
        $('#_clima_avis_ver').fadeOut();
        $('#_fisio_Avis_ver').fadeOut();
        $('#_geo_avis_ver').fadeOut();
        $('#_hidro_avis_ver').fadeOut();

        //alert('vamos a editar')
        var id = $('#id_esp_ver').val();
        console.log(id)
        var form = document.querySelector('#frm-editar');
        var formdata = new FormData(form);
        console.log(form)
        console.log(formdata)
        var row = $('.row_avista').parent().parent();
        i_e = "";
        $.ajax({
            type : 'post',
            url  : '{!! URL::to('SAVE_edit') !!}',
            data : formdata,
            contentType: false,
            processData: false,
            cache : false,
            success:function(data){

                console.log(id);
                console.log(data.errors)

                if(data.success == false ){

                swal("Faltan campos por completar!", "Verifique todos los campos", "warning")

                if(data.errors == 'no es una imagen'){
                    sweetAlert("Ingrese una imagen", "jpg,bmp o gif!", "error");   
                }


                    $('#_foto-graf_ver,#_lati_avis_ver,#_lati_min_ver,#_lati_sec_ver,#_long_sec_ver,#_long_min_ver,#_long_avis_ver,#_col_avis_ver,#_depar_avis_ver,#_mun_avis_ver,#_canton_avis_ver,#_alt_avis_ver,#_clima_avis_ver,#_eco_avis_ver,#_geo_avis_ver,#_clima_avis_ver,#_hidro_avis_ver,#_fisio_Avis_ver').text('');
                                //$('#avis-error').fadeIn();
                        $.each(data.errors , function(index,value){
                            $('#_'+index).fadeIn();
                            $('#_'+index).text(value);
                        });

                }else{

                swal("Modificaciones ingresadas correctamente!", "", "success")

                $.ajax({
                    type : 'get',
                    url  : '{!! URL::to('GET_todos_avis_ESP') !!}',
                    data : { 'id' : id },
                    success:function(data){
                        console.log('vamos a extraer los avistamientos  despues de modificar')
                        console.log(data.length)
                        console.log(data)
                        for(var i = 0 ; i < data.length ; i++ )
                        {
                        i_e+= '<tr><td>'+data[i].idAvistamiento+'</td><td> '+data[i].fechaIngresodeInformacionBD+'</td><td>'+data[i].nombreDepartamento+' </td><td>'+data[i].nombreColector +'</td> <td><button class="btn btn-primary btn-Ver" value="'+data[i].idAvistamiento+'" ><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></button> <button class="btn btn-success btn-Editar" value="'+data[i].idAvistamiento+'" ><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></button></td></tr>';
                        }
                        row.find('.row_avista').html(" ");
                        row.find('.row_avista').append(i_e);
                        $("#frm-editar").get(0).reset();
                        $('#VER_Avista_Modal').modal('hide')
                        },
                        error:function(data){
                            console.log('no vamos a poder extraerlos  despues de modificar')
                        }
                    })
                }          
                   
            },
            error:function(data){
                 $('#VER_Avista_Modal').modal('hide');
                sweetAlert("No se pudo ingresar", "intente de nuevo!", "error");   
                //$('#frm-avista-refresh').submit();
            }
        })
    }
});



    //BORRAMOS TODOS LOS MSJS DE ERROR


        $('.close-avis').click(function(){

            $('#_col_avis').fadeOut();
            $('#_zona_avis').fadeOut();
            $('#_mun_avis').fadeOut();
            $('#_depar_avis').fadeOut();
            $('#_canton_avis').fadeOut();
            $('#_tierra_avis').fadeOut();
            $('#_suelo_avis').fadeOut();
            $('#_lati_avis').fadeOut();
            $('#_long_avis').fadeOut();
            $('#_lati_min').fadeOut();
            $('#_long_min').fadeOut();
            $('#_lati_sec').fadeOut();
            $('#_long_sec').fadeOut();
            $('#_foto_graf').fadeOut();
            $('#_PDF-file').fadeOut();
            $('#_alt_avis').fadeOut();
            $('#_fecha_av').fadeOut();
            $('#_clima_avis').fadeOut();
            $('#_eco_avis').fadeOut();
            $('#_clima_avis').fadeOut();
            $('#_fisio_Avis').fadeOut();
            $('#_geo_avis').fadeOut();
            $('#_hidro_avis').fadeOut();
            $('#_fuente_avis').fadeOut();
            $("#frm-avista").get(0).reset();
            //$('#pub_PDF').val('');
            $("#frm-avista").get(0).reset();
            $('#_num_avis').fadeOut();

        });

        $('.close-editar').click(function(){

            $('#_col_avis_ver').fadeOut();
            $('#_mun_avis_ver').fadeOut();
            $('#_depar_avis_ver').fadeOut();
            $('#_canton_avis_ver').fadeOut();
            $('#_tierra_avis_ver').fadeOut();
            $('#_suelo_avis_ver').fadeOut();
            $('#_lati_avis_ver').fadeOut();
            $('#_long_avis_ver').fadeOut();
            $('#_foto-graf_ver').fadeOut();
            $('#_alt_avis_ver').fadeOut();

      
            $("#frm-editar").get(0).reset();
            //$('#pub_PDF').val('');
            $("#frm-editar").get(0).reset();

        });





        $('#ver-avista').click(function(){

            $('#VER_Avist').modal('hide');

        });

         //refresca la imagen de vista

        $('.close-ver').click(function(){
            //alert('vamos a cerrar esto')
            $('#img-avista').attr('src','/imagen/placeholder.png');

        })

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


        $('#id_colectoX').click(function(){

        //alert('iremos al comienzo')
        $('#frm-colector-tabla').submit();

        });




    });




</script>
