<!-- Шапка -->
<?php
  include("header.php");
  // Подключение к БД
include("connect.php");
  $id_user = $_SESSION['user']["id_user"];
  // Запрос
$query_user = "SELECT surname, name, patronymic, photo FROM users WHERE `id_user`=$id_user";
$result_user = mysqli_fetch_array(mysqli_query($con,$query_user));
?>
<div class="container">
  <div class="account-photo">
    <img src="<?=$result_user["photo"]?>" alt="Ваша аватарка">
  </div>
  <form action="accountDB.php" method="POST" enctype="multipart/form-data">
  <div class="form-account">
    <label for="photo" class="form-label">Выберете фото</label> <br>
    <input class="" type="file" name="photo" id="photo" required>
</div>
<br>
    <button class="button" type="submit" class="btn-">Отправить</button>
  </form>
  <h2>
      <?php echo $result_user["surname"]," ",$result_user["name"]," ",$result_user["patronymic"];
      ?>
  </h2>
</div>