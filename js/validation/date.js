let regexp = /([01-9])+\.([01-9])+\.([01-9]){4}/;
let date=document.getElementById('date');
button.addEventListener('click', function(e)
    {
        let str = date.value;


        if(date.value=='')
        {
            alert("Необходимо ввести Дату");
            e.preventDefault();
            return false;
        }
        if(date.value.length!=10|!regexp.test(str))
        {
            alert("Дата должна выглядите ДД.ММ.ГГГГ");
            e.preventDefault();
            return false;
        }
    }
    ,false);
let date1=document.getElementById('date1');
button1.addEventListener('click', function(e)
    {
        let str = date1.value;


        if(date1.value=='')
        {
            alert("Необходимо ввести Дату");
            e.preventDefault();
            return false;
        }
        if(date1.value.length!=10|!regexp.test(str))
        {
            alert("Дата должна выглядите ДД.ММ.ГГГГ");
            e.preventDefault();
            return false;
        }
    }
    ,false);
let date2=document.getElementById('date2');
button2.addEventListener('click', function(e)
    {
        let str = date2.value;


        if(date2.value=='')
        {
            alert("Необходимо ввести Дату");
            e.preventDefault();
            return false;
        }
        if(date2.value.length!=10|!regexp.test(str))
        {
            alert("Дата должна выглядите ДД.ММ.ГГГГ");
            e.preventDefault();
            return false;
        }
    }
    ,false);