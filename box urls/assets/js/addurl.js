$("#addurl").click( function () {
    var error = 0;
    //name
    var name = document.getElementById("InputName");
    var errorName = document.getElementById("errorName");
    if(!checkvalid(name.value)) {
        error++;
        setMessage(errorName, "لطفا فیلد نام را پر کنید.", "block");
        setError(name);
    }else{
        setMessage(errorName , "", "none");
        notError(name)
    }
    //type
    var type = document.getElementById("InputType");
    var errorType = document.getElementById("errorType");
    if(!checkvalid(type.value)) {
        error++;
        setMessage(errorType, "لطفا فیلد دسته را پر کنید.", "block");
        setError(type);
    }else{
        setMessage(errorType , "", "none");
        notError(type)
    }
    //url
    var url = document.getElementById("InputUrl");
    var errorUrl = document.getElementById("errorUrl");
    if(!checkvalid(url.value)) {
        error++;
        setMessage(errorUrl,  "لطفا فیلد آدرس را پر کنید." , "block");
        setError(url);
    }else if(!validURL(url.value)){
        error++;
        setMessage(errorUrl,  "لطفا یک آدرس درست وارد کنید." , "block");
        setError(url);
    }else{
        setMessage(errorUrl , "", "none");
        notError(url)
    }
    if(error != 0){
        show("لطفا خطا های زیر را رفع کنید!!")
        return false;
    }

    $.ajax({
        type: "POST",
        url: "http://localhost/links/action",
        data: {
            type: "addurl",
            name: name.value,
            type2: type.value,
            url: url.value
        },
        success: function(data) {
            if(data == "1"){
                window.location.href = "http://localhost/links/";
            }else{
                show(data);
                setError(name);
                setMessage(errorName,"لطفا نام واردی را تغییر بدهید.","block");
            }
        },
        error: function(xhr, status, error) {
            console.error(xhr);
        }
    });
});

$("#saveurl").click( function () {
    var error = 0;
    //name
    var name = document.getElementById("InputName");
    var errorName = document.getElementById("errorName");
    if(!checkvalid(name.value)) {
        error++;
        setMessage(errorName, "لطفا فیلد نام را پر کنید.", "block");
        setError(name);
    }else{
        setMessage(errorName , "", "none");
        notError(name)
    }
    //type
    var type = document.getElementById("InputType");
    var errorType = document.getElementById("errorType");
    if(!checkvalid(type.value)) {
        error++;
        setMessage(errorType, "لطفا فیلد دسته را پر کنید.", "block");
        setError(type);
    }else{
        setMessage(errorType , "", "none");
        notError(type)
    }
    //url
    var url = document.getElementById("InputUrl");
    var errorUrl = document.getElementById("errorUrl");
    if(!checkvalid(url.value)) {
        error++;
        setMessage(errorUrl,  "لطفا فیلد آدرس را پر کنید." , "block");
        setError(url);
    }else if(!validURL(url.value)){
        error++;
        setMessage(errorUrl,  "لطفا یک آدرس درست وارد کنید." , "block");
        setError(url);
    }else{
        setMessage(errorUrl , "", "none");
        notError(url)
    }
    if(error != 0){
        show("لطفا خطا های زیر را رفع کنید!!")
        return false;
    }

    //token
    var token = document.getElementById("InputToken").value;
    var id = document.getElementById("InputId").value;
    $.ajax({
        type: "POST",
        url: "http://localhost/links/action",
        data: {
            type: "saveurl",
            token: token,
            id:id,
            name: name.value,
            type2: type.value,
            url: url.value
        },
        success: function(data) {
            if(data == "1"){
                window.location.href = "http://localhost/links/";
            }else{
                show(data);
                setError(name);
                setMessage(errorName,"لطفا نام واردی را تغییر بدهید.","block");
            }
        },
        error: function(xhr, status, error) {
            console.error(xhr);
        }
    });
});

