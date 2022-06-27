<?php

define('PRT', 'http');
define('DOMIN', 'localhost/links');
define('BASE_URL',PRT."://".DOMIN);
define('HOST','localhost');
define('USER','root');
define('DB','links');
define('PASS','');



session_start();

function e($string){
    return trim(htmlentities($string));
}

function connect(){
    try{
        $dsn = "mysql".":host=".HOST.";dbname=".DB;
        $connect = new PDO($dsn,USER,PASS);
        $connect->exec("SET CHARACTER SET utf8");
        $connect->exec("set names utf8");
        return $connect;
    }
    catch(PDOException $error){
        echo "ERROR: ".$error->__toString();
    }
}

function createDate(){
    $year = date("Y");
    $month = date("m");
    $day = date("d");
    return $year."/".$month."/".$day;
}

function Register(){
    $sql = "SELECT * FROM users WHERE email=?";
    $query = connect()->prepare($sql);
    $query->bindValue(1, e($_POST['email']));
    $query->execute();
    if($query->rowCount() > 0){
        return 'ایمیل واردی قبلا ثبت شده است.';
    }else{
        $sql = "INSERT INTO users (name, email, password, date) VALUES (?, ?, ?, ?)";
        $query = connect()->prepare($sql);
        $query->bindValue(1, e($_POST['name']));
        $query->bindValue(2, e($_POST['email']));
        $query->bindValue(3, md5($_POST['password']));
        $query->bindValue(4, createDate());
        $query->execute();
        //sendCheckEmail($_POST['email']);
        return 1;
    }
}

function Login()
{
    $sql = "SELECT * FROM users WHERE email=? AND password=?";
    $query = connect()->prepare($sql);
    $query->bindValue(1, e($_POST['email']));
    $query->bindValue(2, md5($_POST['password']));
    $query->execute();
    if ($query->rowCount() > 0) {
        $row = $row = $query->fetch(PDO::FETCH_ASSOC);
        session_regenerate_id();
        $_SESSION['login'] = ['id'=>$row['id'], 'name'=>$row['name'], 'email'=>$row['email']];
        return 1;
    }else{
        return 'ایمیل یا رمز واردی اشتباه است.';
    }
}

function sendCheckEmail($email){
    return false;
}

function checkuser(){
    $sql = "SELECT * FROM users WHERE id=?";
    $query = connect()->prepare($sql);
    $query->bindValue(1, $_SESSION['login']['id']);
    $query->execute();
    if ($query->rowCount() == 0) {
        quit();
        exit();
    }
}

function checkemail(){
    $sql = "SELECT * FROM users WHERE id=?";
    $query = connect()->prepare($sql);
    $query->bindValue(1, $_SESSION['login']['id']);
    $query->execute();
    checkuser();
    $row = $query->fetch(PDO::FETCH_ASSOC);
    if($row['auth'] == 0){
        return false;
    }
    return true;
}

function update(){
    checkuser();
    $sql = "SELECT * FROM users WHERE email=?";
    $query = connect()->prepare($sql);
    $query->bindValue(1, e($_POST['email']));
    $query->execute();
    if($query->rowCount() > 0 && $_SESSION['login']['email'] != $_POST['email']){
        return 'ایمیل واردی قبلا ثبت شده است.';
    }else{
        $sql = "UPDATE users SET name=? , email=? , password=? WHERE id=?";
        $query = connect()->prepare($sql);
        $query->bindValue(1, e($_POST['name']));
        $query->bindValue(2, e($_POST['email']));
        $query->bindValue(3, md5($_POST['password']));
        $query->bindValue(4, $_SESSION['login']['id']);
        $query->execute();
        if(!checkemail()) //sendCheckEmail($_POST['email']);
        return 1;
    }
}

function addurl(){
    checkuser();
    $sql = "SELECT * FROM urls WHERE name=?";
    $query = connect()->prepare($sql);
    $query->bindValue(1, e($_POST['name']));
    $query->execute();
    if($query->rowCount() > 0){
        return 'نام واردی قبلا ثبت شده است.';
    }else{
        $sql = "INSERT INTO urls (name, type, link, iduser, date) VALUES (?, ?, ?, ?, ?)";
        $query = connect()->prepare($sql);
        $query->bindValue(1, e($_POST['name']));
        $query->bindValue(2, e($_POST['type2']));
        $query->bindValue(3, e($_POST['url']));
        $query->bindValue(4, $_SESSION['login']['id']);
        $query->bindValue(5, createDate());
        $query->execute();
        return 1;
    }
}

function getUrl($id){
    checkuser();
    $sql = "SELECT * FROM urls WHERE iduser=? AND id=?";
    $query = connect()->prepare($sql);
    $query->bindValue(1, $_SESSION['login']['id']);
    $query->bindValue(2, $id);
    $query->execute();
    $row = $query->fetch(PDO::FETCH_ASSOC);
    return $row;
}

function creatToken(){
    return $_SESSION['token'] = base64_encode(md5(microtime()));
}

function checkToken($token){
    if($_SESSION['token'] != $token){
        return false;
    }
    unset($_SESSION['token']);
    return true;
}

function removeUrl($id, $token){
    checkuser();
    if($_SESSION['token'] != $token){
        echo "false";
    }
    $sql = "DELETE FROM urls WHERE id=? AND iduser=?";
    $query = connect()->prepare($sql);
    $query->bindValue(1, $id);
    $query->bindValue(2, $_SESSION['login']['id']);
    $query->execute();
    header("loction: http://localhost/links");
}

function view($name){
    return require_once "view/".$name.".php";
}

function saveurl(){
    checkuser();
    $sql = "SELECT * FROM urls WHERE name=? AND iduser=?";
    $query = connect()->prepare($sql);
    $query->bindValue(1, e($_POST['name']));
    $query->bindValue(2, $_SESSION['login']['id']);
    $query->execute();
    if($query->rowCount() > 0 && $_POST['name'] != getUrl($_POST['id'])['name']){
        return 'نام واردی قبلا ثبت شده است.';
    }else{
        $sql = "UPDATE urls SET name=? , type=? , link=? WHERE iduser=? AND id=?";
        $query = connect()->prepare($sql);
        $query->bindValue(1, e($_POST['name']));
        $query->bindValue(2, e($_POST['type2']));
        $query->bindValue(3, e($_POST['url']));
        $query->bindValue(4, $_SESSION['login']['id']);
        $query->bindValue(5, $_POST['id']);
        $query->execute();
        return 1;
    }
}

function quit(){
    unset($_SESSION['login']);
    header("location: http://localhost/links/login");
    exit();
}