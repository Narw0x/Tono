<?php
	$sql = "SELECT DISTINCT kategoria FROM `knihy` ";
	$kategorie = $DB->prepare($sql);
	$kategorie->execute();
	$kategorie = $kategorie->fetchAll(PDO::FETCH_OBJ);

	$_GET['k1'] ? $k1 = $_GET['k1'] : $k1 = "";
?>


<main class="main-page">
	<div class="span-3">
		<div class="container">
			<ul class="items">
				<?php 
					foreach ($kategorie as $kat){
						$active = $k1 == $kat->kategoria ? "active" : "";
						
				?>
					
					<li class="item sidebar <?php echo $active ?>"><a href="produkty.php?p_n=1&k1=<?php echo $kat->kategoria ?>"><?php echo $kat->kategoria ?></a>
						
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