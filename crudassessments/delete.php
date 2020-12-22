<?php
include $_SERVER['DOCUMENT_ROOT']."/laba/validation.php";
include $_SERVER['DOCUMENT_ROOT']."/laba/bd.php";
include $_SERVER['DOCUMENT_ROOT']."/laba/table/assessmentstable.php";
include $_SERVER['DOCUMENT_ROOT']."/laba/safetyrequest.php";
$subject=safetyrequest($pdo,$_GET['subject']);
$date=safetyrequest($pdo,$_GET['date']);
$idstud=safetyrequest($pdo,$_GET['idstud']);
$check=validation($date,'date');
$assessments=new assessment();
$assessments->delete($pdo,$date,$subject,$idstud);
header("Location: /laba/assessments.php?idstud=$idstud");
?>