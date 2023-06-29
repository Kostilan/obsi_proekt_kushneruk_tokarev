<?php
// Шапка
include("header.php");
// Проверка ссесии
if(!empty($user_role)){
    if($user_role == 2){
?>
<div class="container-form">
    <h2>Заявка на бронь</h2>
    <!-- Форма -->
    <form action="roomOrderDB.php" method="POST">
    <div class="form-control">
        <label for="phone" class="form-label">Номер телефона</label> <br>
        <input class="input" type="text" name="phone" class="form-control" id="phone" placeholder="Введите ваш телефон" required pattern="[\+0-9\s()-]{12,12}">
      </div>
      <div class="form-control">
        <label for="date_booking" class="form-label">Дата брони</label> <br>
        <input class="input" type="date" name="date_booking" class="form-control" id="date_booking" required>
      </div>
      <div class="form-control">
        <label for="time_booking" class="form-label">Время брони</label> <br>
        <input class="input" type="time" name="time_booking" class="form-control" id="time_booking"  required>
      </div>
      <input type="hidden" name="id_room" value=<?=$_GET["id_room"]?>>
      <button class="button" type="submit" class="btn btn-primary">Отправить</button>
    </form>
</div>
<!-- подвал -->
<?php
include("footer.php");
} else{
    echo "<script>alert('Авторизируйтесь как клиент!');location.href='autorization.php';</script>";
} } else{
    echo "<script>alert('Авторизируйтесь!');location.href='autorization.php';</script>";
    // var_dump($user_role);
}
?>