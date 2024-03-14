<?php
	$sql = "SELECT DISTINCT kategoria FROM `knihy` ";
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
				?>
					
					<li class="item sidebar"><a href="produkty.php?p_n=0&k1=<?php echo $kat->kategoria ?>"><?php echo $kat->kategoria ?></a>
						
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