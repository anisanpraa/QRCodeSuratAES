<?php
    include '../koneksi.php';
    $response = array();

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    function sendMail($pls_email,$token_pass){
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
            $mail->setFrom('TAsuratdinas@gmail.com', 'Sekretariat Daerah Aplikasi Android');

            //Add a recipient
            $mail->addAddress($pls_email);     

            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'Reset Link Password Android';
            $mail->Body    = "Request Reset Password Telah diterima, ini adalah link untuk melakukan Reset Password Akun Anda. Link akan hangus dalam waktu 10 menit! <br> Click The Link Below : <br> 
                <a href='www.tasuratdinaskuningan.my.id/android/passResetForm.php?pls_email=$pls_email&token_pass=$token_pass'>
                <b>Create New Password</b></a> ";

            $mail->send();
            return true;

            } catch (Exception $e) {
                return false;
            }
    }

        $pls_email = $_POST["pls_email"];
        $query = mysqli_query($connect,"SELECT * FROM staf_pelaksana where pls_email='$pls_email'");
    
        if($query){
            if(mysqli_num_rows($query)==1){
                //EMail Terdaftar 
                $token_pass=bin2hex(random_bytes(16));

                //MENGATUR WAKTU
                date_default_timezone_set('Asia/Jakarta');
                $time = time();
                $date = date("Y-m-d H:i:s", strtotime("+10 minutes", $time));

                $perintah_token_send_email = mysqli_query($connect,"UPDATE staf_pelaksana SET token_pass='$token_pass', 
                    token_exp='$date' WHERE pls_email='$pls_email'");

                if($perintah_token_send_email && sendMail($pls_email,$token_pass)){
                    $response['error']=false;
                    $response['message']="Silahkan Cek Email Anda!";
                }else{
                    $response['error']=true;
                    $response['message']="Error, Try Again Later!";
                }
            }else{
                //EMail Tidak Terdaftar
                $response['error']=true;
                $response['message']="Invalid Email! Email Tidak Terdaftar!";
            }
    }else{
        $response['error']=true;
        $response['message']="Error, Try Again Later!";
    }
    
    echo json_encode($response);

?>