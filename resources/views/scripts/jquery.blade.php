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
		           		$('.estadoMarn').val('');
//
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
			$('.estadoMarn').val('');

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
			$('.estadoMarn').val('');

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
			$('.estadoMarn').val('');


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
			$('.estadoMarn').val('');

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
			$('.estadoMarn').val('');

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
			$('.estadoMarn').val('');

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
			$('.estadoMarn').val('');

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

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		//boton para agregar division

		$('#agr_div').click(function(){

			var pa_rei = $(this).parent().parent().parent();
			var pam_rei = $('#rm_id').parent().parent();
			var r_s = " ";

			console.log(pa_rei);
			console.log(pam_rei);

			var reino = $('#reino_id').val();
			console.log(reino);

			if(reino != null){
				//alert('ya no estamos nulos');

				$.ajax({

					type: 'get',
					url:'{!!  URL::to('pop_rei_div') !!}',
					data: {'id':reino},
					success:function(data){
						console.log('success le dimos')
						console.log(data);
						console.log(data.length);

						for(var i = 0 ; i < data.length ; i++ )
						{
						r_s+='<option value="'+data[i].idReino+'">'+data[i].nombreReino+'</option>';
						}

						pam_rei.find('.reino_modal').html(" ");
						pam_rei.find('.reino_modal').append(r_s);

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
							},
							error:function(){
								console.log('no se pudo agregar los reinos')
							}
						})

						$("#DIV_Modal").modal('show');

					},
					error:function(){
						console.log('sigue el error')
				}

				});


			}else{


				$.ajax({

				type : 'get',
				url : '{!! URL::to('ingr_div') !!}',
				data : {},
				success:function(data){
					console.log('lo hicimos bien')
					console.log(data)
					console.log(data.length)

					r_s += '<option value="0" disabled="true" selected="true"> -- Reino -- </option>';
					for(var i = 0 ; i < data.length ; i++ )
					{
						r_s+='<option value="'+data[i].idReino+'">'+data[i].nombreReino+'</option>';
					}
					pam_rei.find('.reino_modal').html(" ");
					pam_rei.find('.reino_modal').append(r_s);


					$("#DIV_Modal").modal('show');
					//$('#myModal').modal('hide')

				},
				error:function(){
					console.log('sigue el error')
				}

				});


			} // fin de else


		});


//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		//boton para guardar division


		$('#g_div').click(function(e){

			e.preventDefault();
			var divis = $('.division').parent().parent().parent();
			var frm_bus = $('#busqueda-frm');
			console.log(divis)
			var id_rei = $('#rm_id').val();
			var p_r = $('.reino_modal').parent().parent().parent();
			console.log(id_rei)

			var input = $('#rei_input_mod').val();
			console.log(input);
			var d_s = " ";
			var r_d = " ";
			var htr	= " ";
			var cla = "";
			var ord = "";
			var fam = "";
			var gen = "";
			var esp = "";
			var sub = "";
			//var data = $(this).serialize();

			$.ajax({
				type : 'post',
				url  : '{!! URL::to('ingr_div_modal') !!}',
				datatype: 'json',
				data : $('#div_modal').serialize(),
				/*{'idReino':id_rei,
						'nombreDivision':input,
						 "_token": "{{ csrf_token() }}",

				},*/
				success:function(data){
					console.log('success')
					//$("#DIV_Modal").modal('hide');
					console.log(data.errors)


					if(data.success == false){
						$('#_rei_input_mod,#_rei_mod').text('');
						$('#msg-error').fadeIn();


						$.each(data.errors , function(index,value){
							$('#_'+index).text(value);
						});

					}else{




					cla+='<option value="0" disabled="true" selected="true">--Clase--</option>';
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

					
						$.ajax({

						type : 'get',
						url  : '{!! URL::to('nueva_div') !!}',
						data : {'id': id_rei},

						success:function(data){
							console.log('si funciono el get')
							console.log(data)
							console.log(data.length)
							console.log(data)
							for(var i = 0 ; i < 1 ; i++ )
							{
							d_s+='<option value="'+data[i].idDivision+'">'+data[i].nombreDivision+'</option>';
							}
							divis.find('.division').html(" ");
							divis.find('.division').append(d_s);
							$("#DIV_Modal").modal('hide');
							r_d = '<option value="0" disabled="true" selected="true">--Reino--</option>';
							p_r.find('.reino_modal').html(" ");
							p_r.find('.reino_modal').append(r_d);
							p_r.find('#rei_input_mod').val(" ");
							$('#DIV_Modal').trigger("reset");
					
						},
						error:function(){
							console.log('NO FUNCIONO EL GET')
						}
					});
					$.ajax({
						type: 'get',
						url:'{!!  URL::to('pop_rei_div') !!}',
						data: {'id':id_rei},
						success:function(data){
							console.log('success le dimos')
							console.log(data);
							console.log(data.length);
							for(var i = 0 ; i < 1 ; i++ )
							{
							htr+='<option value="'+data[i].idReino+'">'+data[i].nombreReino+'</option>';
							}
							divis.find('.reino').html(" ");
							divis.find('.reino').append(htr);
						},
						error:function(){
							console.log('NO FUNCIONO EL GET')
						}
					});
						$('#msg-error').fadeOut();
						swal("Division ingresada", "", "success")
					}
			},
				error:function(data){
					console.log('no functiono el post')
					console.log(data)
			}
			});

			if(input != null ){

				//alert('')
			}else{
				$("#DIV_Modal").modal('hide');
			}


		});

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		//boton para GUARDAR CLASE


		$('#g_cla').click(function(e){

			e.preventDefault();
			var frm_bus = $('#busqueda-frm');

			var divis = $('.division').parent().parent().parent();
			var input = $('#cla_input_mod').val();
			var id_rei = $('#rcm_id').val();
			var id_div = $('#dm_id').val();

			var par_c = $('.reinoc_modal').parent().parent().parent();

			console.log(id_rei);
			console.log(id_div);
			console.log(id_div);
			var htr = "";
			var d_c = "";
			var c_d = "";
			var r_c = "";
			var di_c = "";
			var ord = "";
			var fam = "";
			var gen = "";
			var esp = "";
			var sub = "";



			$.ajax({
				type : 'post',
				url  : '{!! URL::to('ingr_cla_modal') !!}',
				datatype: 'json',
				data : $('#cla_modal').serialize(),
				/*
				data : {'idDivision':id_div,
						'nombreClase':input,
						 "_token": "{{ csrf_token() }}",
				*/
				success:function(data){
					console.log('success')
					//$("#DIV_Modal").modal('hide');
					console.log(data)

					if(data.success == false){


						$('#_cla_input_mod,#_div_mod').text('');

						$('#msg-error-clase').fadeIn();

						$.each(data.errors , function(index,value){
							$('#_'+index).text(value);
						});


					}else{

					ord+='<option value="0" disabled="true" selected="true">--Orden--</option>';
					fam+='<option value="0" disabled="true" selected="true">--Familia--</option>';
					gen+='<option value="0" disabled="true" selected="true">--Género--</option>';
					esp+='<option value="0" disabled="true" selected="true">--Especie--</option>';
					sub+='<option value="0" disabled="true" selected="true">--Subespecie--</option>';

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


						$.ajax({
						type: 'get',
						url:'{!!  URL::to('pop_rei_div') !!}',
						data: {'id':id_rei},
						success:function(data){
							console.log('success le dimos')
							console.log(data);
							console.log(data.length);
							for(var i = 0 ; i < 1 ; i++ )
							{
							htr+='<option value="'+data[i].idReino+'">'+data[i].nombreReino+'</option>';
							}
							divis.find('.reino').html(" ");
							divis.find('.reino').append(htr);
						},
						error:function(){
							console.log('NO FUNCIONO EL GET')
						}
						});


					$.ajax({

						type : 'get',
						url  : '{!! URL::to('nueva_cla') !!}',
						data : {'id': id_div},


						success:function(data){
							console.log('si funciono el get')
							console.log(data)
							//console.log(data.length)
							console.log(id_div)

							for(var i = 0 ; i < 1 ; i++ )
							{
							d_c+='<option value="'+data[i].idClase+'">'+data[i].nombreClase+'</option>';
							}

							divis.find('.clase').html(" ");
							divis.find('.clase').append(d_c);
							
						},
						error:function(){
							console.log('NO FUNCIONO EL GET')
						}

					});


					$.ajax({

						type : 'get',
						url  : '{!! URL::to('get_div_cla') !!}',
						data : {'id':id_div},
						success:function(data){
						console.log('aqui viene la division')
						for(var i = 0 ; i < 1 ; i++ )
							{
							c_d+='<option value="'+data[i].idDivision+'">'+data[i].nombreDivision+'</option>';
							}
							divis.find('.division').html(" ");
							divis.find('.division').append(c_d);
							$.ajax({
								type : 'get',
								url : '{!! URL::to('Busca_div_clase') !!}',
								data : {'id':id_rei},
								success:function(data){
									console.log('vamos agregar las divisiones')
									console.log(data)
									console.log(data.length)
									c_d="";
									for(var i = 0 ; i < data.length ; i++ )
									{
										c_d+='<option value="'+data[i].idDivision+'">'+data[i].nombreDivision+'</option>';
									}
									divis.find('.division').append(c_d);

									},
									error:function(){
									console.log('sigue el error')
									}
							})
						},
						error:function(){
						console.log('aqui hay un error')
						}
					});

					$("#CLA_Modal").modal('hide');
					$('#msg-error-clase').fadeOut();
					swal("Clase ingresada!", "", "success")

				}

					//BORRAMOS LOS CAMPOS DEL MODAL
					r_c = '<option value="0" disabled="true" selected="true">--Reino--</option>';
					di_c = '<option value="0" disabled="true" selected="true">--Division--</option>';

					par_c.find('.reinoc_modal').html(" ");
					par_c.find('.reinoc_modal').append(r_c);

					par_c.find('.divisionc').html(" ");
					par_c.find('.divisionc').val(di_c);

					par_c.find('#cla_input_mod').val(" ");





			},
				error:function(){
					console.log('sigue el error')
				}


			});

			if(input != null){

			}else{

				$("#CLA_Modal").modal('hide');
			}

		});


//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		//boton para GUARDAR ORDEN


		$('#g_ord').click(function(e){

			var frm_bus = $('#busqueda-frm');

			//alert('aqui vamos');
			e.preventDefault();
			var divis = $('.division').parent().parent().parent();
			var par_o = $('.reinoo').parent().parent().parent();
			var input = $('#ord_input_mod').val();
			var id_rei = $('#rom_id').val();
			var id_div = $('#dcm_id').val();
			var id_cla = $('#cm_id').val();
			var d_c = "";
			var c_d = "";
			var c_o = "";
			var htr = "";

			var r_ord = "";
			var d_ord = "";
			var c_ord = "";
			var fam = "";
			var gen = "";
			var esp = "";
			var sub = "";

			$.ajax({
				type : 'post',
				url  : '{!! URL::to('ingr_ord_modal') !!}',
				datatype: 'json',
				data : $('#ord_modal').serialize(),

				/*
				data : {'idClase':id_cla,
						'nombreOrden':input,
						 "_token": "{{ csrf_token() }}",

				},*/
				success:function(data){
					console.log('success')
					//$("#DIV_Modal").modal('hide');
					console.log(data)

					if(data.success == false){

						$('#_ord_input_mod,#_cla_ord').text('');

						$('#msg-error-orden').fadeIn();

						$.each(data.errors , function(index,value){
							$('#_'+index).text(value);
						});

					}else{

					fam+='<option value="0" disabled="true" selected="true">--Familia--</option>';
					gen+='<option value="0" disabled="true" selected="true">--Género--</option>';
					esp+='<option value="0" disabled="true" selected="true">--Especie--</option>';
					sub+='<option value="0" disabled="true" selected="true">--Subespecie--</option>';

					divis.find('.familia').html(" ");
					divis.find('.familia').append(fam);


					divis.find('.genero').html(" ");
					divis.find('.genero').append(gen);

					divis.find('.especie').html(" ");
					divis.find('.especie').append(esp);

					divis.find('.subespecie').html(" ");
					divis.find('.subespecie').append(sub);



						$.ajax({
						type: 'get',
						url:'{!!  URL::to('pop_rei_div') !!}',
						data: {'id':id_rei},
						success:function(data){
							console.log('success le dimos')
							console.log(data);
							console.log(data.length);
							for(var i = 0 ; i < 1 ; i++ )
							{
							htr+='<option value="'+data[i].idReino+'">'+data[i].nombreReino+'</option>';
							}
							divis.find('.reino').html(" ");
							divis.find('.reino').append(htr);
						},
						error:function(){
							console.log('NO FUNCIONO EL GET')
						}
					});

					$.ajax({

						type : 'get',
						url  : '{!! URL::to('nueva_ord') !!}',
						data : {'id': id_cla},

						success:function(data){
							console.log('si funciono el get')
							console.log(data)
							console.log(data.length)
							for(var i = 0 ; i < 1 ; i++ )
							{
							d_c+='<option value="'+data[i].idOrden+'">'+data[i].nombreOrden+'</option>';
							}
							divis.find('.orden').html(" ");
							divis.find('.orden').append(d_c);
							

							//SE BORRAN LOS CAMPOS
							r_ord = '<option value="0" disabled="true" selected="true">--Reino--</option>';
							d_ord = '<option value="0" disabled="true" selected="true">--Division--</option>';
							c_ord = '<option value="0" disabled="true" selected="true">--Clase--</option>';
							par_o.find('.reinoo').html("");
							par_o.find('.reinoo').append(r_ord);
							par_o.find('.divisiono').html("");
							par_o.find('.divisiono').append(d_ord);
							par_o.find('.claseo').html("");
							par_o.find('.claseo').append(c_ord);
							par_o.find('#ord_input_mod').val("");
							$("#ORD_Modal").modal('hide');

						},
						error:function(){
							console.log('NO FUNCIONO EL GET')
						}
					});

					$.ajax({

						type : 'get',
						url  : '{!! URL::to('get_div_ord') !!}',
						data : {'id':id_div},
						success:function(data){
						console.log('aqui viene la division')
						for(var i = 0 ; i < 1 ; i++ )
							{
							c_d+='<option value="'+data[i].idDivision+'">'+data[i].nombreDivision+'</option>';
							}
							divis.find('.division').html(" ");
							divis.find('.division').append(c_d);

							$.ajax({
								type : 'get',
								url : '{!! URL::to('Busca_div_clase') !!}',
								data : {'id':id_rei},
								success:function(data){
									console.log('vamos agregar las divisiones')
									console.log(data)
									console.log(data.length)
									c_d="";
									for(var i = 0 ; i < data.length ; i++ )
									{
										c_d+='<option value="'+data[i].idDivision+'">'+data[i].nombreDivision+'</option>';
									}
									divis.find('.division').append(c_d);

									},
									error:function(){
									console.log('sigue el error')
									}
							})
						},
						error:function(){
						console.log('aqui hay un error')
						}
					});

					$.ajax({

						type : 'get',
						url  : '{!! URL::to('get_cla_ord') !!}',
						data : {'id':id_cla},
						success:function(data){
						console.log('aqui viene la division')
						for(var i = 0 ; i < 1 ; i++ )
							{
							c_o+='<option value="'+data[i].idClase+'">'+data[i].nombreClase+'</option>';
							}
							divis.find('.clase').html(" ");
							divis.find('.clase').append(c_o);


							$.ajax({
								type : 'get',
								url : '{!! URL::to('Busca_cla_esp') !!}',
								data : {'id':id_div},
								success:function(data){
									console.log('vamos agregar las divisiones')
									console.log(data)
									console.log(data.length)
									c_o="";
									for(var i = 1 ; i < data.length ; i++ )
									{
										c_o+='<option value="'+data[i].idClase+'">'+data[i].nombreClase+'</option>';
									}
									divis.find('.clase').append(c_o);
									},
									error:function(){
									console.log('sigue el error')
									}
							})


						},
						error:function(){
						console.log('aqui hay un error')
						}
					});

					$('#msg-error-orden').fadeOut();
					swal("Orden ingresado!", "", "success")


				}



			},
				error:function(){
					console.log('sigue el error')
				}

			});

			if(input != null){

			}else{

				$("#ORD_Modal").modal('hide');
			}

			//$("#ORD_Modal").modal('hide');

		});


