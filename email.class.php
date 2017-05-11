<?php
error_reporting(0);
//error_reporting(-1);
class Email
{ 
	var $mailaccount = '';
	var $to = '';
	var $toname = '';
	var $from = '';
	var $fromname  = '';
	var $bcc = '';
	var $subject = "";
	var $body = "";
	var $allbcc = array();
	var $allto = array();
	var $alltoname = array();
	var $temp_tonamelist = '';
	var $tem_bcclist = '';
	var $tonamelist = '';
	// variable to receive file type input
	var $allfiles = array();
	// variable for total size of image 
	var $totalSize = 0;
	// variable that stores zip name 
	var $zipname='';
	// variable to decide whether zip is allowed or not 
	var $allowzip='No';
	// temp zip name variable 
	var $zip_name='';
	// temp zip name variable 
	var $zip_name1='';
	var $filelist = array(); //define this on top
	
	function getMailAccount($for)
	{
		
		$array = Array();
		if($for == 'vibescom')
		{
			$array['api_user'] = "vibescom";
			$array['api_key'] = "123-vibes-456";
		}
		return $array; 
	}
	
	///file upload function
	function fileupload()
	{
		if($this->allfiles['name'][0] == "")
		{
			return "";
		}
		if(!file_exists('emailAttachment')){
				mkdir('emailAttachment',0777);
			}
		if($this->allowzip== 'Yes')
		{
			if($this->zipname != "") {
				$this->zip_name = str_replace('.zip', '', $this->zipname);
			}
			else {
				$this->zip_name  = "document";
			}
			$this->zip_name1 = $this->zip_name .time();
			$zip = new ZipArchive();
			$zip->open("emailAttachment/".$this->zip_name1.".zip", ZipArchive :: CREATE);
		}
		foreach ($this->allfiles['name'] as $i=> $name) { 
			$filename= $this->allfiles['name'][$i];
			$tmp= $this->allfiles['tmp_name'][$i];
			$paths='emailAttachment/';		
			$string=time().basename($filename);
			// removing spaces from file path
			$file = str_replace(' ', '-', $string);
			// replacing some special characters
			$filepaths =preg_replace('/[\\\:"*?|\\/<>]/', '-', $file);	
			// replacing other special characters
			$filepath = preg_replace('/[^A-Za-z0-9\-.]/', '-', $filepaths);
			$filesname=$filepath;
			$filespath=$paths.basename($filepath);
			if(move_uploaded_file($tmp, $filespath)) { }
			else {
				// delete all uploaded files.
				for($k=0; $k < count($this->filelist); $k++ )
				{
					unlink($this->filelist[$k]);
				}
				return "Error: unable to attach file ".$filename.". Please try again"; // return from here. 
			}
			// adding files in zip
			if($this->allowzip== 'Yes') {
				$zip->addFile($filespath, $filename);
			}
			else {
				$allfiles .= " -F files\\[\"".$filename."\"\\]=@".$filespath;
				array_push($this->filelist ,$filesname);
			}
			array_push($this->filelist ,$filesname);
		}
		if($this->allowzip== 'Yes') {
			$zip->close();
			$allfiles = " -F files\\[\"".$this->zip_name.".zip\"\\]=@emailAttachment/".$this->zip_name1.".zip";		
		}
		return $allfiles;
	}
	
	function validate()
	{
		//validating uploaded files	
		if($this->allfiles['name'][0] != "")
		{
			$count = count($this->allfiles['name']);
			if($count > 0 && $count <=3)
			{
				foreach ($this->allfiles['name'] as $i=> $name)
				{ 
					$size= $this->allfiles['size'][$i];
					if($size == 0)
					{
						return "File: \"".$name."\" is of 0 byte. Please upload different file";
					}
					$this->totalSize += $size;
					if($this->totalSize >= 6815744)
					{
						return "Total file(s) size can not be more than 6.5 MB";
					}
				}
			}
			if($count > 3)
			{
				return "Please do not attach more than 3 files";
			}
		}
		// trim all the variables
		if($this->mailaccount == '')
		{
			return "Mail Account is Empty.";
		}
		
		$mail_account = $this->getMailAccount($this->mailaccount);
		if(!(isset($mail_account['api_user'])) || $mail_account['api_user'] == '')
		{
			return "Mail Account <b>".$this->mailaccount."</b> does't exit.";
		}
		
		if($this->to == '')
		{
			return "Email To List is blank";
		}
		
		$tolist = explode(",",$this->to);
		if($this->toname != "")
		{
			$tonamelist = explode(",",$this->toname);
			if(sizeof($tonamelist) != sizeof($tolist))
			{
				return "Count of Email To List and Email Toname are not same";
			}
		}
		//echo $this->allto;
		for($z=0;$z<sizeof($tolist);$z++)
		{
			$tolist[$z] = trim($tolist[$z]);
			if($this->toname != "")
			{
				$tonamelist[$z] = trim($tonamelist[$z]);
			}
			if($tolist[$z]== '')
			{
				continue;
			}
			// pattern match for Email
			else if (!filter_var($tolist[$z],FILTER_VALIDATE_EMAIL)) 
			{
				return "To EmailId : <b>".$tolist[$z]."</b> is not valid";
			} 
			else
			{
				array_push($this->allto,$tolist[$z]);
				if($this->toname != "")
				{
					array_push($this->alltoname,$tonamelist[$z]);
				}
			}
		}
		
		if($this->bcc != "")
		{
			$bcclist = explode(",",$this->bcc);
			if(sizeof($bcclist) > 10)
			{
				return "Bcc List can't be greater than 10 Email-Ids.";
			}
			for($i=0;$i<sizeof($bcclist);$i++)
			{
				$bcclist[$i] = trim($bcclist[$i]);
				if($bcclist[$i]== '')
				{
					continue;
				}
				else if (!filter_var($bcclist[$i], FILTER_VALIDATE_EMAIL)) 
				{
					return "BCC EmailId : <b>".$bcclist[$i]."</b> is not valid";
				}
				else
				{
					array_push($this->allbcc,$bcclist[$i]);
				}
			}
		}
		
		if($this->fromname == '')
		{
			return "From Name is Empty.";
		}
		 
		if($this->from == '')
		{
			return "From EmailId is Empty.";
		}
		// pattern match check for From Email
		if(!filter_var($this->from, FILTER_VALIDATE_EMAIL)) 
		{
			return "From EmailId : <b>".$this->from."</b> is not valid";
		}
		if($this->subject == '')
		{
			return "Subject is Empty.";
		}
		if($this->body == '')
		{
			return "Body is Empty.";
		}
		return "0";
	}
	//function for deleting files
	function filecleanup()
	{
		if($this->allowzip== 'Yes') {
			unlink("emailAttachment/".$this->zip_name1.".zip");
		}
		for($k=0; $k < count($this->filelist); $k++)
		{
			unlink("emailAttachment/".$this->filelist[$k]);
		}
	}
	
