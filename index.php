<?php 
    require_once 'admin/pages/function.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Blog | Anasayfa</title>
        <?php include 'includes/head.php'; ?>
    </head>
    <body>
        <!-- Navigation-->
        <?php include 'includes/navbar.php'; ?>
        <!-- Page Header-->
        <header class="masthead" style="background-image: url('assets/img/home-bg.jpg')">
            <div class="container position-relative px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <div class="site-heading">
                            <h1>Clean Blog</h1>
                            <span class="subheading">first php</span>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Main Content-->
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <?php 

                         echo $dbh->query("SELECT `baslik` FROM `blog` WHERE `id` = 8")->fetchColumn();
                         $kelime = @$_GET['q'];

                         $kelime_query = ( strlen($kelime) > 1 ? "%$kelime%" : '');
                         $search_query = ( strlen($kelime) > 1 ? " AND `baslik` LIKE ?" : '');

                         $sql = "SELECT * FROM `blog` WHERE `aktif` = ? $search_query";
                         $query = $dbh->prepare($sql);
                         $query->execute([1, $kelime_query]);

                        while( $veri = $query->fetch() ):
                    ?>
                    <!-- Post preview-->
                    <div class="post-preview">
                        <a href="post.php?id=<?=$veri['id'];?>">
                            <h2 class="post-title"><?= $veri['baslik'];?></h2>
                            <h3 class="post-subtitle"><?= $veri['aciklama'];?></h3>
                        </a>
                        <p class="post-meta">
                            Posted by Admin, on <?= $veri['tarih'];?>
                        </p>
                    </div>
                    <?php endwhile; ?>
                    <!-- Divider-->
                    
                    <!-- Divider-->
                    <hr class="my-4" />
                    <!-- Pager-->
                    <div class="d-flex justify-content-end mb-4"><a class="btn btn-primary text-uppercase" href="#!">Older Posts →</a></div>
                </div>
            </div>
        </div>
        <!-- Footer-->
        <?php include 'includes/footer.php'; ?>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
