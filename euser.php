<?php
//ini_set('display_errors', true);
session_start();
require 'check_auth.php';
// if icluding file check_auth.php then send data to that file other wise use the current file
//Use HTML_QUICKFORM2 its the latest version
require("HTML/QuickForm.php");
//checking non emty fields before posting for authentication
!empty($_POST['userlogin']) && !empty($_POST['password'])?$f_enter=true:$f_enter=false;

if(($f_enter) && ($_SESSION['vForm']==="valid"))
{
	//break;
	$form_user=htmlentities($_POST['userlogin']);
	$form_pwd=htmlentities($_POST['password']);
	$auth=new check_auth($form_user,$form_pwd);
	$s_user=$auth->user_verizon();
	unset($_SESSION['vForm']);
}
?>
<!DOCTYPE form PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<!-- Use Session to Customize the page as per user -->
<h3>Secure Login</h3>
<?php 
$form_l= new HTML_QuickForm("login","post",htmlspecialchars($_SERVER['PHP_SELF']),true);
$form_l->addElement('header', null, 'Login Here');
//$form_l->addElement( "image", "img_log", "Log_In.png", "style=width:75;height:75"  );
$form_l->addElement("text","userlogin","User Name");
$pwd=$form_l->addElement("password","password","Password");
$pwd->setValue("");
$form_buttons=array();
$form_buttons[]=HTML_QuickForm::createElement("submit","submitform","Send");
$form_buttons[]=HTML_QuickForm::createElement("reset","resetform","Reset");
$form_l->addGroup($form_buttons,null,null,"");
apply_Rules($form_l);
if(($form_l->isSubmitted()) && ($form_l->validate())  )
{
 //add a session variable to $_SESSION after verfication
 $_SESSION['vForm']="valid";
 !empty($s_user)?print "Your being rdirected to your home page" : 
  				 print "User ID and Password doesnot exist in system" ;
 
 
 
}
	else
	{
		echo $form_l->toHTML();
		unset($s_user);
	}
	
	
	function apply_Rules($form_l)
	{
		$form_l->addRule("userlogin","User Required","required");
		$form_l->addRule("userlogin","Digits and Letters only","alphanumeric");
		$form_l->addRule("password","Password Required","required");
		$form_l->addRule("password","Digits and Letters only","alphanumeric");
	}
	
?>
<br>
<a style="font: bolder;" href="addUser.php" name="addUser" id="addUser">New User</a>


