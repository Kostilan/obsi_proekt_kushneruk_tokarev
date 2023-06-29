<?php
// Шапка
include("header.php");
?>
<div class="container-form">
    <h2>Регистрация</h2>
    <!-- Форма -->
    <form action="registrationDB.php" method="POST">
    <div class="form-control">
        <label for="name" class="form-label">Фамилия</label> <br>
        <input class="input" type="text" name="name" class="form-control" id="name" placeholder="Введите вашу фамилию" required pattern="^[А-Яа-яЁё\s]+${1,50}">
      </div>
      <div class="form-control">
        <label for="surname" class="form-label">Имя</label> <br>
        <input class="input" type="text" name="surname" class="form-control" id="surname" placeholder="Введите ваше имя" required pattern="^[А-Яа-яЁё\s]+${1,50}">
      </div>
      <div class="form-control">
        <label for="patronymic" class="form-label">Отчество</label> <br>
        <input class="input" type="text" name="patronymic" class="form-control" id="patronymic" placeholder="Введите ваше отчество" pattern="^[А-Яа-яЁё\s]+${1,50}">
      </div>
      <div class="form-control">
        <label for="login" class="form-label">Логин</label> <br>
        <input class="input" type="text" name="login" class="form-control" id="login" placeholder="Введите ваш логин" required pattern="[a-zA-Z0-9]+{1,100}">
      </div>
      <div class="form-control">
        <label for="password" class="form-label">Пароль</label> <br>
        <input class="input" type="password" name="password" class="form-control" id="password" placeholder="Введите ваш пароль" required pattern="{6,100}">
      </div>
      <div class="form-control">
        <label for="password_repeat" class="form-label">Повтор пароля</label> <br>
        <input class="input" type="password" name="password_repeat" class="form-control" id="password_repeat" placeholder="Повторите пароль" required pattern="{6,100}">
      </div>
      <div class="form-control">
        <label for="email" class="form-label">Почта</label> <br>
        <input class="input" type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Введите вашу почту" required pattern="{1,100}">
      </div>
      <div class="form-control">
        <label for="birthday" class="form-label">Дата рождения</label> <br>
        <input class="input" type="date" name="birthday" class="form-control" id="birthday" required>
      </div>
      <div class="form-control">
        <label for="phone" class="form-label">Телефон</label> <br>
        <input class="input" type="text" name="phone" class="form-control" id="phone" placeholder="Введите ваш телефон" required pattern="[\+0-9\s()-]{12,12}">
      </div>
      <button class="button" type="submit" class="btn btn-primary">Регистрация</button>
    </form>
</div>
<!-- подвал -->
<?php
include("footer.php");
?>