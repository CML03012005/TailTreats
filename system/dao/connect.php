<?php
  define('DB_SERVER', '127.0.0.1');
  define('DB_USERNAME', 'pma');
  define('DB_PASSWORD', 'ILmiciaT@1234');
  define('DB_PORT', '3307');
	define('DB_NAME', 'tailtreats'); $conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME, DB_PORT);
  if ($conn === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
  } else {
    echo 'Connection successful';
}
  
?>