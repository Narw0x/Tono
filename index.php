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
					$sql = "SELECT nazov, popisproduktu, cena, img, urlnazov FROM `projektdatart` LIMIT 0,30;";
					$pkty = $DB->prepare($sql);
					$pkty->execute();
					$pkty = $pkty->fetchAll(PDO::FETCH_OBJ);
					foreach ($pkty as $pkt) {
				?>
					<li class="item">
						<div class="card">
							<a class="card-img" href="produkt_detail.php?produkt=<?= $pkt->urlnazov ?>">
								<img  src='<?= $pkt->img ?>' alt="<?= $pkt->nazov ?>"/>
							</a>
							<div class="card-inf">
								<h5 class="card-name">
									<a href="produkt_detail.php?produkt=<?= $pkt->urlnazov ?>"><?= $pkt->nazov ?></a>
								</h5>
								<div class="card-buy">
									
									<a class="red" href="produkt_detail.php?produkt=<?= $pkt->urlnazov ?>">
											<?= $pkt->cena ?>€
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