<?php
include_once("bd.php");
include_once("table/namecomandsinsqltable.php");

function safetyrequest($pdo,$request)
{
    $words=new namecomandsinsql();
    $result=$words->readwords($pdo);
    $arrayofhtmltag=['&','<','>'];
    $arraytrueofhtmltag=['&amp','&lt','&gt'];
    while ($row = $result->fetch(PDO::FETCH_ASSOC))//Если находим ключевое слово SQL делаем пробел
    {
        $word=$row['comand'];
        $truewords=substr_replace($word, ' ', 2,0);
        $request=str_replace($word,$truewords,$request);
    }
    $request=str_replace('\'','\\\'',$request);//безопасный js
    $request=str_replace($arrayofhtmltag,$arraytrueofhtmltag,$request);//экранирование html тегов

    return $request;
}

