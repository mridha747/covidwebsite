<?php 
session_start();
if (!isset($_SESSION["login"])) {
  header("Location:login.php");
  exit;
}

require 'api.php';
 ?>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <style type="text/css">
      
      .jumbotron{

 
  overflow: hidden;
  height: 600px;  

}


.bajaye p a span:hover{
  color: #dc2d4e;
  text-decoration: none;
}

.navbar-nav a span:hover{
 color: #dc2d4e;
}


.my-custom-scrollbar {
position: relative;
height: 600px;
overflow: auto;
}
.table-wrapper-scroll-y {
display: block;
}

    </style>


    <title>INFO CORONA</title>
  </head>
  <body>
  
  <nav class="navbar navbar-expand-lg fixed-top" style="background-color: #ebeff9; opacity: 0.8">
    <div class="container">  <a class="navbar-brand" href="#"><img src="img/mrku.png" style="height: 40px"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span  class="navbar-toggler-icon"><img src="img/menu.png" style="width: 27px; height: 27px" ></span>
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




<div style="background-color: #ebeff9" >
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-sm-12 "  style="margin-top: 100px">
<h1>STAY HOME</h1>
<p style="font-size: 100px; color: #3c3466; margin-top: -40px; font-weight: bold;">STAY SAFE</p>
<p>Hey Kamuu, jangan bandel yaa!! Inilah masa kamu buat rebahan dirumah. Mari Bersama sama kita membantu pihak medis dengan meminimalisir persebaran Virus Corona ini yang salah satunya STAY HOME. Dengan adanya website ini Kamu dapat memantau data siaga corona di negeri kita maupun luar negeri yang update dan langsung terintegrasi dengan data KEMENKES RI dan JHU (John Hopkins University).</p>

</div>
      <div class="col-md-6 col-sm-12">
         <img src="img/info1.png" class="mx-auto d-block" style="width: 100%; height: 450px; margin-top:20px">
      </div>
      
</div>
</div>


<div class="container" >

  <div class="card shadow mb-4 bg-white" style="background-color: white">
   <h6 class="card-header p-3" style="background-color: white">Data Kasus Coronavirus di Indonesia</h6>
<div class="container" style="margin-top: 30px">
   <div class="row">
         <div class="col-md-4 col-sm-12">
        <div class="card text-white  mb-3 rounded mx-auto d-block " style="max-width: 30rem; box-shadow: 1px 1px 9px black; background-color: #f82649 ">
  
  <div class="card-body">
    <img src="img/sad1.png"  class="rounded float-right">
    <p class="card-title" style="font-size: 12px">TOTAL POSITIF</p>
    <h3 class="card-text" style="margin-top: -15px"><?php echo $data[0]->{'positif'}; ?></h3>
    <p class="card-text" style="margin-top: -5px; font-size: 12px">ORANG</p>
  </div>
</div>
     </div>
      <div class="col-md-4 col-sm-12">
         <div class="card text-white  mb-3 rounded mx-auto d-block" style="max-width: 30rem; box-shadow: 1px 1px 9px black; background-color: #09ad95">
  
  <div class="card-body">
     <img src="img/happy1.png"  class="rounded float-right">
    <p class="card-title" style="font-size: 12px">TOTAL SEMBUH</p>
    <h3 class="card-text" style="margin-top: -15px"><?php echo$data[0]->{'sembuh'};?></h3>
    <p class="card-text" style="margin-top: -5px; font-size: 12px">ORANG</p>
    
  </div>
</div>
      </div>
      <div class="col-md-4 col-sm-12">
       <div class="card text-white  mb-3 rounded mx-auto d-block" style="max-width: 30rem; box-shadow: 1px 1px 9px black; background-color: #d43f8d">
  
  <div class="card-body">
   <img src="img/crying1.png"  class="rounded float-right">
    <p class="card-title" style="font-size: 12px">TOTAL MENINGGAL</p>
    <h3 class="card-text" style="margin-top: -15px"><?php echo $data[0]->{'meninggal'}; ?></h3>
    <p class="card-text" style="margin-top: -5px; font-size: 12px">ORANG</p>
    
  </div>
</div>  
      </div>
   </div>
   </div>

  <div class="card-body">


<div class="table-wrapper-scroll-y my-custom-scrollbar">

  <table class="table table-bordered table-striped mb-0">
    <thead>
      <tr>
       <th scope="col">NO.</th>
      <th scope="col" >PROVINSI</th>
      <th scope="col">POSITIF</th>
      <th scope="col">SEMBUH</th>
      <th scope="col">MENINGGAL</th>
      </tr>
    </thead>
    <tbody>
     <?php $ip=0; ?>
