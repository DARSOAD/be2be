<?php
$ApiKey = "d1S1QUXwGMx0Xu91BGay1FyJ2a";
$merchant_id = $_REQUEST['merchantId'];
$referenceCode = $_REQUEST['referenceCode'];
$TX_VALUE = $_REQUEST['TX_VALUE'];
$New_value = number_format($TX_VALUE, 1, '.', '');
$currency = $_REQUEST['currency'];
$transactionState = $_REQUEST['transactionState'];
$firma_cadena = "$ApiKey~$merchant_id~$referenceCode~$New_value~$currency~$transactionState";
$firmacreada = md5($firma_cadena);
$firma = $_REQUEST['signature'];
$reference_pol = $_REQUEST['reference_pol'];
$cus = $_REQUEST['cus'];
$extra1 = $_REQUEST['description'];
$pseBank = $_REQUEST['pseBank'];
$lapPaymentMethod = $_REQUEST['lapPaymentMethod'];
$transactionId = $_REQUEST['transactionId'];

if ($_REQUEST['transactionState'] == 4 ) {
	$estadoTx = "Transacción aprobada";
}

else if ($_REQUEST['transactionState'] == 6 ) {
	$estadoTx = "Transacción rechazada";
}

else if ($_REQUEST['transactionState'] == 104 ) {
	$estadoTx = "Error";
}

else if ($_REQUEST['transactionState'] == 7 ) {
	$estadoTx = "Pago pendiente";
}

else {
	$estadoTx=$_REQUEST['mensaje'];
}


if (strtoupper($firma) == strtoupper($firmacreada)) {}

?>
<!doctype html>
<html>
<head>
	<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-117856180-3"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-117856180-3');
  gtag('config', 'AW-802333734');
</script>
<!-- Event snippet for Registro conversion page -->
<script>
  gtag('event', 'conversion', {'send_to': 'AW-802333734/1mi4CPSmn50BEKbIyv4C'});
</script>

<link href="<?php echo get_template_directory_uri(); ?>/imagenes/iconos/favicon.ico" rel="shortcut icon" type="image/x-icon">
	<meta name="viewport" content="width=device-width"/>
	<title>隆Gracias!</title>
	<link href="<?php echo get_template_directory_uri(); ?>/imagenes/iconos/concurvas.ico" rel="shortcut icon" type="image/x-icon">
	<meta name="author" content="Mainteam" />
	<link href="https://fonts.googleapis.com/css?family=Lato:700" rel="stylesheet">
<style type="text/css">
	
	body{
		background-image: url(<?php echo get_template_directory_uri(); ?>/imagenes/fondos/gracias.png);
		background-size: 100%;
		background-repeat: no-repeat;
		background-position: top;
		height: auto;
	}
	#boton{
		border: none;
		font-weight: 700;
		text-align: center;
		color: #FFFFFF;
		background: #ba007c;
		outline: none !important;
		border-radius: 37px;
		font-family: 'Lato', sans-serif;
		font-size:20px;
		width: 20%;
		padding: 0 12px 0 12px;
		margin-top: 10.2% !important;
		margin-left: 40% !important;
		margin-right: 24% !important;
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
		color: #ffffff;
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
</head>
<body>
<h1>Estamos trabajando en tu solicitud <br> pronto nos comunicaremos contigo.</h1>
<a href="<?php echo get_site_url(); ?>/"><button id="boton">Regresar</button></a>
</body>
</html>
