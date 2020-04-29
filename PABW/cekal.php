<?php 
session_start();
if (!isset($_SESSION["login"])) {
  header("Location:login.php");
  exit;
}



require_once 'dbcon.php';
// Code for record deletion


// Code for record deletion
if(isset($_REQUEST['del']))
{
//Get row id
$uid=intval($_GET['del']);
//Qyery for deletion
$sql = "delete from listmembantu WHERE  id=:id";
// Prepare query for execution
$query = $dbh->prepare($sql);
// bind the parameters
$query-> bindParam(':id',$uid, PDO::PARAM_STR);
// Query Execution
$query -> execute();
// Mesage after updation
echo "<script>alert('Record Updated successfully');</script>";
// Code for redirection
echo "<script>window.location.href='cekal.php'</script>";
}
 ?>



<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <style type="text/css">
    	


.navbar-nav a span:hover{
 color: #dc2d4e;
}


.header{
	color: #3c3568;;
}

    </style>

    <title>Cekal Korona</title>
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


<div style="background-color: #eceff8; " class="header" >
<div class="container">
<div class="row">
<div class="col-md-12">
<h3 style="margin-top: 100px; text-align: center; font-weight: bold; ">Mari Bersama Membantu Melawan Corona</h3> 
<iframe style="margin-top: 30px; margin-bottom: 30px"  class="mx-auto d-block" width="560" height="315" src="https://www.youtube.com/embed/FbUo6P44HII" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
<p class="text-center" style="font-weight: bold;">INDONESIA SIAP SIAGA.<br>Ayo Bersama Kita CEKAL (Cegah Tangkal) Corona atau sering disebut dengan Covid-19.</p><div class="text-center">
<p>&#10004;  
Cuci tangan Anda secara teratur selama 20 detik.</p>
     <p>&#10004; Tutupi hidung dan mulut Anda dengan masker sekali pakai.</p>
     <p> &#10004; Hindari kontak dekat (1 meter atau 3 kaki) dengan orang-orang.</p>
</div>
<div class="container" style="margin-top: 50px">
	<h4  style="font-weight: bold;">BANTUAN</h4>
<p>Bagi teman teman yang ingin membantu dan memberikan sedikit hartanya untuk bantuan pencegahn corona, kamu dapat me-list nama atau mengisi data di bawah ini. Bantuan tersebut akan kami berikan kepada tenaga kesehatan di RS rujukan Corona , Keluarga dhuafa yang terisolasi , dan fasilitas publik (Penyemprotan Disinfektan). Terimakasih </p><hr />
<a href="insert.php"><button style="background-color: #dc2d4e; color: white; margin-bottom: 8px; margin-top: -7px"  class="btn "> Insert Name</button></a>
<div class="table-responsive">
<table id="mytable" class="table table-bordred table-striped"  style="color: #3c3568;">
<thead>
<th>#</th>
<th>First Name</th>
<th>Last Name</th>
<th>Email</th>
<th>Contact</th>
<th>Address</th>
<th>Insert Date</th>
<th>Edit</th>
<th>Delete</th>
</thead>
<tbody>
<?php
$sql = "SELECT FirstName,LastName,EmailId,ContactNumber,Address,PostingDate,id from listmembantu";
//Prepare the query:
$query = $dbh->prepare($sql);
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
<!-- Display Records -->
    <tr>
    <td><?php echo htmlentities($cnt);?></td>
    <td><?php echo htmlentities($result->FirstName);?></td>
    <td><?php echo htmlentities($result->LastName);?></td>
    <td><?php echo htmlentities($result->EmailId);?></td>
    <td><?php echo htmlentities($result->ContactNumber);?></td>
    <td><?php echo htmlentities($result->Address);?></td>
    <td><?php echo htmlentities($result->PostingDate);?></td>
<td><a href="update.php?id=<?php echo htmlentities($result->id);?>"><button  class="btn btn-primary btn-xs"><i class="fa fa-pencil" style="color: white"></i></button></a></td>
<td><a href="cekal.php?del=<?php echo htmlentities($result->id);?>"><button class="btn btn-danger btn-xs" onClick="return confirm('Do you really want to delete');"><i style="color: white" class="fa fa-trash"></i></button></a></td>
    </tr>
<?php
// for serial number increment
$cnt++;
}} ?>
</tbody>
</table>
</div>
</div>
</div>
</div>
</div>
</div>



<div style="background-color: #eceff8; padding-top: 50px; padding-bottom: 50px">
  <hr>
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

<footer style="background-color: #3c3568" >
  
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