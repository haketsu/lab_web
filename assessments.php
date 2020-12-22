<?php require_once("authorizationcheck.php");
include("bd.php");
require_once("function.php");
include_once("table/subjecttable.php");
include_once("table/assessmentstable.php");
include_once ("crudassessments/read.php");
?>
<!doctype html>
<html lang="ru">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Пример на bootstrap 4: Ничего, кроме основ: скомпилированный CSS и JavaScript.">
      <title>Сайт ноунейм школы</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">    
    <link rel="stylesheet" type="text/css" href="css/style1.css" >
  </head>
  <body>
    <?php
    include("header.php");
?>
<main role="main">

  <section class="jumbotron text-center" id="search">
    <h1 class="jumbotron-heading  mt-4">Ваша успеваемость</h1>
    <?php
    if($_SESSION['isadmin'])
    {
        echo '<table>
                  <tr><th><button type="button" class="btn btn-primary " data-toggle="modal" data-target="#myModal">Добавить</button></th></tr>
              </table>       
             ';
    }
    @$idstud=@$_GET['idstud'];
   printtableassigment($pdo,$idstud);
   $error=@$_GET['error'];
    if (($error)==1)
    {
        echo '<div id="errors" style="color:red;">Данные об этой оценке уже были удалены</div><hr>';
    }
    if (($error)==2)
    {
        echo '<div id="errors" style="color:red;">Проверьте валидность данных</div><hr>';
    }
    if (($error)==3)
    {
        echo '<div id="errors" style="color:red;">Отправте запрос по человечески</div><hr>';
    }

    ?>
  <form action="students.php" method="post" class="form-signin">
      <button class="btn btn-primary p-1 " >Назад</button>
  </form>
  </section>
    <form action="crudassessments/create.php?idstud=<?php echo $idstud;?>" method="post" class="form-signin">
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">Добавить оценку</h4>
                    </div>
                    <div class="modal-body">
                        <select name="select" class="form-control" >
                            <?php
                            $subject=new subject();
                            $result = $subject->read($pdo);
                            selectsubject($result);
                            ?>
                        </select>
                        <select name="assessments" class="form-control margin" >
                            <option value="5">5</a></option>
                            <option value="4">4</a></option>
                            <option value="3">3</a></option>
                            <option value="2">2</a></option>
                        </select>
                        <input type="text" class="form-control margin" id="date" name="date" placeholder="Дата" required>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Отмена</button>
                        <button class="btn btn-primary" id="button">Добавить</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="/laba/js/validation/date.js"></script>
</body>
</html>