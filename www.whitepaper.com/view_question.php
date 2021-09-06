
<!DOCTYPE html>
<html>
<head>
  <title>Questions List</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body style="background: url(upload/tt.jpg);" >

<div style="padding-left:10%; color: white;">

<h2>Question List With Answers</h2>
<div class="container">
<div class="row">
<table border="2" width="60%">
  <tr>
    <td>ID</td>
    <td>Questions</td>
    <td>Answers</td>
  </tr>

<?php
$conn = mysqli_connect('localhost','root','','login');


$records = mysqli_query($conn,"select * from que"); // fetch data from database

while($data = mysqli_fetch_array($records))
{
?>
  <tr>
    <td><?php echo $data['id']; ?></td>
    <td><?php echo $data['question']; ?></td>
    <td><?php echo $data['Options']; ?></td>
  </tr>	
<?php
}
?>
</table>
<br>
<br>
       <a class="nav-link" href="admin.php" style="color: white;">Home Page</a>
      
</div>

<br>
    <br>
    

</body>

</html>
      <br>
      <br>
      <br>
      <br>  
      <br>
      <div class="copyright py-4 text-center text-white">
         <div class="container">
            <p class="lead mb-0" style="color: white; text-align: center;">Copyright © ITSecurityTalks 2021</p>
         </div>
      </div>


