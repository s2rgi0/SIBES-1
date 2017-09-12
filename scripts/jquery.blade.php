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
					op+='<option value="0" disabled="true" selected="true">--División--</option>';
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
			
			if( reino != null ){
				$("#id_rei").val(reino);
				$("#DIV_Modal").modal('show');
			}else{
				swal("Seleccione un reino","","warning")
			}

			// fin de else
		});


//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		//boton para guardar division


		$('#g_div').click(function(e){
			e.preventDefault();
			var divis = $('.division').parent().parent().parent();
			var frm_bus = $('#busqueda-frm');
			console.log(divis)
			var id_rei = $('#id_rei').val();
			
			var d_s = " ";
			var r_d = " ";
			var r_s = " ";
			$.ajax({
				type : 'post',
				url  : '{!! URL::to('ingr_div_modal') !!}',
				datatype: 'json',
				data : $('#div_modal').serialize(),
				success:function(data){
					console.log('success')
					console.log(data.errors)
					if(data.success == false){
						$('#_rei_input_mod,#_rei_mod').text('');
						$('#msg-error').fadeIn();
						$.each(data.errors , function(index,value){
							$('#_'+index).text(value);
						});
					}else{

				swal("Division ingresada", "", "success");
						
						$.ajax({
						type : 'get',
						url  : '{!! URL::to('nueva_div') !!}',
						data : {'id': id_rei},
						success:function(data){
							console.log('si funciono el get nueva division')
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
							$('#DIV_Modal').trigger("reset");
							$('#id_rei').val('')
							$('#rei_input_mod').val('')
			$.ajax({
				type : 'get',
				url : '{!! URL::to('buscaDivision') !!}',
				data : {'id':id_rei},
				success:function(data){
					console.log('success buscamos la division');
					console.log(data);
					console.log(data.length);
					d_s = "";
					for(var i = 0 ; i < data.length ; i++ ){
					d_s+='<option value="'+data[i].idDivision+'">'+data[i].nombreDivision+'</option>';
					}
					//divis.find('.division').html(" ");
					divis.find('.division').append(d_s);
				},
				error:function(){
				console.log('NO FUNCIONO EL GET')
				}
			});
		},
		error:function(){
			console.log('NO FUNCIONO EL GET')
		}
		});
				
		$('#msg-error').fadeOut();
		}
		},
			error:function(data){
				console.log('no functiono el post')
				console.log(data)
			}
			});
			
		});

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		//boton para GUARDAR CLASE

		$('#g_cla').click(function(e){

			e.preventDefault();
			var frm_bus = $('#busqueda-frm');
			var divis = $('.division').parent().parent().parent();
			
			var id_div = $('#id_div').val();
			
			var d_c = "";
			var c_d = "";
			var r_c = "";
			var di_c = "";
			var r_s = "";
			$.ajax({
				type : 'post',
				url  : '{!! URL::to('ingr_cla_modal') !!}',
				datatype: 'json',
				data : $('#cla_modal').serialize(),
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

					swal("Clase ingresada", "", "success");
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
							frm_bus.find('.reino').val(id_rei);
							$('#id_div').val('')
							$('#cla_input_mod').val('')
			$.ajax({
				type : 'get',
				url : '{!! URL::to('buscaClase') !!}',
				data : {'id':id_div},
				success:function(data){
					console.log('success');

					console.log(data);
					console.log(data.length);
					d_c = "";
					for(var i = 0 ; i < data.length ; i++ ){
					d_c+='<option value="'+data[i].idClase+'">'+data[i].nombreClase+'</option>';
					}
					divis.find('.clase').append(d_c);
				},
				error:function(){
					console.log('NO FUNCIONO EL GET')
				}
			});
				},
				error:function(){
					console.log('NO FUNCIONO EL GET')
				}
			});					

					$("#CLA_Modal").modal('hide');
					$('#msg-error-clase').fadeOut();

				}

			},
				error:function(){
					console.log('sigue el error')
				}
			});		

		});

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		//boton para GUARDAR ORDEN

		$('#g_ord').click(function(e){

			var frm_bus = $('#busqueda-frm');

			//alert('aqui vamos');
			e.preventDefault();
			var divis = $('.division').parent().parent().parent();			
			var id_cla = $('#id_cla').val();
			var d_c = "";
			var c_d = "";
			var c_o = "";
			var r_s = "";
			var r_ord = "";
			var d_ord = "";
			var c_ord = "";
			$.ajax({
				type : 'post',
				url  : '{!! URL::to('ingr_ord_modal') !!}',
				datatype: 'json',
				data : $('#ord_modal').serialize(),
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

					swal("Orden ingresado", "", "success");

					///////////////////////SE BORRAN LOS CAMPOS/////////////////
					///////////////////////DEL MODAL///////////////////////////

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
							$("#ORD_Modal").modal('hide');
							$('#id_cla').val('')
							$('#ord_input_mod').val('')

			$.ajax({
				type : 'get',
				url : '{!! URL::to('buscaOrden') !!}',
				data : {'id':id_cla},
				success:function(data){
					console.log('success');
					console.log(data);
					console.log(data.length);
					d_c="";
					for(var i = 0 ; i < data.length ; i++ ){
					d_c+='<option value="'+data[i].idOrden+'">'+data[i].nombreOrden+'</option>';
					}
					divis.find('.orden').append(d_c);
				},
				error:function(){
					console.log('NO FUNCIONO EL GET')
				}
			});
			},
				error:function(){
					console.log('NO FUNCIONO EL GET')
				}
			});

				//////////////////////AQUI VA REINO///////////////////////
				
					$('#msg-error-orden').fadeOut();
				}
			},
				error:function(){
					console.log('sigue el error')
				}

			});

			
			//$("#ORD_Modal").modal('hide');

		});

		

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		//boton para GUARDAR FAMILIA


		$('#g_fam').click(function(e){

			var frm_bus = $('#busqueda-frm');

			e.preventDefault();
			var divis = $('.division').parent().parent().parent();
			var id_ord = $('#id_ord').val();
			console.log(id_ord);
			var d_c = "";
			$.ajax({
				type : 'post',
				url  : '{!! URL::to('ingr_fam_modal') !!}',
				datatype: 'json',
				data : $('#fam_modal').serialize(),
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
			swal("Familia ingresada", "", "success");
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
							$("#FAM_Modal").modal('hide');
							$('#FAM_Modal').trigger("reset");
							$('#id_ord').val('')
							$('#fam_input').val('')
			$.ajax({
				type : 'get',
				url : '{!! URL::to('buscaFamilia') !!}',
				data : {'id':id_ord},
				success:function(data){
					console.log('success');
					console.log(data);
					console.log(data.length);
					d_c="";
					for(var i = 0 ; i < data.length ; i++ ){
					d_c+='<option value="'+data[i].idFamilia+'">'+data[i].nombreFamilia+'</option>';
					}
					divis.find('.familia').append(d_c);
				},
				error:function(){
					console.log('NO FUNCIONO EL GET')
				}

			});
				},
				error:function(){
					console.log('NO FUNCIONO EL GET')
				}
			});

			//////////////////////AQUI VA REINO///////////////////////
				
				}},
				error:function(){
					console.log('sigue el error')
			}

			});			
		});				

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		//boton para GUARDAR GENERO


		$('#g_gen').click(function(e){
			var frm_bus = $('#busqueda-frm');
			var par_o = $('.reinog').parent().parent().parent();
			e.preventDefault();
			var divis = $('.division').parent().parent().parent();
			var if_fam = $('#id_fam').val();
			var d_c = "";
			
			$.ajax({
				type : 'post',
				url  : '{!! URL::to('ingr_gen_modal') !!}',
				datatype: 'json',
				data : $('#gen_modal').serialize(),
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
						swal("Genero ingresado", "", "success");
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
							$("#GEN_Modal").modal('hide');
							$('#GEN_Modal').trigger("reset");
							$('#msg-error-genero').fadeOut();
							$('#id_fam').val('')
							$('#gen_input_mod').val('')
			$.ajax({
				type : 'get',
				url : '{!! URL::to('buscaGenero') !!}',
				data : {'id':if_fam},
				success:function(data){
					console.log('success');
					console.log(data);
					console.log(data.length);
					d_c="";
					for(var i = 0 ; i < data.length ; i++ ){
					d_c+='<option value="'+data[i].idGenero+'">'+data[i].nombreGenero+'</option>';
				}
				divis.find('.genero').append(d_c);
			},
				error:function(){
					console.log('NO FUNCIONO EL GET')
				}
			});
				},
				error:function(){
					console.log('NO FUNCIONO EL GET')
				}
			});

					

					}
			},
				error:function(){
					console.log('sigue el error')
				}

			});

		});


		

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		//boton para GUARDAR ESPECIE

		$('#g_esp').click(function(e){
			var frm_bus = $('#busqueda-frm');
			e.preventDefault();
			var divis = $('.division').parent().parent().parent();
			var id_gen = $('#id_gen').val();
			var d_c = "";
			$.ajax({
				type : 'post',
				url  : '{!! URL::to('ingr_esp_modal') !!}',
				datatype: 'json',
				data : $('#esp_modal').serialize(),
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
						swal("Especie ingresada", "", "success");
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
							$("#ESP_Modal").modal('hide');
							$('#msg-error-especie').fadeOut();
							$('#id_gen').val('')
							$('#esp_input').val('')
			$.ajax({
				type : 'get',
				url : '{!! URL::to('buscaEspecie') !!}',
				data : {'id':id_gen},
				success:function(data){
					console.log('success');
					console.log(data);
					console.log(data.length);
					d_c="";
					for(var i = 0 ; i < data.length ; i++ ){
					d_c+='<option value="'+data[i].idEspecie+'">'+data[i].nombreEspecie+'</option>';
					}
					divis.find('.especie').append(d_c);
					},
						error:function(){
							console.log('NO FUNCIONO EL GET')
						}
					});
						},
						error:function(){
							console.log('NO FUNCIONO EL GET')
						}
					});				
				
				}
			},
			error:function(){
				console.log('sigue el error')
			}
			});
			
		});

		

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		//boton para GUARDAR SUBESPECIE


		$('#g_sub').click(function(e){
			var frm_bus = $('#busqueda-frm');
			e.preventDefault();
			var divis = $('.division').parent().parent().parent();
			var id_esp = $('#id_esp').val();			
			var d_c = "";			
			$.ajax({
				type : 'post',
				url  : '{!! URL::to('ingr_sub_modal') !!}',
				datatype: 'json',
				data : $('#sub_modal').serialize(),
				success:function(data){
					console.log('success')
					console.log(data)
					if(data.success == false){
						$('#_sub_input,#_esp_sub').text('');
						$('#msg-error-subespecie').fadeIn();
						$.each(data.errors , function(index,value){
						$('#_'+index).text(value);
						});
					}else{
						swal("Subespecie ingresada", "", "success");
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
							$("#SUB_Modal").modal('hide');
							$('#SUB_Modal').trigger("reset");
							$('#msg-error-subespecie').fadeOut();
							$('#id_esp').val('')
							$('#sub_input').val('')
			$.ajax({
				type : 'get',
				url : '{!! URL::to('buscaSubespecie') !!}',
				data : {'id':id_esp},
				success:function(data){
					console.log('success');
					console.log(data);
					console.log(data.length);
					d_c="";
					for(var i = 0 ; i < data.length ; i++ ){
					d_c+='<option value="'+data[i].idSubespecie+'">'+data[i].nombreSubespecie+'</option>';
					}
					divis.find('.subespecie').append(d_c);
					},
					error:function(){
						console.log('NO FUNCIONO EL GET')
					}
				});
				},
					error:function(){
						console.log('NO FUNCIONO EL GET')
					}
				});
					

					

					}

			},
				error:function(){
					console.log('sigue el error')
				}

			});

		});



