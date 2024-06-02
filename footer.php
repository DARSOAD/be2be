<?php if(!is_page('Carrito') || !is_page('Catalogo')){ ?>
		<div class="cd-cart-container empty">
			<a href="#0" class="cd-cart-trigger">
				<ul class="count tipografiaHuno"> <!-- cart items count -->
					<li>0</li>
					<li>0</li>
				</ul> <!-- .count -->
			</a>

			<div class="cd-cart">
				<div class="wrapper">
					<header>
						<h2 class="letra30pt-pc letra5pt-mv tipografiaHtres negrillaTres">Carrito</h2>				
					</header>

					<div class="body">
						<ul>
							<!-- products added to the cart will be inserted here using JavaScript -->
						</ul>
					</div>

					<div id="foot">
						<a href="<?php echo get_site_url(); ?>/carrito" class="checkout btn letra30pt-pc letra5pt-mv tipografiaHtres negrillaTres"><em>Checkout - $<span>0</span></em></a>
					</div>
				</div>
			</div> <!-- .cd-cart -->
		</div> <!-- cd-cart-container -->			

<?php } ?>
<div id="bloque5">
				<footer>
				    <div id="fs1" >
				        <div class="row">
				            <div id="footerproductos" class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
    						<h4 class="footerh3"> PRODUCTOS </h4>
                                						<ul class="footerul">
                                <?php
                                
                                	$cats = get_categories( array(
                                	'hide_empty' => 0,
                                    'orderby' => 'name',
                                    'taxonomy'   => 'product_cat'
                                )  );
                                  
                                if ( ! empty( $cats ) ) {
                                    // print_r($cats);
                                     foreach ( $cats as $term ) {
                                     // If parent cat ID = 116 echo subcat name...
                                     	if( (!$term->parent && $term->slug != 'sin-categorizar') || $term->parent == 16) { 
                                     		?> <li class="textos_footer"><a href="<?php echo get_site_url(); ?>/catalogo/?vara=<?php echo $term->category_nicename;?>/"> <?php echo $term->name; ?> </a></li> <?php
                                    	}		
                                	 }
                                }
                                ?>
    						</ul>	
    					</div>
    					<div id="footerproductosalpormayor" class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
    						<h4 class="footerh3" id="pstion1"> HORARIOS</h4>
    						<ul class="footerul" id="pstion2">
    							<li class="textos_footer"> <p>Domingo a Domingo de  10:00 a.m - 08:00 p.m</p> </li>	
    						</ul>
    					</div>
    						<div id="googlemaps">
    						<div id="map"> </div>
    						<h3 class="footerh3tienda"> ENCUÉNTRANOS <span> &#10140; </span> </h3>
    					</div>
    					<div id="footercontacto" class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
    						<h4 class="footerh3"> CONTÁCTANOS </h4>
    						<ul class="footerul footerul2">
    							<li class="textos_footer"><a href=""> concurvas.almacen@gmail.com </a></li>
    							<li class="pc tablet textos_footer"><a href="https://api.whatsapp.com/send?phone=573053449733" target="_blank"> <img src="<?php echo get_template_directory_uri(); ?>/imagenes/iconos/whatsapp-logo.png" alt="WhatsApp" style="width: 6% !important; height: auto !important;">  </a></li>							
    						</ul>
    						<div id="footerdatoscontacto" >
    						<ul class="footerul footerul2">		
    							<li class="celular"><a href="https://api.whatsapp.com/send?phone=573053449733" target="_blank"> <img src="<?php echo get_template_directory_uri(); ?>/imagenes/iconos/whatsapp-logo.png" alt="WhatsApp" style="width: 4% !important; height: auto !important;"> 3053449733 </a></li>		
    						</ul>
    						<div id="movilredes" class="celular">
    						    <figure class="celular redesmovil">
    							    <a href="https://www.facebook.com/concurvas.co/"><img src="<?php echo get_template_directory_uri(); ?>/imagenes/iconos/facebook.png" alt="facebook"></a>						
    						    </figure>
    						    <figure class="celular redesmovil">
    							<a href="https://www.instagram.com/concurvas.co/"><img src="<?php echo get_template_directory_uri(); ?>/imagenes/iconos/instagram.png" alt="instagram"></a>
    						    </figure>
    					    </div>						
    					    <div id="redessociales" class="row">
    						<figure class="pc col-lg-6 col-md-6 col-sm-6 col-xs-6">
    							<a href="https://www.facebook.com/concurvas.co/"><img src="<?php echo get_template_directory_uri(); ?>/imagenes/iconos/facebook.png" alt="facebook"></a>							
    						</figure>
    						<figure class="pc col-lg-6 col-md-6 col-sm-6 col-xs-6">
    							<a href="https://www.instagram.com/concurvas.co/"><img src="<?php echo get_template_directory_uri(); ?>/imagenes/iconos/instagram.png" alt="instagram"></a>				
    						</figure>					
    					</div>
    					</div>
    					</div>
    						
    					
				        </div>
				    </div>
				    <div id="fs2" class="row">
				        <div id="copy" class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				            <h4 class="ultimos_footer"> Copyright &#169; Concurvas &reg; </h4>
				        </div>
				        <div id="terminosycondiciones" class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
    						<a href="http://www.concurvas.com/terminos-y-condiciones/"><h5 class="ultimos_footer"> Términos y condiciones </h5></a> 
    					</div>
				    </div>
				</footer>
			</div>
		<!-------------------FLUIDO JS---------------->
		<script src="<?php echo get_template_directory_uri(); ?>/js/fluido.js" async></script>
		<!-------------------FORMULARIO PASOS JS---------------->
		<script src="<?php echo get_template_directory_uri(); ?>/js/classie.js" async></script>
		<script src="<?php echo get_template_directory_uri(); ?>/js/stepsForm.js" async></script>
		<!-------------------FORMULARIO PASOS JS---------------->
		<!-------------------FORMULARIO JS---------------->
		<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.min.js"></script>
		<script src="<?php echo get_template_directory_uri(); ?>/js/propellertextfield.js" async></script>
		<!-------------------FORMULARIO JS---------------->
		<!-------------------CARRO FOOTER JS---------------->
		<script src="<?php echo get_template_directory_uri(); ?>/jscarro/main.js" async></script>
		<!-------------------CARRO FOOTER JS---------------->
		<!-------------------CARRUSEL JS---------------->
		<!-------------------También necesita del Jquery---------------->
		<script src="<?php echo get_template_directory_uri(); ?>/js/owl.carousel.min.js"></script>
		<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.mousewheel.js"></script>
		<!-------------------CARRUSEL JS---------------->		
		<!-------------------MENU PC js---------------->
		<script src="<?php echo get_template_directory_uri(); ?>/js/menu_pc.js"></script>
		<!-------------------MENU PC js---------------->		
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" async></script>
<script>
	$(document).ready(function() {
		//custom function to add and remove active class
		$(function () {			
			$(".collapse.in").parents(".panel").addClass("active");
			$('a[data-toggle="collapse"]').on('click',function(){
				var objectID=$(this).attr('href');
				var expandale = $(this).attr('data-expandable');
				if (expandale == 'true') {
					if($(objectID).hasClass('in')){
						$(objectID).collapse('hide');
					}
					else {
						$(objectID).collapse('show');
					}
				}
				$accoID = $(this).parents(".panel-group").attr("id");
				$availiblity = $(this).parents(".panel").children(".in").length;
				$expandable = $(this).attr("data-expandable");
				$expanded = $(this).attr("aria-expanded");
				$current = $(this).parent().parent().parent().parent().attr("id");
				if ($expandable == "false") {
					if($expanded == "true") {
						$("#"+ $current +" .active").removeClass("active");
					}
					else {
						$("#"+ $current +" .active").removeClass("active");
						$(this).parents('.panel').addClass("active");
					}
				}
				if ($expandable == "true") {
					if($expanded == "true") {
						$(this).parents('.panel').addClass("active");
					}
					else {
						$(this).parents('.panel').removeClass("active");
					}
				}
            });
                    
		});
   });

