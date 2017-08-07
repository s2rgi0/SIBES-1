<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<script type="text/javascript">

	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			 }
		});




	$(document).ready(function(){


		$("#reino_id").select2("val", '0'); //set the value
		$("#division_id").select2("val", '0'); //set the value
		$("#clase_id").select2("val", '0'); //set the value
		$("#orden_id").select2("val", '0'); //set the value
		$("#familia_id").select2("val", '0'); //set the value
		$("#genero_id").select2("val", '0'); //set the value
		$("#especie_id").select2("val", '0'); //set the value

		$('#reino_id').val('0');
		  $('#division_id').val('0');
		    $('#clase_id').val('0');
		      $('#orden_id').val('0');
		        $('#familia_id').val('0');
		          $('#genero_id').val('0');
		            $('#especie_id').val('0');
		            	$('#subespecie_id').val('0');

		//$(':input','#busqueda-frm').not(':button, :submit, :hidden').val('--Seleccionar--').prop('selected',false);

		@if(count($errors->fdivision->all()))

			 $('#DIV_Modal').modal('show');

		@endif

		@if(count($errors->fclase->all()))

			 $('#CLA_Modal').modal('show');

		@endif

		@if(count($errors->forden->all()))

			 $('#ORD_Modal').modal('show');

		@endif

		@if(count($errors->ffamilia->all()))

			 $('#FAM_Modal').modal('show');

		@endif

		@if(count($errors->fgenero->all()))

			 $('#GEN_Modal').modal('show');

		@endif

		@if(count($errors->fespecie->all()))

			 $('#ESP_Modal').modal('show');

		@endif

		@if(count($errors->fsubespecie->all()))

			 $('#SUB_Modal').modal('show');

		@endif

//REINO

		$(document).on('change','.reino',function(){

			console.log("hmmm it changed");

			var rein_id = $(this).val();
			var div = $(this).parent().parent().parent();

			var pam_rei = $('.reino_modal').parent().parent();
			var par_d = $('.reino_modal').parent().parent();
			var par_c = $('.reinoc_modal').parent().parent();
			var par_o = $('.reinoo').parent().parent().parent();
			var par_f = $('.reinof').parent().parent().parent();
			var par_g = $('.reinog').parent().parent().parent();
			var par_e = $('.reinoe').parent().parent().parent();
			var par_s = $('.reinosu').parent().parent().parent();

			console.log(rein_id);
			var op = " ";
			var cla = "";
			var ord = "";
			var fam = "";
			var gen = "";
			var esp = "";
			var sub = "";

			var r_s = "";
			console.log('aqi va');
			console.log(div);

			$.ajax({
				type : 'get',
				url : '{!! URL::to('buscaDivision') !!}',
				data : {'id':rein_id},
				success:function(data){
					console.log('success');

					console.log(data);
					console.log(data.length);

					op+='<option value="0" disabled="true" selected="true">--Division--</option>';
					for(var i = 0 ; i < data.length ; i++ ){
					op+='<option value="'+data[i].idDivision+'">'+data[i].nombreDivision+'</option>';

					}

					cla+='<option value="0" disabled="true" selected="true">--Clase--</option>';
					ord+='<option value="0" disabled="true" selected="true">--Orden--</option>';
					fam+='<option value="0" disabled="true" selected="true">--Familia--</option>';
					gen+='<option value="0" disabled="true" selected="true">--Género--</option>';
					esp+='<option value="0" disabled="true" selected="true">--Especie--</option>';
					sub+='<option value="0" disabled="true" selected="true">--Subespecie--</option>';




					div.find('.division').html(" ");
					div.find('.division').append(op);

					div.find('.clase').html(" ");
					div.find('.clase').append(cla);

					div.find('.orden').html(" ");
					div.find('.orden').append(ord);

					div.find('.familia').html(" ");
					div.find('.familia').append(fam);


					div.find('.genero').html(" ");
					div.find('.genero').append(gen);

					div.find('.especie').html(" ");
					div.find('.especie').append(esp);

					div.find('.subespecie').html(" ");
					div.find('.subespecie').append(sub);
					$.ajax({

					type: 'get',
					url:'{!!  URL::to('pop_rei_div') !!}',
					data: {'id':rein_id},
					success:function(data){
						console.log('success le dimos')
						console.log(data);
						console.log(data.length);

						for(var i = 0 ; i < data.length ; i++ )
						{
						r_s+='<option value="'+data[i].idReino+'">'+data[i].nombreReino+'</option>';
						}

						par_d.find('.reino_modal').html(" ");
						par_d.find('.reino_modal').append(r_s);
						par_c.find('.reinoc_modal').html(" ");
						par_c.find('.reinoc_modal').append(r_s);
						par_o.find('.reinoo').html(" ");
						par_o.find('.reinoo').append(r_s);
						par_f.find('.reinof').html(" ");
						par_f.find('.reinof').append(r_s);
						par_g.find('.reinog').html(" ");
						par_g.find('.reinog').append(r_s);
						par_e.find('.reinoe').html(" ");
						par_e.find('.reinoe').append(r_s);
						par_s.find('.reinosu').html(" ");
						par_s.find('.reinosu').append(r_s);



						$.ajax({
							type:'get',
							url: '{!! URL::to('ingr_div') !!}',
							data:{},
							success:function(data){
								console.log('ah agregar los reinos')
								r_s = "";
								for(var i = 0 ; i < data.length ; i++ )
								{
									r_s+='<option value="'+data[i].idReino+'">'+data[i].nombreReino+'</option>';
								}

								pam_rei.find('.reino_modal').append(r_s);
								par_c.find('.reinoc_modal').append(r_s);
								par_o.find('.reinoo').append(r_s);
								par_f.find('.reinof').append(r_s);
								par_g.find('.reinog').append(r_s);
								par_e.find('.reinoe').append(r_s);
								par_s.find('.reinosu').append(r_s);

							},
							error:function(){
								console.log('no se pudo agregar los reinos')
							}
						})



					},
					error:function(){
						console.log('sigue el error')
				}

				});



				},
				error:function(){
					console.log('error');
				}
			});

		});

//DIVISION

		$(document).on('change','.division',function(){

			console.log("estamos en division");

			var division_id = $(this).val();
			var divis = $(this).parent().parent().parent();
			console.log(division_id);
			var cla = " ";
			console.log('aqi va');
			console.log(divis);
			var ord = "";
			var fam = "";
			var gen = "";
			var esp = "";
			var sub = "";

			$.ajax({
				type : 'get',
				url : '{!! URL::to('buscaClase') !!}',
				data : {'id':division_id},
				success:function(data){
					console.log('success');

					console.log(data);
					console.log(data.length);

					cla+='<option value="0" disabled="true" selected="true">--Clase--</option>';
					for(var i = 0 ; i < data.length ; i++ ){
					cla+='<option value="'+data[i].idClase+'">'+data[i].nombreClase+'</option>';

					}

					ord+='<option value="0" disabled="true" selected="true">--Orden--</option>';
					fam+='<option value="0" disabled="true" selected="true">--Familia--</option>';
					gen+='<option value="0" disabled="true" selected="true">--Género--</option>';
					esp+='<option value="0" disabled="true" selected="true">--Especie--</option>';
					sub+='<option value="0" disabled="true" selected="true">--Subespecie--</option>';


					divis.find('.clase').html(" ");
					divis.find('.clase').append(cla);

					divis.find('.orden').html(" ");
					divis.find('.orden').append(ord);

					divis.find('.familia').html(" ");
					divis.find('.familia').append(fam);

					divis.find('.genero').html(" ");
					divis.find('.genero').append(gen);

					divis.find('.especie').html(" ");
					divis.find('.especie').append(esp);

					divis.find('.subespecie').html(" ");
					divis.find('.subespecie').append(sub);
				},
				error:function(){
					console.log('error');
				}
			});


		});

//Clase

		$(document).on('change','.clase',function(){

			console.log("estamos en clase");
			var clase_id = $(this).val();
			var clase_div = $(this).parent().parent().parent();
			console.log(clase_id);
			var ord = " ";
			console.log('vamos clase');
			console.log(clase_div);
			var fam = "";
			var gen = "";
			var esp = "";
			var sub = "";


			$.ajax({
				type : 'get',
				url : '{!! URL::to('buscaOrden') !!}',
				data : {'id':clase_id},
				success:function(data){
					console.log('success');

					console.log(data);
					console.log(data.length);

					ord+='<option value="0" disabled="true" selected="true">--Orden--</option>';
					for(var i = 0 ; i < data.length ; i++ ){
					ord+='<option value="'+data[i].idOrden+'">'+data[i].nombreOrden+'</option>';

					}

					fam+='<option value="0" disabled="true" selected="true">--Familia--</option>';
					gen+='<option value="0" disabled="true" selected="true">--Género--</option>';
					esp+='<option value="0" disabled="true" selected="true">--Especie--</option>';
					sub+='<option value="0" disabled="true" selected="true">--Subespecie--</option>';

					clase_div.find('.orden').html(" ");
					clase_div.find('.orden').append(ord);

					clase_div.find('.familia').html(" ");
					clase_div.find('.familia').append(fam);

					clase_div.find('.genero').html(" ");
					clase_div.find('.genero').append(gen);

					clase_div.find('.especie').html(" ");
					clase_div.find('.especie').append(esp);

					clase_div.find('.subespecie').html(" ");
					clase_div.find('.subespecie').append(sub);

				},
				error:function(){
					console.log('error');
				}
			});
		});

//ORDEN

		$(document).on('change','.orden',function(){

			console.log("estamos en orden");
			var orden_id = $(this).val();
			var orden_div = $(this).parent().parent().parent();
			console.log(orden_id);
			var fam = " ";
			console.log('vamos orden');
			console.log(orden_div);
			var gen = "";
			var esp = "";
			var sub = "";

			$.ajax({
				type : 'get',
				url : '{!! URL::to('buscaFamilia') !!}',
				data : {'id':orden_id},
				success:function(data){
					console.log('success');

					console.log(data);
					console.log(data.length);

					fam+='<option value="0" disabled="true" selected="true">--Familia--</option>';
					for(var i = 0 ; i < data.length ; i++ ){
					fam+='<option value="'+data[i].idFamilia+'">'+data[i].nombreFamilia+'</option>';

					}

					gen+='<option value="0" disabled="true" selected="true">--Género--</option>';
					esp+='<option value="0" disabled="true" selected="true">--Especie--</option>';
					sub+='<option value="0" disabled="true" selected="true">--Subespecie--</option>';

					orden_div.find('.familia').html(" ");
					orden_div.find('.familia').append(fam);

					orden_div.find('.genero').html(" ");
					orden_div.find('.genero').append(gen);

					orden_div.find('.especie').html(" ");
					orden_div.find('.especie').append(esp);

					orden_div.find('.subespecie').html(" ");
					orden_div.find('.subespecie').append(sub);
				},
				error:function(){
					console.log('error');
				}
			});
		});

//Familia

		$(document).on('change','.familia',function(){

			console.log("estamos en familia");
			var fam_id = $(this).val();
			var fam_div = $(this).parent().parent().parent();
			console.log(fam_id);
			var gen = " ";
			console.log('vamos familia');
			console.log(fam_div);
			var esp = "";
			var sub = "";

			$.ajax({
				type : 'get',
				url : '{!! URL::to('buscaGenero') !!}',
				data : {'id':fam_id},
				success:function(data){
					console.log('success');

					console.log(data);
					console.log(data.length);

					gen+='<option value="0" disabled="true" selected="true">--Género--</option>';
					for(var i = 0 ; i < data.length ; i++ ){
					gen+='<option value="'+data[i].idGenero+'">'+data[i].nombreGenero+'</option>';

					}

					esp+='<option value="0" disabled="true" selected="true">--Especie--</option>';
					sub+='<option value="0" disabled="true" selected="true">--Subespecie--</option>';

					fam_div.find('.genero').html(" ");
					fam_div.find('.genero').append(gen);

					fam_div.find('.especie').html(" ");
					fam_div.find('.especie').append(esp);

					fam_div.find('.subespecie').html(" ");
					fam_div.find('.subespecie').append(sub);

				},
				error:function(){
					console.log('error');
				}
			});
		});

//GENERO

		$(document).on('change','.genero',function(){

			console.log("estamos en genero");
			var gen_id = $(this).val();
			var gen_div = $(this).parent().parent().parent();
			console.log(gen_id);
			var esp = " ";
			console.log('vamos genero');
			console.log(gen_div);
			var sub = "";

			$.ajax({
				type : 'get',
				url : '{!! URL::to('buscaEspecie') !!}',
				data : {'id':gen_id},
				success:function(data){
					console.log('success');

					console.log(data);
					console.log(data.length);

					esp+='<option value="0" disabled="true" selected="true">--Especie--</option>';
					for(var i = 0 ; i < data.length ; i++ ){
					esp+='<option value="'+data[i].idEspecie+'">'+data[i].nombreEspecie+'</option>';

					}

					sub+='<option value="0" disabled="true" selected="true">--Subespecie--</option>';

					gen_div.find('.especie').html(" ");
					gen_div.find('.especie').append(esp);

					gen_div.find('.subespecie').html(" ");
					gen_div.find('.subespecie').append(sub);

				},
				error:function(){
					console.log('error');
					console.log(gen_id);

				}
			});

		});

//ESPECIE

		$(document).on('change','.especie',function(){

			console.log("estamos en especie");
			var esp_id = $(this).val();
			var esp_div = $(this).parent().parent().parent();
			console.log(esp_id);
			var esp = " ";
			console.log('vamos genero');
			console.log(esp_div);

			$.ajax({
				type : 'get',
				url : '{!! URL::to('buscaSubespecie') !!}',
				data : {'id':esp_id},
				success:function(data){
					console.log('success');

					console.log(data);
					console.log(data.length);

					esp+='<option value="0" disabled="true" selected="true">--Subespecie--</option>';
					for(var i = 0 ; i < data.length ; i++ ){
					esp+='<option value="'+data[i].idSubespecie+'">'+data[i].nombreSubespecie+'</option>';
					}
					esp_div.find('.subespecie').html(" ");
					esp_div.find('.subespecie').append(esp);
				},
				error:function(){
					console.log('error');
					console.log(esp_id);
				}
			});

		});


		///////////////////////////////////////////////////////////////// ///////////////////////////////

		$('#btn_reino').click(function(){
			$('#MSG_REINO').modal('hide');
		})


		/////////////////////////////////////////////////////////////////////////////////////////////////
		//////////////////////////////         HACEMOS CONSULTA      ////////////////////////////////////


		$('#consulta-esp-frm').on('submit',function(e){
		e.preventDefault();
		//alert('aqui estamos')


		var id_r = $('.reino').val();
		var id_d = $('.division').val();
		var id_c = $('.clase').val();
		var id_o = $('.orden').val();
		var id_f = $('.familia').val();
		var id_g = $('.genero').val();
		var id_e = $('.especie').val();
		var id_s = $('.subespecie').val();
		var tabla = $('#tabla_res');
		var i_e = "";
		var tab = "";
		var mensg = $('#msg_res');
		var i_a = "";
		//////////////////////USR ID/////////////////////////
		var usr_id = $('#usr_id').val();
		//alert(usr_id)

		console.log(id_r)
		console.log(id_d)
		console.log(id_c)
		console.log(id_o)
		console.log(id_f)
		console.log(id_g)
		console.log(id_e)
		console.log(id_s)

		var form = document.querySelector('#consulta-esp-frm');
	    var formdata = new FormData(form);
	    console.log(form)
	    console.log(formdata)

	    if(id_r == null && id_d == null && id_c == null && id_o == null && id_f == null && id_g == null && id_e == null){

	    	//alert('elija un reino')
	    	//$('#MSG_REINO').modal('show');
	    	sweetAlert("Seleccione una taxonomia", "", "warning");

	    }


	    if(id_r != null && id_d == null && id_c == null && id_o == null && id_f == null && id_g == null && id_e == null ){

	    	//alert('vamos reino')
	    	$.ajax({
            type : 'get',
            url  : '{!! URL::to('Consulta_x_reino_ESP') !!}',
            data : {'id':id_r},
            success:function(data){
            	console.log(data)
            	console.log(data.length)

            	tab = '<table id="resultados" class="table table-striped table-bordered table-hover" width="80%" cellspacing="0" style="background-color: white;" > <thead><tr><th>Reino</th><th>Division</th><th>Clase</th><th>Orden</th><th>Familia</th><th>Genero</th><th>Especie</th><th>Subespecie</th><th>Información</th></tr></thead> <tbody class="row_consulta"></tbody></table>';

            	if(data.length == 1){
            		msg = '<h1><p>Se encontro '+data.length+' resultado</p></h1>';
            	}else{
            		msg = '<h1><p>Se encontraron '+data.length+' resultados</p></h1>';
            	}
            	for(var i = 0 ; i < data.length ; i++ )
                    {

                    	if( data[i].nombreSubespecie ){

                    		i_e+= '<tr><td>'+data[i].nombreReino+'</td><td> '+ data[i].nombreDivision +'</td><td>'+data[i].nombreClase+' </td><td>'+data[i].nombreOrden+'</td><td>'+data[i].nombreFamilia +'</td><td>'+data[i].nombreGenero+'</td><td>'+data[i].nombreEspecie +'</td><td>'+data[i].nombreSubespecie +'</td><td><form method="get" action="Informacion_Sub" id="info_sub" ><input type="hidden" name="id_usuario" value="'+usr_id+'" ><input type="hidden" name="id_sub" value="'+data[i].idSubespecie+'" id="id_sub" class="" ><button  class="btn btn-default btn-sm btn-Ver_sub" value="'+data[i].idSubespecie+'" >Información</button></form></td></tr>';

                    	}else{

                    		i_e+= '<tr><td>'+data[i].nombreReino+'</td><td> '+ data[i].nombreDivision +'</td><td>'+data[i].nombreClase+' </td><td>'+data[i].nombreOrden+'</td><td>'+data[i].nombreFamilia +'</td><td>'+data[i].nombreGenero+'</td><td>'+data[i].nombreEspecie +'</td><td></td><td><form method="get" action="Informacion" id="info_esp" ><input type="hidden" name="id_usuario" value="'+usr_id+'" ><input type="hidden" name="id_esp" value="'+data[i].idEspecie+'" id="id_esp" class="" ><button class="btn btn-default btn-sm btn-Ver_esp" value="'+data[i].idEspecie+'" >Información</button></form></td></tr>';

                    	}




                    }
                    mensg.html("");
                    mensg.html(msg);
                    tabla.html("");
                    tabla.html(tab);
                    var row = $('.row_consulta').parent().parent();
                    row.find('.row_consulta').html(" ");
                    row.find('.row_consulta').append(i_e);



            },error:function(data){
            	console.log('error')
            }

        });


	    }

	    if(id_r != null && id_d != null && id_c == null && id_o == null && id_f == null && id_g == null && id_e == null ){

	    	//alert('vamos division')


	    	$.ajax({
            type : 'get',
            url  : '{!! URL::to('Consulta_x_Division_ESP') !!}',
            data : {'id':id_d},
            success:function(data){
            	console.log(data)
            	console.log(data.length)

            	tab = '<table id="resultados" class="table table-striped table-bordered table-hover" width="80%" cellspacing="0" style="background-color: white;" > <thead><tr><th>Reino</th><th>Division</th><th>Clase</th><th>Orden</th><th>Familia</th><th>Genero</th><th>Especie</th><th>Subespecie</th><th>Información</th></tr></thead> <tbody class="row_consulta"></tbody></table>';
            	if(data.length == 1){
            		msg = '<h1><p>Se encontro '+data.length+' resultado</p></h1>';
            	}else{
            		msg = '<h1><p>Se encontraron '+data.length+' resultados</p></h1>';
            	}
            	for(var i = 0 ; i < data.length ; i++ )
                    {

                    	if( data[i].nombreSubespecie ){

                    		i_e+= '<tr><td>'+data[i].nombreReino+'</td><td> '+ data[i].nombreDivision +'</td><td>'+data[i].nombreClase+' </td><td>'+data[i].nombreOrden+'</td><td>'+data[i].nombreFamilia +'</td><td>'+data[i].nombreGenero+'</td><td>'+data[i].nombreEspecie +'</td><td>'+data[i].nombreSubespecie +'</td><td><form method="get" action="Informacion_Sub" id="info_sub" ><input type="hidden" name="id_usuario" value="'+usr_id+'" ><input type="hidden" name="id_sub" value="'+data[i].idSubespecie+'" id="id_sub" class="" ><button  class="btn btn-default btn-sm btn-Ver_sub" value="'+data[i].idSubespecie+'" >Información</button></form></td></tr>';

                    	}else{

                    		i_e+= '<tr><td>'+data[i].nombreReino+'</td><td> '+ data[i].nombreDivision +'</td><td>'+data[i].nombreClase+' </td><td>'+data[i].nombreOrden+'</td><td>'+data[i].nombreFamilia +'</td><td>'+data[i].nombreGenero+'</td><td>'+data[i].nombreEspecie +'</td><td></td><td><form method="get" action="Informacion" id="info_esp" ><input type="hidden" name="id_usuario" value="'+usr_id+'" ><input type="hidden" name="id_esp" value="'+data[i].idEspecie+'" id="id_esp" class="" ><button class="btn btn-default btn-sm btn-Ver_esp" value="'+data[i].idEspecie+'" >Información</button></form></td></tr>';

                    	}


                    }
                    mensg.html("");
                    mensg.html(msg);
                    tabla.html("");
                    tabla.html(tab);
                    var row = $('.row_consulta').parent().parent();
                    row.find('.row_consulta').html(" ");
                    row.find('.row_consulta').append(i_e);


            },error:function(data){
            	console.log('error')
            }

        	});

	    }


	    if(id_r != null && id_d != null && id_c != null && id_o == null && id_f == null && id_g == null && id_e == null ){

	    	//alert('vamos clase')

	    	$.ajax({
            type : 'get',
            url  : '{!! URL::to('Consulta_x_Clase_ESP') !!}',
            data : {'id':id_c},
            success:function(data){
            	console.log(data)
            	console.log(data.length)

            	tab = '<table id="resultados" class="table table-striped table-bordered table-hover" width="80%" cellspacing="0" style="background-color: white;" > <thead><tr><th>Reino</th><th>Division</th><th>Clase</th><th>Orden</th><th>Familia</th><th>Genero</th><th>Especie</th><th>Subespecie</th><th>Información</th></tr></thead> <tbody class="row_consulta"></tbody></table>';
            	if(data.length == 1){
            		msg = '<h1><p>Se encontro '+data.length+' resultado</p></h1>';
            	}else{
            		msg = '<h1><p>Se encontraron '+data.length+' resultados</p></h1>';
            	}
            	for(var i = 0 ; i < data.length ; i++ )
                    {

                    	if( data[i].nombreSubespecie ){

                    		i_e+= '<tr><td>'+data[i].nombreReino+'</td><td> '+ data[i].nombreDivision +'</td><td>'+data[i].nombreClase+' </td><td>'+data[i].nombreOrden+'</td><td>'+data[i].nombreFamilia +'</td><td>'+data[i].nombreGenero+'</td><td>'+data[i].nombreEspecie +'</td><td>'+data[i].nombreSubespecie +'</td><td><form method="get" action="Informacion_Sub" id="info_sub" ><input type="hidden" name="id_usuario" value="'+usr_id+'" ><input type="hidden" name="id_sub" value="'+data[i].idSubespecie+'" id="id_sub" class="" ><button  class="btn btn-default btn-sm btn-Ver_sub" value="'+data[i].idSubespecie+'" >Información</button></form></td></tr>';

                    	}else{

                    		i_e+= '<tr><td>'+data[i].nombreReino+'</td><td> '+ data[i].nombreDivision +'</td><td>'+data[i].nombreClase+' </td><td>'+data[i].nombreOrden+'</td><td>'+data[i].nombreFamilia +'</td><td>'+data[i].nombreGenero+'</td><td>'+data[i].nombreEspecie +'</td><td></td><td><form method="get" action="Informacion" id="info_esp" ><input type="hidden" name="id_usuario" value="'+usr_id+'" ><input type="hidden" name="id_esp" value="'+data[i].idEspecie+'" id="id_esp" class="" ><button class="btn btn-default btn-sm btn-Ver_esp" value="'+data[i].idEspecie+'" >Información</button></form></td></tr>';

                    	}

                    }
                    mensg.html("");
                    mensg.html(msg);
                    tabla.html("");
                    tabla.html(tab);
                    var row = $('.row_consulta').parent().parent();
                    row.find('.row_consulta').html(" ");
                    row.find('.row_consulta').append(i_e);


            },error:function(data){
            	console.log('error')
            }

        	});



	    }


	    if(id_r != null && id_d != null && id_c != null && id_o != null && id_f == null && id_g == null && id_e == null ){

	    	//alert('vamos orden')

	    	$.ajax({
            type : 'get',
            url  : '{!! URL::to('Consulta_x_Orden_ESP') !!}',
            data : {'id':id_o},
            success:function(data){
            	console.log(data)
            	console.log(data.length)

            	tab = '<table id="resultados" class="table table-striped table-bordered table-hover" width="80%" cellspacing="0" style="background-color: white;" > <thead><tr><th scope="col">Reino</th><th scope="col">Division</th><th scope="col">Clase</th><th scope="col">Orden</th><th scope="col">Familia</th><th scope="col">Genero</th><th scope="col">Especie</th><th scope="col">Subespecie</th><th>Información</th></tr></thead> <tbody class="row_consulta"></tbody></table>';
            	if(data.length == 1){
            		msg = '<h1><p>Se encontro '+data.length+' resultado</p></h1>';
            	}else{
            		msg = '<h1><p>Se encontraron '+data.length+' resultados</p></h1>';
            	}
            	for(var i = 0 ; i < data.length ; i++ )
                    {
                   		if( data[i].nombreSubespecie ){

                    		i_e+= '<tr><td>'+data[i].nombreReino+'</td><td> '+ data[i].nombreDivision +'</td><td>'+data[i].nombreClase+' </td><td>'+data[i].nombreOrden+'</td><td>'+data[i].nombreFamilia +'</td><td>'+data[i].nombreGenero+'</td><td>'+data[i].nombreEspecie +'</td><td>'+data[i].nombreSubespecie +'</td><td><form method="get" action="Informacion_Sub" id="info_sub" ><input type="hidden" name="id_usuario" value="'+usr_id+'" ><input type="hidden" name="id_sub" value="'+data[i].idSubespecie+'" id="id_sub" class="" ><button  class="btn btn-default btn-sm btn-Ver_sub" value="'+data[i].idSubespecie+'" >Información</button></form></td></tr>';

                    	}else{

                    		i_e+= '<tr><td>'+data[i].nombreReino+'</td><td> '+ data[i].nombreDivision +'</td><td>'+data[i].nombreClase+' </td><td>'+data[i].nombreOrden+'</td><td>'+data[i].nombreFamilia +'</td><td>'+data[i].nombreGenero+'</td><td>'+data[i].nombreEspecie +'</td><td></td><td><form method="get" action="Informacion" id="info_esp" ><input type="hidden" name="id_usuario" value="'+usr_id+'" ><input type="hidden" name="id_esp" value="'+data[i].idEspecie+'" id="id_esp" class="" ><button class="btn btn-default btn-sm btn-Ver_esp" value="'+data[i].idEspecie+'" >Información</button></form></td></tr>';

                    	}
                    }
                    mensg.html("");
                    mensg.html(msg);
                    tabla.html("");
                    tabla.html(tab);
                    var row = $('.row_consulta').parent().parent();
                    row.find('.row_consulta').html(" ");
                    row.find('.row_consulta').append(i_e);


            },error:function(data){
            	console.log('error')
            }

        	});


	    }


	    if(id_r != null && id_d != null && id_c != null && id_o != null && id_f != null && id_g == null && id_e == null ){

	    	//alert('vamos familia')

	    	$.ajax({
            type : 'get',
            url  : '{!! URL::to('Consulta_x_Familia_ESP') !!}',
            data : {'id':id_f},
            success:function(data){
            	console.log(data)
            	console.log(data.length)

            	tab = '<table id="resultados" class="table table-striped table-bordered table-hover" width="80%" cellspacing="0" style="background-color: white;" > <thead><tr><th>Reino</th><th>Division</th><th>Clase</th><th>Orden</th><th>Familia</th><th>Genero</th><th>Especie</th><th>Subespecie</th><th>Información</th></tr></thead> <tbody class="row_consulta"></tbody></table>';
            	if(data.length == 1){
            		msg = '<h1><p>Se encontro '+data.length+' resultado</p></h1>';
            	}else{
            		msg = '<h1><p>Se encontraron '+data.length+' resultados</p></h1>';
            	}
            	for(var i = 0 ; i < data.length ; i++ )
                    {
                    	if( data[i].nombreSubespecie ){

                    		i_e+= '<tr><td>'+data[i].nombreReino+'</td><td> '+ data[i].nombreDivision +'</td><td>'+data[i].nombreClase+' </td><td>'+data[i].nombreOrden+'</td><td>'+data[i].nombreFamilia +'</td><td>'+data[i].nombreGenero+'</td><td>'+data[i].nombreEspecie +'</td><td>'+data[i].nombreSubespecie +'</td><td><form method="get" action="Informacion_Sub" id="info_sub" ><input type="hidden" name="id_usuario" value="'+usr_id+'" ><input type="hidden" name="id_sub" value="'+data[i].idSubespecie+'" id="id_sub" class="" ><button  class="btn btn-default btn-sm btn-Ver_sub" value="'+data[i].idSubespecie+'" >Información</button></form></td></tr>';

                    	}else{

                    		i_e+= '<tr><td>'+data[i].nombreReino+'</td><td> '+ data[i].nombreDivision +'</td><td>'+data[i].nombreClase+' </td><td>'+data[i].nombreOrden+'</td><td>'+data[i].nombreFamilia +'</td><td>'+data[i].nombreGenero+'</td><td>'+data[i].nombreEspecie +'</td><td></td><td><form method="get" action="Informacion" id="info_esp" ><input type="hidden" name="id_usuario" value="'+usr_id+'" ><input type="hidden" name="id_esp" value="'+data[i].idEspecie+'" id="id_esp" class="" ><button class="btn btn-default btn-sm btn-Ver_esp" value="'+data[i].idEspecie+'" >Información</button></form></td></tr>';

                    	}
                    }
                    mensg.html("");
                    mensg.html(msg);
                    tabla.html("");
                    tabla.html(tab);
                    var row = $('.row_consulta').parent().parent();
                    row.find('.row_consulta').html(" ");
                    row.find('.row_consulta').append(i_e);


            },error:function(data){
            	console.log('error')
            }

        	});


	    }


	    if(id_r != null && id_d != null && id_c != null && id_o != null && id_f != null && id_g != null && id_e == null ){

	    	//alert('vamos genero')

	    	$.ajax({
            type : 'get',
            url  : '{!! URL::to('Consulta_x_Genero_ESP') !!}',
            data : {'id':id_g},
            success:function(data){
            	console.log(data)
            	console.log(data.length)
            	if(data.length == 1){
            		msg = '<h1><p>Se encontro '+data.length+' resultado</p></h1>';
            	}else{
            		msg = '<h1><p>Se encontraron '+data.length+' resultados</p></h1>';
            	}
            	tab = '<table id="resultados" class="table table-striped table-bordered table-hover" width="80%" cellspacing="0" style="background-color: white;" > <thead><tr><th>Reino</th><th>Division</th><th>Clase</th><th>Orden</th><th>Familia</th><th>Genero</th><th>Especie</th><th>Subespecie</th><th>Información</th></tr></thead> <tbody class="row_consulta"></tbody></table>';

            	for(var i = 0 ; i < data.length ; i++ )
                    {
                    	if( data[i].nombreSubespecie ){

                    		i_e+= '<tr><td>'+data[i].nombreReino+'</td><td> '+ data[i].nombreDivision +'</td><td>'+data[i].nombreClase+' </td><td>'+data[i].nombreOrden+'</td><td>'+data[i].nombreFamilia +'</td><td>'+data[i].nombreGenero+'</td><td>'+data[i].nombreEspecie +'</td><td>'+data[i].nombreSubespecie +'</td><td><form method="get" action="Informacion_Sub" id="info_sub" ><input type="hidden" name="id_usuario" value="'+usr_id+'" ><input type="hidden" name="id_sub" value="'+data[i].idSubespecie+'" id="id_sub" class="" ><button  class="btn btn-default btn-sm btn-Ver_sub" value="'+data[i].idSubespecie+'" >Información</button></form></td></tr>';

                    	}else{

                    		i_e+= '<tr><td>'+data[i].nombreReino+'</td><td> '+ data[i].nombreDivision +'</td><td>'+data[i].nombreClase+' </td><td>'+data[i].nombreOrden+'</td><td>'+data[i].nombreFamilia +'</td><td>'+data[i].nombreGenero+'</td><td>'+data[i].nombreEspecie +'</td><td></td><td><form method="get" action="Informacion" id="info_esp" ><input type="hidden" name="id_usuario" value="'+usr_id+'" ><input type="hidden" name="id_esp" value="'+data[i].idEspecie+'" id="id_esp" class="" ><button class="btn btn-default btn-sm btn-Ver_esp" value="'+data[i].idEspecie+'" >Información</button></form></td></tr>';

                    	}
                    }
                    mensg.html("");
                    mensg.html(msg);
                    tabla.html("");
                    tabla.html(tab);
                    var row = $('.row_consulta').parent().parent();
                    row.find('.row_consulta').html(" ");
                    row.find('.row_consulta').append(i_e);


            },error:function(data){
            	console.log('error')
            }

        	});


	    }


	    if(id_r != null && id_d != null && id_c != null && id_o != null && id_f != null && id_g != null && id_e != null && id_s == null){

	    	//alert('vamos especie')

	    	$.ajax({
            type : 'get',
            url  : '{!! URL::to('Consulta_x_Especie_ESP') !!}',
            data : {'id':id_e},
            success:function(data){
            	console.log(data)
            	console.log(data.length)
            	if(data.length == 1){
            		msg = '<h1><p>Se encontro '+data.length+' resultado</p></h1>';
            	}else{
            		msg = '<h1><p>Se encontraron '+data.length+' resultados</p></h1>';
            	}
            	tab = '<table id="resultados" class="table table-striped table-bordered table-hover" width="80%" cellspacing="0" style="background-color: white;" > <thead><tr><th>Reino</th><th>Division</th><th>Clase</th><th>Orden</th><th>Familia</th><th>Genero</th><th>Especie</th><th>Subespecie</th><th>Información</th></tr></thead> <tbody class="row_consulta"></tbody></table>';

            	for(var i = 0 ; i < data.length ; i++ )
                    {

                    	if( data[i].nombreSubespecie ){

                    		i_e+= '<tr><td>'+data[i].nombreReino+'</td><td> '+ data[i].nombreDivision +'</td><td>'+data[i].nombreClase+' </td><td>'+data[i].nombreOrden+'</td><td>'+data[i].nombreFamilia +'</td><td>'+data[i].nombreGenero+'</td><td>'+data[i].nombreEspecie +'</td><td>'+data[i].nombreSubespecie +'</td><td><form method="get" action="Informacion_Sub" id="info_sub" ><input type="hidden" name="id_usuario" value="'+usr_id+'" ><input type="hidden" name="id_sub" value="'+data[i].idSubespecie+'" id="id_sub" class="" ><button  class="btn btn-default btn-sm btn-Ver_sub" value="'+data[i].idSubespecie+'" >Información</button></form></td></tr>';

                    	}else{

                    		i_e+= '<tr><td>'+data[i].nombreReino+'</td><td> '+ data[i].nombreDivision +'</td><td>'+data[i].nombreClase+' </td><td>'+data[i].nombreOrden+'</td><td>'+data[i].nombreFamilia +'</td><td>'+data[i].nombreGenero+'</td><td>'+data[i].nombreEspecie +'</td><td></td><td><form method="get" action="Informacion" id="info_esp" ><input type="hidden" name="id_usuario" value="'+usr_id+'" ><input type="hidden" name="id_esp" value="'+data[i].idEspecie+'" id="id_esp" class="" ><button class="btn btn-default btn-sm btn-Ver_esp" value="'+data[i].idEspecie+'" >Información</button></form></td></tr>';

                    	}

                    }
                    mensg.html("");
                    mensg.html(msg);
                    tabla.html("");
                    tabla.html(tab);
                    var row = $('.row_consulta').parent().parent();
                    row.find('.row_consulta').html(" ");
                    row.find('.row_consulta').append(i_e);


            },error:function(data){
            	console.log('error')
            }

        	});


	    }


	    if(id_r != null && id_d != null && id_c != null && id_o != null && id_f != null && id_g != null && id_e != null && id_s != null){

	    	//alert('vamos subespecie')

	    	$.ajax({
            type : 'get',
            url  : '{!! URL::to('Consulta_x_Subespecie') !!}',
            data : {'id':id_s},
            success:function(data){
            	console.log(data)
            	console.log(data.length)
            	if(data.length == 1){
            		msg = '<h1><p>Se encontro '+data.length+' resultado</p></h1>';
            	}else{
            		msg = '<h1><p>Se encontraron '+data.length+' resultados</p></h1>';
            	}
            	tab = '<table id="resultados" class="table table-striped table-bordered table-hover" width="80%" cellspacing="0" style="background-color: white;" > <thead><tr><th>Reino</th><th>Division</th><th>Clase</th><th>Orden</th><th>Familia</th><th>Genero</th><th>Especie</th> <th>Subespecie</th><th>Información</th></tr></thead> <tbody class="row_consulta"></tbody></table>';

            	for(var i = 0 ; i < data.length ; i++ )
                    {

                    	if( data[i].nombreSubespecie ){

                    		i_e+= '<tr><td>'+data[i].nombreReino+'</td><td> '+ data[i].nombreDivision +'</td><td>'+data[i].nombreClase+' </td><td>'+data[i].nombreOrden+'</td><td>'+data[i].nombreFamilia +'</td><td>'+data[i].nombreGenero+'</td><td>'+data[i].nombreEspecie +'</td><td>'+data[i].nombreSubespecie +'</td><td><form method="get" action="Informacion_Sub" id="info_sub" ><input type="hidden" name="id_usuario" value="'+usr_id+'" ><input type="hidden" name="id_sub" value="'+data[i].idSubespecie+'" id="id_sub" class="" ><button  class="btn btn-default btn-sm btn-Ver_sub" value="'+data[i].idSubespecie+'" >Información</button></form></td></tr>';

                    	}else{

                    		i_e+= '<tr><td>'+data[i].nombreReino+'</td><td> '+ data[i].nombreDivision +'</td><td>'+data[i].nombreClase+' </td><td>'+data[i].nombreOrden+'</td><td>'+data[i].nombreFamilia +'</td><td>'+data[i].nombreGenero+'</td><td>'+data[i].nombreEspecie +'</td><td></td><td><form method="get" action="Informacion" id="info_esp" ><input type="hidden" name="id_usuario" value="'+usr_id+'" ><input type="hidden" name="id_esp" value="'+data[i].idEspecie+'" id="id_esp" class="" ><button class="btn btn-default btn-sm btn-Ver_esp" value="'+data[i].idEspecie+'" >Información</button></form></td></tr>';

                    	}

                    }
                    mensg.html("");
                    mensg.html(msg);
                    tabla.html("");
                    tabla.html(tab);
                    var row = $('.row_consulta').parent().parent();
                    row.find('.row_consulta').html(" ");
                    row.find('.row_consulta').append(i_e);


            },error:function(data){
            	console.log('error')
            }

        	});
	}


	});


	//////////////////////////       MODALES PARA VER INFO DE ESP Y SUB       //////////////////////////

	////////////////////SOMETEMOS ID DE ESPECIE Y SUBESPECIE PARA VER //////////////////////////////

	$('#info_esp').on('submit',function(e){
			e.preventDefault();
			alert('aqui estamos especie');
			var form = this;
			$("#MSG_esp").modal('hide');
			form.submit();

	});

	$('#info_sub').on('submit',function(e){
			e.preventDefault();
			alert('aqui estamos subespecie');
			var form = this;
			$("#MSG_esp").modal('hide');
			form.submit();

	});


	////////////////////////////////     rutas donde vamos     /////////////////////////////////

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
