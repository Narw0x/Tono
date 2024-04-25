<?php

require_once '_inc/config.php';

$sql = "SELECT DISTINCT kategoria, urlkategoria FROM `knihy`";
$knihy = $DB->prepare($sql);
$knihy->execute();
$kategoria = $knihy->fetchAll(PDO::FETCH_OBJ);

$sql = "SELECT kategoria, urlkategoria, nazov, urlnazov FROM `knihy`";
$produkty = $DB->prepare($sql);
$produkty->execute();
$produkty = $produkty->fetchAll(PDO::FETCH_OBJ);

$sql = "SELECT kategoria, COUNT(*) AS pocetZaznamov FROM knihy GROUP BY kategoria;";
$countBooks = $DB->prepare($sql);
$countBooks->execute();
$countBook = $countBooks->fetchAll(PDO::FETCH_OBJ);

$request = strtok($_SERVER['REQUEST_URI'], "?");

$check = 0;

foreach ($kategoria as $kategorie) {
	for ($i = 0; $i < 6; $i++) {
		if($kategorie->kategoria == $countBook[$i]->kategoria){
			$pocetStran = floor($countBook[$i]->pocetZaznamov / 24) + 2;
			for($j = 1; $j < $pocetStran; $j++){
				switch ($request) {
					case "/{$kategorie->urlkategoria}_$j":
						require __DIR__ . '/produkty.php';
						$check = 1;
						break;
				}
			}
		}
	}
}
	
foreach ($produkty as $produkt) {
	switch ($request) {
		case "/$produkt->urlkategoria/$produkt->urlnazov":
			require __DIR__ . '/produkt_detail.php';
			$check = 1;
			break;		
	}
} 

switch ($request) {
    case '/':
        require __DIR__ . '/landing.php';
		$check = 1;
        break;
    case '':
        require __DIR__ . '/landing.php';
		$check = 1;
        break;
	}

if ($check == 1) {
	// nic proste, idk mohol somdat ze nie je jedna ale proste uz sa mi nechcelo
} else {
	switch($request){
		default:
			require __DIR__ . '/404.php';
			break;
	}
}

?>