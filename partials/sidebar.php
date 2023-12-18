<?php
	$sql = "SELECT DISTINCT kategoria FROM `projektdatart` ";
	$kategorie = $DB->prepare($sql);
	$kategorie->execute();
	$kategorie = $kategorie->fetchAll(PDO::FETCH_OBJ);
	$pole_kategorii = array();
	foreach ($kategorie as $kategoria) {
		$kategoria = $kategoria->kategoria;
		$nase_kategorie = explode(" | ", $kategoria);
		$hlavna_kategoria = $nase_kategorie[0];
		if (!in_array($hlavna_kategoria, $pole_kategorii)){
			$pole_kategorii[] = $hlavna_kategoria;
		}
	}
	//<ul class="subitem" >
	// <li><a href=""><?=  $nase_kategorie[1] </a></li>
	// </ul>

?>


<main class="main-page">
	<div class="span-3">
		<div class="container">
			<ul class="items">
				<?php 
					foreach ($pole_kategorii as $hlavna_kategoria) {
						$sql = "SELECT DISTINCT kategoria FROM `projektdatart` WHERE kategoria LIKE '$hlavna_kategoria%'";
						$kategorie = $DB->prepare($sql);
						$kategorie->execute();
						$kategorie = $kategorie->fetchAll(PDO::FETCH_OBJ);
					if ($hlavna_kategoria == "Smart hodinky") {
						
					}else{
						?><hr><?php
					}
				?>
					
					<li class="item"><a><?=  $hlavna_kategoria ?></a>
						<ul class="subitem" >
						<?php 
							$podkategorie = array();
							foreach ($kategorie as $kategoria) {
								$kategoria = $kategoria->kategoria;
								$nase_kategorie = explode(" | ", $kategoria);
								if (!in_array($nase_kategorie[1], $podkategorie)){
									$podkategorie[] = $nase_kategorie[1];
								}
							}
							foreach ($podkategorie as $podkategoria) {
								?>
									<li><a href=""><?=  $podkategoria ?></a></li>
							<?php } ?>
						</ul>
					</li>
				<?php }  ?>
			</ul>
		</div>
	</div>