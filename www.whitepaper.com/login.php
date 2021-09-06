
<?php
if(count($_POST)>0) {
$conn = mysqli_connect("localhost","root","","login");
$result = mysqli_query($conn,"SELECT * FROM login WHERE username = '" . $_POST["username"] . "' and password = '". $_POST["password"]."'");
$count  = mysqli_num_rows($result);
if($count==0) {
echo '<script>alert("Invalid Username or Password")</script>';
} else {
echo'<script>alert("")</script>';
header('location:admin.php');
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Login</title>
    <style>
        body{
            background-image: url("upload/tt.jpg");
            margin-top:100px;
        }
        form{
            
            width: 400px;
            margin: 0 auto;
            border:5px solid rgba(230, 233, 232, 0.87);
            padding:20px;
            color: lightyellow;
        
        }
    </style>
</head>
<body>

    <form action="" method="POST">
        <br>
        <div class="form-group">
            <label for="username">Username</label>
            <input class="form-control" type="text" name="username" id="uname"required>
        </div>
        <br>
        <div class="form-group">
        <label for="password">Password</label>
            <input class="form-control" type="password" name="password" id="pword"required>
        </div>
        <br>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
            <label class="form-check-label" for="inlineCheckbox1">Remember Me !</label>
          </div>
        <br>
        <br>
        <div>
            <button class="btn btn-primary type="Submit" value="Submit" name="submit">Submit</button>
        </div>
    </form>
    
</body>
</html>