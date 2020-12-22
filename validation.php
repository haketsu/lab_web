<?php
function validation ($string,$type){
    $string=htmlspecialchars($string);
    if($type=='email')//валидация email
    {
        $length=strlen($string);
        $regular='/^([a-z0-9_\.-])+@[a-z0-9-]+\.([a-z]{2,4}\.)?[a-z]{2,4}$/';
        $regularcheck=preg_match($regular, $string);
        if($regularcheck==1 && $length>=5 && $length<=15)
        {
           return 1;
        }
        else return 0;
    }
    if($type=='password')//валидация пароля
    {
        $length=strlen($string);
        if($length>=5 && $length<=15)
        {
            return 1;
        }
        else return 0;

    }
    if($type=='date')//валидация даты
    {
        $length=strlen($string);
        $regular='/([01-9])+\.([01-9])+\.([01-9]){4}/';
        $regularcheck=preg_match($regular, $string);
        if($length==10 &&$regularcheck==1)
        {
            return 1;
        }
        else return 0;

    }
}
?>
