<?php
/**
 * The home.php template.
 *
 * The template to display the home.php content.
 *
 * @package WordPress
 * @subpackage Shop Isle
 */
get_header(); ?>
				<!--<h1 class="celular">Chaquetas al por mayor abrigables hechas en Colombia</h1>-->
				
				<img src="<?php echo get_template_directory_uri(); ?>/imagenes/iconos/neon_like.webp" alt="Neon Like" id="NeonLike" >
			</div>	
			<div id="bloque2">
				<div class="row">	
					<h3 class="letra18pt-pc letra5pt-mv tipografiaHdos centrado">NUEVA COLECCIÓN</h3>
					<?php 
						$args = array( 
							'post_type' => 'product',
							'orderby' => 'name',
							'order'   => 'ASC',
							'posts_per_page' => 3, 
							'tax_query' => array(  
								array( 
									'taxonomy' => 'Destacado', 
									'field'    => 'slug', 
									'terms'    => 'si', 
								), 
							), 
						);
						$query = new WP_Query( $args );
					?>
					<?php while ($query -> have_posts()) : $query -> the_post(); ?>
					<?php 
					$id = get_the_ID();
					?>
					<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
					 	<div class="tarjetas">
							<figure>
								<img class="lazy" src="<?php echo get_the_post_thumbnail_url($id,'full');  ?>" alt="tarjeta1">							
								<figcaption> <?php the_title();?> </figcaption>
							</figure>
							<a href="<?php the_permalink() ?>"><button class="boton" type="button"> VER MÁS </button></a>
						</div>
					</div>
					<?php endwhile; ?>
					
				</div>
			</div>
			<div id="bloque3" class="banner-full-screen">
				<h3 id="titulobloque3" class="letra27pt-pc letra5-5pt-mv tipografiaPuno negrillaTres centrado"> ¿QUIERES COMPRAR CHAQUETAS AL POR MAYOR? <br> SOMOS FABRICANTES COLOMBIANOS </h3>	
				<p id="subtitulobloque3" class="letra18pt-pc letra3pt-mv tipografiaPdos centrado">Dejanos tus datos y te enviaremos toda la información para que empieces a vender</p>
				<!-------------------FORMULARIO PASOS---------------->
				<form id="theForm" class="simform" action="<?php echo get_site_url(); ?>/gracias" method="post" accept-charset="UTF-8" autocomplete="off">
					<input name="tipo" type="hidden"  value="registrarse">
					<div class="simform-inner">
						<ol class="questions">
							<li class="current">
								<span><label for="q1">Nombre de tu Empresa </label></span>
								<input id="q1" name="empresa" type="text">
							</li>
							<li>
								<span><label for="q2"> ¿Cuál es tu teléfono? </label></span>
								<input id="q2" name="telefono" type="text">
							</li>
							<li>
								<span><label for="q3"> Déjanos tu correo </label></span>
								<input id="q3" name="correo" type="text">
							</li>
							<li>
								<span><label for="q4"> Tu nombre </label></span>
								<input id="q4" name="nombre" type="text">
							<li>
								<span><label for="q5"> ¿En dónde estás ubicado?</label></span>
								<input id="q5" name="ciudad" type="text">
							</li>
							<li>
								<span><label for="q6"> Comentarios</label></span>
								<input id="q6" name="comentarios" type="text">
							</li>
						</ol>
						<button class="submit" type="submit"> Enviar </button>					
						<div class="controls">
							<button class="next"></button>
							<div class="progress"></div>
							<span class="number">
								<span class="number-current"> 1 </span>
								<span class="number-total"> 3 </span>
							</span>
							<span class="error-message"></span>
						</div>
					</div>
					<span class="final-message"></span>
				</form>
				<!-------------------FORMULARIO PASOS---------------->		
			</div>
			<div id="bloque4">
				<!--<a href=""> 
					<button class="botonescarrusel" id="botoncomida" type="button"> COMIDA </button>
					<button class="botonescarrusel" id="botonmedicamentos" type="button"> MEDICAMENTOS </button>
					<button class="botonescarrusel" id="botonaccesorios" type="button"> ACCESORIOS </button>
				</a>-->
					<div class="conocenos"> <p>Scroll the blog</p> <span> &#10140; </span></div>
				<!-------------------CARRUSEL---------------->
				<div class="owl-carousel">
					<?php
					query_posts('post_type=post');
					while ( have_posts() ) : the_post(); ?>
					<div class="item">	
						<figure class="producto">
							<a href="<?php the_permalink() ?>"><?php the_post_thumbnail();?></a>
							<a href="<?php the_permalink() ?>"><figcaption> <p class="letra30pt-pc letra4-5pt-mv"><?php the_title();?></strong> </figcaption></a>
							<a href="<?php the_permalink() ?>" class="pc"><h2 class="letra18pt-pc"> <?php echo get_excerpt(200);?> </h2></a>
							<a href="<?php the_permalink() ?>" class="tablet celular"><h2 class="letra3pt-mv"> <?php echo get_excerpt(40);?> </h2></a>
						</figure>	
						<figure class="iconolike">
							<img src="<?php echo get_template_directory_uri(); ?>/imagenes/iconos/like.png" alt="like">
						</figure>
					</div>
					<?php endwhile; ?>		
				</div>
				<!-------------------CARRUSEL---------------->
			</div>		
	<?php get_footer(); ?>