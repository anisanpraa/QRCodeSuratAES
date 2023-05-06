<link rel="stylesheet" href="../assets/css/sweetalert.css" />
<script src="../assets/vendors/sweetalert/lib/sweet-alert.js"></script>

<?php
    require ("../koneksi.php");

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    function sendMail($tu_email,$pass_token){
        require('../PHPMailer/PHPMailer.php');
        require('../PHPMailer/SMTP.php');
        require('../PHPMailer/Exception.php');

        $mail = new PHPMailer(true);

        try {
            //Server settings

            //EMAIL PENGIRIM
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = 'TAsuratdinas@gmail.com';                     //SMTP username
            $mail->Password   = 'noqokklrcqoveens';                               //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
            $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients(PENERIMA)
            $mail->setFrom('TAsuratdinas@gmail.com', 'Sekretariat Daerah Website');

            //Add a recipient
            $mail->addAddress($tu_email);     

            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'Reset Link Password Staf TU';
            $mail->Body    = "Request Reset Password Telah diterima, ini adalah link untuk melakukan Reset Password Akun Anda. Link akan hangus dalam waktu 10 menit! <br> Click The Link Below : <br> 
                <a href='www.tasuratdinaskuningan.my.id/ForgetPass/passResetForm.php?tu_email=$tu_email&pass_token=$pass_token'>
                <b>Reset Password</b></a> ";

            $mail->send();
            return true;

            } catch (Exception $e) {
                return false;
            }
    }

//PROSES SEND EMAIL
        $tu_email = $_POST["tu_email"];
        $query = mysqli_query($connect,"SELECT * FROM staftu where tu_email='$tu_email'");
        
    //Kondisi Jika QUERY BERJALAN
        if($query){
            
            //Jika Email Tersedia
            if(mysqli_num_rows($query)==1){
                $pass_token=bin2hex(random_bytes(16));

                //MENGATUR WAKTU
                date_default_timezone_set('Asia/Jakarta');
                $time = time();
                $date = date("Y-m-d H:i:s", strtotime("+10 minutes", $time));

                $perintah_token_send_email = mysqli_query($connect,"UPDATE staftu SET pass_token='$pass_token', pass_token_exp='$date' WHERE tu_email='$tu_email'");
                
                //Jika Data Benar
                if($perintah_token_send_email && sendMail($tu_email,$pass_token)){
                    echo "<script>
                        setTimeout(function() {
                        swal({
                            title: 'Success!',
                            text: 'Link Reset Password Berhasil di Kirim! Silahkan Cek Email Anda!',
                            type: 'success'
                        }, function() {
                            window.location.href = '../index.php'; 
                        });
                        }, 200);
                    </script>";
                }else{
                    echo "<script>
                        setTimeout(function() {
                        swal({
                            title: 'Oopss!',
                            text: 'Error, Try Again Later!',
                            type: 'error'
                        }, function() {
                            window.location.href = '../index.php'; 
                        });
                        }, 200);
                    </script>";
                }
            }
            
            //Jika Email Tidak Tersedia
            else{
                echo "<script>
                        setTimeout(function() {
                        swal({
                            title: 'Oopss!',
                            text: 'Invalid Email! Email Tidak Terdaftar!',
                            type: 'error'
                        }, function() {
                            window.location.href = '../index.php'; 
                        });
                        }, 200);
                    </script>";
            }
        }
        //Kondisi Jika QUERY Tidak Jalan
        else{
                    echo "<script>
                        setTimeout(function() {
                        swal({
                            title: 'Oopss!',
                            text: 'Error, Try Again Later!',
                            type: 'error'
                        }, function() {
                            window.location.href = '../index.php'; 
                        });
                        }, 200);
                    </script>";
                }

?>