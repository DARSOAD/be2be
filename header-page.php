<!doctype html>
<html lang="en-us" class="no-js">
<head>

	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>A1</title>
	<!-------------------ICONS---------------->
	<link href="<?php echo get_template_directory_uri(); ?>/imagenes/iconos/a1security.ico" rel="shortcut icon" type="image/x-icon">
	<!-------------------ICONS---------------->
	<link href="https://fonts.googleapis.com/css?family=Lato:400,700" rel="stylesheet" async>
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/csscool/main_page.css"> <!-- CSS reset -->
  	<!-------------------BOOTSTRAP---------------->	
	<link href="<?php echo get_template_directory_uri(); ?>/css/bootstrap.css" rel="stylesheet">
	<!-------------------BOOTSTRAP---------------->		
	
	<style type="text/css">
		/*------------------------BOTON-----------------------*/		
		.botonmodal{font-family: 'Lato', sans-serif;font-weight: 700;background:#ba007c;color:#fff;border:none;line-height:20px;padding:0px 0 0 0;text-transform:none;letter-spacing:0;width:30%;transition:.4s;-webkit-transition:.4s;margin:50px 35%;display:table;}
		.botonmodal:hover{background:#111;color:#fff;transition:.4s;-webkit-transition:.4s;cursor:pointer;cursor:hand;}
		@media only screen and (min-width:2001px){.botonmodal{height:75px;border-radius:50px;font-size:30px;}}
		@media only screen and (max-width:2000px) and  (min-width:1700px){.botonmodal{height:55px;border-radius:25px;font-size:20px;}}
		@media only screen and (max-width:1699px) and  (min-width:992px){.botonmodal{height:50px;border-radius:25px;font-size:15px;}}
		@media only screen and (max-width:991px) and  (min-width:530px){.botonmodal{height:35px;border-radius:20px;font-size:12px;}}
		@media only screen and (max-width:529px){.botonmodal{height:35px;border-radius:20px;font-size:12px;margin:25px 25%;width:50%;}}
		/*------------------------BOTON-----------------------*/
		/*----------------------ON/OFF------------------------------*/		
			@media only screen and  (min-width:992px){.tablet, .celular{display:none;}.pc{display: block;}}
			@media only screen and (max-width:991px) and  (min-width:768px){.pc, .celular{display:none;}.tablet{display: block;}}
			@media only screen and (max-width:767px) {.pc, .tablet{display:none;}.celular{display: block;}}
		/*----------------------ON/OFF------------------------------*/
		/*----------------------PORTADA------------------------------*/		
		h1{font-family:'Lato',sans-serif;color: #7f7e7e;text-align: center;}
		@media only screen and  (min-width:992px){
			#contenido{padding-top: 8% !important;}
			.pc-centrad-supergrande{margin-left: 10% !important;width: 80% !important;}.pc-izquierda-grande{margin-left: 5% !important;width: 50% !important;}.pc-izquierda-mediano{margin-left: 5% !important;width: 40% !important;}.pc-centrado-grande{margin-left: 25% !important;width: 50% !important;}.pc-centrado-mediano{margin-left: 30% !important;width: 40% !important;}.pc-derecha-grande{margin-left: 45% !important;width: 50% !important;}.pc-derecha-mediano{margin-left: 55% !important;width: 40% !important;}
			}
			@media only screen and  (max-width:991px) and  (min-width:768px){
				#contenido{padding-top: 15% !important;}
			.tb-izquierda-grande{margin-left: 5% !important;width: 50% !important;}.tb-izquierda-mediano{margin-left: 5% !important;width: 40% !important;}.tb-centrado-grande{margin-left: 20% !important;width: 60% !important;}.tb-centrado-mediano{margin-left: 30% !important;width: 40% !important;}.tb-derecha-grande{margin-left: 45% !important;width: 50% !important;}.tb-derecha-mediano{margin-left: 55% !important;width: 40% !important;}
			}
			@media only screen and  (max-width:767px){
				#contenido{padding-top: 25% !important;}
			.mv-izquierda-grande{margin-left: 5% !important;width: 50% !important;}.mv-izquierda-mediano{margin-left: 5% !important;width: 40% !important;}.mv-centrado-grande{margin-left: 20% !important;width: 60% !important;}.mv-centrado-mediano{margin-left: 30% !important;width: 40% !important;}.mv-derecha-grande{margin-left: 45% !important;width: 50% !important;}.mv-derecha-mediano{margin-left: 55% !important;width: 40% !important;}.mv-centrado-super-grande{margin-left: 5% !important;width: 90% !important;}
			}
		/*----------------------PORTADA------------------------------*/
		</style>
</head>
<body>
<?php get_template_part('menu_catalogo'); ?>
	</div>	