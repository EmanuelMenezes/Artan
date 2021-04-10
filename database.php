<?php

if(isset($_SESSION['Company'])){
    $db_name = $_SESSION['db_name'];
    $username = $_SESSION['user'];
    $password = $_SESSION['pass'];
} else {
    $db_name = 'general';
    $username = 'root';
    $password = '';
}

try {
  $conn = new PDO('mysql:host=localhost;dbname='.$db_name , $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo 'ERROR: ' . $e->getMessage();
}

?>