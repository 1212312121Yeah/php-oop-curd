<?php

define('DB_SERVER', 'database');
define('DB_USER', 'root');
define('DB_PASSWORD', 'bas');
define('DB_NAME', 'test_php_oop');


$conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD, DB_NAME);
if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}

?>
