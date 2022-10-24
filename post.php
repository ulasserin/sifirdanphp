<?php 
    require_once 'admin/pages/function.php';
    $id = $_GET['id'];
    $sql = "SELECT * FROM blog WHERE id = ?";
    $verigetir = $dbh->prepare($sql);
    $verigetir->execute(array($id));
    $veri = $verigetir->fetch();
    if($veri['aktif']==0){
        header('Location:index.php');
    }

?>
<!DOCTYPE html>
<html lang="en">
    <head>
    <title>Post Detay</title>
        <?php include'includes/head.php'; ?>
    </head>
    <body>
        <!-- Navigation-->
        <?php include 'includes/navbar.php'; ?>
        <!-- Page Header-->
        <header class="masthead" style="background-image: url('assets/img/post-bg.jpg')">
            <div class="container position-relative px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <div class="post-heading">
                            <h1><?= $veri['baslik'];?></h1>
                            <h2 class="subheading"><?=$veri['alt_baslik'];?></h2>
                            <span class="meta">
                                Posted by
                                Admin on <?=$veri['tarih'];?>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Post Content-->
        <article class="mb-4">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                      <p> <?=$veri['aciklama'];?></p>
                    </div>
                </div>
            </div>
        </article>
        <!-- Footer-->
        <?php include 'includes/footer.php'; ?>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
