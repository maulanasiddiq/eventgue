<!-- <?php 
$conn = mysqli_connect('localhost','root','', 'db_event');
?> -->

<?php

$hostname = 'localhost';
$username = 'root';
$password = '';
$database = 'db_event';

try{
    $koneksi = new PDO("mysql:host=$hostname;dbname=$database", $username, $password);
    $koneksi->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

    $koneksi = null;
} catch(PDOException $e) {
    echo $e->getMessage();
}

?>