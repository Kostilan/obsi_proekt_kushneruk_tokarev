<?php
// Подключение к БД
include("connect.php");
$id_room = empty($_GET["id_room"])?false:$_GET["id_room"];
// echo $id_event; 
if($id_room){
    $sql_room = "SELECT * FROM rooms where id_room =" . $id_room;
    $result_room = mysqli_query($con, $sql_room);
    $room = mysqli_fetch_assoc($result_room);
    // $date = date("d.m.Y", strtotime($event["date"]));
    // var_dump($event);
    // echo $sql_event;
    // echo mysqli_error($con);
}
else{
    echo "<script>alert('Товар не выбран!');
    location.href='/';
    </script>";
    // echo mysqli_error($con);
    // var_dump($sql_product);
}
// Шапка  
include("header.php");
?>
<div class="content">
    <div class="room">
            <img src="<?=$room["photo"]?>" alt="Комната">
            <div class="room-content">
                <p>Общая информация:</p>
                <p>Название: <?=$room["title_room"];?></p>
                <p>Вместительность: <?=$room["quantity"];?> человек</p>
                <p>Цена: <?=$room["cost"];?>₽</p>
                <p>Описание: <br><?=$room["description"];?></p>
                <p>Адрес: <?=$room["location"];?></p>
                <a href="" class="btn">Забронировать</a>
                
            </div>
  </div>
    </div>
</div>
<!-- Подвал -->
<?php
include("footer.php");
?>