<?php
session_start();
//require 'Check_Pwd.php';
// if icluding file Check_pwd.php then send data to that file other wise use the current file
?>
<!DOCTYPE form PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<!-- Use Session to Customize the page as per user -->
<p><h3>Secure Login</h3></p>
<p> <?php echo "HOME OF:".$_SESSION['USER']?></p>
<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
<div style="width: 40em;">
<label for="userlogin" >Userlogin</label>
<input type="text" name="userlogin" id="userlogin" value=""/>
<label for="password" >Password</label>
<input type="password" name="password" id="password" value=""/>
<div style="clear: both;">
<input type="submit" name="Enter" value="Enter">
</div>
</div>
</form>


