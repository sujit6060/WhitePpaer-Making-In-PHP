<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" name="viewport" content="width=device-width"/>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css"/>
	</head>
<body>
	
	<div class="col-md-3"></div>
	<div class="col-md-6 well">
		<hr style="border-top:1px dotted #ccc;"/>
		<a href="select.php" class="btn btn-success">Back</a>
		<?php
			require 'conn.php';
			if(ISSET($_REQUEST['id'])){
				$query = mysqli_query($conn, "SELECT * FROM `landing` WHERE `id` = '$_REQUEST[id]'") or die(mysqli_error());
				$fetch = mysqli_fetch_array($query);
		?>    
		   <h3><?php echo $fetch['title']?></h3>
		   <img src= "upload/<?php echo $fetch['image'] ?>">
				<p><?php echo nl2br($fetch['des'])?></p>
				<div class="card-read-more btn btn-link btn-block" style=" font-family:  Merriweather;margin-top: 20px;">
                                <?php
                               echo "<a href='landing.php?id={$fetch['id']}'><h4>{$fetch['butt']}</h4></a>\n"; ?>
                            </div>

                           <div class="container" >
                <div class="row">
                    <div class="col-xs-12 col-sm-2" style= "width: 23rem;" >
                        <div class="card" style="border:solid #D4D4D4; border-width: 5px; border-radius: 10px; position: relative;">
                            <a class="img-card">
                            <img style="width:190px; height: 190px;" src= "upload/<?php echo $fetch['image'] ?>">
                          </a>
                            <div class="card-content">  
                                <span  style="width:170px; height:60px; text-align: center;" class="text" style=" font-family:  Merriweather;">
                                    <?php echo $fetch['title'] ?>
                                </span>
                            </div>
                            <div class="card-read-more btn btn-link btn-block" style=" font-family:  Merriweather;margin-top: 20px;">
                                <?php
                               echo "<a href='landing.php?id={$fetch['id']}'><h4>{$fetch['butt']}</h4></a>\n"; ?>
                            </div>
                        </div>
		<?php
			}
		?>
 
	</div>
</body>
</html>