//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		//boton para GUARDAR FAMILIA



		$('#g_fam').click(function(e){

			var frm_bus = $('#busqueda-frm');

			e.preventDefault();
			var divis = $('.division').parent().parent().parent();
			var par_o = $('.reinof').parent().parent().parent();
			var input = $('#fam_input').val();
			var id_rei = $('#rfm_id').val();
			var id_div = $('#dfm_id').val();
			var id_cla = $('.clasef').val();
			var id_ord = $('#df_id').val();
			console.log(id_ord);
			var d_c = "";
			var c_d = "";
			var c_o = "";
			var f_o = "";
			var htr = "";

			var r_fam = "";
			var d_fam = "";
			var c_fam = "";
			var o_fam = "";
			var gen = "";
			var esp = "";
			var sub = "";


			$.ajax({
				type : 'post',
				url  : '{!! URL::to('ingr_fam_modal') !!}',
				datatype: 'json',
				data : $('#fam_modal').serialize(),
				/*data : {'idOrden':id_ord,
						'nombreFamilia':input,
						 "_token": "{{ csrf_token() }}",

				},*/
				success:function(data){
					console.log('success')
					//$("#DIV_Modal").modal('hide');
					console.log(data)

					if(data.success == false){

						$('#_fam_input,#_ord_fam').text('');

						$('#msg-error-familia').fadeIn();

						$.each(data.errors , function(index,value){
							$('#_'+index).text(value);
						});


					}else{

					gen+='<option value="0" disabled="true" selected="true">--Género--</option>';
					esp+='<option value="0" disabled="true" selected="true">--Especie--</option>';
					sub+='<option value="0" disabled="true" selected="true">--Subespecie--</option>';

					divis.find('.genero').html(" ");
					divis.find('.genero').append(gen);

					divis.find('.especie').html(" ");
					divis.find('.especie').append(esp);

					divis.find('.subespecie').html(" ");
					divis.find('.subespecie').append(sub);

						$.ajax({
						type: 'get',
						url:'{!!  URL::to('pop_rei_div') !!}',
						data: {'id':id_rei},
						success:function(data){
							console.log('success le dimos')
							console.log(data);
							console.log(data.length);
							for(var i = 0 ; i < 1 ; i++ )
							{
							htr+='<option value="'+data[i].idReino+'">'+data[i].nombreReino+'</option>';
							}
							divis.find('.reino').html(" ");
							divis.find('.reino').append(htr);
						},
						error:function(){
							console.log('NO FUNCIONO EL GET')
						}
					});

						$.ajax({

						type : 'get',
						url  : '{!! URL::to('nueva_fam') !!}',
						data : {'id': id_ord},

						success:function(data){
							console.log('si funciono el get')
							console.log(data)
							console.log(data.length)


							for(var i = 0 ; i < 1 ; i++ )
							{
							d_c+='<option value="'+data[i].idFamilia+'">'+data[i].nombreFamilia+'</option>';
							}

							divis.find('.familia').html(" ");
							divis.find('.familia').append(d_c);
							frm_bus.find('.reino').val(id_rei);

							r_fam = '<option value="0" disabled="true" selected="true">--Reino--</option>';
							d_fam = '<option value="0" disabled="true" selected="true">--Division--</option>';
							c_fam = '<option value="0" disabled="true" selected="true">--Clase--</option>';
							o_fam = '<option value="0" disabled="true" selected="true">--Orden--</option>';
							par_o.find('.reinof').html("");
							par_o.find('.reinof').append(r_fam);
							par_o.find('.divisionf').html("");
							par_o.find('.divisionf').append(d_fam);
							par_o.find('.clasef').html("");
							par_o.find('.clasef').append(c_fam);
							par_o.find('.ordenf').html("");
							par_o.find('.ordenf').append(o_fam);
							par_o.find('#fam_input').val("");


							$("#FAM_Modal").modal('hide');
							$('#FAM_Modal').trigger("reset");


						},
						error:function(){
							console.log('NO FUNCIONO EL GET')
						}

					});
					$.ajax({

						type : 'get',
						url  : '{!! URL::to('get_div_fam') !!}',
						data : {'id':id_div},
						success:function(data){
						console.log('aqui viene la division')
						for(var i = 0 ; i < 1 ; i++ )
							{
							c_d+='<option value="'+data[i].idDivision+'">'+data[i].nombreDivision+'</option>';
							}
							divis.find('.division').html(" ");
							divis.find('.division').append(c_d);
							$.ajax({
								type : 'get',
								url : '{!! URL::to('Busca_div_clase') !!}',
								data : {'id':id_rei},
								success:function(data){
									console.log('vamos agregar las divisiones')
									console.log(data)
									console.log(data.length)
									c_d="";
									for(var i = 0 ; i < data.length ; i++ )
									{
										c_d+='<option value="'+data[i].idDivision+'">'+data[i].nombreDivision+'</option>';
									}
									divis.find('.division').append(c_d);

									},
									error:function(){
									console.log('sigue el error')
									}
							})
						},
						error:function(){
						console.log('aqui hay un error')
						}
					});

					$.ajax({
						type : 'get',
						url  : '{!! URL::to('get_cla_fam') !!}',
						data : {'id':id_cla},
						success:function(data){
						console.log('aqui viene la division')
						for(var i = 0 ; i < 1 ; i++ )
							{
							c_o+='<option value="'+data[i].idClase+'">'+data[i].nombreClase+'</option>';
							}
							divis.find('.clase').html(" ");
							divis.find('.clase').append(c_o);
							$.ajax({
								type : 'get',
								url : '{!! URL::to('Busca_cla_esp') !!}',
								data : {'id':id_div},
								success:function(data){
									console.log('vamos agregar las divisiones')
									console.log(data)
									console.log(data.length)
									c_o="";
									for(var i = 1 ; i < data.length ; i++ )
									{
										c_o+='<option value="'+data[i].idClase+'">'+data[i].nombreClase+'</option>';
									}
									divis.find('.clase').append(c_o);
									},
									error:function(){
									console.log('sigue el error')
									}
							})
						},
						error:function(){
						console.log('aqui hay un error')
						}
					});

					$.ajax({

						type : 'get',
						url  : '{!! URL::to('get_ord_fam') !!}',
						data : {'id':id_ord},
						success:function(data){
						console.log('aqui viene la division')
						for(var i = 0 ; i < 1 ; i++ )
							{
							f_o+='<option value="'+data[i].idOrden+'">'+data[i].nombreOrden+'</option>';
							}
							divis.find('.orden').html(" ");
							divis.find('.orden').append(f_o);
							$.ajax({
								type : 'get',
								url : '{!! URL::to('Busca_ord_fam') !!}',
								data : {'id':id_cla},
								success:function(data){
									console.log('vamos agregar las divisiones')
									console.log(data)
									console.log(data.length)
									f_o="";
									for(var i = 1 ; i < data.length ; i++ )
									{
										f_o+='<option value="'+data[i].idOrden+'">'+data[i].nombreOrden+'</option>';
									}
									divis.find('.orden').append(f_o);
									},
									error:function(){
									console.log('sigue el error')
									}
							})
						},
						error:function(){
						console.log('aqui hay un error')
						}


					});

					$('#msg-error-familia').fadeOut();
					swal("Familia ingresada!", "", "success")






					}






			},
				error:function(){
					console.log('sigue el error')
				}

			});


			if(input != null){

			}else{

				$("#FAM_Modal").modal('hide');
			}

			//$("#FAM_Modal").modal('hide');

		});


//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		//boton para GUARDAR GENERO




		$('#g_gen').click(function(e){

			var frm_bus = $('#busqueda-frm');
			var par_o = $('.reinog').parent().parent().parent();

			e.preventDefault();
			var divis = $('.division').parent().parent().parent();
			var input = $('#gen_input_mod').val();

			var id_rei = $('#rgm_id').val();
			var id_div = $('#dg_id').val();
			var id_cla = $('.claseg').val();
			var id_ord = $('.ordeng').val();
			var if_fam = $('#fg_id').val();
			var d_c = "";
			var c_d = "";
			var c_o = "";
			var f_o = "";
			var g_f = "";
			var htr = "";
			var r_gen = "";
			var d_gen = "";
			var c_gen = "";
			var o_gen = "";
			var f_gen = "";
			var esp = "";
			var sub = "";

			$.ajax({
				type : 'post',
				url  : '{!! URL::to('ingr_gen_modal') !!}',
				datatype: 'json',
				data : $('#gen_modal').serialize(),
				/*
				data : {'idFamilia':if_fam,
						'nombreGenero':input,
						 "_token": "{{ csrf_token() }}",

				},*/
				success:function(data){
					console.log('success')
					//$("#DIV_Modal").modal('hide');
					console.log(data)

					if(data.success == false){

						$('#_gen_input,#_fam_gen').text('');

						$('#msg-error-genero').fadeIn();

						$.each(data.errors , function(index,value){
							$('#_'+index).text(value);
						});


					}else{

					esp+='<option value="0" disabled="true" selected="true">--Especie--</option>';
					sub+='<option value="0" disabled="true" selected="true">--Subespecie--</option>';

					divis.find('.especie').html(" ");
					divis.find('.especie').append(esp);

					divis.find('.subespecie').html(" ");
					divis.find('.subespecie').append(sub);

						$.ajax({
						type: 'get',
						url:'{!!  URL::to('pop_rei_div') !!}',
						data: {'id':id_rei},
						success:function(data){
							console.log('success le dimos')
							console.log(data);
							console.log(data.length);
							for(var i = 0 ; i < 1 ; i++ )
							{
							htr+='<option value="'+data[i].idReino+'">'+data[i].nombreReino+'</option>';
							}
							divis.find('.reino').html(" ");
							divis.find('.reino').append(htr);
						},
						error:function(){
							console.log('NO FUNCIONO EL GET')
						}
						});

						$.ajax({

						type : 'get',
						url  : '{!! URL::to('nueva_gen') !!}',
						data : {'id': if_fam},

						success:function(data){
							console.log('si funciono el get')
							console.log(data)
							console.log(data.length)


							for(var i = 0 ; i < 1 ; i++ )
							{
							d_c+='<option value="'+data[i].idGenero+'">'+data[i].nombreGenero+'</option>';
							}

							divis.find('.genero').html(" ");
							divis.find('.genero').append(d_c);
							frm_bus.find('.reino').val(id_rei);

							r_gen = '<option value="0" disabled="true" selected="true">--Reino--</option>';
							d_gen = '<option value="0" disabled="true" selected="true">--Division--</option>';
							c_gen = '<option value="0" disabled="true" selected="true">--Clase--</option>';
							o_gen = '<option value="0" disabled="true" selected="true">--Orden--</option>';
							f_gen = '<option value="0" disabled="true" selected="true">--Familia--</option>';
							par_o.find('.reinog').html("");
							par_o.find('.reinog').append(r_gen);
							par_o.find('.divisiong').html("");
							par_o.find('.divisiong').append(d_gen);
							par_o.find('.claseg').html("");
							par_o.find('.claseg').append(c_gen);
							par_o.find('.ordeng').html("");
							par_o.find('.ordeng').append(o_gen);
							par_o.find('.familiag').html("");
							par_o.find('.familiag').append(f_gen);
							par_o.find('#gen_input_mod').val("");



							$("#GEN_Modal").modal('hide');
							$('#GEN_Modal').trigger("reset");


						},
						error:function(){
							console.log('NO FUNCIONO EL GET')
						}

					});

					$.ajax({

						type : 'get',
						url  : '{!! URL::to('get_div_gen') !!}',
						data : {'id':id_div},
						success:function(data){
						console.log('aqui viene la division')
						for(var i = 0 ; i < 1 ; i++ )
							{
							c_d+='<option value="'+data[i].idDivision+'">'+data[i].nombreDivision+'</option>';
							}
							divis.find('.division').html(" ");
							divis.find('.division').append(c_d);
							$.ajax({
								type : 'get',
								url : '{!! URL::to('Busca_div_clase') !!}',
								data : {'id':id_rei},
								success:function(data){
									console.log('vamos agregar las divisiones')
									console.log(data)
									console.log(data.length)
									c_d="";
									for(var i = 0 ; i < data.length ; i++ )
									{
										c_d+='<option value="'+data[i].idDivision+'">'+data[i].nombreDivision+'</option>';
									}
									divis.find('.division').append(c_d);

									},
									error:function(){
									console.log('sigue el error')
									}
							})
						},
						error:function(){
						console.log('aqui hay un error')
						}
					});

					$.ajax({
						type : 'get',
						url  : '{!! URL::to('get_cla_gen') !!}',
						data : {'id':id_cla},
						success:function(data){
						console.log('aqui viene la division')
						for(var i = 0 ; i < 1 ; i++ )
							{
							c_o+='<option value="'+data[i].idClase+'">'+data[i].nombreClase+'</option>';
							}
							divis.find('.clase').html(" ");
							divis.find('.clase').append(c_o);
							$.ajax({
								type : 'get',
								url : '{!! URL::to('Busca_cla_esp') !!}',
								data : {'id':id_div},
								success:function(data){
									console.log('vamos agregar las divisiones')
									console.log(data)
									console.log(data.length)
									c_o="";
									for(var i = 1 ; i < data.length ; i++ )
									{
										c_o+='<option value="'+data[i].idClase+'">'+data[i].nombreClase+'</option>';
									}
									divis.find('.clase').append(c_o);
									},
									error:function(){
									console.log('sigue el error')
									}
							})
						},
						error:function(){
						console.log('aqui hay un error')
						}


					});

					$.ajax({

						type : 'get',
						url  : '{!! URL::to('get_ord_gen') !!}',
						data : {'id':id_ord},
						success:function(data){
						console.log('aqui viene el orden')
						for(var i = 0 ; i < 1 ; i++ )
							{
							f_o+='<option value="'+data[i].idOrden+'">'+data[i].nombreOrden+'</option>';
							}
							divis.find('.orden').html(" ");
							divis.find('.orden').append(f_o);
							$.ajax({
								type : 'get',
								url : '{!! URL::to('Busca_ord_fam') !!}',
								data : {'id':id_cla},
								success:function(data){
									console.log('vamos agregar las divisiones')
									console.log(data)
									console.log(data.length)
									f_o="";
									for(var i = 1 ; i < data.length ; i++ )
									{
										f_o+='<option value="'+data[i].idOrden+'">'+data[i].nombreOrden+'</option>';
									}
									divis.find('.orden').append(f_o);
									},
									error:function(){
									console.log('sigue el error')
									}
							})
						},
						error:function(){
						console.log('aqui hay un error')
						}


					});

					$.ajax({

						type : 'get',
						url  : '{!! URL::to('get_fam_gen') !!}',
						data : {'id':if_fam},
						success:function(data){
						console.log('aqui viene la familia')
						console.log(data)
						for(var i = 0 ; i < 1 ; i++ )
							{
							g_f+='<option value="'+data[i].idFamilia+'">'+data[i].nombreFamilia+'</option>';
							}
							divis.find('.familia').html(" ");
							divis.find('.familia').append(g_f);
							$.ajax({
								type : 'get',
								url : '{!! URL::to('Busca_fam_gen') !!}',
								data : {'id':id_ord},
								success:function(data){
									console.log('vamos agregar las divisiones')
									console.log(data)
									console.log(data.length)
									g_f="";
									for(var i = 0 ; i < data.length ; i++ )
									{
										g_f+='<option value="'+data[i].idFamilia+'">'+data[i].nombreFamilia+'</option>';
									}
									divis.find('.familia').append(g_f);
									},
									error:function(){
									console.log('sigue el error')
									}
							})

						},
						error:function(){
						console.log('aqui hay un error')
						}


					});

					$('#msg-error-genero').fadeOut();
					swal("Genero ingresado!", "", "success")



					}


			},
				error:function(){
					console.log('sigue el error')
				}

			});

			if(input != null){

			}else{

				$("#GEN_Modal").modal('hide');
			}

		});


//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		//boton para GUARDAR ESPECIE



		$('#g_esp').click(function(e){

			var frm_bus = $('#busqueda-frm');

			e.preventDefault();
			var divis = $('.division').parent().parent().parent();
			var par_o = $('.reinoe').parent().parent().parent();
			var input = $('#esp_input').val();

			var id_rei = $('#rem_id').val();
			var id_div = $('.divisione').val();
			var id_cla = $('.clasee').val();
			var id_ord = $('.ordene').val();
			var id_fam = $('#fe_id').val();
			var id_gen = $('#ge_id').val();
			var d_c = "";
			var c_d = "";
			var c_o = "";
			var f_o = "";
			var g_f = "";
			var g_e = "";
			var htr = "";

			var r_esp = "";
			var d_esp = "";
			var c_esp = "";
			var o_esp = "";
			var f_esp = "";
			var g_esp = "";
			var sub = "";



			$.ajax({
				type : 'post',
				url  : '{!! URL::to('ingr_esp_modal') !!}',
				datatype: 'json',
				data : $('#esp_modal').serialize(),
				/*
				data : {'idGenero':id_gen,
						'nombreEspecie':input,
						 "_token": "{{ csrf_token() }}",

				},*/
				success:function(data){
					console.log('success')
					//$("#DIV_Modal").modal('hide');
					console.log(data)

					if(data.success == false){

						$('#_esp_input,#_gen_esp').text('');

						$('#msg-error-especie').fadeIn();

						$.each(data.errors , function(index,value){
							$('#_'+index).text(value);
						});


					}else{

					sub+='<option value="0" disabled="true" selected="true">--Subespecie--</option>';

					divis.find('.subespecie').html(" ");
					divis.find('.subespecie').append(sub);

						$.ajax({
						type: 'get',
						url:'{!!  URL::to('pop_rei_div') !!}',
						data: {'id':id_rei},
						success:function(data){
							console.log('success le dimos')
							console.log(data);
							console.log(data.length);
							for(var i = 0 ; i < 1 ; i++ )
							{
							htr+='<option value="'+data[i].idReino+'">'+data[i].nombreReino+'</option>';
							}
							divis.find('.reino').html(" ");
							divis.find('.reino').append(htr);
						},
						error:function(){
							console.log('NO FUNCIONO EL GET')
						}
						});

						$.ajax({

						type : 'get',
						url  : '{!! URL::to('nueva_esp') !!}',
						data : {'id': id_gen},

						success:function(data){
							console.log('si funciono el get')
							console.log(data)
							console.log(data.length)


							for(var i = 0 ; i < 1 ; i++ )
							{
							d_c+='<option value="'+data[i].idEspecie+'">'+data[i].nombreEspecie+'</option>';
							}

							divis.find('.especie').html(" ");
							divis.find('.especie').append(d_c);
							frm_bus.find('.reino').val(id_rei);

							r_esp = '<option value="0" disabled="true" selected="true">--Reino--</option>';
							d_esp = '<option value="0" disabled="true" selected="true">--Division--</option>';
							c_esp = '<option value="0" disabled="true" selected="true">--Clase--</option>';
							o_esp = '<option value="0" disabled="true" selected="true">--Orden--</option>';
							f_esp = '<option value="0" disabled="true" selected="true">--Familia--</option>';
							g_esp = '<option value="0" disabled="true" selected="true">--Genero--</option>';
							par_o.find('.reinoe').html("");
							par_o.find('.reinoe').append(r_esp);
							par_o.find('.divisione').html("");
							par_o.find('.divisione').append(d_esp);
							par_o.find('.clasee').html("");
							par_o.find('.clasee').append(c_esp);
							par_o.find('.ordene').html("");
							par_o.find('.ordene').append(o_esp);
							par_o.find('.familiae').html("");
							par_o.find('.familiae').append(f_esp);
							par_o.find('.generoe').html("");
							par_o.find('.generoe').append(g_esp);

							par_o.find('#esp_input').val("");

							$("#ESP_Modal").modal('hide');


						},
						error:function(){
							console.log('NO FUNCIONO EL GET')
						}

					});

					$.ajax({

						type : 'get',
						url  : '{!! URL::to('get_div_esp') !!}',
						data : {'id':id_div},
						success:function(data){
						console.log('aqui viene la division')
						for(var i = 0 ; i < 1 ; i++ )
							{
							c_d+='<option value="'+data[i].idDivision+'">'+data[i].nombreDivision+'</option>';
							}
							divis.find('.division').html(" ");
							divis.find('.division').append(c_d);
							$.ajax({
								type : 'get',
								url : '{!! URL::to('Busca_div_clase') !!}',
								data : {'id':id_rei},
								success:function(data){
									console.log('vamos agregar las divisiones')
									console.log(data)
									console.log(data.length)
									c_d="";
									for(var i = 0 ; i < data.length ; i++ )
									{
										c_d+='<option value="'+data[i].idDivision+'">'+data[i].nombreDivision+'</option>';
									}
									divis.find('.division').append(c_d);

									},
									error:function(){
									console.log('sigue el error')
									}
							})

						},
						error:function(){
						console.log('aqui hay un error')
						}


					});

					$.ajax({

						type : 'get',
						url  : '{!! URL::to('get_cla_esp') !!}',
						data : {'id':id_cla},
						success:function(data){
						console.log('aqui viene la division')
						for(var i = 0 ; i < 1 ; i++ )
							{
							c_o+='<option value="'+data[i].idClase+'">'+data[i].nombreClase+'</option>';
							}
							divis.find('.clase').html(" ");
							divis.find('.clase').append(c_o);
							$.ajax({
								type : 'get',
								url : '{!! URL::to('Busca_cla_esp') !!}',
								data : {'id':id_div},
								success:function(data){
									console.log('vamos agregar las divisiones')
									console.log(data)
									console.log(data.length)
									c_o="";
									for(var i = 1 ; i < data.length ; i++ )
									{
										c_o+='<option value="'+data[i].idClase+'">'+data[i].nombreClase+'</option>';
									}
									divis.find('.clase').append(c_o);
									},
									error:function(){
									console.log('sigue el error')
									}
							})
						},
						error:function(){
						console.log('aqui hay un error')
						}


					});

					$.ajax({

						type : 'get',
						url  : '{!! URL::to('get_ord_esp') !!}',
						data : {'id':id_ord},
						success:function(data){
						console.log('aqui viene el orden')
						for(var i = 0 ; i < 1 ; i++ )
							{
							f_o+='<option value="'+data[i].idOrden+'">'+data[i].nombreOrden+'</option>';
							}
							divis.find('.orden').html(" ");
							divis.find('.orden').append(f_o);
							$.ajax({
								type : 'get',
								url : '{!! URL::to('Busca_ord_fam') !!}',
								data : {'id':id_cla},
								success:function(data){
									console.log('vamos agregar las divisiones')
									console.log(data)
									console.log(data.length)
									f_o="";
									for(var i = 1 ; i < data.length ; i++ )
									{
										f_o+='<option value="'+data[i].idOrden+'">'+data[i].nombreOrden+'</option>';
									}
									divis.find('.orden').append(f_o);
									},
									error:function(){
									console.log('sigue el error')
									}
							})

						},
						error:function(){
						console.log('aqui hay un error')
						}


					});

					$.ajax({

						type : 'get',
						url  : '{!! URL::to('get_fam_esp') !!}',
						data : {'id':id_fam},
						success:function(data){
						console.log('aqui viene la familia')
						console.log(data)
						for(var i = 0 ; i < 1 ; i++ )
							{
							g_f+='<option value="'+data[i].idFamilia+'">'+data[i].nombreFamilia+'</option>';
							}
							divis.find('.familia').html(" ");
							divis.find('.familia').append(g_f);
							$.ajax({
								type : 'get',
								url : '{!! URL::to('Busca_fam_gen') !!}',
								data : {'id':id_ord},
								success:function(data){
									console.log('vamos agregar las divisiones')
									console.log(data)
									console.log(data.length)
									g_f="";
									for(var i = 0 ; i < data.length ; i++ )
									{
										g_f+='<option value="'+data[i].idFamilia+'">'+data[i].nombreFamilia+'</option>';
									}
									divis.find('.familia').append(g_f);
									},
									error:function(){
									console.log('sigue el error')
									}
							})
						},
						error:function(){
						console.log('aqui hay un error')
						}


					});

					$.ajax({

						type : 'get',
						url  : '{!! URL::to('get_gen_esp') !!}',
						data : {'id':id_gen},
						success:function(data){
						console.log('aqui viene la familia')
						console.log(data)
						for(var i = 0 ; i < 1 ; i++ )
							{
							g_e+='<option value="'+data[i].idGenero+'">'+data[i].nombreGenero+'</option>';
							}
							divis.find('.genero').html(" ");
							divis.find('.genero').append(g_e);
							$.ajax({
								type : 'get',
								url : '{!! URL::to('Busca_gen_esp') !!}',
								data : {'id':id_fam},
								success:function(data){
									console.log('vamos agregar las divisiones')
									console.log(data)
									console.log(data.length)
									g_e="";
									for(var i = 0 ; i < data.length ; i++ )
									{
										g_e+='<option value="'+data[i].idGenero+'">'+data[i].nombreGenero+'</option>';
									}
									divis.find('.genero').append(g_e);
									},
									error:function(){
									console.log('sigue el error')
									}
							})


						},
						error:function(){
						console.log('aqui hay un error')
						}


					});


					$('#msg-error-especie').fadeOut();
					swal("Especie ingresada!", "", "success")


					}





			},
				error:function(){
					console.log('sigue el error')
				}

			});




			if(input != null){

			}else{

				$("#ESP_Modal").modal('hide');
			}

		});


