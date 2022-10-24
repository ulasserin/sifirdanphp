<?php 
    require_once 'function.php';
    if($_SESSION['girisKontrol'] == 1) {

    }
    else{
        header("Location:index.php");
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Hakkımızda</title>
    <?php require_once "header.php"; ?>

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <?php require_once "inc-menu.php"; ?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Hakkımızda</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <a href="anasayfa.php"> <-Anasayfaya Geri Dön</a>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-8">
                                    <form role="form" action="" method="POST">
                                        
                                    
                                       
                                        <div class="form-group">
                                            <label>Açıklama</label>
                                            <textarea class="form-control" name="aciklama" id="mytextarea" rows="3"></textarea>
                                        </div>
                                      
                                       
                                        <div class="form-group">
                                            <label>Aktif</label>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="aktif" value="1" checked>Aktif
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="aktif"  value="0">Aktif değil
                                                </label>
                                            </div>

                                        </div>
                                        
                                      
                                        <button type="submit" name="submit" class="btn btn-default">Kaydet</button>
                                        <button type="reset" class="btn btn-default">Temizle</button>
                                    </form>
                                    <?php 
                                        if(isset($_POST['submit'])){
                                            $aciklama = $_POST['aciklama'];
                                            $aktif = $_POST['aktif'];
                                            $sql = "INSERT INTO aciklama (aciklama,aktif) VALUES (?,?)";
                                            $ekle = $dbh->prepare($sql);
                                            $ekle->execute(array($aciklama,$aktif));
                                            echo "kayıt eklendi";
                                        }
                                    ?>
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                               
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
    <script src="../js/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
      tinymce.init({
        selector: '#mytextarea'
      });
    </script>
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
