<?php
// Подключение БД
include("../connect.php");

// Проверяем, были ли отправлены данные формы для редактирования
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Получаем значения из формы
    $id = $_POST["id_room"];
    $title = $_POST['title'];
    $quantity = $_POST['quantity'];
    $description = $_POST['description'];
    $cost = $_POST['cost'];
    $location = $_POST['location'];

    // Проверяем, было ли загружено новое фото
    if (isset($_FILES['photo']) && $_FILES['photo']['error'] === UPLOAD_ERR_OK) {
        // Получаем информацию о загруженном файле
        $photo = $_FILES['photo'];
        $tempFilePath = $photo['tmp_name'];
        $newFileName = uniqid() . '_' . $photo['name'];
        $newFilePath = '../img/' . $newFileName;

        // Перемещаем загруженный файл в новое место
        if (move_uploaded_file($tempFilePath, $newFilePath)) {
            // Обновляем путь к фото в базе данных
            $updateQuery = "UPDATE `rooms` SET `title_room`='$title', `quantity`='$quantity', `description`='$description', `photo`='$newFilePath', `cost`='$cost', `location`='$location' WHERE `id_room` = $id";
            $updateResult = mysqli_query($con, $updateQuery);

            if ($updateResult) {
                // Запись успешно обновлена, перенаправляем пользователя на страницу с обновленной информацией
                echo "<script>alert('Запись успешно изменена!');location.href='/admin/admin.php';</script>";
                exit;
            } else {
                echo "<script>alert('Ошибка при обновлении записи: " .  addslashes(mysqli_error($con)) . "');location.href='/admin/admin.php';</script>";
            }
        } else {
            echo "<script>alert('Ошибка при загрузке файла.');location.href='/admin/admin.php';</script>";
        }
    } else {
        // Новое фото не было загружено, обновляем остальные данные комнаты без изменения фото
        $updateQuery = "UPDATE `rooms` SET `title_room`='$title', `quantity`='$quantity', `description`='$description', `cost`='$cost', `location`='$location' WHERE `id_room` = $id";
        $updateResult = mysqli_query($con, $updateQuery);

        if ($updateResult) {
            // Запись успешно обновлена, перенаправляем пользователя на страницу с обновленной информацией
            echo "<script>alert('Запись успешно изменена!');location.href='/admin/admin.php';</script>";
            exit;
        } else {
            echo "<script>alert('Ошибка при обновлении записи: " .  addslashes(mysqli_error($con)) . "');location.href='/admin/admin.php';</script>";
        }
    }
}
?>