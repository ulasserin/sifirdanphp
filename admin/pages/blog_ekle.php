<?php 
    require_once "function.php";
    session_start();
    session_check();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Blog Ekle</title>
    <?php require_once "header.php"; ?>

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <?php require_once "inc-menu.php"; ?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Yeni Ekle</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <a href="blog.php"> <-Geri Dön</a>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-8">
                                    <form role="form" action="" method="POST">
                                        <input class="form-control" placeholder="id" name="id" type="hidden">
                                        <input class="form-control" placeholder="date" name="date" type="hidden" value="<?php date("Y-m-d H:i:s");?>">
                                        <div class="form-group">
                                            <label>Başlık</label>
                                            <input class="form-control" placeholder="başlık" name="baslik">
                                        </div>

                                        <div class="form-group">
                                            <label>Alt Başlık</label>
                                            <input class="form-control" placeholder="Altbaşlık" name="altbaslik">
                                        </div>

                                       
                                        <div class="form-group">
                                            <label>Açıklama</label>
                                            <textarea class="form-control" id="mytextarea" rows="3" name="aciklama"></textarea>
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
                                        
                                      
                                        <button type="submit" class="btn btn-default" name="submit">Kaydet</button>
                                        <button type="reset" class="btn btn-default">Temizle</button>
                                    </form>
                                    <?php
                                        
                                        
                                        $baslik = ( isset($_POST['baslik']) ? $_POST['baslik'] : '');
                                        $altbaslik = @$_POST['altbaslik'];
                                        $aciklama = @$_POST['aciklama'];
                                        $aktif = @$_POST['aktif'];
                                        echo $baslik;

                                        if(isset($_POST['submit'])){
                                            $sql = "INSERT INTO `blog` (`baslik`, `alt_baslik`, `aciklama`,`aktif`)
                                                    VALUES (?,?,?,?)";
                                            $ekle= $dbh->prepare($sql);
                                            $ekle->execute( [$baslik,$altbaslik,$aciklama,$aktif]
                                            );
                                            
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
