<?php require_once("authorizationcheckin.php");?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Учителя- это наше все</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/style1.css" >
</head>
<body>
<?php
    include("header.php");
?>
    <section class="jumbotron text-center">
        <div class="container">
            <h1 class="jumbotron-heading  mt-4">Регистрация</h1>
        </div>

        <div class="container" id="form">
                <div class="form-label-group">
                    <input type="text" name="email" class="form-control" placeholder="Email" id="email">
                    <label for="inputEmail">Email address</label>
                </div>
                <div class="form-label-group">
                    <input type="Password" name="password" class="form-control" placeholder="Password" id="'password" >
                    <label for="inputPassword">Password</label>
                </div>
                <input type="hidden" name="g-recaptcha-responce" id="g-recaptcha-responce" >
                <button class="btn btn-lg btn-primary btn-block" type="submit" name='signin' id="button">Registration
                </button>
        </div>
        <div class="alert alert-success margin p-2 block" id="success">
            <strong>Успешно Зарегистрировались!</strong><a  href="authorization.php">  Авторизируйтесь пожалуйста!</a>
        </div>
        <div class="alert alert-danger margin block p-2" id="errorblock">
            <strong id="error"></strong>
        </div>

    </section>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <!-- Валидация js
    <script src="/laba/js/validation/email.js"></script>
    <script src="/laba/js/validation/password.js"></script>
    --!>
<script src="https://www.google.com/recaptcha/api.js?render=6LcOFcUUAAAAACxL0G1pQBRKL52GS4vU_8gE18RR"></script>
<script src="/laba/js/captcha.js"></script>
<script src="/laba/js/ajax/registration.js"></script>
</body>
</html>
