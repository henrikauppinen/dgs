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
			$this->model->signIn($cid);
		}

		$data['pool'] = $this->model->pool();

		$this->view('poolarea', $data);
	}

	public function oncourse()
	{

		$func = param('f');

		if($func == 'start') {

			$course_id = param('cid');

			$scoresheet_id = $this->model->createScoresheet($course_id);
		}
		else {
			$scoresheet_id = param('sid');
			# if sid = tyhjä, haetaan userin aktiivinen sessio...
		}

		$data['hole'] = $this->model->getNextHole($scoresheet_id);

		$data['pagetitle'] =  $data['hole']['name'].' '.$data['hole']['sort'];

		for($i=1; $i<7; $i++) {
			$data['score_select_list'][] = $i - $data['hole']['par'];
		}

		$this->view('oncourse', $data);
	}

	public function add()
	{
		$this->model->createScore();

		$this->view('frontpage',$data);
	}

	public function logout()
	{
		unset($_SESSION["logged"]);  // where $_SESSION["nome"] is your own variable. if you do not have one use only this as follow **session_unset();**
		header("Location: index.php");
	}
}