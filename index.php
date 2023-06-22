<?php
// Подключение шапки
include("header.php");
// Подключение к БД
include("connect.php");
// Запрос на вывод данных из БД
$query = "SELECT * FROM `rooms` ORDER BY `rooms`.`id_room` DESC";
$result = mysqli_query($con, $query);
?>
<!-- Сладйер -->
<div class="container">
        <!-- Слоган -->
        <br>
<h3>ДОВОЛЬНЫЕ КЛИЕНТЫ НАША ЦЕЛЬ!</h3>
<div class="container-carousel">
    <div class="carousel">
      <div class="slides">
        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
        ?>
      <div class="slide"
       style="background-image: url('<?=$row['photo']?>');">
      <div class="slide-content">
          <h2><?=$row['title_room']?></h2>
        </div></div>
      <?php } } ?>
          <a class="prev" onclick="changeSlide(-1)">&#10094;</a>
      <a class="next" onclick="changeSlide(1)">&#10095;</a>
    </div>
  </div>
</div>
<!-- подвал -->
<?php
include("footer.php");
?>

<!-- 1
#FFDD2E
#5431B5

2
#CAB547
#523C8F

3
#B59B13
#311480

4
#FFE76B
#8B6CE0

5
#FFEF9B
#A792E0

-->