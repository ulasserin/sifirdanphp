<?php 
   
    require_once "function.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Giris</title>

    <!-- Bootstrap Core CSS -->
    <link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Giriş Yap</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" action="" method="POST">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" value="<?php if(@$_COOKIE['username'])
                                     {echo $_COOKIE['username'];}
                                     else {
                                        echo "";
                                     }
                                     
                                     ?>" placeholder="username" name="username" type="text" autofocus require>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" type="password" value="<?php if(@$_COOKIE['pass']) {echo $_COOKIE['pass'];} else { echo ""; } ?>" require>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input name="remember" type="checkbox" value="Remember Me">Remember Me
                                    </label>
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                
                                <input type="submit" name="submit" value="giris yap" class="btn btn-lg btn-success btn-block">
                            </fieldset>
                        </form>
                        <?php

                            $username = @$_POST['username'];
                            $password = @$_POST['password'];
                            $aktifmi = 1;

                            if(isset($_POST['submit'])){
                                $sql = 'SELECT * FROM `admin` WHERE `username` = ? AND `password` = ? AND `aktif` = ? ';
                                $giris = $dbh->prepare($sql);
                                $giris->execute(array($username, $password,$aktifmi));
                                $l = $giris->fetch(PDO::FETCH_ASSOC);
                                
                                if($l){
                                    $_SESSION['user'] = $username;
                                    $_SESSION['girisKontrol'] = 1;
                                    header('Location:anasayfa.php');
                                    //echo $_SESSION['user'];
                                }
                                else{
                                    echo "tekrar deneyiniz";
                                }

                            }
                            if(isset($_POST['remember'])){
                                setcookie("username",$username,time()+600);
                                setcookie("pass",$password,time()+600);
                                
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="../bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

</body>

</html>
