<?php

class dgs_model {
	
	private $active_scoresheet_id = 1;
	private $active_user_id = 1;

	public function __construct()
	{
		$this->db = new db_model();
	}


	public function createCourse($course = null)
	{
		if($course == null or $course['name'] == '') {
			return false;
		}

		$qu = "INSERT INTO course (name, streetaddress, postcode, city, rating, createtime)
				VALUES ('{$course['name']}', '{$course['streetaddress']}', '{$course['postcode']}', '{$course['city']}', '{$course['rating']}', now())";

		$re = $this->db->query($qu);

		return true;
	}

	public function updateCourse($course = null)
	{
		if($course == null) {
			return false;
		}

		$qu = "UPDATE
					course
				SET
					name = '{$course['name']}',
					streetaddress = '{$course['streetaddress']}',
					postcode = '{$course['postcode']}',
					city = '{$course['city']}',
					rating = '{$course['rating']}'
				WHERE
					id = {$course['id']}";

		$re = $this->db->query($qu);

		return true;
	}

	public function deleteCourse($course_id = null)
	{
		if($course_id == null OR !(is_numeric($course_id))) 
		{
			return false;
		}

		# check if course has been used
		
		$usage = $this->courseUsageCount($course_id);

		if($usage > 0) {
			return false;
		}

		$this->db->query("DELETE FROM hole WHERE course_id = {$course_id}");
		$this->db->query("DELETE FROM course WHERE id = {$course_id}");

		return true;

	}

	public function courseUsageCount($course_id = null)
	{
		if($course_id == null) {
			return false;
		}

		$row = $this->db->fetchRow("SELECT count(*) usecount FROM scoresheet WHERE course_id = {$course_id}");

		return $row['usecount'];
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
				$totaldist = $totaldist + $row['distance'];
			}
		}
		else {
			$totaldist = '-';
		}

		$data['totaldistance'] = $totaldist;

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

	public function getNextHole()
	{
		if($_SESSION['scoresheet_id'] == null) {
			return false;
		}

		$re = $this->db->query("SELECT course_id FROM scoresheet WHERE id = {$_SESSION['scoresheet_id']}");

		$row = mysql_fetch_assoc($re);

		$course_id = $row['course_id'];

		$next_hole_no = $_SESSION['last_hole_no'] + 1;

		$re = $this->db->query("SELECT * FROM hole WHERE course_id = $course_id AND sort = $next_hole_no");

		if(mysql_num_rows($re) == 0) {
			return false;
		}

		$data = mysql_fetch_assoc($re);

		return $data;
	}

	public function createScoresheet()
	{
		$qu = "INSERT INTO scoresheet (user_id, course_id, createtime) VALUES ({$_SESSION['uid']}, {$_SESSION['oncourse']}, now())";

		$re = $this->db->query($qu);

		$qu = "SELECT last_insert_id()";

		$re = $this->db->query($qu);
		$data = mysql_fetch_array($re);

		$_SESSION['scoresheet_id'] = $data[0];
		$_SESSION['last_hole_no'] = 0;

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

	public function createScore($hole_id = null, $score = null)
	{
		if($hole_id == null OR $score == null) {
			return false;
		}

		$qu = "INSERT INTO score (scoresheet_id, score, hole_id, createtime)
				VALUES (
					{$_SESSION['scoresheet_id']},
					$score,
					$hole_id,
					now()
				)";

		$re = $this->db->query($qu);

		return true;
	}

	public function deleteScore()
	{
		$qu = "DELETE FROM score WHERE user_id = 1";

		$re = $this->db->query($qu);

		return true;
	}

	public function currentTotalScore()
	{
		$qu = "SELECT sum(score) totalscore FROM score WHERE scoresheet_id = {$_SESSION['scoresheet_id']}";

		$re = $this->db->query($qu);

		$row = mysql_fetch_assoc($re);

		return $row['totalscore'];

	}
	
	public function checkIn($cid)
	{

		$uid = $_SESSION['uid'];

		if($uid == '' OR $cid == '') {
			return false;
		}

		$this->db->query("UPDATE user SET oncourse = $cid, checkintime = now() WHERE id = $uid");

		$_SESSION['oncourse'] = $cid;

		return true;
	}

	public function userinfo()
	{
		$uid = $_SESSION['uid'];

		if($uid == '') {
			return false;
		}

		# total rounds
		$row = $this->db->fetchRow("SELECT count(*) rounds FROM scoresheet WHERE user_id = {$uid}");
		$data['stats']['rounds'] = $row['rounds'];

		# total throws
		$row = $this->db->fetchRow("SELECT sum(score) throws, count(*) holes FROM scoresheet JOIN score ON (score.scoresheet_id = scoresheet.id) WHERE user_id = {$uid} GROUP BY user_id");
		$data['stats']['throws'] = $row['throws'];
		$data['stats']['holes'] = $row['holes'];

		$data['stats']['avg'] = round($row['throws'] / $row['holes'],2);

		$row = $this->db->fetchRow("SELECT count(*) throws, sum(hole.par / score.score) rate
									FROM scoresheet
									JOIN score ON (score.scoresheet_id = scoresheet.id)
									JOIN hole ON (score.hole_id = hole.id)
									WHERE user_id = {$uid}");

		$data['stats']['skill'] = round($row['rate'] / $row['throws'] * 100, 2) .' %';

		return $data;
	}

}