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
				$this->authorized = false;
			}
			return $this->authorized;
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

		public function SetToRoundZero()
		{
			try{
				$this->db_connection->SQLPrepare("UPDATE hunters SET eliminated = NULL, assignedQuarry = NULL, points = NULL;");
			
				$this->db_connection->SQLGetResult();
			}
			catch(Exception $e){
				return false;
			}
			return true;
		}

		public function setToRoundOne()
		{
			try{
				$this->db_connection->SQLPrepare("SELECT hunterID FROM hunters WHERE 1=1;");
			
				var_dump($this->db_connection->SQLGetResult());
			}
			catch(Exception $e){
				echo $e->getMessage();
			}
			var_dump($HIDs);
			$listOfQuarries = $HIDs;
			$arraysMatch = true;

			while(!$arraysMatch)
			{
				shuffle($listOfQuarries);
				$arraysMatch = true;
				for ($i=0; $i < count($listOfQuarries); $i++) { 
					if($HIDs[$i] === $listOfQuarries[$i])
					{
						$arraysMatch = false;
						break;
					}
				}

			}
			var_dump($listOfQuarries);
			$this->db_connection->SQLPrepare("UPDATE hunters SET assignedQuarry = ? WHERE hunterID = ?;");
			for ($i=0; $i < count($HIDs); $i++) { 
				try{
					$args = array($listOfQuarries[$i], $HIDs[$i]);
					$this->db_connection->SQLBind("ss", $args);
					$this->db_connection->SQLGetResult();
				}
			 	catch(Exception $e){
			 		error_log($e);
			 	}
			 }
			
			return "Set to round 1";
		}


	}
?>