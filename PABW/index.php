<?php 
session_start();
if (!isset($_SESSION["login"])) {
  header("Location:login.php");
  exit;
}
require 'api.php';
require 'dbcon.php'
 ?>
<html lang="en">
  <head>
    
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" type="text/css" href="css/animate.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css">
    <style type="text/css">
      
      .jumbotron{
  background-image:url('img/virus1.png');
  
  background-size: cover;
position: 0px 100px;
 
  overflow: hidden;
  height: 600px;  

}


.navbar-nav a span:hover{
 color: #dc2d4e;
}

.bajaye p a span:hover{
  color: #dc2d4e;
  text-decoration: none;
}




    </style>

    <title>Kawal Corona</title>
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




<div style="background-image: url(img/virus1.png); background-size: cover;">
  <div class="container">
    <h1 class="text-center" style=" color: white; padding-top: 150px; text-shadow: 1px 1px black"  >KAWAL CORONA</h1>
       <p class="text-center " style="color: white; margin-bottom: 50px; text-shadow: 1px 1px black">Coronavirus Global & Indonesia Live Data</p>

    <div class="row">
      
      <div class="col-md-3 col-sm-12">
        <div class="card text-white  mb-3 rounded mx-auto d-block " style="max-width: 30rem; box-shadow: 1px 1px 9px black; background-color: #f82649 ">
  
  <div class="card-body">
    <img src="img/sad1.png"  class="rounded float-right">
    <p class="card-title" style="font-size: 12px">TOTAL POSITIF DUNIA</p>
    <h3 class="card-text" style="margin-top: -15px"><?php echo $_SESSION['positif_dunia']; ?></h3>
    <p class="card-text" style="margin-top: -5px; font-size: 12px">ORANG</p>
  </div>
</div>
     </div>
      <div class="col-md-3 col-sm-12">
         <div class="card text-white  mb-3 rounded mx-auto d-block" style="max-width: 30rem; box-shadow: 1px 1px 9px black; background-color: #09ad95">
  
  <div class="card-body">
     <img src="img/happy1.png"  class="rounded float-right">
    <p class="card-title" style="font-size: 12px">TOTAL SEMBUH DUNIA</p>
    <h3 class="card-text" style="margin-top: -15px"><?php echo  $sembuh_dunia->{'value'}; ?></h3>
    <p class="card-text" style="margin-top: -5px; font-size: 12px">ORANG</p>
    
  </div>
</div>
      </div>
      <div class="col-md-3 col-sm-12">
       <div class="card text-white  mb-3 rounded mx-auto d-block" style="max-width: 30rem; box-shadow: 1px 1px 9px black; background-color: #d43f8d">
  
  <div class="card-body">
   <img src="img/crying1.png"  class="rounded float-right">
    <p class="card-title" style="font-size: 12px">TOTAL MENINGGAL DUNIA</p>
    <h3 class="card-text" style="margin-top: -15px"><?php echo  $meninggal_dunia->{'value'}; ?></h3>
    <p class="card-text" style="margin-top: -5px; font-size: 12px">ORANG</p>
    
  </div>
</div>  
      </div>
      <div class="col-md-3 col-sm-12">
       <div class="card text-white mb-3 rounded mx-auto d-block " style="max-width: 30rem; box-shadow: 1px 1px 9px black; background-color: #fc7303">
  
  <div class="card-body ">
     <img src="img/indonesian1.png"  class="rounded float-right">
    <h4 class="card-title">INDONESIA</h4>
    <p class="card-text" style="margin-top: -5px; font-size: 12px"><?php echo $data[0]->{'positif'}; ?> POSITIF, <?php echo $data[0]->{'sembuh'}; ?><br>SEMBUH, <?php echo $data[0]->{'meninggal'}; ?> MENINGGAL</p>
    
  </div>
</div>  
      </div>
    </div>
    <p class="text-center" style="color: white; margin-top: 70px; padding-bottom: 130px; text-shadow: 1px 1px black">Sumber data : Kementerian Kesehatan & JHU (John Hopkins University)</p>
  </div>
</div>


