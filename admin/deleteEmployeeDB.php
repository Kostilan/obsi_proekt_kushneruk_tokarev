<?php
include("../connect.php");
session_start();

if (!isset($_SESSION['user']['role']) || $_SESSION['user']['role'] == 2 || $_SESSION['user']['role'] == 3) {
    header('Location: /');
    // echo $_SESSION['user']['role'];
    exit;
}

// Проверяем, есть ли параметр id в URL
if (isset($_GET['id'])) {
    // Получаем id из URL
    $id = $_GET['id'];

    // Выполняем запрос к базе данных для удаления записи пользователя
    $deleteQuery = "DELETE FROM `users` WHERE `id_user` = $id";
    $deleteResult = mysqli_query($con, $deleteQuery);

    if ($deleteResult) {
        echo "<script>alert('Запись успешно удалена.');location.href='/admin/checkEmployee.php';</script>";
    } else {
        echo "<script>alert('Ошибка при удалении записи: " . mysqli_error($con) . "');location.href='/admin/admin.php';</script>";
    }
} else {
    echo "<script>alert('Не указан ID пользователя.');location.href='/admin/checkEmployee.php';</script>";
}

// Закрываем соединение с базой данных
mysqli_close($con);
?>
