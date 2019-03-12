<?php

if(isset($_REQUEST)){

if (isset($_REQUEST['action']['sort'])) {

  $sortMethod = $_REQUEST['action']['sort'];
  $_SESSION['sorting'] = $sortMethod;
  echo "<script>location.href = 'application/models/list_model.php';</script>";
}

if (isset($_REQUEST['add']['button'])) {

  $username_data = $_REQUEST['add']['username'];
  $email_data    = $_REQUEST['add']['email'];
  $task_data     = $_REQUEST['add']['task'];

  __addNewTask($username_data, $email_data, $task_data);
}
}

function __addNewTask($username, $email, $task){

  $_SESSION['taskUsername'] = $username;
  $_SESSION['taskEmail']    = $email;
  $_SESSION['taskText']     = $task;

  echo "<script>location.href = 'application/models/list_model.php';</script>";

}
