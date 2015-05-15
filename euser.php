<?php
//ini_set('display_errors', true);
session_start();
require 'check_auth.php';
// if icluding file check_auth.php then send data to that file other wise use the current file
require("HTML/QuickForm.php");

if(isset($_POST['submitform']))
{
	$form_user=htmlentities($_POST['userlogin']);
	$form_pwd=htmlentities($_POST['password']);
	$auth=new check_auth($form_user,$form_pwd);
	$auth->user_verizon();
}

?>
<!DOCTYPE form PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<!-- Use Session to Customize the page as per user -->
<h3>Secure Login</h3>
<?php 
$form_l= new HTML_QuickForm("login","post",null,true);
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
// after verfication assign session SID (SESSION ID and take user to its home page)
 //break;
	echo 'Redirecting to User Page';
  
}
	else
	{
		echo $form_l->toHTML();
	}
	
	
	function apply_Rules($form_l)
	{
		$form_l->addRule("userlogin","User Required","required");
		$form_l->addRule("userlogin","Digits and Letters only","alphanumeric");
		$form_l->addRule("password","Password Required","required");
		$form_l->addRule("password","Digits and Letters only","alphanumeric");
	}
	
?>`



