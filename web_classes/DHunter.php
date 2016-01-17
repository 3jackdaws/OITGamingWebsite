<?php
	include("DUser.php");
	

	class DHunter extends DUser	{
		private 	$fname;
		private 	$hunterID;
		private 	$pictureDir;
		private 	$assignedQuarry;
		private 	$since;
		private 	$points;
		private 	$eliminated;

	
		public function __construct($token)
		{
			Duser::__construct($token);
			$this->getHunterInfo();
			date_default_timezone_set('America/Los_Angeles');

		}

		public function __destruct()
		{
			$this->db->close();
		}

		private function getHunterInfo()
		{
			$this->db->SQLPrepare("SELECT * FROM hunters WHERE id = ?;");
			$args[] = $this->userID;
			$this->db->SQLBind("s", $args);
			$results = $this->db->SQLGetResult();
			$this->fname = $results[2];
			$this->hunterID = $results[3];
			$this->pictureDir = $results[4];
			$this->assignedQuarry = $results[5];
			$this->since = $results[6];
			$this->points = $results[7];
			$this->eliminated = $results[8];
		}

		public function FirstName()
		{
			return $this->fname;
		}

		public function HID()
		{
			return $this->hunterID;
		}

		public function Avatar()
		{
			return $this->pictureDir;
		}

		public function Quarry()
		{
			return $this->assignedQuarry;
		}

		public function Timestamp()
		{
			$timestamp = strtotime($this->since);
			
			return date("Y-m-d H:i:s", $timestamp);
		}

		public function Points()
		{
			return $this->points;
		}

		public function Elimby()
		{
			return $this->eliminated;
		}
			
		public function requestNewQuarry()
		{

			if($this->assignedQuarry != NULL)
			{
				$since = time() - strtotime($this->since);
				
				
				if($since/3600 > 24)
				{
					$this->getQuarry();
					$this->pushQuarry();
					return true;
				}
				else
				{
					
					return round($since/3600);
				}
			}
			else
			{
				return "The event has not yet started.";
			}
			
		}

		public function getQuarry()
		{
			$hids = $this->db->SQLFetchAll("hunterID", "hunters");
			$i = 0;
			shuffle($hids);
			do{
				$newQ = $hids[$i];
				$i++;
			}while($newQ == $this->assignedQuarry or $newQ == $this->hunterID);
			$this->assignedQuarry = $newQ;
			return true;
		}

		public function pushQuarry()
		{
			try{
				$this->db->SQLPrepare("UPDATE hunters SET assignedQuarry = ? WHERE hunterID = ?;");
				$args = array($this->assignedQuarry, $this->hunterID);
				$this->db->SQLBind("ss", $args);
				$this->db->SQLGetResult();
			}
			catch(Exception $e){
				error_log($e);
				return false;
			}
			return true;
		}

		public function ChangeAvatar($web_dir)
		{
			try{
				$this->db->SQLPrepare("UPDATE hunters SET pictureDir = ? WHERE hunterID = ?;");
				$args = array($web_dir, $this->hunterID);
				$this->db->SQLBind("ss", $args);
				$this->db->SQLGetResult();
			}
			catch(Exception $e){
				error_log($e);
				return "Error Setting Picture";
			}
			unlink("/var/www/sites/oitgaming" . $this->pictureDir);
			$this->pictureDir = $web_dir;
			return "Picture Successfully Updated";
		}

		public function IncrementPoints()
		{
			try{
				$this->db->SQLPrepare("UPDATE hunters SET points = points + 1 WHERE hunterID = ?;");
				$args = array($this->hunterID);
				$this->db->SQLBind("s", $args);
				$this->db->SQLGetResult();
			}
			catch(Exception $e){
				error_log($e);
				return "Error Incrementing Points";
			}
		}


		/*----------------HELPER FUNCTIONS-------------*/


	}

	
?>