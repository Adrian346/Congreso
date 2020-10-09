
<script>
	$(document).ready(function() {
		//App.init();
		var link = '<?php echo base_url() ?>eventos/';
		funciones = {
				iniciar_eventos : function(){
					$('#tipo').focus();
				},
				agregar_evento: function(){
					$('#btn_registrar').html('Cargando...');
					$('#btn_registrar').attr('disabled',true);
					$.ajax({
			        	url: link+'agregar_evento',
			        	type: 'POST',
			        	data:{
			        		tipo: $('#tipo').val(),
			        		nombre: $('#nombre').val(),
			        		descripcion: $('#descripcion').val(),
			        		fecha: $('#fecha').val(),
			        		lugar: $('#lugar').val(),
			        		expositor: $('#expositor').val(),
			        		encargado: $('#encargado').val(),
			        		cupo: $('#cupo').val()},
					    success : function(data){
					    	$('#form_data')[0].reset();
						    $("#btn_registrar").attr('disabled',false);   
						    $('#btn_registrar').html('REGISTRAR'); 
						    window.open('<?php echo base_url() ?>eventos/listado','_self');                     
					   	}
				   	});
				},
				iniciar_listado_eventos : function(){
					funciones.listar_eventos();
				},
				listar_eventos(){
					$.ajax({
						url :  link+'listar_eventos',
					   	type : 'POST',
					   	dataType: 'JSON',
					   	success  : function(data){
						   	$('#tabla_eventos').empty();
						   	$.each(data, function(index, item) {
						   		$('#tabla_eventos').append(
									'<tr>'+
									'<td class="text-center"><button type="button" class="btn btn-secondary btn-success btn_editar_evento" _id="'+item._id+'" > <img src="<?php echo base_url() ?>assets/images/lapiz.png" alt=""></button><button type="button" class="btn btn-secondary btn btn-danger btn_eliminar_evento" _id="'+item._id+'"> <img src="<?php echo base_url() ?>assets/images/bor.png" alt=""></button></td>'+
				   					'<td class="text-center">'+item.tipo+'</td>'+
						   			'<td class="text-center">'+item.nombre+'</td>'+
						   			'<td class="text-center">'+item.descripcion+'</td>'+
									'<td class="text-center">'+item.lugar+'</td>'+
				   					'<td class="text-center">'+item.fecha+'</td>'+
				   					'<td class="text-center">'+item.expositor+'</td>'+
				   					'<td class="text-center">'+item.encargado+'</td>'+
				   					'<td class="text-center">'+item.cupo+'</td>'+
				 	 				'</tr>'
						   		);
						   	});

						   	// E L I M I N A R

						   	$('.btn_eliminar_evento').click(function(){
								var _id = $(this).attr('_id');
								var confirmacion = confirm("¿Esta seguro de Eliminar este registro?");
								if(confirmacion == true){
									funciones.eliminar_evento(_id);
								}
							});

							$('.btn_editar_evento').click(function(){
								var _id = $(this).attr('_id');
								$.ajax({
						        	url: link+'ver_evento',
						        	type: 'POST',
						        	dataType: 'JSON',
						        	data:{_id : _id},
								   	success : function(data){
								   		$('#modal_evento').attr('identificador', _id);
								   		$('#nombre').val(data.nombre);
						        		$('#tipo').val(data.tipo);
						        		$('#descripcion').val(data.descripcion);
						        		$('#lugar').val(data.lugar);
						        		$('#fecha').val(data.fecha);
						        		$('#expositor').val(data.expositor);
						        		$('#encargado').val(data.encargado);
						        		$('#encargado').val(data.encargado);
						        		$('#cupo').val(data.cupo);
									   	$('#modal_evento').modal();                  
								   	}
							   });
								
							})
						}
					});
				},
				editar_evento(){
					$.ajax({
						url  :  link + 'editar_evento',
						type : 'POST',
					   dataType: 'JSON',
					   data : {_id: $('#modal_evento').attr('identificador'),
						   		tipo: $('#tipo').val(),
				        		nombre: $('#nombre').val(),
				        		descripcion: $('#descripcion').val(),
				        		fecha: $('#fecha').val(),
				        		lugar: $('#lugar').val(),
				        		expositor: $('#expositor').val(),
				        		encargado: $('#encargado').val(),
				        		cupo: $('#cupo').val()},
					   success  : function(data){
					   		$('#modal_evento .close').trigger('click');
								funciones.listar_eventos();
		            }
					});
				},
				eliminar_evento : function(_id){
					$.ajax({
			        	url: link+'eliminar_evento',
			        	type: 'POST',
			        	data:{_id : _id},
					   	success : function(data){
						   	funciones.listar_eventos();                     
					   	}
				   });
				},
		};
		// B O T O N E S
		$('#btn_registrar').click(function(){
			if($('#tipo').val() == ''){
				alert('Tipo de evento');
			}else if($('#nombre').val() == ''){
				alert('Nombre');
			}else if($('#descripcion').val() == ''){
				alert('Descripcion');
			}else if($('#lugar').val() == ''){
				alert('Lugar');
			}else if($('#fecha').val() == ''){
				alert('Fecha');
			}else if($('#expositor').val() == ''){
				alert('Expositor');
			}else if($('#encargado').val() == ''){
				alert('Encargado');
			}else if($('#cupo').val() == ''){
				alert('Cupo');
			}else{
				funciones.agregar_evento();
			}
		})
		$('#editar_evento').click(function(){
			if($('#tipo').val() == ''){
				alert('Tipo de evento');
			}else if($('#nombre').val() == ''){
				alert('Nombre');
			}else if($('#descripcion').val() == ''){
				alert('Descripcion');
			}else if($('#lugar').val() == ''){
				alert('Lugar');
			}else if($('#fecha').val() == ''){
				alert('Fecha');
			}else if($('#expositor').val() == 0){
				alert('Expositor');
			}else if($('#encargado').val() == ''){
				alert('Encargado');
			}else if($('#cupo').val() == ''){
				alert('Cupo');
			}else{
				funciones.editar_evento();
			}
			
		})
		$('#nuevo').click(function(){
			window.open('<?php echo base_url() ?>eventos','_self');
		})
		funciones.<?=$modulo?>();

	});
</script>
