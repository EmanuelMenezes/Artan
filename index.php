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
        
        $select = $conn->query("SELECT op_name FROM operador WHERE op_user = ".$_POST['inputUser']);
        $name = $select->fetch(PDO::FETCH_ASSOC);

        $_SESSION['User'] = $_POST['inputUser'];
        $_SESSION['op_role'] = $login['op_role'];
        $_SESSION['username'] = $name['op_name'];

    } else {
        require_once 'login.php';
    }


}
if(isset($_SESSION['User'])){
    if($_SESSION['Company'] == 'Artan'){
        //header('Location:master.php');
        header('Location:home.php');

    }else{
        header('Location:home.php');
    }

}
?>