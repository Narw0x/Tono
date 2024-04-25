<?php
	$sql = "SELECT DISTINCT kategoria, urlkategoria FROM `knihy` ";
	$kategorie = $DB->prepare($sql);
	$kategorie->execute();
	$kategorie = $kategorie->fetchAll(PDO::FETCH_OBJ);

?>


<main class="main-page">
	<div class="span-3">
		<div class="container">
			<ul class="items">
				<?php 
					foreach ($kategorie as $kat){
						$active = $k1 == $kat->kategoria ? "active" : "";
						
				?>
					
					<li class="item sidebar <?php echo $active ?>"><a href="/index.php/<?php echo $kat->urlkategoria ?>_1"><?php echo $kat->kategoria ?></a>
						
					</li>
				<?php 
					if ($kat->kategoria != "Knihy o databázach") {
						echo "<hr>";
					}
				}  
				?>
			</ul>
		</div>
	</div>