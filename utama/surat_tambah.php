<?php
    include "validasiSession.php";
//ID OTOMATIS DATA SURAT
$kode = mysqli_query($connect, "SELECT id_surat from surat order by id_surat desc");
$idsurat = mysqli_fetch_assoc($kode);
$num = substr($idsurat['id_surat'], 2, 4);
$add = (int) $num + 1;
if(strlen($add) == 1){
    $format = "SR00".$add;
}else if(strlen($add) == 2){
    $format = "SR0".$add;
}
else if(strlen($add) == 3){
    $format = "SR0".$add;
}else{
    $format = "SR".$add; }

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


    <!-- page plugins css -->
    <link rel="stylesheet" href="../assets/css/sweetalert.css" />
    <link rel="stylesheet" href="../assets/vendors/datatables/media/css/jquery.dataTables.css" />
    <link rel="stylesheet" href="../assets/date/jquery-ui.css" />

    <!-- core css -->
    <link href="../assets/css/themify-icons.css" rel="stylesheet">
    <link href="../assets/css/flag-icon.min.css" rel="stylesheet">
    <link href="../assets/css/animate.min.css" rel="stylesheet">
    <link href="../assets/css/app.css" rel="stylesheet">
</head>

<body>
<div class="app">
    <div class="layout">

<!-- Side Nav START -->
        <div class="side-nav">
            <div class="side-nav-inner">
                    
            <ul class="side-nav-menu scrollable">
                <li class="nav-item active">
                    <a class="" href="index.php">
                        <span class="icon-holder"><i class="ti-home"></i></span>
                        <span class="title">Dashboard</span>
                    </a>
                </li>
                        
                <li class="nav-item dropdown">
                    <a href="surat.php">
                        <span class="icon-holder"><i class="ti-file"></i></span>
                        <span class="title">Surat Dinas</span>
                    </a>
                </li>
                
                <li class="nav-item dropdown">
                    <a class="dropdown-toggle" href="javascript:void(0);">
                        <span class="icon-holder"><i class="ti-layout-media-overlay"></i></span>
                        <span class="title">Data</span>
                        <span class="arrow"><i class="ti-angle-right"></i></span>
                    </a>
                    
                    <ul class="dropdown-menu">
                        <li>
                        <a href="skpd.php">SKPD</a></li>
                        
                        <li>
                        <a href="ukerja.php">Unit Kerja</a></li>

                        <li>
                        <a href="pelaksana.php">Staf Pelaksana</a></li>
                    </ul>
                </li>
                        
                <li class="nav-item dropdown">
                    <a href="info.php">
                        <span class="icon-holder"><i class="ti-help-alt"></i></span>
                        <span class="title">Info</span>
                                
                    </a>    
                </li>
            </ul>
            </div>
        </div>
<!-- Side Nav END -->

