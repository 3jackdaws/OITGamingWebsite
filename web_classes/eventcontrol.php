<?php
	include_once("/var/www/web_classes/DUser.php");
	class EventControlModule
	{
		private 	$currentRound;
		private 	$numberOfParticipants;
		private 	$db_connection;
		public 		$user;
		private 	$authorized;


		public function __construct()
		{
			$this->db_connection = new OITDatabase();
		}

		public function Authenticate()
		{
			if($this->user->Perms() === 1)
			{
				$this->authorized = true;
			}
			else
			{
				$authorized = false;
			}
			return $authorized;
		}

		public function SetQuarriesNull()
		{
			try{
				$this->db_connection->SQLPrepare("UPDATE users SET assignedQuarry = NULL;");
				$this->db_connection->SQLGetResult();
			}
			catch(Exception $e){
				return false;
			}
			return true;
		}

		public function SetEliminations($value)
		{
			try{
				$this->db_connection->SQLPrepare("UPDATE users SET eliminated = ?;");
				$args[] = $value; 
				$this->db_connection->SQLBind("s", $args);
				$this->db_connection->SQLGetResult();
			}
			catch(Exception $e){
				return false;
			}
			return true;
		}

	}
?>