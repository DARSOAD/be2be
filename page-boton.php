<?php get_header('boton'); ?>
<div class="cd-product-builder">
	<div class="cd-builder-steps">
			<h4 class="letra30pt-pc tipografiaHdos centrado" style="padding-top: 15%">¡BOTÓN DE PAGO! DÉJANOS TUS DATOS Y EL MONTO PARA TU PAGO</h4>
				<form action="https://www.concurvas.com/payu" method="post" accept-charset="UTF-8" autocomplete="off" class="pc-centrado-mediano2 tb-centrado-grande mv-centrado-grande2" id="elformulario" style="padding-top: 5%">
					<input name="description" type="hidden"  value="BOTON DE PAGO" id="description">
					<!--<div class="form-group pmd-textfield pmd-textfield-floating-label">-->
						<label for="valor" class="control-label valorl"> Valor </label>
						<input name="amount" type="number" step="1000"></input>
					<!--</div>-->
					<div class="form-group pmd-textfield pmd-textfield-floating-label">
						<label for="nombre" class="control-label"> Nombre </label>
						<input class="form-control" type="text" id="nombre" name="nombre" required>
						<span class="pmd-textfield-focused"></span>
					</div>
					<div class="form-group pmd-textfield pmd-textfield-floating-label">
						<label for="correo" class="control-label"> E-mail </label>
						<input class="form-control" type="email" id="correo" name="correo" pattern=".+@globex\.com" size="30" required>
						<span class="pmd-textfield-focused"></span>
					</div>
					<div class="form-group pmd-textfield pmd-textfield-floating-label">
						<label for="telefono" class="control-label"> Teléfono </label>
						<input class="form-control" type="text" id="telefono" name="telefono" required>
						<span class="pmd-textfield-focused"></span>
					</div>
					<div class="form-group pmd-textfield pmd-textfield-floating-label">
						<label for="ciudad" class="control-label"> Ciudad </label>
						<input class="form-control" type="text" id="ciudad" name="ciudad" required>
						<span class="pmd-textfield-focused"></span>
					</div>
					<div class="form-group pmd-textfield pmd-textfield-floating-label">
						<label for="direc" class="control-label"> Dirección </label>
						<input class="form-control" type="text" id="direc" name="direc" required>
						<span class="pmd-textfield-focused"></span>
					</div>
					<button type="submit" class="boton" id="irpayu" name="boton" > ¡COMPRAR! </button>
				</form>
				<button class="botonmodal" name="boton" onclick="recheck()"> ¡COMPRAR! </button>
			</li>	
		</ul>
	</div>
</div>
<div id="bloque5">
<footer>
	<div id="footerproductos">
		<h3 class="footerh3"> PRODUCTOS </h3>
		<ul class="footerul">
<?php

	$cats = get_categories( array(
	'hide_empty' => 0,
    'orderby' => 'name',
    'taxonomy'   => 'product_cat'
)  );
  
if ( ! empty( $cats ) ) {
    // print_r($cats);
     foreach ( $cats as $term ) {
     // If parent cat ID = 116 echo subcat name...
     	if( (!$term->parent && $term->slug != 'sin-categorizar') || $term->parent == 16) { 
     		?> <li><a href="<?php echo get_site_url(); ?>/catalogo/?vara=<?php echo $term->category_nicename;?>/"> <?php echo $term->name; ?> </a></li> <?php
    	}		
	 }
}
?>

							
		</ul>	
	</div>
	<div id="footerproductosalpormayor">
		<h3 class="footerh3"> PRODUCTOS AL POR MAYOR </h3>
		<ul class="footerul" id="ul1">
			<?php

	$cats = get_categories( array(
	'hide_empty' => 0,
    'orderby' => 'name',
    'taxonomy'   => 'product_cat'
)  );
  
