<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($zvoleny_produkt) ? implode('', array_column($zvoleny_produkt, 'nazov')): "Rexev" ?></title>
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