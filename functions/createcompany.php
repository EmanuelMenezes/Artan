<?php 
require('../database.php');
$name = $_POST['company_name'];

$company = $conn->prepare("CREATE DATABASE IF NOT EXISTS $name");
$company->execute();
?>