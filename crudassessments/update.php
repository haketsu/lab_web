<?php
include $_SERVER['DOCUMENT_ROOT']."/laba/validation.php";
include $_SERVER['DOCUMENT_ROOT']."/laba/bd.php";
include $_SERVER['DOCUMENT_ROOT']."/laba/table/assessmentstable.php";
include $_SERVER['DOCUMENT_ROOT']."/laba/safetyrequest.php";
$subject=safetyrequest($pdo,$_GET['subject']);
$assessmentsnumber=safetyrequest($pdo,$_POST['assessments']);
$date=safetyrequest($pdo,$_GET['date']);
$idstud=safetyrequest($pdo,$_GET['idstud']);
$check=validation($date,'date');
$assessments=new assessment();
$result=$assessments->readbyfull($pdo,$idstud,$subject,$date);
$row = $result->fetch(PDO::FETCH_ASSOC);
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    if (!empty($row))
    {
        if ($check)
        {
            $assessments->update($pdo, $date, $idstud, $subject, $assessmentsnumber);
            header("Location: /laba/assessments.php?idstud=$idstud");
        } else
        {
            header("Location: /laba/assessments.php?idstud=$idstud&error=2");
            return 0;
        }
    } else
    {
        header("Location: /laba/assessments.php?idstud=$idstud&error=1");
        return 0;
    }
}
else header("Location: /laba/assessments.php?idstud=$idstud&error=3");
return 0;
?>
