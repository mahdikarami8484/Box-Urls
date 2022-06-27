<?php
require_once 'config.php';
if(!isset($_GET['url'])){
    require_once "view/index.php";
}

$data = e($_GET['url']);
$url = explode('/', $data);

if(!isset($_SESSION['login']) && $data!="login" && $data!="register" && $data!="action"){
    header('location: http://localhost/links/login');
}else if($data=='index' || $data == ""){
    view("index");
}else if($data=="login"){
    view("login");
}else if($data=="register"){
    view("register");
}else if($data == "edit"){
    view("edit");
}else if($data == "404"){
    view("404");
}else if($url[0]=="removeurl"){
    removeUrl($url[1], creatToken());
    header("location: ".BASE_URL);
}else if($data == "addurl"){
    view("addurl");
}else if($data == "action"){
    view("action");
}else if($data == "exit"){
    quit();
}else if($url[0]=="editurl"){
    $id = $url[1];
    view("editurl");
}else if($data == "search"){
    view("search");
}
else{
    view("404");
}