<?php while ($ip <= 33) :  ?>
    <tr>
      <th scope="row"><?= $ip + 1; ?></th>
      <td><?= $dataProvinsi[$ip]->{'attributes'}->{'Provinsi'} ; ?></td>
      <td><?= $dataProvinsi[$ip]->{'attributes'}->{'Kasus_Posi'} ; ?></td>
      <td style="color: #09ad95"><?= $dataProvinsi[$ip]->{'attributes'}->{'Kasus_Semb'} ; ?></td>
       <td style="color: #d43f8d"><?= $dataProvinsi[$ip]->{'attributes'}->{'Kasus_Meni'} ; ?></td>
    </tr>
    <?php $ip++; ?>
<?php endwhile; ?>
  </tbody>
  </table>




</div>
</div>
</div>

</div>
<div class="container" >

  <div class="card shadow mb-4 bg-white" style="background-color: white">
   <h6 class="card-header p-3" style="background-color: white">Data Persebaran Kasus Virus Corona di Dunia</h6>
   <div class="container" style="margin-top: 30px">
   <div class="row">
         <div class="col-md-4 col-sm-12">
        <div class="card text-white  mb-3 rounded mx-auto d-block " style="max-width: 30rem; box-shadow: 1px 1px 9px black; background-color: #f82649 ">
  
  <div class="card-body">
    <img src="img/sad1.png"  class="rounded float-right">
    <p class="card-title" style="font-size: 12px">TOTAL POSITIF DUNIA</p>
    <h3 class="card-text" style="margin-top: -15px"><?php echo $positif_dunia->{'value'}; ?></h3>
    <p class="card-text" style="margin-top: -5px; font-size: 12px">ORANG</p>
  </div>
</div>
     </div>
      <div class="col-md-4 col-sm-12">
         <div class="card text-white  mb-3 rounded mx-auto d-block" style="max-width: 30rem; box-shadow: 1px 1px 9px black; background-color: #09ad95">
  
  <div class="card-body">
     <img src="img/happy1.png"  class="rounded float-right">
    <p class="card-title" style="font-size: 12px">TOTAL SEMBUH DUNIA</p>
    <h3 class="card-text" style="margin-top: -15px"><?php echo $sembuh_dunia->{'value'}; ?></h3>
    <p class="card-text" style="margin-top: -5px; font-size: 12px">ORANG</p>
    
  </div>
</div>
      </div>
      <div class="col-md-4 col-sm-12">
       <div class="card text-white  mb-3 rounded mx-auto d-block" style="max-width: 30rem; box-shadow: 1px 1px 9px black; background-color: #d43f8d">
  
  <div class="card-body">
   <img src="img/crying1.png"  class="rounded float-right">
    <p class="card-title" style="font-size: 12px">TOTAL MENINGGAL DUNIA</p>
    <h3 class="card-text" style="margin-top: -15px"><?php echo $meninggal_dunia->{'value'}; ?></h3>
    <p class="card-text" style="margin-top: -5px; font-size: 12px">ORANG</p>
    
  </div>
</div>  
      </div>
   </div>
   </div>
  <div class="card-body">


<div class="table-wrapper-scroll-y my-custom-scrollbar">

  <table class="table table-bordered table-striped mb-0">
    <thead>
      <tr>
       <th scope="col">NO.</th>
      <th scope="col">NEGARA</th>
      <th scope="col">POSITIF</th>
      <th scope="col">SEMBUH</th>
      <th scope="col">MENINGGAL</th>
      </tr>
    </thead>
    <tbody>
    <?php $ip=0; ?>
<?php while ($ip <= 184) :  ?>
    <tr>
      <th scope="row"><?= $ip + 1; ?></th>
      <td><?= $dataNegara[$ip]->{'attributes'}->{'Country_Region'} ; ?></td>
      <td><?= $dataNegara[$ip]->{'attributes'}->{'Confirmed'} ; ?></td>
      <td style="color: #09ad95"><?= $dataNegara[$ip]->{'attributes'}->{'Recovered'} ; ?></td>
       <td style="color: #d43f8d"><?= $dataNegara[$ip]->{'attributes'}->{'Deaths'} ; ?></td>
    </tr>

    <?php $ip++; ?>
<?php endwhile; ?>
  </tbody>
  </table>

</div>
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