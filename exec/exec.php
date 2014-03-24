<?php  
	require("exec_cmd_config.php");
	error_reporting(0);
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
?>