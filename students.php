<?php
require_once("authorizationcheck.php");
include("bd.php");
include_once("table/studentstable.php");
include_once ("safetyrequest.php");
include_once("crudstudents/read.php");
include_once("function.php");
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
      <?php
      if($_SESSION['isadmin'])
      {
      echo '<table class="margin">
          <tr><th><button type="button" class="btn btn-primary " data-toggle="modal" data-target="#myModal">Добавить</button></th></tr>
      </table>
      ';
      }
      $students=new students();
      $result=$students->readsortclass($pdo);//Получаем данные
      printtable($pdo,$result);
      $error=safetyrequest($pdo,@$_GET['error']);
      //Проверка на ошибки
      if (($error)==1)
      {
         echo '<div id="errors" style="color:red;">Данные об этом пользователе были уже удалены</div><hr>';
      }
      if (($error)==2)
      {
          echo '<div id="errors" style="color:red;">Проверьте валидность данных</div><hr>';
      }
      if (($error)==3)
      {
          echo '<div id="errors" style="color:red;">Отправте данные по человечески</div><hr>';
      }
      if (($error)==4)
      {
          echo '<div id="errors" style="color:red;">Загрузите пожалуйста файл</div><hr>';
      }
      ?>
      <form action="crudstudents/create.php" method="post" class="form-signin" enctype="multipart/form-data">
          <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
              <div class="modal-dialog" role="document">
                  <div class="modal-content">
                      <div class="modal-header">
                          <h4 class="modal-title" id="myModalLabel">Добавить нового ученика</h4>
                      </div>
                      <div class="modal-body">
                          <div class="form-label-group margin">
                              <input type="text" name="surnamec" class="form-control" placeholder="Фамилия" id="surname">
                          </div>
                          <div class="form-label-group">
                              <input type="text" name="namec" class="form-control margin" placeholder="Имя" id="name">
                          </div>
                          <div class="form-label-groupc">
                              <input type="text" name="lastnamec" class="form-control margin" placeholder="Отчество" id="lastname" >
                          </div>
                          <div class="form-label-groupc">
                              <input type="text" name="classc" class="form-control margin" placeholder="Класс" id="class">
                          </div>
                              <input class="margin" name="myfile" placeholder="Файл" type="file">
                      </div>
                      <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Отмена</button>
                          <button class="btn btn-primary" id="button">Добавить</button>
                      </div>
                  </div>
              </div>
          </div>
      </form>
  </body>
  </section>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="/laba/js/validation/fioc.js"></script>
    <script src="https://api-maps.yandex.ru/2.1/?apikey=1366c9de-63bc-4b4e-a59d-0951cce81f8b&lang=ru_RU" type="text/javascript"></script>
  <script type="text/javascript">
      ymaps.ready(init);
      function init(){
          var myMap = new ymaps.Map("map", {
              center: [48.751352, 44.510060],
              zoom: 16
          });
      }
  </script>
</html>
