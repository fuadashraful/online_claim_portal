<?php
	
	class Query
	{
		private $db;
		public function __construct($conn)
		{
			$this->db=$conn;
		}


		public function part_time_claim_data($user_id)
		{

			try
			{
				$statement = $this->db->prepare("SELECT part_time_teaching_data.* from part_time_teaching_data inner join part_time_teaching on part_time_teaching.id=part_time_teaching_data.part_time_teaching_tbl_id
					where part_time_teaching.added_by=:added_by
					group by part_time_teaching_data.id");
				$statement->execute(array(':added_by' => $user_id));
				$rows = $statement->fetchAll();
				return $rows;
			}
			catch(PDOException $e)
			{
				echo "The error is ".$e;
			}
 		}

	}
?>