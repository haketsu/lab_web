<?php
require_once ("function.php");
function printtableassigment($pdo,$idstud)
{
    $assessments= new assessment();
    $date = getmydate($pdo, $idstud);
    $subject= getmysubject($pdo);
    if(!empty($date))
    {
        $lengthdate = count($date);
    }
    else $lengthdate=0;
    $lengthsubject=count($subject);
    $result=$assessments->readbyidstud($pdo,$idstud);
    //Цикл построения массива
    while ($row = $result->fetch(PDO::FETCH_ASSOC))
    {
        $idsubject=$row['idsub'];
        $i=0;
        while($i<$lengthdate)
        {
            if($date[$i]==$row['date'])
            {
                $iddate=$i;
            }
            $i++;
        }
        $mass[$idsubject][$iddate]=$row['assessments'];

    }
    //Рисуем перввую горизонталь с датами
    echo '
        <table>
            <tr>
                <th>Дата</th>';
    $i=0;
    while ($i < $lengthdate)
    {
        echo '<th>' . $date[$i] . '</th>';
        $i++;
    }
    echo '
                <th>Средняя оценка</th>
            </tr>';
    $i=0;
    while($i<$lengthsubject)
    {
        $idsub=$i+1;
        $summ = 0;
        $quantity = 0;
        echo '<tr><th>' . $subject[$i] . '</th>';
        $j=0;
        while($j<$lengthdate)
        {
            if(!empty($mass[$i+1][$j]))
            {
                //считаем средний балл
                if (is_numeric($mass[$i+1][$j]))
                {
                    $summ = $summ + $mass[$i+1][$j];
                    $quantity++;
                }
                //Если админ, то показываем Изменить и Удалить
                if(checkonadmin($_SESSION['isadmin']))
                {
                        echo '
                    <th><a class="edit" data-toggle="modal" data-target="#my' . $i . 'm' . $j . '"><img src="/laba/uploads/edit.png"  width=16></a>
                     <a class="center">' . $mass[$i + 1][$j] . '</a>    
                      <a href="crudassessments/delete.php?idstud=' . $idstud . '&date=' . $date[$j] . '&subject=' . $idsub . '" class="cross"><img src="/laba/uploads/krest.png"  width="12"></a></th>
                      <form action="crudassessments/update.php?idstud=' . $idstud . '&date=' . $date[$j] . '&subject=' . $idsub . '" method="post" class="form-signin">
                            <div class="modal fade" id="my' . $i . 'm' . $j . '" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="myModalLabel">Изменить оценку</h4>
                                        </div>
                                        <div class="modal-body">
                                            <select name="assessments" class="form-control" >
                                                <option value="5">5</a></option>
                                                <option value="4">4</a></option>
                                                <option value="3">3</a></option>
                                                <option value="2">2</a></option>
                                            </select>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Отмена</button>
                                            <button class="btn btn-primary" id="button1">Изменить</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                      </form>';
                }
                //Если не админ, то показываем оценку
                else
                {
                    echo '<th><a class="center">' . $mass[$i + 1][$j] . '</a></th>';
                }
            }
            //Если в массиве нет оценки выводим черточку
            else
            {
                echo '<th><a>-</a></th>';
            }
            $j++;
        }
        //Последний элеммент с средним баллом в горизонтале, если больше 4.5, то зеленым и.т.д
        if ($summ != 0)
        {
            $average = round($summ / $quantity, 2);
        }
        else $average = '-';
        if ($average >= 4.5)
        {
            echo '<th class="green">' . $average . '</th></tr>';
        }
        if ($average >= 3.5 and $average < 4.5)
        {
            echo '<th class="lightgreen">' . $average . '</th></tr>';
        }
        if ($average >= 2.5 and $average < 3.5)
        {
            echo '<th class="yellow">' . $average . '</th></tr>';
        }
        if ($average < 2.5 and $average >= 2)
        {
            echo '<th class="red">' . $average . '</th></tr>';
        }
        if ($average == '-')
        {
            echo '<th>' . $average . '</th></tr>';
        }
        $i++;
        echo '</tr>';
    }
    echo '</table>';
}
