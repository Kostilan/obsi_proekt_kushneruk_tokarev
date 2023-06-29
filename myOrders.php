<?php
// Подключение шапки
include("header.php");
// Подключение к БД
include("connect.php");
// Вытаскиваем id клиента
session_start();
$id_client = $_SESSION["user"]["id_user"];
//  Запрос на выборку заявок
$sql_orders = "SELECT orders.id_order, date_booking, time_booking, cost, room, title_room, id_status FROM
 orders JOIN rooms ON rooms.id_room=orders.room JOIN order_status ON order_status.id_order=orders.id_order WHERE orders.id_client='$id_client'";
// echo $sql_orders;
$result_orders = mysqli_query($con, $sql_orders);
// $orders = mysqli_fetch_assoc($result_orders); 
 ?> 
<div class="container">
    <h3>
       Мои заявки
    </h3>
    <div class="orders">
<?php
while ($order = mysqli_fetch_assoc($result_orders)) {
    // print_r($order);
    // Вызов статуса
    $id_status = $order["id_status"];
    $sql_status = "SELECT title_status FROM `status_order` WHERE id_title_status_order =" . $id_status;
    $result_status = mysqli_query($con, $sql_status);
    while($status = mysqli_fetch_assoc($result_status)){
    ?>
    <div class="order" style="width: 15rem;">
      <div class="order-body">
        <p class="card-text">Заявка№<?=$order["id_order"];?></p>
        <p class="card-text">Комната№<?=$order["room"];?></p>
        <p class="card-text">Название комнаты - <?=$order["title_room"];?></p>
        <p class="card-text">Дата - <?=$order["date_booking"];?></p>
        <p class="card-text">Время - <?=$order["time_booking"];?></p>
        <p class="card-text">Сумма оплаты - <?=$order["cost"];?>₽</p>
        <p class="card-text">Статус - <?=$status["title_status"]?></p>
    </div>
</div>
    <?php
} }
?>
    </div>
</div>
<!-- Подвал -->
<?php
include("footer.php");
?>