</script> 
<!-------------------MENU movil js---------------->
<!---------------------------------------MENU DESLEGABLE DERECHA------------------->
	<script src="<?php echo get_template_directory_uri(); ?>/js/menu_derecha.js"></script>  
<!---------------------------------------MENU DESLEGABLE DERECHA------------------->	
<?php if(is_home()){ ?>
<script type="text/javascript">
	var video = document.getElementById("video");
	var botonVideo = document.getElementById("botonVideo");
	
    function playPause() { 
        if (video.paused){ 
            video.play(); 
            botonVideo.style.visibility = 'hidden';
            video.style.visibility = 'visible';
        }
        else{
            video.pause(); 
            botonVideo.style.visibility = 'visible';
            video.style.visibility = 'hidden';
        }
    }
</script>
 <?php }?>   
 
 
 

<?php if(is_home()){ ?>
<!-------------------CARRUSEL---------------->	
		<script>
			var owl = $('.owl-carousel');
			owl.owlCarousel({
				loop: true,
				responsive:{
					0:{
						items:1
					},
					300:{
						items:1
					},
					400:{
						items:1
					},
					500:{
						items:2
					},
					600:{
						items:2
					},
					700:{
						items:2
					},
					992:{
						items:3
					},	
				}
			})
			owl.on('mousewheel', '.owl-stage', function (e) {
				if (e.deltaY>0) {
					owl.trigger('next.owl');
				} else {
					owl.trigger('prev.owl');
				}
				e.preventDefault();
			});
		</script>	
<!-------------------CARRUSEL---------------->
<?php } ?>
<?php if(is_home() || is_page('Catalogo')){ ?>
<script src="<?php echo get_template_directory_uri(); ?>/js/modernizr.js"></script> <!-- Modernizr -->
<?php } ?>
<?php if(is_home() || is_page('Cotización')){ ?>
	<!-------------------FORMULARIO PASOS JS---------------->
		<script src="<?php echo get_template_directory_uri(); ?>/js/modernizr.custom.js"></script>
		<script src="<?php echo get_template_directory_uri(); ?>/js/classie.js"></script>
		<script src="<?php echo get_template_directory_uri(); ?>/js/stepsForm.js"></script>
		<!-------------------FORMULARIO PASOS JS---------------->
		<script src="<?php echo get_template_directory_uri(); ?>/js/propellertextfield.js"></script>
		<!-------------------FORMULARIO JS---------------->
		<!-------------------CARRUSEL JS---------------->					
<!-------------------FORMULARIO PASOS---------------->
		<script>
			var theForm = document.getElementById( 'theForm' );
			new stepsForm( theForm, {
				onSubmit : function( form ) {
					// hide form
					classie.addClass( theForm.querySelector( '.simform-inner' ), 'hide' );
					form.submit()
					/*or
					AJAX request (maybe show loading indicator while we don't have an answer..)
					*/

					// let's just simulate something...
					var messageEl = theForm.querySelector( '.final-message' );
					messageEl.innerHTML = '¡Gracias! Estaremos en contacto.';
					classie.addClass( messageEl, 'show' );
				}
			} );
		</script>
<!-------------------FORMULARIO PASOS---------------->	

<?php } ?>
<?php if(is_shop() || is_page()){ ?>
<!-------------------CARRUSEL---------------->	
		<script>
			var owl = $('.owl-carousel');
			owl.owlCarousel({
				loop: true,
				autoplay:true,
				autoplayTimeout:30000,
				autoplayHoverPause:true,
				responsive:{
					0:{
						items:1
					},
					300:{
						items:1
					},
					600:{
						items:1
					},
					992:{
						items:1
					},	
				}
			})
			owl.on('mousewheel', '.owl-stage', function (e) {
				if (e.deltaY>0) {
					owl.trigger('next.owl');
				} else {
					owl.trigger('prev.owl');
				}
				e.preventDefault();
			});
		</script>	
<!-------------------CARRUSEL---------------->
<?php } ?>
		<!-------------------MENU movil js---------------->			

