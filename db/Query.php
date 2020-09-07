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
				$statement = $this->db->prepare("SELECT * from `part_time_teaching`
					where part_time_teaching.added_by=:added_by
					");
				$statement->execute(array(':added_by' => $user_id));
				$rows = $statement->fetchAll();
				return $rows;
 
			}
			catch(PDOException $e)
			{
				echo "The error is ".$e;
			}
 		}


 		public function overtime_claim_data($user_id)
 		{
 			try
			{
				$statement = $this->db->prepare("SELECT overtime_teaching.* from `overtime_teaching`
					where overtime_teaching.added_by=:added_by
					");
				$statement->execute(array(':added_by' => $user_id));
				$rows = $statement->fetchAll();
				return $rows;
 
			}
			catch(PDOException $e)
			{
				echo "The error is ".$e;
			}
 		}

 		public function expense_claim_data($user_id)
 		{
 			try
			{
				$statement = $this->db->prepare("SELECT expense_claim.* from expense_claim
					where expense_claim.uploaded_by=:added_by
					");
				$statement->execute(array(':added_by' => $user_id));
				$rows = $statement->fetchAll();
				return $rows;
 
			}
			catch(PDOException $e)
			{
				echo "The error is ".$e;
			} 			
 		}

 		public function question_claim_data($user_id)
 		{

 			try
			{
				$statement = $this->db->prepare("SELECT `question_paper_form`.* from question_paper_form
					where question_paper_form.uploaded_by=:added_by
					");
				$statement->execute(array(':added_by' => $user_id));
				$rows = $statement->fetchAll();
				return $rows;
 
			}
			catch(PDOException $e)
			{
				echo "The error is ".$e;
			} 	 		}

	}
?>