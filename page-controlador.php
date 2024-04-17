<?php
header("Access-Control-Allow-Origin: *");
$funcion=$_POST['funcion']; 
$color=$_POST['color'];
$talla=$_POST['talla'];
$id=$_POST['id'];
$cantidad=$_POST['cantidad'];
function stock($color,$talla,$id){
	$_pf = new WC_Product_Factory(); 
	$product = $_pf->get_product($id);
	$available_variations = $product->get_available_variations();
	// Initializing variables
    $variations_count = count($available_variations);
    $loop_count = 0;
	//echo $color."TALLA".$talla."ID".$id."PRODUCTO".$product;
	//print_r($available_variations[0]['availability_html']);
	foreach( $available_variations as $key => $values ) {
        $loop_count++;
        // Get the term color name
        $attribute_color = $values['attributes']['attribute_pa_color'];
		$atributo_talla = $values['attributes']['attribute_pa_talla'];
		if($attribute_color == $color && $atributo_talla == $talla){
			$wp_term = get_term_by( 'slug', $attribute_color, 'pa_color' );
        	$variation_obj = wc_get_product( $values['variation_id'] );
        	$stock_qty = $variation_obj->get_stock_quantity(); // Stock qty
			$echos =  $stock_qty;
		}
        
	}
	echo $echos;
}
function actualizar($cantidad,$id){
	list($c,$carr) = explode("[",$id);
	list($este) = explode("]",$carr);
	//$resultado = set_quantity( $este, $cantidad);
	foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) { 		
	    $_product   = apply_filters( 'woocommerce_cart_item_product',
	    $cart_item['data'], $cart_item, $cart_item_key );
		if($cart_item_key == $este){
			//$cantidad =$cantidad - $cart_item['quantity'];
			$precio = $cart_item['line_subtotal'];
			$precio_unidad = $precio/$cart_item['quantity'];
		}		
	} 
	echo $cantidad." ESTE -> ".$este." KEY".$resultado." PRECIO".$precio." PRECIO UNIDAD".$precio_unidad; 
	//echo $cantidad." ESTE -> ".$este." KEY"; 
}
function cool($id){
	$product = new WC_Product_Variable( $id );	
	$variations = $product->get_available_variations();
	//print_r($variations);
	$colores = [];
	$tallas = [];
	$disponibilidad = [];
	$urls = [];
	$contador = 0;
	foreach ($variations as $variation) {
		if($variation[is_in_stock]){
			$colores[$contador] = $variation[attributes][attribute_pa_color];
			$tallas[$contador] = $variation[attributes][attribute_pa_talla];
			$disponibilidad[$contador] = $variation[max_qty];
			$urls[$contador] = $variation[image][url];
			$contador++;
		}
	}
	$coloresunicos = array_unique($colores);
	$urlunicos = array_unique($urls);
	$contador = 0;
	foreach ($urlunicos as $url){
		if($contador == 0){
			$seccionimg .= '<li class="selected"><img src="'.$url.'" alt="Product Preview" class="product-preview"></li>';
		}else{
			$seccionimg .= '<li><img src="'.$url.'" alt="Product Preview" class="product-preview"></li>';
		}		
		$contador++;
	}
	$contador=0;
	$search = '-';
	$replace = ' ';
	foreach ($coloresunicos as $color){
		if($contador == 0){
			$secciondata .= '<li data-content="'.str_replace($search , $replace , $color).'" data-price="0" class="selected"><a data-color="'.$color.'" href="#0" class="colores">'.str_replace($search , $replace , $color).'</a></li>';	
		}else{
			$secciondata .= '<li data-content="'.str_replace($search , $replace , $color).'" data-price="0"><a data-color="'.$color.'" href="#0" class="colores">'.str_replace($search , $replace , $color).'</a></li>';
		}
		$contador++;
	}
	$contador = 0;
	$tallasunicas = array_unique($tallas);
	foreach ($tallasunicas as $talla){
		if($contador == 0){
			$secciontalla .= '<li data-content="Talla '.$talla.'" data-price="0" class="selected"><a data-talla="'.$talla.'" href="#0">Talla '.$talla.'</a></li>';	
			$imagentallas .= '<li class="selected"><img src="'.$urlunicos[0].'" alt="Product Preview" class="product-preview"></li>';
		}else{
			$secciontalla .= '<li data-content="Talla '.$talla.'" data-price="0"><a data-talla="'.$talla.'" href="#0">Talla '.$talla.'</a></li>';
			$imagentallas .= '<li><img src="'.$urlunicos[0].'" alt="Product Preview" class="product-preview"></li>';
		}
		$contador++;
	}
	$colores = '
<li data-selection="colors" class="builder-step first-load" id="colores">
	<section class="cd-step-content">		
		<ul class="cd-product-previews col-lg-6 col-md-6 col-sm-6 col-xs-12">'.$seccionimg.'
		</ul>
		<ul class="cd-product-customizer col-lg-6 col-md-6 col-sm-6 col-xs-12" id="coloresBotones"><h1>'.get_the_title($id).'</h1><p>'.get_post_field('post_content', $id).'</p>'.$secciondata.'
		</ul>
	</section>
</li>
';
	$tamano = '
	<li data-selection="tallas" class="builder-step first-load" id="misTallas">
	<section class="cd-step-content" id="'.$contador++.'">
		<ul class="cd-product-previews col-lg-6 col-md-6 col-sm-6 col-xs-12" id="poneraqui">'.$imagentallas.'
		</ul>
		<ul class="cd-product-customizer col-lg-6 col-md-6 col-sm-6 col-xs-12" id="tallasBotones"><h1>'.get_the_title($id).'</h1><p>'.get_post_field('post_content', $id).'</p>'.$secciontalla.'
		</ul>
	</section>
</li>';
	$datosHtml = $colores.$tamano;
	echo $datosHtml;
}
function coolTallas($id,$color){
	$product = new WC_Product_Variable( $id );	
	$variations = $product->get_available_variations();
	$tallas;
	foreach ($variations as $variation) {
		if(($variation[attributes][attribute_pa_color] == $color) && 	!$variation[is_in_stock]){
			$tallas .= $variation[attributes][attribute_pa_talla].'-';
		}	
	}
	echo $tallas;
}
function coolResumen(){
	$variation = [];
$variation['attribute_pa_color']='vino-tinto';
$variation['attribute_pa_talla']='s';
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
					<input name="description" type="hidden"  value="">
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
				</form>
				<h4 class="letra30pt-pc tipografiaHdos centrado">¡GRACIAS! NOS ESTAREMOS COMUNICANDO CONTIGO</h4>
</li>	';
	echo $resumen;
	//$woocommerce->cart->set_quantity($id , $cantidad);
}
if($funcion == "cantidad"){stock($color,$talla,$id);}
if($funcion == "actualizar"){actualizar($cantidad,$id);}
if($funcion == "cool"){cool($id);}
if($funcion == "coolTallas"){coolTallas($id,$color);}
if($funcion == "coolResumen"){coolResumen();}
//if($color && $talla){stock($color,$talla);}
?>