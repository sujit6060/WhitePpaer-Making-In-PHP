<?php
  if(ISSET($_POST['search'])){
    $keyword = $_POST['keyword'];
?>
<div>
  <hr style="border-top:2px dotted #ccc;"/>
  <?php
    require 'conn.php';
    $query = mysqli_query($conn, "SELECT * FROM `landing` WHERE `title` LIKE '%$keyword%' ORDER BY `title`") or die(mysqli_error());
    while($fetch = mysqli_fetch_array($query)){
  ?>
  <div style="word-wrap:break-word;">
    <a href="get_blog.php?id=<?php echo $fetch['id']?>"><h4><?php echo $fetch['title']?></h4></a>
    <img style="width:190px; height: 190px;" src= "upload/<?php echo $fetch['image'] ?>">
    <div class="card-read-more btn btn-link btn-block" style=" font-family:  Merriweather;margin-top: 20px;">
        <?php
        echo "<a href='landing.php?id={$fetch['id']}'><h4>{$fetch['butt']}</h4></a>\n"; ?>
    </div>
      </div>
      <hr style="border-bottom:1px solid #ccc;"/>
      <?php
        }
      ?>
    </div>
    <?php
      }
      ?>