<div class="container">
  <div class="row">
    <div class="col-md-6 col-sm-12">
      <img src="img/ww1.png" class="mx-auto d-block" style="width: 100%; height: 600px; margin-top: 50px">
    </div>
    <div class="col-md-6 col-sm-12">
    <p class=" mt-3" style="background-color: #cfd7ec; padding: 8px; display: inline-block; border-radius: 5px; padding-right: 20px ; padding-left: 20px">Pengenalan Virus Corona </p>
    <p class="h1">Mengetahui Lebih Tentang Virus Corona (COVID-19)</p>

    <p>Infeksi virus Corona disebut COVID-19 (Corona Virus Disease 2019) dan pertama kali ditemukan di kota Wuhan, China pada akhir Desember 2019. Virus ini menular dengan sangat cepat dan telah menyebar ke hampir semua negara, termasuk Indonesia.Coronavirus adalah kumpulan virus yang bisa menginfeksi sistem pernapasan. virus ini juga bisa menyebabkan infeksi pernapasan berat, seperti infeksi paru-paru.
</p>

    <p class="h3">Cara terbaik mencegah dan menghindari terkena virus corona.</p>

     <p>&#10004;  
Cuci tangan Anda secara teratur selama 20 detik.</p>
     <p>&#10004; Tutupi hidung dan mulut Anda dengan masker sekali pakai.</p>
     <p> &#10004; Hindari kontak dekat (1 meter atau 3 kaki) dengan orang-orang.</p>
       <p>&#10004; Stay home dan self-isolate dari orang lain.</p>
        <p style="margin-bottom: 80px">&#10004; 
Lindungi diri Anda dan bantu mencegah penyebaran virus.</p>


    </div>
  </div>
  </div>

  <div style="background-color: #eceff8; " >
<div class="container" >
  <p  style="text-align: center; "><span  style="background-color: #cfd7ec;padding: 8px; display: inline-block; border-radius: 5px; padding-right: 20px ; padding-left: 20px; margin-top: 40px";>Penyebaran Virus</span></p>
  <h2 class="text-center">Bagaimana Virus Menyebar ?</h2>
  <p class="text-center">World Health Organization (WHO) mengungkap 3 cara penyebaran virus corona, sebagai berikut :  </p>
  
  <div class="row" >
   
    <div class="col-md-4 col-sm-12">

<div class="card bg-dark text-white mt-2">
  <img src="img/back.png" class="card-img" alt="...">
  <div class="card-img-overlay">
    <img class="mx-auto d-block" style=" margin-top: 50px; margin-bottom: 40px" src="img/cont1.png">
    <h5 class="card-title text-center" >
Kontak Manusia</h5>
    <p class="card-text text-center">Tangan menyentuh banyak permukaan dan dapat membawa virus. Setelah terkontaminasi, tangan dapat memindahkan virus saat adanya kontak fisik.</p>
    
  </div>
</div>
    </div>
    <div class="col-md-4 col-sm-12">
    <div class="card bg-dark text-white mt-2">
  <img src="img/back.png" class="card-img" alt="...">
  <div class="card-img-overlay">
    <img class="mx-auto d-block" style=" margin-top: 50px; margin-bottom: 40px" src="img/satu1.png">
    <h5 class="card-title text-center" >
Transmisi Udara</h5>
    <p class="card-text text-center">Tetesan kecil yang keluar dari hidung atau mulut ketika mereka yang terinfeksi virus bersin atau batuk, dapat menyebarkan virus.</p>
    
  </div>
</div>
    </div>

    <div class="col-md-4 col-sm-12">
     <div class="card bg-dark text-white mt-2" style="margin-bottom: 80px">
  <img src="img/back.png" class="card-img" alt="...">
  <div class="card-img-overlay">
    <img class="mx-auto d-block" style=" margin-top: 50px; margin-bottom: 40px" src="img/onj1.png">
    <h5 class="card-title text-center" >Objek yang Terkontaminasi</h5>
    <p class="card-text text-center">Benda ataupun Permukaan yang telah terkontaminasi oleh virus baik dari tetesan kecil atau kontak fisik, dapat menyebarkan virus.</p>
    
  </div>
