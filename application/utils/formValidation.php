<?php

class FormValidation{

public static function __safeString($string){

   $safetyString = "";
   $safetyString = htmlspecialchars($string);
   $safetyString = stripslashes($safetyString);
   $safetyString = trim($safetyString);

   return $safetyString;

 }

public static function __verifyData($username, $password){

    if ($username == "admin" && $password == "123") {

      generateAdminPage();
      echo "<script>location.href = '../../index.php?p=1';</script>";

    }else{
      echo "<script>alert('Вы неправильно ввели пароль или имя пользователя!');</script>";
      echo "<script>location.href = '../../index.php?p=1';</script>";
    }

  }

}
