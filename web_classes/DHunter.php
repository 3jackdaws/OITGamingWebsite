<?php
	include("DBFunctions.php");

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

		}
		public function Avatar()
		{

		}
		public function Quarry()
		{

		}
		public function Timestamp()
		{

		}
		public function Points()
		{

		}
		public function Elimby()
		{

		}
			


	}

	
?>