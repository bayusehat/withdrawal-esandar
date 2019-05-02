<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Formulir Withdrawal</title>

	<!---------- CSS ------------>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script type="text/javascript" src="jquery.price_format.js"></script>
	<script src='https://www.google.com/recaptcha/api.js'></script>
	<!-- Favicon -->
	<link rel="shortcut icon" href="/images/favicon.ico">
</head>
<script type="text/javascript">
$(function(){
	$('#idrnominal').hide();
	$('#usdnominal').hide();
	
	$('#idr').click(function(){
		$('#idrnominal').show();
		$('#usdnominal').hide();
		$("#usdnominal").val('');
	
		/*$('#idrnominal').priceFormat({
			prefix: 'Rp ',
			//centsSeparator: ',',
			thousandsSeparator: '.'
		});*/
	});
				
	$('#usd').click(function(){
		$('#usdnominal').show(); 
		$('#idrnominal').hide();    
		$("#idrnominal").val('');
		
		$('#usdnominal').priceFormat({
			prefix: '',
			centsSeparator: '.',
			thousandsSeparator: ','
		});
	});
});

function validate()
{
	var x=$("input[name=total]:checked").val();
	if (formku.nama.value == "")
	{
		alert("Nama Nasabah belum diisi");
		formku.nama.focus();
		return false;
	} 
	else if (formku.nologin.value == "") 
	{ 
		alert("No. Login belum diisi"); 
		formku.nologin.focus(); 
		return false; 
	} 
	else if (formku.email.value == "")
	{
		alert("Email belum diisi");
		formku.email.focus();
		return false;
	} 
	else if (formku.total.value == "")
	{
		alert("Total Withdrawal belum diisi");
		return false;
	}
	else if (x == "IDR")
	{
		if (formku.idrnominal.value == "")
		{
			alert("Nominal belum diisi");
			formku.idrnominal.focus();
			return false;
		}
		else return true; 
	}
	else if (x == "USD")
	{
		if (formku.usdnominal.value == "")
		{
			alert("Nominal belum diisi");
			formku.usdnominal.focus();
			return false;
		}
		else return true; 
	}
	else return true; 
}
function numbersonly(e){
var unicode=e.charCode? e.charCode : e.keyCode
if (unicode!=8){ //if the key isn't the backspace key (which we should allow)
if (unicode<48||unicode>57) //if not a number
return false//disable key press
}
}
</script>
<body>

    <!--BEGIN #signup-form -->
    <div id="signup-form"><img src="image/logo-esandar300x105.png">
        <!--BEGIN #subscribe-inner -->
        <div id="signup-inner">
        
        	<div class="clearfix" id="header"><br/>
        	<h2><center>FORMULIR WITHDRAWAL</center></h2><br/>
				<table width="100%" border="1" style="border-color:#00000">
					<tr>
						<td style="font-size:20px"><Strong>Note</Strong></td>
					</tr>
					<tr>
						<td><table width="100%" border="0" style="border-color:#00000">
							<tr>
								<ol type="1" style="font-size:15px; margin-left:10px;">
									<li>Untuk withdrawal yang tidak diisi lengkap dan benar, withdrawal tidak akan diproses.</li>
									<li>Withdrawal yang diisi sebelum Jam 12:00 WIB, akan diproses hari itu juga.</li>
									<li>Withdrawal dana hanya dikirimkan ke rekening nasabah yang didaftarkan kepada kami.</li>
								</ol>
							</tr>
							
							</table>
						</td>
					</tr>
				</table><br/>
				</div>
			<form onSubmit="return validate()" action="withdrawalexec.php" name="formku"  method='post'>
			<table width="100%" border="0" style="border-color:#00000">
				<tr>
					<td width="30%">Nama<font color="red"> *</font><br/>&nbsp;</td>
					<td valign="top">:</td>
					<td><input id="nama" class="nama" type="text" name="nama" placeholder="Nama Nasabah"/></td>
				</tr>
				<tr>
					<td valign="top">No. Login<font color="red"> *</font><br/>&nbsp;</td>
					<td valign="top">:</td>
					<td><input class="tempat" name="nologin" id="nologin" type="text" size="50" placeholder="No. Login"></td>
				</tr>
				<tr>
					<td valign="top">Email<font color="red"> *</font><br/>&nbsp;</td>
					<td valign="top">:</td>
					<td><input class="kodeae" name="email" id="email" size="15" type="email" placeholder="Email">
					</td>
				</tr>
				<tr>
					<td valign="top">No. Rekening Bank<font color="red"> *</font><br/>&nbsp;</td>
					<td valign="top">:</td>
					<td><input class="kodeae" name="bankaccountnumber" id="norekbank" size="15" type="text" placeholder="No. Rekening Bank" onKeyPress="return numbersonly(event)">
					</td>
				</tr>
				<tr>
					<td valign="top">Nama Bank<font color="red"> *</font><br/>&nbsp;</td>
					<td valign="top">:</td>
					<td><input class="kodeae" name="namabank" id="namabank" size="15" type="text" placeholder="Nama Bank">
					</td>
				</tr>
				<tr>
					<td valign="top">Total Withdrawal<font color="red"> *</font><br/>&nbsp;</td>
					<td valign="top">:</td>
					<td><input class="checkbox" id="idr" name='total' type='radio' value='IDR'> IDR <input class="kodeae" id="idrnominal" name="idrnominal" type="text" size="30" placeholder="Rp"></td>
				</tr>
				<tr><td valign="top"></td><td valign="top"></td>
					<td><input class="checkbox" id="usd" name='total' type='radio' value='USD'> USD <input class="kodeae" id="usdnominal" name="usdnominal" type="text" size="30" placeholder="$"></td>
				</tr>
				<tr><td valign="top"><div class="g-recaptcha" data-sitekey="6LcfcqEUAAAAAAHvtcdrsCG4dv6D9Sy20-40WYn-"></div></td></tr>
                <tr>
					<td align="center" colspan="3"><div id="required"><p><font color="red">*</font> Kolom Wajib Diisi</p></div>
					<button id="submit" name="submit" type="submit">Submit</button></center></td>
				</tr>
                </table>
            </form>
            
            </div>
        
        <!--END #signup-inner -->
        </div>
        
    <!--END #signup-form -->   
    </div>

</body>
</html>