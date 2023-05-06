<?php
session_start();
    include "../koneksi.php";

    $idtu=$_SESSION['tu_id'];
    $namatu=$_SESSION['tu_nama'];
    $emailtu=$_SESSION['tu_email'];
    $fototu=$_SESSION['tu_foto'];
    $nohp=$_SESSION['tu_nohp'];
    $usernametu=$_SESSION['tu_username']; 
    $passtu=$_SESSION['tu_password'];


if(ISSET($idtu))
    { 
        $cekID = mysqli_query($connect, "SELECT * from staftu where tu_id ='$idtu'");
        $user = mysqli_num_rows($cekID);

         //Cek ID
        if($user == 1){
                $dataDB =mysqli_fetch_array($cekID);
                    $dataID = $dataDB['tu_id'];
                    $dataNama = $dataDB['tu_nama'];
                    $dataEmail = $dataDB['tu_email'];
                    $dataFoto = $dataDB['tu_foto'];
                    $dataNoHP = $dataDB['tu_nohp'];
                    $dataUsername = $dataDB['tu_username'];
                    $dataPsd = $dataDB['tu_password'];

                    if($idtu==$dataID AND $namatu==$dataNama AND $emailtu==$dataEmail AND $fototu==$dataFoto AND 
                        $nohp==$dataNoHP AND $usernametu==$dataUsername AND $passtu==$dataPsd){
                            
                            $cekDataFIX =mysqli_query($connect, "SELECT * FROM staftu WHERE tu_id='$idtu'");
                            $data   =mysqli_fetch_array($cekDataFIX);

        }else{header("location:../page_warning.html");}
    }else{header("location:../page_warning.html"); }
}else{ header("location:../page_warning.html"); }

?>