<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->

<!-- BEGIN HEAD -->
<head>
     <meta charset="UTF-8" />
    <title>Sistem Informasi Penjualan Tas | Login Page</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
     <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
    <!-- GLOBAL STYLES -->
     <!-- PAGE LEVEL STYLES -->
    <link rel="stylesheet" href="css/bootstrap.css" />
    <link rel="stylesheet" href="css/login.css" />
     <!-- END PAGE LEVEL STYLES -->
   <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>
    <!-- END HEAD -->

    <!-- BEGIN BODY -->
<body >
<?php
error_reporting(0);
session_start();
include_once("library/koneksi.php");

if(@$_POST["login"]){ //jika tombol Login diklik
	$email=$_POST["email"];
	$pass=$_POST["pass"];
	$type_user = $_POST['type_user'];
	
	if($email!="" && $pass!="" && $type_user=='User'){
		include_once("library/koneksi.php");
		$em = mysql_query("select * from customer where password = '$pass' AND email = '$email'");
		$data = mysql_fetch_assoc($em);
		
		if($data["email"] == $email && $data["password"] == $pass){
			echo "<div class='alert alert-success alert-dismissable'>
                  <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
					Data Telah Ditemukan!!.
                  </div>";
			$_SESSION["user"]=$data["email"];
			$_SESSION["pass"]=$data["password"];
			$_SESSION["id_customer"]=$data["id_customer"];
			$_SESSION["type_user"]="User";
			header("Location:user/index.php");
		}else{
			echo "<center><div class='alert alert-warning alert-dismissable'>
                  <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
					<b>Data Tidak Ditemukan!!</b>
                  </div><center>";
		}
	} else if($email!="" && $pass!="" && $type_user=='Admin'){
		include_once("library/koneksi.php");
		$em = mysql_query("select * from admin where password = '$pass' AND username = '$email'");
		$data = mysql_fetch_assoc($em);
		
		if($data["username"] == $email && $data["password"] == $pass){
			echo "<div class='alert alert-success alert-dismissable'>
                  <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
					Data Telah Ditemukan!!.
                  </div>";
			$_SESSION["user"]=$data["username"];
			$_SESSION["pass"]=$data["password"];
			$_SESSION["type_user"]="Admin";
			header("Location:admin/index.php");
		}else{
			echo "<center><div class='alert alert-warning alert-dismissable'>
                  <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
					<b>Data Tidak Ditemukan!!</b>
                  </div></center>";
		}
	} else{
		echo "<center><div class='alert alert-warning alert-dismissable'>
                  <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
					<b>Data Tidak Ditemukan!!</b>
                  </div></center>";
	}

}
?>
   <!-- PAGE CONTENT --> 
    <div class="container">
    <div class="text-center">
		<h2>Penjualan Toko Tas</h2>
        <!--<img src="img/logo.png" id="logoimg" alt=" Logo" />-->
    </div>
    <div class="tab-content">
        <div id="login" class="tab-pane active">
            <form action="" method="post" class="form-signin">
                <p class="text-muted text-center btn-block btn btn-primary btn-rect">
                    Masukan Username dan Password
                </p>
                <input type="text" autofocus required name="email" placeholder="Email" class="form-control" />
                <input type="password" required name="pass" placeholder="Password" class="form-control" />
				<div style = "margin-right : 20px">
				<input type='radio' name='type_user' value='User'> Customer 
				</div>
				<input type='radio' name='type_user' value='Admin'>	Admin <br>
				<div align = 'center'>
				<input type="submit" name="login" value="Login" class="btn btn-info"/>
				<input type="reset" name="reset" value="Reset" class="btn btn-danger"/> <br> <br>
				<a href = "register.php" > Buat Akun Baru </a>
            </form>
        </div>
    </div>


</div>

	  <!--END PAGE CONTENT -->     
	      
      <!-- PAGE LEVEL SCRIPTS -->
      <script src="js/jquery-2.0.3.min.js"></script>
      <script src="js/bootstrap.js"></script>
      <!--END PAGE LEVEL SCRIPTS -->

</body>
    <!-- END BODY -->
</html>
