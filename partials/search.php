<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $srch = $_POST['srch'];

    header("Location: index.php/" . $srch);
    exit;
}
