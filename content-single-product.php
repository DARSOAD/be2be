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
							<option value="0"> <strong> CATEGORÍA </strong> </option>
							<?php if($vara=='dog' || $varb=='dog'){
								echo '<option value="http://www.animalhome.co/catalogo/?condicion=CategoríaDef&vara=accesorios&varb=dog&pag=1">Accesorios</option>			
								<option value="http://www.animalhome.co/catalogo/?condicion=CategoríaDef&vara=ali-humedo&varb=dog&pag=1">Alimento Húmedo</option>
								<option value="http://www.animalhome.co/catalogo/?condicion=CategoríaDef&vara=ali-seco&varb=dog&pag=1">Alimento Seco</option>
								<option value="http://www.animalhome.co/catalogo/?condicion=CategoríaDef&vara=higiene-y-belleza&varb=dog&pag=1">Higiene y Belleza</option>
								<option value="http://www.animalhome.co/catalogo/?condicion=CategoríaDef&vara=huesos&varb=dog&pag=1">Huesos</option>
								<option value="http://www.animalhome.co/catalogo/?condicion=CategoríaDef&vara=molidos&varb=dog&pag=1">Molidos</option>
								<option value="http://www.animalhome.co/catalogo/?condicion=CategoríaDef&vara=snacks&varb=dog&pag=1">Snacks</option>
								<option value="http://www.animalhome.co/catalogo/?condicion=CategoríaDef&vara=suplementos&varb=dog&pag=1">Suplementos</option>
								<option value="http://www.animalhome.co/catalogo/?condicion=CategoríaDef&vara=veterinarios&varb=dog&pag=1">Veterinarios</option>';
					   	 	} 
							if($vara=='cat' || $varb=='cat'){
								echo '<option value="http://www.animalhome.co/catalogo/?condicion=CategoríaDef&vara=accesorios&varb=cat&pag=1">Accesorios </option>			
								<option value="http://www.animalhome.co/catalogo/?condicion=CategoríaDef&vara=ali-humedo&varb=cat&pag=1">Alimento Húmedo</option>
								<option value="http://www.animalhome.co/catalogo/?condicion=CategoríaDef&vara=ali-seco&varb=cat&pag=1">Alimento Seco </option>
								<option value="http://www.animalhome.co/catalogo/?condicion=CategoríaDef&vara=arenas&varb=cat&pag=1">Arenas </option>
								<option value="http://www.animalhome.co/catalogo/?condicion=CategoríaDef&vara=higiene-y-belleza&varb=cat&pag=1">Higiene y Belleza </option>
								<option value="http://www.animalhome.co/catalogo/?condicion=CategoríaDef&vara=snaks&varb=cat&pag=1">Snaks</option>
								<option value="http://www.animalhome.co/catalogo/?condicion=CategoríaDef&vara=suplementos&varb=cat&pag=1">Suplementos</option>
								<option value="http://www.animalhome.co/catalogo/?condicion=CategoríaDef&vara=veterinarios&varb=cat&pag=1">Veterinarios </option>';
						} if($vara=='ave' || $varb=='ave'){
								echo '<option value="http://www.animalhome.co/catalogo/?condicion=CategoríaDef&vara=accesorios&varb=ave&pag=1">Accesorios </option>
								<option value="http://www.animalhome.co/catalogo/?condicion=CategoríaDef&vara=ali-seco&varb=ave&pag=1">Alimento Seco </option>
								<option value="http://www.animalhome.co/catalogo/?condicion=CategoríaDef&vara=semillas&varb=ave&pag=1">Semillas </option>
								<option value="http://www.animalhome.co/catalogo/?condicion=CategoríaDef&vara=veterinarios&varb=ave&pag=1">Veterinarios</option>';
						} 
							if($vara=='con' || $varb=='con'){ 
								echo '<option value="http://www.animalhome.co/catalogo/?condicion=CategoríaDef&vara=accesorios&varb=roe&pag=1">Accesorios </option>	
								<option value="http://www.animalhome.co/catalogo/?condicion=CategoríaDef&vara=semillas&varb=roe&pag=1">Semillas </option>';	
							} 
							if($vara=='pez' || $varb=='pez'){ 
								echo '<option value="http://www.animalhome.co/catalogo/?condicion=CategoríaDef&vara=ali-seco&varb=pez&pag=1">Alimento Seco </option>
								<option value="http://www.animalhome.co/catalogo/?condicion=CategoríaDef&vara=higiene-y-belleza&varb=pez&pag=1">Higiene y Belleza </option>';
							} 
								if($vara=='roe' || $varb=='roe'){ 
									echo '<option value="http://www.animalhome.co/catalogo/?condicion=CategoríaDef&vara=ali-seco&varb=con&pag=1">Alimento Seco </option>';
								} 
							?>
						</select>
					</div>	
					<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 selectores marc">
						<select name="producto" onchange="location = this.value;" id="marc">
							<option value="0"> <strong> MARCA </strong> </option>
							<?php 
								if($vara=='dog' || $varb=='dog'){ 
									echo '<option value="http://www.animalhome.co/catalogo/?condicion=AND&vara=dog&varb=animal-home&pag=1">Animal Home </option>
									<option value="http://www.animalhome.co/catalogo/?condicion=AND&vara=dog&varb=activyl&pag=1">Activyl </option>
									<option value="http://www.animalhome.co/catalogo/?condicion=AND&vara=dog&varb=advantage&pag=1">Advantage </option>
									<option value="http://www.animalhome.co/catalogo/?condicion=AND&vara=dog&varb=advantix&pag=1">Advantix </option>
									<option value="http://www.animalhome.co/catalogo/?condicion=AND&vara=dog&varb=advocate&pag=1">Advocate </option>
									<option value="http://www.animalhome.co/catalogo/?condicion=AND&vara=dog&varb=agility-gold&pag=1">Agility Gold </option>
									<option value="http://www.animalhome.co/catalogo/?condicion=AND&vara=dog&varb=alernex&pag=1">Alernex </option>
									<option value="http://www.animalhome.co/catalogo/?condicion=AND&vara=dog&varb=amigo-fresh&pag=1">Amigo Fresh </option>
									<option value="http://www.animalhome.co/catalogo/?condicion=AND&vara=dog&varb=animal-planet&pag=1">Animal Palnet </option>
									<option value="http://www.animalhome.co/catalogo/?condicion=AND&vara=dog&varb=apa&pag=1">Apa </option>
									<option value="http://www.animalhome.co/catalogo/?condicion=AND&vara=dog&varb=asarnyl&pag=1">Asarnyl </option>
									<option value="http://www.animalhome.co/catalogo/?condicion=AND&vara=dog&varb=asuntol&pag=1">Asuntol </option>
									<option value="http://www.animalhome.co/catalogo/?condicion=AND&vara=dog&varb=baxidin&pag=1">Baxidin </option>
									<option value="http://www.animalhome.co/catalogo/?condicion=AND&vara=dog&varb=br-for&pag=1">Br For </option>
									<option value="http://www.animalhome.co/catalogo/?condicion=AND&vara=dog&varb=brillo&pag=1">Brillo </option>
									<option value="http://www.animalhome.co/catalogo/?condicion=AND&vara=dog&varb=bolfo&pag=1">Bolfo </option>
									<option value="http://www.animalhome.co/catalogo/?condicion=AND&vara=dog&varb=canami&pag=1">Canami </option>
									<option value="http://www.animalhome.co/catalogo/?condicion=AND&vara=dog&varb=canamor&pag=1">Canamor </option>
									<option value="http://www.animalhome.co/catalogo/?condicion=AND&vara=dog&varb=canatox&pag=1">Canatox </option>
									<option value="http://www.animalhome.co/catalogo/?condicion=AND&vara=dog&varb=canisan&pag=1">Canisan </option>
									<option value="http://www.animalhome.co/catalogo/?condicion=AND&vara=dog&varb=capstar&pag=1">Capstar </option>
									<option value="http://www.animalhome.co/catalogo/?condicion=AND&vara=dog&varb=chunky&pag=1">Chunky </option>
									<option value="http://www.animalhome.co/catalogo/?condicion=AND&vara=dog&varb=cipa&pag=1">Cipa </option>
									<option value="http://www.animalhome.co/catalogo/?condicion=AND&vara=dog&varb=comfortis&pag=1">Comfortis </option>
									<option value="http://www.animalhome.co/catalogo/?condicion=AND&vara=dog&varb=dentyfarm&pag=1">Dentyfarm </option>
									<option value="http://www.animalhome.co/catalogo/?condicion=AND&vara=dog&varb=diciclin&pag=1">Diciclin </option>
									<option value="http://www.animalhome.co/catalogo/?condicion=AND&vara=dog&varb=dinky&pag=1">Dinky </option>
									<option value="http://www.animalhome.co/catalogo/?condicion=AND&vara=dog&varb=dog-chow&pag=1">Dog Chow </option>
									<option value="http://www.animalhome.co/catalogo/?condicion=AND&vara=dog&varb=dogourmet&pag=1">Dogourmet </option>
									<option value="http://www.animalhome.co/catalogo/?condicion=AND&vara=dog&varb=donkan&pag=1">Donkan </option>
									<option value="http://www.animalhome.co/catalogo/?condicion=AND&vara=dog&varb=drontal&pag=1">Drontal </option>
									<option value="http://www.animalhome.co/catalogo/?condicion=AND&vara=dog&varb=electrozoo&pag=1">Electrozoo </option>
									<option value="http://www.animalhome.co/catalogo/?condicion=AND&vara=dog&varb=equilibrio&pag=1">Equilibrio </option>
									<option value="http://www.animalhome.co/catalogo/?condicion=AND&vara=dog&varb=equilibium&pag=1">Equilibrium </option>
									<option value="http://www.animalhome.co/catalogo/?condicion=AND&vara=dog&varb=filpo&pag=1">Filpo </option>
									<option value="http://www.animalhome.co/catalogo/?condicion=AND&vara=dog&varb=frontline&pag=1">Frontline </option>
									<option value="http://www.animalhome.co/catalogo/?condicion=AND&vara=dog&varb=generico&pag=1">Genérico </option>
									<option value="http://www.animalhome.co/catalogo/?condicion=AND&vara=dog&varb=hemavet&pag=1">Hemavet </option>
									<option value="http://www.animalhome.co/catalogo/?condicion=AND&vara=dog&varb=hills&pag=1">Hills </option>
									<option value="http://www.animalhome.co/catalogo/?condicion=AND&vara=dog&varb=italcan&pag=1">Italcan </option>
									<option value="http://www.animalhome.co/catalogo/?condicion=AND&vara=dog&varb=iverdog&pag=1">Iverdog </option>
									<option value="http://www.animalhome.co/catalogo/?condicion=AND&vara=dog&varb=jara-pets&pag=1">Jara Pets </option>
									<option value="http://www.animalhome.co/catalogo/?condicion=AND&vara=dog&varb=lindopel&pag=1">Lindopel </option>	
									<option value="http://www.animalhome.co/catalogo/?condicion=AND&vara=dog&varb=max&pag=1">Max </option>
									<option value="http://www.animalhome.co/catalogo/?condicion=AND&vara=dog&varb=meloxic&pag=1">Meloxic </option>
									<option value="http://www.animalhome.co/catalogo/?condicion=AND&vara=dog&varb=mitra&pag=1">Mitra </option>
									<option value="http://www.animalhome.co/catalogo/?condicion=AND&vara=dog&varb=mr-can&pag=1">Mr Can </option>
									<option value="http://www.animalhome.co/catalogo/?condicion=AND&vara=dog&varb=natural-select&pag=1">Natural Select </option>
									<option value="http://www.animalhome.co/catalogo/?condicion=AND&vara=dog&varb=neguvon&pag=1">Neguvon </option>
									<option value="http://www.animalhome.co/catalogo/?condicion=AND&vara=dog&varb=neocor&pag=1">Neocor </option>
									<option value="http://www.animalhome.co/catalogo/?condicion=AND&vara=dog&varb=neoibp&pag=1">Neoibp </option>
									<option value="http://www.animalhome.co/catalogo/?condicion=AND&vara=dog&varb=neoplex&pag=1">Neoplex </option>
									<option value="http://www.animalhome.co/catalogo/?condicion=AND&vara=dog&varb=nexgard&pag=1">Nexgar </option>
									<option value="http://www.animalhome.co/catalogo/?condicion=AND&vara=dog&varb=nutranuggets&pag=1">Nutranuggets </option>
									<option value="http://www.animalhome.co/catalogo/?condicion=AND&vara=dog&varb=nutre-can&pag=1">Nutre Can </option>
									<option value="http://www.animalhome.co/catalogo/?condicion=AND&vara=dog&varb=nutrion&pag=1">Nutrion </option>
									<option value="http://www.animalhome.co/catalogo/?condicion=AND&vara=dog&varb=nutriss&pag=1">Nutriss </option>
									<option value="http://www.animalhome.co/catalogo/?condicion=AND&vara=dog&varb=orenda&pag=1">Orenda </option>
									<option value="http://www.animalhome.co/catalogo/?condicion=AND&vara=dog&varb=otic&pag=1">Otic </option>
									<option value="http://www.animalhome.co/catalogo/?condicion=AND&vara=dog&varb=oxitetraciclina&pag=1">Oxitetraciclina </option>
									<option value="http://www.animalhome.co/catalogo/?condicion=AND&vara=dog&varb=pedigree&pag=1">Pedigree </option>
									<option value="http://www.animalhome.co/catalogo/?condicion=AND&vara=dog&varb=perrin&pag=1">Perrin </option>
									<option value="http://www.animalhome.co/catalogo/?condicion=AND&vara=dog&varb=petys&pag=1">Petys </option>
									<option value="http://www.animalhome.co/catalogo/?condicion=AND&vara=dog&varb=pompas&pag=1">Pompas </option>
									<option value="http://www.animalhome.co/catalogo/?condicion=AND&vara=dog&varb=premio&pag=1">Premio </option>
									<option value="http://www.animalhome.co/catalogo/?condicion=AND&vara=dog&varb=pulvex&pag=1">Pulvex </option>
									<option value="http://www.animalhome.co/catalogo/?condicion=AND&vara=dog&varb=pop-bites&pag=1">Pop Bites </option>
									<option value="http://www.animalhome.co/catalogo/?condicion=AND&vara=dog&varb=raza&pag=1">Raza </option>
									<option value="http://www.animalhome.co/catalogo/?condicion=AND&vara=dog&varb=ringo&pag=1">Ringo </option>
									<option value="http://www.animalhome.co/catalogo/?condicion=AND&vara=dog&varb=sabueso&pag=1">Sabueso </option>
									<option value="http://www.animalhome.co/catalogo/?condicion=AND&vara=dog&varb=super-can&pag=1">Super Can </option>
									<option value="http://www.animalhome.co/catalogo/?condicion=AND&vara=dog&varb=taste-of-the-wild&pag=1">Taste of the Wild </option>
									<option value="http://www.animalhome.co/catalogo/?condicion=AND&vara=dog&varb=tecnofen&pag=1">Tecnofen </option>
									<option value="http://www.animalhome.co/catalogo/?condicion=AND&vara=dog&varb=tranquilan&pag=1">Tranquilan </option>
									<option value="http://www.animalhome.co/catalogo/?condicion=AND&vara=dog&varb=trifexis&pag=1">Trifexis </option>
									<option value="http://www.animalhome.co/catalogo/?condicion=AND&vara=dog&varb=tuffy&pag=1">Tuffy </option>
									<option value="http://www.animalhome.co/catalogo/?condicion=AND&vara=dog&varb=vermiplex&pag=1">Vermiplex </option>
									<option value="http://www.animalhome.co/catalogo/?condicion=AND&vara=dog&varb=zoo&pag=1">Zoo </option>	';
								}
								if($vara=='cat' || $varb=='cat'){ 
									echo '<option value="http://www.animalhome.co/catalogo/?condicion=AND&vara=cat&varb=animal-home&pag=1">Animal Home </option>
									<option value="http://www.animalhome.co/catalogo/?condicion=AND&vara=cat&varb=adore&pag=1">Adore </option>
									<option value="http://www.animalhome.co/catalogo/?condicion=AND&vara=cat&varb=advantage&pag=1">Advantage </option>
									<option value="http://www.animalhome.co/catalogo/?condicion=AND&vara=cat&varb=advocate&pag=1">Advocate </option>
									<option value="http://www.animalhome.co/catalogo/?condicion=AND&vara=cat&varb=agility-gold&pag=1">Agility Gold </option>
									<option value="http://www.animalhome.co/catalogo/?condicion=AND&vara=cat&varb=alernex&pag=1">Alernex </option>
									<option value="http://www.animalhome.co/catalogo/?condicion=AND&vara=cat&varb=animal-planet&pag=1">Animal Palnet </option>
									<option value="http://www.animalhome.co/catalogo/?condicion=AND&vara=cat&varb=baby-cat&pag=1">Baby Cat </option>
									<option value="http://www.animalhome.co/catalogo/?condicion=AND&vara=cat&varb=baxidin&pag=1">Baxidin </option>
									<option value="http://www.animalhome.co/catalogo/?condicion=AND&vara=cat&varb=br-for&pag=1">Br For </option>
									<option value="http://www.animalhome.co/catalogo/?condicion=AND&vara=cat&varb=brillo&pag=1">Brillo </option>
									<option value="http://www.animalhome.co/catalogo/?condicion=AND&vara=cat&varb=canada-litter&pag=1">Canada Litter </option>
									<option value="http://www.animalhome.co/catalogo/?condicion=AND&vara=cat&varb=canamor&pag=1">Canamor </option>
									<option value="http://www.animalhome.co/catalogo/?condicion=AND&vara=cat&varb=canisan&pag=1">Canisan </option>
									<option value="http://www.animalhome.co/catalogo/?condicion=AND&vara=cat&varb=capstar&pag=1">Capstar </option>
									<option value="http://www.animalhome.co/catalogo/?condicion=AND&vara=cat&varb=cat-chow&pag=1">Cat Chow </option>
									<option value="http://www.animalhome.co/catalogo/?condicion=AND&vara=cat&varb=cateco&pag=1">Cateco </option>
									<option value="http://www.animalhome.co/catalogo/?condicion=AND&vara=cat&varb=catilicious&pag=1">Catilicious </option>
									<option value="http://www.animalhome.co/catalogo/?condicion=AND&vara=cat&varb=chunky&pag=1">Chunky </option>
									<option value="http://www.animalhome.co/catalogo/?condicion=AND&vara=cat&varb=cipa&pag=1">Cipa </option>
									<option value="http://www.animalhome.co/catalogo/?condicion=AND&vara=cat&varb=cloud9&pag=1">Cloud9 </option>
									<option value="http://www.animalhome.co/catalogo/?condicion=AND&vara=cat&varb=comfortis&pag=1">Comfortis </option>
									<option value="http://www.animalhome.co/catalogo/?condicion=AND&vara=cat&varb=dentyfarm&pag=1">Dentyfarm </option>
									<option value="http://www.animalhome.co/catalogo/?condicion=AND&vara=cat&varb=dinkt&pag=1">Dinky </option>
									<option value="http://www.animalhome.co/catalogo/?condicion=AND&vara=cat&varb=donkat&pag=1">Donkat </option>
									<option value="http://www.animalhome.co/catalogo/?condicion=AND&vara=cat&varb=drontal&pag=1">Drontal </option>
									<option value="http://www.animalhome.co/catalogo/?condicion=AND&vara=cat&varb=electrozoo&pag=1">Electrozoo </option>
									<option value="http://www.animalhome.co/catalogo/?condicion=AND&vara=cat&varb=equilibrio&pag=1">Equilibrio </option>
									<option value="http://www.animalhome.co/catalogo/?condicion=AND&vara=cat&varb=euro-litter&pag=1">Euro Litter </option>
									<option value="http://www.animalhome.co/catalogo/?condicion=AND&vara=cat&varb=fancy-feast&pag=1">Fancy Feast </option>
									<option value="http://www.animalhome.co/catalogo/?condicion=AND&vara=cat&varb=felix&pag=1">Felix </option>
									<option value="http://www.animalhome.co/catalogo/?condicion=AND&vara=cat&varb=fofi-cat&pag=1">Fofi Cat </option>
									<option value="http://www.animalhome.co/catalogo/?condicion=AND&vara=cat&varb=free-miau&pag=1">Free Miau </option>
									<option value="http://www.animalhome.co/catalogo/?condicion=AND&vara=cat&varb=frontline&pag=1">Frontline </option>
									<option value="http://www.animalhome.co/catalogo/?condicion=AND&vara=cat&varb=gatissimo&pag=1">Gatissimo </option>
									<option value="http://www.animalhome.co/catalogo/?condicion=AND&vara=cat&varb=gatisy&pag=1">Gatisy </option>
									<option value="http://www.animalhome.co/catalogo/?condicion=AND&vara=cat&varb=generico&pag=1">Genérico </option>
									<option value="http://www.animalhome.co/catalogo/?condicion=AND&vara=cat&varb=hemavet&pag=1">Hemavet </option>
									<option value="http://www.animalhome.co/catalogo/?condicion=AND&vara=cat&varb=hills&pag=1">Hills </option>
									<option value="http://www.animalhome.co/catalogo/?condicion=AND&vara=cat&varb=jara-pets&pag=1">Jara Pets </option>
									<option value="http://www.animalhome.co/catalogo/?condicion=AND&vara=cat&varb=king-cat&pag=1">King Cat </option>
									<option value="http://www.animalhome.co/catalogo/?condicion=AND&vara=cat&varb=max&pag=1">Max </option>
									<option value="http://www.animalhome.co/catalogo/?condicion=AND&vara=cat&varb=meow-mix&pag=1">Meow Mix </option>
									<option value="http://www.animalhome.co/catalogo/?condicion=AND&vara=cat&varb=minino&pag=1">Minino </option>
									<option value="http://www.animalhome.co/catalogo/?condicion=AND&vara=cat&varb=mirringo&pag=1">Mirringo </option>
									<option value="http://www.animalhome.co/catalogo/?condicion=AND&vara=cat&varb=mitra&pag=1">Mitra </option>
									<option value="http://www.animalhome.co/catalogo/?condicion=AND&vara=cat&varb=nutranuggets&pag=1">Nutranuggets </option>
									<option value="http://www.animalhome.co/catalogo/?condicion=AND&vara=cat&varb=nutre-cat&pag=1">Nutre Cat </option>
									<option value="http://www.animalhome.co/catalogo/?condicion=AND&vara=cat&varb=nutrion&pag=1">Nutrion </option>
									<option value="http://www.animalhome.co/catalogo/?condicion=AND&vara=cat&varb=ohmaigat&pag=1">Ohmaigat </option>
									<option value="http://www.animalhome.co/catalogo/?condicion=AND&vara=cat&varb=orenda&pag=1">Orenda </option>			
									<option value="http://www.animalhome.co/catalogo/?condicion=AND&vara=cat&varb=otic&pag=1">Otic </option>
									<option value="http://www.animalhome.co/catalogo/?condicion=AND&vara=cat&varb=pop-bites&pag=1">Pop Bites </option>
									<option value="http://www.animalhome.co/catalogo/?condicion=AND&vara=cat&varb=q-ida-cat&pag=1">Q Ida Cat </option>
									<option value="http://www.animalhome.co/catalogo/?condicion=AND&vara=cat&varb=select-cat&pag=1">Select Cat </option>
									<option value="http://www.animalhome.co/catalogo/?condicion=AND&vara=cat&varb=smart&pag=1">Smart </option>
									<option value="http://www.animalhome.co/catalogo/?condicion=AND&vara=cat&varb=super-cat&pag=1">Super Cat </option>
									<option value="http://www.animalhome.co/catalogo/?condicion=AND&vara=cat&varb=taste-of-the-wild&pag=1">Taste of the Wild </option>				
									<option value="http://www.animalhome.co/catalogo/?condicion=AND&vara=cat&varb=vermiplex&pag=1">Vermiplex </option>
									<option value="http://www.animalhome.co/catalogo/?condicion=AND&vara=cat&varb=whiskas&pag=1">Whiskas </option>
									<option value="http://www.animalhome.co/catalogo/?condicion=AND&vara=cat&varb=xtreme-catnip&pag=1">Xtreme Catnip </option>
									<option value="http://www.animalhome.co/catalogo/?condicion=AND&vara=cat&varb=zoo&pag=1">Zoo </option>';
								} 
								if($vara=='ave' || $varb=='ave'){ 
									echo '<option value="http://www.animalhome.co/catalogo/?condicion=AND&vara=ave&varb=animal-home&pag=1">Animal Home </option>
									<option value="http://www.animalhome.co/catalogo/?condicion=AND&vara=ave&varb=canamor&pag=1">Canamor </option>
									<option value="http://www.animalhome.co/catalogo/?condicion=AND&vara=ave&varb=cantaxantin&pag=1">Cantaxantin </option>
									<option value="http://www.animalhome.co/catalogo/?condicion=AND&vara=ave&varb=el-galpon&pag=1">El Galpon </option>
									<option value="http://www.animalhome.co/catalogo/?condicion=AND&vara=ave&varb=en-rox&pag=1">En Rox </option>
									<option value="http://www.animalhome.co/catalogo/?condicion=AND&vara=ave&varb=generico&pag=1">Genérico </option>
									<option value="http://www.animalhome.co/catalogo/?condicion=AND&vara=ave&varb=norfloxacin&pag=1">Norfloxacin </option>
									<option value="http://www.animalhome.co/catalogo/?condicion=AND&vara=ave&varb=piamonte&pag=1">Piamonte </option>
									<option value="http://www.animalhome.co/catalogo/?condicion=AND&vara=ave&varb=raza&pag=1">Raza </option>
									<option value="http://www.animalhome.co/catalogo/?condicion=AND&vara=ave&varb=su-despensa&pag=1">Su Despensa </option>
									<option value="http://www.animalhome.co/catalogo/?condicion=AND&vara=ave&varb=vitagrano&pag=1">Vitagrano </option>
									<option value="http://www.animalhome.co/catalogo/?condicion=AND&vara=ave&varb=vitapio&pag=1">Vitapio </option>';
								} 
								if($vara=='con' || $varb=='con'){ 
									echo '<option value="http://www.animalhome.co/catalogo/?condicion=AND&vara=con&varb=generico&pag=1">Genérico </option>
									<option value="http://www.animalhome.co/catalogo/?condicion=AND&vara=con&varb=raza&pag=1">Raza </option>';
								} 
								if($vara=='pez' || $varb=='pez'){ 
									echo '<option value="http://www.animalhome.co/catalogo/?condicion=AND&vara=pez&varb=canamor&pag=1">Canamor </option>
									<option value="http://www.animalhome.co/catalogo/?condicion=AND&vara=pez&varb=incros&pag=1">Incros </option>
									<option value="http://www.animalhome.co/catalogo/?condicion=AND&vara=pez&varb=ocelatus&pag=1">Ocelatus </option>
									<option value="http://www.animalhome.co/catalogo/?condicion=AND&vara=pez&varb=omega&pag=1">Omega </option>
									<option value="http://www.animalhome.co/catalogo/?condicion=AND&vara=pez&varb=prime&pag=1">Prime </option>
									<option value="http://www.animalhome.co/catalogo/?condicion=AND&vara=pez&varb=stability&pag=1">Stability </option>';
								} 
								if($vara=='roe' || $varb=='roe'){ 
									echo '<option value="http://www.animalhome.co/catalogo/?condicion=AND&vara=roe&varb=animal-home&pag=1">Animal Home </option>
									<option value="http://www.animalhome.co/catalogo/?condicion=AND&vara=roe&varb=piamonte&pag=1">Piamonte </option>';
								} 
							?>							
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
						$id = get_the_ID();
						$id = $id - 1000000;
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