	function sendemail()
	{
		//call to valiate function
		$validate_res = $this->validate();
		if($validate_res != "0")
		{
			return $validate_res;			
		}
		//calling file upload function
		$alluploadedfiles = $this->fileupload();
		if (preg_match("/^Error/i", $alluploadedfiles)) {
			return $alluploadedfiles;
		}
		
		$message = preg_replace('/\"/', '\\"', $this->body);
		$arr = $this->getMailAccount($this->mailaccount);
		
		
		if($this->bcc != "")
		{
			for($i=0;$i<sizeof($this->allbcc);$i++)
			{
				$this->tem_bcclist .= " -F bcc[]=".trim($this->allbcc[$i]);
			}
		}		
		
		$temp_tolist = '';
		$temp_tolist1 = '';
		$error = '';
		for($i=0;$i<sizeof($this->allto);$i++)
		{	
			//$msg = urlencode($message);
			if(sizeof($this->alltoname) > 0)
			{
				$temp_tolist .= " -F to[]=".$this->allto[$i]." -F toname[]=\"".$this->alltoname[$i]."\" ";
			}
			else
			{
				$temp_tolist .= " -F to[]=".$this->allto[$i];
			}
			$temp_tolist1 .= $this->allto[$i].",";
			
			$sendemail = 0;
			ob_start();	//Anubhav
			if(($i+1) % 20 == 0)
			{
				
				$rtnMSG1 = system("curl ".$temp_tolist." -F subject=\"".$this->subject."\" -F text=\"\" --form-string html=\"".$message."\" ".$this->tem_bcclist." -F from=".$this->from." -F fromname=".$this->fromname." -F api_user=".$arr['api_user']." -F api_key=".$arr['api_key']." https://sendgrid.com/api/mail.send.json" .$alluploadedfiles );
				$this->tem_bcclist = '';
				$sendemail = 1;
			}
			else if(($i+1) == sizeof($this->allto))
			{
				$rtnMSG1 = system("curl ".$temp_tolist." -F subject=\"".$this->subject."\" -F text=\"\" --form-string html=\"".$message."\" ".$this->tem_bcclist." -F from=".$this->from." -F fromname=".$this->fromname." -F  api_user=".$arr['api_user']." -F  api_key=".$arr['api_key']." https://sendgrid.com/api/mail.send.json" .$alluploadedfiles );
				$this->tem_bcclist = '';
				$sendemail = 1;
			}
			ob_end_clean();	//Anubhav
			
			if($sendemail == 1)
			{
				$obj1 = json_decode($rtnMSG1);
				if(($obj1->message=='success'))
				{}
				else
				{
					$error .= "\n"."<br/>".$obj1->message."\n"."<br/>";
					for($m=0; $m<sizeof($obj1->errors); $m++)
					{
						$error .= $obj1->errors[$m]."<br/>"."\n";
					}
					$error .= "\n"."<br/>for emails"."\n"."<br/>".$temp_tolist1;
				}
				$temp_tolist = '';
				$temp_tolist1 = '';
				$sendemail = 0;
			}
		}
		if(count($this->allfiles)!= 0)
		{
			$this->filecleanup();
		}
		$obj1 = json_decode($rtnMSG1);
		if($error == '')
		{
			return "1";
		}
		else
		{
			return $error;
		}
	}
}
?>