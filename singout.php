<?php
//После нажатия кнопки unset'ает ссессию и выходит из логина
session_start();
unset($_SESSION['id']);
unset($_SESSION['isadmin']);
header("Location: index.php");
?>