
<script>
	$(document).ready(function() {
		//App.init();
		var link = '<?php echo base_url() ?>alta_taller/';
		funciones = {
				iniciar_taller : function(){
					$('#nombre').focus();
				},
				agregar_taller: function(){
					$('#btn_registrar').html('Cargando...');
					$('#btn_registrar').attr('disabled',true);
					$.ajax({
			        	url: link+'agregar_taller',
			        	type: 'POST',
			        	data:{
			        		nombre: $('#nombre').val(),
			        		descripcion: $('#descripcion').val(),
			        		lugar: $('#lugar').val(),
			        		fecha: $('#fecha').val(),
			        		hora: $('#hora').val(),
			        		expositor: $('#expositor').val(),
			        		cupo: $('#cupo').val()},
					    success : function(data){
						    window.open('<?php echo base_url() ?>alta_taller/listado/','_self');                          
					   	}
				   	});
				},
				iniciar_listado_talleres : function(){
					funciones.listar_talleres();
				},
				listar_talleres(){
					$.ajax({
						url :  link+'listar_talleres',
				   	type : 'POST',
				   	dataType: 'JSON',
				   	success  : function(data){
					   	$('#tabla_talleres').empty();
					   	$.each(data, function(index, item) {
					   		$('#tabla_talleres').append(
								'<tr>'+
								'<td class="text-center"><button type="button" class="btn btn-secondary btn-success btn_editar_taller" _id="'+item._id+'"> <img src="<?php echo base_url() ?>assets/images/lapiz.png" alt=""></button><button type="button" class="btn btn-secondary btn btn-danger btn_eliminar_taller" _id="'+item._id+'" > <img src="<?php echo base_url() ?>assets/images/bor.png" alt=""></button></td>'+
			   					'<td class="text-center">'+item.nombre+'</td>'+
					   			'<td class="text-center">'+item.descripcion+'</td>'+
					   			'<td class="text-center">'+item.lugar+'</td>'+
								'<td class="text-center">'+item.fecha+'</td>'+
			   					'<td class="text-center">'+item.hora+'</td>'+
			   					'<td class="text-center">'+item.expositor+'</td>'+
			   					'<td class="text-center">'+item.cupo+'</td>'+
			 	 				'</tr>'
					   		);
					   	});

					   	// E L I M I N A R

					   	$('.btn_eliminar_taller').click(function(){
								var _id = $(this).attr('_id');
								var confirmacion = confirm("¿Esta seguro de Eliminar este registro?");
								if(confirmacion == true){
									funciones.eliminar_taller(_id);
								}
							});

							$('.btn_editar_taller').click(function(){
								var _id = $(this).attr('_id');
								$.ajax({
						        	url: link+'ver_taller',
						        	type: 'POST',
						        	dataType: 'JSON',
						        	data:{_id : _id},
								   	success : function(data){
								   		$('#modal_taller').attr('identificador', _id);
								   		$('#nombre').val(data.nombre);
							        		$('#descripcion').val(data.descripcion);
							        		$('#lugar').val(data.lugar);
							        		$('#fecha').val(data.fecha);
							        		$('#hora').val(data.hora);
							        		$('#expositor').val(data.expositor);
							        		$('#cupo').val(data.cupo);
									   	$('#modal_taller').modal();                  
								   	}
							   });
								
							})
						}
					});
				},
				editar_taller(){
					$.ajax({
						url  :  link + 'editar_taller',
						type : 'POST',
					   dataType: 'JSON',
					   data : {_id: $('#modal_taller').attr('identificador'),
					   		nombre: $('#nombre').val(),
				        		descripcion: $('#descripcion').val(),
				        		lugar: $('#lugar').val(),
				        		fecha: $('#fecha').val(),
				        		hora: $('#hora').val(),
				        		expositor: $('#expositor').val(),
				        		cupo: $('#cupo').val()},
					   success  : function(data){
					   		$('#modal_taller .close').trigger('click');
								funciones.listar_talleres();
		            }
					});
				},
				eliminar_taller : function(_id){
					$.ajax({
			        	url: link+'eliminar_taller',
			        	type: 'POST',
			        	data:{_id : _id},
					   	success : function(data){
						   	funciones.listar_talleres();                     
					   	}
				   });
				},
		};
		// B O T O N E S
		$('#btn_registrar').click(function(){
			if($('#nombre').val() == ''){
				alert('Nombre');
			}else if($('#descripcion').val() == ''){
				alert('Descripción');
			}else if($('#lugar').val() == ''){
				alert('Lugar');
			}else if($('#hora').val() == ''){
				alert('Hora');
			}else if($('#expositores').val() == 0){
				alert('Expositor');
			}else if($('#cupo').val() == ''){
				alert('Cupo');
			}else{
				funciones.agregar_taller();
			}
		});

		$('#editar_taller').click(function(){
			if($('#nombre').val() == ''){
				alert('Nombre');
			}else if($('#descripcion').val() == ''){
				alert('Descripción');
			}else if($('#lugar').val() == ''){
				alert('Lugar');
			}else if($('#hora').val() == ''){
				alert('Hora');
			}else if($('#expositores').val() == 0){
				alert('Expositor');
			}else if($('#cupo').val() == ''){
				alert('Cupo');
			}else{
				funciones.editar_taller();
			}
			
		});

		$('#nuevo_taller').click(function(){
			window.open('<?php echo base_url() ?>alta_taller/','_self');  
			
		});


		funciones.<?=$modulo?>();

	});
</script>
