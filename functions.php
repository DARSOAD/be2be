<?php
function get_excerpt($limit, $source = null){

    if($source == "content" ? ($excerpt = get_the_content()) : ($excerpt = get_the_excerpt()));
    $excerpt = preg_replace(" (\[.*?\])",'',$excerpt);
    $excerpt = strip_shortcodes($excerpt);
    $excerpt = strip_tags($excerpt);
    $excerpt = substr($excerpt, 0, $limit);
    $excerpt = substr($excerpt, 0, strripos($excerpt, " "));
    $excerpt = trim(preg_replace( '/\s+/', ' ', $excerpt));
    $excerpt = $excerpt.'... <a href="'.get_permalink($post->ID).'"></a>';
    return $excerpt;
}
add_post_type_support('page', 'excerpt'); 


function custom_add_to_cart_redirect() { 
    return ''.get_site_url().'/carrito/'; 
}
add_filter( 'woocommerce_add_to_cart_redirect', 'custom_add_to_cart_redirect' );

function custom_taxonomy($singular,$plural) {
	$labels = array(
		'name'                       => _x( $plural, 'Taxonomy General Name', 'text_domain' ),
		'singular_name'              => _x( $singular, 'Taxonomy Singular Name', 'text_domain' ),
		'menu_name'                  => __( $plural, 'text_domain' ),
		'all_items'                  => __( 'All Items', 'text_domain' ),
		'parent_item'                => __( 'Parent Item', 'text_domain' ),
		'parent_item_colon'          => __( 'Parent Item:', 'text_domain' ),
		'new_item_name'              => __( 'New Item Name', 'text_domain' ),
		'add_new_item'               => __( 'Add New Item', 'text_domain' ),
		'edit_item'                  => __( 'Edit Item', 'text_domain' ),
		'update_item'                => __( 'Update Item', 'text_domain' ),
		'view_item'                  => __( 'View Item', 'text_domain' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'text_domain' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'text_domain' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'text_domain' ),
		'popular_items'              => __( 'Popular Items', 'text_domain' ),
		'search_items'               => __( 'Search Items', 'text_domain' ),
		'not_found'                  => __( 'Not Found', 'text_domain' ),
		'no_terms'                   => __( 'No items', 'text_domain' ),
		'items_list'                 => __( 'Items list', 'text_domain' ),
		'items_list_navigation'      => __( 'Items list navigation', 'text_domain' ),
	);
	$rewrite = array(
		'slug'                       => $plural,
		'with_front'                 => true,
		'hierarchical'               => true,
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
		'rewrite'                    => $rewrite,
	);
	register_taxonomy( $singular, array( 'product' ), $args );
}
function custom_taxonomies(){
	custom_taxonomy('Destacado','Destacados');
}
add_action( 'init', 'custom_taxonomies', 0 );

function add_query_vars_filter( $vars ){
  $vars[] = "vara";
  return $vars;
}
add_filter( 'query_vars', 'add_query_vars_filter' );

add_action( 'wp_footer', 'bbloomer_cart_refresh_update_qty' );  
function bbloomer_cart_refresh_update_qty() { 
    if (is_cart()) { 
        ?> 
        <script type="text/javascript"> 
            jQuery('div.woocommerce').on('click', 'input.qty', function(){ 
                jQuery("[name='update_cart']").trigger("click"); 
            }); 
        </script> 
        <?php 
    } 
}
function create_test_sub($nombre,$correo,$telefono,$direccion,$ciudad,$description) {

global $woocommerce;

  $address = array(
      'first_name' => $nombre,
      'email'      => $correo,
      'phone'      => $telefono,
      'address_1'  => $direccion,
      'city'       => $ciudad,
  );

  // Now we create the order

  $order = wc_create_order();
	foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
		$_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
		print_r($_product);
	}
  // The add_product() function below is located in /plugins/woocommerce/includes/abstracts/abstract_wc_order.php
  /*$order->add_product( get_product('10'), $cantidad); // This is an existing SIMPLE product
  $order->set_address( $address, 'billing' );
  $order->set_address( $address, 'shipping' );
  //
  $order->calculate_totals();
  $order->update_status("Completed", 'Imported order', TRUE);*/
}
function generarCodigo($longitud) {
		$key = '';
		$pattern = '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$max = strlen($pattern)-1;
		for($i=0;$i < $longitud;$i++) $key .= $pattern{mt_rand(0,$max)};
		return $key;
	}
/************************************VIDEO******************************/
/************************************CATEGORIAS******************************/
function mayorcategorias($id){
	$cats = get_the_terms( $id, 'product_cat' );
	$categoriamayor = 0;
  	if ( ! empty( $cats ) ) {
		$id_cat = $cats[0]->term_id;
		$mayor = $cats[0]->count;
        foreach ( $cats as $term ) {
   			if($term->count > $mayor){
				$mayor = $term->count;
				$categoriamayor = $term;
			}
        }
	}
	return $categoriamayor;
}
/************************************CATEGORIAS******************************/
add_filter('add_to_cart_fragments', 'woocommerceframework_header_add_to_cart_fragment');
function woocommerceframework_header_add_to_cart_fragment( $fragments ) {
	global $woocommerce;
 
	ob_start();
 
	?>
	<span class="cart-contents"><a href="<?php echo $woocommerce->cart->get_cart_url(); ?>" title="<?php _e('View your shopping cart', 'woothemes'); ?>"><?php echo sprintf(_n('%d item', '%d items', $woocommerce->cart->cart_contents_count, 'woothemes'), $woocommerce->cart->cart_contents_count);?> - <?php echo $woocommerce->cart->get_cart_total(); ?></a></span>
	<?php
 
	$fragments['span.cart-contents'] = ob_get_clean();
 
	return $fragments;
 
}
function mi_nuevo_mime_type( $existing_mimes ) {
	// añade webp a la lista de mime types
	$existing_mimes['webm'] = 'image/webp';
	// devuelve el array a la funcion con el nuevo mime type
	return $existing_mimes;
}
add_filter( 'mime_types', 'mi_nuevo_mime_type' );
function bp_mime_type ( $mime_types ) {
 $mime_types['webp'] = 'image/webp';
 return $mime_types;}

add_filter('upload_mimes', 'bp_mime_type', 1, 1);
?>
