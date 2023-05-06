<link rel="stylesheet" href="../../assets/css/sweetalert.css" />
<script src="../../assets/vendors/sweetalert/lib/sweet-alert.js"></script>

<?php
    require ("../../koneksi.php");

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    function sendMail($pls_email,$pls_username,$pls_password){
        require('../../PHPMailer/PHPMailer.php');
        require('../../PHPMailer/SMTP.php');
        require('../../PHPMailer/Exception.php');

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
            $mail->setFrom('TAsuratdinas@gmail.com', 'Tugas Akhir Surat Dinas');

            //Add a recipient
            $mail->addAddress($pls_email);     

            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'Akun Login Aplikasi Pengecekan Surat Dinas';
            $mail->Body    = "Anda memiliki akses untuk menggunakan Aplikasi Pengecekan Keaslian Surat Dinas Bupati Kuningan. Akun anda telah kami aktifkan dan siap digunakan. <br><br>
                <b>Detail Informasi Akun    : </b><br>
                Username : $pls_username <br>
                Password : $pls_password <br><br>

                Download Aplikasi <b><a href='mega.nz/file/vjA3nSTS#GrMJuFwpF9Q2C0PC1L8Z5ijjCXu9zKdi9OGjxJqCaa0'>disini</a></b><br><br>
                <b>Silahkan Gunakan Akun Untuk Login Ke Aplikasi.</b>";

            $mail->send();
            return true;

            } catch (Exception $e) {
                return false;
            }
    }


        $pls_id = $_GET["pls_id"];
        $query = mysqli_query($connect,"SELECT * FROM staf_pelaksana where pls_id='$pls_id'");

        if($query){
            if(mysqli_num_rows($query)==1){
                $dataUser = mysqli_fetch_array($query);
                $pls_username = $dataUser['pls_username'];
                $pls_password= $dataUser['pls_password'];
                $pls_email = $dataUser['pls_email'];

                if(sendMail($pls_email,$pls_username,$pls_password)){
                    echo "<script>
                        setTimeout(function() {
                        swal({
                            title: 'Success!',
                            text: 'Data Akun Berhasil di Kirim!',
                            type: 'success'
                        }, function() {
                            window.location.href = '../pelaksana.php'; 
                        });
                        }, 200);
                    </script>";
                }else{
                    echo "<script>
                        setTimeout(function() {
                        swal({
                            title: 'Oopss!',
                            text: 'Gagal Mengirim Email!',
                            type: 'error'
                        }, function() {
                            window.location.href = '../pelaksana.php'; 
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
                            window.location.href = '../pelaksana.php'; 
                        });
                        }, 200);
                    </script>";
            }
        }else{
                echo "<script>
                        setTimeout(function() {
                        swal({
                            title: 'Oopss!',
                            text: 'Error, Try Again!',
                            type: 'error'
                        }, function() {
                            window.location.href = '../pelaksana.php'; 
                        });
                        }, 200);
                    </script>";
            }
?>