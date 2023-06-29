<?php
// подключение БД
include("connect.php");
// Вытаскиваем id клиента
session_start();
$id_client = $_SESSION["user"]["id_user"];

// Проверяем на пустоту отправленной формы
if(!empty($_POST)){
    $date_booking = htmlentities($_POST["date_booking"]);
    $time_booking = htmlentities($_POST["time_booking"]);
    $phone = htmlentities($_POST["phone"]);
    $date = date("Y:m:d");
    $id_room = htmlentities($_POST["id_room"]);
    // Запрос на создание заявки
    $query = "INSERT INTO `orders`(`id_order`, `id_client`, `id_employee`, `phone`, `date`, `date_booking`, `time_booking`, `room`) 
    VALUES (null, '$id_client','3','$phone','$date','$date_booking','$time_booking', '$id_room' )";
    $result = mysqli_query($con, $query);
    if($result){  
        $id_order = mysqli_insert_id($con); // Получаем последний вставленный ID
        // Запрос на создание статуса заявки
        $query_status = "INSERT INTO `order_status`(`id_order`, `id_status`, `date`) VALUES ('$id_order','1','$date')";
        $result_status = mysqli_query($con, $query_status);
        // Проверяем, успешно ли выполнен запрос на создание статуса заявки
        if ($result_status) {
            echo "<script>alert('Вы отправили заявку! Ожидайте ответа на странице Мои заявки.');location.href='/myOrders.php';</script>";
        } else {
            echo "<script>alert('Возникла ошибка, попробуйте снова.');</script>";
            echo mysqli_error($con);
            echo $query_status;
        }
    } else {
        echo "<script>alert('Возникла ошибка, попробуйте снова.');location.href='/index.php';</script>";
        echo mysqli_error($con);
        echo $query;
    }
}
?>
