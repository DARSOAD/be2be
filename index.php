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
				<h2>YOUR TRUSTED</h2>
				<h1 id='segundoReglonTitulo'>PERSONALIZED</h1>
				<h2 id='tercerReglonTitulo'>SECURITY GUARD PROVIDER</h2>
				
				<!-- <img src="<?php echo get_template_directory_uri(); ?>/imagenes/iconos/neon_like.webp" alt="Neon Like" id="NeonLike" > -->
			</div>	

			<div id="bloque4">
			
				<!--<a href=""> 
					<button class="botonescarrusel" id="botoncomida" type="button"> COMIDA </button>
					<button class="botonescarrusel" id="botonmedicamentos" type="button"> MEDICAMENTOS </button>
					<button class="botonescarrusel" id="botonaccesorios" type="button"> ACCESORIOS </button>
				</a>-->
				<h1 class="tituloServicio letra43pt-pc letra5pt-mv">Our security services</h1>
					<!-- <div class="conocenos"> <p>Services</p> <span> &#10140; </span></div> -->
				
					<?php
					query_posts('post_type=post');
					while ( have_posts() ) : the_post(); ?>
					<div class="service">
						<div class="service-header">
							<h3 class="title letra36pt-pc letra5pt-mv"><?php the_title();?></h3>
							<button class="toggle-btn">+</button>
						</div>
						<div class="service-details">
							<div class="thumbnaill pc tablet">
								<?php the_post_thumbnail();?>
							</div>
							<div class="info">	
								<h3 class="title letra36pt-pc letra5pt-mv"><?php the_title();?></h3>
								<p class="description letra25pt-pc letra4pt-mv"><?php echo get_excerpt(400);?></p>
								<a  href="<?php the_permalink() ?>"> <button class='botones_tres'>More Info</button> </a>
							</div>
						</div>
					</div>
					<?php endwhile; ?>		
				<!-------------------CARRUSEL---------------->
			</div>		

			<div id="bloque3" class="banner-full-screen">
				<h3 id="titulobloque3" class="letra27pt-pc letra5-5pt-mv tipografiaPuno negrillaTres centrado"> READY TO BOOST YOUR SECURITY? </h3>	
				<p id="subtitulobloque3" class="letra18pt-pc letra3pt-mv tipografiaPdos centrado"> Let's Get Started! </p>
				<!-------------------FORMULARIO PASOS---------------->
				<form id="theForm" class="simform" action="<?php echo get_site_url(); ?>/?page_id=33" method="post" accept-charset="UTF-8" autocomplete="off">
					<input name="tipo" type="hidden"  value="registrarse">
					<div class="simform-inner">
						<ol class="questions">
							<li class="current">
								<span><label for="q1">Company name </label></span>
								<input id="q1" name="empresa" type="text">
							</li>
							<li>
								<span><label for="q2"> Phone number</label></span>
								<input id="q2" name="telefono" type="text">
							</li>
							<li>
								<span><label for="q3"> Email </label></span>
								<input id="q3" name="correo" type="text">
							</li>
							<li>
								<span><label for="q4"> Name </label></span>
								<input id="q4" name="nombre" type="text">
							</li>
							<li>
								<span><label for="q6"> Additional information</label></span>
								<input id="q6" name="comentarios" type="text">
							</li>
						</ol>
						<button class="submit" type="submit"> Submit </button>					
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
			<div class="bloquereviews">
				<h1 id='testTitulo' class='letra6pt-mv'>Testimonials</h1>
					<?php
                $args = array(
                    'post_type' => 'Reviews', // Reemplaza 'Clients' con el nombre de tu tipo de entrada personalizado
                    'posts_per_page' => -1,   // Muestra todos los posts, -1 para mostrar todos
                    'orderby' => 'date', // Ordenar por fecha
                    'order' => 'ASC' // En orden ascendente (de más antiguo a más reciente)

                );

                $query = new WP_Query($args);

                if ($query->have_posts()) :
					$i = 1;
                    while ($query->have_posts()) : $query->the_post();
                        // Contenido del loop
						$inicialOfinal = ($i-1)%5;
						if($i > 1){
							$enteroIndice = intdiv($i, 5);
							$indice = $i-(5*$enteroIndice);
						}else{
							$indice = 1;
						}
						$indiceO = 1;
						if($indice == 0){
							$indiceO = $indice;
							$indice = 5;
						}
						
						if($inicialOfinal==0){ 
								?> 
							<div class="outerdiv">
							<div class="innerdiv">
								<?php
						}
						$dark = 'dark';
						$excerpt = get_the_excerpt();
                        ?> 
						<div class='div<?php echo $indice ?> eachdiv'>
							<div class="userdetails">
							<div class="imgbox">
							<?php the_post_thumbnail(); ?>
							</div>
							<div class="detbox">
								<p class='name <?php if($indice == 3 || $indice == 4){ echo $dark;} ?>'><?php echo  get_the_title(); ?></p>
							</div>
							</div>
							<div class='review <?php if($indice == 3 || $indice == 4){ echo $dark;} ?>'>
							<a  href="<?php the_permalink() ?>"> 
								<h4>"<?php 
								if($indice == 2){ 
									$excerpt = wp_trim_words($excerpt, 20);
								} 
								if($indice == 3){ 
									$excerpt = wp_trim_words($excerpt, 45);
								} 
								if($indice == 4){ 
									$excerpt = wp_trim_words($excerpt, 20);
								} 
								echo  $excerpt; ?>"</h4> 
							</a>
							</div>
						</div>
                        <?php
						if($indiceO == 0){
							?> 
								</div>
								</div>
							<?php
						}
						$i++;
                    endwhile;
                    wp_reset_postdata(); // Restaura los datos del post original
                else :
                    // No se encontraron posts
                    echo 'No se encontraron entradas.';
                endif;
            ?>
						
									
					</div>
				</div>
				
			</div>
				
	<?php get_footer(); ?>