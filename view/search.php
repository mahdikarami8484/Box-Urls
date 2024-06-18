<?php
require_once 'header/header.php';
if(!isset($_POST['search'])){
    header("location:".BASE_URL);
    exit();
}

checkuser();
$search = "%".e($_POST['search'])."%";
$sql = "SELECT * FROM urls WHERE (name LIKE ? OR type LIKE ?) AND iduser=? ";
$query = connect()->prepare($sql);
$query->bindValue(1, $search);
$query->bindValue(2, $search);
$query->bindValue(3, $_SESSION['login']['id']);
$query->execute();
if($query->rowCount() == 0){
    view("noturl");
}
while ($row = $query->fetch(PDO::FETCH_ASSOC)){
    ?>
    <div class="box col-lg-3 ">
        <div class="card bg-dark">
            <div class="card-header">
                <?=e($row['type'])?>
            </div>
            <div class="card-body">
                <h5 class="card-title"><?=e($row['name'])?></h5>
                <a href="<?=e($row['link'])?>" class="btn btn-success">بازکردن لینک</a>
                <a href="http://localhost/links/editurl/<?=e($row['id'])?>" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                <a href="http://localhost/links/removeurl/<?=e($row['id'])?>" class="btn btn-danger"><i class="fa fa-remove"></i></a>
            </div>
        </div>
    </div>
<?php } ?>

<?php
require_once 'footer/footer.php';
?>