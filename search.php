<?php
include_once("table/studentstable.php");
include ("bd.php");
include("function.php");
$students=new students();
$search='%' . $_POST['search'] . '%';
echo '<h5>Результаты поиска</h5>';
echo '<table border="1">';
function fioc($pdo,$search){//surname,name,lastname,class 1#keys
    $students=new students();
    $checkfioc=0;
    $result=$students->readsearchsurname($pdo,$search);//Поиск Фамилий
    $checkfioc=searchstudents($pdo,$checkfioc,$result);
    $result=$students->readsearchname($pdo,$search);//Поиск Имен
    $checkfioc=searchstudents($pdo,$checkfioc,$result);
    $result=$students->readsearchlastname($pdo,$search);//Поиск Отчеств
    $checkfioc=searchstudents($pdo,$checkfioc,$result);
    $result=$students->readsearchclass($pdo,$search);//Поиск классов
    $checkfioc=searchstudents($pdo,$checkfioc,$result);
    return $checkfioc;
}
function das($pdo,$search,$fiocresult)//date,assesments,subject 2#keys
{
    $students=new students();
    if($fiocresult==1)
    {
        return 1;
    }
    $checkdas=0;
    $result=$students->readjoinassesmentsjoinsubjectsearchdate($pdo,$_POST['search']);//поиск даты(только точное совпадение)
    $checkdas=searchassesments($pdo,$checkdas,$result);
    $result=$students->readjoinassesmentsjoinsubjectsearchsubject($pdo,$search);//поиск предметов
    $checkdas=searchassesments($pdo,$checkdas,$result);
    $result=$students->readjoinassesmentsjoinsubjectsearchassessments($pdo,$search);//Поиск оценок
    $checkdas=searchassesments($pdo,$checkdas,$result);
    return $checkdas;
}
$fiocresult = fioc($pdo, $search);
$dasresult = das($pdo, $search,$fiocresult);
 if($fiocresult==0 && $dasresult==0)
 {
   echo "<h3>Ничего не нашел</h3>";
 }