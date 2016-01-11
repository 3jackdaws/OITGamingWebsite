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
			$since = time() - strtotime($this->since);
			
			if($this->since/3600 > 24)
			{
				getQuarry();
				pushQuarry();
			}
		}

		public function getQuarry()
		{
			$this->db->SQLPrepare("SELECT hunterID FROM hunters;");
			$hids = $this->db->SQLGetResult();
			$this->db->SQLPrepare("SELECT DISTINCT assignedQuarry FROM hunters;");
			$takenQuarries = $this->db->SQLGetResult();
			$uniqueQuarries = array_diff($hids, $takenQuarries);
			
			shuffle($uniqueQuarries);
			$newQ = array_pop($uniqueQuarries);
			while($uniqueQuarries and ($newQ === $this->assignedQuarry or $newQ === $this->hunterID))
			{
				$newQ = array_pop($uniqueQuarries);
			}
			if($newQ !== $this->assignedQuarry or $newQ !== $this->hunterID)
			{
				$this->assignedQuarry = $newQ;
			}
			else
			{
				shuffle($hids);
				while($newQ === $this->assignedQuarry or $newQ === $this->hunterID)
				{
					$newQ = array_pop($hids);
				}
				$this->assignedQuarry = $newQ;
			}
			return true;
		}

		private function pushQuarry()
		{
			try{
				$this->db->SQLPrepare("UPDATE users SET assignedQuarry = ? WHERE hunterID = ?");
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
				$this->db->SQLPrepare("UPDATE hunters SET pictureDir = ? WHERE hunterID = ?");
				$args = array($web_dir, $this->hunterID);
				$this->db->SQLBind("ss", $args);
				$this->db->SQLGetResult();
			}
			catch(Exception $e){
				error_log($e);
				return "Error Setting Picture";
			}
			unlink("/var/www/sites/labs" . $this->pictureDir);
			$this->pictureDir = $web_dir;
			return "Picture Successfully Updated";
		}
	}

	
?>