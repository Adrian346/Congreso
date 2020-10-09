
<script>
	$(document).ready(function() {
		//App.init();
		var link = '<?php echo base_url() ?>alumno/';
		funciones = {
				iniciar_alumnos : function(){
					$('#id_uaa').focus();
				},
				agregar_alumno: function(){
					$('#btn-registrar-alumno').html('Cargando...');
					$('#btn-registrar-alumno').attr('disabled',true);
					$.ajax({
			        	url: link+'agregar_alumno',
			        	type: 'POST',
			        	data:{
			        		id_uaa: $('#id_uaa').val(),
			        		nombre: $('#nombre').val(),
			        		paterno: $('#paterno').val(),
			        		materno: $('#materno').val(),
			        		carrera: $('#carrera').val(),
			        		semestre: $('#semestre').val(),
			        		grupo: $('#grupo').val(),
			        		paquete: $('#paquete').val(),
			        		monto: $('#monto').val()},
					    success : function(data){
					    	if(data == "registrado"){
					    		$('#form_data')[0].reset();
					    	} else{
					    		alert("El pago sobrepasa el precio del paquete elegido. Intentelo de nuevo.")
					    	}
						    $("#btn-registrar-alumno").attr('disabled',false);   
						    $('#btn-registrar-alumno').html('REGISTRAR');                      
					   	}
				   	});
				},
				buscar_alumno: function(){
					$('#btn-buscar-alumno').html('Cargando...');
					$('#btn-buscar-alumno').attr('disabled',true);
					$.ajax({
			        	url: link+'buscar_alumno',
			        	type: 'POST',
			        	dataType: 'JSON',
			        	data:{id_buscar: $('#id_buscar').val()},
					    success : function(data){
						    $("#btn-buscar-alumno").attr('disabled',false);   
						    $('#btn-buscar-alumno').html('BUSCAR'); 
						    $('#nombre_buscar').html('Nombre(s): '+data.nombre); 
						    $('#paterno_buscar').html('Ap. Paterno: '+data.paterno);
						    $('#materno_buscar').html('Ap. Materno: '+data.materno);
						    $('#carrera_buscar').html('Carrera: '+data.carrera);
						    $('#semestre_buscar').html('Semestre: '+data.semestre);
						    $('#grupo_buscar').html('Grupo: '+data.grupo);
						    $('#paquete_buscar').html('Paquete: '+data.paquete);
						    $('#pagos_buscar').html('Total Pagado: $'+data.pagos);
					   	}
				   	});
				},
				iniciar_listado_alumnos : function(){
					funciones.listar_alumnos();
				},
				listar_alumnos(){
					$.ajax({
						url :  link+'listar_alumnos',
					   	type : 'POST',
					   	dataType: 'JSON',
					   	success  : function(data){
						   	$('#tabla_alumnos').empty();
						   	$.each(data, function(index, item) {
						   		$('#tabla_alumnos').append(
									'<tr>'+
									'<td class="text-center"><button type="button" class="btn btn-secondary btn-success btn_editar_alumno" _id="'+item._id+'" > <img src="<?php echo base_url() ?>assets/images/lapiz.png" alt=""></button><button type="button" class="btn btn-secondary btn btn-danger btn_eliminar_alumno" _id="'+item._id+'"> <img src="<?php echo base_url() ?>assets/images/bor.png" alt=""></button></td>'+
				   					'<td class="text-center">'+item.id_uaa+'</td>'+
						   			'<td class="text-center">'+item.nombre+'</td>'+
						   			'<td class="text-center">'+item.paterno+'</td>'+
									'<td class="text-center">'+item.materno+'</td>'+
				   					'<td class="text-center">'+item.carrera+'</td>'+
				   					'<td class="text-center">'+item.semestre+'</td>'+
				   					'<td class="text-center">'+item.grupo+'</td>'+
				   					'<td class="text-center">'+item.paquete+'</td>'+
				 	 				'</tr>'
						   		);
						   	});

						   	// E L I M I N A R

						   	$('.btn_eliminar_alumno').click(function(){
								var _id = $(this).attr('_id');
								var confirmacion = confirm("¿Esta seguro de Eliminar este registro?");
								if(confirmacion == true){
									funciones.eliminar_alumno(_id);
								}
							});

							$('.btn_editar_alumno').click(function(){
								var _id = $(this).attr('_id');
								$.ajax({
						        	url: link+'ver_alumno',
						        	type: 'POST',
						        	dataType: 'JSON',
						        	data:{_id : _id},
								   	success : function(data){
								   		$('#modal_alumno').attr('identificador', _id);
								   		$('#id_uaa').val(data.id_uaa);
								   		$('#nombre').val(data.nombre);
						        		$('#paterno').val(data.paterno);
						        		$('#materno').val(data.materno);
						        		$('#carrera').val(data.carrera);
						        		$('#semestre').val(data.semestre);
						        		$('#grupo').val(data.grupo);
						        		$('#paquete').val(data.paquete);
									   	$('#modal_alumno').modal();                  
								   	}
							   });
								
							})
						}
					});
				},
				editar_alumno(){
					$.ajax({
						url  :  link + 'editar_alumno',
						type : 'POST',
					   dataType: 'JSON',
					   data : {_id: $('#modal_alumno').attr('identificador'),
						   		id_uaa: $('#id_uaa').val(),
				        		nombre: $('#nombre').val(),
				        		paterno: $('#paterno').val(),
				        		materno: $('#materno').val(),
				        		carrera: $('#carrera').val(),
				        		semestre: $('#semestre').val(),
				        		grupo: $('#grupo').val(),
				        		paquete: $('#paquete').val()},
					   success  : function(data){
					   		$('#modal_alumno .close').trigger('click');
							funciones.listar_alumnos();
		            }
					});
				},
				eliminar_alumno: function(_id){
					$.ajax({
			        	url: link+'eliminar_alumno',
			        	type: 'POST',
			        	data:{_id : _id},
					   	success : function(data){
						   	funciones.listar_alumnos();                     
					   	}
				   });
				},
		};
		// B O T O N E S
		$('#btn-registrar-alumno').click(function(){
			if($('#id_uaa').val() == ''){
				alert('ID del alumno');
			}else if($('#nombre').val() == ''){
				alert('Nombre');
			}else if($('#paterno').val() == ''){
				alert('Apellido Paterno');
			}else if($('#Apellido Materno').val() == ''){
				alert('materno');
			}else if($('#carrera').val() == ''){
				alert('Carrera');
			}else if($('#semestre').val() == ''){
				alert('Semestre');
			}else if($('#grupo').val() == ''){
				alert('Grupo');
			}else if($('#paquete').val() == 0){
				alert('Paquete');
			}else if($('#monto').val() == ''){
				alert('Pago inicial');
			}else{
				funciones.agregar_alumno();
			}
		})
		$('#btn-buscar-alumno').click(function(){
			if($('#id_buscar').val() == ''){
				alert('ID del alumno a buscar');
			}else{
				funciones.buscar_alumno();
			}
			
		})
		$('#editar_alumno').click(function(){
			if($('#id_uaa').val() == ''){
				alert('ID del alumno');
			}else if($('#nombre').val() == ''){
				alert('Nombre');
			}else if($('#paterno').val() == ''){
				alert('Apellido Paterno');
			}else if($('#Apellido Materno').val() == ''){
				alert('materno');
			}else if($('#carrera').val() == ''){
				alert('Carrera');
			}else if($('#semestre').val() == ''){
				alert('Semestre');
			}else if($('#grupo').val() == ''){
				alert('Grupo');
			}else if($('#paquete').val() == 0){
				alert('Paquete');
			}else{
				funciones.editar_alumno();
			}
			
		})
		$('#nuevo').click(function(){
			window.open('<?php echo base_url() ?>alumno','_self');
		})
		funciones.<?=$modulo?>();

	});
</script>