<!---------WHATSAPP------>
<script  src="<?php echo get_template_directory_uri(); ?>/js/index.js"></script>
<!---------WHATSAPP------>
<script>
	document.getElementById('boton_formulario3').onclick = function (){enviar()};	
	function enviar(){
		
	var nombre = document.getElementById("Nombre").value;		
	var url = new String("https://api.whatsapp.com/send?phone=573053449733&text=Hola, mi nombre es "+nombre+" me gustaría hablar con un asesor");;
		alert (url);
	window.open(url);
	};
	
</script>
<?php if(is_product()){ ?>
<!---------CANTIDADES------>
<script src="<?php echo get_template_directory_uri(); ?>/js/cantidad.js"></script>
<script type="text/javascript">
	
$('#pa_color').change(function() {
  	var color = $('#pa_color').val();
	var talla = $('#pa_talla').val();
	var id = $('#id').val();
	if(talla){
		var stock = cantidad(color,talla,id);
		//alert(stock);
		if($( "input[name='quantity']" ).val() > stock){$( "input[name='quantity']" ).val(stock);}
		$( "input[name='quantity']" ).attr({"max" : stock});
	}	
});
$('#pa_talla').change(function() {
  	var color = $('#pa_color').val();
	var talla = $('#pa_talla').val();
	var id = $('#id').val();
	if(color){
		var stock = cantidad(color,talla,id);
		//alert(stock);
		if($( "input[name='quantity']" ).val() > stock){$( "input[name='quantity']" ).val(stock);}
		$( "input[name='quantity']" ).attr({"max" : stock});
	}	
});

</script>
<!---------CANTIDADES------>
<?php } ?>
<?php if(is_cart()){ ?>
<script src="<?php echo get_template_directory_uri(); ?>/js/cantidad.js"></script>
<script type="text/javascript">
$("input[title='Cantidad']").change(function(){
	
	var upd_cart_btn = $('button[name=update_cart]');
	
	upd_cart_btn.trigger("click");
	//var cantidad = $(this).val();
	//var name = $(this).attr('name');
	//var precio = actualizar(cantidad,name);
	
});
</script>
<?php } ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.lazyload/1.9.1/jquery.lazyload.min.js" async></script>
<script>
$(function() {
     $("img.lazy").lazyload();
});
</script>
	</body>
</html>