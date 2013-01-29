<?php

class course_controller extends controller {
	
	public function __construct()
	{
		$this->model = new dgs_model();
		
		$page = param('p');

		if($page == FALSE) {
			$page = 'frontpage';
		}

		$this->$page();
	}

	public function courses()
	{
		$data['pagetitle'] = 'Courses';
		$data['page'] = 'courses';

		$func = param('f');

		if($func == 'create')
		{
			# create new course
			$newcourse['name'] = param('name');
			$newcourse['streetaddress'] = param('streetaddress');
			$newcourse['postcode'] = param('postcode');
			$newcourse['city'] = param('city');
			$newcourse['rating'] = param('rating');
			echo "<pre>";print_r($newcourse);die;
			$data['message'] = $this->model->createCourse($newcourse);
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
		elseif($func == 'edit') {
			$coursedata['id'] = $course_id;
			$coursedata['name'] = param('name');
			$coursedata['streetaddress'] = param('streetaddress');
			$coursedata['postcode'] = param('postcode');
			$coursedata['city'] = param('city');
			$coursedata['rating'] = param('rating');

			$data['message'] = $this->model->updateCourse($coursedata);
		}

		$data['course'] = $this->model->getCourseData($course_id);
		$data['ratings'] = $this->ratings;

		if($data['course'] == false) {
			$data['message'] == 'Error loading course data';
			unset($data['course']);
		}

		$this->view('course', $data);
	}

	public function editcourse()
	{
		$data['pagetitle'] = 'Edit';
		$data['page'] = 'editcourse';

		$course_id = param('cid');

		$func = param('f');


		if($course_id == null or $course_id == 0) {
			echo "error";
			die;
		}

		if($func == 'delete') {
			$this->model->deleteCourse($course_id);
			header('Location: index.php?p=courses');
			die;
		}



		$data['course'] = $this->model->getCourseData($course_id);
		$data['usagecount'] = $this->model->courseUsageCount($course_id);
		
		$data['ratings'] = $this->ratings;

		$this->view('editcourse', $data);

	}
}