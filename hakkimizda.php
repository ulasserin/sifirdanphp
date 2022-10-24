<?php
    require_once 'admin/pages/function.php';
    $sql = "SELECT * FROM aciklama WHERE aktif =1";
    $verim = $dbh->prepare($sql);
    $verim->execute();
    $veri = $verim->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Hakkımızda</title>
        <?php include 'includes/head.php';?>
    </head>
    <body>
        <!-- Navigation-->
        <?php include 'includes/navbar.php'; ?>
        <!-- Page Header-->
        <header class="masthead" style="background-image: url('assets/img/about-bg.jpg')">
            <div class="container position-relative px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <div class="page-heading">
                            <h1>Hakkımızda</h1>
                            <span class="subheading">This is what I do.</span>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Main Content-->
        <main class="mb-4">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <p><?=$veri['aciklama'];?></p>
                    </div>
                </div>
            </div>
        </main>
        <!-- Footer-->
        <?php include 'includes/footer.php'; ?>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
