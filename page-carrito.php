<?php get_header('carro'); ?>
<div class="cd-product-builder">
	<div class="cd-builder-steps">
		<ul>
			<li data-selection="summary" class="builder-step active" id="remover">
				<section class="cd-step-content" id="elResumenPro">

					<div id="cabeceras">
						<div class="col-lg-2 col-md-2 col-sm-2 col-xs-4">
							<h5>Imagen</h5>
						</div>
						<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 pc tablet">
							<h2 class="letra25pt-pc letra4pt-mv tipografiaHdos">MODELO</h2>
						</div>
						<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 pc tablet">
							<h2 class="letra25pt-pc letra4pt-mv tipografiaHdos">COLOR</h2>
						</div>
						<div class="col-lg-2 col-md-2 col-sm-2 pc tablet">
							<h2 class="letra25pt-pc letra4pt-mv tipografiaHdos">TALLA</h2>
						</div>
						<div class="col-lg-2 col-md-2 col-sm-2 col-xs-4">
							<h2 class="letra25pt-pc letra4pt-mv tipografiaHdos">PRECIO</h2>
						</div>
						<div class="col-lg-1 col-md-1 col-sm-2 col-xs-4">
							<h2 class="letra25pt-pc letra4pt-mv tipografiaHdos">CANTIDAD</h2>
						</div>				
					</div>		
			<?php 
					$datos = '';
					$IDs;
			//$woocommerce->cart->add_to_cart(18, 4, 21,$variation);
				foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
					$_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
					$product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );
					if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
						$id = esc_attr( $product_id);
						$product_quantity = woocommerce_quantity_input( array(
											'input_name'   => "cart[{$cart_item_key}][qty]",
											'input_value'  => $cart_item['quantity'],
											'max_value'    => $_product->get_max_purchase_quantity(),
											'min_value'    => '0',
											'product_name' => $_product->get_name(),
										), $_product, false );?>

						<div class="summary-list" id="<?php echo $cart_item_key.$product_id; ?>">
							<div class="col-lg-2 col-md-2 col-sm-2 col-xs-4">
								<img src="<?php echo get_the_post_thumbnail_url($id,'full');?>" alt="<?php echo $_product->get_title();?>" class="product-preview">								
							</div>
							<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 centrarVert pc tablet">
								<h3 class="letra25pt-pc letra3pt-mv"><?php echo $_product->get_title();?></h3>
							</div>
							<div data-summary="colors" class="col-lg-2 col-md-2 col-sm-2 col-xs-2 centrarVert pc tablet">
								<span class="summary-color">
									<em class="color-swatch" data-color="<?php echo $cart_item['variation']['attribute_pa_color'];?>"></em>
								</span>
							</div>
							<div data-summary="tallas" class="col-lg-2 col-md-2 col-sm-2 col-xs-2 centrarVert pc tablet">
								<span class="summary-talla">
									<em class="talla-label letra25pt-pc letra3pt-mv">Talla <?php echo $cart_item['variation']['attribute_pa_talla'];?></em>
								</span>
							</div>
							<div data-summary="precio" class="col-lg-2 col-md-2 col-sm-2 col-xs-4 centrarVert">
								<div class="summary-precio letra25pt-pc letra3pt-mv" id="'.$cart_item_key.'">
									<?php echo apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ), $cart_item, $cart_item_key )?>
								</div>
							</div>
							<div data-summary="cantidad" class="col-lg-2 col-md-2 col-sm-2 col-xs-4 centrarVert">
								<div class="summary-cantidad letra25pt-pc letra3pt-mv" >
									<?php echo apply_filters( 'woocommerce_cart_item_quantity', $product_quantity, $cart_item_key, $cart_item );?>
								</div>
							</div>
							<div data-summary="remove" class="centrarVert">
								<div class="summary-remove" >
									<p onclick="removerCarrito('<?php echo $cart_item_key.$product_id ?>')" class="letra25pt-pc letra3pt-mv">x</p>
								</div>
							</div>
						</div>
			<?php
					}
					$descripcion .= esc_attr( $_product->get_name());	
					$descripcion .= ' '.$cart_item['quantity'].' unidades';
					$descripcion .= ' // ';
					$datos .=$cart_item[variation][attribute_pa_color].','.$cart_item[variation][attribute_pa_talla].','.$cart_item[quantity].'//';
					$IDs .= $cart_item[variation_id].',';
				} ?>			
				</section>
				<h4 class="letra30pt-pc tipografiaHdos centrado">ESTE ES EL ÚLTIMO PASO, DÉJANOS TUS DATOS PARA EL ENVÍO</h4>
				<form action="http://www.concurvas.com/payu" method="post" accept-charset="UTF-8" autocomplete="off" class="pc-centrado-mediano2 tb-centrado-grande mv-centrado-grande2" id="elformulario">
					<input name="description" type="hidden"  value="" id="description">
					<input name="IDs" type="hidden"  value="<?php echo $IDs; ?>">
					<input name="datos" type="hidden"  value="<?php echo $datos;?>">
					<input name="amount" type="hidden"  value="<?php echo $woocommerce->cart->cart_contents_total+$woocommerce->cart->tax_total; ?>">
					<div class="form-group pmd-textfield pmd-textfield-floating-label">
						<label for="nombre" class="control-label"> Nombre </label>
						<input class="form-control" type="text" id="nombre" name="nombre" required>
						<span class="pmd-textfield-focused"></span>
					</div>
					<div class="form-group pmd-textfield pmd-textfield-floating-label">
						<label for="correo" class="control-label"> E-mail </label>
						<input class="form-control" type="text" id="correo" name="correo" required>
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
			<li class="celular"> Centro comercial Plaza de las Américas, Local 1109, Bogotá Colombia </li>
			<li class="pc tablet"><a href="https://api.whatsapp.com/send?phone=573053449733" target="_blank"> <img src="<?php echo get_template_directory_uri(); ?>/imagenes/iconos/whatsapp-logo.png" alt="WhatsApp" style="width: 2.2% !important; height: auto !important;"> 3053449733 </a></li>							
		</ul>
	</div>
	<div id="footerdatoscontacto">
		<ul class="footerul footerul2">							
			<li class="pc"> Centro comercial Plaza de las Américas, Local 1109, Bogotá Colombia </li>
			<li class="tablet"> Centro comercial Plaza de las Américas, Local 1109, Bogotá Colombia </li>
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
		var nombre = $("#nombre").val;
		var correo = $("#correo").val;
		var telefono = $("#telefono").val();
		var ciudad = $("#ciudad").val();
		var direc = $("#direc").val();
		if(!telefono || !nombre || !correo || !ciudad || !direc){alert("Por favor completa todos los campos");}
        else{
			var cantidad = 0;
			$(".input-text .qty").each(function() {
    			cantidad = cantidad + parseInt($(this).val());
			});
			if(cantidad <6){
				alert("Para compras al por mayor debes adquirir mínimo 6 unidades :)");
			}else{
				 var descripcion = '0';
				$.ajax({
					url: "<?php echo get_site_url(); ?>/descripcion",
					headers: {'Access-Control-Allow-Origin': '<?php echo get_site_url(); ?>/descripcion'},
					type: "GET",
					async: false,
					success: function(data){
						descripcion = data;
					}						
				});
				$("#description").val(descripcion);
				$("#elformulario").submit();	
			}
		}
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
