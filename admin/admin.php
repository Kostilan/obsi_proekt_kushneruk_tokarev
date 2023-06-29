<?php
// Подключение БД
include("../connect.php");
// Подключение шапки
include("../header.php");

if (!isset($_SESSION['user']['role']) || $_SESSION['user']['role'] == 2 || $_SESSION['user']['role'] == 3) {
    header('Location: /');
    exit;
}
?>
<div class="container-admin">
    <h1>Добавления комнаты</h1>
    <form action="addRoomDB.php" method="POST" enctype="multipart/form-data">
        <div class="form-control">
            <label class="form-label" for="title">Название:</label>
            <input class="input" type="text" id="title" name="title" required placeholder="Введите название" pattern="^[А-Яа-яЁё\s]+${1,100}"><br>
        </div>
        <div class="form-control">
            <label class="form-label" for="quantity">Количество:</label>
            <input class="input" type="text" id="quantity" name="quantity" required placeholder="Введите количество" pattern="^[0-9]+${1,3}"><br>
            </div>
            <div class="form-control">
            <label class="form-label" for="description">Описание:</label>
            <textarea class="input" id="description" name="description" required placeholder="Введите описание" pattern="^[А-Яа-яЁё\s]+${1,500}"></textarea><br>
            </div>
            <div class="form-control">
            <label class="form-label" for="photo">Фото:</label>
            <input class="input" type="file" id="photo" name="photo" required><br>
            </div>
            <div class="form-control">
            <label class="form-label" for="cost">Стоимость:</label>
            <input class="input" type="text" id="cost" name="cost" required placeholder="Введите стоимость" pattern="^[0-9]+${1,10}"><br>
            </div>
            <div class="form-control">
            <label class="form-label" for="location">Местоположение:</label>
            <input class="input" type="text" id="location" name="location" required placeholder="Введите описание" pattern="^[А-Яа-яЁё\s]+${1,100}"><br>
            </div>

            <input  class="button yellow" type="submit" value="Добавить">
    </form>
</div>
<?php

// Вывод списка комнат
$query = "SELECT `id_room`, `title_room`, `quantity`, `description`, `photo`, `cost`, `location` FROM `rooms` WHERE 1";
$result = mysqli_query($con, $query);

if ($result) {
    $num_rows = mysqli_num_rows($result);

    if ($num_rows > 0) {
        while ($row = mysqli_fetch_assoc($result)) { ?>
            <div class="container-admin">
            <?php
            echo "ID: " . $row['id_room'] . "<br>";
            echo "Название: " . $row['title_room'] . "<br>";
            echo "Количество: " . $row['quantity'] . "<br>";
            echo "Описание: " . $row['description'] . "<br>";
            echo "Фото: <img src='../" . $row['photo'] . "' width='200' height='200'><br>";
            echo "Стоимость: " . $row['cost'] . "<br>";
            echo "Местоположение: " . $row['location'] . "<br>";
            ?> 
            <a href="editRoom.php?id=<?=$row["id_room"]?>" class="link-admin yellow">Редактировать</a>
           <a href="deleteRoom.php?delete=true&id=<?=$row["id_room"]?>" class="link-admin red">Удалить</a>
           </div>
           <br>
            <?php
           
        }
    } else {
        echo "<script>alert('Нет данных!');location.href='/';";
    }
} else {
    echo "<script>alert('Ошибка выполнения запроса: " . mysqli_error($con) . "');location.href='/';";
}
// Закрываем БД
mysqli_close($con);
?>