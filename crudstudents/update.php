<?php
include $_SERVER['DOCUMENT_ROOT']."/laba/bd.php";
include $_SERVER['DOCUMENT_ROOT']."/laba/safetyrequest.php";
include $_SERVER['DOCUMENT_ROOT']."/laba/table/studentstable.php";
$idstud=safetyrequest($pdo,@$_GET['idstud']);
$surname=safetyrequest($pdo,@$_POST['surname']);
$name =safetyrequest($pdo,@$_POST['name']);
$lastname =safetyrequest($pdo,@$_POST['lastname']);
$class=safetyrequest($pdo,@$_POST['class']);
$students=new students();
$result=$students->readbyidstud($pdo,$idstud);
$row = $result->fetch(PDO::FETCH_ASSOC);
define("UPLOAD_DIR", $_SERVER['DOCUMENT_ROOT']."/laba/uploads/");
define("DB_DIR","uploads/");
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    if (!empty($surname) && !empty($name) && !empty($lastname) && !empty($class) && !empty($idstud))
    {
        if (!empty($row))
        {
            if (!empty($_FILES["myfile"]))//добавить новый файл
            {
                $myfile = $_FILES["myfile"];
                if ($myfile["error"] != UPLOAD_ERR_OK)
                {
                    echo "Сир что-то не так";
                    exit;
                }
                $namefile = preg_replace("/[^A-Z0-9._-]/i", "_", $myfile["name"]);
                $i = 0;
                $parts = pathinfo($namefile);
                while (file_exists(UPLOAD_DIR . $namefile))
                {
                    $i++;
                    $namefile = $parts["filename"] . "_" . $i . "." . $parts["extension"];
                }
                $success = move_uploaded_file($myfile["tmp_name"], UPLOAD_DIR . $namefile);
                chmod(UPLOAD_DIR . $namefile,0644);
                if (!$success)
                {
                    echo "Сир что-то не так1";
                    exit;
                }
                $file = DB_DIR . $namefile;
                $result = $students->readbyidstud($pdo, $idstud);//Удаляем старый файл
                $row = $result->fetch(PDO::FETCH_ASSOC);
                define("DELETE", $_SERVER['DOCUMENT_ROOT'] . "/laba/");
                $link = $row['file'];
                $link1 = DELETE . $link;
                unlink("$link1");
            } else header("Location: /laba/students.php?error=4");
            $students->update($pdo, $idstud, $surname, $name, $lastname, $class, $file);//обновляем данные
            header("Location: /laba/students.php");
        } else header("Location: /laba/students.php?error=1");
    }
    else header("Location: /laba/students.php?error=2");
}
else header("Location: /laba/students.php?error=3");

?>