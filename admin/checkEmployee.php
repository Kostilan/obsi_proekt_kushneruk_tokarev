<?php
// Подключение БД
include("../connect.php");
// Подключение шапки
include("../header.php");
if (!isset($_SESSION['user']['role']) || $_SESSION['user']['role'] == 2 || $_SESSION['user']['role'] == 3) {
    header('Location: /');
    // echo $_SESSION['user']['role'];
    exit;
} ?>
<div class="container-admin">
    <h1>Добавления сотрудников</h1>
        <form action="addEmployeeDB.php" method="POST">
            <div class="form-control">
                <label class="form-label" for="surname">Фамилия:</label>
                <input class="input" type="text" id="surname" name="surname" required placeholder="Введите фамилию" pattern="^[А-Яа-яЁё\s]+${1,50}"><br>
            </div>
            <div class="form-control">
                <label class="form-label" for="name">Имя:</label>
                <input class="input" type="text" id="name" name="name" required placeholder="Введите имя" pattern="^[А-Яа-яЁё\s]+${1,50}"><br>
            </div>
            <div class="form-control">
                <label class="form-label" for="patronymic">Отчество:</label>
                <input class="input" type="text" id="patronymic" name="patronymic" required placeholder="Введите отчетсво" pattern="^[А-Яа-яЁё\s]+${1,50}"><br>
            </div>
            <div class="form-control">
                <label class="form-label" for="birthday">Дата рождения:</label>
                <input class="input" type="date" id="birthday" name="birthday" required><br>
            </div>
            <div class="form-control">
                <label class="form-label" for="email">Email:</label>
                <input class="input" type="email" id="email" name="email" required placeholder="Введите почту" pattern="{1,100}"><br>
            </div>
            <div class="form-control">
                <label class="form-label" for="login">Логин:</label>
                <input class="input" type="text" id="login" name="login" required placeholder="Введите логин" pattern="[a-zA-Z0-9]+{1,100}"><br>
            </div>
            <div class="form-control">                
                <label class="form-label" for="password">Пароль:</label>
                <input class="input" type="password" id="password" name="password" required placeholder="Введите пароль" pattern="{6,100}"><br>
            </div>
            <div class="form-control">
                <label class="form-label" for="phone">Телефон:</label>
                <input class="input" type="text" id="phone" name="phone" required placeholder="Введите телефон" pattern="[\+0-9\s()-]{12,12}"><br>
            </div>
                <input class="button yellow" type="submit" value="Добавить">
        </form>
    <br>
<?php
// Выполняем запрос к базе данных для получения данных
$query = "SELECT `id_user`, `surname`, `name`, `patronymic`, `birthday`, `email`, `login`, `password`, `phone`, `role` FROM `users` WHERE role=3";
$result = mysqli_query($con, $query);

// Проверяем успешность выполнения запроса
if ($result) {
    // Получаем количество записей
    $num_rows = mysqli_num_rows($result);

    if ($num_rows > 0) {
        // Выводим данные
        while ($row = mysqli_fetch_assoc($result)) { ?>
        <div class="container-admin">
        <?php
            // Выводим значения полей
            echo "ID пользователя: " . $row['id_user'] . "<br>";
            echo "Фамилия: " . $row['surname'] . "<br>";
            echo "Имя: " . $row['name'] . "<br>";
            echo "Отчество: " . $row['patronymic'] . "<br>";
            echo "Дата рождения: " . $row['birthday'] . "<br>";
            echo "Email: " . $row['email'] . "<br>";
            echo "Логин: " . $row['login'] . "<br>";
            echo "Пароль: " . $row['password'] . "<br>";
            echo "Телефон: " . $row['phone'] . "<br>";
            ?> 
            <a href="editEmployee.php?id=<?=$row['id_user'];?>" class="link-admin yellow">Редактировать</a>
            <a href="deleteEmployeeDB.php?id=<?=$row['id_user']?>" class="link-admin red">Удалить</a>
            <br><br>
        </div>
        <?php
        }
    } else {
        echo "Нет данных";
    }
} else {
    echo "Ошибка выполнения запроса: " . mysqli_error($con);
}
// Закрываем соединение с базой данных
mysqli_close($con);
?>