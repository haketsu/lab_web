<?php
include $_SERVER['DOCUMENT_ROOT']."/laba/bd.php";
include $_SERVER['DOCUMENT_ROOT']."/laba/validation.php";
include $_SERVER['DOCUMENT_ROOT']."/laba/table/assessmentstable.php";
include $_SERVER['DOCUMENT_ROOT']."/laba/safetyrequest.php";

$select=safetyrequest($pdo,$_POST['select']);
$assessmentsnumber=safetyrequest($pdo,$_POST['assessments']);
$date=safetyrequest($pdo,$_POST['date']);
$idstud=safetyrequest($pdo,$_GET['idstud']);
$check=validation($date,'date');


if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    if ($check)
    {
        $assessments=new assessment();
        $assessments->create($pdo, $date, $idstud, $select, $assessmentsnumber);
        header("Location: /laba/assessments.php?idstud=$idstud");
    } else
    {

        header("Location: /laba/assessments.php?idstud=$idstud");
    }
}
?>