<!-- Page Container START -->
    <div class="page-container">
    
    <!-- Header START -->
    <div class="header navbar">
        <div class="header-container">
            <ul class="nav-left">
                <li>
                    <a class="side-nav-toggle" href="javascript:void(0);">
                    <i class="ti-menu"></i>
                </a></li> 
            </ul>
            
             <ul class="nav-right">
                <li class="user-profile dropdown">
                    <a href="" class="dropdown-toggle" data-toggle="dropdown">
                        <?php echo "<img class='profile-img img-fluid'  src='foto/$data[tu_foto]' >"?>
                            <div class="user-info">
                                <span class="name pdd-right-5">
                                    <?=$data['tu_nama']?>
                                </span>
                                <i class="ti-angle-down font-size-10"></i>
                            </div>
                    </a>
            
            <ul class="dropdown-menu">
                <li>
                <a href="tu_akun.php">
                    <i class="ti-user pdd-right-10"></i>
                    <span>Profile</span>
                </a></li>
                
                <li>
                <a href="logout.php" id="logout" class="swal-function">
                    <i class="ti-power-off pdd-right-10"></i>
                    <span>Logout</span>
                </a></li>
            </ul>
                
                </li>
            </ul>
        </div>
    </div>
    <!-- Header END -->

    <!-- Content Wrapper START -->
    <div class="main-content">
    <div class="container-fluid">
        <div class="page-title">
            <h4>Form Tambah Data Surat</h4>
        </div>
        
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-block">

                        <div class="row">
                        <div class="col-md-7">
                        
                        <form class="form-horizontal mrg-top-40 pdd-right-30" name="surat" action="proses/surat_add.php" method="POST">

                        <div class="form-group row">
                            <label for="form-1-1" class="col-md-2 control-label">ID</label>
                            <div class="col-md-10">
                            <input type="text" class="form-control" name="id_surat" value="<?php echo $format;?>" readonly >
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="form-1-1" class="col-md-2 control-label">Nomor Surat</label>
                            <div class="col-md-10">
                            <input type="text" class="form-control" name="surat_nomor" placeholder=".../.../...">
                            </div>
                        </div>
                                                    
                        <div class="form-group row">
                            <label for="form-1-2" class="col-md-2 control-label">Unit Kerja</label>
                            
                            <div class="col-md-10">
                            <select name="unit_id" class="form-control" required>
                                <option value="">--Pilih Unit Kerja--</option>

                                <?php
                                    $sql = mysqli_query($connect,"SELECT unit_id,skpd_nama,unit_nama FROM unit_kerja INNER JOIN skpd ON unit_kerja.skpd_id=skpd.skpd_id;");
                                        while($unit = mysqli_fetch_array($sql)){
                                ?>

                                <option value="<?php echo $unit['unit_id']; ?>">
                                <?php echo $unit['unit_nama']; ?> - <?php echo $unit['skpd_nama']; ?></option>
                                
                                <?php } ?>
                                
                            </select>
                            
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="form-1-5" class="col-md-2 control-label">Perihal Surat</label>
                            <div class="col-md-10">
                            <textarea class="form-control" rows="3" name="surat_perihal" required></textarea>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            
                            <?php
                              date_default_timezone_set('Asia/Jakarta');
                              $date_now=date("Y-m-d");
                            ?>
                            
                            <label for="form-1-4" class="col-md-2 control-label">Tanggal Pembuatan Surat</label>
                            <div class="col-md-10">
                            <input type="date" class="form-control" 
                            name="surat_tgl_buat" 
                            max="<?php echo $date_now; ?>" required >
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="form-1-4" class="col-md-2 control-label">Nama Pejabat</label>
                            <div class="col-md-10">
                            <input type="text" class="form-control" name="surat_ttd_pejabat" placeholder="Nama Pejabat yang menandatangani surat" required onKeyPress="if(this.value.length==100) return false;">
                            </div>
                        </div>

                        <div class="card-footer border top">
                                <div class="text-left">
                                    <input type="submit" name="submit" class="btn btn-primary" value="Submit">
                                    <input type="reset" name="submit" class="btn btn-warning" value="Reset">
                                    <a href="surat.php" class="btn btn-danger" name="cancel">Cancel</a>
                                </div>
                           </div>
                        
                        </form>
                        </div></div>

        
        </div>
    </div>
    
    <!-- Content Wrapper END -->

    <!-- Footer START -->
    <footer class="content-footer">
        <div class="footer">
            <div class="copyright">
            <CENTER><span>Copyright © <span id="year"></span> <b><a href="" class="text-dark">Annisa Nurul Pratiwi - 20180810058</a></span></CENTER>
            </div>
        </div>
    </footer>
    <!-- Footer END -->

    </div>
    <!-- Page Container END -->

        </div>
    </div>

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

    <!-- build:js assets/js/app.min.js -->
    <!-- core js -->
    <script src="../assets/js/app.js"></script>
    <!-- endbuild -->

    <!-- page js -->
    <script src="../assets/js/ui-elements/notification.js"></script>

    <!-- Script SweetAlert -->   

    <script>
    $("#logout").click(function(e) {
        e.preventDefault()
        swal({
            title : "Logout",
            text : "Apakah Anda Yakin Akan Keluar dari Sistem?",
            type : "warning",
            confirmButtonColor :"#d63038",
            showCancelButton:true,
            confirmButtonText: "Logout",
        },
    function(isConfirm){
            if (isConfirm) {
                window.location="logout.php";
            } else {}
        })
    });
    </script>
    
</body>
</html>