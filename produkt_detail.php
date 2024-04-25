<?php
	$request = strtok($_SERVER['REQUEST_URI'], "?");
	$request = explode("/", $request);
	$url_produkt = $request[2];

	if (isset($url_produkt)) {		
		$sql = "SELECT nazov, autor, kategoria, informacieoknihe, cena, obrazok, urlkategoria FROM `knihy` WHERE urlnazov LIKE '%$u_p%' LIMIT 1";
		$produkt = $DB->prepare($sql);
		$produkt->execute();
		$zvoleny_produkt = $produkt->fetchAll(PDO::FETCH_OBJ);
	}else{
		echo "oppa";
	}

	include "partials/header.php";
?>
<main class="main-page">
	<div class="product">
		<div class="product-path">
			<ul>
				<li><a href="/">Domov</a><span>   /</span></li>
				<li><a href="/<?= $zvoleny_produkt[0]->urlkategoria ?>_1"><?= $zvoleny_produkt[0]->kategoria ?></a><span>   /</span></li>
				<li class="active"><p><?= $zvoleny_produkt[0]->nazov ?></p></li>
			</ul>	
		</div>
		
		<div class="product-details">
			<?php 
				foreach ($zvoleny_produkt as $produktik) {
				?> 
				<div class="span-3">
					<a href="" title="">
						<img src="<?= $produktik->obrazok ?>" style="width:100%" alt="<?= $produktik->nazov ?>"/>
					</a>
					
				</div>
				<div class="span-6">
						<h1><?= $produktik->nazov ?></h1>
						<?= $produktik->informacieoknihe ?>
						<div class="">
							<p class="price"><?= $produktik->cena ?>€</p>
							<button type="" class=""> Pridať do košíka</button>
						</div>
				</div>
				<?php	}?>
		</div>
	</div>
<?php
	include "partials/footer.php";

?>