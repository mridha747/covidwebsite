<?php 
session_start();
if (!isset($_SESSION["login"])) {
  header("Location:login.php");
  exit;
}
// include database connection file

require_once'dbcon.php';
if(isset($_POST['insert']))
{
// Posted Values
$fname=$_POST['firstname'];
$lname=$_POST['lastname'];
$emailid=$_POST['emailid'];
$contactno=$_POST['contactno'];
$address=$_POST['address'];
// Query for Insertion
$sql="INSERT INTO listmembantu(FirstName,LastName,EmailId,ContactNumber,Address) VALUES(:fn,:ln,:eml,:cno,:adrss)";
//Prepare Query for Execution
$query = $dbh->prepare($sql);
// Bind the parameters
$query->bindParam(':fn',$fname,PDO::PARAM_STR);
$query->bindParam(':ln',$lname,PDO::PARAM_STR);
$query->bindParam(':eml',$emailid,PDO::PARAM_STR);
$query->bindParam(':cno',$contactno,PDO::PARAM_STR);
$query->bindParam(':adrss',$address,PDO::PARAM_STR);
// Query Execution
$query->execute();
// Check that the insertion really worked. If the last inserted id is greater than zero, the insertion worked.
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
// Message for successfull insertion
echo "<script>alert('Record inserted successfully');</script>";
echo "<script>window.location.href='cekal.php'</script>";
}
else
{
// Message for unsuccessfull insertion
echo "<script>alert('Something went wrong. Please try again');</script>";
echo "<script>window.location.href='cekal.php'</script>";
}
}
 ?>


 <!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <style type="text/css">
    	


.navbar-nav a span:hover{
 color: #dc2d4e;
}


.bus input{
	background-color: #f0f0f0;
}

.header{
	color: #3c3568;;
}

    </style>

    <title>Insert Data</title>
  </head>
  <body>



  <nav class="navbar navbar-expand-lg fixed-top" style="background-color: #ebeff9; opacity: 0.8">
    <div class="container">  <a class="navbar-brand" href="#"><img src="img/mrku.png" style="height: 40px"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"><img src="img/menu.png" style="width: 27px; height: 27px" ></span>
  </button>
  <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
    <div class="navbar-nav" style="font-weight: bold;">
      <a class="nav-item nav-link active" href="index.php" style="color: #a42f93"><span>Home</span></a>
      <a class="nav-item nav-link" href="info.php" style="color: #a42f93  "><span>Info Corona</span></a>
        <a class="nav-item nav-link" style="color: #a42f93" href="cekal.php"><span>Cekal Korona<span></a>
      <a class="nav-item nav-link" style="color: #a42f93" href="logout.php"><span>Logout<span></a>
     
    </div>
  </div>
  </div>
</nav>

<div style="background-color: #eceff8;">

<div class="container header">
<div class="row header">
<div class="col-md-12" style="margin-top: 100px">
<h3>Silahkan di isi Data dibawah ini, Terimakasih</h3>
<hr />
</div>
</div>
<form name="insertrecord" class="
header" method="post">
<div class="row">
<div class="col-md-6"><b>First Name</b>
<input type="text" name="firstname" class="form-control" required>
</div>
<div class="col-md-6"><b>Last Name</b>
<input type="text" name="lastname" class="form-control" required>
</div>
</div>
<div class="row">
<div class="col-md-6"><b>Email id</b>
<input type="email" name="emailid" class="form-control" required>
</div>
<div class="col-md-6"><b>Contactno</b>
<input type="text" name="contactno" class="form-control" maxlength="13" required>
</div>
</div>
<div class="row">
<div class="col-md-12"><b>Address</b>
<textarea class="form-control" name="address" required></textarea>
</div>
</div>
<div class="row" style="margin-top:1%">
<div class="col-md-8">
	<button type="submit" class="btn btn-primary" name="insert" value="Submit">Submit</button>

</div>
</div>
</form>
</div>
</div>
</div>

<div style="background-color: #eceff8; padding-top: 50px; padding-bottom: 50px">
  
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <img src="img/mrku.png">
        <p style="color: #3c3568">Website MR InfoCorona adalah situs dalam memberikan <br>informasi dan saran kesehatan
coronavirus (COVID-19),<br> dari cara mencegah dan melindungi diri dari penyakit. <br>Dan MR InfoCorona juga menyediakan informasi terkini<br> kasus corona di Indonesia dan Negara lainnya.</p>
      </div>


       <div class="col-md-3">
         <p class="h5  pt-3" style="color: #3c3568">Contact Us</p>
        <p style="color: #3c3568; ">Jl. Manunggal Perum CMB G.14 <br>Pekanbaru Riau</p><p style="color: #3c3568; ">mridha747@gmail.com</p><p style="color: #3c3568;margin-bottom: 20px">+62822 6737 0810</p>
       </div>

       <div class="col-md-3 bajaye">
           <p class="h5  pt-3" style="color: #3c3568">Navigation</p>
         <p ><a href="index.php"><span style="color: #3c3568">Home</span></a></p>
         <p ><a href="info.php"><span style="color: #3c3568">Info Corona</span></a></p>
         <p ><a href="cekal.php"><span style="color: #3c3568">Cekal Corona</span></a></p>
       </div>


      </div>
    </div>
  </div>
</div>

<footer style="background-color: #3c3568">
  
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <p class="text-center" style="padding-top: 10px; padding-bottom: 10px; margin-top: 10px; color: white">Copyrigth 2020 Muhammad Ridha</p>
      </div>
    </div>
  </div>
</footer>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>