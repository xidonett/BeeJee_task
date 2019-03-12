<?php

require_once 'libs/rb.php';

R::setup( 'mysql:host=localhost;dbname=id8810866_beejee',
    'id8810866_xidonett', 'superman2012');

if (!R::testConnection()) {

  exit('Нет соединения с базой данных!');

}
