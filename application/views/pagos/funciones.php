
<script>
	$(document).ready(function() {
		//App.init();
		var link = '<?php echo base_url() ?>pagos/';
		funciones = {
				iniciar_pagos : function(){
					$('#id_uaa').focus();
				},
				agregar_pago: function(){
					$('#btn-registrar-pago').html('Cargando...');
					$('#btn-registrar-pago').attr('disabled',true);
					$.ajax({
			        	url: link+'agregar_pago',
			        	type: 'POST',
			        	dataType: 'JSON',
			        	data:{
			        		id_uaa: $('#id_uaa').val(),
			        		monto: $('#monto').val()},
					    success : function(data){
					    	if(data.estatus == "registrado"){
					    		$('#form_data')[0].reset();
					    	} else{
					    		alert("La suma de los pagos sobrepasa el precio del paquete de $" + data.precio_paquete);
					    	}
						    $("#btn-registrar-pago").attr('disabled',false);   
						    $('#btn-registrar-pago').html('REGISTRAR');                      
					   	}
				   	});
				},
				iniciar_listado_pagos : function(){
					$('#id_uaa_buscar').focus();
				},
				listar_pagos(){
					$.ajax({
						url :  link+'listar_pagos',
					   	type : 'POST',
					   	dataType: 'JSON',
					   	data:{id_uaa: $('#id_uaa_buscar').val()},
					   	success  : function(data){
						   	$('#tabla_pagos').empty();
						   	$.each(data, function(index, item) {
						   		$('#tabla_pagos').append(
									'<tr>'+
						   			'<td class="text-center">$'+item.monto+'</td>'+
									'<td class="text-center">'+item.fecha+'</td>'+
				 	 				'</tr>'
						   		);
						   	});
						}
					});
				},
		};
		// B O T O N E S
		$('#btn-registrar-pagos').click(function(){
			if($('#id_uaa').val() == ''){
				alert('ID del alumno');
			}else if($('#monto').val() == ''){
				alert('Monto');
			}else{
				funciones.agregar_pago();
			}
		})
		$('#btn-buscar-pagos').click(function(){
			if($('#id_uaa_buscar').val() == ''){
				alert('ID del alumno a buscar');
			}else{
				funciones.listar_pagos();
			}
			
		})
		$('#nuevo').click(function(){
			window.open('<?php echo base_url() ?>pagos','_self');
		})
		funciones.<?=$modulo?>();
	});
</script>
