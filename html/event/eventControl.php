<?php
	$token = $_POST["token"];
	$argline = $_POST["args"];
	//echo $argline;
	if(explode(" ", $argline))
	{
		$args = explode(" ", $argline);
	}
	else
	{
		$args = $argline;
	}

	include_once("/var/www/php/sql_connect.php");

	if(getUserPermissions($token) === 1)
	{
		

		switch($args[0])
		{
			case "set":
			{
				switch($args[1])
				{
					case "round":
					{
						switch($args[2])
						{
							case "0":
							{
								echo setAllQuarriesToThis(NULL) . "<br>";
								echo setAllPointsTo(0) . "<br>";
								echo setAllEliminationsToNull();
								break;
							}
							case "1":
							{
								echo setRoundToOne();
							}
						}
						break;
					}
					case "points":
					{

						break;
					}
					default:
					{
						echo "Unknown command: '" . $arg[0] . " " . $arg[1] . "'"; 
					}
				}
				break;
			}
			case "increment":
			{

			}
			case "query":
			{
				$sql = explode("sql ", $argline);
				echo $sql;
				//var_dump(sqlQuery());
			}
			default:
			{
				echo "Unknown command: " . $argline;
			}
		}
	}
	else
	{
		echo "Invalid token.";
	}
?>