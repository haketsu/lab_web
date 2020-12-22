<?php

function printtable($pdo,$result)
{
    $i=0;
    echo '<table border="1">';
    while($row=$result->fetch(PDO::FETCH_ASSOC))//цикл вывода таблицы
    {
        echo '<tr>
               <!-- Поле Класс -->
              <th>' . $row['class'] . '</th>
               <!-- Кнопка ФИО -->
              <th><a href="assessments.php?idstud=' . $row['idstud'] . '">' . $row['surname'] . ' ' . $row['name'] . ' ' . $row['lastname'] . '</a></th>
              <!-- Кнопка Фото -->
              <th><button type="button" class="btn btn-primary p-1" data-toggle="modal" data-target="#foto'.$i.'">Фото</button></th>
              <div class="modal fade" id="foto'.$i.'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <img src="/laba/'.$row['file'].'" class="m-auto m-5" width="200">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Отмена</button>                    
                        </div>
                    </div>
              </div>';
              //<!-- Кнопка изменить -->
        if(checkonadmin($_SESSION['isadmin']))
        {
              echo '<th><button type="button" class="btn btn-primary p-1" data-toggle="modal" data-target="#update'.$i.'">Изменить</button></th>
              <form action="crudstudents/update.php?idstud=' . $row['idstud'] . '" method="post" class="form-signin" enctype="multipart/form-data">
                  <div class="modal fade" id="update'.$i.'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                      <div class="modal-dialog" role="document">
                          <div class="modal-content">
                              <div class="modal-header">
                                  <h4 class="modal-title" id="myModalLabel">Изменить ФИО у ученика</h4>
                              </div>
                              <div class="modal-body">
                                  <input type="text" name="surname" class="form-control margin" placeholder="Новая Фамилия" id="surname1">
                                  <input type="text" name="name" class="form-control margin" placeholder="Новое Имя" id="name1" >
                                  <input type="text" name="lastname" class="form-control margin" placeholder="Новое Отчество" id="lastname1">
                                  <input type="text" name="class" class="form-control margin" placeholder="Новый Класс" id="class1">
                                  <input class="margin" name="myfile" placeholder="Файл" type="file" id="file1">
                              </div>
                              <div class="modal-footer">
                                  <button type="button" class="btn btn-default" data-dismiss="modal">Отмена</button>
                                  <button class="btn btn-primary" id="button1">Изменить</button>
                              </div>
                          </div>
                      </div>
                  </div>
              </form>
              <!-- Кнопка удаления -->
              <form action="crudstudents/delete.php?idstud=' . $row['idstud'] . '" method="post" class="form-signin">
              <th><button class="btn btn-primary p-1" >Удалить</button></th>
              </form>            
              </tr>
              ';
        }
        $i++;
    }
    echo '</table>';
}
