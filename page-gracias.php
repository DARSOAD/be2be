<?php
$tipo=$_POST['tipo'];
	if($tipo === 'registrarse'){
	    $empresa=$_POST['empresa'];
		$telefono=$_POST['telefono'];
		$correo=$_POST['correo'];
		$nombre=$_POST['nombre'];
		$comentarios=$_POST['comentarios'];
		$ciudad=$_POST['ciudad'];
        $sender = 'concurvas.almacen@gmail.com';
        echo $correo;
        //$recipient = '$correo';
        $recipient = 'mainteamagency@gmail.com';
        $subject = "Quiero comprar";
        //$message = "Este es el correo nuevo";
        $message= '
		<html>
		<head><meta charset="gb18030">
		<link href="https://fonts.googleapis.com/css?family=Lato:300,900" rel="stylesheet">
		<style type="text/css">

		#encabezado { 
		background-color:#FFFFFF;
		font: Lato, sans-serif;
		font-weight:300;
		color:black;
		font-size:10pt;
		margin:10px;
		text-align:center;
		}
		#cuerpo {
		background-color: #ffffff;
		font: Lato, sans-serif;
		font-weight:300;
		color:#666666;
		font-size:10pt;
		width:600px;
		}

		</style>
		</head>
		<body>
		<div id="encabezado">
		<h1> Datos del cliente: </h1>
		</div>
		<div id="cuerpo">
		<p>Nombre: '.$nombre.'</p>
		<p>Empresa: '.$empresa.'</p>
		<p>Telefono: '.$telefono.'</p>
		<p>Correo: '.$correo.'</p>
		<p>Ubicación: '.$ciudad.'</p>
		<p>Comentarios: '.$comentarios.'</p>
		</div>
		</body>
		</html>';
        $headers = "MIME-Version: 1.0\r\n";
		$headers .= "Content-type: text/html; charset=utf-8\r\n";
		$headers .= "From: Concurvas <$sender>\r\n";
		$headers .= "Reply-To: $sender\r\n";
		$headers .= "Return-path: $sender\r\n";
        mail('concurvas.almacen@gmail.com', $subject, $message, $headers);
        $message= '
		<html>
		<head>
		<link href="https://fonts.googleapis.com/css?family=Lato:300,900" rel="stylesheet">
		<style type="text/css">

		#encabezado { 
		background-color:#FFFFFF;
		font: Lato, sans-serif;
		font-weight:300;
		color:black;
		font-size:10pt;
		margin:10px;
		text-align:center;
		}
		#cuerpo {
		background-color: #ffffff;
		font: Lato, sans-serif;
		font-weight:300;
		color:#666666;
		font-size:10pt;
		width:600px;
		}

		</style>
		</head>
		<body>
		<div id="encabezado">
		<h1> Hola '.$nombre.', gracias por contactarnos. Pronto nos comunicaremos contigo.
 </h1>
		</div>
		<div id="cuerpo">		
		<p>Cordial saludo,</p>
		<p>Concurvas&reg;</p>
		</div>
		</body>
		</html>
		';
		mail($correo, $subject, $message, $headers);
    }
 
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
	<title>¡Gracias!</title>
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
<!---------------------------------------SMART LOOK------------------->
<script type="text/javascript">
    window.smartlook||(function(d) {
    var o=smartlook=function(){ o.api.push(arguments)},h=d.getElementsByTagName('head')[0];
    var c=d.createElement('script');o.api=new Array();c.async=true;c.type='text/javascript';
    c.charset='utf-8';c.src='https://rec.smartlook.com/recorder.js';h.appendChild(c);
    })(document);
    smartlook('init', 'dfa4ea7e12c38b1a47a4e319b711be9fb698671d');
</script>
		<!---------------------------------------SMART LOOK------------------->
</head>
<body>
<h1>Estamos trabajando en tu solicitud <br> pronto nos comunicaremos contigo.</h1>
<a href="<?php echo get_site_url(); ?>/"><button id="boton">Regresar</button></a>
</body>
</html>
