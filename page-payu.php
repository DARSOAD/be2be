<?php
include( 'trunk/wp-load.php' ); 
global $wpdb;
$merchantId = '691205';
$accountId = '694121';
$description = $_POST['description'];
$IDs = $_POST['IDs'];
$datos = $_POST['datos'];
$order = $wpdb->get_col( "SELECT order_id FROM wp5n_woocommerce_order_items");
if(empty($order)){$order = 1;}
else{$order = $order+1;}
$codigo = generarCodigo(8);
$referenceCode = $order.'2021'.$codigo;
//echo $referenceCode;
$amount = $_POST['amount'];
//echo 'VALOR '.$amount;
$telephone = $_POST['telefono'];
$buyerEmail = $_POST['correo'];
$shippingCity = $_POST['ciudad'];
$shippingCountry = 'COL';
$shippingAddress = $_POST['direc'];
$buyerFullName = $_POST['nombre'];
$signature_local = 'd1S1QUXwGMx0Xu91BGay1FyJ2a' . '~' . $merchantId . '~' . $referenceCode . '~' . $amount . '~' . 'COP';
$signature_md5 = md5($signature_local);
//echo $signature_local.'//';
//echo $signature_md5;


$extra2 = $_POST['extra2'];


$cantidad = $_POST['cantidad'];

$signature_local = '6B2NtceiYItp46ZyQ67HycVU8t' . '~' . '691611' . '~' . $referenceCode.$codigo . '~' . $amount . '~' . 'COP';

//create_test_sub($buyerFullName,$buyerEmail,$telephone,$shippingAddress,$shippingCity,$description);

  // Now we create the order
	echo $datos;
	$productos = explode(' // ', $description);
	foreach($productos as $producto){
		$co = explode(',', $producto);
		$col = explode('-', $co[0]);
		$color = $col[1];
		$talla = $co[1];
		$product = new WC_Product_Variable( $id );	
		$variations = $product->get_available_variations();
		foreach ($variations as $variation) {
			if(($variation[attributes][attribute_pa_color] == $color) && ($variation[attributes][attribute_pa_talla] == $talla) ){$id_v = $variation[variation_id];}
		}
	}
	echo $IDs;
	$IDsArray = explode(',', $IDs);
	$datosCheck = explode('//', $datos);
	$contador = 0;
	$args=array();
	$address = array(
      'first_name' => $buyerFullName,
      'email'      => $buyerEmail,
      'phone'      => $telephone,
      'address_1'  => $shippingAddress,
      'city'       => $shippingCity,
      'country'    => $shippingCountry
  	);
	$order = wc_create_order();
	$order->set_address( $address, 'billing' );
	$order->set_address( $address, 'shipping' );
	$order->calculate_totals();
	//$order->update_status("Completed", 'Imported order', TRUE);
	//print_r($IDsArray);
	foreach($IDsArray as $variation_id){
		if($variation_id){
			$product_variation = new WC_Product_Variation($variation_id);
			//print_r($product_variation);
			$dato = explode(',',$datosCheck[$contador]);
			$args[variation][attribute_pa_color] = $dato[0];		
			$args[variation][attribute_pa_talla] = $dato[1];		
			$cantidad = $dato[2];		
			//print_r($args);
			//echo $cantidad;
			$contador++;
			$order->add_product($product_variation, $cantidad, $args);
			
			
			/*$args=array();
			foreach($product_variation->get_variation_attributes() as $attribute=>$attribute_value){
					$args['variation'][$attribute]=$attribute_value;
			}
			print_r($args);*/
			//
		}	
	}
	
?>
<!doctype html>
<html>
<head>
    <!-- TIKTOK -->
    <script>
		!function (w, d, t) {
		  w.TiktokAnalyticsObject=t;var ttq=w[t]=w[t]||[];ttq.methods=["page","track","identify","instances","debug","on","off","once","ready","alias","group","enableCookie","disableCookie"],ttq.setAndDefer=function(t,e){t[e]=function(){t.push([e].concat(Array.prototype.slice.call(arguments,0)))}};for(var i=0;i<ttq.methods.length;i++)ttq.setAndDefer(ttq,ttq.methods[i]);ttq.instance=function(t){for(var e=ttq._i[t]||[],n=0;n<ttq.methods.length;n++
)ttq.setAndDefer(e,ttq.methods[n]);return e},ttq.load=function(e,n){var i="https://analytics.tiktok.com/i18n/pixel/events.js";ttq._i=ttq._i||{},ttq._i[e]=[],ttq._i[e]._u=i,ttq._t=ttq._t||{},ttq._t[e]=+new Date,ttq._o=ttq._o||{},ttq._o[e]=n||{};n=document.createElement("script");n.type="text/javascript",n.async=!0,n.src=i+"?sdkid="+e+"&lib="+t;e=document.getElementsByTagName("script")[0];e.parentNode.insertBefore(n,e)};
		
		  ttq.load('CJIKF53C77UDVQ8IRC5G');
		  ttq.page();
		}(window, document, 'ttq');
	</script>
	<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-117856180-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-117856180-1');
