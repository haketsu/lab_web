document.querySelector('#searchbutton').onclick=function () {
    var search=document.querySelector('input[name=search]');
    var params='search=' + search.value;
    ajaxpostsearch(params);
};
function ajaxpostsearch(params)
{
    var xhr = new XMLHttpRequest();
    xhr.open("POST", 'search.php', true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function() {//Вызывает функцию при смене состояния.
        if(xhr.readyState == XMLHttpRequest.DONE && xhr.status == 200)
        {
            document.getElementById('search').innerHTML = xhr.responseText;

        }
    };
    xhr.send(params);
}