if ( ! empty( $cats ) ) {
     //print_r($cats);
     foreach ( $cats as $term ) {
     // If parent cat ID = 116 echo subcat name...
     	if( (!$term->parent && $term->slug != 'sin-categorizar') || $term->parent == 16) { 
     		?> <li><a href="<?php echo get_site_url(); ?>/catalogo/?vara=<?php echo $term->category_nicename;?>/"> <?php echo $term->name; ?> al por mayor </a></li> <?php
    	}		
	 }
}
?>
		</ul>
		<h4 class="footerh3" id="pstion1"> HORARIOS DE ATENCIÓN</h4>
		<ul class="footerul" id="pstion2">
			<li> <p>Lunes a Sábado  9:00 a.m - 7:00 p.m</p> </li>							
			<li> <p>Domingo         10:00 a.m - 4:00 p.m</p> </li>
		</ul>
	</div>
	<div id="googlemaps">
		<div id="map"> </div>
		<h3 class="footerh3tienda"> ENCUENTRA EL ALMACEN <span> &#10140; </span> </h3>
	</div>
	<div id="footercontacto">
		<h3 class="footerh3"> CONTÁCTENOS </h3>
		<ul class="footerul footerul2">
			<li><a href=""> concurvas.almacen@gmail.com </a></li>
			<li class="celular"> Cll 10 No 20-30, CC Puerto Principe, Local 110 Bogotá Colombia </li>
			<li class="pc tablet"><a href="https://api.whatsapp.com/send?phone=573053449733" target="_blank"> <img src="<?php echo get_template_directory_uri(); ?>/imagenes/iconos/whatsapp-logo.png" alt="WhatsApp" style="width: 2.2% !important; height: auto !important;"> 3053449733 </a></li>							
		</ul>
	</div>
	<div id="footerdatoscontacto">
		<ul class="footerul footerul2">							
			<li class="pc"> Cll 10 No 20-30, CC Puerto Principe, Local 110 Bogotá Colombia </li>
			<li class="tablet"> Cll 10 No 20-30, CC Puerto Principe, Local 110 </li>
							<li class="celular"><a href="https://api.whatsapp.com/send?phone=573053449733" target="_blank"> <img src="<?php echo get_template_directory_uri(); ?>/imagenes/iconos/whatsapp-logo.png" alt="WhatsApp" style="width: 2.2% !important; height: auto !important;"> 3053449733 </a></li>		
						</ul>
					</div>
					<div id="redessociales">
						<!--<figure class="pc">
							<img src="<?php echo get_template_directory_uri(); ?>/imagenes/iconos/facebook.png" alt="facebook">
						</figure>
						<figure class="pc">
							<img src="<?php echo get_template_directory_uri(); ?>/imagenes/iconos/twitter.png" alt="twitter">
						</figure>
						<figure class="pc">
							<img src="<?php echo get_template_directory_uri(); ?>/imagenes/iconos/instagram.png" alt="instagram">
						</figure>-->
					
						
					</div>
					<div id="sombra" ></div>
					<div id="terminosycondiciones">
						<h4> Copyright &#169; Concurvas &reg; Desarrollado por Mainteam Agencia. </h4>
						<a href="http://www.concurvas.com/terminos-y-condiciones/"><h5> Términos y condiciones </h5></a> 
					</div>
					
					
				</footer>
	</div>		
	<!-------------------FORMULARIO PASOS JS---------------->
<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.min.js"></script>

<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
<!-------------------MENU PC js---------------->
<script src="<?php echo get_template_directory_uri(); ?>/js/menu_pc.js"></script>
<!-------------------MENU PC js---------------->
<!---------------------------------------MENU DESLEGABLE DERECHA------------------->
	<script src="<?php echo get_template_directory_uri(); ?>/js/menu_derecha.js"></script>  
	<script src="<?php echo get_template_directory_uri(); ?>/jscool/bootstrap-input-spinner.js"></script>  
	
	<script>
    $("input[type='number']").inputSpinner()
    $("input.small").inputSpinner({groupClass: "input-group-sm"})
    $("input.large").inputSpinner({groupClass: "input-group-lg"})
</script>
<!---------------------------------------MENU DESLEGABLE DERECHA------------------->
<!-------------------FORMULARIO JS---------------->
<script src="<?php echo get_template_directory_uri(); ?>/js/propellertextfield.js"></script>
<!-------------------FORMULARIO JS---------------->
<script>
	if( !window.jQuery ) document.write('<script src="<?php echo get_template_directory_uri(); ?>/jscool/jquery-3.0.0.min.js"><\/script>');
	function recheck() {
		var nombre = $("#nombre").val();
		var correo = $("#correo").val();
		var telefono = $("#telefono").val();
		var ciudad = $("#ciudad").val();
		var direc = $("#direc").val();
		if(!telefono || !nombre || !correo || !ciudad || !direc){alert("Por favor completa todos los campos"); return false;}
		let checkarr = 0;
		let afterarr = 0; 
		let punto = 0;
		let afterpunto = 0;
		for (let i = 0; i < correo.length; i++) {
			console.log(correo[i]);
			if(checkarr == 1){
				if(punto == 1){
					if(correo[i]=="."){alert("Por favor verifica el correo, no puede tener dos puntos despues del @");return false;}
					afterpunto++;
				}
				if(correo[i]==" "){alert("Por favor verifica que el correo no tenga espacios ni al inicio ni al final");return false;}
				if(correo[i]=="@"){alert("Por favor verifica el correo, no puede tener dos @");return false;}
				if(correo[i]=="." && afterarr == 0){alert("Por favor verifica el correo, no puede tener un punto depues del @");return false;}
				if(correo[i]=="."){punto = 1;}
				afterarr++;
				
			}
			if(i == 0 && correo[i] == "@"){alert("Por favor verifica el correo, no puede empezar por @");return false;}
			if(correo[i] == " "){alert("Por favor verifica que el correo no tenga espacios ni al inicio ni al final");return false;}
			if(correo[i]=="@"){checkarr = 1;}
			
		}
		if(afterpunto < 2){alert("Por favor llena bien los datos de correo"); return false;}
		if(correo.length < 4){alert("Por favor llena bien los datos de correo"); return false;}
		if(correo.includes(" ")){alert("Por favor verifica que el correo no tenga espacios ni al inicio ni al final");return false;}
        $("#elformulario").submit();
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
