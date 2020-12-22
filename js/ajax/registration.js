function ajaxpost(params)
{
    var xhr = new XMLHttpRequest();
    xhr.open("POST", 'registrationcheck.php', true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function() {//Вызывает функцию при смене состояния.
        if(xhr.readyState == XMLHttpRequest.DONE && xhr.status == 200)
        {
            var check=xhr.responseText;
            var success=1;
            if(check==success)
            {
                document.getElementById('success').style.display = 'block';
                document.getElementById('form').style.display = 'none';
                document.getElementById('errorblock').style.display = 'none';
            }
            else
            {
                document.getElementById('errorblock').style.display = 'block';
                document.getElementById('error').innerHTML=xhr.responseText;
            }
        }
    };
    xhr.send(params);
}
window.onload=function () {
    var email=document.querySelector('input[name=email]');
    var password=document.querySelector('input[name=password]');
    var recaptcha=document.querySelector('input[name=g-recaptcha-responce]');
    document.querySelector('#button').onclick=function () {
        var params='email=' + email.value + '&' + 'password=' + password.value + '&' + 'g-recaptcha-responce=' + recaptcha.value;
        ajaxpost(params);
    };
}