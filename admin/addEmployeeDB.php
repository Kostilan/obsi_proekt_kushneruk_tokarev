<?php
// Подключение БД
include("../connect.php");
// Проверяем, были ли отправлены данные формы для добавления записи
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Получаем значения из формы
    $surname = $_POST['surname'];
    $name = $_POST['name'];
    $patronymic = $_POST['patronymic'];
    $birthday = $_POST['birthday'];
    $email = $_POST['email'];
    $login = $_POST['login'];
    $password = $_POST['password'];
    $phone = $_POST['phone'];

    // Устанавливаем роль в 3
    $role = 3;

    // Выполняем запрос к базе данных для добавления новой записи пользователя
    $insertQuery = "INSERT INTO `users` (`surname`, `name`, `patronymic`, `birthday`, `email`, `login`, `password`, `phone`, `role`)
                    VALUES ('$surname', '$name', '$patronymic', '$birthday', '$email', '$login', '$password', '$phone', $role)";
    $insertResult = mysqli_query($con, $insertQuery);

    if ($insertResult) {
        echo "<script>alert('Запись успешно добавлена.');location.href='/admin/checkEmployee.php';</script>";
    } else {
        echo "<script>alert('Ошибка при добавлении записи: " . addslashes(mysqli_error($con)) . "');location.href='/admin/checkEmployee.php';</script>";
    }
}
?>