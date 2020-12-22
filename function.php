<?php
include_once("table/studentstable.php");
include_once("table/subjecttable.php");
include_once("table/assessmentstable.php");
function checkonadmin($isadmin)//проверка на админа
{
    if($isadmin)
    {
        return 1;
    }
    else return 0;
}
function selectsubject($result)//получение всех предметом и вывод их в селекте
{
    $i=1;
    while($row=$result->fetch(PDO::FETCH_ASSOC))
    {
        $subject=$row['subname'];
        echo '<option value='.$i.'>'.$subject.'</a>';
        $i=$i+1;
    }
}
function sort_date($a_new, $b_new) {
    $a_new = strtotime($a_new);
    $b_new = strtotime($b_new);
    return $a_new - $b_new;
}
function getmysubject($pdo)//Предметы ученика в массиве
{
    $subject=new subject();
    $result=$subject->read($pdo);
    $i=0;
    while ($row = $result->fetch(PDO::FETCH_ASSOC))
    {
        $mass[$i] = $row['subname'];
        $i++;
    }
    return $mass;
}
function getmydate($pdo,$idstud)//на вход id stud на выходе все даты, на которых он получал оценки
{
    $assessmets=new assessment();
    $result=$assessmets->readbyidstud($pdo,$idstud);
    $i=0;
    while ($row = $result->fetch(PDO::FETCH_ASSOC))
    {
        $mass[$i] = $row['date'];
        $i++;
    }
    if (!empty($mass))
    {
        $mass = array_unique($mass);
        usort($mass, "sort_date");
        return $mass;
    }
}
function searchstudents($pdo,$checkfioc,$result)
{
    $row = $result->fetchAll(PDO::FETCH_ASSOC);
    if (!empty($row))
    {
        if ($checkfioc == 0)
        {
            echo "<tr><th>Класс</th><th>ФИО</th><th>Фото</th>";
            $checkfioc = 1;
        }
        $length = count($row);
        for ($i = 0; $i < $length; $i++)
        {
            echo '<tr>
               <!-- Поле Класс -->
              <th>' . $row[$i]['class'] . '</th>
               <!-- Кнопка ФИО -->
              <th><a href="assessments.php?idstud=' . $row[$i]['idstud'] . '">' . $row[$i]['surname'] . ' ' . $row[$i]['name'] . ' ' . $row[$i]['lastname'] . '</a></th>
              <!-- Кнопка Фото -->
              <th><button type="button" class="btn btn-primary p-1" data-toggle="modal" data-target="#foto' . $i . '">Фото</button></th>
              <div class="modal fade" id="foto' . $i . '" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <img src="/laba/' . $row[$i]['file'] . '" class="m-auto m-5" width="200">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Отмена</button>                    
                        </div>
                    </div>
              </div>
              </tr>';
        }

    }
    return $checkfioc;
}
function searchassesments($pdo,$checkdas,$result)
{
    $row = $result->fetchAll(PDO::FETCH_ASSOC);
    if (!empty($row))
    {
        if ($checkdas == 0)
        {
            echo "<tr><th>Класс</th><th>ФИО</th><th>Фото</th><th>Дата</th><th>Предмет</th><th>Оценка</th>";
            $checkdas = 1;
        }
        $length = count($row);
        for ($i = 0; $i < $length; $i++)
        {
            echo '<tr>
               <!-- Поле Класс -->
              <th>' . $row[$i]['class'] . '</th>
               <!-- Кнопка ФИО -->
              <th><a href="assessments.php?idstud=' . $row[$i]['idstud'] . '">' . $row[$i]['surname'] . ' ' . $row[$i]['name'] . ' ' . $row[$i]['lastname'] . '</a></th>
              <!-- Кнопка Фото -->
              <th><button type="button" class="btn btn-primary p-1" data-toggle="modal" data-target="#foto' . $i . '">Фото</button></th>
              <th>' . $row[$i]['date'] . '</th>
              <th>' . $row[$i]['subname'] . '</th>
              <th>' . $row[$i]['assessments'] . '</th>
              <div class="modal fade" id="foto' . $i . '" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <img src="/laba/' . $row[$i]['file'] . '" class="m-auto m-5" width="200">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Отмена</button>                    
                        </div>
                    </div>
              </div>
              </tr>';
        }
    }
    return $checkdas;
}