//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		//boton para GUARDAR SUBESPECIE



		$('#g_sub').click(function(e){

			var frm_bus = $('#busqueda-frm');

			e.preventDefault();
			var divis = $('.division').parent().parent().parent();
			var par_o = $('.reinosu').parent().parent().parent();
			var input = $('#sub_input').val();


			var id_rei = $('#rem_su').val();
			var id_div = $('#d_su').val();
			var id_cla = $('#c_su').val();
			var id_ord = $('#o_su').val();
			var id_fam = $('#f_su').val();
			var id_gen = $('#g_su').val();
			var id_esp = $('#e_su').val();
			var id_sue = $('.especiesu').val();
			var d_c = "";
			var c_d = "";
			var c_o = "";
			var f_o = "";
			var g_f = "";
			var g_e = "";
			var g_s = "";
			var htr = "";
			var r_sub = "";
			var d_sub = "";
			var c_sub = "";
			var o_sub = "";
			var f_sub = "";
			var g_sub = "";
			var e_sub = "";

			$.ajax({
				type : 'post',
				url  : '{!! URL::to('ingr_sub_modal') !!}',
				datatype: 'json',
				data : $('#sub_modal').serialize(),
				/*
				data : {'idEspecie':id_esp,
						'nombreSubespecie':input,
						 "_token": "{{ csrf_token() }}",
				},*/
				success:function(data){
					console.log('success')
					//$("#DIV_Modal").modal('hide');
					console.log(data)


					if(data.success == false){

						$('#_sub_input,#_esp_sub').text('');

						$('#msg-error-subespecie').fadeIn();

						$.each(data.errors , function(index,value){
							$('#_'+index).text(value);
						});


					}else{

						$.ajax({
						type: 'get',
						url:'{!!  URL::to('pop_rei_div') !!}',
						data: {'id':id_rei},
						success:function(data){
							console.log('success le dimos')
							console.log(data);
							console.log(data.length);
							for(var i = 0 ; i < 1 ; i++ )
							{
							htr+='<option value="'+data[i].idReino+'">'+data[i].nombreReino+'</option>';
							}
							divis.find('.reino').html(" ");
							divis.find('.reino').append(htr);
						},
						error:function(){
							console.log('NO FUNCIONO EL GET')
						}
					});




						$.ajax({

						type : 'get',
						url  : '{!! URL::to('nueva_sub') !!}',
						data : {'id': id_esp},

						success:function(data){
							console.log('si funciono el get')
							console.log(data)
							console.log(data.length)


							for(var i = 0 ; i < 1 ; i++ )
							{
							d_c+='<option value="'+data[i].idSubespecie+'">'+data[i].nombreSubespecie+'</option>';
							}

							divis.find('.subespecie').html(" ");
							divis.find('.subespecie').append(d_c);
							frm_bus.find('.reino').val(id_rei);

							r_sub = '<option value="0" disabled="true" selected="true">--Reino--</option>';
							d_sub = '<option value="0" disabled="true" selected="true">--Division--</option>';
							c_sub = '<option value="0" disabled="true" selected="true">--Clase--</option>';
							o_sub = '<option value="0" disabled="true" selected="true">--Orden--</option>';
							f_sub = '<option value="0" disabled="true" selected="true">--Familia--</option>';
							g_sub = '<option value="0" disabled="true" selected="true">--Genero--</option>';
							e_sub = '<option value="0" disabled="true" selected="true">--Especie--</option>';
							par_o.find('.reinosu').html("");
							par_o.find('.reinosu').append(r_sub);
							par_o.find('.divisionsu').html("");
							par_o.find('.divisionsu').append(d_sub);
							par_o.find('.clasesu').html("");
							par_o.find('.clasesu').append(c_sub);
							par_o.find('.ordensu').html("");
							par_o.find('.ordensu').append(o_sub);
							par_o.find('.familiasu').html("");
							par_o.find('.familiasu').append(f_sub);
							par_o.find('.generosu').html("");
							par_o.find('.generosu').append(g_sub);
							par_o.find('.especiesu').html("");
							par_o.find('.especiesu').append(e_sub);

							par_o.find('#sub_input').val("");


							$("#SUB_Modal").modal('hide');
							$('#SUB_Modal').trigger("reset");




						},
						error:function(){
							console.log('NO FUNCIONO EL GET')
						}

					});

					$.ajax({

						type : 'get',
						url  : '{!! URL::to('get_div_sub') !!}',
						data : {'id':id_div},
						success:function(data){
						console.log('aqui viene la division')
						for(var i = 0 ; i < 1 ; i++ )
							{
							c_d+='<option value="'+data[i].idDivision+'">'+data[i].nombreDivision+'</option>';
							}
							divis.find('.division').html(" ");
							divis.find('.division').append(c_d);
							$.ajax({
								type : 'get',
								url : '{!! URL::to('Busca_div_clase') !!}',
								data : {'id':id_rei},
								success:function(data){
									console.log('vamos agregar las divisiones')
									console.log(data)
									console.log(data.length)
									c_d="";
									for(var i = 0 ; i < data.length ; i++ )
									{
										c_d+='<option value="'+data[i].idDivision+'">'+data[i].nombreDivision+'</option>';
									}
									divis.find('.division').append(c_d);

									},
									error:function(){
									console.log('sigue el error')
									}
							})


						},
						error:function(){
						console.log('aqui hay un error')
						}


					});

					$.ajax({

						type : 'get',
						url  : '{!! URL::to('get_cla_sub') !!}',
						data : {'id':id_cla},
						success:function(data){
						console.log('aqui viene la division')
						for(var i = 0 ; i < 1 ; i++ )
							{
							c_o+='<option value="'+data[i].idClase+'">'+data[i].nombreClase+'</option>';
							}
							divis.find('.clase').html(" ");
							divis.find('.clase').append(c_o);
							$.ajax({
								type : 'get',
								url : '{!! URL::to('Busca_cla_esp') !!}',
								data : {'id':id_div},
								success:function(data){
									console.log('vamos agregar las divisiones')
									console.log(data)
									console.log(data.length)
									c_o="";
									for(var i = 1 ; i < data.length ; i++ )
									{
										c_o+='<option value="'+data[i].idClase+'">'+data[i].nombreClase+'</option>';
									}
									divis.find('.clase').append(c_o);
									},
									error:function(){
									console.log('sigue el error')
									}
							})

						},
						error:function(){
						console.log('aqui hay un error')
						}


					});

					$.ajax({

						type : 'get',
						url  : '{!! URL::to('get_ord_sub') !!}',
						data : {'id':id_ord},
						success:function(data){
						console.log('aqui viene el orden')
						for(var i = 0 ; i < 1 ; i++ )
							{
							f_o+='<option value="'+data[i].idOrden+'">'+data[i].nombreOrden+'</option>';
							}
							divis.find('.orden').html(" ");
							divis.find('.orden').append(f_o);
							$.ajax({
								type : 'get',
								url : '{!! URL::to('Busca_ord_fam') !!}',
								data : {'id':id_cla},
								success:function(data){
									console.log('vamos agregar las divisiones')
									console.log(data)
									console.log(data.length)
									f_o="";
									for(var i = 1 ; i < data.length ; i++ )
									{
										f_o+='<option value="'+data[i].idOrden+'">'+data[i].nombreOrden+'</option>';
									}
									divis.find('.orden').append(f_o);
									},
									error:function(){
									console.log('sigue el error')
									}
							})


						},
						error:function(){
						console.log('aqui hay un error')
						}


					});

					$.ajax({

						type : 'get',
						url  : '{!! URL::to('get_fam_sub') !!}',
						data : {'id':id_fam},
						success:function(data){
						console.log('aqui viene la familia')
						console.log(data)
						for(var i = 0 ; i < 1 ; i++ )
							{
							g_f+='<option value="'+data[i].idFamilia+'">'+data[i].nombreFamilia+'</option>';
							}
							divis.find('.familia').html(" ");
							divis.find('.familia').append(g_f);
							$.ajax({
								type : 'get',
								url : '{!! URL::to('Busca_fam_gen') !!}',
								data : {'id':id_ord},
								success:function(data){
									console.log('vamos agregar las divisiones')
									console.log(data)
									console.log(data.length)
									g_f="";
									for(var i = 0 ; i < data.length ; i++ )
									{
										g_f+='<option value="'+data[i].idFamilia+'">'+data[i].nombreFamilia+'</option>';
									}
									divis.find('.familia').append(g_f);
									},
									error:function(){
									console.log('sigue el error')
									}
							})


						},
						error:function(){
						console.log('aqui hay un error')
						}


					});

					$.ajax({

						type : 'get',
						url  : '{!! URL::to('get_gen_sub') !!}',
						data : {'id':id_gen},
						success:function(data){
						console.log('aqui viene la familia')
						console.log(data)
						for(var i = 0 ; i < 1 ; i++ )
							{
							g_e+='<option value="'+data[i].idGenero+'">'+data[i].nombreGenero+'</option>';
							}
							divis.find('.genero').html(" ");
							divis.find('.genero').append(g_e);
							$.ajax({
								type : 'get',
								url : '{!! URL::to('Busca_gen_esp') !!}',
								data : {'id':id_fam},
								success:function(data){
									console.log('vamos agregar las divisiones')
									console.log(data)
									console.log(data.length)
									g_e="";
									for(var i = 0 ; i < data.length ; i++ )
									{
										g_e+='<option value="'+data[i].idGenero+'">'+data[i].nombreGenero+'</option>';
									}
									divis.find('.genero').append(g_e);
									},
									error:function(){
									console.log('sigue el error')
									}
							})

						},
						error:function(){
						console.log('aqui hay un error con genero sub ')
						}


					});

					$.ajax({

						type : 'get',
						url  : '{!! URL::to('get_esp_sub') !!}',
						data : {'id':id_esp},
						success:function(data){
						console.log('aqui viene la familia la especie de subespecie')
						console.log(data)
						for(var i = 0 ; i < 1 ; i++ )
							{
							g_s+='<option value="'+data[i].idEspecie+'">'+data[i].nombreEspecie+'</option>';
							}
							divis.find('.especie').html(" ");
							divis.find('.especie').append(g_s);
							$.ajax({
								type : 'get',
								url : '{!! URL::to('Busca_esp_sub') !!}',
								data : {'id':id_gen},
								success:function(data){
									console.log('vamos agregar las divisiones')
									console.log(data)
									console.log(data.length)
									g_s="";
									for(var i = 0 ; i < data.length ; i++ )
									{
										g_s+='<option value="'+data[i].idEspecie+'">'+data[i].nombreEspecie+'</option>';
									}
									divis.find('.especie').append(g_s);
									},
									error:function(){
									console.log('sigue el error')
									}
							})


						},
						error:function(){
						console.log('aqui hay un error con especie sub')
						}


					});

					$('#msg-error-subespecie').fadeOut();
					swal("Subespecie ingresada!", "", "success")

					}



			},
				error:function(){
					console.log('sigue el error')
				}

			});

			if(input != null){

			}else{

				$("#SUB_Modal").modal('hide');
			}

		});

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

	//botones de popups para agregar taxonomia JQUERY AJAX


		//agregar clase popup


		$('#agr_cla').click(function(){
			//alert('estoy en clase');
			//$('#CLA_Modal').modal('show');
			var pam_reic = $('#rcm_id').parent().parent();
			var par_div = $('.divisionc').parent().parent();



			console.log(pam_reic);
			var reino = $('#reino_id').val();
			var division = $('#division_id').val();
			var rc_s = " ";
			var d_c = "";


			if(division !=null){

				$.ajax({

					type: 'get',
					url:'{!!  URL::to('pop_rei_cla') !!}',
					data: {'id':reino},
					success:function(data){
						console.log('success le dimos')
						console.log(data);
						console.log(data.length);

						for(var i = 0 ; i < data.length ; i++ )
						{
						rc_s+='<option value="'+data[i].idReino+'">'+data[i].nombreReino+'</option>';
						}
						pam_reic.find('.reinoc_modal').html(" ");
						pam_reic.find('.reinoc_modal').append(rc_s);
						$.ajax({
							type : 'get',
							url : '{!! URL::to('pop_DIV_cla') !!}',
							data : {'id':division},
							success:function(data){
							console.log('success');
							for(var i = 0 ; i < data.length ; i++ )
							{
							d_c+='<option value="'+data[i].idDivision+'">'+data[i].nombreDivision+'</option>';
							}
							par_div.find('.divisionc').html(" ");
							par_div.find('.divisionc').append(d_c);
							$.ajax({
								type : 'get',
								url : '{!! URL::to('ingr_cla') !!}',
								data : {},
								success:function(data){
									console.log('lo hicimos bien clase')
									console.log(data)
									console.log(data.length)
									rc_s="";
									for(var i = 0 ; i < data.length ; i++ )
									{
										rc_s+='<option value="'+data[i].idReino+'">'+data[i].nombreReino+'</option>';
									}
									pam_reic.find('.reinoc_modal').append(rc_s);
									},
									error:function(){
									console.log('sigue el error')
									}
							})
							$.ajax({
								type : 'get',
								url : '{!! URL::to('Busca_div_clase') !!}',
								data : {'id':reino},
								success:function(data){
									console.log('vamos agregar las divisiones')
									console.log(data)
									console.log(data.length)
									d_c="";
									for(var i = 0 ; i < data.length ; i++ )
									{
										d_c+='<option value="'+data[i].idDivision+'">'+data[i].nombreDivision+'</option>';
									}
									par_div.find('.divisionc').append(d_c);
									},
									error:function(){
									console.log('sigue el error')
									}
							})




							},
							error:function(){
								console.log('error');
							}
						});



						$("#CLA_Modal").modal('show');

					},
					error:function(){
						console.log('sigue el error')
				}

				});



			}else if(reino != null){

				//alert('no esta vacio')


				var r_s = "";
				var par_c = $('.reinoc_modal').parent().parent();
				$.ajax({
				type: 'get',
					url:'{!!  URL::to('pop_rei_div') !!}',
					data: {'id':reino},
					success:function(data){
						console.log('success le dimos')
						console.log(data);
						console.log(data.length);

						for(var i = 0 ; i < data.length ; i++ )
						{
						r_s+='<option value="'+data[i].idReino+'">'+data[i].nombreReino+'</option>';
						}
						par_c.find('.reinoc_modal').html(" ");
						par_c.find('.reinoc_modal').append(r_s);
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
								par_c.find('.reinoc_modal').append(r_s);

							},
							error:function(){
								console.log('no se pudo agregar los reinos')
							}
						})
						$("#CLA_Modal").modal('show');


					},
					error:function(){
						console.log('sigue el error')
				}

				});



			}else{

				$.ajax({

				type : 'get',
				url : '{!! URL::to('ingr_cla') !!}',
				data : {},
				success:function(data){
					console.log('lo hicimos bien clase')
					console.log(data)
					console.log(data.length)

					rc_s += '<option value="0" disabled="true" selected="true"> -- Reino -- </option>';
					for(var i = 0 ; i < data.length ; i++ )
					{
						rc_s+='<option value="'+data[i].idReino+'">'+data[i].nombreReino+'</option>';
					}
					pam_reic.find('.reinoc_modal').html(" ");
					pam_reic.find('.reinoc_modal').append(rc_s);
					$('#CLA_Modal').modal('show');
					//$("#DIV_Modal").modal('show');
					//$('#myModal').modal('hide')
				},
				error:function(){
					console.log('sigue el error')
				}

			});
			}

		});


		//combo dinamico para division clase


		$(document).on('change','.reinoc_modal',function(){
			//alert('vamos con todo ');
			var pam_reic = $('#rcm_id').parent().parent();
			var par_div = $('.divisionc').parent().parent();
			var rein_id = $('#rcm_id').val();
			var d_c = " ";
			console.log(rein_id);
			$.ajax({
				type : 'get',
				url : '{!! URL::to('Busca_div_clase') !!}',
				data : {'id':rein_id},
				success:function(data){
					console.log('success');
					d_c+='<option value="0" disabled="true" selected="true"> -- Division --  </option>';
					for(var i = 0 ; i < data.length ; i++ ){
					d_c+='<option value="'+data[i].idDivision+'">'+data[i].nombreDivision+'</option>';
					}
					par_div.find('.divisionc').html(" ");
					par_div.find('.divisionc').append(d_c);
				},
				error:function(){
					console.log('error');
				}
			});

		});

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

		//POPUP de agregar orden


		$('#agr_ord').click(function(){
			//alert('estoy en orden')
			//$('#ORD_Modal').modal('show');
			var pam_reio = $('#rom_id').parent().parent();
			var par_ord = $('.divisiono').parent().parent().parent();

			console.log(pam_reio);
			var clase = $('#clase_id').val();
			var reino = $('#reino_id').val();
			var division = $('#division_id').val();

			var ro_s = " ";
			var d_c = "";
			var c_o = "";



			if(clase !=null){


				$.ajax({

					type: 'get',
					url:'{!!  URL::to('pop_rei_ord') !!}',
					data: {'id':reino},
					success:function(data){
						console.log('success le dimos')
						console.log(data);
						console.log(data.length);

						for(var i = 0 ; i < data.length ; i++ )
						{
						ro_s+='<option value="'+data[i].idReino+'">'+data[i].nombreReino+'</option>';
						}

						pam_reio.find('.reinoo').html(" ");
						pam_reio.find('.reinoo').append(ro_s);
						$.ajax({
							type : 'get',
							url : '{!! URL::to('ingr_cla') !!}',
							data : {},
							success:function(data){
							console.log('lo hicimos bien clase')
							console.log(data)
							console.log(data.length)
							ro_s="";
							for(var i = 0 ; i < data.length ; i++ )
							{
								ro_s+='<option value="'+data[i].idReino+'">'+data[i].nombreReino+'</option>';
							}
							pam_reio.find('.reinoo').append(ro_s);
							},
							error:function(){
							console.log('sigue el error')
							}
						})

						$.ajax({
							type : 'get',
							url : '{!! URL::to('pop_DIV_ord') !!}',
							data : {'id':division},
							success:function(data){
							console.log('success');
							for(var i = 0 ; i < data.length ; i++ )
							{
							d_c+='<option value="'+data[i].idDivision+'">'+data[i].nombreDivision+'</option>';
							}
							par_ord.find('.divisiono').html(" ");
							par_ord.find('.divisiono').append(d_c);
							$.ajax({
								type : 'get',
								url : '{!! URL::to('Busca_div_clase') !!}',
								data : {'id':reino},
								success:function(data){
									console.log('vamos agregar las divisiones')
									console.log(data)
									console.log(data.length)
									d_c="";
									for(var i = 0 ; i < data.length ; i++ )
									{
										d_c+='<option value="'+data[i].idDivision+'">'+data[i].nombreDivision+'</option>';
									}
									par_ord.find('.divisiono').append(d_c);
									},
									error:function(){
									console.log('sigue el error')
									}
							})


							},
							error:function(){
								console.log('error');
							}
						});

						$.ajax({
							type : 'get',
							url : '{!! URL::to('pop_CLA_ord') !!}',
							data : {'id':clase},
							success:function(data){
							console.log('success');
							for(var i = 0 ; i < data.length ; i++ )
							{
							c_o+='<option value="'+data[i].idClase+'">'+data[i].nombreClase+'</option>';
							}
							par_ord.find('.claseo').html(" ");
							par_ord.find('.claseo').append(c_o);
							$.ajax({
								type : 'get',
								url : '{!! URL::to('Busca_cla_fam') !!}',
								data : {'id':division},
								success:function(data){
									console.log('vamos agregar las divisiones')
									console.log(data)
									console.log(data.length)
									c_o="";
									for(var i = 0 ; i < data.length ; i++ )
									{
										c_o+='<option value="'+data[i].idClase+'">'+data[i].nombreClase+'</option>';
									}
									par_ord.find('.claseo').append(c_o);
									},
									error:function(){
									console.log('sigue el error')
									}
							})
							},
							error:function(){
								console.log('error');
							}
						});
						$("#ORD_Modal").modal('show');

					},
					error:function(){
						console.log('sigue el error')
				}

				});





			}else if( division !=null ){

				var rc_s = "";

				$.ajax({
							type : 'get',
							url : '{!! URL::to('pop_DIV_cla') !!}',
							data : {'id':division},
							success:function(data){
							console.log('success');
							for(var i = 0 ; i < data.length ; i++ )
							{
							d_c+='<option value="'+data[i].idDivision+'">'+data[i].nombreDivision+'</option>';
							}
							par_ord.find('.divisiono').html(" ");
							par_ord.find('.divisiono').append(d_c);
							$.ajax({
								type : 'get',
								url : '{!! URL::to('Busca_div_clase') !!}',
								data : {'id':reino},
								success:function(data){
									console.log('vamos agregar las divisiones')
									console.log(data)
									console.log(data.length)
									d_c="";
									for(var i = 0 ; i < data.length ; i++ )
									{
										d_c+='<option value="'+data[i].idDivision+'">'+data[i].nombreDivision+'</option>';
									}
									par_ord.find('.divisiono').append(d_c);
									},
									error:function(){
									console.log('sigue el error')
									}
							})
							$.ajax({
								type : 'get',
								url : '{!! URL::to('ingr_cla') !!}',
								data : {},
								success:function(data){
									console.log('lo hicimos bien clase')
									console.log(data)
									console.log(data.length)
									rc_s="";
									for(var i = 0 ; i < data.length ; i++ )
									{
										rc_s+='<option value="'+data[i].idReino+'">'+data[i].nombreReino+'</option>';
									}
									par_ord.find('.reinoo').append(rc_s);
									},
									error:function(){
									console.log('sigue el error')
									}
							})

							},
							error:function(){
								console.log('error');
							}
						});

			}else if( reino !=null ){

				var r_s = "";

				$.ajax({
				type: 'get',
					url:'{!!  URL::to('pop_rei_div') !!}',
					data: {'id':reino},
					success:function(data){
						console.log('success le dimos')
						console.log(data);
						console.log(data.length);

						for(var i = 0 ; i < data.length ; i++ )
						{
						r_s+='<option value="'+data[i].idReino+'">'+data[i].nombreReino+'</option>';
						}
						par_ord.find('.reinoc_modal').html(" ");
						par_ord.find('.reinoc_modal').append(r_s);
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
								par_ord.find('.reinoc_modal').append(r_s);

							},
							error:function(){
								console.log('no se pudo agregar los reinos')
							}
						})
						$("#ORD_Modal").modal('show');


					},
					error:function(){
						console.log('sigue el error')
				}

				});


			}else{


				$.ajax({

				type : 'get',
				url : '{!! URL::to('ingr_ord') !!}',
				data : {},
				success:function(data){
					console.log('lo hicimos bien clase')
					console.log(data)
					console.log(data.length)

					ro_s += '<option value="0" disabled="true" selected="true"> -- Reino -- </option>';
					for(var i = 0 ; i < data.length ; i++ )
					{
						ro_s+='<option value="'+data[i].idReino+'">'+data[i].nombreReino+'</option>';
					}
					pam_reio.find('.reinoo').html(" ");
					pam_reio.find('.reinoo').append(ro_s);

					$('#ORD_Modal').modal('show');

				},
				error:function(){
					console.log('sigue el error')
				}

			});


			}


		});


		$(document).on('change','.reinoo',function(){


			//alert('cambio reino orden');
			var reino_id = $(this).val();
			var par_ord = $('.divisiono').parent().parent();
			var par_cla = $('.claseo').parent().parent();

			console.log(reino_id);
			var r_o = " ";
			var cla = " ";
			console.log('aqi va');
			console.log(par_ord);

			$.ajax({
				type : 'get',
				url : '{!! URL::to('Busca_div_ord') !!}',
				data : {'id':reino_id},
				success:function(data){
					console.log('success');

					console.log(data);
					console.log(data.length);

					r_o+='<option value="0" disabled="true" selected="true"> -- Division -- </option>';
					for(var i = 0 ; i < data.length ; i++ ){
					r_o+='<option value="'+data[i].idDivision+'">'+data[i].nombreDivision+'</option>';

					}

					cla+='<option value="0" disabled="true" selected="true">--Clase--</option>';

					par_ord.find('.divisiono').html(" ");
					par_ord.find('.divisiono').append(r_o);
					par_cla.find('.claseo').html(" ");
					par_cla.find('.claseo').append(cla);


				},
				error:function(){
					console.log('error');
				}
			});



		});

		$(document).on('change','.divisiono',function(){


			//alert('cambio division orden');
			var div_id = $(this).val();
			var div = $('.claseo').parent().parent();
			console.log(div_id);
			var op = " ";
			console.log('aqi va');
			console.log(div);


			$.ajax({
				type : 'get',
				url : '{!! URL::to('Busca_cla_ord') !!}',
				data : {'id':div_id},
				success:function(data){
					console.log('success');

					console.log(data);
					console.log(data.length);

					op+='<option value="0" disabled="true" selected="true"> -- Clase -- :</option>';
					for(var i = 0 ; i < data.length ; i++ ){
					op+='<option value="'+data[i].idClase+'">'+data[i].nombreClase+'</option>';

					}

					div.find('.claseo').html(" ");
					div.find('.claseo').append(op);


				},
				error:function(){
					console.log('error');
				}
			});


		});






		//reino en familia



		$('#agr_fam').click(function(){
			//alert('estoy en familia')
			//$('#FAM_Modal').modal('show');
			var pam_reif = $('#rfm_id').parent().parent();
			var par_fam = $('.divisionf').parent().parent().parent();
			var rf_s = " ";
			console.log(pam_reif);

			var reino = $('#reino_id').val();
			var division = $('#division_id').val();
			var clase = $('#clase_id').val();
			var orden = $('#orden_id').val();
			var d_c = "";
			var c_f = "";
			var f_o = "";
			if(orden !=null){
				$.ajax({
					type: 'get',
					url:'{!!  URL::to('pop_rei_fam') !!}',
					data: {'id':reino},
					success:function(data){
						console.log('success le dimos')
						console.log(data);
						console.log(data.length);
						for(var i = 0 ; i < data.length ; i++ )
						{
						rf_s+='<option value="'+data[i].idReino+'">'+data[i].nombreReino+'</option>';
						}
						pam_reif.find('.reinof').html(" ");
						pam_reif.find('.reinof').append(rf_s);
						$.ajax({
							type : 'get',
							url : '{!! URL::to('ingr_fam') !!}',
							data : {},
							success:function(data){
								console.log('lo hicimos bien clase')
								console.log(data)
								console.log(data.length)
								rf_s="";
								for(var i = 0 ; i < data.length ; i++ )
								{
									rf_s+='<option value="'+data[i].idReino+'">'+data[i].nombreReino+'</option>';
								}
								pam_reif.find('.reinof').append(rf_s);
							},
							error:function(){
								console.log('sigue el error')
							}
						})
						$.ajax({
							type : 'get',
							url : '{!! URL::to('pop_DIV_fam') !!}',
							data : {'id':division},
							success:function(data){
							console.log('success');
							console.log(data);
							console.log(data.length);
							for(var i = 0 ; i < data.length ; i++ )
							{
							d_c+='<option value="'+data[i].idDivision+'">'+data[i].nombreDivision+'</option>';
							}
							par_fam.find('.divisionf').html(" ");
							par_fam.find('.divisionf').append(d_c);
							$.ajax({
								type : 'get',
								url : '{!! URL::to('Busca_div_clase') !!}',
								data : {'id':reino},
								success:function(data){
									console.log('vamos agregar las divisiones')
									console.log(data)
									console.log(data.length)
									d_c="";
									for(var i = 0 ; i < data.length ; i++ )
									{
										d_c+='<option value="'+data[i].idDivision+'">'+data[i].nombreDivision+'</option>';
									}
									par_fam.find('.divisionf').append(d_c);
									},
									error:function(){
									console.log('sigue el error')
									}
							})
							},
							error:function(){
								console.log('error');
							}
						});

						$.ajax({
							type : 'get',
							url : '{!! URL::to('pop_CLA_fam') !!}',
							data : {'id':clase},
							success:function(data){
							console.log('success');
							console.log(data);
							console.log(data.length);
							for(var i = 0 ; i < data.length ; i++ )
							{
							c_f+='<option value="'+data[i].idClase+'">'+data[i].nombreClase+'</option>';
							}
							par_fam.find('.clasef').html(" ");
							par_fam.find('.clasef').append(c_f);
							$.ajax({
								type : 'get',
								url : '{!! URL::to('Busca_cla_fam') !!}',
								data : {'id':division},
								success:function(data){
									console.log('vamos agregar las divisiones')
									console.log(data)
									console.log(data.length)
									c_f="";
									for(var i = 1 ; i < data.length ; i++ )
									{
										c_f+='<option value="'+data[i].idClase+'">'+data[i].nombreClase+'</option>';
									}
									par_fam.find('.clasef').append(c_f);
									},
									error:function(){
									console.log('sigue el error')
									}
							})
							},
							error:function(){
								console.log('error');
							}
						});
						$.ajax({
							type : 'get',
							url : '{!! URL::to('pop_ORD_fam') !!}',
							data : {'id':orden},
							success:function(data){
							console.log('success');
							console.log(data);
							console.log(data.length);
							for(var i = 0 ; i < data.length ; i++ )
							{
							f_o+='<option value="'+data[i].idOrden+'">'+data[i].nombreOrden+'</option>';
							}
							par_fam.find('.ordenf').html(" ");
							par_fam.find('.ordenf').append(f_o);
							$.ajax({
								type : 'get',
								url : '{!! URL::to('Busca_ord_fam') !!}',
								data : {'id':clase},
								success:function(data){
									console.log('vamos agregar las divisiones')
									console.log(data)
									console.log(data.length)
									f_o="";
									for(var i = 1 ; i < data.length ; i++ )
									{
										f_o+='<option value="'+data[i].idOrden+'">'+data[i].nombreOrden+'</option>';
									}
									par_fam.find('.ordenf').append(f_o);
									},
									error:function(){
									console.log('sigue el error')
									}
							})
							},
							error:function(){
								console.log('error');
							}
						});
						$("#FAM_Modal").modal('show');

					},
					error:function(){
						console.log('sigue el error')
				}

				});



			}else if( clase != null ){
				$('#FAM_Modal').modal('show');
			}else if( division != null ){
				$('#FAM_Modal').modal('show');
			}else if(reino != null){
				$('#FAM_Modal').modal('show');
			}else{


				$.ajax({

				type : 'get',
				url : '{!! URL::to('ingr_fam') !!}',
				data : {},
				success:function(data){
					console.log('lo hicimos bien clase')
					console.log(data)
					console.log(data.length)

					rf_s += '<option value="0" disabled="true" selected="true"> -- Reino -- </option>';
					for(var i = 0 ; i < data.length ; i++ )
					{
						rf_s+='<option value="'+data[i].idReino+'">'+data[i].nombreReino+'</option>';
					}
					pam_reif.find('.reinof').html(" ");
					pam_reif.find('.reinof').append(rf_s);

					$('#FAM_Modal').modal('show');

				},
				error:function(){
					console.log('sigue el error')
				}

			});


			}


		});




		$(document).on('change','.reinof',function(){


			//alert('cambio reino famillia');
			var reino_id = $(this).val();
			var par_ord = $('.divisionf').parent().parent();
			var par_c = $('.clasef').parent().parent();
			var par_o = $('.ordenf').parent().parent();



			console.log(reino_id);
			var r_o = " ";
			var c_f = " ";
			var c_o = " ";
			console.log('aqi va');
			console.log(par_ord);

			$.ajax({
				type : 'get',
				url : '{!! URL::to('Busca_div_fam') !!}',
				data : {'id':reino_id},
				success:function(data){
					console.log('success');

					console.log(data);
					console.log(data.length);

					r_o+='<option value="0" disabled="true" selected="true"> -- Division -- :</option>';
					for(var i = 0 ; i < data.length ; i++ ){
					r_o+='<option value="'+data[i].idDivision+'">'+data[i].nombreDivision+'</option>';

					}


					c_f+='<option value="0" disabled="true" selected="true"> -- Clase -- </option>';
					c_o+='<option value="0" disabled="true" selected="true"> -- Orden -- </option>';



					par_ord.find('.divisionf').html(" ");
					par_ord.find('.divisionf').append(r_o);

					par_c.find('.clasef').html(" ");
					par_c.find('.clasef').append(c_f);

					par_o.find('.ordenf').html(" ");
					par_o.find('.ordenf').append(c_o);




				},
				error:function(){
					console.log('error');
				}
			});

		});




		//carga reino en genero


		$('#agr_gen').click(function(){
			//alert('estoy en genero')
			//$('#GEN_Modal').modal('show');
			var pam_reig = $('.reinog').parent().parent().parent();
			var par_f = $('.familiag').parent().parent();
			var rg_s = " ";
			var d_c = "";
			var c_o = "";
			var f_o = "";
			var f_g = "";
			console.log(pam_reig);
			var reino = $('#reino_id').val();
			var division = $('#division_id').val();
			var clase = $('#clase_id').val();
			var orden = $('#orden_id').val();
			var familia = $('#familia_id').val();


			if(familia !=null){


				$.ajax({

					type: 'get',
					url:'{!!  URL::to('pop_rei_gen') !!}',
					data: {'id':reino},
					success:function(data){
						console.log('success le dimos')
						console.log(data);
						console.log(data.length);

						for(var i = 0 ; i < data.length ; i++ )
						{
						rg_s+='<option value="'+data[i].idReino+'">'+data[i].nombreReino+'</option>';
						}

						pam_reig.find('.reinog').html(" ");
						pam_reig.find('.reinog').append(rg_s);
						$.ajax({
							type : 'get',
							url : '{!! URL::to('ingr_gen') !!}',
							data : {},
							success:function(data){
								console.log('lo hicimos bien clase')
								console.log(data)
								console.log(data.length)
								rg_s="";
								for(var i = 1 ; i < data.length ; i++ )
								{
									rg_s+='<option value="'+data[i].idReino+'">'+data[i].nombreReino+'</option>';
								}
								pam_reig.find('.reinog').append(rg_s);
							},
							error:function(){
								console.log('sigue el error')
							}
						})
						$.ajax({
							type : 'get',
							url : '{!! URL::to('pop_DIV_gen') !!}',
							data : {'id':division},
							success:function(data){
							for(var i = 0 ; i < data.length ; i++ )
							{
							d_c+='<option value="'+data[i].idDivision+'">'+data[i].nombreDivision+'</option>';
							}
							pam_reig.find('.divisiong').html(" ");
							pam_reig.find('.divisiong').append(d_c);
							$.ajax({
								type : 'get',
								url : '{!! URL::to('Busca_div_clase') !!}',
								data : {'id':reino},
								success:function(data){
									console.log('vamos agregar las divisiones')
									console.log(data)
									console.log(data.length)
									d_c="";
									for(var i = 0 ; i < data.length ; i++ )
									{
										d_c+='<option value="'+data[i].idDivision+'">'+data[i].nombreDivision+'</option>';
									}
									pam_reig.find('.divisiong').append(d_c);
									},
									error:function(){
									console.log('sigue el error')
									}
							})
							},
							error:function(){
								console.log('error');
							}
						});

						$.ajax({
							type : 'get',
							url : '{!! URL::to('pop_CLA_gen') !!}',
							data : {'id':clase},
							success:function(data){
							console.log('success');
							console.log(data);
							console.log(data.length);
							for(var i = 0 ; i < data.length ; i++ )
							{
							c_o+='<option value="'+data[i].idClase+'">'+data[i].nombreClase+'</option>';
							}
							pam_reig.find('.claseg').html(" ");
							pam_reig.find('.claseg').append(c_o);
							$.ajax({
								type : 'get',
								url : '{!! URL::to('Busca_cla_fam') !!}',
								data : {'id':division},
								success:function(data){
									console.log('vamos agregar las divisiones')
									console.log(data)
									console.log(data.length)
									c_o="";
									for(var i = 1 ; i < data.length ; i++ )
									{
										c_o+='<option value="'+data[i].idClase+'">'+data[i].nombreClase+'</option>';
									}
									pam_reig.find('.claseg').append(c_o);
									},
									error:function(){
									console.log('sigue el error')
									}
							})
							},
							error:function(){
								console.log('error');
							}
						});

						$.ajax({
							type : 'get',
							url : '{!! URL::to('pop_ORD_gen') !!}',
							data : {'id':orden},
							success:function(data){
							console.log('success');
							console.log(data);
							console.log(data.length);
							for(var i = 0 ; i < data.length ; i++ )
							{
							f_o+='<option value="'+data[i].idOrden+'">'+data[i].nombreOrden+'</option>';
							}
							pam_reig.find('.ordeng').html(" ");
							pam_reig.find('.ordeng').append(f_o);
							$.ajax({
								type : 'get',
								url : '{!! URL::to('Busca_ord_fam') !!}',
								data : {'id':clase},
								success:function(data){
									console.log('vamos agregar las divisiones')
									console.log(data)
									console.log(data.length)
									f_o="";
									for(var i = 1 ; i < data.length ; i++ )
									{
										f_o+='<option value="'+data[i].idOrden+'">'+data[i].nombreOrden+'</option>';
									}
									pam_reig.find('.ordeng').append(f_o);
									},
									error:function(){
									console.log('sigue el error')
									}
							})
							},
							error:function(){
								console.log('error');
							}
						});

						$.ajax({
							type : 'get',
							url : '{!! URL::to('pop_FAM_gen') !!}',
							data : {'id':familia},
							success:function(data){
							console.log('success');
							console.log(data);
							console.log(data.length);
							for(var i = 0 ; i < data.length ; i++ )
							{
							f_g+='<option value="'+data[i].idFamilia+'">'+data[i].nombreFamilia+'</option>';
							}
							par_f.find('.familiag').html(" ");
							par_f.find('.familiag').append(f_g);
							$.ajax({
								type : 'get',
								url : '{!! URL::to('Busca_fam_gen') !!}',
								data : {'id':orden},
								success:function(data){
									console.log('vamos agregar las divisiones')
									console.log(data)
									console.log(data.length)
									f_g="";
									for(var i = 1 ; i < data.length ; i++ )
									{
										f_g+='<option value="'+data[i].idFamilia+'">'+data[i].nombreFamilia+'</option>';
									}
									par_f.find('.familiag').append(f_g);
									},
									error:function(){
									console.log('sigue el error')
									}
							})

							},
							error:function(){
								console.log('error');
							}
						});



						$("#GEN_Modal").modal('show');

					},
					error:function(){
						console.log('sigue el error')
				}

				});



			}else if( orden != null ){
				$('#GEN_Modal').modal('show');
			}else if( clase != null ){
				$('#GEN_Modal').modal('show');
			}else if( division != null ){
				$('#GEN_Modal').modal('show');
			}else if(reino != null){
				$('#GEN_Modal').modal('show');
			}else{


				$.ajax({

				type : 'get',
				url : '{!! URL::to('ingr_ord') !!}',
				data : {},
				success:function(data){
					console.log('lo hicimos bien clase')
					console.log(data)
					console.log(data.length)

					rg_s += '<option value="0" disabled="true" selected="true"> -- Reino -- </option>';
					for(var i = 0 ; i < data.length ; i++ )
					{
						rg_s+='<option value="'+data[i].idReino+'">'+data[i].nombreReino+'</option>';
					}
					pam_reig.find('.reinog').html(" ");
					pam_reig.find('.reinog').append(rg_s);


					//$('#CLA_Modal').modal('show');
					$('#GEN_Modal').modal('show');
					//$("#DIV_Modal").modal('show');
					//$('#myModal').modal('hide')

				},
				error:function(){
					console.log('sigue el error')
				}

			});


			}





		});




		$(document).on('change','.reinog',function(){


			//alert('cambio reino genero');
			var reino_id = $(this).val();
			var par_ord = $('.divisiong').parent().parent();
			var par_c = $('.claseg').parent().parent();
			var par_o = $('.ordeng').parent().parent();
			var par_f = $('.familiag').parent().parent();




			console.log(reino_id);
			var r_o = " ";
			var g_c = "";
			var g_o = "";
			var g_f = "";

			console.log('aqi va');
			console.log(par_ord);

			$.ajax({
				type : 'get',
				url : '{!! URL::to('Busca_div_gen') !!}',
				data : {'id':reino_id},
				success:function(data){
					console.log('success');

					console.log(data);
					console.log(data.length);

					r_o+='<option value="0" disabled="true" selected="true"> -- Division -- </option>';
					for(var i = 0 ; i < data.length ; i++ ){
					r_o+='<option value="'+data[i].idDivision+'">'+data[i].nombreDivision+'</option>';

					}

					g_c+='<option value="0" disabled="true" selected="true"> -- Clase -- </option>';
					g_o+='<option value="0" disabled="true" selected="true"> -- Orden -- </option>';
					g_f+='<option value="0" disabled="true" selected="true"> -- Familia -- </option>';



					par_ord.find('.divisiong').html(" ");
					par_ord.find('.divisiong').append(r_o);

					par_c.find('.claseg').html(" ");
					par_c.find('.claseg').append(g_c);

					par_o.find('.ordeng').html(" ");
					par_o.find('.ordeng').append(g_o);

					par_f.find('.familiag').html(" ");
					par_f.find('.familiag').append(g_f);



				},
				error:function(){
					console.log('error');
				}
			});

		});


		//carga REINO en ESPECIE


		$('#agr_esp').click(function(){
			//alert('estoy en especie')
			//$('#ESP_Modal').modal('show');
			var pam_reie = $('.reinoe').parent().parent().parent();
			var re_s = " ";
			var d_c = "";
			var c_o = "";
			var f_o = "";
			var f_g = "";
			var e_g = "";
			console.log(pam_reie);

			var reino = $('#reino_id').val();
			var division = $('#division_id').val();
			var clase = $('#clase_id').val();
			var orden = $('#orden_id').val();
			var familia = $('#familia_id').val();
			var genero = $('#genero_id').val();


			if(genero !=null){
				//alert('esta lleno')

				$.ajax({

					type: 'get',
					url:'{!!  URL::to('pop_rei_esp') !!}',
					data: {'id':reino},
					success:function(data){
						console.log('success le dimos')
						console.log(data);
						console.log(data.length);
						for(var i = 0 ; i < data.length ; i++ )
						{
						re_s+='<option value="'+data[i].idReino+'">'+data[i].nombreReino+'</option>';
						}
						pam_reie.find('.reinoe').html(" ");
						pam_reie.find('.reinoe').append(re_s);
						$.ajax({
							type : 'get',
							url : '{!! URL::to('ingr_gen') !!}',
							data : {},
							success:function(data){
								console.log('lo hicimos bien clase')
								console.log(data)
								console.log(data.length)
								re_s="";
								for(var i = 1 ; i < data.length ; i++ )
								{
									re_s+='<option value="'+data[i].idReino+'">'+data[i].nombreReino+'</option>';
								}
								pam_reie.find('.reinoe').append(re_s);
							},
							error:function(){
								console.log('sigue el error')
							}
						})
						$.ajax({
							type : 'get',
							url : '{!! URL::to('pop_DIV_esp') !!}',
							data : {'id':division},
							success:function(data){
							console.log('success');
							console.log(data);
							console.log(data.length);
							for(var i = 0 ; i < data.length ; i++ )
							{
							d_c+='<option value="'+data[i].idDivision+'">'+data[i].nombreDivision+'</option>';
							}
							pam_reie.find('.divisione').html(" ");
							pam_reie.find('.divisione').append(d_c);
							$.ajax({
								type : 'get',
								url : '{!! URL::to('Busca_div_clase') !!}',
								data : {'id':reino},
								success:function(data){
									console.log('vamos agregar las divisiones')
									console.log(data)
									console.log(data.length)
									d_c="";
									for(var i = 0 ; i < data.length ; i++ )
									{
										d_c+='<option value="'+data[i].idDivision+'">'+data[i].nombreDivision+'</option>';
									}
									pam_reie.find('.divisione').append(d_c);
									},
									error:function(){
									console.log('sigue el error')
									}
							})
							},
							error:function(){
								console.log('error');
							}
						});

						$.ajax({
							type : 'get',
							url : '{!! URL::to('pop_CLA_esp') !!}',
							data : {'id':clase},
							success:function(data){
							console.log('success');
							console.log(data);
							console.log(data.length);
							for(var i = 0 ; i < data.length ; i++ )
							{
							c_o+='<option value="'+data[i].idClase+'">'+data[i].nombreClase+'</option>';
							}
							pam_reie.find('.clasee').html(" ");
							pam_reie.find('.clasee').append(c_o);
							$.ajax({
								type : 'get',
								url : '{!! URL::to('Busca_cla_esp') !!}',
								data : {'id':division},
								success:function(data){
									console.log('vamos agregar las divisiones')
									console.log(data)
									console.log(data.length)
									c_o="";
									for(var i = 1 ; i < data.length ; i++ )
									{
										c_o+='<option value="'+data[i].idClase+'">'+data[i].nombreClase+'</option>';
									}
									pam_reie.find('.clasee').append(c_o);
									},
									error:function(){
									console.log('sigue el error')
									}
							})
							},
							error:function(){
								console.log('error');
							}
						});

						$.ajax({
							type : 'get',
							url : '{!! URL::to('pop_ORD_esp') !!}',
							data : {'id':orden},
							success:function(data){
							console.log('success');
							console.log(data);
							console.log(data.length);
							for(var i = 0 ; i < data.length ; i++ )
							{
							f_o+='<option value="'+data[i].idOrden+'">'+data[i].nombreOrden+'</option>';
							}
							pam_reie.find('.ordene').html(" ");
							pam_reie.find('.ordene').append(f_o);
							$.ajax({
								type : 'get',
								url : '{!! URL::to('Busca_ord_fam') !!}',
								data : {'id':clase},
								success:function(data){
									console.log('vamos agregar las divisiones')
									console.log(data)
									console.log(data.length)
									f_o="";
									for(var i = 1 ; i < data.length ; i++ )
									{
										f_o+='<option value="'+data[i].idOrden+'">'+data[i].nombreOrden+'</option>';
									}
									pam_reie.find('.ordene').append(f_o);
									},
									error:function(){
									console.log('sigue el error')
									}
							})
							},
							error:function(){
								console.log('error');
							}
						});

						$.ajax({
							type : 'get',
							url : '{!! URL::to('pop_FAM_esp') !!}',
							data : {'id':familia},
							success:function(data){
							console.log('success');
							console.log(data);
							console.log(data.length);
							for(var i = 0 ; i < data.length ; i++ )
							{
							f_g+='<option value="'+data[i].idFamilia+'">'+data[i].nombreFamilia+'</option>';
							}
							pam_reie.find('.familiae').html(" ");
							pam_reie.find('.familiae').append(f_g);
							$.ajax({
								type : 'get',
								url : '{!! URL::to('Busca_fam_gen') !!}',
								data : {'id':orden},
								success:function(data){
									console.log('vamos agregar las divisiones')
									console.log(data)
									console.log(data.length)
									f_g="";
									for(var i = 0 ; i < data.length ; i++ )
									{
										f_g+='<option value="'+data[i].idFamilia+'">'+data[i].nombreFamilia+'</option>';
									}
									pam_reie.find('.familiae').append(f_g);
									},
									error:function(){
									console.log('sigue el error')
									}
							})

							},
							error:function(){
								console.log('error');
							}
						});
						$.ajax({
							type : 'get',
							url : '{!! URL::to('pop_GEN_esp') !!}',
							data : {'id':genero},
							success:function(data){
							console.log('success');
							console.log(data);
							console.log(data.length);
							for(var i = 0 ; i < data.length ; i++ )
							{
							e_g+='<option value="'+data[i].idGenero+'">'+data[i].nombreGenero+'</option>';
							}
							pam_reie.find('.generoe').html(" ");
							pam_reie.find('.generoe').append(e_g);
							$.ajax({
								type : 'get',
								url : '{!! URL::to('Busca_gen_esp') !!}',
								data : {'id':familia},
								success:function(data){
									console.log('vamos agregar las divisiones')
									console.log(data)
									console.log(data.length)
									e_g="";
									for(var i = 0 ; i < data.length ; i++ )
									{
										e_g+='<option value="'+data[i].idGenero+'">'+data[i].nombreGenero+'</option>';
									}
									pam_reie.find('.generoe').append(e_g);
									},
									error:function(){
									console.log('sigue el error')
									}
							})
							},
							error:function(){
								console.log('error');
							}
						});
						$("#ESP_Modal").modal('show');
					},
					error:function(){
						console.log('sigue el error')
				}
				});
			}else if( familia != null ){
				$('#ESP_Modal').modal('show');
			}else if( orden != null ){
				$('#ESP_Modal').modal('show');
			}else if( clase != null ){
				$('#ESP_Modal').modal('show');
			}else if( division != null ){
				$('#ESP_Modal').modal('show');
			}else if( reino != null ){
				$('#ESP_Modal').modal('show');
			}else{
				$.ajax({
				type : 'get',
				url : '{!! URL::to('ingr_ord') !!}',
				data : {},
				success:function(data){
					console.log('lo hicimos bien clase')
					console.log(data)
					console.log(data.length)

					re_s += '<option value="0" disabled="true" selected="true"> -- Reino -- </option>';
					for(var i = 0 ; i < data.length ; i++ )
					{
						re_s+='<option value="'+data[i].idReino+'">'+data[i].nombreReino+'</option>';
					}
					pam_reie.find('.reinoe').html(" ");
					pam_reie.find('.reinoe').append(re_s);


					//$('#CLA_Modal').modal('show');
					$('#ESP_Modal').modal('show');
					//$("#DIV_Modal").modal('show');
					//$('#myModal').modal('hide')

				},
				error:function(){
					console.log('sigue el error')
				}

			});

			}
		});

		//agregar subespecie

		$('#agr_sub').click(function(){

			//alert('hola sub');
			//$('#SUB_Modal').modal('show');
			var pam_reie = $('.reinosu').parent().parent().parent();
			var re_s = " ";
			var d_c = "";
			var c_o = "";
			var f_o = "";
			var f_g = "";
			var e_g = "";
			var e_s = "";
			console.log(pam_reie);
			var reino = $('#reino_id').val();
			var division = $('#division_id').val();
			var clase = $('#clase_id').val();
			var orden = $('#orden_id').val();
			var familia = $('#familia_id').val();
			var genero = $('#genero_id').val();
			var especie = $('#especie_id').val();
			if(especie !=null){
				$.ajax({

					type: 'get',
					url:'{!!  URL::to('pop_rei_sub') !!}',
					data: {'id':reino},
					success:function(data){
						console.log('success le dimos')
						console.log(data);
						console.log(data.length);

						for(var i = 0 ; i < data.length ; i++ )
						{
						re_s+='<option value="'+data[i].idReino+'">'+data[i].nombreReino+'</option>';
						}

						pam_reie.find('.reinosu').html(" ");
						pam_reie.find('.reinosu').append(re_s);
						$.ajax({
							type : 'get',
							url : '{!! URL::to('ingr_esp') !!}',
							data : {},
							success:function(data){
								console.log('lo hicimos bien clase')
								console.log(data)
								console.log(data.length)
								re_s="";
								for(var i = 1 ; i < data.length ; i++ )
								{
									re_s+='<option value="'+data[i].idReino+'">'+data[i].nombreReino+'</option>';
								}
								pam_reie.find('.reinosu').append(re_s);
							},
							error:function(){
								console.log('sigue el error')
							}
						})
						$.ajax({
							type : 'get',
							url : '{!! URL::to('pop_DIV_sub') !!}',
							data : {'id':division},
							success:function(data){
							console.log('success');

							console.log(data);
							console.log(data.length);
							for(var i = 0 ; i < data.length ; i++ )
							{
							d_c+='<option value="'+data[i].idDivision+'">'+data[i].nombreDivision+'</option>';
							}
							pam_reie.find('.divisionsu').html(" ");
							pam_reie.find('.divisionsu').append(d_c);
							$.ajax({
								type : 'get',
								url : '{!! URL::to('Busca_div_clase') !!}',
								data : {'id':reino},
								success:function(data){
									console.log('vamos agregar las divisiones')
									console.log(data)
									console.log(data.length)
									d_c="";
									for(var i = 0 ; i < data.length ; i++ )
									{
										d_c+='<option value="'+data[i].idDivision+'">'+data[i].nombreDivision+'</option>';
									}
									pam_reie.find('.divisionsu').append(d_c);
									},
									error:function(){
									console.log('sigue el error')
									}
							})
							},
							error:function(){
								console.log('error');
							}
						});
						$.ajax({
							type : 'get',
							url : '{!! URL::to('pop_CLA_sub') !!}',
							data : {'id':clase},
							success:function(data){
							console.log('success');
							console.log(data);
							console.log(data.length);
							for(var i = 0 ; i < data.length ; i++ )
							{
							c_o+='<option value="'+data[i].idClase+'">'+data[i].nombreClase+'</option>';
							}
							pam_reie.find('.clasesu').html(" ");
							pam_reie.find('.clasesu').append(c_o);
							$.ajax({
								type : 'get',
								url : '{!! URL::to('Busca_cla_esp') !!}',
								data : {'id':division},
								success:function(data){
									console.log('vamos agregar las divisiones')
									console.log(data)
									console.log(data.length)
									c_o="";
									for(var i = 1 ; i < data.length ; i++ )
									{
										c_o+='<option value="'+data[i].idClase+'">'+data[i].nombreClase+'</option>';
									}
									pam_reie.find('.clasesu').append(c_o);
									},
									error:function(){
									console.log('sigue el error')
									}
							})
							},
							error:function(){
								console.log('error');
							}
						});

						$.ajax({
							type : 'get',
							url : '{!! URL::to('pop_ORD_sub') !!}',
							data : {'id':orden},
							success:function(data){
							console.log('success');
							console.log(data);
							console.log(data.length);
							for(var i = 0 ; i < data.length ; i++ )
							{
							f_o+='<option value="'+data[i].idOrden+'">'+data[i].nombreOrden+'</option>';
							}
							pam_reie.find('.ordensu').html(" ");
							pam_reie.find('.ordensu').append(f_o);
							$.ajax({
								type : 'get',
								url : '{!! URL::to('Busca_ord_fam') !!}',
								data : {'id':clase},
								success:function(data){
									console.log('vamos agregar las divisiones')
									console.log(data)
									console.log(data.length)
									f_o="";
									for(var i = 1 ; i < data.length ; i++ )
									{
										f_o+='<option value="'+data[i].idOrden+'">'+data[i].nombreOrden+'</option>';
									}
									pam_reie.find('.ordensu').append(f_o);
									},
									error:function(){
									console.log('sigue el error')
									}
							})
							},
							error:function(){
								console.log('error');
							}
						});
						$.ajax({
							type : 'get',
							url : '{!! URL::to('pop_FAM_sub') !!}',
							data : {'id':familia},
							success:function(data){
							console.log('success');

							console.log(data);
							console.log(data.length);
							for(var i = 0 ; i < data.length ; i++ )
							{
							f_g+='<option value="'+data[i].idFamilia+'">'+data[i].nombreFamilia+'</option>';
							}
							pam_reie.find('.familiasu').html(" ");
							pam_reie.find('.familiasu').append(f_g);
							$.ajax({
								type : 'get',
								url : '{!! URL::to('Busca_fam_gen') !!}',
								data : {'id':orden},
								success:function(data){
									console.log('vamos agregar las divisiones')
									console.log(data)
									console.log(data.length)
									f_g="";
									for(var i = 0 ; i < data.length ; i++ )
									{
										f_g+='<option value="'+data[i].idFamilia+'">'+data[i].nombreFamilia+'</option>';
									}
									pam_reie.find('.familiasu').append(f_g);
									},
									error:function(){
									console.log('sigue el error')
									}
							})
							},
							error:function(){
								console.log('error');
							}
						});
						$.ajax({
							type : 'get',
							url : '{!! URL::to('pop_GEN_sub') !!}',
							data : {'id':genero},
							success:function(data){
							console.log('success');

							console.log(data);
							console.log(data.length);
							for(var i = 0 ; i < data.length ; i++ )
							{
							e_g+='<option value="'+data[i].idGenero+'">'+data[i].nombreGenero+'</option>';
							}
							pam_reie.find('.generosu').html(" ");
							pam_reie.find('.generosu').append(e_g);
							$.ajax({
								type : 'get',
								url : '{!! URL::to('Busca_gen_esp') !!}',
								data : {'id':familia},
								success:function(data){
									console.log('vamos agregar las divisiones')
									console.log(data)
									console.log(data.length)
									e_g="";
									for(var i = 0 ; i < data.length ; i++ )
									{
										e_g+='<option value="'+data[i].idGenero+'">'+data[i].nombreGenero+'</option>';
									}
									pam_reie.find('.generosu').append(e_g);
									},
									error:function(){
									console.log('sigue el error')
									}
							})
							},
							error:function(){
								console.log('error');
							}
						});
						$.ajax({
							type : 'get',
							url : '{!! URL::to('pop_ESP_sub') !!}',
							data : {'id':especie},
							success:function(data){
							console.log('success');
							console.log(data);
							console.log(data.length);
							for(var i = 0 ; i < data.length ; i++ )
							{
							e_s+='<option value="'+data[i].idEspecie+'">'+data[i].nombreEspecie+'</option>';
							}
							pam_reie.find('.especiesu').html(" ");
							pam_reie.find('.especiesu').append(e_s);
							$.ajax({
								type : 'get',
								url : '{!! URL::to('Busca_esp_sub') !!}',
								data : {'id':genero},
								success:function(data){
									console.log('vamos agregar las divisiones')
									console.log(data)
									console.log(data.length)
									e_s="";
									for(var i = 0 ; i < data.length ; i++ )
									{
										e_s+='<option value="'+data[i].idEspecie+'">'+data[i].nombreEspecie+'</option>';
									}
									pam_reie.find('.especiesu').append(e_s);
									},
									error:function(){
									console.log('sigue el error')
									}
							})
							},
							error:function(){
								console.log('error');
							}
						});


						$("#SUB_Modal").modal('show');

					},
					error:function(){
						console.log('sigue el error')
				}

				});

			}else if( especie != null ){
				$('#SUB_Modal').modal('show');
			}else if( familia != null ){
				$('#SUB_Modal').modal('show');
			}else if( orden != null ){
				$('#SUB_Modal').modal('show');
			}else if( clase != null ){
				$('#SUB_Modal').modal('show');
			}else if( division != null ){
				$('#SUB_Modal').modal('show');
			}else if( reino != null ){
				$('#SUB_Modal').modal('show');
			}else{


				$.ajax({

				type : 'get',
				url : '{!! URL::to('ingr_sub') !!}',
				data : {},
				success:function(data){
					console.log('lo hicimos bien clase')
					console.log(data)
					console.log(data.length)

					re_s += '<option value="0" disabled="true" selected="true"> -- Reino -- </option>';
					for(var i = 0 ; i < data.length ; i++ )
					{
						re_s+='<option value="'+data[i].idReino+'">'+data[i].nombreReino+'</option>';
					}
					pam_reie.find('.reinosu').html(" ");
					pam_reie.find('.reinosu').append(re_s);


					//$('#CLA_Modal').modal('show');
					$('#SUB_Modal').modal('show');
					//$("#DIV_Modal").modal('show');
					//$('#myModal').modal('hide')

				},
				error:function(){
					console.log('sigue el error')
				}

			});


			}






		});



		$(document).on('change','.reinoe',function(){


			//alert('cambio reino especie');
			var reino_id = $(this).val();
			var par_ord = $('.divisione').parent().parent();
			var par_g = $('.generoe').parent().parent();
			var par_c = $('.clasee').parent().parent();
			var par_o = $('.ordene').parent().parent();
			var par_f = $('.familiae').parent().parent();

			console.log(reino_id);
			var r_o = " ";
			var g_e = " ";
			var g_c = "";
			var g_o = "";
			var g_f = "";
			console.log('aqi va');
			console.log(par_ord);

			$.ajax({
				type : 'get',
				url : '{!! URL::to('Busca_div_esp') !!}',
				data : {'id':reino_id},
				success:function(data){
					console.log('success');

					console.log(data);
					console.log(data.length);

					r_o+='<option value="0" disabled="true" selected="true"> -- Division -- :</option>';
					for(var i = 0 ; i < data.length ; i++ ){
					r_o+='<option value="'+data[i].idDivision+'">'+data[i].nombreDivision+'</option>';

					}

					g_c+='<option value="0" disabled="true" selected="true"> -- Clase -- </option>';
					g_o+='<option value="0" disabled="true" selected="true"> -- Orden -- </option>';
					g_f+='<option value="0" disabled="true" selected="true"> -- Familia -- </option>';
					g_e+='<option value="0" disabled="true" selected="true"> -- Genero -- </option>';

					par_ord.find('.divisione').html(" ");
					par_ord.find('.divisione').append(r_o);


					par_c.find('.clasee').html(" ");
					par_c.find('.clasee').append(g_c);

					par_o.find('.ordene').html(" ");
					par_o.find('.ordene').append(g_o);

					par_f.find('.familiae').html(" ");
					par_f.find('.familiae').append(g_f);

					par_g.find('.generoe').html(" ");
					par_g.find('.generoe').append(g_e);





				},
				error:function(){
					console.log('error');
				}
			});


		});

		$(document).on('change','.reinosu',function(){

			//alert('cambio reino SUBespecie');
			var reino_id = $(this).val();
			var par_ord = $('.divisionsu').parent().parent();
			var par_g = $('.generosu').parent().parent().parent();
			var par_c = $('.clasesu').parent().parent().parent();
			var par_o = $('.ordensu').parent().parent().parent();
			var par_f = $('.familiasu').parent().parent().parent();
			var par_e = $('.especiesu').parent().parent().parent();


			console.log(reino_id);
			var r_o = " ";
			var g_e = " ";
			var g_c = "";
			var g_o = "";
			var g_f = "";
			var e_s = "";
			console.log('aqi va');
			console.log(par_ord);

			$.ajax({
				type : 'get',
				url : '{!! URL::to('Busca_div_sub') !!}',
				data : {'id':reino_id},
				success:function(data){
					console.log('success');

					console.log(data);
					console.log(data.length);

					r_o+='<option value="0" disabled="true" selected="true"> -- Division -- </option>';
					for(var i = 0 ; i < data.length ; i++ ){
					r_o+='<option value="'+data[i].idDivision+'">'+data[i].nombreDivision+'</option>';

					}

					g_c+='<option value="0" disabled="true" selected="true"> -- Clase -- </option>';
					g_o+='<option value="0" disabled="true" selected="true"> -- Orden -- </option>';
					g_f+='<option value="0" disabled="true" selected="true"> -- Familia -- </option>';
					g_e+='<option value="0" disabled="true" selected="true"> -- Genero -- </option>';
					e_s+='<option value="0" disabled="true" selected="true"> -- Especie -- </option>';


					par_ord.find('.divisionsu').html(" ");
					par_ord.find('.divisionsu').append(r_o);

					par_c.find('.clasesu').html(" ");
					par_c.find('.clasesu').append(g_c);

					par_o.find('.ordensu').html(" ");
					par_o.find('.ordensu').append(g_o);

					par_f.find('.familiasu').html(" ");
					par_f.find('.familiasu').append(g_f);

					par_g.find('.generosu').html(" ");
					par_g.find('.generosu').append(g_e);


					par_e.find('.especiesu').html(" ");
					par_e.find('.especiesu').append(e_s);



				},
				error:function(){
					console.log('error');
				}
			});





		});



		//cambios de clase en fam gen y esp y subesp

		$(document).on('change','.divisionf',function(){


			//alert('estamos division familia');
			console.log("estamos en clase familia");
			var division_id = $(this).val();
			var divis = $('.clasef').parent().parent();
			var par_o = $('.ordenf').parent().parent().parent();
			var par_f = $('.familiaf').parent().parent().parent();
			var par_g = $('.generof').parent().parent().parent();
			var par_e = $('.especief').parent().parent().parent();

			console.log(division_id);
			var cla = " ";
			var s_o = "";
			var s_f = "";
			var s_g = "";
			var s_e = "";


			console.log('aqi va');
			console.log(divis);

			$.ajax({
				type : 'get',
				url : '{!! URL::to('Busca_cla_fam') !!}',
				data : {'id':division_id},
				success:function(data){
					console.log('success');

					console.log(data);
					console.log(data.length);

					cla+='<option value="0" disabled="true" selected="true"> -- Clase -- </option>';
					for(var i = 0 ; i < data.length ; i++ ){
					cla+='<option value="'+data[i].idClase+'">'+data[i].nombreClase+'</option>';

					}

					s_o+='<option value="0" disabled="true" selected="true"> -- Orden -- </option>';
					s_f+='<option value="0" disabled="true" selected="true"> -- Familia -- </option>';
					s_g+='<option value="0" disabled="true" selected="true"> -- Genero -- </option>';
					s_e+='<option value="0" disabled="true" selected="true"> -- Especie -- </option>';

					divis.find('.clasef').html(" ");
					divis.find('.clasef').append(cla);

					par_o.find('.ordenf').html(" ");
					par_o.find('.ordenf').append(s_o);

					par_f.find('.familiaf').html(" ");
					par_f.find('.familiaf').append(s_f);

					par_g.find('.generof').html(" ");
					par_g.find('.generof').append(s_g);


					par_e.find('.especief').html(" ");
					par_e.find('.especief').append(s_e);


				},
				error:function(){
					console.log('error');
				}
			});

		});

		$(document).on('change','.divisiong',function(){



			//alert('estamos division genero');
			var division_id = $(this).val();
			var divis = $('.claseg').parent().parent();
			var par_o = $('.ordeng').parent().parent().parent();
			var par_f = $('.familiag').parent().parent().parent();
			var par_g = $('.generog').parent().parent().parent();
			var par_e = $('.especieg').parent().parent().parent();




			console.log(division_id);
			var cla = " ";
			var s_o = "";
			var s_f = "";
			var s_g = "";
			var s_e = "";
			console.log('aqi va');
			console.log(divis);

			$.ajax({
				type : 'get',
				url : '{!! URL::to('Busca_cla_esp') !!}',
				data : {'id':division_id},
				success:function(data){
					console.log('success');

					console.log(data);
					console.log(data.length);

					cla+='<option value="0" disabled="true" selected="true"> -- Clase -- </option>';
					for(var i = 0 ; i < data.length ; i++ ){
					cla+='<option value="'+data[i].idClase+'">'+data[i].nombreClase+'</option>';

					}

					s_o+='<option value="0" disabled="true" selected="true"> -- Orden -- </option>';
					s_f+='<option value="0" disabled="true" selected="true"> -- Familia -- </option>';
					s_g+='<option value="0" disabled="true" selected="true"> -- Genero -- </option>';
					s_e+='<option value="0" disabled="true" selected="true"> -- Especie -- </option>';

					divis.find('.claseg').html(" ");
					divis.find('.claseg').append(cla);

					par_o.find('.ordeng').html(" ");
					par_o.find('.ordeng').append(s_o);

					par_f.find('.familiag').html(" ");
					par_f.find('.familiag').append(s_f);

					par_g.find('.generog').html(" ");
					par_g.find('.generog').append(s_g);


					par_e.find('.especieg').html(" ");
					par_e.find('.especieg').append(s_e);




				},
				error:function(){
					console.log('error');
				}
			});

		});

		$(document).on('change','.divisionsu',function(){


			//alert('estamos division especie');
			var division_id = $(this).val();
			var divis = $('.clasesu').parent().parent();
			var par_o = $('.ordensu').parent().parent().parent();
			var par_f = $('.familiasu').parent().parent().parent();
			var par_g = $('.generosu').parent().parent().parent();
			var par_e = $('.especiesu').parent().parent().parent();


			console.log(division_id);
			var cla = " ";
			var s_o = "";
			var s_f = "";
			var s_g = "";
			var s_e = "";
			console.log('aqi va');
			console.log(divis);

			$.ajax({
				type : 'get',
				url : '{!! URL::to('Busca_cla_sub') !!}',
				data : {'id':division_id},
				success:function(data){
					console.log('success');

					console.log(data);
					console.log(data.length);

					cla+='<option value="0" disabled="true" selected="true"> -- Clase -- </option>';
					for(var i = 0 ; i < data.length ; i++ ){
					cla+='<option value="'+data[i].idClase+'">'+data[i].nombreClase+'</option>';
					}
					s_o+='<option value="0" disabled="true" selected="true"> -- Orden -- </option>';
					s_f+='<option value="0" disabled="true" selected="true"> -- Familia -- </option>';
					s_g+='<option value="0" disabled="true" selected="true"> -- Genero -- </option>';
					s_e+='<option value="0" disabled="true" selected="true"> -- Especie -- </option>';

					divis.find('.clasesu').html(" ");
					divis.find('.clasesu').append(cla);

					par_o.find('.ordensu').html(" ");
					par_o.find('.ordensu').append(s_o);

					par_f.find('.familiasu').html(" ");
					par_f.find('.familiasu').append(s_f);

					par_g.find('.generosu').html(" ");
					par_g.find('.generosu').append(s_g);


					par_e.find('.especiesu').html(" ");
					par_e.find('.especiesu').append(s_e);




				},
				error:function(){
					console.log('error');
				}
			});


		});


		$(document).on('change','.divisione',function(){


			//alert('estamos division especie');
			var division_id = $(this).val();
			var divis = $('.clasee').parent().parent();
			var par_o = $('.ordene').parent().parent().parent();
			var par_f = $('.familiae').parent().parent().parent();
			var par_g = $('.generoe').parent().parent().parent();
			var par_e = $('.especiee').parent().parent().parent();


			console.log(division_id);
			var cla = " ";
			var s_o = "";
			var s_f = "";
			var s_g = "";
			var s_e = "";

			console.log('aqi va');
			console.log(divis);

			$.ajax({
				type : 'get',
				url : '{!! URL::to('Busca_cla_esp') !!}',
				data : {'id':division_id},
				success:function(data){
					console.log('success');

					console.log(data);
					console.log(data.length);

					cla+='<option value="0" disabled="true" selected="true"> -- Clase -- </option>';
					for(var i = 0 ; i < data.length ; i++ ){
					cla+='<option value="'+data[i].idClase+'">'+data[i].nombreClase+'</option>';
					}
					s_o+='<option value="0" disabled="true" selected="true"> -- Orden -- </option>';
					s_f+='<option value="0" disabled="true" selected="true"> -- Familia -- </option>';
					s_g+='<option value="0" disabled="true" selected="true"> -- Genero -- </option>';
					s_e+='<option value="0" disabled="true" selected="true"> -- Especie -- </option>';

					divis.find('.clasee').html(" ");
					divis.find('.clasee').append(cla);

					par_o.find('.ordene').html(" ");
					par_o.find('.ordene').append(s_o);

					par_f.find('.familiae').html(" ");
					par_f.find('.familiae').append(s_f);

					par_g.find('.generoe').html(" ");
					par_g.find('.generoe').append(s_g);


					par_e.find('.especiee').html(" ");
					par_e.find('.especiee').append(s_e);




				},
				error:function(){
					console.log('error');
				}
			});


		});




		// botones para cambio en clase


		$(document).on('change','.clasef',function(){

			//alert(' clase fam ');
			var clase_id = $(this).val();
			var clase_div = $('.ordenf').parent().parent();
			var par_f = $('.familiaf').parent().parent().parent();
			var par_g = $('.generof').parent().parent().parent();
			var par_e = $('.especief').parent().parent().parent();
			console.log(clase_id);
			var ord = " ";
			var s_f = "";
			var s_g = "";
			var s_e = "";
			console.log('vamos clase');
			console.log(clase_div);

			$.ajax({
				type : 'get',
				url : '{!! URL::to('Busca_ord_fam') !!}',
				data : {'id':clase_id},
				success:function(data){
					console.log('success');

					console.log(data);
					console.log(data.length);

					ord+='<option value="0" disabled="true" selected="true"> -- Orden -- </option>';
					for(var i = 0 ; i < data.length ; i++ ){
					ord+='<option value="'+data[i].idOrden+'">'+data[i].nombreOrden+'</option>';
					}
					s_f+='<option value="0" disabled="true" selected="true"> -- Familia -- </option>';
					s_g+='<option value="0" disabled="true" selected="true"> -- Genero -- </option>';
					s_e+='<option value="0" disabled="true" selected="true"> -- Especie -- </option>';

					clase_div.find('.ordenf').html(" ");
					clase_div.find('.ordenf').append(ord);
					par_f.find('.familiaf').html(" ");
					par_f.find('.familiaf').append(s_f);
					par_g.find('.generof').html(" ");
					par_g.find('.generof').append(s_g);
					par_e.find('.especief').html(" ");
					par_e.find('.especief').append(s_e);
				},
				error:function(){
					console.log('error');
				}
			});
		});




		$(document).on('change','.claseg',function(){

			//alert(' clase gen ');
			var clase_id = $(this).val();
			var clase_div = $('.ordeng').parent().parent();
			var par_f = $('.familiag').parent().parent().parent();
			var par_g = $('.generog').parent().parent().parent();
			var par_e = $('.especieg').parent().parent().parent();
			console.log(clase_id);
			var ord = " ";
			var s_f = "";
			var s_g = "";
			var s_e = "";
			console.log('vamos clase');
			console.log(clase_div);

			$.ajax({
				type : 'get',
				url : '{!! URL::to('Busca_ord_gen') !!}',
				data : {'id':clase_id},
				success:function(data){
					console.log('success');
					ord+='<option value="0" disabled="true" selected="true"> -- Orden -- </option>';
					for(var i = 0 ; i < data.length ; i++ ){
					ord+='<option value="'+data[i].idOrden+'">'+data[i].nombreOrden+'</option>';
					}
					s_f+='<option value="0" disabled="true" selected="true"> -- Familia -- </option>';
					s_g+='<option value="0" disabled="true" selected="true"> -- Genero -- </option>';
					s_e+='<option value="0" disabled="true" selected="true"> -- Especie -- </option>';
					clase_div.find('.ordeng').html(" ");
					clase_div.find('.ordeng').append(ord);
					par_f.find('.familiag').html(" ");
					par_f.find('.familiag').append(s_f);
					par_g.find('.generog').html(" ");
					par_g.find('.generog').append(s_g);
					par_e.find('.especieg').html(" ");
					par_e.find('.especieg').append(s_e);
				},
				error:function(){
					console.log('error');
				}
			});
		});


		$(document).on('change','.clasee',function(){
			//alert(' clase esp ');
			var clase_id = $(this).val();
			var clase_div = $('.ordene').parent().parent();
			var par_f = $('.familiae').parent().parent().parent();
			var par_g = $('.generoe').parent().parent().parent();
			var par_e = $('.especiee').parent().parent().parent();
			console.log(clase_id);
			var ord = " ";
			var s_f = "";
			var s_g = "";
			var s_e = "";
			console.log('vamos clase');
			console.log(clase_div);

			$.ajax({
				type : 'get',
				url : '{!! URL::to('Busca_ord_esp') !!}',
				data : {'id':clase_id},
				success:function(data){
					console.log('success');
					ord+='<option value="0" disabled="true" selected="true"> -- Orden -- </option>';
					for(var i = 0 ; i < data.length ; i++ ){
					ord+='<option value="'+data[i].idOrden+'">'+data[i].nombreOrden+'</option>';
					}
					s_f+='<option value="0" disabled="true" selected="true"> -- Familia -- </option>';
					s_g+='<option value="0" disabled="true" selected="true"> -- Genero -- </option>';
					s_e+='<option value="0" disabled="true" selected="true"> -- Especie -- </option>';
					clase_div.find('.ordene').html(" ");
					clase_div.find('.ordene').append(ord);
					par_f.find('.familiae').html(" ");
					par_f.find('.familiae').append(s_f);
					par_g.find('.generoe').html(" ");
					par_g.find('.generoe').append(s_g);
					par_e.find('.especiee').html(" ");
					par_e.find('.especiee').append(s_e);
				},
				error:function(){
					console.log('error');
				}
			});
		});


		$(document).on('change','.clasesu',function(){

			//alert(' clase subespei');
			var clase_id = $(this).val();
			var clase_div = $('.ordensu').parent().parent();
			var par_f = $('.familiasu').parent().parent().parent();
			var par_g = $('.generosu').parent().parent().parent();
			var par_e = $('.especiesu').parent().parent().parent();
			console.log(clase_id);
			var ord = " ";
			var s_f = "";
			var s_g = "";
			var s_e = "";
			console.log('vamos clase');
			console.log(clase_div);

			$.ajax({
				type : 'get',
				url : '{!! URL::to('Busca_ord_sub') !!}',
				data : {'id':clase_id},
				success:function(data){
					console.log('success');
					ord+='<option value="0" disabled="true" selected="true"> -- Orden -- </option>';
					for(var i = 0 ; i < data.length ; i++ ){
					ord+='<option value="'+data[i].idOrden+'">'+data[i].nombreOrden+'</option>';
					}
					s_f+='<option value="0" disabled="true" selected="true"> -- Familia -- </option>';
					s_g+='<option value="0" disabled="true" selected="true"> -- Genero -- </option>';
					s_e+='<option value="0" disabled="true" selected="true"> -- Especie -- </option>';
					clase_div.find('.ordensu').html(" ");
					clase_div.find('.ordensu').append(ord);
					par_f.find('.familiasu').html(" ");
					par_f.find('.familiasu').append(s_f);
					par_g.find('.generosu').html(" ");
					par_g.find('.generosu').append(s_g);
					par_e.find('.especiesu').html(" ");
					par_e.find('.especiesu').append(s_e);
				},
				error:function(){
					console.log('error');
				}
			});


		});


		//botones para buscar familia en genero y especie popups


		$(document).on('change','.ordeng',function(){

			console.log("estamos en orden");
			var orden_id = $(this).val();
			var orden_div = $('.familiag').parent().parent();
			var par_g = $('.generog').parent().parent().parent();
			var par_e = $('.especieg').parent().parent().parent();
			console.log(orden_id);
			var fam = " ";
			var s_g = "";
			var s_e = "";
			console.log('vamos orden');
			console.log(orden_div);

			$.ajax({
				type : 'get',
				url : '{!! URL::to('Busca_fam_gen') !!}',
				data : {'id':orden_id},
				success:function(data){
					console.log('success');

					console.log(data);
					console.log(data.length);

					fam+='<option value="0" disabled="true" selected="true"> -- Familia --</option>';
					for(var i = 0 ; i < data.length ; i++ ){
					fam+='<option value="'+data[i].idFamilia+'">'+data[i].nombreFamilia+'</option>';
					}
					s_g+='<option value="0" disabled="true" selected="true"> -- Genero -- </option>';
					s_e+='<option value="0" disabled="true" selected="true"> -- Especie -- </option>';
					orden_div.find('.familiag').html(" ");
					orden_div.find('.familiag').append(fam);
					par_g.find('.generog').html(" ");
					par_g.find('.generog').append(s_g);
					par_e.find('.especieg').html(" ");
					par_e.find('.especieg').append(s_e);
				},
				error:function(){
					console.log('error');
				}
			});

		});


		$(document).on('change','.ordene',function(){

			console.log("estamos en orden");
			var orden_id = $(this).val();
			var orden_div = $('.familiae').parent().parent();
			var par_g = $('.generoe').parent().parent().parent();
			var par_e = $('.especiee').parent().parent().parent();
			console.log(orden_id);
			var fam = " ";
			var s_g = "";
			var s_e = "";
			console.log('vamos orden');
			console.log(orden_div);

			$.ajax({
				type : 'get',
				url : '{!! URL::to('Busca_fam_esp') !!}',
				data : {'id':orden_id},
				success:function(data){
					console.log('success');

					console.log(data);
					console.log(data.length);

					fam+='<option value="0" disabled="true" selected="true"> -- Familia --</option>';
					for(var i = 0 ; i < data.length ; i++ ){
					fam+='<option value="'+data[i].idFamilia+'">'+data[i].nombreFamilia+'</option>';
					}
					s_g+='<option value="0" disabled="true" selected="true"> -- Genero -- </option>';
					s_e+='<option value="0" disabled="true" selected="true"> -- Especie -- </option>';
					orden_div.find('.familiae').html(" ");
					orden_div.find('.familiae').append(fam);
					par_g.find('.generoe').html(" ");
					par_g.find('.generoe').append(s_g);
					par_e.find('.especiee').html(" ");
					par_e.find('.especiee').append(s_e);
				},
				error:function(){
					console.log('error');
				}
			});

		});


		$(document).on('change','.ordensu',function(){

			console.log("estamos en orden");
			var orden_id = $(this).val();
			var orden_div = $('.familiasu').parent().parent();
			var par_g = $('.generoe').parent().parent().parent();
			var par_e = $('.especiee').parent().parent().parent();
			console.log(orden_id);
			var fam = " ";
			var s_g = "";
			var s_e = "";
			console.log('vamos orden');
			console.log(orden_div);

			$.ajax({
				type : 'get',
				url : '{!! URL::to('Busca_fam_sub') !!}',
				data : {'id':orden_id},
				success:function(data){
					console.log('success');
					fam+='<option value="0" disabled="true" selected="true"> -- Familia --</option>';
					for(var i = 0 ; i < data.length ; i++ ){
					fam+='<option value="'+data[i].idFamilia+'">'+data[i].nombreFamilia+'</option>';
					}
					s_g+='<option value="0" disabled="true" selected="true"> -- Genero -- </option>';
					s_e+='<option value="0" disabled="true" selected="true"> -- Especie -- </option>';
					orden_div.find('.familiasu').html(" ");
					orden_div.find('.familiasu').append(fam);
					par_g.find('.generoe').html(" ");
					par_g.find('.generoe').append(s_g);
					par_e.find('.especiee').html(" ");
					par_e.find('.especiee').append(s_e);
				},
				error:function(){
					console.log('error');
				}
			});

		});




		//buscar genero en especie

		$(document).on('change','.familiae',function(){
			console.log("estamos en familia");
			var fam_id = $(this).val();
			var fam_div = $('.generoe').parent().parent();
			var par_e = $('.especiee').parent().parent().parent();
			console.log(orden_id);
			console.log(fam_id);
			var gen = " ";
			var s_e = "";
			console.log('vamos familia');
			console.log(fam_div);

			$.ajax({
				type : 'get',
				url : '{!! URL::to('Busca_gen_esp') !!}',
				data : {'id':fam_id},
				success:function(data){
					console.log('success');

					console.log(data);
					console.log(data.length);

					gen+='<option value="0" disabled="true" selected="true"> -- Genero -- </option>';
					for(var i = 0 ; i < data.length ; i++ ){
					gen+='<option value="'+data[i].idGenero+'">'+data[i].nombreGenero+'</option>';
					}
					s_e+='<option value="0" disabled="true" selected="true"> -- Especie -- </option>';
					fam_div.find('.generoe').html(" ");
					fam_div.find('.generoe').append(gen);
					par_e.find('.especiee').html(" ");
					par_e.find('.especiee').append(s_e);
				},
				error:function(){
					console.log('error');
				}
			});


		});


		$(document).on('change','.familiasu',function(){


			console.log("estamos en familia");
			var fam_id = $(this).val();
			var fam_div = $('.generosu').parent().parent();
			var par_e = $('.especiesu').parent().parent().parent();
			console.log(fam_id);
			var gen = " ";
			var s_e = "";
			console.log('vamos familia');
			console.log(fam_div);

			$.ajax({
				type : 'get',
				url : '{!! URL::to('Busca_gen_sub') !!}',
				data : {'id':fam_id},
				success:function(data){
					console.log('success');

					console.log(data);
					console.log(data.length);

					gen+='<option value="0" disabled="true" selected="true"> -- Genero -- </option>';
					for(var i = 0 ; i < data.length ; i++ ){
					gen+='<option value="'+data[i].idGenero+'">'+data[i].nombreGenero+'</option>';
					}
					s_e+='<option value="0" disabled="true" selected="true"> -- Especie -- </option>';
					fam_div.find('.generosu').html(" ");
					fam_div.find('.generosu').append(gen);
					par_e.find('.especiesu').html(" ");
					par_e.find('.especiesu').append(s_e);
				},
				error:function(){
					console.log('error');
				}
			});


		});


		$(document).on('change','.generosu',function(){


			console.log("estamos en familia");
			var fam_id = $(this).val();
			var fam_div = $('.especiesu').parent().parent();
			console.log(fam_id);
			var gen = " ";
			console.log('vamos familia');
			console.log(fam_div);

			$.ajax({
				type : 'get',
				url : '{!! URL::to('Busca_esp_sub') !!}',
				data : {'id':fam_id},
				success:function(data){
					console.log('success');

					console.log(data);
					console.log(data.length);

					gen+='<option value="0" disabled="true" selected="true"> -- Especie -- </option>';
					for(var i = 0 ; i < data.length ; i++ ){
					gen+='<option value="'+data[i].idEspecie+'">'+data[i].nombreEspecie+'</option>';

					}

					fam_div.find('.especiesu').html(" ");
					fam_div.find('.especiesu').append(gen);


				},
				error:function(){
					console.log('error');
				}
			});


		});

		////////////////////////////////////////////////////////////////////////////
		////////		boton busqueda 			////////////////////////////////////
		///////   HACEMOS BUSQUEDA Y CAMBIAMOS ESTADO      /////////////////////////
		/// los popups para agregar la especie los llamamos modales y estan ////////
		/// En la carpeta-> views->modales->nueva.blade.php ////////////////////////  


		$('#busqueda-frm').on('submit',function(e){
		e.preventDefault();
		var estado;
		//alert('ah buscar algo ');
		var par = $('.estadoMarn').parent().parent().parent().parent();
		var form = this;

		console.log(par);

		var esp = $('.especie').val();
		var sub = $('.subespecie').val();

		if(sub != null){

			$.ajax({

				type:'get',
				url :'{!! URL::to('estadoMarn_sub') !!}',
				data:{'id':sub},
				success:function(data){
					console.log('success se extrajo el estado de subespecie')
					console.log(data)
					var frm = $('#busqueda-frm');
					//par.find('.estadoMarn').val(data.nombreEspecie);
					frm.find('.estadoMarn').val(data[0].estadoMarn);
					estado = $('.estadoMarn').val();
					if(estado == 1){
					

					var frm = $('#busqueda3-frm')
					frm.find('#subespecie_id2').val(sub);
					frm.find('#especie_id2').val(esp);
					
					//$('#especie_id2').val(esp);
					$('#MSG_continuar_sub').modal('show');
					//form.submit();


					}else{
					//alert('no esta subespecie');
						var n_s = $('#N_SUB_modal');
						n_s.find('.s_n_id').val(sub);
						//$("#busqueda-frm").get(0).reset();
						$("#N_SUB_Modal").modal('show');
					}

				},
				error:function(){
					console.log('error no se pudo')
					//console.log(data)
				}

			});


		}else if(esp !=null ){


			$.ajax({

			type:'get',
			url :'{!! URL::to('estadoMarn_esp') !!}',
			data:{'id':esp},
			success:function(data){
				console.log('success se extrajo el estado')
				console.log(data)
				var frm = $('#busqueda-frm');
				//par.find('.estadoMarn').val(data.nombreEspecie);
				frm.find('.estadoMarn').val(data[0].estadoMarn);

				estado = $('.estadoMarn').val();

				if(estado == 1){
					//alert('sii esta');
					
					$('#especie_id23').val(esp);
					$('#MSG_continuar_esp').modal('show');
					//form.submit();

				}else{
					//alert('no esta');
					var n_e = $('#N_ESP_modal');
					n_e.find('.n_e_id').val(esp);
					//$("#busqueda-frm").get(0).reset()
					$("#N_ESP_Modal").modal('show');

				}
			},
			error:function(){
				console.log('error no se pudo')
				//console.log(data)
			}
		});


		}else{
			//$("#MSG_MODAL").modal('show');
			sweetAlert("Debe ingresar una especie", "", "warning");
		}

		//$("#busqueda-frm").get(0).reset()

	});

	///////////////             BOTONES DE MODAL CONTINUAR           ///////////////

	//$('#N_ESP_modal').on('submit',function(e){

	$('#busqueda3-frm').on('submit',function(e){
			e.preventDefault();
			//alert('aqui estamos especie');
			var form = this;
			$("#MSG_continuar_sub").modal('hide');
			form.submit();

	});

	$('#busqueda2-frm').on('submit',function(e){
			e.preventDefault();
			//alert('aqui estamos subespecie');
			var form = this;
			$("#MSG_continuar_esp").modal('hide');
			form.submit();

	});


	$('#btn-erase-esp').click(function(){
		
		$("#MSG_continuar_esp").modal('hide');

		//$('select').val('')
		$('.estadoMarn').val('');
		$('#subespecie_id23').val('');
		$('#especie_id23').val('');


	})

	$('#btn-erase-sub').click(function(){
		$("#MSG_continuar_sub").modal('hide');
       	
       	//$('select').val('')
		$('.estadoMarn').val('');
		$('#subespecie_id2').val('');
		$('#especie_id2').val('');


	})



	
	$('.cerrar_continuar').click(function(){
		$('.estadoMarn').val('');
		$('#subespecie_id2').val('');
		$('#especie_id2').val('');
		$('#subespecie_id23').val('');
		$('#especie_id23').val('');				
		///$("#MSG_continuar").modal('hide');
	});




	////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


	$('.cerrar_esp').click(function(){
		$("#N_ESP_Modal").modal('hide');
	})

	$('.cerrar_sub').click(function(){
		$("#N_SUB_Modal").modal('hide');
	})


	///////////////////PARA CAMBIAR ESPECIE GUARDAR NUEVO ESTADO Y MOSTRAR EN PANTALLA


	$('#N_ESP_modal').on('submit',function(e){

  		e.preventDefault();
  		//alert('haber si funciona')
  		var form = this;
  		var esp = $('.n_e_id').val();

  		$.ajax({
  			type : 'post',
  			url  : '{!! URL::to('cambia_estado_esp') !!}',
  			data : {'id':esp,
  					"_token": "{{ csrf_token() }}",},
  			success:function(data){
  				console.log('ho si actualizamos el estado')
  				$("#N_ESP_Modal").modal('hide');
  				//$("#busqueda-frm").get(0).reset()

  				form.submit();
  			},
  			error:function(){
  				console.log('no ce pudo don')
  			}
  		})

  	});


  	$('#N_SUB_modal').on('submit',function(e){

  		e.preventDefault();
  		//alert('haber si funciona')
  		var form = this;
  		var esp = $('.s_n_id').val();

  		$.ajax({
  			type : 'post',
  			url  : '{!! URL::to('cambia_estado_sub') !!}',
  			data : {'id':esp,
  					"_token": "{{ csrf_token() }}",},
  			success:function(data){
  				console.log('ho si actualizamos el estado de sub especie')
  				$("#N_SUB_Modal").modal('hide');
  				//$("#busqueda-frm").get(0).reset()

  				form.submit();
  			},
  			error:function(){
  				console.log('no ce pudo don')
  			}
  		})

  	});


