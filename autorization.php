<!-- Шапка -->
<?php
  include("header.php");
if(isset($_SESSION["user"])){
echo "<script>location.href='/';</script>";
}else{

?>
<div class="container-form">
    <h3>ВХОД</h3>
    <form action="/autorizationDB.php" method="POST">
      <div class="form-control">
        <label for="login" class="form-label">Логин</label> <br>
        <input class="input" type="text" name="login" class="form-control" id="login" placeholder="Введите ваш логин" required pattern="[A-Za-z]{1,200}">
      </div>
      <div class="form-control">
        <label for="password" class="form-label">Пароль</label> <br>
        <input class="input" type="password" name="password" class="form-control" id="password" placeholder="Введите ваш пароль" required pattern="{6,200}">
      </div>
      <br>
      <button class="button" type="submit" class="btn btn-primary">Войти</button>
    </form>
    <p>Еще не авторизовались? <a href="/registration.php">Зарегистрируйтесь</a></p>
</div>  
<!-- Подвал -->
<?php
include("footer.php");
}
?>