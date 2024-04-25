<?php
	$request = strtok($_SERVER['REQUEST_URI'], "?");
	$request = explode("/", $request);
	$kat = $request[1];
	$katExplode = explode("_", $kat);
	$k1 = $katExplode[0];
	$sql = "SELECT DISTINCT kategoria, urlkategoria FROM knihy WHERE urlkategoria ='$k1';";
	$kategorie = $DB->prepare($sql);
	$kategorie->execute();
	$kategorie = $kategorie->fetch(PDO::FETCH_OBJ);
	$k1 = $kategorie->kategoria;
	$k1_url = $kategorie->urlkategoria;
	

	if (isset($katExplode[1])) {
		$pagenum = $katExplode[1];
	}else{
		$pagenum = 1;
	}

	include "partials/header.php";
	include "partials/sidebar.php";

?>
<div class="span-9">
	<h1>Naše <?php echo $k1 ?></h1>
	
	<div class="container">
		<ul class="items">
			<?php 
				$k1 ? $sql = "SELECT COUNT(kategoria) AS NumberOfProducts FROM knihy WHERE kategoria ='$k1';" : $sql = "SELECT COUNT(nazov) AS NumberOfProducts FROM knihy WHERE nazov LIKE '% $srch %';";
				$countProducts = $DB->prepare($sql);
				$countProducts->execute();
				$countPro = $countProducts->fetchAll(PDO::FETCH_OBJ);
				$numberOfProducts = $countPro[0]->NumberOfProducts;
				$selectitems = $pagenum * 24 - 24;
				$k1 ? $sql = "SELECT nazov, autor, cena, obrazok, urlnazov, urlkategoria FROM `knihy` WHERE kategoria ='$k1' LIMIT $selectitems, 24;" : $sql = "SELECT nazov, autor, cena, obrazok FROM `knihy` WHERE nazov LIKE '% $srch %' LIMIT $selectitems, 24;";
				$products = $DB->prepare($sql);
				$products->execute();
				$index_products = $products->fetchAll(PDO::FETCH_OBJ);
				foreach ($index_products as $pkt) {
			?>
					<li class="item">
						<div class="card">
							<a class="card-img" href="/index.php/<?= $pkt->urlkategoria ?>/<?= $pkt->urlnazov ?>">
								<img  src='<?= $pkt->obrazok ?>' alt="<?= $pkt->nazov ?>"/>
							</a>
							<div class="card-inf">
								<h5 class="card-name">
									<a href="/index.php/<?= $pkt->urlkategoria ?>/<?= $pkt->urlnazov ?>"><?= $pkt->nazov ?></a>
								</h5>
								<div class="card-buy">
									<a class="red" href="/index.php/<?= $pkt->urlkategoria ?>/<?= $pkt->urlnazov ?>"><?= $pkt->cena ?>€</a>
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
				$pagiFirst = ceil($numberOfProducts/24) == 1 ?  1 : 2;
				for ($i=1; $i <= $pagiFirst; $i++) {
					$class = $pagenum == $i ? 'pagiBtn-active' : '';
					$url = $k1_url . '_' . $i;
					echo $k1 ? "<a class='pagiBtn $class' href='index.php/$url'>$i</a>" : "<a class='pagiBtn $class' href='produkty.php?p_n=$i&srch=$srch'>$i</a>";
				}
				echo $pagenum > 4 ? "<span class='dots'>. . .</span>": "";
				for ($i=($pagenum - 1); $i <= ($pagenum + 1); $i++) {
					$class = $pagenum == $i ? 'pagiBtn-active' : '';
					$url = $k1_url . '_' . $i;
					if ($i > 2 && $i < ceil($numberOfProducts/24) - 1) {
						echo $k1 ? "<a class='pagiBtn $class' href='index.php/$url'>$i</a>" : "<a class='pagiBtn $class' href='produkty.php?p_n=$i&srch=$srch'>$i</a>";
					}
				}
				echo $pagenum < (ceil($numberOfProducts/24)- 3 ) ? "<span class='dots'>. . .</span>": "";
				for ($i=(ceil($numberOfProducts/24) - 1); $i <= ceil($numberOfProducts/24); $i++) {
					$class = $pagenum == $i ? 'pagiBtn-active' : '';
					$url = $k1_url . '_' . $i;
					if($i > 2) echo $k1 ? "<a class='pagiBtn $class' href='index.php/$url'>$i</a>" : "<a class='pagiBtn $class' href='produkty.php?p_n=$i&srch=$srch'>$i</a>";
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