<?php
//error_reporting(E_ALL);
//ini_set('display_errors', 1);

$sk = '6LcfcqEUAAAAACDh4EbAHO7jkibOk12Mu6h_dlj6';
include('config.php');
$nama=trim($_POST['nama']);
$nologin=trim($_POST['nologin']);
$email=trim($_POST['email']);
$bankaccountnumber=trim($_POST['bankaccountnumber']);
$namabank=trim($_POST['namabank']);
$total=trim($_POST['total']);
$idrnominal=trim($_POST['idrnominal']);
$usdnominal=trim($_POST['usdnominal']);

$ip=$_SERVER['REMOTE_ADDR'];
$_SESSION['ip'] = $ip;
$_SESSION['nama'] = $nama;
$_SESSION['nologin'] = $nologin;
$_SESSION['email'] = $email;
$_SESSION['bankaccountnumber'] = $bankaccountnumber;
$_SESSION['namabank'] = $namabank;
$_SESSION['total'] = $total;
$_SESSION['idrnominal'] = $idrnominal;
$_SESSION['usdnominal'] = $usdnominal;
$tgl = new datetime('Asia/Jakarta');
$tgl= $tgl->format('Y-m-d H:i:s');

//include('mailsend.php');

$captcha = isset($_POST['g-recaptcha-response']) ? $_POST['g-recaptcha-response']:'';
$secret_key = '6LdTjhEUAAAAAE-84wk1jwppAm2ngw6UX22C_pOU'; //masukkan secret key-nya berdasarkan secret key masig-masing saat create api key nya
$error = 'Periksa kembali captcha yang ada';
// if ($captcha != '') {
//    $url = 'https://www.google.com/recaptcha/api/siteverify?secret=' . urlencode($sk) . '&response=' . urlencode($captcha);   
//    $recaptcha = file_get_contents($url);
//    $recaptcha = json_decode($recaptcha, true);
//    if ($recaptcha['success'] == false) {
// 	  //echo $error;
// 	  echo "<script language='javascript'>";
// 	  echo "alert('".$error."')</script>";
// 	  echo "<script>window.location='index.php';</script>";
//    } else {
		if($total=='IDR'){
			$insert = mysqli_query($connect,"insert into withdrawal (nama_nasabah, no_login, email, norekbank, namabank, total, nominal_idr,nominal_usd, ip_address, tanggal) 
			values('$nama','$nologin','$email','$bankaccountnumber','$namabank','$total','$idrnominal','0','".$_SESSION['ip']."','$tgl')");

			if($insert){
				include('save_to_pdf.php');
				// echo $_SESSION['sessionpdf'];
				include('mailtoesandar.php');
				echo "wait for a second";
				echo "<script>window.location='finish.php';</script>"; 
			}else{
				echo "<script>alert('Isian tidak lengkap, harap periksa kembali.');</script>";
			}
		}
		else if($total=='USD'){
			$insert = mysqli_query($connect,"insert into withdrawal (nama_nasabah, no_login, email, norekbank, namabank, total, nominal_idr, nominal_usd, ip_address, tanggal) 
			values('$nama','$nologin','$email','$bankaccountnumber','$namabank','$total', '0','$usdnominal', '".$_SESSION['ip']."','$tgl')");

			if($insert){
				include('save_to_pdf.php');
				include ('mailtoesandarusd.php');
				// echo "<script>window.location='finish.php';</script>";
			}else{
				echo "<script>alert('Isian tidak lengkap, harap periksa kembali.');</script>";
			}
		}
		else 
		{
			echo "<script language='javascript'>";
			echo "alert('Gagal')</script>";
			echo "<script>window.location='index.php';</script>";
		}
   // }
// } else {
//    echo "<script language='javascript'>";
//    echo "alert('Kosong')</script>";
//    echo "<script>window.location='index.php';</script>";
// }
?>