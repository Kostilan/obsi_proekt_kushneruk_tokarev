<!-- Шапка -->
<?php
include("header.php");
// Подключение к БД
include("connect.php");
// Запрос на выборку товаров
 $sql_room = "SELECT * FROM rooms";

// echo mysqli_error($con);
$id_filter = empty($_POST["filter"])?false:$_POST["filter"];
if($id_filter){
    if($id_filter != "0"){
        if($id_filter == "1"){
        $sql_room.=" ORDER BY `rooms`.`quantity` ASC "; 
        }
        if($id_filter == "2"){
            $sql_room.=" ORDER BY `rooms`.`cost` ASC"; 
        }
        if($id_filter == "3"){
            $sql_room.="  ORDER BY `rooms`.`location` ASC"; 
        }
        if($id_filter == "4"){
            $sql_room.="  ORDER BY `rooms`.`title_room` ASC"; 
        }
        
    }
}
$result_rooms = mysqli_query($con, $sql_room);
$rooms = $result_rooms->fetch_all(MYSQLI_ASSOC);
 ?> 
<div class="container">
    <h3>
       Комнаты
    </h3>
    <div class="filter">
            <form action="#" method="post">
                <select name="filter">
                    <option value="0">Все комнаты</option>
                    <option value="1">По вместительности</option>
                    <option value="2">По цене</option>
                    <option value="3">По адресу</option>
                    <option value="4">По назваию</option>
                </select>
                <button class="btn" type="submit">Применить</button>
            </form>
        </div>
    <div class="cards">
<?php
foreach($rooms as $room){
    // echo $room["id_event"];
    ?>
    <div class="card" style="width: 15rem;">
  <img src="<?=$room["photo"]?>" class="card-img-top" alt="Комната">
  <div class="card-body">
    <h5 class="card-title"><?=$room["title_room"];?></h5>
    <p class="card-text"><?=$room["cost"];?>₽</p>
    <a class="card-buttom" href="room.php?id_room=<?=$room["id_room"]?>">Подробнее</a>
  </div>
</div>
    <?php
}
?>
    </div>
</div>


<!-- Подвал -->
<?php
include("footer.php");
?>