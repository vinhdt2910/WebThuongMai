<?php
require_once('PHPMailer_v5.1/PHPMailer.php');

class Email {

	
	private $objMailer;
	
	
	
	
	
	
	
	
	public function __construct() {
		
		$this->objMailer = new PHPMailer();
		$this->objMailer->IsSMTP();
		$this->objMailer->SMTPAuth = true;
		$this->objMailer->SMTPKeepAlive = true;
		$this->objMailer->Host = "smtp.gmail.com";
		$this->objMailer->Port = 465;
		$this->objMailer->Username = "niit.test.2016@mail.com";
		$this->objMailer->Password = "axbycz123";
		$this->objMailer->SetFrom("niit.test.2016@mail.com", "Name");
		$this->objMailer->AddReplyTo("niit.test.2016@mail.com", "Name");
		
	}

	public function sendMail($title, $content, $mTo){
		// $nFrom = 'Thanh Ha Book Store';
		// $mFrom = 'minhducdo2603@gmail.com';  //dia chi email cua ban 
		// $mPass = 'gunner2603';       //mat khau email cua ban
		$nFrom = 'Tusachthieunhivn';
		$mFrom = 'tusachthieunhivn@gmail.com';  //dia chi email cua ban 
		$mPass = 'namdepdai';   
		$mail             = new PHPMailer();
		$body             = $content;
		$mail->IsSMTP(); 
		$mail->CharSet   = "utf-8";
		$mail->SMTPDebug  = 0;                     // enables SMTP debug information (for testing)
		$mail->SMTPAuth   = true;                    // enable SMTP authentication
		$mail->SMTPSecure = "ssl";                 // sets the prefix to the servier
		$mail->Host       = "smtp.gmail.com";        
		$mail->Port       = 465;
		$mail->Username   = $mFrom;  // GMAIL username
		$mail->Password   = $mPass;               // GMAIL password
		$mail->SetFrom($mFrom, $nFrom);
		//chuyen chuoi thanh mang
		// $ccmail = explode(',', $diachicc);
		// $ccmail = array_filter($ccmail);
		// if(!empty($ccmail)){
		//     foreach ($ccmail as $k => $v) {
		//         $mail->AddCC($v);
		//     }
		// }
		$mail->Subject    = $title;
		$mail->MsgHTML($body);
		$address = $mTo;
		$mail->AddAddress($address);
		// $mail->AddReplyTo('', '');
		if(!$mail->Send()) {
			return 0;
		} else {
			return 1;
		}
	}
	 
	public function sendMailAttachment($title, $content, $nTo, $mTo,$diachicc='',$file,$filename){
		// $nFrom = 'Freetuts.net';
		// $mFrom = 'xxxx@gmail.com';  //dia chi email cua ban 
		// $mPass = 'passlamatkhua';       //mat khau email cua ban

		$nFrom = 'Tusachthieunhivn';
		$mFrom = 'tusachthieunhivn@gmail.com';  //dia chi email cua ban 
		$mPass = 'namdepdai';   
		$mail             = new PHPMailer();
		$body             = $content;
		$mail->IsSMTP(); 
		$mail->CharSet   = "utf-8";
		$mail->SMTPDebug  = 0;                     // enables SMTP debug information (for testing)
		$mail->SMTPAuth   = true;                    // enable SMTP authentication
		$mail->SMTPSecure = "ssl";                 // sets the prefix to the servier
		$mail->Host       = "smtp.gmail.com";        
		$mail->Port       = 465;
		$mail->Username   = $mFrom;  // GMAIL username
		$mail->Password   = $mPass;               // GMAIL password
		$mail->SetFrom($mFrom, $nFrom);
		//chuyen chuoi thanh mang
		$ccmail = explode(',', $diachicc);
		$ccmail = array_filter($ccmail);
		if(!empty($ccmail)){
			foreach ($ccmail as $k => $v) {
				$mail->AddCC($v);
			}
		}
		$mail->Subject    = $title;
		$mail->MsgHTML($body);
		$address = $mTo;
		$mail->AddAddress($address, $nTo);
		$mail->AddReplyTo('info@freetuts.net', 'Freetuts.net');
		$mail->AddAttachment($file,$filename);
		if(!$mail->Send()) {
			return 0;
		} else {
			return 1;
		}
	}
		

	
	
	
	
	
	
	
	public function process($case = null, $array = null) {
	
		if (!empty($case)) {
		
			switch($case) {
				
				case 1:
				
				// add url to the array
				$link  = "<a href=\"".SITE_URL."/?page=activate&code=";
				$link .= $array['hash'];
				$link .= "\">";
				$link .= SITE_URL."/?page=activate&code=";
				$link .= $array['hash'];
				$link .= "</a>";
				$array['link'] = $link;
				
				$this->objMailer->Subject = "Activate your account";
				
				$this->objMailer->MsgHTML($this->fetchEmail($case, $array));
				$this->objMailer->AddAddress(
					$array['email'], 
					$array['first_name'].' '.$array['last_name']
				);
				
				break;
				
			}
			
			
			// send email
			if ($this->objMailer->Send()) {
				$this->objMailer->ClearAddresses();
				return true;
			}
			return false;
			
		
		}
	
	
	}
	
	
	
	
	
	
	
	
	
	
	public function fetchEmail($case = null, $array = null) {
	
		if (!empty($case)) {
			
			if (!empty($array)) {			
				foreach($array as $key => $value) {
					${$key} = $value;
				}			
			}
			
			ob_start();
			require_once(EMAILS_PATH.DS.$case.".php");
			$out = ob_get_clean();
			return $this->wrapEmail($out);
		
		}
	
	}
	
	
	
	
	
	
	
	
	
	
	public function wrapEmail($content = null) {
		if (!empty($content)) {
			return "<div style=\"font-family:Arial,Verdana,Sans-serif;font-size:12px;color:#333;line-height:21px;\">{$content}</div>";
		}
	}
	
	















}