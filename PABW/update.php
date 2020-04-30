<?php session_start();
if (!isset($_SESSION["login"])) {
  header("Location:login.php");
  exit;
} ?>
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
    <a class="nav-item nav-link" style="color: #a42f93" href="https://github.com/mridha747/covidwebsite/tree/master/PABW"><span>Github<span></a>
      <a class="nav-item nav-link" style="color: #a42f93" href="logout.php"><span>Logout<span></a>
     
    </div>
  </div>
  </div>
</nav>
<?php

// include database connection file
require_once'dbcon.php';
if(isset($_POST['update']))
{
// Get the userid
$userid=intval($_GET['id']);
// Posted Values
$fname=$_POST['firstname'];
$lname=$_POST['lastname'];
$emailid=$_POST['emailid'];
$contactno=$_POST['contactno'];
$address=$_POST['address'];
// Query for Updation
$sql="update listmembantu set FirstName=:fn,LastName=:ln,EmailId=:eml,ContactNumber=:cno,Address=:adrss where id=:uid";
//Prepare Query for Execution
$query = $dbh->prepare($sql);
// Bind the parameters
$query->bindParam(':fn',$fname,PDO::PARAM_STR);
$query->bindParam(':ln',$lname,PDO::PARAM_STR);
$query->bindParam(':eml',$emailid,PDO::PARAM_STR);
$query->bindParam(':cno',$contactno,PDO::PARAM_STR);
$query->bindParam(':adrss',$address,PDO::PARAM_STR);
$query->bindParam(':uid',$userid,PDO::PARAM_STR);
// Query Execution
$query->execute();
// Mesage after updation
echo "<script>alert('Record Updated successfully');</script>";
// Code for redirection
echo "<script>window.location.href='cekal.php'</script>";
}
// Get the userid
$userid=intval($_GET['id']);
$sql = "SELECT FirstName,LastName,EmailId,ContactNumber,Address,PostingDate,id from listmembantu where id=:uid";
//Prepare the query:
$query = $dbh->prepare($sql);
//Bind the parameters
$query->bindParam(':uid',$userid,PDO::PARAM_STR);
//Execute the query:
$query->execute();
//Assign the data which you pulled from the database (in the preceding step) to a variable.
$results=$query->fetchAll(PDO::FETCH_OBJ);
// For serial number initialization
$cnt=1;
if($query->rowCount() > 0)
{
//In case that the query returned at least one record, we can echo the records within a foreach loop:
foreach($results as $result)
{
?>
<div style="background-color: #eceff8 ; padding-top: 100px ">
<div class="container header">
  <div class="row header">
<div class="col-md-12" >
<h3>Silahkan Mengubah Data</h3>
<hr />
<form name="insertrecord" class="header" method="post">
<div class="row">
<div class="col-md-6"><b>First Name</b>
<input type="text" name="firstname" value="<?php echo htmlentities($result->FirstName);?>" class="form-control" required>
</div>
<div class="col-md-6"><b>Last Name</b>
<input type="text" name="lastname" value="<?php echo htmlentities($result->LastName);?>" class="form-control" required>
</div>
</div>
<div class="row">
<div class="col-md-6"><b>Email id</b>
<input type="email" name="emailid" value="<?php echo htmlentities($result->EmailId);?>" class="form-control" required>
</div>
<div class="col-md-6"><b>Contactno</b>
<input type="text" name="contactno" value="<?php echo htmlentities($result->ContactNumber);?>" class="form-control" maxlength="10" required>
</div>
</div>
<div class="row">
<div class="col-md-12"><b>Address</b>
<textarea class="form-control" name="address" required><?php echo htmlentities($result->Address);?></textarea>
</div>
</div>
<?php }} ?>
<div class="row" style="margin-top:1%">
<div class="col-md-8">
  <button type="submit" class="btn btn-primary" name="update" value="Update">Update</button>
</div>
</div>
</form>

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
          <p ><a href="https://github.com/mridha747/covidwebsite/tree/master/PABW"><span style="color: #3c3568">Github</span></a></p>
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