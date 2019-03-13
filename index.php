<?php

require_once 'application/controllers/login_controller.php';
require_once 'application/controllers/list_controller.php';
require_once 'application/includes/db.php';
require_once 'application/includes/libs/rb.php';

?>

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Imported stylesheets/scripts -->

    <!-- Bootstrap CDN -->
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
 integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!-- FontAwesome CDN -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
     integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

     <link rel="stylesheet" href="css/index.css" type="text/css" />

     <link rel="icon" href="https://cdn4.iconfinder.com/data/icons/common-toolbar/36/Paste-2-64.png">

     <?php if(!empty($_SESSION['whoami'])): ?>
     <title>Задачник: Администратор</title>

     <?php else: ?>
     <title>Задачник: Пользователь</title>

     <?php endif ?>

  </head>
  <body>

    <?php if(!empty($_SESSION['whoami'])): ?>
    <h1 align="center" id="main-header">Задачник: <span style="color: tomato;"> Аккаунт администратора </span></h1>
    <?php else: ?>
    <h1 align="center" id="main-header">Задачник: <span style="color: green;"> Обычный пользователь </span></h1>
    <?php endif ?>

    <div class="d-flex justify-content-between navbar">
    <div class="justify-content-left">
    <div class="d-flex justify-content-between">
    <button name="action[add]" class="btn btn-primary" data-toggle="modal" data-target="#add-modal" id="add-button">
      <i class="fas fa-plus-square"></i> Добавить</button>
    </div>
  </div>

    <?php if(!empty($_SESSION['whoami'])): ?>
<form method="post">
      <button name="action[logout]" class="btn btn-danger justify-content-right">
      <i class="fas fa-power-off"></i> Выход</button>
</form>
    <?php else: ?>
    <button name="action[login]" data-toggle="modal" data-target="#login-modal"
    class="btn btn-success justify-content-right" id="login-button">
    <i class="fas fa-user"></i> Вход</button>
    <?php endif ?>
    </div>



    <!-- Диалоговое окно для входа в аккаунт администратора -->
    <div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header justify-content-center">
            <h1 class="modal-title align-middle">Вход в аккаунт </h1>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form method="post">
          <div class="modal-body">
            <p align="center"><input type="text" class="form-control" name="login[username]" placeholder="Имя пользователя" required /></p>
            <p align="center"><input type="password" class="form-control" name="login[password]" placeholder="Пароль" required /></p>
          </div>
          <div class="modal-footer justify-content-center" >
            <input class="btn btn-danger" data-dismiss="modal" value="Закрыть" />
            <input class="btn btn-success" name="login[button]" type="submit" value="Войти" />
          </div>
        </form>
        </div>
      </div>
    </div>

    <!-- Диалоговое окно для добавления нового элемента -->
    <div class="modal fade" id="add-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header justify-content-center">
            <h1 class="modal-title align-middle">Добавить задачу </h1>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          
          <form method="post">
          <div class="modal-body">
            <p align="center"><input type="text" class="form-control" name="add[username]" placeholder="Имя пользователя" required /></p>
            <p align="center"><input type="email" class="form-control" name="add[email]" placeholder="E-mail" required /></p>
            <textarea name="add[task]" rows="8" cols="80" class="form-control" placeholder="Текст задачи" wrap="soft" required ></textarea>
          </div>
          <div class="modal-footer justify-content-center" >
            <button type="button" class="btn btn-danger" data-dismiss="modal">Закрыть</button>
            <button class="btn btn-success" type="submit" name="add[button]">Добавить</button>
          </div>
          </form>
        </div>
      </div>
    </div>


        <!-- Диалоговое окно для редактирования задачи -->
        <div class="modal fade" id="edit-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header justify-content-center">
                <h3 class="modal-title align-middle">Редактирование задачи</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <textarea name="edit[task]" cols="50" rows="8" placeholder="Новый текст задачи" class="form-control" wrap="soft"></textarea>
                <p align="center">
                <label for="edit[completed]">Выполнено</label>
                <input type="checkbox" name="edit[completed]" value="Да">
                </p>
              </div>
              <div class="modal-footer justify-content-center" >
                <input class="btn btn-danger" data-dismiss="modal" value="Закрыть" />
                <input class="btn btn-success" name="edit[button]" type="submit" value="Сохранить" />
              </div>
            </div>
          </div>
        </div>

    <div class="row justify-content-center">
      <table class="table table-striped table-bordered" id="task-table">

      <thead class="table table-warning">
        <th>ПОЛЬЗОВАТЕЛЬ</th>
        <th>E-MAIL</th>
        <th>ТЕКСТ ЗАДАЧИ</th>
        <th>ДЕЙСТВИЕ</th>
        <th>ВЫПОЛНЕНО</th>
      </thead>

    <?php

    require_once 'application/views/list.php';

    ?>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
     integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
     integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
     integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>
