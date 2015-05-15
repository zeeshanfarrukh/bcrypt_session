<?php
class check_auth{
	
	private $uname='';
	private $pwd='';
	//private $db_dsn="mysql:dbname=U_table";
	//using 
   // create a conn fucntion
   
	function __construct($n,$p)
	{
		$this->uname=$n;
		$this->pwd=$p;
	}
	//verfication will be done in this fucnction which will return true or false
	function user_verizon()
	{
	print_r($this->uname);
	print_r($this->pwd);
	}
	
}