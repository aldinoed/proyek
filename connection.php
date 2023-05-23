<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$database = 'proyek';
try {
      $connect = new PDO("mysql:host = $host; dbname = $database", $user, $pass);
      $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
      echo $e->getMessage();
}
?>
<!--  -->