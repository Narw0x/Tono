<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $srch = $_POST['srch'];

    header("Location: ../produkty.php?srch=" . $srch);
    exit;
}
