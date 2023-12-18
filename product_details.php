<?php
	include "_inc/config.php";
	$url_produkt = $_GET['produkt'];
	if (isset($_GET['produkt'])) {
		
		
	$sql = "SELECT nazov, popisproduktu, cena, img, urlnazov FROM `projektdatart` WHERE urlnazov='$url_produkt' LIMIT 1";
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
				<li><a href="index.php">Domov</a><span>   /</span></li>
				<li><a href="products.php">Produkty</a><span>   /</span></li>
				<li class="active"><p><?php foreach ($zvoleny_produkt as $produktik) echo ($produktik->nazov) ?></p></li>
			</ul>	
		</div>
		
		<div class="product-details">
			<?php 
				foreach ($zvoleny_produkt as $produktik) {
				?> 
				<div class="span-3">
					<a href="" title="">
						<img src="<?= $produktik->img ?>" style="width:100%" alt="<?= $produktik->nazov ?>"/>
					</a>
					
				</div>
				<div class="span-6">
						<h1><?= $produktik->nazov ?></h1>
						<?= $produktik->popisproduktu ?>
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
