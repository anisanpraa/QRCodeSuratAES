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
            <h4>Data Staf Pelaksana</h4>
        </div>
             
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-block">
                       	<a href="pelaksana_tambah.php" class="btn btn-info">
                            <i class="fas fa-plus-square"></i>
                            <span>Tambah Data</span>
                        </a>

                        <div class="table-responsive"> 
                           <table id="tabel" class="table table-lg table-hover">
                              <thead class="thead-light">
                                <tr>
                                    <th>No</th>
                                    <th>ID Staf </th>
                                    <th>SKPD</th>
                                    <th>Nama Staf</th>
                                    <th>Email</th>
                                    <th>No HP</th>
                                    <th>Username</th>
                                    <th>Password</th>
                                    <th>Aksi</th>
                                </tr>
                              </thead>
                                 	
                               <tbody>
                                <?php
        							$no = 1;
        							$sql = mysqli_query($connect,"SELECT * FROM staf_pelaksana");
        								while($pls = mysqli_fetch_array($sql)){
      							?>

      							<tr>
      								<td>
      									<div class="mrg-top-18">
                                        <b class="text-dark font-size-16"></b>
                                    </div></td>

                                    <td><div class="mrg-top-18">
                                        <span class="text-dark"><?php echo $pls['pls_id']; ?></span>
                                    </div></td>    

                                    <td><div class="mrg-top-18">
                                        <span class="text-dark"><?php echo $pls['skpd_id']; ?></span>
                                    </div></td>                                       

                                    <td><div class="mrg-top-18">
                                        <span class="text-dark"><?php echo $pls['pls_nama']; ?></span>
                                    </div></td>

                                    <td><div class="mrg-top-18">
                                        <span class="text-dark"><?php echo $pls['pls_email']; ?></span>
                                    </div></td>

                                    <td><div class="mrg-top-18">
                                        <span class="text-dark"><?php echo $pls['pls_nohp']; ?></span>
                                    </div></td>

                                    <td><div class="mrg-top-18">
                                        <span class="text-dark"><?php echo $pls['pls_username']; ?></span>
                                    </div></td>

                                    <td><div class="mrg-top-18">
                                        <span class="text-dark"><?php echo $pls['pls_password']; ?></span>
                                    </div></td>

                                    <td><div class="mrg-top-18">
                                        <center>

                                        <div class="dropdown inline-block">
                                        <button class="btn btn-warning dropdown-toggle" type="button" data-toggle="dropdown">
                                        	<span class="fas fa-list">
                                        </button>                           
                                                
                                        <ul class="dropdown-menu">

                                            <li><a href="proses/send_email.php?pls_id=<?php echo $pls['pls_id']; ?>" class="text-dark">
                                                <i class="ti-email pdd-right-5"></i>
                                                <span >Send Email</span></a></li>

                                            <li><a href="pelaksana_update.php?pls_id=<?php echo $pls['pls_id']; ?>" class="text-dark">
                                                <i class="fas fa-edit"></i>
                                                <span>Edit</span></a></li>
                                                
                                            <li><a href="proses/pelaksana_hapus.php?pls_id=<?php echo $pls['pls_id']; ?>" class="text-dark" id="btn-del">
                                                <i class="ti-trash pdd-right-5"></i>
                                				<span >Hapus</span></a></li>
	               
                                        </ul>
                                        </div>
                            			</center>
                                    </div></td>
      							</tr>

        						<?php } ?>

                             </tbody>
                             </table>
                            </div>
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
    <script src="../assets/vendors/datatables/media/js/jquery.dataTables.js"></script>

    <!-- build:js assets/js/app.min.js -->
    <!-- core js -->
    <script src="../assets/js/app.js"></script>
    <!-- endbuild -->

    <!-- page js -->
    <script src="../assets/js/ui-elements/notification.js"></script>
    <script src="../assets/js/table/data-table.js"></script>

    <!-- Script SweetAlert -->   

    
    <script>
    $(document).ready(function () {
    var t = $('#tabel').DataTable({
        columnDefs: [
            {
                searchable: false,
                orderable: false,
                targets: 0,
            },
        ],
        order: [[1, 'asc']],
    });
 
    t.on('order.dt search.dt', function () {
        let i = 1;
 
        t.cells(null, 0, { search: 'applied', order: 'applied' }).every(function (cell) {
            this.data(i++);
        });
    }).draw();
    });
    </script>
    
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

    <script>
        $("#btn-del").click(function(e) {
        e.preventDefault();
        const href = $(this).attr('href')
        swal({
            title : "Apakah Anda Yakin Akan Menghapus Data Ini?",
            text : "Data yang dihapus tidak dapat dikembalikan!",
            type : "warning",
            confirmButtonColor :"#d63038",
            showCancelButton:true,
            confirmButtonText: "Hapus",
        },
    function(isConfirm){
            if (isConfirm) {
                window.location=href;
            } else {}
        })
    });
    </script>
    
</body>
</html>