<?php

if(!isset($_POST['type'])){
    header("location:".BASE_URL);
    exit();
}

if(!isset($_SERVER['HTTP_REFERER'])){
    header("location:".BASE_URL);
    exit();
}

if($_SERVER['HTTP_HOST'] != HOST){
    header("location:".BASE_URL);
    exit();
}

switch ($_POST['type']){
    case "register":
        if(!isset($_POST['name']) || !isset($_POST['email']) || !isset($_POST['password'])){
            break;
        }
        if(empty($_POST['name']) || empty($_POST['email']) || empty($_POST['password'])){
            break;
        }

        if((strlen($_POST['name']) > 255) || (strlen($_POST['email']) > 255) || strlen($_POST['password']) > 255){
            break;
        }

        if($_SERVER['HTTP_REFERER'] != BASE_URL."/register"){
            break;
        }
        echo Register();
        break;
    case "login":
        if(!isset($_POST['email']) || !isset($_POST['password'])){
            break;
        }
        if(empty($_POST['email']) || empty($_POST['password'])){
            break;
        }

        if((strlen($_POST['email']) > 255) || strlen($_POST['password']) > 255){
            break;
        }

        if($_SERVER['HTTP_REFERER'] != BASE_URL."/login"){
            break;
        }
        echo Login();
        break;
    case "save":
        if(!isset($_POST['token']) || !isset($_POST['name']) || !isset($_POST['email']) || !isset($_POST['password'])){
            break;
        }
        if(empty($_POST['token']) || empty($_POST['name']) || empty($_POST['email']) || empty($_POST['password'])){
            break;
        }

        if((strlen($_POST['name']) > 255) || (strlen($_POST['email']) > 255) || strlen($_POST['password']) > 255){
            break;
        }

        if($_SERVER['HTTP_REFERER'] != BASE_URL."/edit"){
            break;
        }
        if($_SESSION['token'] != $_POST['token']){
            break;
        }
        echo update();
        break;
    case "addurl":
        if(!isset($_POST['name']) || !isset($_POST['type2']) || !isset($_POST['url'])){
            break;
        }
        if(empty($_POST['name']) || empty($_POST['type2']) || empty($_POST['url'])){
            break;
        }

        if((strlen($_POST['name']) > 255) || strlen($_POST['type2']) > 255 || strlen($_POST['url']) > 255){
            break;
        }

        if($_SERVER['HTTP_REFERER'] != BASE_URL."/addurl"){
            break;
        }
        echo addurl();
        break;
    case "saveurl":
        if(!isset($_POST['id']) || !isset($_POST["token"]) || !isset($_POST['name']) || !isset($_POST['type2']) || !isset($_POST['url'])){
            break;
        }
        if(empty($_POST['id']) || empty($_POST["token"]) || empty($_POST['name']) || empty($_POST['type2']) || empty($_POST['url'])){
            break;
        }

        if((strlen($_POST['name']) > 255) || strlen($_POST['type2']) > 255 || strlen($_POST['url']) > 255){
            break;
        }

        if($_SERVER['HTTP_REFERER'] != BASE_URL."/editurl/".$_POST['id']){
            break;
        }
        if($_SESSION['token'] != $_POST['token']){
            break;
        }
        echo saveurl();
        break;
}
