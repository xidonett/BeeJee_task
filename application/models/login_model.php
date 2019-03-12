<?php
session_start();

require_once '../utils/formValidation.php';

$username = $_COOKIE['username'];
$password = $_COOKIE['password'];

$username = FormValidation::__safeString($username);
$password = FormValidation::__safeString($password);

FormValidation::__verifyData($username, $password);

 function generateAdminPage(){

    $_SESSION['whoami'] = '<span style="color: tomato;"> Аккаунт администратора </span>';


   }
