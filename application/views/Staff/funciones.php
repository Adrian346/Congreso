	
	
<script>
	$(document).ready(function() {
		//App.init();
		var link = '<?php echo base_url() ?>staff/';

		funciones = {
			iniciar_registro_staff : function(){
			},
			registrar_staff(){
				$('#registrar').html('<i class="fas fa-spinner"></i>');
				$('#registrar').attr('disabled',true);
				$.ajax({
					url  :  link + 'registrar_staff',
				   data : {
				   		apemat: $('#apeP').val(),
		        		apepat: $('#apeM').val(),
		        		nombre: $('#nombre').val(),
		        		cargo: $('#cargo').val(),
		    			grado: $('#grado').val(),
			        	grupo: $('#grupo').val(),
			        	hora_s: $('#hora_s').val(),
			       		tel: $('#tel').val(),
			       		email: $('#email').val(),
			       		clave: $('#clave').val(),
					   	id: $('#id').val()
				   },
				   type : 'POST',
				   success  : function(data){
				   		$('#registrar').html(' Registrar');
						$('#registrar').attr('disabled',false);
						window.open('<?php echo base_url() ?>staff/staff_listado','_self');
                    }
				});
			},
			iniciar_listado_staff : function(){
				funciones.listar_staff();
			},
			listar_staff(){
				$.ajax({
					url :  link+'listar_staff',
				   	data : { },
				   	type : 'POST',
				   	dataType: 'JSON',
				   	success  : function(data){
					   	$('#lista_staff').empty();
					   	$.each(data, function(index, item) {
					   		$('#lista_staff').append(
								'<tr>'+
								'<th scope="row"><button type="button" class="btn btn-secondary btn-success editar_staff" ids="'+item.object_id+'"><img src="<?php echo base_url() ?>assets/images/lapiz.png" alt=""></button><button type="button" class="btn btn-secondary btn btn-danger eliminar_staff" ids="'+item.object_id+'"><img src="<?php echo base_url() ?>assets/images/bor.png" alt=""></button></th>'+
			   					'<td class="text-center">'+item.id+'</td>'+
			   					'<td class="text-center">'+item.nombre+' '+item.apepat+' '+item.apemat+'</td>'+
								'<td class="text-center">'+item.cargo+'</td>'+
			   					'<td class="text-center">'+item.grado+' '+item.grupo+'</td>'+
			   					'<td class="text-center">'+item.hora_s+'</td>'+
			   					'<td class="text-center">'+item.tel+'</td>'+
			   					'<td class="text-center">'+item.email+'</td>'+
			 	 				'</tr>'
					   		);
					   	});
					   	$('.eliminar_staff').click(function(){
							var id = $(this).attr('ids');
							funciones.eliminar_staff(id);
						})
						$('.editar_staff').click(function(){
							var id = $(this).attr('ids');
							funciones.ver_staff(id);
						})
					}
				});
			},
			ver_staff(id){
				$('#modal_staff').modal();
				$('#modal_staff').attr('identificador', id);
				$.ajax({
					url :  link+'ver_staff',
				   	data : { id: id },
				   	type : 'POST',
				   	dataType: 'JSON',
				   	success  : function(data){
				   		$('#apepat').val(data.apepat);
		        		$('#apemat').val(data.apemat);
		        		$('#nombre').val(data.nombre);
		        		$('#cargo').val(data.cargo);
		    			$('#grado').val(data.grado);
			        	$('#grupo').val(data.grupo);
			        	$('#hrs_servicio').val(data.hora_s);
			       		$('#telefono').val(data.tel);
			       		$('#email').val(data.email);
					   	$('#id_uaa').val(data.id);
					   	$('#clave').val(data.clave);
					}
				});
			},
			eliminar_staff(id){
				$('.eliminar_staff').attr('disabled',false);
				$.ajax({
					url :  link+'eliminar_staff',
				   	data : { id: id },
				   	type : 'POST',
				   	dataType: 'JSON',
				   	success  : function(data){
				   		$('.eliminar_staff').attr('disabled',true);
				   		funciones.listar_staff();
					}
				});
			},
			editar_staff(){
				$('#editar_staff').html('<i class="fas fa-spinner"></i>');
				$('#editar_staff').attr('disabled',true);
				$.ajax({
					url  :  link + 'editar_staff',
				   data : {
				   		apemat: $('#apemat').val(),
		        		apepat: $('#apepat').val(),
		        		nombre: $('#nombre').val(),
		        		cargo: $('#cargo').val(),
		    			grado: $('#grado').val(),
			        	grupo: $('#grupo').val(),
			        	hora_s: $('#hrs_servicio').val(),
			       		tel: $('#telefono').val(),
			       		email: $('#email').val(),
					   	id: $('#id_uaa').val(),
					   	clave: $('#clave').val(),
					   	_id: $('#modal_staff').attr('identificador')
				   },
				   type : 'POST',
				   success  : function(data){
				   		$('#editar_staff').html(' Aceptar');
						$('#editar_staff').attr('disabled',false);
						$('#modal_staff .close').trigger('click');
						funciones.listar_staff();
                    }
				});
			},
		};
		// B O T O N E S
		$('#nuevo').click(function(){
			window.open('<?php echo base_url() ?>staff','_self');
		})

		$('#registrar').click(function(){
			if($('#id').val() == ''){
				alert('ID UAA');
			} else if($('#nombre').val() == ''){
				alert('Nombre(s)');
			} else if($('#apeP').val() == ''){
				alert('Apellido Paterno');
			} else if($('#apeM').val() == ''){
				alert('Apellido Materno');
			} else if($('#cargo').val() == ''){
				alert('Cargo');
			} else if($('#grado').val() == ''){
				alert('Grado');
			} else if($('#grupo').val() == ''){
				alert('Grupo');
			} else if($('#hora_s').val() == ''){
				alert('Horas de servicio');
			} else if($('#tel').val() == ''){
				alert('Teléfono');
			} else if($('#email').val() == ''){
				alert('Email');
			} else if($('#clave').val() == ''){
				alert('Clave');
			} else{
				funciones.registrar_staff();
			}
		})

		$('#editar_staff').click(function(){
			if($('#id_uaa').val() == ''){
				alert('ID UAA');
			} else if($('#nombre').val() == ''){
				alert('Nombre(s)');
			} else if($('#apepat').val() == ''){
				alert('Apellido Paterno');
			} else if($('#apemat').val() == ''){
				alert('Apellido Materno');
			} else if($('#cargo').val() == ''){
				alert('Cargo');
			} else if($('#grado').val() == ''){
				alert('Grado');
			} else if($('#grupo').val() == ''){
				alert('Grupo');
			} else if($('#hrs_servicio').val() == ''){
				alert('Horas de servicio');
			} else if($('#telefono').val() == ''){
				alert('Teléfono');
			} else if($('#email').val() == ''){
				alert('Email');
			} else if($('#clave').val() == ''){
				alert('Clave');
			} else{
				funciones.editar_staff();
			}
		})

		funciones.<?=$modulo?>();

	});
	</script>
