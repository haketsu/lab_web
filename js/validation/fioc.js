let surname=document.getElementById('surname');
let name=document.getElementById('name');
let lastname=document.getElementById('lastname');
let class1=document.getElementById('class');
let button=document.getElementById('button');
let file=document.getElementById("file")
button.addEventListener('click', function(e)
    {
        if(surname.value=='')
        {
            alert("Напишите фамилию у ученика");
            e.preventDefault();
            return false;
        }

        if(name.value=='')
        {
            alert("Напишите Имя у ученика");
            e.preventDefault();
            return false;
        }

        if(lastname.value=='')
        {
            alert("Напишите Отчество у ученика");
            e.preventDefault();
            return false;
        }

        if(class1.value=='')
        {
            alert("Укажите класс у ученика");
            e.preventDefault();
            return false;
        }

        if(file.value=='')
        {
            alert("Выберите файл");
            e.preventDefault();
            return false;
        }


    }
    ,false);

let surname1=document.getElementById('surname1');
let name1=document.getElementById('name1');
let lastname1=document.getElementById('lastname1');
let class2=document.getElementById('class1');
let button1=document.getElementById('button1');
let file1=document.getElementById('file1');
button1.addEventListener('click', function(e)
    {
        if(surname1.value=='')
        {
            alert("Напишите фамилию у ученика");
            e.preventDefault();
            return false;
        }

        if(name1.value=='')
        {
            alert("Напишите Имя у ученика");
            e.preventDefault();
            return false;
        }

        if(lastname1.value=='')
        {
            alert("Напишите Отчество у ученика");
            e.preventDefault();
            return false;
        }

        if(class2.value=='')
        {
            alert("Укажите класс у ученика");
            e.preventDefault();
            return false;
        }

        if(file1.value=='')
        {
            alert("Выберите файл");
            e.preventDefault();
            return false;
        }


    }
    ,false);