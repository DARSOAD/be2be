<?php 
header("Access-Control-Allow-Origin: *");
$id=$_GET['id'];
$cantidad=$_GET['cantidad'];
$color=$_GET['color'];
$talla=$_GET['talla'];
$id_v;
$product = new WC_Product_Variable( $id );	
$variations = $product->get_available_variations();
foreach ($variations as $variation) {
	if(($variation[attributes][attribute_pa_color] == $color) && ($variation[attributes][attribute_pa_talla] == $talla) ){$id_v = $variation[variation_id];}
}
$variation = [];
$variation['attribute_pa_color']=$color;
$variation['attribute_pa_talla']=$talla;
$woocommerce->cart->add_to_cart($id, $cantidad, $id_v,$variation);
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
							), $_product, false );
			$items .='<div class="summary-list" id="'.$cart_item_key.$product_id.'">
			<div class="col-lg-2 col-md-2 col-sm-2 col-xs-4">
				<img src="'.get_the_post_thumbnail_url($id,'full').'" alt="'.$_product->get_title().'" class="product-preview">								
			</div>
			<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 centrarVert pc tablet">
				<h3 class="letra25pt-pc letra3pt-mv">'.$_product->get_title().'</h3>		
			</div>
			<div data-summary="colors" class="col-lg-2 col-md-2 col-sm-2 col-xs-2 centrarVert pc tablet">
				<span class="summary-color">
					<em class="color-swatch" data-color="'.$cart_item['variation']['attribute_pa_color'].'"></em>
				</span>
			</div>
			<div data-summary="tallas" class="col-lg-2 col-md-2 col-sm-2 col-xs-2 centrarVert pc tablet">
				<span class="summary-talla">
					<em class="talla-label letra25pt-pc letra3pt-mv">Talla '.$cart_item['variation']['attribute_pa_talla'].'</em>
				</span>
			</div>
			<div data-summary="precio" class="col-lg-2 col-md-2 col-sm-2 col-xs-4 centrarVert">
				<div class="summary-precio letra25pt-pc letra3pt-mv" id="'.$cart_item_key.'">
					'.apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ), $cart_item, $cart_item_key ).'
				</div>
			</div>
			<div data-summary="cantidad" class="col-lg-2 col-md-2 col-sm-2 col-xs-4 centrarVert">
				<div class="summary-cantidad letra25pt-pc letra3pt-mv" >
					'.apply_filters( 'woocommerce_cart_item_quantity', $product_quantity, $cart_item_key, $cart_item ).'
				</div>
			</div>
			<div data-summary="remove" class="centrarVert">
				<div class="summary-remove" >
					<p onclick="removerCarrito(\''.$cart_item_key.$product_id.'\')" class="letra25pt-pc letra3pt-mv">x</p>
				</div>
			</div>
		</div>';
		}
		$descripcion .= esc_attr( $_product->get_name());	
		$descripcion .= ' '.$cart_item['quantity'].' unidades';
		$descripcion .= ' // ';
		$datos .=$cart_item[variation][attribute_pa_color].','.$cart_item[variation][attribute_pa_talla].','.$cart_item[quantity].'//';
		//print_r($cart_item);
		$IDs .= $cart_item[variation_id].',';
	}
	$resumen = '
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
		'.$items.'	
	</section>
	<h4 class="letra30pt-pc tipografiaHdos centrado">ESTE ES EL ÚLTIMO PASO, DÉJANOS TUS DATOS PARA EL ENVÍO</h4>
<form action="'.get_site_url().'/payu" method="post" accept-charset="UTF-8" autocomplete="off" class="pc-centrado-mediano2 tb-centrado-grande mv-centrado-grande2" id="elformulario">
					<input name="description" type="hidden"  value="" id="description">
					<input name="IDs" type="hidden"  value="'.$IDs.'">
					<input name="datos" type="hidden"  value="'.$datos.'">
					<input name="amount" type="hidden"  value="">
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
				<h4 class="letra30pt-pc tipografiaHdos centrado">¡GRACIAS! NOS ESTAREMOS COMUNICANDO CONTIGO</h4>
</li>	';
	echo $resumen;
?>