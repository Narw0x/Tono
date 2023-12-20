<?php

define('DB_CONNECTION', 'mysql');
define('DB_HOST', 'localhost');     // Set the host to 'localhost'
define('DB_DATABASE', 'c94dsad');
define('DB_USERNAME', 'A4aw#CVk');      // Change the username to your local MySQL username
define('DB_PASSWORD', 'c94moja');          // Change the password to your local MySQL password
define('DB_CHARSET', 'utf8');

try {
    $DB = new PDO(DB_CONNECTION . ":host=" . DB_HOST . ";dbname=" . DB_DATABASE . ";charset=" . DB_CHARSET, DB_USERNAME, DB_PASSWORD);
} catch (PDOException $e) {
    echo $e->getMessage();
}

?>
