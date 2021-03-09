<?php 
session_start();
if(!isset($_SESSION['Company']) && !isset($_POST['inputCompany'])){
    require_once 'mlogin.php';
}else if(isset($_POST['inputCompany']) && isset($_POST['inputCompanyCode'])){
$_SESSION['Company'] = $_POST['inputCompany'];
echo'reste';
header('Location:index.php');
}
if(isset($_SESSION['Company']) && !isset($_SESSION['User'])){
    require_once 'login.php';
}else if(isset($_SESSION['User'])){
    require_once 'home.php';
}
?>