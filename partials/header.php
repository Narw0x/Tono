<!DOCTYPE html>
<html lang="sk">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($zvoleny_produkt) ? implode('', array_column($zvoleny_produkt, 'nazov')) : "Vexer" ?></title>
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="../../Alza/style/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
</head>

<body>
    <header class="main-hdr">
        <div class="nav">
            <div class="nav-logo">
                <a class="" href="index.php">Shaggy Store</a>
            </div>
            <div class="nav-srch">
                <form method="post" action="partials/search.php">
                    <input id="srchFld" name="srch" placeholder="Čo hľadáte?" type="text" />
                    <button type="submit" id="submitButton">Hľadať</button>
                </form>
            </div>
        </div>
    </header>