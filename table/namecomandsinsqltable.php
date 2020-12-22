<?php
class namecomandsinsql
{
    function readwords($pdo)
    {
        $result = $pdo->query('SELECT * FROM namecomandsinsql');
        return $result;
    }
}

