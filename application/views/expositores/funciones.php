
<script>
	$(document).ready(function() {
		//App.init();
		var link = '<?php echo base_url() ?>expositores/';
		funciones = {
				iniciar_expositor : function(){
					$('#nombre').focus();
				},
				agregar_expositor: function(){
					$('#btn_registrar').html('Cargando...');
					$('#btn_registrar').attr('disabled',true);
					$.ajax({
			        	url: link+'agregar_expositor',
			        	type: 'POST',
			        	data:{
			        		nombre: $('#nombre').val(),
			        		paterno: $('#paterno').val(),
			        		materno: $('#materno').val(),
			        		experiencia: $('#experiencia').val(),
			        		imparte: $('#imparte').val()},
					    success : function(data){
						    window.open('<?php echo base_url() ?>expositores/listado/','_self');                   
					   	}
				   	});
				},
				iniciar_listado_expositores : function(){
					funciones.listar_expositores();
				},
				listar_expositores(){
					$.ajax({
						url :  link+'listar_expositores',
					   	type : 'POST',
					   	dataType: 'JSON',
					   	success  : function(data){
						   	$('#tabla_expositores').empty();
						   	$.each(data, function(index, item) {
						   		$('#tabla_expositores').append(
									'<tr>'+
									'<td class="text-center"><button type="button" class="btn btn-secondary btn-success btn_editar_expositor" _id="'+item._id+'" > <img src="<?php echo base_url() ?>assets/images/lapiz.png" alt=""></button><button type="button" class="btn btn-secondary btn btn-danger btn_eliminar_expositor" _id="'+item._id+'"> <img src="<?php echo base_url() ?>assets/images/bor.png" alt=""></button></td>'+
				   					'<td class="text-center">'+item.nombre+'</td>'+
						   			'<td class="text-center">'+item.paterno+'</td>'+
						   			'<td class="text-center">'+item.materno+'</td>'+
									'<td class="text-center">'+item.experiencia+'</td>'+
				   					'<td class="text-center">'+item.imparte+'</td>'+
				 	 				'</tr>'
						   		);
						   	});

						   	// E L I M I N A R

						   	$('.btn_eliminar_expositor').click(function(){
								var _id = $(this).attr('_id');
								var confirmacion = confirm("¿Esta seguro de Eliminar este registro?");
								if(confirmacion == true){
									funciones.eliminar_expositor(_id);
								}
							});

							$('.btn_editar_expositor').click(function(){
								var _id = $(this).attr('_id');
								$.ajax({
						        	url: link+'ver_expositor',
						        	type: 'POST',
						        	dataType: 'JSON',
						        	data:{_id : _id},
								   	success : function(data){
								   		$('#modal_expositor').attr('identificador', _id);
								   		$('#nombre').val(data.nombre);
						        		$('#paterno').val(data.paterno);
						        		$('#materno').val(data.materno);
						        		$('#experiencia').val(data.experiencia);
						        		$('#imparte').val(data.imparte);
									   	$('#modal_expositor').modal();                  
								   	}
							   });
								
							})
						}
					});
				},
				editar_expositor(){
					$.ajax({
						url  :  link + 'editar_expositor',
						type : 'POST',
					   dataType: 'JSON',
					   data : {_id: $('#modal_expositor').attr('identificador'),
						   		nombre: $('#nombre').val(),
				        		paterno: $('#paterno').val(),
				        		materno: $('#materno').val(),
				        		experiencia: $('#experiencia').val(),
				        		imparte: $('#imparte').val()},
					   success  : function(data){
					   		$('#modal_expositor .close').trigger('click');
								funciones.listar_expositores();
		            }
					});
				},
				eliminar_expositor : function(_id){
					$.ajax({
			        	url: link+'eliminar_expositor',
			        	type: 'POST',
			        	data:{_id : _id},
					   	success : function(data){
						   	funciones.listar_expositores();                     
					   	}
				   });
				},
		};
		// B O T O N E S
		$('#btn_registrar').click(function(){
			if($('#nombre').val() == ''){
				alert('Nombre');
			}else if($('#paterno').val() == ''){
				alert('Apellido Paterno');
			}else if($('#materno').val() == ''){
				alert('Apellido Materno');
			}else if($('#experiencia').val() == ''){
				alert('Experiencia');
			}else if($('#imparte').val() == ''){
				alert('Imparte');
			}else{
				funciones.agregar_expositor();
			}
		});

		$('#editar_expositor').click(function(){
			if($('#nombre').val() == ''){
				alert('Nombre');
			}else if($('#paterno').val() == ''){
				alert('Apellido Paterno');
			}else if($('#materno').val() == ''){
				alert('Apellido Materno');
			}else if($('#experiencia').val() == ''){
				alert('Experiencia');
			}else if($('#imparte').val() == ''){
				alert('Imparte');
			}else{
				funciones.editar_expositor();
			}
			
		});

		$('#nuevo_expositor').click(function(){
			window.open('<?php echo base_url() ?>expositores/','_self');  
			
		});

		funciones.<?=$modulo?>();

	});
</script>
