<?php
session_start();
$user_role = empty($_SESSION["user"]["role"])?false:$_SESSION["user"]["role"];
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
        <img src="/img/icon/play-game-svgrepo-com.svg" alt="">
        <h3>Странные дела</h3>
        <nav>
            <ul class="list-navigation">
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
                <?php if(!$user_role){
              ?>
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
                <?php } else { ?>
                <li>
                    <button class="header-button">
                        <a href="orders.php">Мои заявки</a>
                    </button>
                </li>
                <li>
                    <button class="header-button">
                        <a href="logout.php">Выход</a>
                    </button>
                </li>
                <?php } ?>
            </ul>
        </nav>
    </header>