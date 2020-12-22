<?php
session_start();
if(!isset($_SESSION['id']))
{
    header("Location: authorization.php");
}
session_write_close();
?>