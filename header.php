<?php
session_start();
$user_role = empty($_SESSION["user"]["role"])?false:$_SESSION["user"]["role"];
// Подключение БД
include("connect.php");
// Вывод сообщению пользователю, что он авторизован
if(!empty($_SESSION["user"])){
$sql_header = "SELECT login FROM `users` WHERE id_user =" . $_SESSION["user"]["id_user"];
$result_header = mysqli_query($con,$sql_header);
$login_header = mysqli_fetch_assoc($result_header);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Странные дела</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
    <header>
        <?php if(!empty($_SESSION["user"])){ ?>
        <p>Авторизированый пользователь <?=$login_header["login"]?></p>
        <?php } ?>
        <img src="/img/icon/play-game-svgrepo-com.svg" alt="">
        <h3>Антикафе "Странные дела"</h3>
        <nav>
            <ul class="list-navigation">
                <?php if(!$user_role) { ?>
                <li>
                    <button class="header-button">
                        <a href="index.php">О нас</a>
                        </button>
                </li>
                <li>
                    <button class="header-button">
                        <a href="catalog.php">Комнаты</a>
                    </button>
                </li>
                <li>
                    <button class="header-button">
                        <a href="where.php">Где нас найти</a>
                    </button>
                </li>
                <li>
                    <button class="header-button">
                        <a href="autorization.php">Вход</a>
                    </button>
                </li>
                <li>
                    <button class="header-button">
                        <a href="registration.php">Регистрация</a>
                    </button>
                </li>
                <?php }  elseif($user_role == 2) {  ?>
                    <li>
                    <button class="header-button">
                        <a href="index.php">О нас</a>
                        </button>
                </li>
                <li>
                    <button class="header-button">
                        <a href="catalog.php">Комнаты</a>
                    </button>
                </li>
                <li>
                    <button class="header-button">
                        <a href="where.php">Где нас найти</a>
                    </button>
                </li>
                <li>
                    <button class="header-button">
                        <a href="myOrders.php">Мои заявки</a>
                    </button>
                </li>
                <li>
                    <button class="header-button">
                        <a href="logout.php">Выход</a>
                    </button>
                </li>
                <?php } elseif($user_role == 1) {  ?>
                <li>
                    <button class="header-button">
                        <a href="admin.php">Управление комнатами</a>
                    </button>
                </li>
                <li>
                    <button class="header-button">
                        <a href="checkEmployee.php">Управление сотрудниками</a>
                    </button>
                </li>
                <li>
                    <button class="header-button">
                        <a href="../logout.php">Выход</a>
                    </button>
                </li>
                <?php } elseif($user_role == 3) { ?>
                    <li>
                    <button class="header-button">
                        <a href="../logout.php">Выход</a>
                    </button>
                </li>
                <li>
                    <button class="header-button">
                        <a href="employee.php">Управление заявками</a>
                    </button>
                </li>
                <li>
                    <button class="header-button">
                        <a href="check_Orders.php">Просмотр заявок</a>
                    </button>
                </li>
                <?php } ?>
            </ul>
        </nav>
    </header>