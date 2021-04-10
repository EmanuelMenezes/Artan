<?php 
require('../database.php');

$company = $conn->prepare("CREATE DATABASE IF NOT EXISTS teste");
$company->execute();

?>