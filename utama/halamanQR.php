<?php
    include "validasiSession.php";
?>

<!DOCTYPE html>
<html>
    
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, shrink-to-fit=no">
    <title>Server Surat Dinas</title>

    <!-- plugins css -->
    <link rel="stylesheet" href="../assets/vendors/bootstrap/dist/css/bootstrap.css" />
    <link rel="stylesheet" href="../assets/vendors/PACE/themes/blue/pace-theme-minimal.css" />
    <link rel="stylesheet" href="../assets/vendors/perfect-scrollbar/css/perfect-scrollbar.min.css" />
     <link rel="stylesheet" href="../assets/alertify.min.js">


    <!-- page plugins css -->
    <link rel="stylesheet" href="../assets/css/sweetalert.css" />
    <link rel="stylesheet" href="../assets/vendors/datatables/media/css/jquery.dataTables.css" />

    <!-- core css -->
    <link href="../assets/css/themify-icons.css" rel="stylesheet">
    <link href="../assets/css/flag-icon.min.css" rel="stylesheet">
    <link href="../assets/css/animate.min.css" rel="stylesheet">
    <link href="../assets/css/app.css" rel="stylesheet">
</head>

<body>
<div class="app">
    <div class="layout">

       <?php
                        
            $id_surat = $_GET['id_surat'];
            $cek = mysqli_query($connect,"SELECT * from surat where id_surat='$id_surat'");
            while($datas = mysqli_fetch_array($cek)){
        ?>

        <!-- HALAMAN UTAMAN -->
             <body>
        <div class="app">
            <div class="authentication">
                <div class="page-404 container">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="full-height">
                                <div class="vertical-align full-height pdd-horizon-70">
                                    <div class="table-cell">
                                        <h1 class="text-dark font-size-80 text-light">QR-Code</h1>

                                        <div class="text-light">      
                                        <a class="btn btn-info text-bold" href="proses/qr_download.php?id_surat=<?php echo $datas['id_surat']; ?>">
                                                <i class="fas fa-download"></i><span> Download QR-Code</span></a>
                        

                                        <a class="btn btn-primary text-bold" href="surat.php">
                                                <i class="fas fa-reply"></i><span> Kembali</span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5 ml-auto hidden-sm hidden-xs">
                            <div class="full-height height-100">
                                <div class="vertical-align full-height">
                                    <div class="table-cell">
                                         <?php echo "<img class='profile-img img-fluid'  src='../qrcode/$datas[qrcode]' width='300' >"?>
                                         <br><br>
                                         <!--<p class="lead lh-1-8"><?php echo $datas['enkrip']; ?></p>-->
                                    </div>
                                </div>
                            </div>  
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ENDING HALAMAN -->
<?php } ?>



    <!-- build:js assets/js/vendor.js -->
    <!-- plugins js -->
    <script src="../assets/vendors/jquery/dist/jquery.min.js"></script>
    <script src="../assets/vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="../assets/vendors/bootstrap/dist/js/bootstrap.js"></script>
    <script src="../assets/vendors/PACE/pace.min.js"></script>
    <script src="../assets/vendors/perfect-scrollbar/js/perfect-scrollbar.jquery.js"></script>
    <script src="../assets/js/fontawesome.min.js"></script>
    <script src="../assets/js/solid.min.js"></script>
    <!-- endbuild -->

    <!-- page plugins js -->
    <script src="../assets/vendors/sweetalert/lib/sweet-alert.js"></script>
    <script src="../assets/vendors/noty/js/noty/packaged/jquery.noty.packaged.min.js"></script>
    <script src="../assets/vendors/datatables/media/js/jquery.dataTables.js"></script>

    <!-- build:js assets/js/app.min.js -->
    <!-- core js -->
    <script src="../assets/js/app.js"></script>
    <!-- endbuild -->

    <!-- page js -->
    <script src="../assets/js/ui-elements/notification.js"></script>
    <script src="../assets/js/table/data-table.js"></script>

    <!-- Script SweetAlert -->   
</body>
</html>