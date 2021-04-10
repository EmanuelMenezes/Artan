<?php
session_start();
require('database.php');

if(isset($_GET['s'])){
    if($_GET['s'] == 'o'){
        session_destroy();
        header('Location:index.php');
    }
}
if(!isset($_SESSION['Company']) && !isset($_POST['inputCompany'])){

    require_once 'mlogin.php';

}else if(isset($_POST['inputCompany']) && isset($_POST['inputCompanyCode'])){

    $company = $conn->prepare("SELECT * FROM general WHERE company_code = ? AND company_password = ?");
    $company->execute(array($_POST['inputCompany'], $_POST['inputCompanyCode']));

    $result = $company->fetch();

    if($result){
        $db_name = $result['db_name'];
        $user = $result['user'];
        $pass = $result['pass'];

        $_SESSION['Company'] = $result['company_name'];
        $_SESSION['db_name'] = $db_name;
        $_SESSION['user'] = $user;
        $_SESSION['pass'] = $pass;
    }
    else{
        require_once 'mlogin.php';
    }
}

if(isset($_SESSION['Company']) && !isset($_SESSION['User']) && !isset($_POST['inputPassword'])){

    require_once 'login.php';

}else if(isset($_POST['inputUser']) && isset($_POST['inputPassword']) && isset($_SESSION['Company']) && !isset($_SESSION['User'])){

    $operator = $conn->prepare("SELECT * FROM operador WHERE op_user = ? AND op_pass = ?");
    $operator->execute(array($_POST['inputUser'], $_POST['inputPassword']));

    $login = $operator->fetch();

    if($login){

        $_SESSION['User'] = $_POST['inputUser'];
        $_SESSION['op_role'] = $login['op_role'];

    }else{
        require_once 'login.php';
    }


}
if(isset($_SESSION['User'])){

    header('Location:home.php');

}
?>