/////////////////////////////////////////////  REFRESCAN MODALES  ////////////////////////////////////////////////////////


  	$('.close_sub').click(function(){
  		//alert('vamos a cerrar esto')
  		var par_o = $('.reinosu').parent().parent().parent();
  		var r_sub = "";
		var d_sub = "";
		var c_sub = "";
		var o_sub = "";
		var f_sub = "";
		var g_sub = "";
		var e_sub = "";
  		r_sub = '<option value="0" disabled="true" selected="true">--Reino--</option>';
		d_sub = '<option value="0" disabled="true" selected="true">--Division--</option>';
		c_sub = '<option value="0" disabled="true" selected="true">--Clase--</option>';
		o_sub = '<option value="0" disabled="true" selected="true">--Orden--</option>';
		f_sub = '<option value="0" disabled="true" selected="true">--Familia--</option>';
		g_sub = '<option value="0" disabled="true" selected="true">--Genero--</option>';
		e_sub = '<option value="0" disabled="true" selected="true">--Especie--</option>';
		par_o.find('.reinosu').html("");
		par_o.find('.reinosu').append(r_sub);
		par_o.find('.divisionsu').html("");
		par_o.find('.divisionsu').append(d_sub);
		par_o.find('.clasesu').html("");
		par_o.find('.clasesu').append(c_sub);
		par_o.find('.ordensu').html("");
		par_o.find('.ordensu').append(o_sub);
		par_o.find('.familiasu').html("");
		par_o.find('.familiasu').append(f_sub);
		par_o.find('.generosu').html("");
		par_o.find('.generosu').append(g_sub);
		par_o.find('.especiesu').html("");
		par_o.find('.especiesu').append(e_sub);
		par_o.find('#sub_input').val("");
		$('#msg-error-subespecie').fadeOut();

  	})

  	$('.close_esp').click(function(){
  		//alert('vamos a cerrar esto')
  		var par_o = $('.reinoe').parent().parent().parent();
  		var r_sub = "";
		var d_sub = "";
		var c_sub = "";
		var o_sub = "";
		var f_sub = "";
		var g_sub = "";
		r_sub = '<option value="0" disabled="true" selected="true">--Reino--</option>';
		d_sub = '<option value="0" disabled="true" selected="true">--Division--</option>';
		c_sub = '<option value="0" disabled="true" selected="true">--Clase--</option>';
		o_sub = '<option value="0" disabled="true" selected="true">--Orden--</option>';
		f_sub = '<option value="0" disabled="true" selected="true">--Familia--</option>';
		g_sub = '<option value="0" disabled="true" selected="true">--Genero--</option>';
		par_o.find('.reinoe').html("");
		par_o.find('.reinoe').append(r_sub);
		par_o.find('.divisione').html("");
		par_o.find('.divisione').append(d_sub);
		par_o.find('.clasee').html("");
		par_o.find('.clasee').append(c_sub);
		par_o.find('.ordene').html("");
		par_o.find('.ordene').append(o_sub);
		par_o.find('.familiae').html("");
		par_o.find('.familiae').append(f_sub);
		par_o.find('.generoe').html("");
		par_o.find('.generoe').append(g_sub);
		par_o.find('#esp_input').val("");
		$('#msg-error-especie').fadeOut();
  	})

  	$('.close_gen').click(function(){
  		//alert('vamos a cerrar esto')
  		var par_o = $('.reinog').parent().parent().parent();
  		var r_sub = "";
		var d_sub = "";
		var c_sub = "";
		var o_sub = "";
		var f_sub = "";
		r_sub = '<option value="0" disabled="true" selected="true">--Reino--</option>';
		d_sub = '<option value="0" disabled="true" selected="true">--Division--</option>';
		c_sub = '<option value="0" disabled="true" selected="true">--Clase--</option>';
		o_sub = '<option value="0" disabled="true" selected="true">--Orden--</option>';
		f_sub = '<option value="0" disabled="true" selected="true">--Familia--</option>';
		par_o.find('.reinog').html("");
		par_o.find('.reinog').append(r_sub);
		par_o.find('.divisiong').html("");
		par_o.find('.divisiong').append(d_sub);
		par_o.find('.claseg').html("");
		par_o.find('.claseg').append(c_sub);
		par_o.find('.ordeng').html("");
		par_o.find('.ordeng').append(o_sub);
		par_o.find('.familiag').html("");
		par_o.find('.familiag').append(f_sub);
		par_o.find('#gen_input_mod').val("");
		$('#msg-error-genero').fadeOut();
  	})

  	$('.close_fam').click(function(){
  		//alert('vamos a cerrar esto')
  		var par_o = $('.reinof').parent().parent().parent();
  		var r_sub = "";
		var d_sub = "";
		var c_sub = "";
		var o_sub = "";
		r_sub = '<option value="0" disabled="true" selected="true">--Reino--</option>';
		d_sub = '<option value="0" disabled="true" selected="true">--Division--</option>';
		c_sub = '<option value="0" disabled="true" selected="true">--Clase--</option>';
		o_sub = '<option value="0" disabled="true" selected="true">--Orden--</option>';
		par_o.find('.reinof').html("");
		par_o.find('.reinof').append(r_sub);
		par_o.find('.divisionf').html("");
		par_o.find('.divisionf').append(d_sub);
		par_o.find('.clasef').html("");
		par_o.find('.clasef').append(c_sub);
		par_o.find('.ordenf').html("");
		par_o.find('.ordenf').append(o_sub);
		par_o.find('#fam_input').val("");
		$('#msg-error-familia').fadeOut();
  	})

  	$('.close_ord').click(function(){
  		//alert('vamos a cerrar esto')
  		var par_o = $('.reinoo').parent().parent().parent();
  		var r_sub = "";
		var d_sub = "";
		var c_sub = "";
		r_sub = '<option value="0" disabled="true" selected="true">--Reino--</option>';
		d_sub = '<option value="0" disabled="true" selected="true">--Division--</option>';
		c_sub = '<option value="0" disabled="true" selected="true">--Clase--</option>';
		par_o.find('.reinoo').html("");
		par_o.find('.reinoo').append(r_sub);
		par_o.find('.divisiono').html("");
		par_o.find('.divisiono').append(d_sub);
		par_o.find('.claseo').html("");
		par_o.find('.claseo').append(c_sub);
		par_o.find('#ord_input_mod').val("");
		$('#msg-error-orden').fadeOut();
  	})

  	$('.close_cla').click(function(){
  		//alert('vamos a cerrar esto')
  		var par_o = $('.reinoc_modal').parent().parent().parent();
  		var r_sub = "";
		var d_sub = "";
		r_sub = '<option value="0" disabled="true" selected="true">--Reino--</option>';
		d_sub = '<option value="0" disabled="true" selected="true">--Division--</option>';
		par_o.find('.reinoc_modal').html("");
		par_o.find('.reinoc').append(r_sub);
		par_o.find('.divisionc').html("");
		par_o.find('.divisionc').append(d_sub);
		par_o.find('#cla_input_mod').val("");
		$('#msg-error-clase').fadeOut();
  	})

  	$('.close_div').click(function(){
  		//alert('vamos a cerrar esto')
  		var par_o = $('.reino_modal').parent().parent().parent();
  		var r_sub = "";
		r_sub = '<option value="0" disabled="true" selected="true">--Reino--</option>';
		par_o.find('.reinoc_modal').html("");
		par_o.find('.reinoc').append(r_sub);
		par_o.find('#rei_input_mod').val("");
		$('#msg-error').fadeOut();
  	})

  	$('.can_div').click(function(){
  		//alert('cierra cancelar')
  		var par_o = $('.reino_modal').parent().parent().parent();
  		var r_sub = "";
		r_sub = '<option value="0" disabled="true" selected="true">--Reino--</option>';
		par_o.find('.reinoc_modal').html("");
		par_o.find('.reinoc').append(r_sub);
		par_o.find('#rei_input_mod').val("");
		$('#msg-error').fadeOut();
  	})

  	$('.can_cla').click(function(){
  		//alert('cierra cancelar')
  		var par_o = $('.reinoc_modal').parent().parent().parent();
  		var r_sub = "";
		var d_sub = "";
		r_sub = '<option value="0" disabled="true" selected="true">--Reino--</option>';
		d_sub = '<option value="0" disabled="true" selected="true">--Division--</option>';
		par_o.find('.reinoc_modal').html("");
		par_o.find('.reinoc').append(r_sub);
		par_o.find('.divisionc').html("");
		par_o.find('.divisionc').append(d_sub);
		par_o.find('#cla_input_mod').val("");
		$('#msg-error-clase').fadeOut();
  	})


  	$('.can_ord').click(function(){
  		//alert('cierra cancelar')
  		var par_o = $('.reinoo').parent().parent().parent();
  		var r_sub = "";
		var d_sub = "";
		var c_sub = "";
		r_sub = '<option value="0" disabled="true" selected="true">--Reino--</option>';
		d_sub = '<option value="0" disabled="true" selected="true">--Division--</option>';
		c_sub = '<option value="0" disabled="true" selected="true">--Clase--</option>';
		par_o.find('.reinoo').html("");
		par_o.find('.reinoo').append(r_sub);
		par_o.find('.divisiono').html("");
		par_o.find('.divisiono').append(d_sub);
		par_o.find('.claseo').html("");
		par_o.find('.claseo').append(c_sub);
		par_o.find('#ord_input_mod').val("");
		$('#msg-error-clase').fadeOut();
  	})


  	$('.can_fam').click(function(){
  		//alert('cierra cancelar')
  		var par_o = $('.reinof').parent().parent().parent();
  		var r_sub = "";
		var d_sub = "";
		var c_sub = "";
		var o_sub = "";
		r_sub = '<option value="0" disabled="true" selected="true">--Reino--</option>';
		d_sub = '<option value="0" disabled="true" selected="true">--Division--</option>';
		c_sub = '<option value="0" disabled="true" selected="true">--Clase--</option>';
		o_sub = '<option value="0" disabled="true" selected="true">--Orden--</option>';
		par_o.find('.reinof').html("");
		par_o.find('.reinof').append(r_sub);
		par_o.find('.divisionf').html("");
		par_o.find('.divisionf').append(d_sub);
		par_o.find('.clasef').html("");
		par_o.find('.clasef').append(c_sub);
		par_o.find('.ordenf').html("");
		par_o.find('.ordenf').append(o_sub);
		par_o.find('#fam_input').val("");
		$('#msg-error-orden').fadeOut();
  	})


  	$('.can_gen').click(function(){
  		//alert('cierra cancelar')
  		var par_o = $('.reinog').parent().parent().parent();
  		var r_sub = "";
		var d_sub = "";
		var c_sub = "";
		var o_sub = "";
		var f_sub = "";
		r_sub = '<option value="0" disabled="true" selected="true">--Reino--</option>';
		d_sub = '<option value="0" disabled="true" selected="true">--Division--</option>';
		c_sub = '<option value="0" disabled="true" selected="true">--Clase--</option>';
		o_sub = '<option value="0" disabled="true" selected="true">--Orden--</option>';
		f_sub = '<option value="0" disabled="true" selected="true">--Familia--</option>';
		par_o.find('.reinog').html("");
		par_o.find('.reinog').append(r_sub);
		par_o.find('.divisiong').html("");
		par_o.find('.divisiong').append(d_sub);
		par_o.find('.claseg').html("");
		par_o.find('.claseg').append(c_sub);
		par_o.find('.ordeng').html("");
		par_o.find('.ordeng').append(o_sub);
		par_o.find('.familiag').html("");
		par_o.find('.familiag').append(f_sub);
		par_o.find('#gen_input_mod').val("");
		$('#msg-error-orden').fadeOut();
  	})


  	$('.can_esp').click(function(){
  		//alert('cierra cancelar')
  		var par_o = $('.reinoe').parent().parent().parent();
  		var r_sub = "";
		var d_sub = "";
		var c_sub = "";
		var o_sub = "";
		var f_sub = "";
		var g_sub = "";
		r_sub = '<option value="0" disabled="true" selected="true">--Reino--</option>';
		d_sub = '<option value="0" disabled="true" selected="true">--Division--</option>';
		c_sub = '<option value="0" disabled="true" selected="true">--Clase--</option>';
		o_sub = '<option value="0" disabled="true" selected="true">--Orden--</option>';
		f_sub = '<option value="0" disabled="true" selected="true">--Familia--</option>';
		g_sub = '<option value="0" disabled="true" selected="true">--Genero--</option>';
		par_o.find('.reinoe').html("");
		par_o.find('.reinoe').append(r_sub);
		par_o.find('.divisione').html("");
		par_o.find('.divisione').append(d_sub);
		par_o.find('.clasee').html("");
		par_o.find('.clasee').append(c_sub);
		par_o.find('.ordene').html("");
		par_o.find('.ordene').append(o_sub);
		par_o.find('.familiae').html("");
		par_o.find('.familiae').append(f_sub);
		par_o.find('.generoe').html("");
		par_o.find('.generoe').append(g_sub);
		par_o.find('#esp_input').val("");
		$('#msg-error-especie').fadeOut();
  	})

  	$('.can_sub').click(function(){
  		//alert('cierra cancelar')
  		var par_o = $('.reinosu').parent().parent().parent();
  		var r_sub = "";
		var d_sub = "";
		var c_sub = "";
		var o_sub = "";
		var f_sub = "";
		var g_sub = "";
		var e_sub = "";
  		r_sub = '<option value="0" disabled="true" selected="true">--Reino--</option>';
		d_sub = '<option value="0" disabled="true" selected="true">--Division--</option>';
		c_sub = '<option value="0" disabled="true" selected="true">--Clase--</option>';
		o_sub = '<option value="0" disabled="true" selected="true">--Orden--</option>';
		f_sub = '<option value="0" disabled="true" selected="true">--Familia--</option>';
		g_sub = '<option value="0" disabled="true" selected="true">--Genero--</option>';
		e_sub = '<option value="0" disabled="true" selected="true">--Especie--</option>';
		par_o.find('.reinosu').html("");
		par_o.find('.reinosu').append(r_sub);
		par_o.find('.divisionsu').html("");
		par_o.find('.divisionsu').append(d_sub);
		par_o.find('.clasesu').html("");
		par_o.find('.clasesu').append(c_sub);
		par_o.find('.ordensu').html("");
		par_o.find('.ordensu').append(o_sub);
		par_o.find('.familiasu').html("");
		par_o.find('.familiasu').append(f_sub);
		par_o.find('.generosu').html("");
		par_o.find('.generosu').append(g_sub);
		par_o.find('.especiesu').html("");
		par_o.find('.especiesu').append(e_sub);
		par_o.find('#sub_input').val("");
		$('#msg-error-subespecie').fadeOut();

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
