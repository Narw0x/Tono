<?php
	include "_inc/config.php";
	include "partials/header.php";
	$p_n = $_GET['p_n'] ?? 0;
	include "partials/sidebar.php";
	$pole_k = [];
	$pole_k_sql = [];
	$sql_k = "";
?>
<div class="span-9">
	<h1>Naše produkty</h1>
	<?php 
		$url_k = $_SERVER['QUERY_STRING'];
		$url_k_p = explode("&", $url_k); 
		foreach ($url_k_p as $z){
			if (substr($z, 0, 1) == "k")
			  $pole_k_sql[] = urldecode(explode("=", $z)[1]);
			if(substr($z, 0, 4) == "srch")
				$srch = urldecode(explode("=", $z)[1]);
		};
		echo $srch ? "<h3>Vyhľadávanie: $srch</h3>" : "";
		$p_k = count($pole_k_sql);
		for ($i=0; $i <= $p_k; $i++)$polia_k[] = [];
		$sql_k = implode(" | ", $pole_k_sql);
		if($sql_k){
			$sql = "SELECT DISTINCT kategoria FROM `projektdatart` WHERE kategoria LIKE '$sql_k%'";
			$k_v = $DB->prepare($sql);
			$k_v->execute();
			$k_v = $k_v->fetchAll(PDO::FETCH_OBJ);
			foreach($k_v as $k){
				$k = $k->kategoria;
				$pod_k = explode(" | ", $k)[$p_k];
				if((!in_array($pod_k, $polia_k[$p_k-1])) && ($pod_k != "")){$polia_k[$p_k-1][] = $pod_k;$j_p = true;}
			}
		}
		if($j_p){ ?>
			<div class="container-categories">
				<ul class="items">
				<?php 	
					foreach ($polia_k[$p_k-1] as $k_s) { ?>
						<li class="item"><a href="produkty.php?pn=0&<?php echo $url_k; echo "&";  echo "k".($p_k+1)."=".$k_s;?>"><?= $k_s ?></a></li>
				<?php	} ?>	
				</ul>
			</div>
	<?php } ?>
	<div class="container">
		<ul class="items">
			<?php
				$v_p = $p_n * 30;
				$sql_k ?  $sql = "SELECT nazov, popisproduktu, cena, img, urlnazov FROM `projektdatart` WHERE kategoria LIKE '$sql_k%' LIMIT $v_p,30;" : $sql = "SELECT nazov, popisproduktu, cena, img, urlnazov FROM `projektdatart` LIMIT $v_p,30;";
				if($srch) $sql = "SELECT nazov, popisproduktu, cena, img, urlnazov FROM `projektdatart` WHERE nazov LIKE '%$srch%' LIMIT $v_p,30;";
				$pkty = $DB->prepare($sql);
				$pkty->execute();
				$pkty = $pkty->fetchAll(PDO::FETCH_OBJ);
				foreach ($pkty as $pkt) { ?>
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
									<a class="red" href="produkt_detail.php?produkt=<?= $pkt->urlnazov ?>"><?= $pkt->cena ?>€</a>
									<a class="blue" href="#">Pridať do košíka</a>
								</div>
							</div>
						</div>
					</li>
				<?php } ?>
			</ul>
		</div>
	</div>
<?php include "partials/footer.php";?> 