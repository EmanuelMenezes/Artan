<?php 
session_start();
require('database.php');

$id = $_GET['op_id'];
    $remove = $conn->prepare('DELETE FROM operador WHERE op_id = ?');
    $remove->execute(array($id));
?>