	
	
<script>
	$(document).ready(function() {
		//App.init();
		var link = '<?php echo base_url() ?>login/';

		funciones = {
			iniciar_login(){

			},
			login(){
				$('#login').attr('disabled',true);
				$.ajax({
					url  :  link + 'confirmar_login',
				   data : {
				   		id: $('#id_uaa').val(),
		        		password: $('#password').val(),
				   },
				   type : 'POST',
				   dataType: 'JSON',
				   success  : function(data){
						$('#login').attr('disabled',false);
						if(data.estatus == "error_id"){
							$('#id_uaa').val('');
							$('#id_uaa').focus();
						} else if(data.estatus == "error_password"){
							$('#password').val('');
							$('#password').focus();
						} else if(data.estatus == "acceso_correcto"){
							window.open('<?php echo base_url() ?>login/nivel_usuario','_self');
						}
                    }
				});
			},
		};
		// B O T O N E S

		$('#login').click(function(){
			funciones.login();
		})

		funciones.<?=$modulo?>();

	});
	</script>
