<?php
session_start();
require_once('PHPmailer/class.phpmailer.php');
require("PHPmailer/class.smtp.php");
$mail = new PHPMailer(true);
$to='info.esandar@gmail.com';
$att='pdf_withdrawal/'.$_SESSION['sessionpdf'].'.pdf';

//echo $_SESSION['sessionpdf'];

try 
{
    /*
	$mail->Host       = "103.225.209.36"; // isi dengan host sesuai keinginan Anda 74.125.129.108
	$mail->SMTPAuth   = true;
	$mail->SMTPSecure = "tls";
	$mail->Host       = "103.225.209.36";
	$mail->Port       = 25;
	$mail->SMTPDebug  = 0;
	$mail->Username   = 'admin@esandar.co.id';  // isi dengan gmail anda
	$mail->Password   = '4W-c~y+m7DAi';       // isi dengan password gmail anda
	*/
	
    /*
	$mail->Host       = "139.99.65.61"; // isi dengan host sesuai keinginan Anda 74.125.129.108
	$mail->SMTPAuth   = false; //true;
	$mail->SMTPSecure = false; //"ssl";
	$mail->Port       = 25; //465; 
	$mail->SMTPDebug  = 0;
	$mail->Username   = 'admin@esandar.co.id';  // isi dengan gmail anda
	$mail->Password   = '4W-c~y+m7DAi';       // isi dengan password gmail anda
	*/
	
	$mail->SMTPDebug = 0;                                 
    $mail->isSMTP();                                      
    $mail->Host = 'smtp.sendgrid.net';  
    $mail->SMTPAuth = true;                               
    $mail->Username = 'apikey';                 
    $mail->Password = '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';                           
    $mail->SMTPSecure = 'tls';                            
    $mail->Port = 587;     // isi dengan password gmail anda
	
	
	//$mail->AddReplyTo('david@mss.co.id', 'Esandar');      
	$mail->addAddress($to,'Konfirmasi Withdrawal dari ['.$_SESSION['nama'].']'); // isi alamat tujuan email, NB : khusus untuk mengirim dari gmail ke yahoo agak lama
	//$mail->AddBCC("davidhariyanto08@gmail.com", 'Konfirmasi Withdrawal dari ['.$_SESSION['newid'].']');
	//$mail->AddBCC("riorzky@gmail.com", 'Konfirmasi Withdrawal dari ['.$_SESSION['nama'].']');
	$mail->setFrom('admin@esandar.co.id', 'Konfirmasi Withdrawal dari ['.$_SESSION['nama'].']'); 
	//$mail->SetFrom('devtest@o2bro.com', 'Konfirmasi Withdrawal dari ['.$_SESSION['nama'].']'); 
	$mail->Subject = 'Konfirmasi Withdrawal dari ['.$_SESSION['nama'].']';
	$mail->addAttachment($att);
	$mail->AltBody = 'Untuk melihat email ini, gunakan browser yang kompatibel dengan html';
	$mail->Body = "<h3 style=\"color:#1d5f9c;\"><b>KONFIRMASI WITHDRAWAL</b></h3>
			
			<table border=\"0\" >
			  <tr>
			  	<td width=\"250\">Nama</td><td width=\"20\"> : </td><td width=\"350\">".$_SESSION['nama']."</td>			  	
			  </tr>
			  <tr>
			  	<td width=\"250\">No Login</td><td width=\"20\"> : </td><td width=\"350\">".$_SESSION['nologin']."</td>
			  </tr>
			  <tr>
			  	<td width=\"250\">Email</td><td width=\"20\"> : </td><td width=\"350\">".$_SESSION['email']."</td>
			  </tr>
                          <tr>
			  	<td width=\"250\">No. Rekening Bank</td><td width=\"20\"> : </td><td width=\"350\">".$_SESSION['bankaccountnumber']."</td>
			  </tr>
                          <tr>
			  	<td width=\"250\">Nama Bank</td><td width=\"20\"> : </td><td width=\"350\">".$_SESSION['namabank']."</td>
			  </tr>
			  <tr>
			  	<td width=\"250\">Jumlah Withdrawal</td><td width=\"20\"> : </td><td width=\"350\">Rp ".number_format($_SESSION['idrnominal'],0,'','.')."</td>
			  </tr>
			  <tr>
			  	<td width=\"250\">IP Address</td><td width=\"20\"> : </td><td width=\"350\">".$_SESSION['ip']."</td>
			  </tr>
			</table>";
	
	$mail->send();
	
	/*
    if(!$mail->send()) {
      echo 'Message was not sent.';
      echo 'Mailer error: ' . $mail->ErrorInfo;
    } else {
      echo 'Message has been sent.';
    }
    exit();
    */
    
    
	
} 
catch (phpmailerException $e){
    //print_r($mail);
    //echo $e;
}
catch (Exception $e) {
    //echo $e;
}

?>