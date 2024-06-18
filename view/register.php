<?php
require_once 'header/header.php';

if(isset($_POST['submit'])){
    Register();
}

?>
    <div class="box-error col-lg-8 offset-lg-2 offset-sm-0 offset-xs-0 bg-danger" id="boxerror">
        <h5 id="boxerror-text">خطا</h5>
        <i id="close" onclick="closebox()" class="fa fa-close"></i>
    </div>
    <div class="form col-lg-6 offset-lg-3 bg-dark">
        <div class="mb-3">
            <label for="InputName" class="form-label">نام و نام خانوادگی :</label>
            <input type="name" name="name"  class="form-control" id="InputName">
            <div id="errorName" class="form-text text-danger"></div>
        </div>
        <div class="mb-3">
            <label for="InputEmail" class="form-label">ایمیل :</label>
            <input type="email1" name="email" class="form-control ltr" placeholder="name@gmail.com" id="InputEmail">
            <div id="errorEmail" class="form-text text-danger"></div>
        </div>
        <div class="mb-3">
            <label for="InputPassword" class="form-label">رمز عبور :</label>
            <input type="password" name="password" class="form-control ltr" id="InputPassword" aria-describedby="passwordHelp">
            <div id="errorPassword" class="form-text text-danger"></div>
        </div>
        <div class="mb-3">
            <label for="InputPassword2" class="form-label">تکرار رمز عبور :</label>
            <input type="password" class="form-control ltr" id="InputPassword2" aria-describedby="passwordHelp">
            <div id="errorPassword2" class="form-text text-danger"></div>
        </div>
        <button type="submit" name="submitRegister" id="register" class="btn btn-success">ثبت نام</button>
        <br><br>
        <p>حساب دارید ؟ <a href="http://localhost/links/login">ورود</a></p>
    </div>
<?php
require_once 'footer/footer.php';
?>