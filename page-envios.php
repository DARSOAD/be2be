<?php get_header('envios'); ?>
<div class="cd-product-builder">
	<div class="cd-builder-steps">
			<h4 class="letra30pt-pc tipografiaHdos centrado" style="padding-top: 15%">INGRESA UN NÚMERO DE ORDEN</h4>
				<form action="https://www.concurvas.com/payu" method="post" accept-charset="UTF-8" autocomplete="off" class="pc-centrado-mediano2 tb-centrado-grande mv-centrado-grande2" id="elformulario" style="padding-top: 5%">
					<div class="form-group pmd-textfield pmd-textfield-floating-label">
						<label for="nombre" class="control-label"> Pedido </label>
						<input class="form-control" type="text" id="pedido" name="nombre" required>
						<span class="pmd-textfield-focused"></span>
					</div>
				
					<button type="submit" class="boton" id="irpayu" name="boton" > ¡CONSULTAR! </button>
				</form>
				<button class="botonmodal" name="boton" onclick="recheck()"> ¡BUSCAR! </button>
			</li>	
		</ul>
	</div>
</div>
<div id="bloque5">
<footer>
</footer>
	</div>		
	<!-------------------FORMULARIO PASOS JS---------------->
<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.min.js"></script>

<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
<!-------------------MENU PC js---------------->
<script src="<?php echo get_template_directory_uri(); ?>/js/menu_pc.js"></script>
<!-------------------MENU PC js---------------->
<!-------------------FORMULARIO JS---------------->
<script src="<?php echo get_template_directory_uri(); ?>/js/propellertextfield.js"></script>
<!-------------------FORMULARIO JS---------------->
<script>
	if( !window.jQuery ) document.write('<script src="<?php echo get_template_directory_uri(); ?>/jscool/jquery-3.0.0.min.js"><\/script>');
	$.ajax({
		url: "https://script.google.com/macros/s/AKfycbwY99myQY0SUmTaR8SXZhQV_dqi1dyhDdIzqdRhstamvXTrZM6tCxIVew-Unp2Wp2eNug/exec?pedido=Domis",
		headers: {'Access-Control-Allow-Origin': 'https://script.google.com/macros/s/AKfycbwY99myQY0SUmTaR8SXZhQV_dqi1dyhDdIzqdRhstamvXTrZM6tCxIVew-Unp2Wp2eNug/exec'},
		type: "GET",
		async: false,
		success: function(data){
		    objeto = data;
		}						
	});
	alert(objero.datos[1].nombre);
	function recheck() {
		var nombre = $("#nombre").val;
		var correo = $("#correo").val;
		var telefono = $("#telefono").val();
		var ciudad = $("#ciudad").val();
		var direc = $("#direc").val();
		if(!telefono || !nombre || !correo || !ciudad || !direc){alert("Por favor completa todos los campos");}
        else{$("#elformulario").submit();}
	}
</script>
<script src="<?php echo get_template_directory_uri(); ?>/jscool/main.js"></script> <!-- Resource jQuery -->
<script type="text/javascript">	
	$('.qty').attr('onchange', 'setCantidad(this.value,this.name)');
	//$("[name='amount']").val(actualPrice);
</script>
<!-------------------GOOGLEMAPS---------------->
		<script async>
			setTimeout(
				function initMap(){
					var uluru = {lat: 4.6048508, lng: -74.0888109};
					var map = new google.maps.Map(document.getElementById('map'),{
					  zoom: 16,
					  center: uluru,
					  mapTypeControlOptions: {style: google.maps.MapTypeControlStyle.DROPDOWN_MENU},
					  //mapTypeId: google.maps.MapTypeId.HYBRID,
					  mapTypeId: google.maps.MapTypeId.TERRAIN,
					  //mapTypeId: google.maps.MapTypeId.ROADMAP,
					  //mapTypeId: google.maps.MapTypeId.SATELLITE,
					});
					var marker = new google.maps.Marker({
					  position: uluru,
					  map: map,
					  animation: google.maps.Animation.BOUNCE
					});  	
					var infowindow = new google.maps.InfoWindow({
					  content: "Concurvas Local 110"
					});
					infowindow.open(map,marker);
					 google.maps.event.addListener(marker,'click',function(){
						map.setZoom(18);
						map.setCenter(marker.getPosition());
						window.setTimeout(function() {map.setZoom(16);},5000);
					});
				},5000);
			
		</script>
		<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDF_l4InEPdaNug-qDy1LZ_dUw1IMmPNFI&callback=initMap">
		</script>
<!-------------------GOOGLEMAPS---------------->
</script>
</body>
</html>
