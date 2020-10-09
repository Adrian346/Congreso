
<script>
	$(document).ready(function() {
		//App.init();
		var link = '<?php echo base_url() ?>asistencia/';
		funciones = {
				iniciar_asistencias : function(){
					$('#tipo').focus();
					$('#taller').hide();
					$('#evento').hide();
				},
				agregar_asistencia: function(){
					$('#btn_registrar').html('Cargando...');
					$('#btn_registrar').attr('disabled',true);
					$.ajax({
			        	url: link+'agregar_asistencia',
			        	type: 'POST',
			        	data:{
			        		id_uaa: $('#id_uaa').val(),
			        		tipo: $('#tipo').val(),
			        		descripcion_taller: $('#descripcion_taller').val(),
			        		descripcion_evento: $('#descripcion_evento').val()
			        	},
					    success : function(data){
					    	if(data == "no_registrado"){
					    		alert("No hay alumnos registrados con el id ingresado.");
					    	}
					    	$('#id_uaa').val('');
					    	$('#id_uaa').focus();
						    $("#btn_registrar").attr('disabled',false);   
						    $('#btn_registrar').html('REGISTRAR');                      
					   	}
				   	});
				},
				iniciar_listado_asistencias : function(){
					$('#id_uaa_buscar').focus();
				},
				listar_asistencias(){
					$.ajax({
						url :  link+'listar_asistencias',
					   	type : 'POST',
					   	dataType: 'JSON',
					   	data:{id_uaa: $('#id_uaa_buscar').val()},
					   	success  : function(data){
						   	$('#tabla_asistencias').empty();
						   	$.each(data, function(index, item) {
						   		$('#tabla_asistencias').append(
									'<tr>'+
						   			'<td class="text-center">'+item.tipo+'</td>'+
						   			'<td class="text-center">'+item.descripcion+'</td>'+
									'<td class="text-center">'+item.fecha+'</td>'+
				 	 				'</tr>'
						   		);
						   	});
						}
					});
				},
		};
		// B O T O N E S
		$('#btn_registrar').click(function(){
			if($('#id_uaa').val() == ''){
				alert('ID');
			}else if($('#tipo').val() == ''){
				alert('Tipo');
			}else if(($('#descripcion_taller').val() == '' && $('#tipo').val() == "TALLER") || ($('#descripcion_evento').val() == '' && $('#tipo').val() == "EVENTO")){
				alert('Descripcion');
			}else{
				funciones.agregar_asistencia();
			}
		})
		$('#btn-buscar-asistencias').click(function(){
			if($('#id_uaa_buscar').val() == ''){
				alert('ID del alumno a buscar');
			}else{
				funciones.listar_asistencias();
			}
			
		})
		$('#tipo').on('change', function(){
			var tipo = $(this).val();
			if(tipo == 'EVENTO'){
				$('#evento').show();
				$('#taller').hide();
			}else if(tipo == 'TALLER'){
				$('#taller').show();
				$('#evento').hide();
			}else{
				$('#taller').hide();
				$('#evento').hide();
			}
		});
		$('#nuevo').click(function(){
			window.open('<?php echo base_url() ?>asistencia','_self');
		})
		funciones.<?=$modulo?>();

	});
</script>
