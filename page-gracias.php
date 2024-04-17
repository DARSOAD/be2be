<?php
$tipo=$_POST['tipo'];
	if($tipo === 'registrarse'){
	    $empresa=$_POST['empresa'];
		$telefono=$_POST['telefono'];
		$correo=$_POST['correo'];
		$nombre=$_POST['nombre'];
		$comentarios=$_POST['comentarios'];
        $sender = 'diego@a1securitynyc.com';
        echo $correo;
        //$recipient = '$correo';
        $recipient = 'mainteamagency@gmail.com';
        $subject = "Solicitud de información";
        //$message = "Este es el correo nuevo";
        $message= '
		<html>
		<head><meta http-equiv="Content-Type" content="text/html; charset=gb18030">
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
		<p>Name: '.$nombre.'</p>
		<p>Company: '.$empresa.'</p>
		<p>Phone: '.$telefono.'</p>
		<p>E-mail: '.$correo.'</p>
		<p>Additional information: '.$comentarios.'</p>
		</div>
		</body>
		</html>';
        $headers = "MIME-Version: 1.0\r\n";
		$headers .= "Content-type: text/html; charset=utf-8\r\n";
		$headers .= "From: A1 Security WEB <$sender>\r\n";
		$headers .= "Reply-To: $sender\r\n";
		$headers .= "Return-path: $sender\r\n";
        mail('a1securenyc@gmail.com', $subject, $message, $headers);
        mail('nick@a1securitynyc.com', $subject, $message, $headers);
        mail('diego@a1securitynyc.com', $subject, $message, $headers);
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
		<h1> '.$nombre.', THANK YOU FOR CONTACTING US </h1>
		<p>Your message has been received. We´ll be in touch shortly to assist you. If you have any urgent questions, feel free to reach out at a1securenyc@gmail.com or (917) 828-3434. We appreciate your interest in A1 Security Professionals!</p>
		</div>
		<div id="cuerpo">		
		<p>Best regards,</p>
		<p>A1 Security Professionals&reg;</p>
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
	

<link href="<?php echo get_template_directory_uri(); ?>/imagenes/iconos/favicon.ico" rel="shortcut icon" type="image/x-icon">
	<meta name="viewport" content="width=device-width"/>
	<title>THANKS!</title>
	<link href="<?php echo get_template_directory_uri(); ?>/imagenes/iconos/a1security.ico" rel="shortcut icon" type="image/x-icon">
	<meta name="author" content="Diego" />
	<link href="https://fonts.googleapis.com/css?family=Lato:700" rel="stylesheet">
<style type="text/css">
	
	body{
		background-image: url(<?php echo get_template_directory_uri(); ?>/imagenes/fondos/gracias.jpg);
		background-color: rgba(0, 0, 0, 0.5); /* Fondo oscuro con 50% de opacidad */
		background-blend-mode: overlay; /* Mezcla el fondo y el color de fondo de manera que la imagen se vea opaca */
		height: 100%; /* Ajusta la altura según tus necesidades */
		background-size: cover; /* Ajusta el tamaño de la imagen de fondo */
		background-repeat: no-repeat; /* Evita que la imagen se repita */
		background-attachment: fixed; /* Opcional: fija la imagen de fondo */
	}
	#boton{
		border: none;
		font-weight: 700;
		text-align: center;
		color: #FFFFFF;
		background: linear-gradient(45deg, #c4990e, #ffef9a);
		outline: none !important;
		border-radius: 37px;
		font-family: 'Lato', sans-serif;
		font-size: 20px;
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
		margin-top: 5%;
                font-size:30px;
	}
	@media only screen and    (max-width:1200px)  and (min-width:901px){
		h1{margin-top: 5%;}
	}
	@media only screen and    (max-width:900px)  and (min-width:481px){
		body{background-image: url(<?php echo get_template_directory_uri(); ?>/imagenes/fondos/gracias.jpg);height: auto;}
		h1{margin-top: 5%;}
	}
	@media only screen and    (max-width:480px){
		body{background-image: url(<?php echo get_template_directory_uri(); ?>/imagenes/fondos/gracias-movil.jpg);height: auto;}
		h1{margin-top: 300px;font-size: 15px;}
		#boton{width: 40%;margin: 5px 30% 0 30%;font-size:12px;}
	}
</style>
<!---------------------------------------SMART LOOK------------------->

</head>
<body>
<h1>THANK YOU FOR CONTACTING US <br> Your message has been received. We´ll be in touch shortly to assist you. If you have any urgent questions, feel free to reach out at a1securenyc@gmail.com or (917) 828-3434. We appreciate your interest in A1 Security Professionals!</h1>
<a href="<?php echo get_site_url(); ?>/"><button id="boton">Home</button></a>
</body>
</html>
