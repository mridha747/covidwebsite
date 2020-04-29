<?php  

require_once("dbcon.php");

if(isset($_POST['register'])){

    // filter data yang diinputkan
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    // enkripsi password
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);


 $query = $dbh->prepare("SELECT * FROM users WHERE username = ?");
   $query->execute(array($username));


 if($query->rowCount() != 0) {
    echo "<script>
    alert('username sudah terdaftar')

    </script>";
    echo "<script>window.location.href='register.php'</script>";
   } else {
     if(!$username || !$password ||!$email || !$name  ) {
       echo "<script>
    alert('Data Masih ada yang kosong')

    </script>";
     } else {
       $sql = $dbh->prepare("INSERT INTO users (name, username, email, password) VALUES (:name, :username, :email, :password)");
       $simpan = $sql->execute(array(
        ":name" => $name,":username"=> $username, ":email" => $email, ":password" =>$password));
       if($simpan) {
          echo "
    <script> alert('User baru berhasil ditambahkan')
    </script>";
    echo "<script>window.location.href='login.php'</script>";
       } else {
          echo "
    <script> alert('User Gagal ditambahkan')
    </script>";
       }
     }
   }



 

    }





  
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<style type="text/css">
  
.wave{
  position: fixed;
  bottom: 0;
  left: 0;
  height: 100%;
  z-index: -1;
}



.img img{
  width: 450px;
}
</style>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Login</title>
  </head>
  <body style="background-color: #eceff8">
   
   <div >
    <img src="img/mrku.png" class="mx-auto d-block" style="height: 50px; margin-top: 20px">
<img class="wave" src="img/wave.png">
    <div class="container">
      <div class="row ">
        <div class="col-md-12 col-sm-12">
      <div class="card border-light mb-3 mx-auto d-block shadow mb-4 bg-white " style="max-width: 30rem; margin-top: 20px">
  <div class="card-header"> <img src="img/avatar.svg" style="width: 100px; height: 100px;" class="mx-auto d-block" >
    <p class="text-center" style="font-weight: bold;">Welcome to MR InfoCorona </p>
  </div>
  <div class="card-body">
    
    <p class="card-text text-center">Mari Bergabung Bersama Kami</p>
   
        <form action="" method="POST">

            <div class="form-group">
                <label for="name">Nama Lengkap</label>
                <input class="form-control" type="text" name="name" placeholder="Nama kamu" required />
            </div>

            <div class="form-group">
                <label for="username">Username</label>
                <input class="form-control" type="text" name="username" placeholder="Username" required />
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input class="form-control" type="email" name="email" placeholder="Alamat Email" required />
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input class="form-control" type="password" name="password" placeholder="Password" required />
            </div>

            <input type="submit" style="background-color: #a42f93; color: white; font-weight: bold;" class="btn  btn-block" name="register" value="Daftar" />

        </form>
            

        <p class="text-center mt-2">Sudah punya akun? <a href="login.php">Login di sini</a></p>
  </div>
</div>
         

        </div>

      
      </div>
    </div>
     
   </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>