</div>
    </div>
  </div>
  </div>
  </div>

  <div class="container" style="margin-bottom: 70px">
    <p  style="text-align: center; "><span  style="background-color: #cfd7ec;padding: 8px; display: inline-block; border-radius: 5px; padding-right: 20px ; padding-left: 20px; margin-top: 40px";>
Pencegahan Virus Corona</span></p>
  <h2 class="text-center">Bagaimana Pencegahan Terpenting agar Tetap Aman ? </h2>
  <p class="text-center">Terdapat Beberapa Pencegahan yang harus dan tidak seharusnya <br>kamu lakukan, sebagai berikut :  </p>
  <div class="row">
    <div class="col-md-6 col-sm-12">
    <div class="card shadow mb-4 bg-white " style="width: 100%;">
  <div class="card-header " style="background-color: #362f62; ">
    <h3 class="text-center" style="color: #ffffff; padding-top: 10px; padding-bottom: 10px">Hal yang Harus Anda Lakukan</h3>
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item " ><img src="img/11.png" style=" float: left;  ">
   <h5 style="margin-left: 120px">
Cuci Tangan Anda Selama 20 Detik</h5>
   <p style="margin-left: 120px">Tangan banyak menyentuh permukaan sehingga dapat membawa virus. Dengan mencuci tangan, maka kamu dapat mencegah virus masuk melalui mata ataupun hidung saat menyentuhnya. </p></li>
     <li class="list-group-item " ><img src="img/222.png" style=" float: left;  ">
   <h5 style="margin-left: 120px">
Kenakan Masker Saat Pergi ke Luar</h5>
   <p style="margin-left: 120px">Sesuai hasil penelitian masker dapat menangkal virus sebesar 70%, hal ini agar dapat menutup wajah di bagian mulut dan hidung dari partikel udara terkontaminasi virus.</p></li>
     <li class="list-group-item " ><img src="img/33.png" style=" float: left;  ">
   <h5 style="margin-left: 120px">
Menutup Hidung dan Mulut Saat Bersin</h5>
   <p style="margin-left: 120px">Dengan menutup mulut saat bersin atau batuk bisa mencegah penyebaran virus ke orang lain. Kamu dapat menggunakan tisu, sapu tangan maupun masker.</p></li>
    <li class="list-group-item " ><img src="img/44.png" style=" float: left;  ">
   <h5 style="margin-left: 120px">Mengonsumsi Makanan & Minuman Bergizi</h5>
   <p style="margin-left: 120px">Konsumsi makanan bergizi yang baik sangat penting dalam membentuk sistem imun tubuh yang kuat. Sehingga bisa memberikan perlindungan ekstra bagi tubuh Anda dari berbagai virus penyakit.</p></li>
   
  </ul>
</div>
    </div>
    <div class="col-md-6 col-sm-12">
      
    <div class="card shadow mb-4 bg-white " style="width: 100%;">
  <div class="card-header " style="background-color: #dc2d4e  ; ">
    <h3 class="text-center" style="color: #ffffff; padding-top: 10px; padding-bottom: 10px">
Hal yang Tidak Harus Anda Lakukan</h3>
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item " ><img src="img/55.png" style=" float: left;  ">
   <h5 style="margin-left: 120px; color: #dc2d4e">Jangan Makan Hewan Berbahaya</h5>
   <p style="margin-left: 120px">Virus corona diduga berasal dari hewan berbahaya. Virus dapat berpindah dari hewan ke manusia dengan berbagai cara, salah satunya melalui makanan. Seperti tikus, ular dan kalelawar.</p></li>
     <li class="list-group-item " ><img src="img/66.png" style="float: left;  ">
   <h5 style="margin-left: 120px;color: #dc2d4e">Hindari Kontak Fisik dengan Orang Sakit</h5>
   <p style="margin-left: 120px">Virus corona bisa menular melalui kontak fisik dengan orang yang terinfeksi. Itu sebabnya, ada baiknya mengurangi kontak fisik, seperti bersalaman, berciuman, atau pelukan. </p></li>
     <li class="list-group-item " ><img src="img/77.png" style=" float: left;  ">
   <h5 style="margin-left: 120px;color: #dc2d4e">
