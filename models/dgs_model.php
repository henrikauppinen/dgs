<?php

class dgs_model {
	
	private $active_scoresheet_id = 1;
	private $active_user_id = 1;

	public function __construct()
	{
		$this->db = new db_model();
	}


	public function createCourse($name = null)
	{
		if($name == null OR $name == '') {
			return false;
		}

		$qu = "INSERT INTO course (name, createtime) VALUES ('{$name}', now())";

		$re = $this->db->query($qu);

		return true;
	}

	public function deleteCourse($course_id = null)
	{
		if($course_id == null OR !(is_numeric($course_id))) 
		{
			return false;
		}

		$this->db->query("DELETE FROM hole WHERE course_id = {$course_id}");
		$this->db->query("DELETE FROM course WHERE id = {$course_id}");

		return true;

	}

	public function listCourses()
	{
		$qu = "SELECT
					id,
					name,
					createtime
				FROM
					course
				";
		$re = $this->db->query($qu);

		$data = array();
		
		while($row = mysql_fetch_assoc($re)) {
			$data[] = $row;
		}

		return $data;
	}

	public function getCourseData($course_id = null)
	{
		if($course_id == null) {
			return false;
		}

		$re = $this->db->query("SELECT * FROM course WHERE id = {$course_id}");

		if(mysql_num_rows($re) == 0) {
			return false;
		}

		$data = mysql_fetch_assoc($re);

		$re = $this->db->query("SELECT * FROM hole WHERE course_id = {$course_id}");

		if(mysql_num_rows($re) > 0) {
			while($row = mysql_fetch_assoc($re)) {
				$data['holes'][] = $row;
			}
		}


		return $data;
	}

	public function createHole($course_id, $par, $name = null, $distance = null)
	{
		if($course_id == 0 OR $par == 0)
		{
			return false;
		}

		$sort = $this->getNextHoleno($course_id);

		$qu = "INSERT INTO hole (course_id, par, sort, name, distance) VALUES ($course_id, $par, $sort, '{$name}', $distance)";

		$re = $this->db->query($qu);

		return TRUE;
	}

	public function editHole($hole_id, $par = null, $name = null, $distance = null)
	{
		if($par != null) {
			$par = "par = $par,";
		}
		if($name != null) {
			$name = "name = '$name',";
		}
		if($distance != null) {
			$distance = "distance = $distance,";
		}

		$qu = "UPDATE
					hole
				SET
					$par
					$name
					$distance
					updatetime = now()
				";

		$re = $this->db->query($qu);

		return array('status' => true, 'Hole updated');
	}

	public function deleteHole($hole_id)
	{		

		# not ready

		return false;

		$this->db->query("DELETE FROM hole WHERE id = {$hole_id}");

		return true;
	}

	public function getHoleData($hole_id)
	{
		$re = $this->db->query("SELECT * FROM hole WHERE id = {$hole_id}");

		if(mysql_num_rows($re) == 0) {
			return false;
		}

		$data = mysql_fetch_assoc($re);

		return $data;
	}

	public function getNextHoleno($course_id)
	{
		$re = $this->db->query("SELECT sort + 1 FROM hole WHERE course_id = {$course_id} ORDER BY sort DESC");


		if(mysql_num_rows($re) == 0) {
			return 1;
		}
		else {
			$row = mysql_fetch_array($re);
			return $row[0];			
		}

	}

	public function getNextHole($scoresheet_id = null)
	{
		if($scoresheet_id == null) {
			return false;
		}

		$re = $this->db->query("SELECT course_id FROM scoresheet WHERE id = $scoresheet_id");

		$row = mysql_fetch_assoc($re);

		$course_id = $row['course_id'];

		$re = $this->db->query("SELECT * FROM hole WHERE course_id = $course_id AND sort = 1");

		$data = mysql_fetch_assoc($re);

		return $data;
	}

	public function createScoresheet($course_id)
	{
		$qu = "INSERT INTO scoresheet (user_id, course_id, createtime) VALUES ($this->active_user_id, $course_id, now())";

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