//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

	//botones de popups para agregar taxonomia JQUERY AJAX


		//agregar clase popup


		$('#agr_cla').click(function(){
			//alert('estoy en clase');
			//$('#CLA_Modal').modal('show');

			var division = $('.division').val();
			console.log(division)


			if(division !=null){

				$('#id_div').val(division)			
				$("#CLA_Modal").modal('show');

			}else{
				swal("Seleccione una division","","warning")
			}

		});


		//combo dinamico para division clase


//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

		//POPUP de agregar orden


		$('#agr_ord').click(function(){

			var clase = $('.clase').val();
			if(clase !=null){

				$('#id_cla').val(clase)
				$('#ORD_Modal').modal('show');


			}else {

				swal("Seleccione un clase","","warning")

			}


		});


		//reino en familia



		$('#agr_fam').click(function(){
			
			var orden = $('.orden').val();
			var d_c = "";
			var c_f = "";
			var f_o = "";
			if(orden !=null){
				
				$('#id_ord').val(orden)
				$('#FAM_Modal').modal('show');

			}else{

				swal('Seleccione un orden','','warning')

			}		

		});

		/////////////////////////////agregar genero


		$('#agr_gen').click(function(){
			
			var familia = $('.familia').val();


			if(familia !=null){

				$('#id_fam').val(familia)
				$("#GEN_Modal").modal('show');


			}else{

				swal('Seleccione una familia','','warning')

			}

		});		

		///////////////////////////agregar  ESPECIE


		$('#agr_esp').click(function(){
			
			var genero = $('.genero').val();


			if(genero !=null){
				$('#id_gen').val(genero)
				$('#ESP_Modal').modal('show');
	
			}else{
	
				swal('Seleccione un genero','','warning')				

			}
		});

		/////////////////////////////agregar subespecie

		$('#agr_sub').click(function(){

			
			var especie = $('.especie').val();
			if(especie !=null){

				$('#id_esp').val(especie)			
				$('#SUB_Modal').modal('show');
			}else{

				swal('Seleccione una especie','','warning')				

			}
		});
	

		////////////////////////////////////////////////////////////////////////////
		////////		boton busqueda 			////////////////////////////////////
		///////   HACEMOS BUSQUEDA Y CAMBIAMOS AL ESTADO de la especie /////////////
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
		
		//var esp = $('.especie').val();
		//var sub = $('.subespecie').val();
		console.log('aqui va especie')
		console.log(esp)
		console.log('aqui va subespecie')
		console.log(sub)
				


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
						$('#sub_agr').text(data[0].nombreSubespecie)
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
					$('#esp_agr').text(data[0].nombreEspecie)
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
  		$('#id_esp').val('')
  		$('#sub_input').val('')
		$('#msg-error-subespecie').fadeOut();

  	})

  	$('.close_esp').click(function(){
  		//alert('vamos a cerrar esto')
  		$('#id_gen').val('')
  		$('#esp_input').val('')
		$('#msg-error-especie').fadeOut();
  	})

  	$('.close_gen').click(function(){
  		//alert('vamos a cerrar esto')
  		$('#id_fam').val('')
		$('#gen_input_mod').val('')
		$('#msg-error-genero').fadeOut();
  	})

  	$('.close_fam').click(function(){
  		//alert('vamos a cerrar esto')
  		$('#fam_input').val('')
  		$('#id_ord').val('')
  	})

  	$('.close_ord').click(function(){
  		//alert('vamos a cerrar esto')
  		$('#id_cla').val('')
		$('#ord_input_mod').val('')
		$('#msg-error-orden').fadeOut();
  	})

  	$('.close_cla').click(function(){
  		//alert('vamos a cerrar esto')
  		$('#id_div').val('')
  		$('#cla_input_mod').val('')
		$('#msg-error-clase').fadeOut();
  	})

  	$('.close_div').click(function(){
  		//alert('vamos a cerrar esto')
  		$('#id_rei').val('')
  		$('#rei_input_mod').val('')
		$('#msg-error').fadeOut();
  	})

  	$('.can_div').click(function(){
  		//alert('cierra cancelar')
  		$('#id_rei').val('')
  		$('#rei_input_mod').val('')
		$('#msg-error').fadeOut();
  	})

  	$('.can_cla').click(function(){
  		//alert('cierra cancelar')
  		$('#id_div').val('')
  		$('#cla_input_mod').val('')
		$('#msg-error-clase').fadeOut();
  	})


  	$('.can_ord').click(function(){
  		//alert('cierra cancelar')
  		$('#ord_input_mod').val('')
  		$('#id_cla').val('')

		$('#msg-error-clase').fadeOut();
  	})


  	$('.can_fam').click(function(){
  		//alert('cierra cancelar')
  		$('#id_ord').val('')
  		$('#fam_input').val('')
		$('#msg-error-orden').fadeOut();
  	})


  	$('.can_gen').click(function(){
  		//alert('cierra cancelar')
  		$('#id_fam').val('')
  		$('#gen_input_mod').val('')
		$('#msg-error-orden').fadeOut();
  	})


  	$('.can_esp').click(function(){
  		//alert('cierra cancelar')
  		$('#id_gen').val('')
  		$('#esp_input').val('')		
		$('#msg-error-especie').fadeOut();
  	})

  	$('.can_sub').click(function(){
  		//alert('cierra cancelar')
  		$('#id_esp').val('')
  		$('#sub_input').val('')
  		
		$('#msg-error-subespecie').fadeOut();

  	})

  	////////////////////////////////////////////////////////////////////////////

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

    $('#refresh-btn').click(function(){

        //$('#frm-agregar-esp').submit();
        $("#reino_id").select2("val", '0'); //set the value
		$("#division_id").select2("val", '0'); //set the value
		$("#clase_id").select2("val", '0'); //set the value
		$("#orden_id").select2("val", '0'); //set the value
		$("#familia_id").select2("val", '0'); //set the value
		$("#genero_id").select2("val", '0'); //set the value
		$("#especie_id").select2("val", '0'); //set the value

    });


	});






</script>
