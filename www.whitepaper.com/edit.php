<?php
session_start();
$con = mysqli_connect('localhost','root','','login');$id =$_GET["id"];
  $title = "";
  $image = "";
  $des = "";
  $file = "";
  $id1 = "";
  $butt = "";

  $res = mysqli_query($con,"SELECT * From landing WHERE id = $id"); 
    while($row = mysqli_fetch_array($res)){
        $title = $row["title"];
        $image = $row["image"]["name"];
        $des = $row["des"];
        $file = $row["file"]["name"];
        $id1 = $row["id1"];
        $butt = $row["butt"];
    } 
?>

<!DOCTYPE html>
<html>
<head>
	<title>Landing Page</title>

    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body style="background: url(upload/tt.jpg) no-repeat center center fixed;">

      <br>
	   <form id="form-wrapper" style="max-width:600px;margin:auto;color:white; border-style: solid; padding-right: 30px;padding-left: 30px;padding-top: 30px;padding-bottom: 30px; " class="form-group" action="" method="POST" enctype="multipart/form-data">
	      <div class="form-group" >
            <h3 style="text-align: center;color: orange;">By Email</h3>
            <br>
	          <label for="exampleFormControlInput1" >Title: </label>
	          <input type="text" class="form-control" placeholder=" " name="title" value="<?php echo $title; ?>">
	      </div>
	    <div class="form-group">
	 	     <label for="exampleFormControlFile1">Upload Images:</label>
   		   <input type="file" class="form-control-file"  name="image" value="<?php echo $image; ?>">
   		</div>
   		<div class="form-group" >
		    <label for="exampleFormControlTextarea1">Description:</label>
		    <textarea class="form-control" rows="3" name="des" value="<?php echo $des; ?>" ></textarea>
		  </div>
		
		<div class="form-group" >
	      <label for="exampleFormControlSelect1">Resources:</label>
	      <select class="form-control" id="exampleFormControlSelect1">
	      <option>PDF</option>
	      <option>MP3</option>
	      <option>MP4</option>
	    </select>
  		</div>
  		<div class="form-group">
       <label for="exampleFormControlFile1">Upload File:</label>
       <input type="file" class="form-control-file" name="file" value="<?php echo $file; ?>">
      </div>
      <br>
      <div class="form-group" >
      <label for="exampleFormControlInput1" >Question Id: </label>
      <input type="text" class="form-control" placeholder=" " name="id1" value="<?php echo $id1; ?>">
     </div>
     <div class="form-group" >
      <label for="exampleFormControlInput1" >Button Type: </label>
      <input type="text" class="form-control" placeholder=" " name="butt" value="<?php echo $butt; ?>">
     </div>
     <br>
     <br>
         
	  	<div>
	     <input type="submit" name="update" class="btn btn-Success" style="color: white; background-color: black;">

	    </div>

      <br>
      <br>

  		


   	</form>



</body>
</html>

<?php

if(isset($_POST["update"]))
{
    
    $title = $_POST['title'];
  $image = $_FILES['image']['name'];
  $des = $_POST['des'];
  $file = $_FILES['file']['name'];
  $id1 = $_POST['id1'];
  $butt = $_POST['butt'];


    move_uploaded_file($_FILES['file']['tmp_name'],'upload/'.$file);
    move_uploaded_file($_FILES['image']['tmp_name'],'upload/'.$image);

 
    mysqli_query($con,"UPDATE  `landing` SET `title`= [$title],`image`= [$image],`des`= [$des],`file`= [$file] ,`butt` = [$butt] where id=$id");
  
  
    
  ?>
  
  <script type="text/javascript">
  
    window.location="view_whitepapers.php";
      
      
  </script>
  
  <?php
  
}


?>



   
