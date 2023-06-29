<?php
// Подключение БД
include("../connect.php");
// Подключение шапки
include("../header.php");

if (!isset($_SESSION['user']['role']) || $_SESSION['user']['role'] == 2 || $_SESSION['user']['role'] == 3) {
    header('Location: /');
    // echo $_SESSION['user']['role'];
    exit;
}

// Проверяем, есть ли параметр id в URL
if (isset($_GET['id'])) {
    // Получаем id из URL
    $id = $_GET['id'];
    echo $id;

    // Выполняем запрос к базе данных для получения данных о пользователе с указанным id
    $query = "SELECT * FROM `users` WHERE `id_user` = $id";
    $result = mysqli_query($con, $query);

    // Проверяем успешность выполнения запроса и наличие записи
    if ($result && mysqli_num_rows($result) > 0) {
        // Получаем данные о пользователе
        $row = mysqli_fetch_assoc($result);
?>
<div class="container-admin">
    <h1>Редактирование сотрудников</h1>
        <form action="editEmployeeDB.php" method="POST">
            <div class="form-control">
                <label class="form-label" for="surname">Фамилия:</label>
                <input class="input" type="text" id="surname" name="surname" value="<?php echo $row['surname']; ?>" required placeholder="Введите фамилию" pattern="^[А-Яа-яЁё\s]+${1,50}"><br>
            </div>
            <div class="form-control">
                <label class="form-label" for="name">Имя:</label>
                <input class="input" type="text" id="name" name="name" value="<?php echo $row['name']; ?>" required placeholder="Введите имя" pattern="^[А-Яа-яЁё\s]+${1,50}"><br>
            </div>
            <div class="form-control">
                <label class="form-label" for="patronymic">Отчество:</label>
                <input class="input" type="text" id="patronymic" name="patronymic" value="<?php echo $row['patronymic']; ?>" required placeholder="Введите отчетсво" pattern="^[А-Яа-яЁё\s]+${1,50}"><br>
            </div>
            <div class="form-control">
                <label class="form-label" for="birthday">Дата рождения:</label>
                <input class="input" type="date" id="birthday" name="birthday" value="<?php echo $row['birthday']; ?>" required><br>
            </div>
            <div class="form-control">
                <label class="form-label" for="email">Email:</label>
                <input class="input" type="email" id="email" name="email" value="<?php echo $row['email']; ?>" required placeholder="Введите почту" pattern="{1,100}"><br>
            </div>
            <div class="form-control">
                <label class="form-label" for="login">Логин:</label>
                <input class="input" type="text" id="login" name="login" value="<?php echo $row['login']; ?>" required placeholder="Введите логин" pattern="[a-zA-Z0-9]+{1,100}"><br>
            </div>
            <div class="form-control">                
                <label class="form-label" for="password">Пароль:</label>
                <input class="input" type="password" id="password" name="password" value="<?php echo $row['password']; ?>" required placeholder="Введите пароль" pattern="{6,100}"><br>
            </div>
            <div class="form-control">
                <label class="form-label" for="phone">Телефон:</label>
                <input class="input" type="text" id="phone" name="phone" value="<?php echo $row['phone']; ?>" required placeholder="Введите телефон" pattern="[\+0-9\s()-]{12,12}"><br>
            </div><br><br>
       <input type="text" name="id_employee" id="invisible-input" value="<?=$id;?>" style="display: none;">
                <input class="button yellow" type="submit" value="Изменить">
                <a class="link-admin red" href="checkEmployee.php">Отмена</a>
        </form>
    <br>
   <?php
    }

    // Освобождаем память от результата запроса
    mysqli_free_result($result);
} else {
    echo "Не указан ID пользователя.";
}

// Закрываем соединение с базой данных
mysqli_close($con);
?>
