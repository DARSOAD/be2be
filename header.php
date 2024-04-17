<!doctype html>
<html lang="es" class="js csstransitions">
	<head >
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-117856180-2"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-117856180-2');
  gtag('config', 'AW-802333734');
</script>



		<meta charset="utf-8">
		<meta name="author" content="Mainteam">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
		<meta name="description" content="Somos fabricantes de chaquetas al por mayor  y al detal en Bogotá. Nuestro objetivo y razón de ser es el servicio y mejor cálidad en nuestras chaquetas, nos esforzamos siempre para que nuestros clientes y empleados reciban a traves de nuestra fabricación y trabajo solo mejor.">
		<meta name="keywords" content="chaquetas, buzos, chompas, sacos, mayoristas, chaquetas al por mayor, fabrica de chaquetas, venta de chaquetas al por mayor bogota, chaquetas al por mayor colombia">
		<meta name="viewport" content="width=device-width">
		<meta property="og:type" content="business.business">
		<meta property="og:title" content="Concurvas - Chaquetas al por mayor - Somos fabricantes">
		<meta property="og:url" content="http://www.chaquetasalpormayor.com">
		<meta property="og:image" content="http://chaquetasalpormayor.com/wp-content/themes/mainteam_Concurvas/imagenes/iconos/LOGO.png"> 
		<meta property="business:contact_data:street_address" content="Cll 10 N 20 - 45">
		<meta property="business:contact_data:locality" content="Bogotá">
		<meta property="business:contact_data:region" content="Cundinamarca">
		<meta property="business:contact_data:postal_code" content="111511">
		<meta property="business:contact_data:country_name" content="Colombia">
		<title><?php 
			if(is_home()){echo 'Concurvas - Chaquetas al por mayor - Somos fabricantes';}
			else{wp_title('');}
			?></title>
		<!-------------------ICONS---------------->
		<link href="<?php echo get_template_directory_uri(); ?>/imagenes/iconos/concurvas.ico" rel="shortcut icon" type="image/x-icon">
		<!-------------------ICONS---------------->
		<!-------------------FONTS---------------->
		<link href="https://fonts.googleapis.com/css?family=Lato:300,400,900" rel="stylesheet" async>
		<!-------------------FONTS---------------->
		<!-------------------BOOTSTRAP---------------->
		<link href="<?php echo get_template_directory_uri(); ?>/css/bootstrap.css" rel="stylesheet" async>
		<!-------------------BOOTSTRAP---------------->	
		<?php if( !is_page('Catalogo') && !is_home() ){ ?>		
		<!-------------------RESET---------------->
		<style type="text/css">
			html, body, div, span, applet, object, iframe, h1, h2, h3, h4, h5, h6, p, blockquote, pre, a, abbr, acronym, address, big, cite, code, del, dfn, em, img, ins, kbd, q, s, samp, small, strike, strong, sub, sup, tt, var, b, u, i, center, dl, dt, dd, ol, ul, li, fieldset, form, label, legend, table, caption, tbody, tfoot, thead, tr, th, td, article, aside, canvas, details, embed, figure, figcaption, footer, header, hgroup, menu, nav, output, ruby, section, summary, time, mark, audio, video{margin:0 !important;padding:0;border:0;font-size:100%;font:inherit;vertical-align:baseline;}
			a:hover{text-decoration:none!important;}
			article, aside, details, figcaption, figure, footer, header, hgroup, menu, nav, section, main{display:block;}
			body{line-height:1;}
			ol, ul{list-style:none;}
			blockquote, q{quotes:none;}
			blockquote:before, blockquote:after, q:before, q:after{content:'';content:none;}
			table{border-collapse:collapse;border-spacing:0;}
			/*******************#menupc****************************/
			@media only screen and (max-width:2600px) and (min-width:2500px){#menupc{margin-top:50px !important;}}
			@media only screen and (max-width:2499px) and (min-width:2400px){#menupc{margin-top: 50px !important;;}}
			@media only screen and (max-width:2399px) and (min-width:2300px){#menupc{margin-top: 45px !important;}}
			@media only screen and (max-width:2299px) and (min-width:2200px){#menupc{margin-top: 42px !important;}}
			@media only screen and (max-width:2199px) and (min-width:2100px){#menupc{margin-top: 38px !important;}}
			@media only screen and (max-width:2099px) and (min-width:2000px){#menupc{margin-top: 20.4px;}}
			@media only screen and (max-width:1999px) and (min-width:1900px){#menupc{margin-top: 19.6px;}}
			@media only screen and (max-width:1899px) and (min-width:1800px){#menupc{margin-top: 18.8px;}}
			@media only screen and (max-width:1799px) and (min-width:1700px){#menupc{margin-top: 18px;}}
			@media only screen and (max-width:1699px) and (min-width:1600px){#menupc{margin-top: 17.2px;}}
			@media only screen and (max-width:1599px) and (min-width:1500px){#menupc{margin-top: 16.4px;}}
			@media only screen and (max-width:1499px) and (min-width:1400px){#menupc{margin-top: 15.6px;}}
			@media only screen and (max-width:1399px) and (min-width:1300px){#menupc{margin-top: 14.8px;}}
			@media only screen and (max-width:1299px) and (min-width:1200px){#menupc{margin-top: 14px;}}
			@media only screen and (max-width:1199px) and (min-width:1100px){#menupc{margin-top: 13.2px;}}
			@media only screen and (max-width:1099px) and (min-width:992px){#menupc{margin-top: 11.8px;}}
			/*******************#menupc*****************************/
		</style>
		<!-------------------RESET---------------->	
		<link href="<?php echo get_template_directory_uri(); ?>/css/footer.css" rel="stylesheet" async>
		<?php } ?>
		<?php if(is_home()){ ?>
		<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/main.css" async>		
		<?php } ?>
		<?php if(is_page('Carrito') || is_single()){ ?>		
		
		<!-------------------MENU PC CSS---------------->
		<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/menu.css" async>
		<!-------------------MENU PC CSS---------------->
		
		<!-------------------logo---------------->
		<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/logo.css" async>
		<!-------------------logo---------------->
		<!-------------------MENU movil CSS---------------->
		<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/menu_mv.css" async>	
		<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" async>
		<link rel="stylesheet" href="https://propeller.in/components/icons/css/google-icons.css" async>	 
		<link rel="stylesheet" href="https://propeller.in/components/button/css/button.css" async>		
		<link rel="stylesheet" href="https://propeller.in/components/accordion/css/accordion.css" async>
		<!-------------------MENU movil CSS---------------->		
		<!-------------------MENU---------------->
		<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/menu_principal.css" async>
		<!-------------------MENU---------------->
		<!-------------------FORMULARIO CSS---------------->
		<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/textfield.css" async>
		<!-------------------FORMULARIO CSS---------------->	
		<?php } ?>
		<?php if(is_shop() || is_page('Catalogo')){ ?>
		
		<!-------------------MENU PC CSS---------------->
		<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/menu.css" async>
		<!-------------------MENU PC CSS---------------->
		
		<!-------------------logo---------------->
		<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/logo.css" async>
		<!-------------------logo---------------->
		<!-------------------MENU movil CSS---------------->
		<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/menu_mv.css" async>	
		<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" async>
		<link rel="stylesheet" href="https://propeller.in/components/icons/css/google-icons.css" async>	 
		<link rel="stylesheet" href="https://propeller.in/components/button/css/button.css" async>		
		<link rel="stylesheet" href="https://propeller.in/components/accordion/css/accordion.css" async>
		<!-------------------MENU movil CSS---------------->		
		<!-------------------MENU---------------->
		<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/menu_principal.css" async>
		<!-------------------MENU---------------->
			<link href="https://fonts.googleapis.com/css?family=Lato:400,700" rel="stylesheet" async>
			<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/csscool/reset.css" async> <!-- CSS reset -->
			<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/csscool/style.css"> <!-- Resource style -->
  			<!-------------------BOOTSTRAP---------------->
			<link href="<?php echo get_template_directory_uri(); ?>/css/bootstrap.css" rel="stylesheet" async>
			<!-------------------BOOTSTRAP---------------->	
		<?php } ?>		
		<?php if(is_page('Carrito')){ ?>
		<link href="<?php echo get_template_directory_uri(); ?>/css/catalogofinal.css" rel="stylesheet" async>		
		<!-------------------WHATSAPP CSS---------------->
		<link href="<?php echo get_template_directory_uri(); ?>/css/icono_modal.css" rel="stylesheet" async>
		<link rel="stylesheet prefetch" href="https://cdn.jsdelivr.net/animatecss/3.5.2/animate.min.css" async>
		<!-------------------WHATSAPP CSS---------------->	
		<?php } ?>
		<?php if(is_single() || is_page() && !is_page('Carrito') ){ ?>
		<link href="<?php echo get_template_directory_uri(); ?>/css/page.css" rel="stylesheet" async>
		<?php } ?>
		<?php if(is_product()){ ?>
		
		<!-------------------MENU PC CSS---------------->
		<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/menu.css" async>
		<!-------------------MENU PC CSS---------------->
		
		<!-------------------logo---------------->
		<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/logo.css" async>
		<!-------------------logo---------------->
		<!-------------------MENU movil CSS---------------->
		<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/menu_mv.css" async>	
		<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" async>
		<link rel="stylesheet" href="https://propeller.in/components/icons/css/google-icons.css" async>	 
		<link rel="stylesheet" href="https://propeller.in/components/button/css/button.css" async>		
		<link rel="stylesheet" href="https://propeller.in/components/accordion/css/accordion.css" async>
		<!-------------------MENU movil CSS---------------->		
		<!-------------------MENU---------------->
		<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/menu_principal.css" async>
		<!-------------------MENU---------------->
		<link href="<?php echo get_template_directory_uri(); ?>/css/vista_bloque3.css" rel="stylesheet" async>
		<?php } ?>
		<?php if(is_singular('post')){ ?>			
		
		<!-------------------MENU PC CSS---------------->
		<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/menu.css" async>
		<!-------------------MENU PC CSS---------------->
		
		<!-------------------logo---------------->
		<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/logo.css" async>
		<!-------------------logo---------------->
		<!-------------------MENU movil CSS---------------->
		<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/menu_mv.css" async>	
		<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" async>
		<link rel="stylesheet" href="https://propeller.in/components/icons/css/google-icons.css" async>	 
		<link rel="stylesheet" href="https://propeller.in/components/button/css/button.css" async>		
		<link rel="stylesheet" href="https://propeller.in/components/accordion/css/accordion.css" async>
		<!-------------------MENU movil CSS---------------->		
		<!-------------------MENU---------------->
		<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/menu_principal.css" async>
		<!-------------------MENU---------------->
			<link href="<?php echo get_template_directory_uri(); ?>/css/blog.css" rel="stylesheet" async>	
		<?php } ?>	
		<?php if(is_singular('product') || is_page('Carrito')){ ?>
		
		<!-------------------MENU PC CSS---------------->
		<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/menu.css" async>
		<!-------------------MENU PC CSS---------------->
		
		<!-------------------logo---------------->
		<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/logo.css" async>
		<!-------------------logo---------------->
		<!-------------------MENU movil CSS---------------->
		<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/menu_mv.css" async>	
		<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" async>
		<link rel="stylesheet" href="https://propeller.in/components/icons/css/google-icons.css" async>	 
		<link rel="stylesheet" href="https://propeller.in/components/button/css/button.css" async>		
		<link rel="stylesheet" href="https://propeller.in/components/accordion/css/accordion.css" async>
		<!-------------------MENU movil CSS---------------->		
		<!-------------------MENU---------------->
		<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/menu_principal.css" async>
		<!-------------------MENU---------------->
		<style>
			/*------------------------BOTON-----------------------*/		
		.botonmodal{font-family: 'Lato', sans-serif;font-weight: 400;background:#009fe3;color:#fff;border:none;line-height:20px;padding:0px 0 0 0;text-transform:none;letter-spacing:0;width:30%;transition:.4s;-webkit-transition:.4s;margin:50px 35%;display:table;}
		.botonmodal:hover{background:#111;color:#fff;transition:.4s;-webkit-transition:.4s;cursor:pointer;cursor:hand;}
		@media only screen and (min-width:2001px){.botonmodal{height:75px;border-radius:50px;font-size:30px;}}
		@media only screen and (max-width:2000px) and  (min-width:1700px){.botonmodal{height:55px;border-radius:25px;font-size:20px;}}
		@media only screen and (max-width:1699px) and  (min-width:992px){.botonmodal{height:50px;border-radius:25px;font-size:15px;}}
		@media only screen and (max-width:991px) and  (min-width:530px){.botonmodal{height:35px;border-radius:20px;font-size:12px;}}
		@media only screen and (max-width:529px){.botonmodal{height:35px;border-radius:20px;font-size:12px;margin:25px 25%;width:50%;}}
		/*------------------------BOTON-----------------------*/
		</style>	
		<!-------------------WHATSAPP CSS---------------->
		<link href="<?php echo get_template_directory_uri(); ?>/css/icono_modal.css" rel="stylesheet" async>
		<link rel="stylesheet prefetch" href="https://cdn.jsdelivr.net/animatecss/3.5.2/animate.min.css" async>
		<!-------------------WHATSAPP CSS ---------------->
		<link href="<?php echo get_template_directory_uri(); ?>/css/form-flotante.css" rel="stylesheet" async>
		<?php } ?>
		
		<style type="text/css">
		/*----------------------ON/OFF ------------------------------*/		
			@media only screen and  (min-width:992px){.tablet, .celular{display:none;}.pc{display: block;}}
			@media only screen and (max-width:991px) and  (min-width:768px){.pc, .celular{display:none;}.tablet{display: block;}}
			@media only screen and (max-width:767px) {.pc, .tablet{display:none;}.celular{display: block;}}
		/*----------------------ON/OFF------------------------------*/
		/*----------------------POSICIÓN------------------------------*/
			@media only screen and  (min-width:992px){
			.pc-izquierda-grande{margin-left: 5% !important;width: 50% !important;}.pc-izquierda-mediano{margin-left: 5% !important;width: 40% !important;}.pc-centrado-extraGrande{margin-left: 8% !important;width: 84% !important;}.pc-centrado-superGrande{margin-left: 15% !important;width: 70% !important;}.pc-centrado-grande{margin-left: 25% !important;width: 50% !important;}.pc-centrado-mediano{margin-left: 30% !important;width: 40% !important;}.pc-derecha-grande{margin-left: 45% !important;width: 50% !important;}.pc-derecha-mediano{margin-left: 55% !important;width: 40% !important;}.pc-centrado-mediano2{margin-left: 20% !important;width: 60% !important;}}
			
			@media only screen and  (max-width:991px) and  (min-width:768px){
			.tb-izquierda-grande{margin-left: 5% !important;width: 50% !important;}.tb-izquierda-mediano{margin-left: 5% !important;width: 40% !important;}.tb-centrado-superGrande{margin-left: 10% !important;width: 80% !important;}.tb-centrado-grande{margin-left: 20% !important;width: 60% !important;}.tb-centrado-mediano{margin-left: 30% !important;width: 40% !important;}.tb-derecha-grande{margin-left: 45% !important;width: 50% !important;}.tb-derecha-mediano{margin-left: 55% !important;width: 40% !important;}}
			@media only screen and  (max-width:767px){
			.mv-izquierda-grande{margin-left: 5% !important;width: 50% !important;}.mv-izquierda-mediano{margin-left: 5% !important;width: 40% !important;}.mv-centrado-superGrande{margin-left: 10% !important;width: 80% !important;}.mv-centrado-grande{margin-left: 20% !important;width: 60% !important;}.mv-centrado-mediano{margin-left: 30% !important;width: 40% !important;}.mv-derecha-grande{margin-left: 45% !important;width: 50% !important;}.mv-derecha-mediano{margin-left: 55% !important;width: 40% !important;}.mv-centrado-super-grande{margin-left: 5% !important;width: 90% !important;}.mv-centrado-grande2 {margin-left: 10% !important;width: 80% !important;}
			}
		/*----------------------POSICIÓN------------------------------*/
		<?php if(is_home()){ ?>
		/*----------------------PORTADA------------------------------*/
			@media only screen and  (min-width:992px){#bloque1{background-image: url("<?php echo get_template_directory_uri(); ?>/imagenes/fondos/bloque1.webp");}}
			@media only screen and (max-width:991px) and  (min-width:768px){#bloque1{background-image: url("<?php echo get_template_directory_uri(); ?>/imagenes/fondos/Portada_inicio-tb.webp");}}
			@media only screen and (max-width:767px) {#bloque1{background-image: url("<?php echo get_template_directory_uri(); ?>/imagenes/fondos/Portada_inicio-mv.webp");}}
		/*----------------------PORTADA------------------------------*/
		/*----------------------BANNER BLOQUE 3------------------------------*/
			@media only screen and  (min-width:992px){#bloque3{background-image: url("<?php echo get_template_directory_uri(); ?>/imagenes/fondos/inicio_bloque3_pc.webp");}}
			@media only screen and (max-width:991px) and  (min-width:768px){#bloque3{background-image: url("<?php echo get_template_directory_uri(); ?>/imagenes/fondos/inicio_bloque3_tb.webp");}}
			@media only screen and (max-width:767px) {#bloque3{background-image: url("<?php echo get_template_directory_uri(); ?>/imagenes/fondos/inicio_bloque3_mv.webp");}}
		/*----------------------BANNER BLOQUE 3------------------------------*/
			<?php } ?>
			<?php if(is_shop() || is_page() || is_product() || is_single()){ ?>
				/*----------------------ON/OFF------------------------------*/		
			@media only screen and  (min-width:992px){.tablet, .celular{display:none;}.pc{display: block;}}
			@media only screen and (max-width:991px) and  (min-width:768px){.pc, .celular{display:none;}.tablet{display: block;}}
			@media only screen and (max-width:767px) {.pc, .tablet{display:none;}.celular{display: block;}}
			/*----------------------ON/OFF------------------------------*/
			/*----------------------PORTADA------------------------------*/
				@media only screen and  (min-width:992px){#bloque1{background-image: url("<?php echo get_template_directory_uri(); ?>/imagenes/fondos/portadaPage_pc.webp");}} 
			@media only screen and (max-width:991px) and  (min-width:768px){#bloque1{background-image: url("<?php echo get_template_directory_uri(); ?>/imagenes/fondos/portadaPage_tb.webp");}}
			@media only screen and (max-width:767px) {#bloque1{background-image: url("<?php echo get_template_directory_uri(); ?>/imagenes/fondos/portadaPage_mv.webp");}} 
			/*----------------------PORTADA------------------------------*/
			
			<?php } ?>
			
			<?php if(is_page('Carrito')){ ?>
				@media only screen and  (min-width:768px){
			.pc-centrado-mediano2{margin-left: 20% !important;width: 60% !important;}}
			
			@media only screen and  (max-width:991px) and  (min-width:768px){
		.tb-centrado-grande{margin-left: 20% !important;width: 60% !important;}}
			
			@media only screen and  (max-width:767px){
		.mv-centrado-grande2{margin-left: 10% !important;width: 80% !important;}}
			<? } ?>
		</style>	
		<!---------------------------------------SMART LOOK------------------->
<script type="text/javascript">
    window.smartlook||(function(d) {
    var o=smartlook=function(){ o.api.push(arguments)},h=d.getElementsByTagName('head')[0];
    var c=d.createElement('script');o.api=new Array();c.async=true;c.type='text/javascript';
    c.charset='utf-8';c.src='https://rec.smartlook.com/recorder.js';h.appendChild(c);
    })(document);
    smartlook('init', '6815d79d06c05e327b380d1badef32ed98eed784');
</script>
		<!---------------------------------------SMART LOOK------------------->	
		
	</head>
	<?php if(is_singular('product') || is_page('Carrito')){ ?>
					<div>
						<!--<a href="https://api.whatsapp.com/send?phone=573209031994"></a>--><button data-target="#simple-dialog" data-toggle="modal" class="icono_modal transparente" type="button"><img src="<?php echo get_template_directory_uri(); ?>/imagenes/iconos/WhatsApp_Modal.png" alt="WhatsApp Icono" data-wow-iteration="infinite" data-wow-duration="1500ms" class="wow shake icono_modal pc tablet" ></button>
						<button data-target="#simple-dialog" data-toggle="modal" class="btn_modal_celular transparente celular" type="button">ESCRÍBENOS</button>
					</div>
					<div tabindex="-1" class="modal fade" id="simple-dialog" style="display: none;" aria-hidden="true">
												<div class="modal-dialog">
													<div class="modal-content">
														<div class="modal-body">
															<form id="formulario3" autocomplete="off">
																<h3>¿QUIERES HABLAR CON UN ASESOR?</h3>
																<div id="input" class="form-group pmd-textfield pmd-textfield-floating-label pc-centrado-grande tb-centrado-grande mv-centrado-super-grande formulario3_label">
																	<label for="Default" id="Default" class="control-label texto_form_modal" >Nombre / Nombre de la empresa</label>
																	<input  class="form-control" type="text" name="nombre" id="Nombre">
																</div>
																<button  class="botonmodal" id="boton_formulario3">¡HABLEMOS!</button>
															</form>
														</div>
													</div>
												</div>
					</div>
					<?php } ?>
	<body <?php body_class(); ?>>
<!--		<?php 
global $wpdb;
global $wpdb;
print_r($wpdb->queries);
?>-->
		
<?php get_template_part('menu'); ?>
<!-------------------------------------------------------------------------------------------------------------------------------->	
				