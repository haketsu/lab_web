let email=document.getElementById('email');
let regexp = /^([a-z0-9_\.-])+@[a-z0-9-]+\.([a-z]{2,4}\.)?[a-z]{2,4}$/i;
button.addEventListener('click', function(e)
    {
        let str = email.value;


        if(email.value=='')
        {
            alert("Необходимо ввести ваш логин");
            e.preventDefault();
            var error=1;
            return false;
        }
        if(email.value.length<5 || email.value.length>15 )
        {
            alert("У логина должна быть длина от 5 до 15 символов");
            e.preventDefault();
            return false;
        }
        if(!regexp.test(str))
        {
            alert("Почта должна выглядить примерно вот так examples@mail.ru");
            e.preventDefault();
            return false;
        }


    }
    ,false);
