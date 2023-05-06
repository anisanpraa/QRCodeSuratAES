<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta http-equiv="x-ua-compatible" content="ie=edge" />
  <title>Server Surat Dinas</title>

     <!-- plugins css -->
    <link rel="stylesheet" href="assets/vendors/bootstrap/dist/css/bootstrap.css" />

    <!-- core css -->
    <link href="assets/css/themify-icons.css" rel="stylesheet">
    <link href="assets/css/flag-icon.min.css" rel="stylesheet">
    <link href="assets/css/app.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/bootstrap-login-form.min.css" />
</head>

<body>
  <!-- Start your project here-->

  <style>
    .divider:after,
    .divider:before {
      content: "";
      flex: 1;
      height: 1px;
      background: #eee;
    }
    .h-custom {
      height: calc(100% - 73px);
    }
    @media (max-width: 450px) {
      .h-custom {
        height: 100%;
      }
    }
  </style>


<section class="vh-100">
  <div class="container-fluid h-custom">
    <div class="row d-flex justify-content-center align-items-center h-100">
      
      <div class="col-md-9 col-lg-6 col-xl-5">
        <img src="assets/images/kuningan.png" class="img-fluid" alt="Sample image" width="480">
      </div>
      
      <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
        
        <form action="proses_login.php" method="POST">       
          <div class="d-flex flex-row align-items-center justify-content-center justify-content-lg-start">
            <b><center><h2 style="font-family: Candara">Aplikasi Pengecekan Keaslian Surat Dinas Bupati Kuningan</h2></center></b>
          </div>

            <div class="divider d-flex align-items-center my-4"></div>

            <!-- Email input -->
              <div class="col-auto mb-4">
                <label class="form-label" for="tu_username">Username</label>
                <input type="text" id="tu_username" name="tu_username" class="form-control form-control-lg" placeholder="Enter Your Username" required/>
              </div>

            <!-- Password input -->
              <div class="col-auto mb-4">
                <label class="form-label" for="tu_password">Password</label>
                <input type="password" id="tu_password" name="tu_password" class="form-control form-control-lg" placeholder="Enter Yout Password" required />
              </div>

            <div class="col-auto mb-4">
              <!-- Checkbox -->
              <div class="form-check mb-0">
                <input class="form-check-input me-2" id="cek" name="cek" type="checkbox" onclick="cekfungsi()">
                <label class="form-check-label" for="cek">Lihat Password</label>
              </div>
            </div>

            <div class="text-center text-lg-start mt-4 pt-2">
                <center> <input type="submit" class="btn btn-primary btn-lg" name="submit" value="Login"></center>
            </div>

        </form>

        <center><a href="#" class="text-body" data-toggle="modal" data-target="#modal-fs">
                <b><u style="color:#778899; font-family: Helvetica;">Lupa Password?</u></b></a></center>
      </div>

    <!--MODALS-->
        <div class="modal fade modal-fs" id="modal-fs">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-body height-100">
                      <div class="vertical-align text-center">
                          <div class="table-cell">
                            <div class="container">
                              <div class="row">
                                <div class="col-md-4 mr-auto ml-auto">
                                  <div class="pdd-horizon-30 pdd-btm-50">
                                                                    
                                    <img width="120" src="assets/images/others/account.png" class='profile-img img-fluid' >
                                    <b><h4 class="mrg-top-20" style="font-family: Candara">Reset Password</h4></b>

                                    <form class="ng-pristine ng-valid" method="POST" action="ForgetPass/passForget.php" name="formForget">
                                    
                                    <div class="form-group">
                                    <div class="input-group">
                                    
                                    <input type="text" class="form-control form-control-lg" placeholder="Email Address" id="tu_email" name="tu_email" required="">
                                    
                                    </div>
                                    </div>                                                 
                                    
                                    <input class="btn btn-info btn-block btn-lg" type="submit" name="submit" value="Submit">
                                    </form>

                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                                                            
                        <div class="modal-close"> <a type="reset" class="ti-close" data-dismiss="modal"></a> </div>                      
                    
                    </div>
                  </div>
                </div>
              </div>
    <!-- Modal END-->
                                            
    </div>
    </div>
    </div>

    <div class="py-4 px-2 px-xl-4 bg-primary">
      <!-- Copyright -->
      <div class="text-white mb-3 mb-md-0">
        Copyright © 2022. Annisa Nurul Pratiwi - 20180810058
      </div>
      <!-- Copyright -->
    </div>

  </section>
  <!-- End your project here-->

  <!-- build:js assets/js/vendor.js -->
  <!-- plugins js -->
    <script src="assets/vendors/jquery/dist/jquery.min.js"></script>
    <script src="assets/vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="assets/vendors/bootstrap/dist/js/bootstrap.js"></script>
    <script src="assets/vendors/PACE/pace.min.js"></script>
    <script src="assets/vendors/perfect-scrollbar/js/perfect-scrollbar.jquery.js"></script>
    <script src="assets/js/fontawesome.min.js"></script>
    <script src="assets/js/solid.min.js"></script>
  <!-- endbuild -->

  <!-- build:js assets/js/app.min.js -->
  <!-- core js -->
    <script src="assets/js/app.js"></script>
    <!-- endbuild -->

    
    <!-- page js -->

    <script>
    function cekfungsi() {
        var x = document.getElementById("tu_password");
            if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
            }
        }
    </script>

</body>

</html>