$("#register").click(function () {
    var error = 0;
    //name
    var name = document.getElementById("InputName");
    var errorName = document.getElementById("errorName");
    if(!checkvalid(name.value)) {
        error++;
        setMessage(errorName, "لطفا فیلد نام و نام خانوادگی را پر کنید.", "block");
        setError(name);
    }else{
        setMessage(errorName , "", "none");
        notError(name)
    }
    //email
    var email = document.getElementById("InputEmail");
    var errorEmail = document.getElementById("errorEmail");
    if(!checkvalid(email.value)) {
        error++;
        setMessage(errorEmail, "لطفا فیلد ایمیل را پر کنید.", "block");
        setError(email);
    }else if(!validEmail(email.value)){
        error++;
        setMessage(errorEmail, "لطفا ایمیل معتبر وارد کنید.", "block");
        setError(email);
    }
    else{
        setMessage(errorEmail , "", "none");
        notError(email)
    }
    //password
    var password = document.getElementById("InputPassword");
    var errorPassword = document.getElementById("errorPassword");
    if(!checkvalid(password.value)) {
        error++;
        setMessage(errorPassword,  "لطفا فیلد پسورد را پر کنید." , "block");
        setError(password);
    }else if(!validPassword(password.value)){
        error++;
        setMessage(errorPassword,  "لطفا یک پسورد بین 6 تا 16 رقم وارد کنید." , "block");
        setError(password);
    }else{
        setMessage(errorPassword , "", "none");
        notError(password)
    }

    //password2
    var password2 = document.getElementById("InputPassword2");
    var errorPassword2 = document.getElementById("errorPassword2");
    if(password2.value != password.value) {
        error++;
        setMessage(errorPassword2,  "تکرار کلمه عبور باید با کلمه عبور مطابقت داشته باشد." , "block");
        setError(password2);
    }else{
        setMessage(errorPassword2 , "", "none");
        notError(password2)
    }

    if(error != 0){
        show("لطفا خطا های زیر را رفع کنید!!")
        return false;
    }

    $.ajax({
        type: "POST",
        url: "http://localhost/links/action",
        data: {
            type: "register",
            name: name.value,
            email: email.value,
            password: password.value
        },
        success: function(data) {
            if(data == "1"){
                window.location.href = "http://localhost/links/";
            }else{
                show(data);
                setError(email);
                setMessage(errorEmail,"لطفا ایمیل واردی را تغییر بدهید.","block");
            }
        },
        error: function(xhr, status, error) {
            console.error(xhr);
        }
    });
});

$("#login").click(function () {
    var error = 0;

    //email
    var email = document.getElementById("InputEmail");
    var errorEmail = document.getElementById("errorEmail");
    if(!checkvalid(email.value)) {
        error++;
        setMessage(errorEmail, "لطفا فیلد ایمیل را پر کنید.", "block");
        setError(email);
    }else if(!validEmail(email.value)){
        error++;
        setMessage(errorEmail, "لطفا ایمیل معتبر وارد کنید.", "block");
        setError(email);
    }
    else{
        setMessage(errorEmail , "", "none");
        notError(email)
    }

    //password
    var password = document.getElementById("InputPassword");
    var errorPassword = document.getElementById("errorPassword");
    if(!checkvalid(password.value)) {
        error++;
        setMessage(errorPassword,  "لطفا فیلد پسورد را پر کنید." , "block");
        setError(password);
    }else if(!validPassword(password.value)){
        error++;
        setMessage(errorPassword,  "لطفا یک پسورد بین 6 تا 16 رقم وارد کنید." , "block");
        setError(password);
    }else{
        setMessage(errorPassword , "", "none");
        notError(password)
    }

    if(error != 0){
        show("لطفا خطا های زیر را رفع کنید!!")
        return false;
    }

    $.ajax({
        type: "POST",
        url: "http://localhost/links/action",
        data: {
            type: "login",
            email: email.value,
            password: password.value
        },
        success: function(data) {
            if(data == "1"){
                window.location.href = "http://localhost/links/";
            }else{
                setError(password);
                setError(email);
                show(data);
            }
        },
        error: function(xhr, status, error) {
            console.error(xhr);
        }
    });
});

