<?php

class dgs_model {
	
	private $active_scoresheet_id = 1;
	private $active_user_id = 1;

	public function __construct()
	{
		require_once 'models/db_model.php';
		$this->db = new db_model();
	}

	public function createUser($name, $passwd, $email)
	{

		if($name == '' OR $passwd == '' OR $email == '') {
			return FALSE;
		}

		$qu = "INSERT INTO user (name, passwd, email) VALUES ({$name}, password({$passwd}), {$email})";

		$re = $this->db->query($qu);

		return TRUE;
	}

	public function createCourse($name = null)
	{
		if($name == null OR $name == '') {
			return false;
		}

		$qu = "INSERT INTO course (name, createdate) VALUES ('{$name}', now())";

		$re = $this->db->query($qu);

		return true;
	}

	public function deleteCourse($course_id = null)
	{
		if($course_id == null OR !(is_numeric($course_id))) 
		{
			return false;
		}

		$this->db->query("DELETE FROM lane WHERE course_id = {$course_id}");
		$this->db->query("DELETE FROM course WHERE id = {$course_id}");

		return true;

	}

	public function getCourseData($course_id = null)
	{
		if($course_id == null) {
			return false;
		}

		$re = $this->db->query("SELECT * FROM course WHERE id = {$course_id}");

		$data = mysql_fetch_assoc($re);

		$re = $this->db->query("SELECT * FROM lane WHERE course_id = {$course_id}");

		while($row = mysql_fetch_assoc($re)) {
			$data['lanes'][] = $row;
		}

		return $data;
	}

	public function createLane($course_id, $par, $name = null, $distance = null)
	{
		if($course_id == 0 OR $par == 0)
		{
			return false;
		}

		$sort = $this->getNextLaneno($course_id);

		$qu = "INSERT INTO lane (course_id, par, sort, name, distance) VALUES ($course_id, $par, $sort, '{$name}', $distance)";

		$re = $this->db->query($qu);

		return TRUE;
	}

	public function deleteLane($lane_id)
	{
		$this->db->query("DELETE FROM lane WHERE id = {$lane_id}");

		return true;
	}

	public function getNextLaneno($course_id)
	{
		$re = $this->db->query("SELECT sort + 1 FROM lane WHERE course_id = {$course_id} ORDER BY sort DESC");


		if(mysql_num_rows($re) == 0) {
			return 1;
		}
		else {
			$row = mysql_fetch_array($re);
			return $row[0];			
		}

	}

	public function getNextLane($scoresheet_id = null)
	{
		if($scoresheet_id == null) {
			return false;
		}

		$re = $this->db->query("SELECT course_id FROM scoresheet WHERE id = $scoresheet_id");

		$row = mysql_fetch_assoc($re);

		$course_id = $row['course_id'];

		$re = $this->db->query("SELECT * FROM lane WHERE course_id = $course_id AND sort = 1");

		$data = mysql_fetch_assoc($re);

		return $data;
	}

	public function listCourses()
	{
		$qu = "SELECT
					course.id,
					course.name,
					createdate
				FROM
					course
			";
		$re = $this->db->query($qu);

		$data = null;
		
		while($row = mysql_fetch_assoc($re)) {
			$data[] = $row;
		}

		return $data;
	}

	public function createScoresheet($course_id)
	{
		$qu = "INSERT INTO scoresheet (user_id, course_id, createdate) VALUES ($this->active_user_id, $course_id, now())";

		$re = $this->db->query($qu);

		$qu = "SELECT last_insert_id()";

		$re = $this->db->query($qu);
		$data = mysql_fetch_array($re);
		return $data[0];
	}

	public function deleteScoresheet($scoresheet_id)
	{
		# ...
	}

	public function getScoresheet($scoresheet_id = null)
	{
		if($scoresheet_id == null) {
			return false;
		}
	}

	public function createScore($track_id, $score)
	{
		$qu = "INSERT INTO score (scoresheet_id, score, createtime)
				VALUES (
					$this->active_scoresheet_id,
					$this->active_user_id,
					$score,
					now()
				)";

		$re = $this->db->query($qu);

		return TRUE;
	}

	public function deleteScore()
	{
		$qu = "DELETE FROM score WHERE user_id = 1";

		$re = $this->db->query($qu);

		return TRUE;
	}

	public function currentTotalScore()
	{
		$qu = "SELECT sum(score) FROM score WHERE scoresheet_id = {$this->active_scoresheet_id}";

		$re = $this->db->query($qu);

		$row = mysql_fetch_assoc($re);

		return $re[0];

	}
		
}