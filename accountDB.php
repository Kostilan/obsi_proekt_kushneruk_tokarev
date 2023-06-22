<?php
// Сессия
session_start();
// Подключение к БД
include("connect.php");
  $id_user = $_SESSION['user']["id_user"];

// Установка аватарки
if(!empty($_FILES)){
  $photo = htmlentities($_FILES["photo"]["tmp_name"]);
  // $tmp_name = htmlentities($_FILES["photo"]["tmp_name"]);
  // $photo_name = 'img/user/' . htmlentities($_FILES["photo"]["name"]);
  $file = "img/user/".$_FILES["photo"]["name"];
  $query_photo = "UPDATE `users` SET `photo`='$file' WHERE `id_user`=$id_user";
  $result_photo = mysqli_query($con,$query_photo);
  if($result_photo){
    move_uploaded_file($_FILES["photo"]["tmp_name"],$file);
    // echo $tmp_name;
  }
  else{
    echo "<script>alert('Ошибка добавления, попробуйте снова!');
    location.href='account.php';
    </script>";
  }
}
?>
