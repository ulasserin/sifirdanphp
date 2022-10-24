<?php 
    require_once "function.php";
    if($_SESSION['girisKontrol'] == 1) {

    }
    else{
        header("Location:index.php");
    }
    $id = $_GET['id'];
    $sql = "SELECT * FROM `blog` WHERE id= ?";
    $bul = $dbh->prepare($sql);
    $bul->execute(array($id));
    $veri   = $bul->fetch(PDO::FETCH_ASSOC);
    
    
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
                    <h1 class="page-header">Güncelle</h1>
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
                                        <input class="form-control" placeholder="id" name="id" type="hidden" value="<?=$veri['id'];?>">
                                        <input class="form-control" placeholder="date" name="date" type="hidden" value="<?php date("Y-m-d H:i:s");?>">
                                        <div class="form-group">
                                            <label>Başlık</label>
                                            <input class="form-control" placeholder="başlık" name="baslik" value="<?= $veri['baslik'];?>">
                                        </div>

                                        <div class="form-group">
                                            <label>Alt Başlık</label>
                                            <input class="form-control" placeholder="Altbaşlık" name="altbaslik" value="<?= $veri['alt_baslik'];?>" >
                                        </div>

                                       
                                        <div class="form-group">
                                            <label>Açıklama</label>
                                            <textarea class="form-control" id="mytextarea" rows="3" name="aciklama" value="<?= $veri['aciklama'];?>" ></textarea>
                                        </div>
                                      
                                       
                                        <div class="form-group">
                                            <label>Aktif (<?php 
                                            if($veri['aktif'] == 1)
                                            { echo "Bu blog aktif";}
                                            elseif($veri['aktif'] == 0)
                                            {echo"bu blog aktif değil";}?>)
                                            </label>
                                            <div class="radio">
                                                
                                                <label>
                                                    <input type="radio" name="aktif" value="1" <?php if($veri['aktif'] == 1)
                                            { echo 'checked' ;}?> >Aktif
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="aktif"  value="0"<?php if($veri['aktif'] == 0)
                                            { echo 'checked' ;}?> >Aktif değil
                                                </label>
                                            </div>

                                        </div>
                                        
                                        
                                        <button type="submit" class="btn btn-default" name="submit">Güncelle</button>
                                        <button type="reset" class="btn btn-default">Temizle</button>
                                    </form>

                                    <?php 
                                        
                                        $baslik = @$_POST['baslik'];
                                        $altbaslik = @$_POST['altbaslik'];
                                        $aciklama = @$_POST['aciklama'];
                                        $aktif = @$_POST['aktif'];
                                        $idd = @$_POST['id'];
                                        if(isset($_POST['submit'])){
                                            $sql = "UPDATE `blog` SET `baslik` = ?, `alt_baslik` = ?, `aciklama` = ?, `aktif` = ? WHERE `blog`.`id` = ?";
                                            $guncelle = $dbh->prepare($sql);
                                            $guncelle->execute(
                                                array($baslik,$altbaslik,$aciklama,$aktif,$idd)
                                            );
                                            echo "<br>işlem başarılı: ". '<b>'.'<a href="blog.php">Güncelleme tamamlandı blog sayfasına dönmek için tıkla!</a>'.'</b>';  
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