Jangan Sentuh Wajah atau Hidung Anda</h5>
   <p style="margin-left: 120px">Virus dapat masuk ke dalam tubuh, melalui 3 gerbang utama, yaitu hidung, mulut, dan mata. Maka ada baiknya untuk mengurangi kebiasaan memegang wajah. </p></li>
    <li class="list-group-item " ><img src="img/88.png" style=" float: left;  ">
   <h5 style="margin-left: 120px;color: #dc2d4e">
Hindari Tempat Ramai</h5>
   <p style="margin-left: 120px">Social distancing atau memberikan jarak dapat mengurangi penyebaran virus corona, cara paling mudah yaitu menghindari tempat ramai, seperti mal, pasar, bioskop, kantor sekolah dan tempat lainnya yang bersifat ramai.</p></li>
   
  </ul>
</div>
    </div>
  </div>


</div>


  <div style="background-color: #3c3568; " >
<div class="container" >
  <p  style="text-align: center; "><span  style="background-color: #cfd7ec;padding: 8px; display: inline-block; border-radius: 5px; padding-right: 20px ; padding-left: 20px; margin-top: 40px";>
Cuci Tangan</span></p>
  <h2 class="text-center" style="color: white">Ikuti Langkah-langkah Mencuci Tangan</h2>
  <p class="text-center" style="color: white; margin-bottom: 50px">Berikut adalah langkah-langkah mencuci tangan dengan baik :  </p>


  <div class="row" >
   
    <div class="col-md-3">
<img src="img/njay.png" class="mx-auto d-block pb-2">
<p class="h5" style="color: white; text-align: center; text-decoration: bold">
Basahi Tanganmu</p>
</p>
    </div>

    <div class="col-md-3">
    <img src="img/21.png" class="mx-auto d-block pb-2">
<p class="h5" style="color: white; text-align: center; text-decoration: bold">
Gunakan Sabun</p>
    </div>

    <div class="col-md-3">
    <img src="img/22.png" class="mx-auto d-block pb-2">
<p class="h5" style="color: white; text-align: center; text-decoration: bold">
Gosokkan Sabun ke Telapak Tangan</p>
    </div>

     <div class="col-md-3">
    <img src="img/23.png" class="mx-auto d-block pb-2">
<p class="h5" style="color: white; text-align: center; text-decoration: bold">
Gosok Punggung Tangan</p>
    </div>
  </div>

  <div class="row pt-4" >
   
    <div class="col-md-3">
<img src="img/26.png" class="mx-auto d-block pb-2">
<p class="h5" style="color: white; text-align: center; text-decoration: bold">
Gosok Antara Jari-jari</p>
</p>
    </div>

    <div class="col-md-3">
    <img src="img/27.png" class="mx-auto d-block pb-2">
<p class="h5" style="color: white; text-align: center; text-decoration: bold">
Gosok Bagian Belakang Jari</p>
    </div>

    <div class="col-md-3">
    <img src="img/28.png" class="mx-auto d-block pb-2">
<p class="h5" style="color: white; text-align: center; text-decoration: bold">
Gosok Ibu Jari Secara Memutar </p>
    </div>

     <div class="col-md-3">
    <img src="img/29.png" class="mx-auto d-block pb-2">
<p class="h5" style="color: white; text-align: center; text-decoration: bold">
Gosok Bagian Ujung Jari</p>
    </div>
  </div>



  <div class="row pt-4"  >
   
    <div class="col-md-3">

    </div>

    <div class="col-md-3">
    <img src="img/30.png" class="mx-auto d-block pb-2">
<p class="h5" style="color: white; text-align: center; text-decoration: bold">
Bilas dengan Air</p>
    </div>

    <div class="col-md-3">
    <img src="img/31.png" class="mx-auto d-block pb-2" style="margin-top: -20px">
<p class="h5" style="color: white; text-align: center; text-decoration: bold;margin-bottom: 80px ">

Tanganmu Sudah Bersih</p>
    </div>

     <div class="col-md-3" >
   
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

      <!--JavaScript at end of body for optimized loading-->
   
  </body>
</html>