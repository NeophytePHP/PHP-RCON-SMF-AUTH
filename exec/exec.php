<?php  
	require("exec_cmd_config.php");
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
		if(isset($_POST['command'])){
			if(!empty($_POST['command'])){
				if(isset($_POST['quickCmd'])){
					if($_POST['quickCmd'] != 'null'){
						$execute = "ulx " . $_POST['quickCmd'] . ' ' . $_POST['command'];
					} else {
						$execute = $_POST['command'];
					}					
				} else {
					$execute = $_POST['command'];
				}
				$r = new rcon($setup[0],$setup[1],$setup[2]);
				$r->Auth();
				$r->rconCommand($execute);
				echo 'Executed: "' . $execute . '" successfully...';
			}
		}
		}
		else
		{
			echo $setup[5];
			redirectexit($setup[6]);
		}
?>