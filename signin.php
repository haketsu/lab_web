<?php
session_start();
function getCaptcha($token)
{
    //$answer=file_get_contents(("https://www.google.com/recaptcha/api/siteverify?secret=6LcOFcUUAAAAAC1jIiqVkf5vylT2uCiFu2Rkt1Lf&response={$token}"));
    //$answer=json_decode($answer);
    //return $answer;
}
include("bd.php");
include ("validation.php");
include_once ("safetyrequest.php");
require_once('table/userstable.php');
$validationlogin=validation($_POST['email'],'email');
$validationpassword=validation($_POST['password'],'password');
$user=new user();
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    if (!strlen($_POST['email'])==0)
    {
        if (!strlen($_POST['password']) == 0)
        {
            if ($validationlogin)
            {
                if ($validationpassword)
                {
                    $result = $user->readbylogin($pdo, safetyrequest($pdo, $_POST['email']));
                    $row1 = $result->fetch(PDO::FETCH_ASSOC);
                    if (!empty($row1))
                    {
                        if (password_verify(safetyrequest($pdo, $_POST['password']), $row1['password']))
                        {
                            //$answer = getCaptcha((@$_POST['g-recaptcha-responce']));
                           // if ($answer->success == true && $answer->score > 0.5)//Проверка на робота
                           // {
                                echo "1";
                                $_SESSION['id'] = $row1['login'];
                                if ($row1['isadmin'] == 1)
                                {
                                    $_SESSION['isadmin'] = 1;
                                } else
                                {
                                    $_SESSION['isadmin'] = 0;
                                }
                            //}
                            //else
                            //{
                            //    echo "Проблемы с автоматической капчей.Попробуйте еще раз или перезагрузите страницу.";
                           // }
                        }
                        else
                        {
                            echo "<h1>Неправильный пароль!</h1>";
                        }
                    }
                    else
                    {
                        echo "Такого Email не существует!";
                    }
                }
                else
                {
                    echo "У пароля длина от 5 до 15 символов";
                }
            }
            else
            {
                 echo "Проблема с правильностью введенного Email.Почта пишется примерно так examples@mail.ru, также почта должна иметь длина от 5 до 15 символов";
            }
        }
        else
        {
            echo "Введите пароль";
        }
    }
    else
    {
        echo "Введите почту";
    }
}
else
{
    echo "Отправте данные POST запросом пожалуйста";
}
?>
