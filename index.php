<?php
	include "_inc/config.php";
	include "partials/header.php";
	include "partials/sidebar.php";
?>

	<div class="span-9">		
		<h1>Výpredaj!</h1>
		<p>
			Aktuálne prebieha vianočna akcia! Všetky produkty sú zľavnené o 10%!
		</p>
		<h3>Toto sú naše top produkty!</h3>
		<div class="container">
			<ul class="items">
				<?php
					$sql = "SELECT nazov, popisproduktu, cena, img, urlnazov FROM `projektdatart` WHERE znacka='philips' LIMIT 25,9;";
					$products = $DB->prepare($sql);
					$products->execute();
					$index_products = $products->fetchAll(PDO::FETCH_OBJ);
					foreach ($index_products as $product) {
				?>
					<li class="item">
						<a class="card" href="product_details.php?produkt=<?= $product->urlnazov ?>">
							<div class="card-img" href="product_details.php?produkt=<?= $product->urlnazov ?>">
								<img  src='<?= $product->img ?>' alt="<?= $product->nazov ?>"/>
							</div>
							<div class="card-inf">
								<h5 class="card-name"><?= $product->nazov ?></h5>
								<div class="card-buy">
									<div class="red"><?= $product->cena ?>€</div>
									<div class="blue" >
										Pridať do košíka
									</div>
								</div>
							</div>
						</a>
					</li>
				<?php } ?>
			</ul>		
		</div>
	</div>

	
<?php 
	include "partials/footer.php";
?>