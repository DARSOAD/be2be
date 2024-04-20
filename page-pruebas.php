<?php 
$NoPost = 1; 
	$args = array( 
		'post_type' => 'product',
		'orderby' => 'menu_order',
		'order'   => 'ASC',
		'posts_per_page' => 200 
	);  
	$query = new WP_Query( $args );
while ($query -> have_posts()) : $query -> the_post(); 
	$id = get_the_ID();
	$product = wc_get_product( $id );
	$stock = $product->get_stock_status();;
	if($stock=='instock') { 
		
		$available_variations = $product->get_available_variations();
		$display = $available_variations[0]['display_price'];
		$regular = $available_variations[0]['display_regular_price'];
		$diferencia = $display - $regular;
		if($diferencia!=0){
			echo 'Soy diferente';
		}
		// Initializing variables
		//echo $color."TALLA".$talla."ID".$id."PRODUCTO".$product;
		/*print_r($available_variations[0]['display_price']);
		print_r($available_variations[0]['display_regular_price']);*/
	/*	print_r($available_variations[0]);*/
		/*foreach( $available_variations as $key => $values ) {
        	$loop_count++;
        	// Get the term color name
        	$attribute_color = $values['attributes']['attribute_pa_color'];
			$atributo_talla = $values['attributes']['attribute_pa_talla'];
			if($attribute_color == $color && $atributo_talla == $talla){
				$wp_term = get_term_by( 'slug', $attribute_color, 'pa_color' );
        		$variation_obj = wc_get_product( $values['variation_id'] );
        		$stock_qty = $variation_obj->get_stock_quantity(); // Stock qty
				$echos =  $stock_qty;
			}*/
		
	}
endwhile;
?>