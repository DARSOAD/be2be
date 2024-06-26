<?php $vara = get_query_var( 'vara' );  ?>
<?php 
	$NoPost = 1; 
	$args = array( 
		'post_type' => 'product',
		'orderby' => 'menu_order',
		'order'   => 'ASC',
		'posts_per_page' => 200 
	);  
	$query = new WP_Query( $args );
get_header('catalogo');
?>    
<div class="cd-product-builder">
	<div class="cd-builder-steps">
		<ul>
			<li data-selection="models" class="active builder-step">
				<section class="cd-step-content">
					<ul class="models-list options-list cd-col-2">
						<?php 
							while ($query -> have_posts()) : $query -> the_post(); 
								$id = get_the_ID();
								$product = wc_get_product( $id );
								$stock = $product->get_stock_status();;
								if($stock=='instock') { ?>
						<li class="js-option js-radio" data-price="<?php echo $product->get_price(); ?>" data-model="<?php echo $id;?>">
							<img src="<?php echo get_the_post_thumbnail_url($id,'full');  ?>" alt="<?php echo $product->name;?>">
							<span class="name"><?php echo $product->name;?></span>
							<?php 
							$available_variations = $product->get_available_variations();
							$display = $available_variations[0]['display_price'];
							$regular = $available_variations[0]['display_regular_price'];
							$diferencia = $display - $regular;
							if($diferencia!=0){ ?>
							<div class="descuento">
								<span class="price descuento_p regular_price"><?php echo '$'.$regular; ?></span>
								<span class="price descuento_p display_price"><?php echo '$'.$display; ?></span>
							</div>								
							<?php }else{ ?>							
								<span class="price"><?php echo '$'.$display; ?></span>
							<?php } ?>
							<div class="radio"></div>
						</li>
						
								<?php }	?>
						
						<?php endwhile;?>						
					</ul>
					<div id="datos" class="celular">
						<p class="centrado"> concurvas.almacen@gmail.com </p>
						<p class="centrado"> Centro comercial Plaza de las Américas </p>
						<p class="centrado"> Local 1109, Bogotá Colombia </p>
						<p class="centrado" style="color: gray !important;"><a href="https://api.whatsapp.com/send?phone=573053449733" target="_blank">+57 3053449733 </a></p>
					</div>				
				</section>
			</li>
			<!-- additional content will be inserted using ajax -->
		</ul>
	</div>

	<footer class="cd-builder-footer disabled step-1">
		<div class="selected-product">
			<img src="<?php echo get_template_directory_uri(); ?>/img/product01_col01.jpg" alt="Product preview">

			<div class="tot-price">
				<span>Total</span>
				<span class="total">$<b>0</b></span>
			</div>
			<p class="hiden" id="preciocarro"><?php echo $woocommerce->cart->cart_contents_total+$woocommerce->cart->tax_total;?></p>
		</div>
		
		<nav class="cd-builder-secondary-nav">
			<ul>
				<li class="next nav-item">
					<ul>
						<li class="visible"><a href="#0">Colores</a></li>
						<li><a href="#0">Tallas</a></li>
						<li><a href="#0" id="elResumen">Resumen</a></li>
						<li class="buy"><a href="#0" onclick="recheck()" id='comprarProducto' >Comprar</a></li>
					</ul>
				</li>
				<li class="prev nav-item">
					<ul>
						<li class="visible"><a href="#0">Modelos</a></li>
						<li><a href="#0">Modelos</a></li>
						<li><a href="#0">Colores</a></li>
						<li><a href="#0" id="lasTallas">Tallas</a></li>
					</ul>
				</li>
			</ul>
		</nav>

		<span class="alert">Por favor, selecciona un modelo primero!</span>
	</footer>
</div>
<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.min.js"></script>

<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
<!-------------------MENU PC js---------------->
<script src="<?php echo get_template_directory_uri(); ?>/js/menu_pc.js"></script>
<!-------------------MENU PC js---------------->
<!---------------------------------------MENU DESLEGABLE DERECHA------------------->
	<script src="<?php echo get_template_directory_uri(); ?>/js/menu_derecha.js"></script>  
	<script src="<?php echo get_template_directory_uri(); ?>/jscool/bootstrap-input-spinner.js"></script>  
	<script>
    $("input[type='number']").inputSpinner()
    $("input.small").inputSpinner({groupClass: "input-group-sm"})
    $("input.large").inputSpinner({groupClass: "input-group-lg"})
</script>
<!---------------------------------------MENU DESLEGABLE DERECHA------------------->
<!-------------------FORMULARIO JS---------------->
<script src="<?php echo get_template_directory_uri(); ?>/js/propellertextfield.js"></script>
<!-------------------FORMULARIO JS---------------->
<script>
	if( !window.jQuery ) document.write('<script src="<?php echo get_template_directory_uri(); ?>/jscool/jquery-3.0.0.min.js"><\/script>');
	function recheck() {
		var nombre = $("#nombre").val;
		var correo = $("#email").val;
		var telefono = $("#telefono").val();
		var ciudad = $("#ciudad").val();
		var direc = $("#direc").val();
		if(!telefono || !nombre || !correo || !ciudad || !direc){alert("Por favor completa todos los campos");}
        else{
            //alert(correo);
			 var descripcion = '0';
				$.ajax({
					url: "<?php echo get_site_url(); ?>/descripcion",
					headers: {'Access-Control-Allow-Origin': '<?php echo get_site_url(); ?>/descripcion'},
					type: "GET",
					async: false,
					success: function(data){
						descripcion = data;
					}						
				});
				$("#description").val(descripcion);
				$("#elformulario").submit();	
			}
		}
</script>
<script src="<?php echo get_template_directory_uri(); ?>/jscool/main.js"></script> <!-- Resource jQuery -->
<!---------WHATSAPP------>
<script src="<?php echo get_template_directory_uri(); ?>/js/moment.min.js"></script>
<script  src="<?php echo get_template_directory_uri(); ?>/js/index.js" async></script>
<!---------WHATSAPP------>
<script>
	setTimeout(function whatsapp(){
	    var dia = moment().format('dddd');
	    if(dia==="Tuesday" || dia==="Wednesday"){
	        $('#whatsappPromo').addClass("displayblock")	;    
	    }else{
	        $('#whatsapp').addClass("displayblock")	;
	    }
		
	},5000);
</script>
</body>
</html>