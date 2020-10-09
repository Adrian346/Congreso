	
	
<script>
	$(document).ready(function() {
		//App.init();
		var link = '<?php echo base_url() ?>paquetes/';

		funciones = {
			iniciar_registro_paquetes : function(){
			},
			registrar_paquete(){
				$('#registrar').html('<i class="fas fa-spinner"></i>');
				$('#registrar').attr('disabled',true);
				$.ajax({
					url  :  link + 'registrar_paquete',
				   data : {
				   		nombre: $('#nombre').val(),
		        		contenido: $('#contenido').val(),
		        		precio: $('#precio').val(),
				   },
				   type : 'POST',
				   success  : function(data){
				   		$('#registrar').html(' Registrar');
						$('#registrar').attr('disabled',false);
						window.open('<?php echo base_url() ?>paquetes/paquetes_listado','_self');
                    }
				});
			},
			iniciar_listado_paquetes : function(){
				funciones.listar_paquetes();
			},
			listar_paquetes(){
				$.ajax({
					url :  link+'listar_paquetes',
				   	data : { },
				   	type : 'POST',
				   	dataType: 'JSON',
				   	success  : function(data){
					   	$('#lista_staff').empty();
					   	$.each(data, function(index, item) {
					   		$('#lista_staff').append(
								'<tr>'+
								'<th scope="row"><button type="button" class="btn btn-secondary btn-success editar_paquete" ids="'+item.id+'"><img src="<?php echo base_url() ?>assets/images/lapiz.png" alt=""></button><button type="button" class="btn btn-secondary btn btn-danger eliminar_paquete" ids="'+item.id+'"><img src="<?php echo base_url() ?>assets/images/bor.png" alt=""></button></th>'+
			   					'<td class="text-center">'+item.nombre+'</td>'+
			   					'<td class="text-center">'+item.contenido+'</td>'+
			   					'<td class="text-center">'+item.precio+'</td>'+
			 	 				'</tr>'
					   		);
					   	});
					   	$('.eliminar_paquete').click(function(){
							var id = $(this).attr('ids');
							funciones.eliminar_paquete(id);
						})
						$('.editar_paquete').click(function(){
							var id = $(this).attr('ids');
							funciones.ver_paquete(id);
						})
					}
				});
			},
			ver_paquete(id){
				$('#modal_paquete').modal();
				$('#modal_paquete').attr('identificador', id);
				$.ajax({
					url :  link+'ver_paquete',
				   	data : { id: id },
				   	type : 'POST',
				   	dataType: 'JSON',
				   	success  : function(data){
				   		$('#nombre').val(data.nombre);
		        		$('#contenido').val(data.contenido);
		        		$('#precio').val(data.precio);
					}
				});
			},
			eliminar_paquete(id){
				$('.eliminar_paquete').attr('disabled',false);
				$.ajax({
					url :  link+'eliminar_paquete',
				   	data : { id: id },
				   	type : 'POST',
				   	dataType: 'JSON',
				   	success  : function(data){
				   		$('.eliminar_paquete').attr('disabled',true);
				   		funciones.listar_paquetes();
					}
				});
			},
			editar_paquete(){
				$('#editar_paquete').html('<i class="fas fa-spinner"></i>');
				$('#editar_paquete').attr('disabled',true);
				$.ajax({
					url  :  link + 'editar_paquete',
				   data : {
				   		id: $('#modal_paquete').attr('identificador'),
				   		nombre: $('#nombre').val(),
		        		contenido: $('#contenido').val(),
		        		precio: $('#precio').val(),
				   },
				   type : 'POST',
				   success  : function(data){
				   		$('#editar_paquete').html(' Aceptar');
						$('#editar_paquete').attr('disabled',false);
						$('#modal_paquete .close').trigger('click');
						funciones.listar_paquetes();
                    }
				});
			},
		};
		// B O T O N E S
		$('#nuevo').click(function(){
			window.open('<?php echo base_url() ?>paquetes','_self');
		})

		$('#registrar').click(function(){
			if($('#nombre').val() == ''){
				alert('Nombre del Paquete');
			} else if($('#contenido').val() == ''){
				alert('Contenido del Paquete');
			} else if($('#precio').val() == ''){
				alert('Precio');
			} else{
				funciones.registrar_paquete();
			}
		})

		$('#editar_paquete').click(function(){
			if($('#nombre').val() == ''){
				alert('Nombre del Paquete');
			} else if($('#contenido').val() == ''){
				alert('Contenido del Paquete');
			} else if($('#precio').val() == ''){
				alert('Precio');
			} else{
				funciones.editar_paquete();
			}
		})

		funciones.<?=$modulo?>();

	});
	</script>
