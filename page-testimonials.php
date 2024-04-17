<?php
/**
 * Este es un tema personalizado creado por Diego
 */
get_header('page'); ?>
		<section id="contenido">
			<h1><?php the_title();?></h1>
		<div class="contenedorTarjetas soloPc">
            
        
           
            <?php
                $args = array(
                    'post_type' => 'Reviews', // Reemplaza 'Clients' con el nombre de tu tipo de entrada personalizado
                    'posts_per_page' => -1,   // Muestra todos los posts, -1 para mostrar todos
                    'orderby' => 'date', // Ordenar por fecha
                    'order' => 'ASC' // En orden ascendente (de más antiguo a más reciente)

                );

                $query = new WP_Query($args);

                if ($query->have_posts()) :
                    while ($query->have_posts()) : $query->the_post();
                        // Contenido del loop
                        $excerpt = get_the_excerpt();
                        $excerpt = wp_trim_words($excerpt, 20);
                        ?> 
                        <div class="tarjetaClientes">
                            <div class="imagenCliente">
                                <?php the_post_thumbnail(); ?>
                            </div>
                            <div class="contenidoCliente">
                                <h1> <?php echo  get_the_title(); ?> </h1>
                                <p> <?php echo  $excerpt; ?></p>   
                                <div class='contenidoCompleto'> <?php echo  get_the_content(); ?></div>   
                            </div>
                            
                        </div>
                        <?php
                    endwhile;
                    wp_reset_postdata(); // Restaura los datos del post original
                else :
                    // No se encontraron posts
                    echo 'No se encontraron entradas.';
                endif;
            ?>
        


		</div>	
        <div class="contenedorTarjetas soloMovil">
            <?php
                $args = array(
                    'post_type' => 'Reviews', // Reemplaza 'Clients' con el nombre de tu tipo de entrada personalizado
                    'posts_per_page' => -1,   // Muestra todos los posts, -1 para mostrar todos
                    'orderby' => 'date', // Ordenar por fecha
                    'order' => 'ASC' // En orden ascendente (de más antiguo a más reciente)

                );

                $query = new WP_Query($args);

                if ($query->have_posts()) :
                    while ($query->have_posts()) : $query->the_post();
                ?>
                <div class="service">
                    <div class="service-header">
                        <div class="imagenClienteService">
                                <?php the_post_thumbnail(); ?>
                        </div>
                        <h3 class="title letra36pt-pc letra5pt-mv"><?php the_title();?></h3>
                        <button class="toggle-btn">+</button>
                    </div>
                    <div class="service-details">
                        <div class="info">	
                            <h3 class="title letra36pt-pc letra5pt-mv"><?php the_title();?></h3>
                            <p class="description letra25pt-pc letra4pt-mv"><?php echo get_the_content();?></p>
                        </div>
                    </div>
                </div>
            <?php 
                endwhile; 
                else :
                // No se encontraron posts
                echo 'No se encontraron entradas.';
                endif;
            
            ?>	
		</div>	
		</section>	
		

<?php get_footer(); ?>