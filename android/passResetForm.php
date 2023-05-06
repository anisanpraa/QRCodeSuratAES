<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, shrink-to-fit=no">
    <title>Reset Password</title>

    <!-- plugins css -->
    <link rel="stylesheet" href="../assets/vendors/bootstrap/dist/css/bootstrap.css" />
    <link rel="stylesheet" href="../assets/vendors/PACE/themes/blue/pace-theme-minimal.css" />
    <link rel="stylesheet" href="../assets/vendors/perfect-scrollbar/css/perfect-scrollbar.min.css" />
    <link rel="stylesheet" href="../assets/alertify.min.js">
    <link rel="stylesheet" href="../assets/css/sweetalert.css" />

    <!-- core css -->
    <link href="../assets/css/themify-icons.css" rel="stylesheet">
    <link href="../assets/css/flag-icon.min.css" rel="stylesheet">
    <link href="../assets/css/animate.min.css" rel="stylesheet">
    <link href="../assets/css/app.css" rel="stylesheet">
</head>
    <body>

    <?php
        require("../koneksi.php");

        $pls_email = $_GET['pls_email'];
        $token_pass = $_GET['token_pass'];

        if(isset($pls_email) && isset($token_pass)){
            
        $query = mysqli_query($connect,"SELECT * FROM staf_pelaksana where pls_email='$pls_email' AND token_pass='$token_pass'");
            
            if ($query) {

                //Mengambil Data dari Database 
                $dataDB =mysqli_fetch_array($query);
                $token_exp = $dataDB['token_exp'];

                date_default_timezone_set('Asia/Jakarta');
                $date_now=date("Y-m-d H:i:s");

                if(mysqli_num_rows($query)==1){

                    //CEK Waktu Masih Berlaku Apa Engga
                    if($token_exp >= $date_now){
    ?>

    <div class="app">
    <div class="authentication">
      <div class="sign-in-2">
        <div class="container-fluid no-pdd-horizon">
            <div class="row">
                <div class="col-md-10 mr-auto ml-auto">
                    <div class="row">
                        <div class="mr-auto ml-auto full-height height-100 d-flex align-items-center">
                            <div class="vertical-align full-height">
                                <div class="table-cell">
                            
                                <div class="card">
                                    <div class="card-body">
                                    <div class="pdd-horizon-30 pdd-vertical-30">
                                    <div class="text-center mb-3"><h1><b><font face="Candara">Create New Password</font></b></h1></div>

                                <div class="text-center mb-3"><p><font face="Verdana">Password Min 6 Karakter</font></p></div>
                                
                                <form action="passUpdate.php" method="POST">   
                                    <div class="col-auto">
                                    <label class="sr-only" for="inlineFormInputGroup">New Password</label>
                                                    
                                        <div class="input-group mb-2">                                  
                                        <input type="text" class="form-control" id="dataPass" placeholder="New Password" name="dataPass" required="">
                                        </div></div>
                                                            
                                        <div class="col-auto">
                                        <label class="sr-only" for="inlineFormInputGroup">Konfirmasi Password</label>
                                                        
                                        <div class="input-group mb-2"> 
                                            <input type="password" class="form-control" id="passFix" placeholder="Konfirmasi Password" name="passFix" required>
                                        </div></div>

                                        <div class="col-auto">
                                        <div class="checkbox font-size-13">
                                            <input id="cek" name="cek" type="checkbox" onclick="cekfungsi()">
                                            <label for="cek">Lihat Password</label>
                                        </div></div>                                

                                        <div class="mt-3 text-center">
                                            <div class="form-group row">
                                            <input type="submit" class="btn btn-block btn-primary" name="createPass" value="Create Password">
                                        </div></div>  

                                        <input type="text" id="pls_email" name="pls_email" value="<?php echo $pls_email ?>" hidden>  
                                </form>

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

    <?php

    }else{
        $update = mysqli_query($connect,"UPDATE staf_pelaksana SET token_pass=NULL , token_exp=NULL WHERE pls_email='$pls_email'");
        echo "<script>
                setTimeout(function() {
                    swal({
                        title: 'Oopss!',
                        text: 'Invalid or Expired Link!',
                        type: 'error'
                    }, function() {
                            window.location.href = 'page_warning_pass.html'; 
                    });
                }, 200);
                </script>";
    }
        }else{
            echo "<script>
                setTimeout(function() {
                    swal({
                        title: 'Oopss!',
                        text: 'Invalid or Expired Link!',
                        type: 'error'
                    }, function() {
                            window.location.href = 'page_warning_pass.html'; 
                    });
                }, 200);
                </script>";
            }     
        }else{
            echo "<script>
                setTimeout(function() {
                    swal({
                        title: 'Oopss!',
                        text: 'Error, Try Again Later!',
                        type: 'error'
                    }, function() {
                        window.location.href = 'page_warning_pass.html'; 
                    });
                }, 200);
                </script>";
            }
        }else{
            echo "<script>
                setTimeout(function() {
                    swal({
                        title: 'Oopss!',
                        text: 'Error,Invalid or Expired Link!',
                        type: 'error'
                    }, function() {
                            window.location.href = 'page_warning_pass.html'; 
                    });
                }, 200);
                </script>";
            }
    ?>

    <!-- build:js assets/js/vendor.js -->
    <!-- plugins js -->
    <script src="../assets/vendors/jquery/dist/jquery.min.js"></script>
    <script src="../assets/vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="../assets/vendors/bootstrap/dist/js/bootstrap.js"></script>
    <script src="../assets/vendors/PACE/pace.min.js"></script>
    <script src="../assets/vendors/perfect-scrollbar/js/perfect-scrollbar.jquery.js"></script>
    <script src="../assets/js/fontawesome.min.js"></script>
    <script src="../assets/js/solid.min.js"></script>
    <script src="../assets/vendors/sweetalert/lib/sweet-alert.js"></script>
    <!-- endbuild -->

    <!-- build:js assets/js/app.min.js -->
    <!-- core js -->
    <script src="../assets/js/app.js"></script>
    <!-- endbuild -->

    
    <!-- page js -->

    <script>
    function cekfungsi() {
        var x = document.getElementById("passFix");
            if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
            }
        }
    </script>

</body>
</html>