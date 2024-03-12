<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php 
    error_reporting(E_ERROR | E_PARSE);
    $titleContent = isset($zvoleny_produkt) ? implode('', array_column($zvoleny_produkt, 'nazov')) : "Rexev";
    
    if (isset($sql_k)) {
        echo htmlspecialchars($sql_k);
    } else {
        echo htmlspecialchars($titleContent);
    }
?></title>
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="../../Tono/style/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
</head>
<body>
<header class="main-hdr">
    <div  class="nav">
        <div class="nav-logo">
            <a class="" href="index.php">Rexev</a>
        </div>
    </div>
</header>