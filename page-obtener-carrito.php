<?php 
foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
	$_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
	$product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );
	if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
		//print_r($cart_item);
		$id = esc_attr( $product_id);
		$precioUnitario = $cart_item['line_total'] / $cart_item['quantity'];
		$descripcion .= esc_attr( $_product->get_name());	
		$descripcion .= '@'.$cart_item['quantity'];
		$descripcion .= '@'.$precioUnitario;
		$descripcion .= '@'.$cart_item_key;
		$descripcion .= '@'.$cart_item['variation']['attribute_pa_color'];
		$descripcion .= '@'.$cart_item['variation']['attribute_pa_talla'];
		$descripcion .= '@'.get_the_post_thumbnail_url($id,'full');
		$descripcion .= ' ## ';
	}
}
echo $descripcion;
?>
