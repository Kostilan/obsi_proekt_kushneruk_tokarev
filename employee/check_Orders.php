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

// Запрос на выборку всех заявок клиентов
$sql_orders = "SELECT orders.id_order, date_booking, time_booking, cost, room, title_room, id_status, users.surname, users.name, users.patronymic
    FROM orders
    JOIN rooms ON rooms.id_room = orders.room
    JOIN order_status ON order_status.id_order = orders.id_order
    JOIN users ON users.id_user = orders.id_client";

$result_orders = mysqli_query($con, $sql_orders);
?>

<div class="container">
    <h3>
        Заявки клиентов
    </h3>
    <div class="orders">
        <?php
        // Проверка наличия результатов
        if (mysqli_num_rows($result_orders) > 0) {
            while ($order = mysqli_fetch_assoc($result_orders)) {
                // Вызов статуса
                $id_status = $order["id_status"];
                $sql_status = "SELECT title_status FROM `status_order` WHERE id_title_status_order =" . $id_status;
                $result_status = mysqli_query($con, $sql_status);
                $status = mysqli_fetch_assoc($result_status);
                ?>
                <div class="order" style="width: 15rem;">
                    <div class="order-body">
                        <p class="card-text">Заявка №<?=$order["id_order"];?></p>
                        <p class="card-text">ФИО клиента - <?=$order["surname"];?> <?=$order["name"];?> <?=$order["patronymic"];?></p>
                        <p class="card-text">Название комнаты - <?=$order["title_room"];?></p>
                        <p class="card-text">Дата - <?=$order["date_booking"];?></p>
                        <p class="card-text">Время - <?=$order["time_booking"];?></p>
                        <p class="card-text">Сумма оплаты - <?=$order["cost"];?>₽</p>
                        <p class="card-text">Статус - <?=$status["title_status"]?></p>
                    </div>
                </div>
                <?php
            }
        } else {
            echo "Нет доступных заявок.";
        }
        ?>
    </div>
</div>

<!-- Подвал -->
<?php
include("../footer.php");
?>