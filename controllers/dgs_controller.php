<?php

class dgs_controller extends controller {
	
	public function __construct()
	{

		$this->model = new dgs_model();		
		
		$page = param('p');

		if($page == FALSE) {
			$page = 'frontpage';
		}

		$this->$page();	
	}

	public function frontpage()
	{	
		$data['pagetitle'] = 'DGS alpha 0.1';
		$data['page'] = 'frontpage';

		$this->view('frontpage',$data);
	}

	public function courses()
	{
		$data['pagetitle'] = 'Courses';
		$data['page'] = 'courses';

		$func = param('f');

		if($func == 'create')
		{
			# create new course
			$name = param('name');

			$data['message'] = $this->model->createCourse($name);
		}
		elseif($func == 'delete')
		{
			$course_id = param('cid');

			$data['message'] = $this->model->deleteCourse($course_id);
		}

		$data['courselist'] = $this->model->listCourses();

		$this->view('courses', $data);

	}

	public function course()
	{
		# view / edit course

		$data['pagetitle'] = 'Course editor';
		$data['page'] = 'course'; 

		$course_id = param('cid');

		if($course_id == NULL or $course_id == 0) {
			echo "Error loading course";
			die;
		}

		$func = param('f');

		if($func == 'add') {
			$name = param('name');
			$par = param('par');
			$distance = param('distance');

			$data['message'] = $this->model->createHole($course_id, $par, $name, $distance);
		}

		$data['course'] = $this->model->getCourseData($course_id);

		if($data['course'] == false) {
			$data['message'] == 'Error loading course data';
			unset($data['course']);
		}

		$this->view('course', $data);
	}

	public function hole()
	{
		# view / edit hole

		$data['pagetitle'] = 'Hole editor';
		$data['page'] = 'hole';

		$hole_id = param('lid');

		$func = param('f');

		if($func == 'edit') {
			$name = param('name');
			$par = param('par');
			$distance = param('distance');

			$data['message'] = $this->model->editHole($hole_id, $name, $par, $distance);
		}

		$data['hole'] = $this->model->getHoleData($hole_id);
		$data['course'] = $this->model->getCourseData($data['hole']['course_id']);

		$this->view('hole', $data);

	}

	public function checkin()
	{
		$data['pagetitle'] = 'Select course';
		$data['page'] = 'checkin';

		$data['courses'] = $this->model->listCourses();

		$this->view('checkin', $data);
	}

	public function poolarea()
	{
		$data['pagetitle'] = 'Pooling area';
		$data['page'] = 'poolarea';

		$cid = param('cid');


		if($cid != '') {
			$this->model->checkIn($cid);
		}
		elseif(isset($_SESSION['oncourse'])) {
			$cid = $_SESSION['oncourse'];
		}

		$data['course'] = $this->model->getCourseData($cid);

		$this->view('poolarea', $data);
	}

	public function fixscore()
	{
		$hole_no = param('hole');

		$data = $this->model->getScore($hole_no);

		$this->view('fixscore', $data);

	}

	public function oncourse()
	{

		$cid = $_SESSION['oncourse'];

		$hole_id = param('hole');
		$score = param('score');

		if(!(isset($_SESSION['scoresheet_id']))) {
			$this->model->createScoresheet();
		}

		if($hole_id != '' && $score != '') {
			$this->model->createScore($hole_id, $score);
			$_SESSION['last_hole_no'] = $_SESSION['last_hole_no'] + 1;
		}

		$data['hole'] = $this->model->getNextHole();

		if($data['hole'] == false) {

			$data['totalscore'] = $this->model->currentTotalScore();

			$data['course'] = $this->model->getCourseData($_SESSION['oncourse']);

			unset($_SESSION['scoresheet_id']);
			unset($_SESSION['last_hole_no']);

			$this->view('coursecompleted', $data);
		}
		else {

			$data['pagetitle'] =  $data['hole']['sort'].': '.$data['hole']['name'];

			for($i=1; $i<7; $i++) {
				$data['score_select'][] = $i;
			}

			$this->view('oncourse', $data);
		}
	}

	public function add()
	{
		$this->model->createScore();

		$this->view('frontpage',$data);
	}

	public function logout()
	{
		unset($_SESSION["logged"]);
		header("Location: index.php");
	}

	public function profile()
	{

		$data = $this->model->userinfo();

		$this->view('profile', $data);
	}
}