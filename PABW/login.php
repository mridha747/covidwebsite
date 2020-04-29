<?php  
require_once("dbcon.php");
session_start();




if (isset($_SESSION["login"])) {
  header("Location: index.php");
  exit;
}



if(isset($_POST['login'])){

    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

    $sql = "SELECT * FROM users WHERE username=:username OR email=:email";
    $stmt = $dbh->prepare($sql);
    
    // bind parameter ke query
    $params = array(
        ":username" => $username,
        ":email" => $username
    );

    $stmt->execute($params);

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // jika user terdaftar
    if($user){
        // verifikasi password
        if(password_verify($password, $user["password"])){
            // buat Session
            session_start();
            $_SESSION["user"] = $user; 
            $_SESSION["login"] = true;

if(!empty($_POST["remember"])) {
//COOKIES for username
setcookie ("user_login",$_POST["username"],time()+ (10 * 365 * 24 * 60 * 60));
//COOKIES for password
setcookie ("userpassword",$_POST["password"],time()+ (10 * 365 * 24 * 60 * 60));
}else {
if(isset($_COOKIE["user_login"])) {
setcookie ("user_login","");}
if(isset($_COOKIE["userpassword"])) {
setcookie ("userpassword","");
        }
      
      }
            // login sukses, alihkan ke halaman timeline

            header("Location: index.php");
            exit;
        }
    }$error = true;}
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
    <p class="text-center" style="font-weight: bold;">Welcome to MR InfoCorona</p>
  </div>
  <div class="card-body">
    
    <p class="card-text text-center">Silahkan login terlebih dahulu</p>
    <?php if (isset($error)) : ?>
<p class="text-center card-text " style="color: red; margin-top: -10px">Username / Password Salah</p> 
    <?php endif; ?>
     <form action="" method="POST">

            <div class="form-group">
                <label for="username">Username</label>
                <input class="form-control" type="text" name="username"   value="<?php if(isset($_COOKIE["user_login"])) { echo $_COOKIE["user_login"]; } ?>" />
            </div>


            <div class="form-group">
                <label for="password">Password</label>
                <input class="form-control" type="password" name="password"  value="<?php if(isset($_COOKIE["userpassword"])) { echo $_COOKIE["userpassword"]; } ?>"/>
            </div>

            <div class="form-check">
  <input class="form-check-input" type="checkbox"  id="remember"<?php if(isset($_COOKIE["user_login"])) { ?> checked <?php } ?>  name="remember">
  <label class="form-check-label mb-3" for="remember">
    Remember Me
  </label>
</div>
            

            <input type="submit" style="background-color: #a42f93; color: white; font-weight: bold;"class="btn btn-block" name="login" value="Masuk" />

        </form>

        <p class="text-center mt-2" >Belum punya akun? <a href="register.php">Daftar di sini</a></p>
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