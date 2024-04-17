<?php
/**
 * Este es un tema personalizado creado por Diego
 */
get_header('carlos-sitio'); ?>
		<section id="contenido" class="pc-centrad-supergrandeCS">
        <img src="<?php echo get_template_directory_uri(); ?>/imagenes/fondos/CarlosSitio.png" alt="Carlos Stio" id="carlosSitio">
			<h1><?php the_title();?></h1>
            <div class="pc-centrado-extraGrande" style="margin-bottom: 100px!important;">
                 <?php 
                    while (have_posts()) :
                            the_post();	
                            the_content();
                    endwhile;
				?>
            </div>	
		</section>	
		
</div>	

<!-------------------MENU movil js---------------->
<!---------------------------------------MENU DESLEGABLE DERECHA------------------->
<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/menu_derecha.js"></script>  
<!---------------------------------------MENU DESLEGABLE DERECHA------------------->	
</body>
</html>
