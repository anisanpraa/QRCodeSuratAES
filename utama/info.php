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
                <h4>Informasi</h4>
            </div>
            
            <div class="container">
                <div class="row">

                    <div class="col-md-4">                       
                    <div class="sticky">

                        <div class="card mrg-btm-15 scroll-to">                   
                        <div class="card-block padding-25">
                        <ul class="list-unstyled list-info">
                            <li>
                                <span class="thumb-img pdd-top-10">
                                <i class="ti-help-alt text-primary font-size-30"></i>
                                </span>
                                
                                <div class="info">
                                    <b class="text-dark font-size-18">Tentang Aplikasi</b>
                                    <p class="no-mrg-btm ">Pengenalan Dasar Aplikasi</p>
                                </div>
                            </li>
                        </ul>
                        </div>
                        </div>
                        
                        <div class="card mrg-btm-15 scroll-to">
                        <div class="card-block padding-25">
                        <ul class="list-unstyled list-info">
                            <li>
                                <span class="thumb-img pdd-top-10">
                                <i class="text-primary fas fa-building text-info font-size-30"></i>
                                </span>
                                
                                <div class="info">
                                <b class="text-dark font-size-18">Tentang Tempat Penelitian</b>
                                <p class="no-mrg-btm">Sekretariat Daerah Kabupaten Kuningan</p>
                                </div>
                            </li>
                        </ul>
                        </div> 
                        </div>   
                                      
                    </div>
                    </div>
                    
                    <div class="col-md-8">
                        <div class="card" id="ask-1">
                            <div class="card-block">
                            
                            <ul class="list-unstyled list-info">
                                <li>
                                    <span class="thumb-img pdd-top-10">
                                    <i class="ti-help-alt text-primary font-size-30"></i>
                                    </span>
                                    
                                    <div class="info">
                                        <b class="text-dark font-size-22">Aplikasi Berbasis WEB dan Android</b>
                                        <p class="no-mrg-btm ">Aplikasi Pengecekan Keaslian Surat Dinas Bupati Kuningan</p>
                                    </div>
                                </li>
                            </ul>

                            <div class="mrg-top-30">
                            <div id="accordion-ask-1" class="accordion border-less" role="tablist" aria-multiselectable="true">
                                
                                <div class="panel panel-default">
                                
                                <div class="panel-heading" role="tab">       
                                    <h4 class="panel-title">
                                        <a class="collapsed" data-toggle="collapse" data-parent="#accordion-ask-1" href="#collapse-ask-1">
                                        <span>Pengenalan Aplikasi</span>
                                        <i class="icon ti-arrow-circle-down"></i> 
                                        </a>
                                    </h4>
                                </div>
                                
                                <div id="collapse-ask-1" class="collapse panel-collapse show">
                                    <div class="panel-body">
                                        <p align="justify">
                                            Aplikasi ini merupakan <b>aplikasi pengecekan keaslian surat dinas bupati Kuningan menggunakan QR-Code dengan menerapkan Algoritma AES untuk proses enkripsi dan dekripsi</b>. Aplikasi dibuat berbasis client server , <b>website untuk server dan android untuk client.</b> Data pada surat yang berupa nomor surat akan di enkripsi dan di generate menjadi QR-Code, kemudian QR-Code akan disisipkan pada sura. Client dapat melakukan scan QR-Code menggunakan aplikasi berbasis android untuk mendapatkan informasi dari QR-Code. Aplikasi ini dapat digunakan sebagai media alternatif bagi satuan kerja di lingkungan Kabupaten Kuningan untuk melakukan pengecekan keaslian surat dinas Bupati Kuningan. Surat yang digunakan selama penelitian ialah surat edaran Bupati Kuningan.
                                        </p>
                                    </div>
                                </div>
                                </div>
                                
                                <div class="panel panel-default">
                                
                                <div class="panel-heading" role="tab">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion-ask-1" href="#collapse-ask-2">
                                        <span>Penggunaan Aplikasi</span> 
                                        <i class="icon ti-arrow-circle-down"></i> 
                                        </a>
                                    </h4>
                                </div>
                                
                                <div id="collapse-ask-2" class="collapse panel-collapse">
                                    <div class="panel-body">
                                        <p align="justify">
                                            <b>Aplikasi berbasis website</b> dapat diakses oleh staf bagian umum subag TU (staf TU) dengan cara melakukan login dengan menggunakan akun yang sudah tersedia. Staf TU dapat mengelola seluruh data yang berkaitan tentang aplikasi pengecekan keaslian surat dinas Bupati Kuningan. 
                                            Sedangkan <b>aplikasi berbasis android</b> dapat diakses oleh staf pelaksana di masing-masing satuan kerja perangkat daerah di Kabupaten Kuningan (staf Pelaksana). Staf pelaksana harus melakukan login terlebih dahulu sehingga nantinya bisa melakukan scan pada QR-Code yang disisipkan pada surat.
                                        </p>
                                    </div>
                                </div>

                                </div>
                                
                                <div class="panel panel-default">
                                
                                <div class="panel-heading" role="tab">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion-ask-1" href="#collapse-ask-3">
                                        <span>Profil Pengembang</span> 
                                        <i class="icon ti-arrow-circle-down"></i> 
                                        </a>
                                    </h4>
                                </div>
                                
                                <div id="collapse-ask-3" class="collapse panel-collapse">
                                    <div class="panel-body">
                
                                            <div class="profile border bottom">
                                                <center><img class="mrg-top-30" src="assets/images/avatars/avatar-5.png" alt="" style="max-width: 100px">
                                                <h4 class="mrg-top-20 no-mrg-btm text-semibold">Annisa Nurul Pratiwi</h4>
                                                <p>20180810058</p></center>
                                            </div>
                                            <br>
                                            <ul class="list-unstyled list-info">
                                                <li>

                                                    <span class="thumb-img pdd-top-10">
                                                    <i class="ti-pin2 font-size-30"></i>
                                                    </span>
                                                    
                                                    <div class="info">
                                                            <b class="text-dark font-size-16">Angkatan</b>
                                                            <p>2018</p>
                                                    </div>

                                                    <span class="thumb-img pdd-top-10">
                                                    <i class="ti-id-badge font-size-30"></i>
                                                    </span>
                                                    
                                                    <div class="info">
                                                            <b class="text-dark font-size-16">Program Studi</b>
                                                            <p>Teknik Informatika</p>
                                                    </div>

                                                    <span class="thumb-img pdd-top-10">
                                                    <i class="ti-desktop font-size-30"></i>
                                                    </span>
                                                    
                                                    <div class="info">
                                                            <b class="text-dark font-size-16">Fakultas</b>
                                                            <p>Ilmu Komputer</p>
                                                    </div>

                                                    <span class="thumb-img pdd-top-10">
                                                    <i class="fas fa-university font-size-30"></i>
                                                    </span>
                                                    
                                                    <div class="info">
                                                            <b class="text-dark font-size-16">Universitas</b>
                                                            <p>Universitas Kuningan</p>
                                                    </div>            
                                                </li>
                                            </ul>                                                                   
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                                    
                  
                    <div class="card-block">              
                        <ul class="list-unstyled list-info">
                            <li>
                                <span class="thumb-img pdd-top-10">
                                <i class="text-primary fas fa-building text-info font-size-30"></i>
                                </span>
                                
                                <div class="info">
                                <b class="text-dark font-size-22">Kabupaten Kuningan</b>
                                <p class="no-mrg-btm">Sekretariat Daerah Kabupaten Kuningan</p>
                                </div>
                            </li>
                        </ul>
                        
                            <center>
                                <br><img class='profile-img img-fluid'  src='../assets/images/kantor.jpg' width='250'>
                            </center><br><br>

                             <p align="justify">
                                            <b>Sekretariat Daerah</b> mempunyai tugas pokok untuk membantu Bupati dalam menyusun kebijakan dan pengoordinasian administratif terhadap pelaksanaan tugas Perangkat Daerah serta pelayanan administratif pemerintahan lainnya.
                                        </p>      
                    </div>
                </div>
            </div>               
                </div>
                </div>
            </div>
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