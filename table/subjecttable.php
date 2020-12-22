<?php
class subject
{
    function read($pdo)
    {
        $result = $pdo->query('SELECT * FROM subject');
        return $result;
    }
    function readbyidsub($pdo,$idsub)
    {
        $result = $pdo->prepare('SELECT * FROM `subject` WHERE idsub=:idsub');
        $result->execute(array('idsub' => $idsub));
        return $result;
    }
}