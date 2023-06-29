<?
// Подключение БД
include("../connect.php");
// Обработка удаления комнаты
if (isset($_GET['delete']) && $_GET['delete'] === 'true' && isset($_GET['id'])) {
    $id = $_GET['id'];
    $deleteQuery = "DELETE FROM `rooms` WHERE `id_room` = $id";
    $deleteResult = mysqli_query($con, $deleteQuery);

    if ($deleteResult) {
        echo "<script>alert('Запись успешно удалена.');location.href='/admin/admin.php';</script>";
    } else {
        echo "<script>alert('Ошибка при удалении записи: " . mysqli_error($con) . "');location.href='/admin/admin.php';</script>";
    }
}
?>