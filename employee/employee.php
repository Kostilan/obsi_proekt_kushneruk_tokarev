<?php
// Подключение шапки
include("../header.php");

if (!isset($_SESSION['user']['role']) || $_SESSION['user']['role'] ==2  || $_SESSION['user']['role'] ==1 ) {
    header('Location: /');
    // echo $_SESSION['user']['role'];
    exit;
}
// Подключение к БД
include("../connect.php");
// Запрос на выборку id заявок
$sql_id_order = "SELECT id_order FROM `order_status` WHERE id_status = 1";
$result_id_order = mysqli_query($con, $sql_id_order); ?>
<div class="container">
    <h3>
       Управление заявками клиентов
    </h3>
    <div class="orders">
<?php
// Проверка наличия результатов
if (mysqli_num_rows($result_id_order) > 0) {
    while($id_order = mysqli_fetch_assoc($result_id_order)){
        // Запрос на вывод заявок со статусом 1
        $sql_order = "SELECT * FROM `orders` WHERE id_order =" . $id_order['id_order'];
        $result_order = mysqli_query($con, $sql_order);
        while ($row_order = mysqli_fetch_assoc($result_order)) { 
            // вывод данных названия комнаты и ФИО клиента
            $sql_user = "SELECT * FROM `users` WHERE id_user =" . $row_order["id_client"];
            $result_user = mysqli_query($con,$sql_user);
            $sql_room =  "SELECT * FROM `rooms` WHERE id_room =" . $row_order["room"];
            $result_room = mysqli_query($con,$sql_room);
            while (($row_user = mysqli_fetch_assoc($result_user)) && ($row_room = mysqli_fetch_assoc($result_room))) { ?>
        <div class="order" style="width: 15rem;">
            <div class="order-body">
                <p class="card-text">Заявка№<?=$row_order["id_order"];?></p>
                <p class="card-text">ФИО клиента - <?=$row_user["surname"];?> <?=$row_user["name"];?> <?=$row_user["patronymic"];?></p>
                <p class="card-text">Название комнаты - <?=$row_room["title_room"];?></p>
                <p class="card-text">Дата - <?=$row_order["date_booking"];?></p>
                <p class="card-text">Время - <?=$row_order["time_booking"];?></p>
                <p class="card-text">Сумма оплаты - <?=$row_room["cost"];?>₽</p>
            </div>
            <div class="order-button">
            <a href="employeeTrueDB.php?id_order=<?=$row_order["id_order"]?>" class="btn green">Принять</a>
            <br>
            <a href="employeeFalseDB.php?id_order=<?=$row_order["id_order"]?>" class="btn red">Отклонить</a>
            </div>
        </div>
        <?php    }
        }
    } } else {
        echo "Нет доступных заявок.";
}

?>
