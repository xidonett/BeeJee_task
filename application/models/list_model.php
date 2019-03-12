<?php

session_start();

require_once '../utils/formValidation.php';
require_once '../includes/db.php';

$username = $_SESSION['taskUsername'];
$email    = $_SESSION['taskEmail'];
$task     = $_SESSION['taskText'];

$username = FormValidation::__safeString($username);
$task = FormValidation::__safeString($task);

$task_DB = R::dispense('tasks');

$task_DB->email = $email;
$task_DB->name  = $username;
$task_DB->task  = $task;
$task_DB->completed = "Нет";

R::store($task_DB);

echo "<script>location.href = '../../index.php?p=1';</script>";
