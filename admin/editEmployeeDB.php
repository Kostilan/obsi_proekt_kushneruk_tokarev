<?php
// Подключение БД
include("../connect.php");

// Проверяем, были ли отправлены данные формы для редактирования
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

            var_dump($_GET);
$id = $_POST["id_employee"];
 // Выполняем запрос к базе данных для получения данных о пользователе с указанным id
 $query = "SELECT * FROM `users` WHERE `id_user` = $id";
 $result = mysqli_query($con, $query);

 // Проверяем успешность выполнения запроса и наличие записи
 if ($result && mysqli_num_rows($result) > 0) {
     // Получаем данные о пользователе
     $row = mysqli_fetch_assoc($result);

            // Проверяем, были ли изменены данные
            if ($surname === $row['surname'] && $name === $row['name'] && $patronymic === $row['patronymic']
                && $birthday === $row['birthday'] && $email === $row['email'] && $login === $row['login']
                && $password === $row['password'] && $phone === $row['phone']) {
                    echo "<script>alert('Данные не изменены. Сохранены прежние значения.');location.href='/admin/checkEmployee.php';</script>";
            } else {
                // Обновляем данные пользователя в базе данных
                $updateQuery = "UPDATE `users` SET `surname`='$surname', `name`='$name', `patronymic`='$patronymic', `birthday`='$birthday', `email`='$email', `login`='$login', `password`='$password', `phone`='$phone' WHERE `id_user` = $id";
                $updateResult = mysqli_query($con, $updateQuery);

                if ($updateResult) {
                    echo "<script>alert('Данные успешно обновлены!');location.href='/admin/checkEmployee.php';</script>";
                } else {
                    echo "<script>alert('Ошибка при обновлении данных: " . addslashes(mysqli_error($con)) . "');location.href='/admin/checkEmployee.php';</script>";
                }
            }
        }
        // Выводим форму для редактирования данных пользователя
     else {
        echo "<script>alert('Пользователь не найден.');location.href='/admin/checkEmployee.php';</script>";
    } }
?>