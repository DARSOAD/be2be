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

?>