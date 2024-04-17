<?php
function get_excerpt($limit, $source = null){

    if($source == "content" ? ($excerpt = get_the_content()) : ($excerpt = get_the_excerpt()));
    $excerpt = preg_replace(" (\[.*?\])",'',$excerpt);
    $excerpt = strip_shortcodes($excerpt);
    $excerpt = strip_tags($excerpt);
    $excerpt = substr($excerpt, 0, $limit);
    $excerpt = substr($excerpt, 0, strripos($excerpt, " "));
    $excerpt = trim(preg_replace( '/\s+/', ' ', $excerpt));
    return $excerpt;
}
add_post_type_support('page', 'excerpt'); 

add_action( 'init', 'create_post_type' );
function create_post_type() {
	$args = array(
	    'labels' => array(
            'name' => __( 'Clients' ),
            'singular_name' => __( 'Client' )
        ),
        'public' => true,
        'has_archive' => true,
		'menu_icon'           => 'dashicons-testimonial', // string
        'supports' => array('title', 'editor', 'thumbnail'), // Añadir soporte para miniaturas
        'show_in_rest' => true, // Habilita Gutenberg
        'menu_order' => true, 
	);

	/* Register the post type. */
	register_post_type('Clients', $args);
}
add_action( 'init', 'create_reviews' );
function create_reviews() {
	$args = array(
	    'labels' => array(
            'name' => __( 'Reviews' ),
            'singular_name' => __( 'Reviews' )
        ),
        'public' => true,
        'has_archive' => true,
		'menu_icon'           => 'dashicons-editor-quote', // string
        'supports' => array('title', 'editor', 'thumbnail','custom-fields'), // Añadir soporte para miniaturas
        'show_in_rest' => true, // Habilita Gutenberg
        'menu_order' => true, 
	);

	/* Register the post type. */
	register_post_type('Reviews', $args);
}

?>
