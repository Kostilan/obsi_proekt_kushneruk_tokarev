<?php
// Подключение шапки
include("../header.php");
if (!isset($_SESSION['user']['role']) || $_SESSION['user']['role'] == 2 || $_SESSION['user']['role'] == 1) {
    header('Location: /');
    // echo $_SESSION['user']['role'];
    exit;
}
// Подключение к БД
include("../connect.php");
if (isset($_GET['id_order'])) {
    $id_order = $_GET['id_order'];
    // Обновление статуса заявки
    $sql_update_status = "UPDATE `order_status` SET id_status = 2 WHERE id_order = $id_order";
    mysqli_query($con, $sql_update_status);
    echo "<script>alert('Статус заявки изменен!');location.href='/employee/employee.php';</script>";
}
          
        else {
            echo "<script>alert('Произошла ошибка при изминении статуса заяки! Повторите позднее.');location.href='/employee/employee.php';</script>";
        }
        ?>