$("#save").click(function () {
    var error = 0;
    //name
    var name = document.getElementById("InputName");
    var errorName = document.getElementById("errorName");
    if(!checkvalid(name.value)) {
        error++;
        setMessage(errorName, "لطفا فیلد نام و نام خانوادگی را پر کنید.", "block");
        setError(name);
    }else{
        setMessage(errorName , "", "none");
        notError(name)
    }
    //email
    var email = document.getElementById("InputEmail");
    var errorEmail = document.getElementById("errorEmail");
    if(!checkvalid(email.value)) {
        error++;
        setMessage(errorEmail, "لطفا فیلد ایمیل را پر کنید.", "block");
        setError(email);
    }else if(!validEmail(email.value)){
        error++;
        setMessage(errorEmail, "لطفا ایمیل معتبر وارد کنید.", "block");
        setError(email);
    }
    else{
        setMessage(errorEmail , "", "none");
        notError(email)
    }
    //password
    var password = document.getElementById("InputPassword");
    var errorPassword = document.getElementById("errorPassword");
    if(!checkvalid(password.value)) {
        error++;
        setMessage(errorPassword,  "لطفا فیلد پسورد را پر کنید." , "block");
        setError(password);
    }else if(!validPassword(password.value)){
        error++;
        setMessage(errorPassword,  "لطفا یک پسورد بین 6 تا 16 رقم وارد کنید." , "block");
        setError(password);
    }else{
        setMessage(errorPassword , "", "none");
        notError(password)
    }

    //password2
    var password2 = document.getElementById("InputPassword2");
    var errorPassword2 = document.getElementById("errorPassword2");
    if(password2.value != password.value) {
        error++;
        setMessage(errorPassword2,  "تکرار کلمه عبور باید با کلمه عبور مطابقت داشته باشد." , "block");
        setError(password2);
    }else{
        setMessage(errorPassword2 , "", "none");
        notError(password2)
    }

    //token
    var token = document.getElementById("InputToken").value;

    if(error != 0){
        show("لطفا خطا های زیر را رفع کنید!!")
        return false;
    }

    $.ajax({
        type: "POST",
        url: "http://localhost/links/action",
        data: {
            type: "save",
            token: token,
            name: name.value,
            email: email.value,
            password: password.value
        },
        success: function(data) {
            if(data == "1"){
                window.location.href = "http://localhost/links/";
            }else{
                show(data);
                setError(email);
                setMessage(errorEmail,"لطفا ایمیل واردی را تغییر بدهید.","block");
            }
        },
        error: function(xhr, status, error) {
            console.error(xhr);
        }
    });
});

function checkvalid(element) {
    if(element == "") return false;
    return true;
}

function setMessage(element , message, display) {
    element.style.display = display;
    element.innerText = message;
}

function setError(element) {
    element.style = "box-shadow:0 0 0 .25rem #dc3545;"+"-webkit-animation: swing 1s ease;"+"animation: swing 1s ease;" + "-webkit-animation-iteration-count: 1;" + "animation-iteration-count: 1;"
}

function notError(element) {
    element.style = "box-shadow:0 0 0 .25rem #198754;"
}

function validURL(str) {
    var pattern = new RegExp('^(https?:\\/\\/)?'+ // protocol
        '((([a-z\\d]([a-z\\d-]*[a-z\\d])*)\\.)+[a-z]{2,}|'+ // domain name
        '((\\d{1,3}\\.){3}\\d{1,3}))'+ // OR ip (v4) address
        '(\\:\\d+)?(\\/[-a-z\\d%_.~+]*)*'+ // port and path
        '(\\?[;&a-z\\d%_.~+=-]*)?'+ // query string
        '(\\#[-a-z\\d_]*)?$','i'); // fragment locator
    return pattern.test(str);
}

function validPassword(value) {
    if(value.length < 6 || value.length > 18){
        return false;
    }else {
        return true;
    }
}

function validEmail(value) {
    var validRegex = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

    if (!value.match(validRegex)) {
        return false;
    }
    return true;
}