<?php
// Подключение БД
include("../connect.php");
// Подключение шапки
include("../header.php");

if (!isset($_SESSION['user']['role']) || $_SESSION['user']['role'] == 2 || $_SESSION['user']['role'] == 3) {
    header('Location: /');
    // echo $_SESSION['user']['role'];
    exit;
}

// Проверяем, есть ли параметр id в URL
if (isset($_GET['id'])) {
    // Получаем id из URL
    $id = $_GET['id'];

    // Выполняем запрос к базе данных для получения данных о комнате с указанным id
    $query = "SELECT * FROM `rooms` WHERE `id_room` = $id";
    $result = mysqli_query($con, $query);

    // Проверяем успешность выполнения запроса и наличие записи
    if ($result && mysqli_num_rows($result) > 0) {
        // Получаем данные о комнате
        $row = mysqli_fetch_assoc($result);
      

        // Выводим форму для редактирования записи
        ?>
    <div class="container-admin">
        <h1>Редактирование комнаты</h1>
        <form action="editRoomDB.php" method="POST" enctype="multipart/form-data">
            <div class="form-control">
                <label class="form-label" for="title">Название:</label>
                <input class="input" type="text" id="title" name="title" value="<?php echo $row['title_room']; ?>"><br>
            </div>
            <div class="form-control">
                <label class="form-label" for="quantity">Количество:</label>
                <input class="input" type="text" id="quantity" name="quantity" value="<?php echo $row['quantity']; ?>"><br>
            </div>
            <div class="form-control">
                <label class="form-label" for="description">Описание:</label>
                <textarea class="input" id="description" name="description"><?php echo $row['description']; ?></textarea><br>
            </div>
            <div class="form-control">
                <label class="form-label" for="photo">Фото:</label>
                <input class="input" type="file" id="photo" name="photo"><br>
            </div>
            <div class="form-control">
                <label class="form-label" for="cost">Стоимость:</label>
                <input class="input" type="text" id="cost" name="cost" value="<?php echo $row['cost']; ?>"><br>
            </div>
            <div class="form-control">
                <label class="form-label" for="location">Местоположение:</label>
                <input class="input" type="text" id="location" name="location" value="<?php echo $row['location']; ?>"><br>
            </div>  
            <input type="text" name="id_room" id="invisible-input" value="<?=$id?>" style="display: none;">
                <input class="button yellow" type="submit" value="Изменить">
            <a class="link-admin red" href="admin.php">Отмена</a>
        </form>
    </div>
        <?php
    } else {
        echo "<script>alert('Запись не найдена');location.href='/admin/admin.php';</script>";
    }

    // Освобождаем память от результата запроса
    mysqli_free_result($result);
} else {
    echo "<script>alert('Не указан ID записи.');location.href='/admin/admin.php';</script>";
}

// Закрываем соединение с базой данных
mysqli_close($con);
?>
