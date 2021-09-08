<?php
session_start();
$con = mysqli_connect('localhost','root','','login');
if (isset($_POST['sub'])) {
  $title = $_POST['title'];
  $image = $_FILES['image']['name'];
  $des = $_POST['des'];
  $id1 = $_POST['id1'];
  $butt = $_POST['butt'];
  $pdf_url = $_POST['pdf_url'];
  $logo = $_FILES['logo']['name'];
  $cat = $_POST['cat'];

  move_uploaded_file($_FILES['image']['tmp_name'],'upload/'.$image);
  move_uploaded_file($_FILES['logo']['tmp_name'],'upload/'.$logo);

  $execute = mysqli_query($con, "INSERT INTO `landing`(`title`, `image`, `des`, `id1` ,`butt`,`pdf_url`,`logo`,`cat` ) VALUES ('$title','$image','$des', '$id1', '$butt', '$pdf_url', '$logo', '$cat')");
  if ($execute) {
    $id =mysqli_insert_id($con);
    $_SESSION['id'] = $id;
    echo'';
  } else {
    echo "server error";
  }
} 
?>

<!DOCTYPE html>
<html>
<head>
	<title>Landing Page</title>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body style="background: url(upload/tt.jpg) no-repeat center center fixed;">

        <br>
	      <form id="form-wrapper" style="max-width:600px;margin:auto;color:white; border-style: solid; padding-right: 30px;padding-left: 30px;padding-top: 30px;padding-bottom: 30px; " class="form-group" action="" method="POST" enctype="multipart/form-data">
	          <div class="form-group" >
              <h3 style="text-align: center;color: white; font-size:40px;">By Email</h3>
              <br>
	            <label for="exampleFormControlInput1" >Title: </label>
	            <input type="text" class="form-control" placeholder=" " name="title">
	          </div>
            <br>
            <div class="form-group" >
                <label for="exampleFormControlInput1" >Category: </label>
                <input type="text" class="form-control" placeholder=" " name="cat">
            </div>
            <br>
            <div class="form-group">
                <label for="exampleFormControlFile1">Upload Images:</label>
                <input type="file" class="form-control-file"  name="image">
            </div>
            <br>
            <div class="form-group" >
                <label for="exampleFormControlTextarea1">Description:</label>
                <textarea class="form-control" rows="3" name="des"></textarea>
            </div>
            <br>    
            <div class="form-group" >
                <label for="exampleFormControlSelect1">Resources:</label>
                    <select class="form-control" id="exampleFormControlSelect1">
                      <option>PDF</option>
                      <option>MP3</option>
                      <option>MP4</option>
                    </select>
            </div>
            <br>
            <div class="form-group">
                <label for="exampleFormControlinput1">URL :</label>
                <input type="text" class="form-control" name="pdf_url">
            </div>
            <br>
            <div class="form-group" >
                <label for="exampleFormControlInput1" >Question Id: </label>
                <input type="text" class="form-control" placeholder=" " name="id1">
            </div>
            <br>
            <div class="form-group" >
                <label for="exampleFormControlInput1" >Button Type: </label>
                <input type="text" class="form-control" placeholder=" " name="butt">
            </div>
            <br>
            <div class="form-group">
                <label for="exampleFormControlFile1">Upload Logo:</label>
                <input type="file" class="form-control-file"  name="logo">
            </div>
            <br>
            <br>      
            <div>
              <input type="submit" value="Submit" name="sub" class="btn" onclick="myFunction()" style="color: white; background-color: black;">
                  <script>
                      function myFunction() {
                        alert("White Paper Added Successfully");}
                  </script>
            </div>
            <br>
            <br>
            <div>
                <a class="nav-link" href="admin.php" style="color: white;">Home Page</a>
            </div>
          </form>
          <br>
          <br>
          <div class="copyright py-4 text-center text-white">
              <div class="container">
                  <p class="lead mb-0" style="color: white;">Copyright © ITSecurityTalks 2021</p>
              </div>
          </div>
</body>
</html>



   
