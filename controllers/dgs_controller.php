<?php

class dgs_controller extends controller {
	
	public function __construct()
	{

		$page = param('p');

		if($page == FALSE) {
			$page = 'frontpage';
		}
		
		$this->model = new dgs_model();

		$this->$page();	
	}

	public function frontpage()
	{	
		$data['pagetitle'] = 'DGS alpha 0.1';

		$this->view('frontpage',$data);
	}

	public function courses()
	{
		$data['pagetitle'] = 'Courses';

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

		$course_id = param('cid');

		if($course_id == NULL or $course_id == 0) {
			echo "Error loading course";
			die;
		}

		$func = param('f');

		if($func == 'add') {
			$name = param('name');
			$par = param('par');
			$distance = 10;

			$data['message'] = $this->model->createLane($course_id, $par, $name, $distance);
		}

		$data['course'] = $this->model->getCourseData($course_id);

		$this->view('course', $data);
	}

	public function startcourse()
	{
		$data['pagetitle'] = 'Select course';

		$data['courses'] = $this->model->listCourses();

		$this->view('startcourse', $data);
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

		$data['lane'] = $this->model->getNextLane($scoresheet_id);

		$data['pagetitle'] =  $data['lane']['name'].' '.$data['lane']['sort'];

		for($i=1; $i<7; $i++) {
			$data['score_select_list'][] = $i - $data['lane']['par'];
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