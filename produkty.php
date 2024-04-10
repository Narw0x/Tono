<?php
	if (isset($_GET['k1'])){
		$k1 = $_GET['k1'];
	}elseif(isset($_GET['srch'])) {
		$srch = $_GET['srch'];
	}
	$pagenum = $_GET['p_n'] ?? 1;

	include "_inc/config.php";
	include "partials/header.php";
	include "partials/sidebar.php";

?>
<div class="span-9">
	<h1>Naše produkty</h1>
	
	<div class="container">
		<ul class="items">
			<?php 
				$k1 ? $sql = "SELECT COUNT(kategoria) AS NumberOfProducts FROM knihy WHERE kategoria ='$k1';" : $sql = "SELECT COUNT(nazov) AS NumberOfProducts FROM knihy WHERE nazov LIKE '% $srch %';";
				$countProducts = $DB->prepare($sql);
				$countProducts->execute();
				$countPro = $countProducts->fetchAll(PDO::FETCH_OBJ);
				$numberOfProducts = $countPro[0]->NumberOfProducts;
				$selectitems = $pagenum * 24 - 24;
				$k1 ? $sql = "SELECT nazov, autor, cena, obrazok FROM `knihy` WHERE kategoria ='$k1' LIMIT $selectitems, 24;" : $sql = "SELECT nazov, autor, cena, obrazok FROM `knihy` WHERE nazov LIKE '% $srch %' LIMIT $selectitems, 24;";
				$products = $DB->prepare($sql);
				$products->execute();
				$index_products = $products->fetchAll(PDO::FETCH_OBJ);
				foreach ($index_products as $pkt) {
			?>
					<li class="item">
						<div class="card">
							<a class="card-img" href="produkt_detail.php?produkt=<?= $pkt->nazov ?>">
								<img  src='<?= $pkt->obrazok ?>' alt="<?= $pkt->nazov ?>"/>
							</a>
							<div class="card-inf">
								<h5 class="card-name">
									<a href="produkt_detail.php?produkt=<?= $pkt->nazurlnazovov ?>"><?= $pkt->nazov ?></a>
								</h5>
								<div class="card-buy">
									<a class="red" href="produkt_detail.php?produkt=<?= $pkt->urlnazov ?>"><?= $pkt->cena ?>€</a>
									<a class="blue" href="#">Pridať do košíka</a>
								</div>
							</div>
						</div>
					</li>
				<?php } ?>
			</ul>
		</div>
		<div class="pagi">
			
			<?php 
				for ($i=1; $i <= 2; $i++) {
					$class = $pagenum == $i ? 'pagiBtn-active' : '';
					echo $k1 ? "<a class='pagiBtn $class' href='produkty.php?p_n=$i&k1=$k1'>$i</a>" : "<a class='pagiBtn $class' href='produkty.php?p_n=$i&srch=$srch'>$i</a>";
				}
				echo $pagenum > 4 ? "<span class='dots'>. . .</span>": "";
				for ($i=($pagenum - 1); $i <= ($pagenum + 1); $i++) {
					$class = $pagenum == $i ? 'pagiBtn-active' : '';
					if ($i > 2 && $i < ceil($numberOfProducts/24) - 1) {
						echo $k1 ? "<a class='pagiBtn $class' href='produkty.php?p_n=$i&k1=$k1'>$i</a>" : "<a class='pagiBtn $class' href='produkty.php?p_n=$i&srch=$srch'>$i</a>";
					}
				}
				echo $pagenum < (ceil($numberOfProducts/24)- 3 ) ? "<span class='dots'>. . .</span>": "";
				for ($i=(ceil($numberOfProducts/24) - 1); $i <= ceil($numberOfProducts/24); $i++) {
					$class = $pagenum == $i ? 'pagiBtn-active' : '';
					echo $k1 ? "<a class='pagiBtn $class' href='produkty.php?p_n=$i&k1=$k1'>$i</a>" : "<a class='pagiBtn $class' href='produkty.php?p_n=$i&srch=$srch'>$i</a>";
				}


			?>
		</div>
	</div>
<?php include "partials/footer.php";?> 

<script>
  const pagenum = <?php echo $pagenum; ?>;
  window.onload = function() {
    const previousItem = document.getElementById('previous');
    
  };

  const numberOfProducts = <?php echo $numberOfProducts; ?>;
  if (numberOfProducts <= pagenum * 24) {
	document.getElementById('next').classList.add('block');
  }
</script>