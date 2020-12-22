<?php
class students
{
    function read ($pdo)
    {
        $result = $pdo->query('SELECT * FROM students');
        return $result;
    }
    function readbyclass($pdo,$class)
    {
        $result=$pdo->prepare('SELECT * FROM `students` WHERE class=:class');
        $result->execute(array('class' => $class));
        return $result;
    }
    function readsortclass($pdo)
    {
        $result=$pdo->query('SELECT * FROM `students` ORDER BY `class`,`surname`,`name`,`lastname` DESC');
        return $result;
    }
    function create($pdo,$surname,$name,$lastname,$class,$file)
    {
        $stmt = $pdo->prepare('INSERT INTO `students` (`idstud`, `surname`, `name`, `lastname`,`class`,`file`) VALUES (NULL, :surname, :name, :lastname, :class,:file)');
        $stmt->execute(array('surname'=>$surname,'name'=>$name,'lastname'=>$lastname,'class'=>$class,'file'=>$file));
    }
    function delete($pdo,$idstud)
    {
        $result = $pdo->prepare('DELETE FROM `students` WHERE idstud=:idstud');
        $result->execute(array('idstud' => $idstud));
    }
    function readbyidstud($pdo,$idstud)
    {
        $result = $pdo->prepare('SELECT * FROM `students` WHERE idstud=:idstud');
        $result->execute(array('idstud' => $idstud));
        return $result;
    }
    function readbyfull($pdo,$surname,$name,$lastname,$class)
    {
        $result = $pdo->prepare('SELECT * FROM `students` WHERE surname=:surname AND name=:name AND lastname=:lastname AND class=:class');
        $result->execute(array('surname' => $surname, 'name' => $name, 'lastname' => $lastname, 'class' => $class));
        return $result;
    }
    function update($pdo,$idstud,$surname,$name,$lastname,$class,$file)
    {
        $result = $pdo->prepare('UPDATE `students` SET surname=:surname,name=:name,lastname=:lastname,class=:class,file=:file WHERE idstud=:id');
        $result->execute(array('id' => $idstud, 'surname' => $surname, 'name' => $name, 'lastname' => $lastname, 'class' => $class, 'file' => $file));
    }
    function readjoinassesmentsjoinsubjectsearchdate($pdo,$date)
    {
        $result =$pdo->prepare('SELECT * FROM students LEFT JOIN assessments USING(idstud) LEFT JOIN subject USING(idsub) WHERE date LIKE :date');
        $result->execute(array('date' => $date));
        return $result;
    }
    function readjoinassesmentsjoinsubjectsearchsubject($pdo,$subname)
    {
        $result =$pdo->prepare('SELECT * FROM students LEFT JOIN assessments USING(idstud) LEFT JOIN subject USING(idsub) WHERE subname LIKE :subname');
        $result->execute(array('subname' => $subname));
        return $result;
    }
    function readjoinassesmentsjoinsubjectsearchassessments($pdo,$assessments)
    {
        $result =$pdo->prepare('SELECT * FROM students LEFT JOIN assessments USING(idstud) LEFT JOIN subject USING(idsub) WHERE assessments LIKE :assessments');
        $result->execute(array('assessments' => $assessments));
        return $result;
    }
    function readsearchsurname($pdo,$surname)
    {
        $result =$pdo->prepare('SELECT * FROM students WHERE surname LIKE :surname');
        $result->execute(array('surname' => $surname));
        return $result;
    }
    function readsearchname($pdo,$name)
    {
        $result =$pdo->prepare('SELECT * FROM students WHERE name LIKE :name');
        $result->execute(array('name' => $name));
        return $result;
    }
    function readsearchlastname($pdo,$lastname)
    {
        $result =$pdo->prepare('SELECT * FROM students WHERE lastname LIKE :lastname');
        $result->execute(array('lastname' => $lastname));
        return $result;
    }
    function readsearchclass($pdo,$class)
    {
        $result =$pdo->prepare('SELECT * FROM students WHERE class LIKE :class');
        $result->execute(array('class' => $class));
        return $result;
    }
}


