<script type="text/javascript">

    $(document).ready(function(){


        ////ESTA FUNCION LLENA TODOS LOS SELECTS


        $('#agr_avista').click(function(){

            agr_avista();

        })


        function agr_avista(){



            //alert('agrregamos avistamiento')
            var r_z = "";
            var zona = $('#id_zona').parent().parent();
            $('#pub_PDF').empty();
            $('#publish').empty();
            $('#pub_PDF').attr('disabled',true);
            document.getElementById("id_fecha_ingr").readOnly = true; 

            $.ajax({

                type : 'get',
                url  :  '{!! URL::to('Regiones') !!}',
                //data : {},
                success:function(data){

                    console.log('si se pudo')
                    console.log(data)

                    r_z += '<option value="0" disabled="true" selected="true"> -- Zona -- </option>';
                    for(var i = 0 ; i < data.length ; i++ )
                    {
                        r_z+='<option value="'+data[i].idRegion+'">'+data[i].nombreRegion+'</option>';
                    }
                    zona.find('#id_zona').html(" ");
                    zona.find('#id_zona').append(r_z);

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


            var colector = $('#id_colector').parent().parent();
            var a_co = "";

            $.ajax({

                type : 'get',
                url  :  '{!! URL::to('Colectores') !!}',
                //data : {},
                success:function(data){

                    console.log('si se pudo')
                    console.log(data)

                    a_co += '<option value="0" disabled="true" selected="true"> -- Colector -- </option>';
                    for(var i = 0 ; i < data.length ; i++ )
                    {
                        a_co+='<option value="'+data[i].idColector+'">'+data[i].nombreColector+'</option>';
                    }
                    colector.find('#id_colector').html(" ");
                    colector.find('#id_colector').append(a_co);

                    


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


        ///////////////////HACER SELECCION DE CANTONES////////////////////////---------------------------------+

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
            $('#_foto-graf').fadeOut();
            $('#_PDF-file').fadeOut();
            $('#_alt_avis').fadeOut();
            $('#_fecha_av').fadeOut();
            $('#_clima_avis').fadeOut();
            $('#_eco_avis').fadeOut();
            $('#_clima_avis').fadeOut();
            $('#_fisio_Avis').fadeOut();
            $('#_geo_avis').fadeOut();
            $('#_hidro_avis').fadeOut();

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
                                swal("Verifique todos los campos!", "", "warning")


                                if(data.errors == 'no es una imagen'){
                                    //alert('no es una imagen')
                                   sweetAlert("Ingrese una imagen", "jpg,bmp o gif!", "error");   
                                }

                                $('#_foto-graf,#_zona_avis,#_PDF-file,#_lati_avis,#_long_avis,#_col_avis,#_tierra_avis,#_suelo_avis,#_depar_avis,#_mun_avis,#_canton_avis,#_alt_avis,#_fecha_av,#_clima_avis,#_eco_avis,#_geo_avis,#_clima_avis,#_hidro_avis,#_fisio_Avis').text('');
                                //$('#avis-error').fadeIn();
                                $.each(data.errors , function(index,value){
                                $('#_'+index).fadeIn();
                                $('#_'+index).text(value);
                                });

                            }else{

                                swal("Avistamiento ingresado!", "", "success")

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
                                    }
                                    row.find('.row_avista').html(" ");
                                    row.find('.row_avista').append(i_e);
                                },
                                error:function(data){
                                    console.log('no vamos a poder extraerlos')
                                }
                            })
                                $("#frm-avista").get(0).reset();
                                $('#Avista_Modal').modal('hide')
                            }

                        },error:function(){

                            console.log('errores al ingreso')
                            $('#Avista_Modal').modal('hide')
                            sweetAlert("No se pudo ingresar", "intente de nuevo!", "error");   
                            $('#frm-avista-refresh').submit();
                            //$("#Error_Modal").modal('show')
                        }
                    })

                }
        })


        ///////////////////////////////BTN VER AVISTAMIENTO//////////////////////////-----+


        $(document).on('click','.btn-Ver',function(e){
            var id = $(this).val();
            //alert(id)

            $.ajax({
                 type : 'get',
                url  : '{!! URL::to('get_Avista_BY_ID') !!}',
                data :  { 'id':id },
                success:function(data){
                    console.log(data)
                    console.log('si se pudo get la info')

                    var div = $('#modal-body-view')

                    div.find('#id_view').val(data[0].idAvistamiento);
                    div.find('#label_esp_v').text(data[0].idAvistamiento);
                    div.find('#fecha-view').text(data[0].fechaHoraAvistamiento);
                    div.find('#hora-view').text(data[0].horaAvistamiento);
                    div.find('#fecha-ing-view').text(data[0].fechaIngresodeInformacionBD);
                    div.find('#col-view').text(data[0].nombreColector);
                    div.find('#dep-view').text(data[0].nombreDepartamento);
                    div.find('#mun-view').text(data[0].nombreMunicipio);
                    div.find('#can-view').text(data[0].nombreCanton);
                    div.find('#fuente-view').text(data[0].fuenteDeInformacion);
                    div.find('#ejem-view').text(data[0].ejemplarDepositado);
                    div.find('#lati-vista').text(data[0].latitudAvistamiento);
                    div.find('#long-vista').text(data[0].longitudAvistamiento);
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
                }

            })

            $('#VER_Avist').modal('show');

            console.log(id)


        })

        /////////////////////VEMOS AVISTAMIENTO PARA  MODIFICAR  ////////-----------------------+

        $(document).on('click','.btn-Editar',function(e){
            var id = $(this).val();
            var id_dep;
            var id_mun;
            var id_reg;
            $('#pub_PDF_edit').empty();
            $('#publish_edit').empty();

            //alert(id)
            console.log(id)
            $('#id_PubPDF_edit').val('');


            $.ajax({
                type : 'get',
                url  : '{!! URL::to('get_Avista_BY_ID') !!}',
                data :  { 'id':id },
                success:function(data){
                    console.log('funciono el get avis')
                    console.log(data)
                    var m_avis = $('#modal-body-ver')
                    var header = $('#modal-h')

                    //header.find('#label_especie').val(data[0].nombreEspecie);

                    m_avis.find('#id_esp_ver').val(data[0].idEspecie);
                    m_avis.find('#id_avis_ver').val(data[0].idAvistamiento);
                    m_avis.find('#nom_esp').val(data[0].nombreEspecie);
                    m_avis.find('#idFInfo_ver').val(data[0].fuenteDeInformacion);
                    m_avis.find('#Ejem-Ver').val(data[0].ejemplarDepositado);
                    m_avis.find('#Latitud-VER').val(data[0].latitudAvistamiento);
                    m_avis.find('#Longitud-VER').val(data[0].longitudAvistamiento);
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
                    //m_avis.find('#pub_PDF_edit').val(data[0].publicacionPdf);
                    //m_avis.find('#publish_edit').val(data[0].publicacionPdf);
    
                    publish_edit
                    //m_avis.find('#id_colector-VER').val(data[0].idColector);
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
                                }
                            })


                        },
                        error:function(){
                            console.log('error con Colector')
                        }

                    })

                    //DEAPARTAMENTO-------------------------------------------------------------------------------------

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

                            //------------------------------------DENTRO------------------------------

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
                                }
                            })


                        },
                        error:function(){
                            console.log('error con Departamento')
                        }

                    })



                    //MUNICIPIO -----------------------unico sin lista----------------------------------

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

                            //_-------------_-----____--_-adentro ajax

                        },
                        error:function(){
                            console.log('error con Municipio')
                        }

                    })

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
                        }

                    })

                    ////SUELOS ---------------------------------------------------------------------------------

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
                                }
                            })


                        },
                        error:function(){
                            console.log('error con Suelo')
                        }

                    })

                    // tierra ________________________--------------------------------------------------------

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

                            //-----------------------------------------------adentro tierra ....+++++++***(- _ -)+@

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
                                }
                            })
                        },
                        error:function(){
                            console.log('error con Tierra')
                        }
                    })




                    $('#VER_Avista_Modal').modal('show');


                },
                error:function(){
                    console.log('no funciono el get avis ')
                }
            })


            //$('#VER_Avista_Modal').modal('show');
            //VER_Avista_Modal


        })



