<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "login";
	$conn = mysqli_connect('localhost','root','','login');

	$sql = "SELECT * FROM landing order by id ASC limit 10";
	$result = mysqli_query($conn , $sql) or die("Bad Query : $sql");
?>

<!DOCTYPE html>
<html>
<head>
	<title>Research Library</title>
    	   <meta charset="UTF-8">
         <meta name="viewport" content="width=device-width, initial-scale=1">
          <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
          <link rel="stylesheet" href="select.css" type="text/css">
</head>
<body>
	      <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
				  	<a class="navbar-brand" href=""><img src="upload/IT-securitytalks.gif" alt="logo" style="width:220px;"></a>
			  </nav>
      		  <h2 style="text-align: center; font-size: 45px; color:white; background-color:black; padding-bottom: 30px;padding-top: 20px;  font-family:  Merriweather;" >The Professional Research Library</h2>
            <br>
            <form class="form-inline" method="POST" action="index1.php" >
                <div class="container">
                  <div class="input-group col-xs-12" style="padding-left:140px;" >
                    <input type="text" class="form-control" style="height:45px;" placeholder="Search Research Whitepaper With Title here..." name="keyword" required="required" value="<?php echo isset($_POST['keyword']) ? $_POST['keyword'] : '' ?>"/>
                    <span class="input-group-btn">
                      <button class="btn btn-primary" style="height:45px;" name="search"><span class="glyphicon glyphicon-search"></span></button>
                    </span>
                  </div>
                </div>
            </form>
			      <br>
            <hr>
            <div id="content">              		
			      <?php
      			   if (mysqli_num_rows($result) > 0 ) {
        			    while ($row = mysqli_fetch_array($result)) {
            ?>
            <section >
                <div class="container" >
                    <div class="row">
                        <div class="col-xs-8 col-sm-3" style= "width: 23rem; "  id="myTable">
                          <div class="card" style="border:solid white; border-width: 13px; border-radius: 10px;">
                              <a class="img-card">
                                <img style="width:174px; height: 190px;" src= "upload/<?php echo $row['image'] ?>">
                              </a>
                              <div class="card-content">  
                                <span  style=" height:30px; text-align: center;" class="text" style=" font-family:  Merriweather;">
                                    <?php echo $row['title'] ?>
                                </span>
                              </div>
                              <div class="card-read-more btn btn-link btn-block" style=" font-family:  Merriweather;font-weight: 600;">
                                <?php
                                  echo "<a href='landing.php?id={$row['id']}'><h5>{$row['butt']}</h5></a>\n"; ?>
                              </div>
                          </div>
                        </div>             
                  			<?php 
                			      }
                		      }else {
              			        echo "<h3>No Search Found</h3> ";
                		      }
                        ?>
      	            </div>
                </div>
              </section>
              </div>
              <br>
              <br>
              <br>
              <div>
              <hr style="border-top: 1px solid black;">
              <footer style="font-size: 16px; color: black; ">
                <div class="footer-copyright text-center py-3">© 2021 Copyright : 
                  <a href="http://itsecuritytalks.com/"> itsecuritytalks.com</a>
                </div>
              </footer>
              </div>
</body>
</html>
    