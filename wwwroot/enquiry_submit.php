<?php
if(isset($_POST['MM_Contact_Form']) && $_POST['MM_Contact_Form'] == 'Contact Form') {
	$mail_sent_result = email_enquiry_form($_POST['name'], $_POST['company'], $_POST['email'], $_POST['phone'], $_POST['address'], $_POST['country'], $_POST['message'], $_POST['mail_from'], $_POST['mail_to'], $_POST['mail_bcc'], $_POST['mail_cc'], $_POST['page_success'], $_POST['page_failure']);
	
}
function email_enquiry_form($name, $com, $email, $phone, $add, $cou, $mmsg, $mfrom, $mto, $mbcc, $mcc, $suc, $fai) {
	
	$to = $mto; 
	$sub = 'New enquiry from '.$name.' in '.$com.' at '.$cou;
	
	$dr = '<p><font size="2" face="Arial, Helvetica, sans-serif"> Hello,</font></p>';
	
	$msg = '<p><font size="2" face="Arial, Helvetica, sans-serif">You got an enquiry from '.$name.' in '.$com.' at '.$cou.'.</font></p>';
	$msg .= '<p><font size="2" face="Arial, Helvetica, sans-serif"><b>Below are the details:</b></font><br/><br/>';
	$msg .= '<font size="2" face="Arial, Helvetica, sans-serif">Name 	: <strong>'.$name.'</strong></font><br/>';
	$msg .= '<font size="2" face="Arial, Helvetica, sans-serif">Company : <strong>'.$com.'</strong></font><br/>';
	$msg .= '<font size="2" face="Arial, Helvetica, sans-serif">Email	: <strong>'.$email.'</strong></font><br/>';
	$msg .= '<font size="2" face="Arial, Helvetica, sans-serif">Phone	: <strong>'.$phone.'</strong></font><br/>';
	$msg .= '<font size="2" face="Arial, Helvetica, sans-serif">Address : <strong>'.$add.'</strong></font><br/>';
	$msg .= '<font size="2" face="Arial, Helvetica, sans-serif">Contry	: <strong>'.$cou.'</strong></font><br/>';
	$msg .= '<font size="2" face="Arial, Helvetica, sans-serif">Message : <strong>'.$mmsg.'</strong></font><br/>';
		
	$ft = '<p><font size="2" face="Arial, Helvetica, sans-serif">Webmaster,<br />
www.scorpionknits.com</font></p>';
	$mes = $dr . $msg . $ft;
	
	$headers  = "MIME-Version: 1.0\r\n"; 
	$headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 
	$headers .= "From: ".$mfrom."\r\n";
	$headers .= "CC: ".$mcc."\r\n";
	$headers .= "BCC: ".$mbcc."\r\n";
	
	sendmail($to, $sub, $mes, $headers, $suc, $fai);
	
}
function sendmail($to, $sub, $mes, $headers, $spage, $fpage){
	/*echo '<hr />';
	echo 'HEADERS : ' . $headers . '<br /><br />';
	echo 'TO : ' . $to . '<br /><br />';
	echo 'SUBJECT : ' . $sub . '<br /><br />';
	echo 'MESSAGE : ' . $mes . '<br /><br />';
	echo '<hr />';
	exit;
	*/
	if(mail($to, $sub, $mes, $headers)) {
		header('Location:'.$_POST['page_success']) ;
		exit;
	} else {
		header('Location:'.$_POST['page_failure']) ;
		exit;
	}
	
	
}
exit;
?>