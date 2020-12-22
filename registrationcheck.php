<?php
//function getCaptcha($token)
//{
//    $answer=file_get_contents(("https://www.google.com/recaptcha/api/siteverify?secret=6LcOFcUUAAAAAC1jIiqVkf5vylT2uCiFu2Rkt1Lf&response={$token}"));
//    $answer=json_decode($answer);
//    return $answer;
//}
include("bd.php");
include_once("table/userstable.php");
include_once ("safetyrequest.php");
include("validation.php");
$user=new user();
$validationemail=validation(@$_POST['email'],'email');
$validationpassword=validation(@$_POST['password'],'password');
//$answer = getCaptcha((@$_POST['g-recaptcha-responce']));
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    if (!strlen($_POST['email'])==0)
    {
        if (!strlen($_POST['password'])==0)
        {
            if ($validationemail)
            {
                if ($validationpassword)
                {
                    $isadmin = 0;
                    $email = safetyrequest($pdo, $_POST['email']);
                    $password = password_hash(safetyrequest($pdo, $_POST['password']), PASSWORD_DEFAULT);
                    $result = $user->readbylogin($pdo, $email);
                    $row1 = $result->fetch(PDO::FETCH_ASSOC);
                    if (empty($row1))
                    {
                       // if ($answer->success == true && $answer->score > 0.5)//Проверка на робота
                        //{
                            $user->create($pdo, $email, $password, $isadmin);
                        echo '1';
                        //
//                        else
//                        {
//                            echo "Проблемы с автоматической капчей.Попробуйте еще раз или перезагрузите страницу.";
//                        }
                    } else
                    {
                        echo "Такой Email уже существует";
                    }
                } else
                {
                    echo "У пароля длина от 5 до 15 символов";
                }
            } else
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
    echo "Данные нужно указывать POST'ом";
}
?>

