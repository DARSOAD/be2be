<?php 
header("Access-Control-Allow-Origin: *");
$id=$_GET['id'];
$cantidad=$_GET['cantidad'];

?>
<?php 
	$cart_item_key = 'dde05b9a65dafd773f81d231b9c347d0';
	echo $id ;
	echo $cantidad;
	$woocommerce->cart->set_quantity($id , $cantidad);

?>