</script>

<link href="<?php echo get_template_directory_uri(); ?>/imagenes/iconos/logo.ico" rel="shortcut icon" type="image/x-icon">
	<meta name="viewport" content="width=device-width"/>
	<title>Seguridad</title>
	<meta name="author" content="Mainteam" />
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,700,900" rel="stylesheet">
<style type="text/css">
	
	body{
		background-image: url(<?php echo get_template_directory_uri(); ?>/imagenes/fondos/gracias.png);
		background-size: 100%;
		background-repeat: no-repeat;
		background-position: top;
		height: auto;
	}
	#boton{
	color: #ffffff !important;
    background-color: #2477e9;
    font-family: 'Montserrat', sans-serif;
    font-size:20px;
    width: 20%;
    padding: 0 12px 0 12px;
    margin: 5px 40% 0 40%;
    border: none;
    height: 35px;
	}	
	#boton:hover{
		cursor: pointer;
		transition:.4s;
		-webkit-transition:.4s;
		background-color: black;
	}
	h1{
	    font-family: 'Montserrat', sans-serif;
		color: black;
		text-align: center;
		margin-top: 300px;
                font-size:30px;
	}
	@media only screen and    (max-width:1200px)  and (min-width:901px){
		h1{margin-top: 100px;}
	}
	@media only screen and    (max-width:900px)  and (min-width:481px){
		body{background-image: url(<?php echo get_template_directory_uri(); ?>/imagenes/fondos/gracias-tablet.png);height: auto;}
		h1{margin-top: 500px;}
	}
	@media only screen and    (max-width:480px){
		body{background-image: url(<?php echo get_template_directory_uri(); ?>/imagenes/fondos/gracias-movil.png);height: auto;}
		h1{margin-top: 300px;font-size: 15px;}
		#boton{width: 40%;margin: 5px 30% 0 30%;font-size:12px;}
	}
</style>
<!---------------------------------------SMART LOOK------------------->
		<script type="text/javascript">
			window.smartlook||(function(d) {
			var o=smartlook=function(){ o.api.push(arguments)},h=d.getElementsByTagName('head')[0];
			var c=d.createElement('script');o.api=new Array();c.async=true;c.type='text/javascript';
			c.charset='utf-8';c.src='https://rec.smartlook.com/recorder.js';h.appendChild(c);
			})(document);
			smartlook('init', '7646f71b43f29e0d980706fe1bd38fc6909957a8');
		</script>
<!---------------------------------------SMART LOOK------------------->
</head>
<body>

<h1>Plataforma segura</h1>
	<form method="post" action="https://gateway.payulatam.com/ppp-web-gateway" accept-charset="UTF-8">
 <input name="merchantId" type="hidden" value="<?php echo $merchantId; ?>"/>
 <input name="accountId" type="hidden" value="<?php echo $accountId; ?>"/>
 <input name="description" type="hidden" value="<?php echo $description ?>"/>
<input name="referenceCode" type="hidden" value="<?php  echo $referenceCode ?>"/>
 <input name="amount" type="hidden" value="<?php echo $amount ?>"/>
 <input name="tax" type="hidden" value="0"/>
 <input name="taxReturnBase" type="hidden" value="0"/>
<input name="shipmentValue" value="0" type="hidden"/>
 <input name="currency" type="hidden" value="COP"/>
 <input name="lng" type="hidden" value="es"/>
 <input name="responseUrl" type="hidden" value="<?php echo get_site_url(); ?>/response.php"/>
<input name="confirmationUrl" type="hidden"  value="https://www.concurvas.com/confirmation.php" >
 <input name="displayShippingInformation" type="hidden" value="YES"/>
<input  type="hidden" id="nombre" name="buyerFullName" placeholder="<?php echo $buyerFullName ?>" />
   <input name="buyerEmail" type="hidden" value="<?php echo $buyerEmail ?>" > 
   <input name="telephone" type="hidden" value="<?php echo $telephone ?>" > 
   <input name="shippingCity" type="hidden" value="<?php echo $shippingCity ?>" > 
   <input name="shippingAddress" type="hidden" value="<?php echo $shippingAddress ?>" > 
   <input name="shippingCountry" type="hidden" value="<?php echo $shippingCountry ?>" > 
 <input name="signature" value="<?php echo $signature_md5 ?>" type="hidden"/>
 <input name="Submit"        type="submit"  value="Enviar" style="display: none !important;">
</form>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script>
<script type="text/javascript">
  $(document).ready(function() {
	window.document.forms[0].submit();
  });
</script>
</body>
</html>
