<?php

require_once 'libs/rb.php';

R::setup( 'mysql:host=localhost;dbname=database_name',
    'database_username', 'database_password');

if (!R::testConnection()) {

  exit('Нет соединения с базой данных!');

}
