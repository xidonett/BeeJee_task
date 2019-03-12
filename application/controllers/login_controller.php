<?php

session_start();

if (isset($_REQUEST['action']['logout'])) {

session_unset();
session_destroy();

unset($_COOKIE['username']);
unset($_COOKIE['password']);

}

if (isset($_REQUEST['login']['button'])) {

  $username_data = $_REQUEST['login']['username'];
  $password_data = $_REQUEST['login']['password'];

  __setAdminSession($username_data, $password_data);
}

function __setAdminSession($username, $password){

  setcookie("username", $username, time()+84600*30);
  setcookie("password", $password, time()+84600*30);

  echo "<script>location.href = 'application/models/login_model.php';</script>";
}
