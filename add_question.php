<?php
$conn = mysqli_connect('localhost','root','','login');
if (isset($_POST['sub'])) {
  $question = $_POST['question'];
  $options = $_POST['options'];
  $execute = mysqli_query($conn, "INSERT INTO `que`(`question`, `options`) VALUES ('$question','$options')");
  if ($execute) {
    echo "";
  } else {
    echo "server error";
  }
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Add Questions</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="addq.css" rel="stylesheet" alt="text/css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>

    <div class="form-body">
        <div class="row">
            <div class="form-holder">
                <div class="form-content">
                    <div class="form-items">
                        <h3>Add Questions</h3>
                        <form class="requires-validation" action="" method="POST">
                            <div class="col-md-12" >
                               <input class="form-control" type="text" name="question" placeholder="Add Questions" required>
                               
                            </div>
                            <div class="col-md-12">
                                <input class="form-control" type="text" name="options" placeholder="Options" required>
                            </div>
                            <div class="form-button mt-3">
                                <button id="" type="submit" name="sub" class="btn btn-primary" onclick="myFunction()">Submit</button>
                                    <script>
                                        function myFunction() {
                                          alert("Question and Answer Added");}
                                    </script>
                            </div>
                            <br>
                            <br>
                            <div>
                             <a class="nav-link" href="admin.php" style="color: white;">Home Page</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="copyright py-4 text-center text-white">
         <div class="container">
            <p class="lead mb-0" style="color: white;">Copyright © ITSecurityTalks 2021</p>
         </div>
    </div>
</body>
</html>