//////////////////////        GUARDA     DESPUES   DE     EDITAR       //////////////////////

$('#frm-editar button').click(function(e){
    e.preventDefault();

    if($(this).attr("id")=="guardar_link_edit"){

        if( $('#id_PubPDF_edit').val() ){
                    //alert('si tiene algo')
                    var link  = $('#id_PubPDF_edit').val();
                    //alert(link)
                    var div = $('#link_esp_edit');
                    var esc = $('#escondido_edit');
                    div.find('#pub_PDF_edit').append(link);
                    esc.find('#publish_edit').append(link);
                    $("#id_PubPDF_edit").val("");
                    var espacio = '\n';
                    div.find('#pub_PDF_edit').append(espacio);
                    //div.find('#pub_PDF2').append(espacio);
                    esc.find('#publish_edit').append(espacio);
        }else{

        }
    }

    if($(this).attr("id")=="guardar_editar"){

        $('#_foto-graf_ver').fadeOut();
        $('#_alt_avis_ver').fadeOut();
        $('#_lati_avis_ver').fadeOut();
        $('#_long_avis_ver').fadeOut();
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

                swal("Verifique todos los campos!", "", "warning")


                    $('#_foto-graf_ver,#_lati_avis_ver,#_long_avis_ver,#_col_avis_ver,#_depar_avis_ver,#_mun_avis_ver,#_canton_avis_ver,#_alt_avis_ver,#_clima_avis_ver,#_eco_avis_ver,#_geo_avis_ver,#_clima_avis_ver,#_hidro_avis_ver,#_fisio_Avis_ver').text('');
                                //$('#avis-error').fadeIn();
                        $.each(data.errors , function(index,value){
                            $('#_'+index).fadeIn();
                            $('#_'+index).text(value);
                        });

                }else{

                swal("Modificaciones ingresadas!", "", "success")

                $.ajax({
                    type : 'get',
                    url  : '{!! URL::to('GET_todos_avis_ESP') !!}',
                    data : { 'id' : id },
                    success:function(data){
                        console.log('vamos a extraer los avistamientos  despues de modificar')
                        console.log(data.length)
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
                $('#frm-avista-refresh').submit();
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
            $('#_foto-graf').fadeOut();
            $('#_PDF-file').fadeOut();
            $('#_alt_avis').fadeOut();
            $('#_fecha_av').fadeOut();
            $('#_clima_avis').fadeOut();
            $('#_eco_avis').fadeOut();
            $('#_clima_avis').fadeOut();
            $('#_fisio_Avis').fadeOut();
            $('#_geo_avis').fadeOut();
            $('#_hidro_avis').fadeOut();
            $("#frm-avista").get(0).reset();
            //$('#pub_PDF').val('');
            $("#frm-avista").get(0).reset();

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




    });




</script>
