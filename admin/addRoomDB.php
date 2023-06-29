<?php
// Подключение БД
include("../connect.php");
// Обработка добавления комнаты
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $quantity = $_POST['quantity'];
    $description = $_POST['description'];
    $cost = $_POST['cost'];
    $location = $_POST['location'];

    if (isset($_FILES['photo']) && $_FILES['photo']['error'] === UPLOAD_ERR_OK) {
        $photo = $_FILES['photo'];
        $tempFilePath = $photo['tmp_name'];
        $newFileName = uniqid() . '_' . $photo['name'];
        $newFilePath = '../img/catalog/' . $newFileName;

        if (move_uploaded_file($tempFilePath, $newFilePath)) {
            $insertQuery = "INSERT INTO `rooms` (`title_room`, `quantity`, `description`, `photo`, `cost`, `location`) VALUES ('$title', '$quantity', '$description', '$newFilePath', '$cost', '$location')";
            $insertResult = mysqli_query($con, $insertQuery);

            if ($insertResult) {
                echo "<script>alert('Запись успешно добавлена.');location.href='/admin/admin.php';</script>";
            } else {
                echo "<script>alert('Ошибка при добавлении записи: " . addslashes(mysqli_error($con)) . "');location.href='/admin/admin.php';</script>";
            }
        } else {
            echo "<script>alert('Ошибка при загрузке файла.');location.href='/admin/admin.php';</script>";
        }
    } else {
        $insertQuery = "INSERT INTO `rooms` (`title_room`, `quantity`, `description`, `cost`, `location`) VALUES ('$title', '$quantity', '$description', '$cost', '$location')";
        $insertResult = mysqli_query($con, $insertQuery);

        if ($insertResult) {
            echo "<script>alert('Запись успешно добавлена.');location.href='/admin/admin.php';</script>";
        } else {
            echo "<script>alert('Ошибка при добавлении записи: " . addslashes(mysqli_error($con)) . "');location.href='/admin/admin.php';</script>";
        }
    }
} else {
    echo "<script>alert('Ошибка при добавлении записи: " . addslashes(mysqli_error($con)) . "');location.href='/admin/admin.php';</script>";
}

?>