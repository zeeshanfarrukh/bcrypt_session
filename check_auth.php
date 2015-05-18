<?php
//declare any form relevant variables here
$_SESSION['vForm']="";
class check_auth{
	
	private $uname;
	private $pwd;
	//private $db_dsn="mysql:dbname=U_table";
    //you can also you xml file 
    // create a conn fucntion for mysql or with any db
   
	//constructor to set name and password
	function __construct($n,$p)
	{
		$this->uname=$n;
		$this->pwd=$p;
	}
	//verfication will be done in this fucnction which will return true or false
	function user_verizon()
	{
	$userList = simplexml_load_file( "db_file.xml", "SimpleXMLElement",LIBXML_NOCDATA );
	$e_user=array();
	
	foreach($userList as $k => $data)
	{
		if($k=='name' || $k=='password')
			{
			    if($this->uname==$data)
				$e_user['name']="nameOK";
				
			    // to verify with new password function PHP>=5.5
				//if(password_verify($this->pwd, $data))
				
				// to test with PHP<=5.4 you can also you blowfish with this
				if(crypt($this->pwd,CRYPT_BLOWFISH)==$data)
				$e_user['pwd']="passwordOk";
			}
			else 
			{
				continue;
			}		
		
	}
     if(count($e_user)==2)
     return $e_user;
     else 
     return	false;
     
	}
	
	function user_newzone()
	{
		//for new blowfish algorith use the new password_hash below one specified salt
			
		//$hash_password=  password_hash($this->pwd, PASSWORD_DEFAULT);
		
		// for testing on php<5.5 use the below crypt with specific salt you can also you blowfish with this
		$chk_user=array();
		$chk_user= $this->user_verizon();
		if(!empty($chk_user))
		{
		echo "user name already exists choose different";
		return false;
		}
		
		$hash_password= crypt($this->pwd,CRYPT_BLOWFISH);
		$xml_user=simplexml_load_file("db_file.xml");
		$xml_user->addChild("name",$this->uname);
		$xml_user->addChild("password",$hash_password);
		return $xml_user->asXML("db_file.xml");
		
			
	}
	
	
	
}