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

    <!-- page plugins css -->
    <link rel="stylesheet" href="../assets/css/sweetalert.css" />

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
                <h4>Profile Akun Pengguna</h4>
             </div>
                   
            <div class="row">
                <div class="col-md-12">
                    <div class="card">

                    <form name="akun" action="tu_update.php" method="POST">
                        <div class="col-md-12">
                            <div class="profile border bottom">
                            <center>
                            <input type="file" hidden name="tu_foto" value="<?=$data['tu_foto']?>">
                            <?php echo "<img class='mrg-top-30' src='foto/$data[tu_foto]' style='max-width: 100px' >"?>

                            <h4 class="mrg-top-20 no-mrg-btm text-semibold"><?=$data['tu_nama']?></h4>
                            <p>Staf Pelaksana Bagian Umum Subag Tata Usaha SETDA</p>
                            </center>    
                            </div>
                        </div>
                    
                        <div class="card-block">
                            <div class="row">
                                <div class="col-md-3">
                                    <p class="mrg-top-10 text-dark"> <b>ID Akun</b></p>
                                </div>
                                
                                <div class="col-md-6">
                                <input type="file" hidden name="tu_id" value="<?=$data['tu_id']?>">
                                <p class="mrg-top-10"><?=$data['tu_id']?></p>
                                </div>
                            </div>

                            <hr>
                            <div class="row">
                                <div class="col-md-3">
                                    <p class="mrg-top-10 text-dark"> <b>Nama</b></p>
                                </div>
                                
                                <div class="col-md-6">
                                    <input type="file" hidden name="tu_nama" value="<?=$data['tu_nama']?>">
                                    <p class="mrg-top-10"><?=$data['tu_nama']?></p>
                                </div>
                            </div>
                            
                            <hr>
                            <div class="row">
                                <div class="col-md-3">
                                    <p class="mrg-top-10 text-dark"> <b>Email</b></p>
                                </div>
                                
                                <div class="col-md-6">
                                    <input type="file" hidden name="tu_email" value="<?=$data['tu_email']?>">
                                    <p class="mrg-top-10"><?=$data['tu_email']?></p>
                                </div>
                            </div>

                            <hr>
                            <div class="row">
                                <div class="col-md-3">
                                    <p class="mrg-top-10 text-dark"> <b>No HP</b></p>
                                </div>
                                
                                <div class="col-md-6">
                                    <input type="file" hidden name="tu_nohp" value="<?=$data['tu_nohp']?>">
                                    <p class="mrg-top-10"><?=$data['tu_nohp']?></p>
                                </div> 
                            </div>
                            
                            <hr>
                            <div class="row">
                                <div class="col-md-3">
                                    <p class="mrg-top-10 text-dark"> <b>Username</b></p>
                                </div>
                                
                                <div class="col-md-6">
                                    <input type="file" hidden name="tu_username" value="<?=$data['tu_username']?>">
                                    <p class="mrg-top-10"><?=$data['tu_username']?></p>
                                </div>
                            </div>

                            <hr>
                            <div class="row">
                                <div class="col-md-3">
                                    <p class="mrg-top-10 text-dark"> <b>Password</b></p>
                                </div>
                                    
                                <div class="col-md-6">
                                    <input type="file" hidden name="tu_password" value="<?=$data['tu_password']?>">
                                    <p class="mrg-top-10"><?=$data['tu_password']?></p>
                                </div>
                            </div>

                            <div class="card-footer border top">
                                <div class="text-left">
                                    <button type="submit" name="submit" class="btn btn-primary"><b>Edit Data</b></button>
                                </div>
                            </div>
                        </form>
                    </div>

                    </div>
                </div>                    
            </div> 
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