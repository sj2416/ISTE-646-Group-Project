<?php
require "dataLayer.class.php";

$data = new DataLayer();

$user = strip_tags(trim($_POST['username']));
$pass = strip_tags(trim($_POST['password']));

if($data->testPass($user, $pass)){
  $info = $data->getStudentByUser($user);
	session_start();
  $token = session_id();
  $data->storeToken($info[0], $token);
  $_SESSION['userId'] = $info[0];

  if($info[1] === 1)
    header("Location: professor.php");
  else
    header("Location: student.php");
}
else{
  header("Location: login.php");
}

?>