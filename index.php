<?php
	require("/exec/exec_cmd_config.php");
	error_reporting(0);
	$allowed_groups = array((array_values($setup[4])));
		$can_see = FALSE;
		foreach ($allowed_groups as $allowed)
			if (in_array($allowed, $user_info['groups']))
			{
				$can_see = TRUE;
				break;
			}
			
		if ($can_see)
		{	
			ssi_welcome(); echo "<p>Search for user:</p>"; ssi_quickSearch(); echo  '
				<form target="_blank" action="./exec/exec.php" method="post">
						<input type="text" id = "command" name="command" value="" />
							<select name="quickCmd">
							
								<option value="null">Please choose...</option>
									'; foreach($commands as $adminOpts){ echo  '
									
								<option value="'; echo $adminOpts .'">'; echo $adminOpts . '</option>
									'; } echo '>
									
							</select>
						<input type="submit" value="Run" />		
					</form>';
		}
		else
		{
			echo $setup[5];
			redirectexit($setup[6]);
		}
?>

