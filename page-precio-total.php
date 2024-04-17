<?php 
$totalamount = $woocommerce->cart->cart_contents_total+$woocommerce->cart->tax_total;
echo $totalamount;
?>
