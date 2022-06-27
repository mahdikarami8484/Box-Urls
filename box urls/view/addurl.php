<?php
require_once 'header/header.php';
?>
    <div class="box-error col-lg-8 offset-lg-2 offset-sm-0 offset-xs-0 bg-danger" id="boxerror">
        <h5 id="boxerror-text">خطا</h5>
        <i id="close" onclick="closebox()" class="fa fa-close"></i>
    </div>
    <div class="form col-lg-6 offset-lg-3 bg-dark">
        <div class="mb-3">
            <label for="InputName" class="form-label">نام :</label>
            <input type="name" class="form-control" id="InputName">
            <div id="errorName" class="form-text text-danger"></div>
        </div>
        <div class="mb-3">
            <label for="InputType" class="form-label">دسته :</label>
            <input type="text" class="form-control" id="InputType">
            <div id="errorType" class="form-text text-danger"></div>
        </div>
        <div class="mb-3">
            <label for="InputUrl" class="form-label">آدرس را وارد کنید :</label>
            <input type="Url1" class="form-control ltr" placeholder="https://google.com" id="InputUrl" aria-describedby="urlHelp">
            <div id="errorUrl" class="form-text text-danger"></div>

        </div>
        <button type="submit" id="addurl" class="btn btn-success">ثبت</button>
    </div>
<?php
require_once 'footer/footer.php';
?>