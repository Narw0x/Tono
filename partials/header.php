<!DOCTYPE html>
<html lang="sk">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($zvoleny_produkt) ? implode('', array_column($zvoleny_produkt, 'nazov')) : "Vexer" ?></title>
    <link rel="stylesheet" href="style/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../../eshop/style/style.css">
</head>

<body>
    <header class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="index.php">ELE KTRO Obchodik</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Domov</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Produkty</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">O nás</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Kontakt</a>
                    </li>
                </ul>
                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Čo hľadáte?" aria-label="Search" id="srchFld" name="search">
                    <button class="btn btn-outline-light" type="submit" id="submitButton">Hľadať</button>
                </form>
            </div>
        </div>
    </header>

    <!-- Bootstrap JS Bundle with Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-eAAX2T7pDP4MzLnnCPTVSBa01dVibV2hqGbHo/16OL2Hh5SSsjmZ2AnCQ1DDxu3d" crossorigin="anonymous"></script>
</body>

</html>