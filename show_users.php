<?php
//public user functions and classes shoud be in this file
//
require_once("HTML/QuickForm.php");
require_once("HTML/QuickForm/element.php");
require_once 'HTML/QuickForm/Renderer.php';

class show_user
{
 
	function show_all_users()
	{
		$uform= new HTML_QuickForm( "ushow");
		$r_user=new HTML_QuickForm_Renderer();
		$uform->accept($r_user);
		$userList = simplexml_load_file( "db_file.xml", "SimpleXMLElement",LIBXML_NOCDATA );
		$sh_user=array();
		
		?>
		<table align="center"  style="border-bottom-color: navy; background:activeborder; ;"   >
			  <tr>
			    <th>List of User</th>
			    <th>Exists in System</th>
			  </tr>
		<?php 	  
		foreach($userList as $k => $data)
		{
			if($k=='name')
			{
			?>
			
			  <tr>
			    <td><?=$data?></td>
			   </tr>
			
			<?php 	
				
			}
		}
		?>
		
		</table>
		<?php 
		echo $uform->toHtml();
	}
	
	
}

?>