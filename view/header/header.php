<?php
require_once 'head.php';
?>
<body>
<!-- HEADER -->

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">جعبه آدرس</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="http://localhost/links">صفحه اصلی</a>
                </li>
                <?php if(isset($_SESSION['login'])) {?>
                <li class="nav-item">
                    <a class="nav-link" href="http://localhost/links/addurl">افزودن آدرس</a>
                </li>
                <?php } ?>
                <?php
                if(isset($_SESSION['login'])) {
                    checkuser();
                    $i = 0;
                    $types = [];
                    $sql = "SELECT * FROM urls WHERE iduser=?";
                    $query = connect()->prepare($sql);
                    $query->bindValue(1, $_SESSION['login']['id']);
                    $query->execute();
                ?>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        دسته ها
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <?php
                        while($row = $query->fetch(PDO::FETCH_ASSOC)){
                            if(!in_array($row['type'], $types)){
                            ?>
                        <li><a class="dropdown-item" href="http://localhost/links/url/<?php echo $row['type']; ?>"><?php echo $row['type']; ?></a></li>
                        <?php $types[$i] = $row['type']; $i++;} } ?>
                    </ul>
                </li>
                <?php } ?>
                <?php if(isset($_SESSION['login'])){ ?>
                <li class="nav-item dropdown left">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <?php echo $_SESSION['login']['name']; ?>
                    </a>
                    <ul class="dropdown-menu profile">
                        <li><a class="dropdown-item" href="http://localhost/links/edit">ویرایش</a></li>
                        <li><a class="dropdown-item" href="http://localhost/links/exit">خروج</a></li>
                    </ul>
                </li>
                <?php }else{ ?>
                    <li class="nav-item left d-flex">
                        <a class="nav-link" href="http://localhost/links/register">ثبت نام</a>
                        <a class="nav-link" href="http://localhost/links/login">ورود</a>
                    </li>
                <?php } ?>
            </ul>
        </div>
    </div>
</nav>

<!-- /HEADER -->

<!-- box search -->

<div class="col-lg-12">
    <div class="search-box col-lg-8 bg-dark">
        <form class="d-flex" action="<?=BASE_URL."/search"?>" method="post">
            <input class="form-control  me-2" type="search" name="search" placeholder="دنبال چی هستی ؟" aria-label="Search">
            <button class="btn btn-outline-success" type="submit"><i class="fa fa-search"></i></button>
        </form>
    </div>
</div>

<!-- /box search -->

<!-- contents -->

<div class="contents row col-12">