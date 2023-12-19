<?php
	include "_inc/config.php";
	include "partials/header.php";
	include "partials/sidebar.php";

	$pagenum = 0;

?>
<div class="span-9">
	<h1>Naše produkty</h1>

	<div class="container">
		<ul class="items">
			<?php
				$selectitems = $pagenum * 9;
				if (isset($_GET['kategoria'])) {
					if (isset($_GET['subkategoria'])) {
						$kategoria = $_GET['kategoria'];
						$subkategoria = $_GET['subkategoria'];
						$sql = "SELECT nazov, popisproduktu, cena, img, urlnazov FROM `projektdatart` WHERE kategoria LIKE '$kategoria | $subkategoria%' LIMIT $selectitems,9;";
					}else{
						$kategoria = $_GET['kategoria'];
						$sql = "SELECT nazov, popisproduktu, cena, img, urlnazov FROM `projektdatart` WHERE kategoria LIKE '$kategoria%' LIMIT $selectitems,9;";
					}
				}
					$products = $DB->prepare($sql);
					$products->execute();
					$index_products = $products->fetchAll(PDO::FETCH_OBJ);
					foreach ($index_products as $product) {
					?>
						<li class="item">
							<div class="card">
								<a class="card-img" href="product_details.php?produkt=<?= $product->urlnazov ?>">
									<img  src='<?= $product->img ?>' alt="<?= $produktik->nazov ?>"/>
								</a>
								<div class="card-inf">
									<h5 class="card-name">
										<a href="product_details.php?produkt=<?= $product->urlnazov ?>"><?= $product->nazov ?></a>
									</h5>
									<div class="card-buy">
										
										<a class="red" href="product_details.php?produkt=<?= $product->urlnazov ?>">
											<?= $product->cena ?>€
										</a>
										<a class="blue" href="#">
											Pridať do košíka
										</a>
									</div>
								</div>
							</div>
						</li>
					<?php } ?>
			</ul>
		</div>
	</div>
<?php
	include "partials/footer.php";

?>
