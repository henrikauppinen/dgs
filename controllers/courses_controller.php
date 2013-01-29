<?php

class courses_controller extends controller {
	
	public $ratings = array('A1','A2','A3','B1','B2','B3','C1','C2','C3');
	public $course_id = null;

	public function __construct()
	{
		$this->model = new dgs_model();
		
		$page = param('f');

		$this->course_id = param('cid');

		if($page == false) {
			$page = 'courses';
		}

		$this->$page();
	}

	public function courses()
	{
		$data['pagetitle'] = 'Courses';
		$data['page'] = 'courses';

		$data['courselist'] = $this->model->listCourses();

		$this->view('courselist', $data);

	}

	public function create()
	{

		# create new course
		$newcourse['name'] = param('name');
		$newcourse['streetaddress'] = param('streetaddress');
		$newcourse['postcode'] = param('postcode');
		$newcourse['city'] = param('city');
		$newcourse['rating'] = param('rating');

		if($newcourse['name'] != '') {
			$data['message'] = $this->model->createCourse($newcourse);
		}

		$this->courses();
	}

	public function update()
	{

		if($this->course_id == '') {
			echo "Error updating";
			exit;
		}

		$coursedata['id'] = $this->course_id;
		$coursedata['name'] = param('name');
		$coursedata['streetaddress'] = param('streetaddress');
		$coursedata['postcode'] = param('postcode');
		$coursedata['city'] = param('city');
		$coursedata['rating'] = param('rating');

		$data['message'] = $this->model->updateCourse($coursedata);

		header('Location: dgs.php?p=courses&f=course&cid='.$this->course_id);
		exit;

	}

	public function delete()
	{
		if($this->course_id == '') {
			echo "Error deleting";
		}

		$data['message'] = $this->model->deleteCourse($this->course_id);

		$this->courses();

	}

	public function course()
	{
		# view / edit course
		
		$data['pagetitle'] = 'Course editor';
		$data['page'] = 'course'; 

		if($this->course_id == NULL or $this->course_id == 0) {
			echo "Error loading course";
			die;
		}

		$data['course'] = $this->model->getCourseData($this->course_id);
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

		if($this->course_id == null or $this->course_id == 0) {
			echo "error";
			die;
		}

		$data['course'] = $this->model->getCourseData($this->course_id);
		$data['usagecount'] = $this->model->courseUsageCount($this->course_id);
		
		$data['ratings'] = $this->ratings;

		$this->view('editcourse', $data);

	}

	public function hole()
	{

		$data['pagetitle'] = 'Hole editor';
		$data['page'] = 'hole';

		$hole_id = param('id');

		$data['hole'] = $this->model->getHoleData($hole_id);
		$data['course'] = $this->model->getCourseData($data['hole']['course_id']);

		$this->view('hole', $data);

	}

	public function addhole()
	{

		if($this->course_id == NULL or $this->course_id == 0) {
			echo "Error loading course";
			die;
		}

		$name = param('name');
		$par = param('par');
		$distance = param('distance');

		$data['message'] = $this->model->createHole($course_id, $par, $name, $distance);

		$this->course();

	}

	public function deletehole()
	{
		$hole_id = param('id');

		$data['message'] = $this->model->deleteHole($hole_id);

		$this->course();
	}

	public function updatehole()
	{
		$hole_id = param('id');

		$name = param('name');
		$par = param('par');
		$distance = param('distance');

		$data['message'] = $this->model->editHole($hole_id, $name, $par, $distance);

		header('Location: dgs.php?p=courses&f=hole&id='.$hole_id);
	}

	public function edithole()
	{
		$data['pagetitle'] = 'Edit';
		$data['page'] = 'edithole';

		$hole_id = param('id');

		$data['hole'] = $this->model->getHoleData($hole_id);

		$this->view('edithole', $data);
	}
}