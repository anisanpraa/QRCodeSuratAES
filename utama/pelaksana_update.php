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
            <h4>Form Update Data Staf Pelaksana</h4>
        </div>
        
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-block">

                        <div class="row">
                        <div class="col-md-7">
                        
                        <?php
                        
                            $pls_id = $_GET['pls_id'];
                            $cek = mysqli_query($connect,"SELECT * from staf_pelaksana where pls_id='$pls_id'");
                            while($pls_data = mysqli_fetch_array($cek)){
                        ?>

                        <form class="form-horizontal mrg-top-40 pdd-right-30" action="proses/pelaksana_update.php" method="POST">
                        
                        <div class="form-group row">
                            <label for="form-1-1" class="col-md-2 control-label">ID Staf Pelaksana</label>
                            <div class="col-md-10">
                            <input type="text" class="form-control" name="pls_id" value="<?php echo $pls_data['pls_id']; ?>" readonly>
                            </div>
                        </div>
                                                    
                        <div class="form-group row">
                            <label for="form-1-2" class="col-md-2 control-label">SKPD</label>
                            <div class="col-md-10">

                            <input type="hidden" class="form-control" name="skpd_lama" 
                            id="skpd_lama" value="<?php echo $pls_data['skpd_id']; ?>">

                            <select name="skpd_id" class="form-control" value="<?php echo $pls_data['skpd_id']; ?>">
                            <option disabled="">-Pilih ID SKPD-</option>
                            <?php
                                $pls_skpd = $pls_data['skpd_id'];
                                $skpd=mysqli_query($connect,"SELECT * FROM skpd");
                                while($row=mysqli_fetch_array($skpd)){
                                
                                $skpd_id=$row['skpd_id'];
                                $skpd_nama=$row['skpd_nama'];
                                
                                //Data akan terseleksi (selected)   
                                if($pls_skpd==$skpd_id){
                                    $seleksi="selected"; }
                                    else{  $seleksi=""; }
                                    echo"<option value='$skpd_id' $seleksi>$skpd_nama</option>";
                            } ?>
                            </select>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="form-1-3" class="col-md-2 control-label">Nama Staf Pelaksana</label>
                            <div class="col-md-10">
                            <input type="text" class="form-control" name="pls_nama"  required 
                            value="<?php echo $pls_data['pls_nama']; ?>" onKeyPress="if(this.value.length==50) return false;">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="form-1-3" class="col-md-2 control-label">Email</label>
                            <div class="col-md-10">
                            <input type="email" class="form-control" name="pls_email"  required 
                            value="<?php echo $pls_data['pls_email']; ?>" onKeyPress="if(this.value.length==50) return false;" pattern="^[a-zA-Z0-9+_.-]+@[a-zA-Z0-9.-]+[.]+[a-zA-Z]{2,10}$">

                            <input type="hidden" class="form-control" name="email_lama" 
                            id="email_lama" value="<?php echo $pls_data['pls_email']; ?>">

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="form-1-3" class="col-md-2 control-label">No HP</label>
                            <div class="col-md-10">
                            <input type="number" class="form-control" name="pls_nohp"  required 
                            value="<?php echo $pls_data['pls_nohp']; ?>" onKeyPress="if(this.value.length==15) return false;" >
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="form-1-3" class="col-md-2 control-label">Username</label>
                            <div class="col-md-10">
                            
                            <input type="hidden" class="form-control" name="username_lama" 
                            id="username_lama" value="<?php echo $pls_data['pls_username']; ?>">
                            
                            <input type="text" class="form-control" name="pls_username" id="pls_username" required 
                            value="<?php echo $pls_data['pls_username']; ?>" autocomplete="off" onKeyPress="if(this.value.length==30) return false;" pattern="^[a-z0-9_-]{3,15}$">
                            <div id="result"></div>
                            
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="form-1-3" class="col-md-2 control-label">Password</label>
                            <div class="col-md-10">
                            <input type="text" class="form-control" name="pls_password"  required 
                            value="<?php echo $pls_data['pls_password']; ?>" onKeyPress="if(this.value.length==30) return false;" >
                            </div>
                        </div>

                        <div class="card-footer border top">
                                <div class="text-left">
                                    <input type="submit" name="submit" class="btn btn-primary" value="Update">
                                    <a href="skpd.php" class="btn btn-danger" name="cancel">Cancel</a>
                                </div>
                           </div>
                        
                        </form>

                    <?php } ?>

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

    <script type="text/javascript">
        $(document).ready(function() {
        $('#pls_username').keyup(function() {
            var uname = $('#pls_username').val();
            var lama = $('#username_lama').val();
            if(uname == lama) {
                $('#result').text('');
            }
            else {
                $.ajax({
                    url: 'proses/cek_stafpelaksana.php',
                    type: 'POST',
                    data: 'pls_username='+uname,
                    success: function(hasil) {     
                        if(hasil > 0) {
                            $('#result').text('Username Tidak Tersedia'); }

                        else {
                            $('#result').text('Username Tersedia'); }
                }
            });
            }
        });
    });
    </script>


</body>
</html>