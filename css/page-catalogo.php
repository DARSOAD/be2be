<?php 
	get_header();
	$vara = get_query_var( 'vara' );  
	$varb = get_query_var( 'varb' );  
	$condicion = get_query_var( 'condicion' );
	/*echo $condicion.' '.$vara.' '.$varb;
$resultado = menus('Categoria',$condicion,$vara,$varb);
									foreach ($resultado as $final){ 
										//echo '<option value="http://www.animalhome.co/catalogo/?condicion=CategoríaDef&vara='.$final.'&varb=dog&pag=1">'.$final.'</option>';
										echo " Categoria-> $final <br>";  
									}*/
?>
	<div class="row">    	
    				<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 selectores cate">	
						<select name="marca" onchange="location = this.value;" id="cate">
							
						</select>
					</div>	
					<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 selectores marc">
						<select name="producto" onchange="location = this.value;" id="marc">
															
						</select>
     				</div>	
					<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 selectores busc">
							<?php get_search_form(); ?>						
     				</div>						
     				<?php $link1 = get_parametro_carrusel(1,'Boton'); //echo 'link1'.$link1.'-------';?>
     				<?php $link2 = get_parametro_carrusel(2,'Boton'); //echo 'link2'.$link2.'-------';?>
     				<?php $link3 = get_parametro_carrusel(3,'Boton'); //echo 'link3'.$link3.'-------';?>
     				<?php $link4 = get_parametro_carrusel(4,'Boton'); //echo 'link4'.$link4.'-------';?>
     				
     				<?php $titulo1 = get_parametro_carrusel(1,'TituloA'); //echo 'titulo1'.$titulo1.'------';?>
     				<?php $titulo2 = get_parametro_carrusel(2,'TituloA'); //echo 'titulo2'.$titulo2.'------';?>
     				<?php $titulo3 = get_parametro_carrusel(3,'TituloA'); //echo 'titulo3'.$titulo3.'------';?>
     				<?php $titulo4 = get_parametro_carrusel(4,'TituloA'); //echo 'titulo4'.$titulo4.'------';?>
     				
     				<?php $subtitulo1 = get_parametro_carrusel(1,'SubtituloA'); //echo 'subtitulo1'.$subtitulo1.'-----';?>
     				<?php $subtitulo2 = get_parametro_carrusel(2,'SubtituloA'); //echo 'subtitulo2'.$subtitulo2.'-----';?>
     				<?php $subtitulo3 = get_parametro_carrusel(3,'SubtituloA'); //echo 'subtitulo3'.$subtitulo3.'-----';?>
     				<?php $subtitulo4 = get_parametro_carrusel(4,'SubtituloA'); //echo 'subtitulo4'.$subtitulo4.'-----';?>
			
     				<?php $NoPost = 1; 
					$condicion = get_query_var( 'condicion' );
					$vara = get_query_var( 'vara' );  
					$varb = get_query_var( 'varb' );  
					$pag = get_query_var( 'pag' );  
					if($condicion=='CategoríaDef'){ 
						$args = array( 
							'post_type' => 'product',
							'orderby' => 'name',
							'order'   => 'ASC',
							'posts_per_page' => 20, 
							'paged' => $pag,
							'tax_query' => array( 
								'relation' => 'AND', 
								array( 
									'taxonomy' => 'CategoríaDef', 
									'field'    => 'slug', 
									'terms'    => $vara, 
								), 
								array( 
									'taxonomy' => 'Especie', 
									'field'    => 'slug', 
									'terms'    => $varb, 
								), 
							), 
						); 
					} 
					if($condicion=='AND'){ 
						$args = array( 
							'post_type' => 'product',
							'orderby' => 'name',
							'order'   => 'ASC',
							'posts_per_page' => 20, 
							'paged' => $pag,
							'tax_query' => array( 
								'relation' => 'AND', 
								array( 
									'taxonomy' => 'Especie', 
									'field'    => 'slug', 
									'terms'    => $vara, 
								), 
								array( 
									'taxonomy' => 'Marca', 
									'field'    => 'slug', 
									'terms'    => $varb, 
								), 
							), 
						); 
					} 
					if($condicion=='NA'){ 
						$args = array( 
							'post_type' => 'product', 
							'orderby' => 'name',
							'order'   => 'ASC',
							'posts_per_page' => 20, 
							'paged' => $pag,
							'tax_query' => array( 
								array( 
									'taxonomy' => $vara, 
									'field'    => 'slug', 
									'terms'    => $varb, 
								), 
							), 
						);						
					}
					if($condicion=='B'){
						$contadorDP=0;
						if(!strncasecmp  ($vara, 'Guacales', 5)){
							$vara='Guacal';
							//echo $vara;
						}
						if(!strncasecmp  ($vara, 'concentrados', 5) || !strncasecmp  ($vara, 'alimentos', 5) || !strncasecmp  ($vara, 'comida', 5)){
							$vara='ali-seco';
							//echo $vara;
						}
						if(!strncasecmp  ($vara, 'accesorios', 5)){
							$vara='Accesorios';
							//echo $vara;
						}
						global $wpdb;
						$myposts = $wpdb->get_results( $wpdb->prepare("SELECT * FROM $wpdb->posts WHERE post_title LIKE '%s'", '%'. $wpdb->esc_like( $vara ) .'%') );
						foreach ( $myposts as $mypost ) 
						{
							$contadorDP++;
    					$post = get_post( $mypost );
    //run your output code here
							?>
							<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 tarjetas ">
     					<figure>
     						<?php if (file_exists($_SERVER['DOCUMENT_ROOT']."/fotoscatalogo/".$id.".png")) { ?>
							<img src="http://www.animalhome.co/fotoscatalogo/<?php echo $id; ?>.png" alt="tarjeta" oncontextmenu="alert('Imagen protegida © Copyright 2017');return false" oncopy="alert('Imagen protegida © Copyright 2017');return false">
							<?php }else{ ?>
							<img src="http://www.animalhome.co/fotoscatalogo/NE.png" alt="tarjeta" oncontextmenu="alert('Imagen protegida © Copyright 2017');return false" oncopy="alert('Imagen protegida © Copyright 2017');return false">
							<?php } ?>
							<figcaption> <?php the_title();?> <?php echo 'id= '.$id; ?></figcaption>
						</figure>
						<?php the_excerpt();?>
						<a href="<?php the_permalink() ?>"><button class="boton" type="button"> VER MÁS </button></a>
					</div>
							<?php
						}
						$args = array( 
							'post_type' => 'product', 
							'orderby' => 'name',
							'order'   => 'ASC',
							'posts_per_page' => -1, 
							'tax_query' => array( 
								'relation' => 'OR', 
								array( 
									'taxonomy' => 'CategoríaDef', 
									'field'    => 'slug', 
									'terms'    => $vara, 
								), 
								array( 
									'taxonomy' => 'Marca', 
									'field'    => 'slug', 
									'terms'    => $vara, 
								), 
								array( 
									'taxonomy' => 'Especie', 
									'field'    => 'slug', 
									'terms'    => $vara, 
								), 
							), 
						);		
					}
					$NoPag = paginas($condicion,$vara,$varb);
					$query = new WP_Query( $args );
					?>    
    				 				
     				<?php while ($query -> have_posts()) : $query -> the_post(); ?>
     				<?php 
					$contadorDP++;
					$id = get_the_ID();
					$id = $id - 1000000;
					?>
     				<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 tarjetas ">
     					<figure>
     						<?php if (file_exists($_SERVER['DOCUMENT_ROOT']."/fotoscatalogo/".$id.".png")) { ?>
							<img src="http://www.animalhome.co/fotoscatalogo/<?php echo $id; ?>.png" alt="tarjeta" oncontextmenu="alert('Imagen protegida © Copyright 2017');return false" oncopy="alert('Imagen protegida © Copyright 2017');return false">
							<?php }else{ ?>
							<img src="http://www.animalhome.co/fotoscatalogo/NE.png" alt="tarjeta" oncontextmenu="alert('Imagen protegida © Copyright 2017');return false" oncopy="alert('Imagen protegida © Copyright 2017');return false">
							<?php } ?>
							<figcaption> <?php the_title();?> </figcaption>
						</figure>
						<?php the_excerpt();?>
						<a href="<?php the_permalink() ?>"><button class="boton" type="button"> VER MÁS </button></a>
					</div>
    				<?php if($NoPost == 3){ ?>
    				<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 carousel ">	
						<!-------------------CARRUSEL---------------->
						<div class="owl-carousel owl-theme">
							<div class="item">	
								<figure class="producto">
									<img src="http://www.animalhome.co/carrusel/1.png" alt="<?php echo $titulo1;?>">
								</figure>	
								<h1> <?php echo $titulo1;?> </h1>
								<p> <?php echo $subtitulo1;?> </p>
								<a href="<?php echo $link1; ?>"><button class="boton" type="button"> VER MÁS </button></a>
							</div>
							<div class="item">	
								<figure class="producto">
									<img src="http://www.animalhome.co/carrusel/2.png" alt="<?php echo $titulo2;?>">
								</figure>	
								<h1> <?php echo $titulo2;?> </h1>
								<p> <?php echo $subtitulo2;?> </p>
								<a href="<?php echo $link2; ?>"><button class="boton" type="button"> VER MÁS </button></a>
							</div>
							<div class="item">	
								<figure class="producto">
									<img src="http://www.animalhome.co/carrusel/3.png" alt="<?php echo $titulo3;?>">
								</figure>	
								<h1> <?php echo $titulo3;?> </h1>
								<p> <?php echo $subtitulo3;?> </p>
								<a href="<?php echo $link3; ?>"><button class="boton" type="button"> VER MÁS </button></a>
							</div>
							<div class="item">	
								<figure class="producto">
									<img src="http://www.animalhome.co/carrusel/4.png" alt="<?php echo $titulo4;?>">
								</figure>	
								<h1> <?php echo $titulo4;?> </h1>
								<p> <?php echo $subtitulo4;?> </p>
								<a href="<?php echo $link4; ?>"><button class="boton" type="button"> VER MÁS </button></a>
							</div>
						</div>
						<!-------------------CARRUSEL---------------->
					
					</div>
    				<?php }?>
    				<?php $NoPost = $NoPost +1;  endwhile;?>
     				<?php if($NoPost<3){ ?>
     					<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 carousel" style="margin-bottom: 20%!important; ">	
						<!-------------------CARRUSEL---------------->
						<div class="owl-carousel owl-theme">
							<div class="item">	
								<figure class="producto">
									<img src="<?php echo get_template_directory_uri(); ?>/imagenes/fondos/conejo.png" alt="tarjeta1">
								</figure>	
								<h1> CONVIÉRTETE <br> EN PROVEEDOR </h1>
								<p> Recibe precios exclusivos </p>
								<a href="<?php echo $link4; ?>"><button class="boton" type="button"> VER MÁS </button></a>
							</div>
							<div class="item">
								<figure class="producto">
									<img src="<?php echo get_template_directory_uri(); ?>/imagenes/fondos/conejo.png" alt="tarjeta1">
								</figure>	
								<h1> CONVIÉRTETE <br> EN PROVEEDOR </h1>
								<p> Recibe precios exclusivos </p>
								<a href="<?php echo $link3; ?>"><button class="boton" type="button"> VER MÁS </button></a>
							</div>
							<div class="item">
								<figure class="producto">
									<img src="<?php echo get_template_directory_uri(); ?>/imagenes/fondos/conejo.png" alt="tarjeta1">
								</figure>	
								<h1> CONVIÉRTETE <br> EN PROVEEDOR </h1>
								<p> Recibe precios exclusivos </p>
								<a href="<?php echo $link2; ?>"><button class="boton" type="button"> VER MÁS </button></a>
							</div>
							<div class="item">
								<figure class="producto">
									<img src="<?php echo get_template_directory_uri(); ?>/imagenes/fondos/conejo.png" alt="tarjeta1">
								</figure>	
								<h1> CONVIÉRTETE <br> EN PROVEEDOR </h1>
								<p> Recibe precios exclusivos </p>
								<a href="<?php echo $link1; ?>"><button class="boton" type="button"> VER MÁS </button></a>
							</div>
						</div>
						<!-------------------CARRUSEL---------------->
					
					</div>
     				<?php }?>
     				<?php if($contadorDP==0){?>
					<p>Tu búsqueda de <?php echo $vara; ?> no produjo resultados ¡Prueba con otra palabra!</p>
					<?php 
							mail('mainteamagency@gmail.com','Búsqueda no encontrada',$vara);
											}?>
     				<?php if($NoPag>=1){ $PagNo=1;?>
     				<!--<div class="pc-centrado-grande tb-centrado-grande mv-centrado-grande ">
     				<select name="paginas" onchange="location = this.value;">
							<option value="0"> <strong> PÁGINA </strong> </option>
     				<?php while($PagNo<=$NoPag){
     					echo '<option value="http://www.animalhome.co/catalogo/?condicion='.$condicion.'&vara='.$vara.'&varb='.$varb.'&pag='.$PagNo.'">'.$PagNo.'</option>';
						$PagNo++;
     				 }?>
     				</select>
     				</div>-->
     	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    		<div class="pc-centrado-grande tb-centrado-grande mv-centrado-grande ">
    			<!--	<?php echo $pag.'-'.$NoPag.'-'.$NoPost; ?>-->
     				<?php if($pag==1&&($NoPag>1)){ ?>
     				<section>
						<nav role="navigation" style="margin-bottom: 5%!important; margin-top: 5%!important;">
							<ul class="cd-pagination animated-buttons custom-icons">
								<li class="button"><a href="http://www.animalhome.co/catalogo/?condicion=<?php echo $condicion; ?>&vara=<?php echo $vara; ?>&varb=<?php echo $varb; ?>&pag=<? echo $NoPag; ?>"><i>Anterior</i></a></li>
								<li class="button"><a href="http://www.animalhome.co/catalogo/?condicion=<?php echo $condicion; ?>&vara=<?php echo $vara; ?>&varb=<?php echo $varb; ?>&pag=<? echo $pag+1; ?>"><i>Siguiente</i></a></li>
							</ul>
						</nav> <!-- cd-pagination-wrapper -->
					</section>
     				<?php }?>     				
     				<?php if(($pag>1)&&($pag<$NoPag)&&($NoPost)){ ?>
     				<section >
						<nav role="navigation" style="margin-bottom: 5%!important; margin-top: 5%!important;">
							<ul class="cd-pagination animated-buttons custom-icons">
								<li class="button"><a href="http://www.animalhome.co/catalogo/?condicion=<?php echo $condicion; ?>&vara=<?php echo $vara; ?>&varb=<?php echo $varb; ?>&pag=<? echo $pag-1; ?>"><i>Anterior</i></a></li>
								<li class="button"><a href="http://www.animalhome.co/catalogo/?condicion=<?php echo $condicion; ?>&vara=<?php echo $vara; ?>&varb=<?php echo $varb; ?>&pag=<? echo $pag+1; ?>"><i>Siguiente</i></a></li>
							</ul>
						</nav> <!-- cd-pagination-wrapper -->
					</section>
     				<?php }?>
     				<?php if((($pag==$NoPag)||($pag>$NoPag)) && ($NoPag>1) ){ ?>
     				<section>
						<nav role="navigation" style="margin-bottom: 5%!important; margin-top: 5%!important;">
							<ul class="cd-pagination animated-buttons custom-icons">
								<li class="button"><a href="http://www.animalhome.co/catalogo/?condicion=<?php echo $condicion; ?>&vara=<?php echo $vara; ?>&varb=<?php echo $varb; ?>&pag=<? echo $pag-1; ?>"><i>Anterior</i></a></li>
								<li class="button"><a href="http://www.animalhome.co/catalogo/?condicion=<?php echo $condicion; ?>&vara=<?php echo $vara; ?>&varb=<?php echo $varb; ?>&pag=<? echo 1; ?>"><i>Siguiente</i></a></li>
							</ul>
						</nav> <!-- cd-pagination-wrapper -->
					</section>
     				<?php }?>
     				
			</div>
		</div>
     				<?php }?>
     				
     				
     				 <?php 	
						
						/*//Inicializar el arreglo
						$datos = array ();		
						$args = array( 
							'post_type' => 'product', 
							'orderby' => 'name',
							'order'   => 'ASC',
							'posts_per_page' => -1, 
							'tax_query' => array( 
								array( 
									'taxonomy' => 'Especie', 
									'field'    => 'slug', 
									'terms'    => $varb, 
								), 
							), 
						);		
						$query = new WP_Query($args);
						$i = 1;
						while ($query -> have_posts() && $i<=580) {
							$terms = get_the_terms($post->ID,'CategoríaDef'); 
							foreach ( $terms as $term ) {
								$term_link = get_term_link( $term, 'CategoríaDef' );
								$datos[$i] = $term->name;
								//echo $datos[$i];
								$i++;
								$query -> the_post();
							}
						}*/
						/*$resultado = menus('Categoria',$condicion,$vara,$varb);
						foreach ($resultado as $final){
							echo " Categoria-> $final <br>"; 
						}
						$resultado = menus('Marca',$condicion,$vara,$varb);
						foreach ($resultado as $final){
							echo " Marca-> $final <br>"; 
						}
						for ($i = 0; $i <= 580; $i++) {
							$datos[$i] = $query -> the_post();
							echo "$datos[$i] $i <br>";	
							 echo $term->name;
							$query -> the_post();
						}							
						if(is_array($terms) || is_object($terms)){
							foreach ( $terms as $term ) {								
								$theCount = (int) $term->count;
							}							
							echo "En total hay $theCount productos de $varb <br>";
							while ($query -> have_posts()){								//Recorrer arreglo y guardar información
								for ($i = 1; $i <= $theCount; $i++) {
										$datos[$i] = $query -> the_post();
										echo "$datos[$i] $i <br>";										
										$query -> the_post();
								}								
							}							
							//Llamar la función y pasarle el archivo para que retorne la información deseada
							$resultado = informacion($datos);
							foreach ($resultado as $final){
								echo "$final <br> producto final"; 
							}
						}*/
		
		?>
		
					
</div>
</div>
	<?php get_footer(); ?>