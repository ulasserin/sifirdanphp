<?php 
    require_once "function.php";
    if($_SESSION['girisKontrol'] == 1) {

    }
    else{
        header("Location:index.php");
    }
    $sql = "SELECT * FROM `iletisim`"; //aktifleri göster where aktif = '1'
    $listele = $dbh->prepare($sql);
    $listele->execute();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Bloglar</title>
    <?php require_once "header.php"; ?>
    
</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <?php require_once "inc-menu.php"; ?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Tables</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Gelen Mesajlar
                            
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>id</th>
                                            <th>Ad</th>
                                            <th>Email</th>
                                            <th>Telefon</th>
                                            <th>mesaj</th>
                                            <th>okundu mu</th>
                                            <th>işlem </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($listele as $veri) { ?>
                                        <tr class="odd gradeX">
                                            <td><?=$veri['id']?></td>
                                            <td><?=$veri['ad']?></td>
                                            <td><?=$veri['email']?></td>
                                            <td><?=$veri['telefon']?></td>
                                            <td><?=$veri['mesaj']?></td>
                                            <td><?php if($veri['okundu'] == 1 )
                                            { 
                                                echo "okunmadı";
                                            }
                                             else{echo "okundu";} ?></td>
                                            <td class="center">
                                                
                                                <a href="mesajSil.php?id=<?=$veri['id']?>" class="btn btn-danger">Sil</a>
                                                <a href="okundu.php?id=<?=$veri['id']?>" class="btn btn-info">Okundu</a>
                                                
                                            </td>
                                        </tr>
                                        <?php } ?>
                                       
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->

                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
          
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
    

    <!-- jQuery -->
    <script src="../bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- DataTables JavaScript -->
    <script src="../bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="../bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>
    <script src="../bower_components/datatables-responsive/js/dataTables.responsive.js"></script>
    
    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
                responsive: true
        });
    });
    </script>

</body>

</html>
