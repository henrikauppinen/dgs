<?php

class dgs_controller extends controller {
	
	public $ratings = array('A1','A2','A3','B1','B2','B3','C1','C2','C3');

	public function __construct()
	{

		$this->model = new dgs_model();
		
		$page = param('f');

		if($page == FALSE) {
			$page = 'frontpage';
		}

		$this->$page();
	}

	public function frontpage()
	{	
		$data['pagetitle'] = 'DGS alpha 0.1';
		$data['page'] = 'frontpage';

		$data['messages'] = $this->model->getMessages();

		$this->view('frontpage',$data);
	}

	public function messages()
	{
		# messages subpage

		$data = $this->model->getMessages();

		$this->view('messages', $data);
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
		$data['pagetitle'] = 'Course';
		$data['page'] = 'poolarea';

		$cid = param('cid');


		if($cid != '') {
			$this->model->checkIn($cid);
		}
		elseif(isset($_SESSION['oncourse'])) {
			$cid = $_SESSION['oncourse'];
		}

		$data['course'] = $this->model->getCourseData($cid);

		$data['rounds'][] = $this->model->getLatestRound();

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


			$this->model->createMessage(0, "User completed course @ {$data['course']['name']} with total score {$data['totalscore']}", $_SESSION['scoresheet_id']);

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
		header("Location: dgs.php");
	}

	public function scoresheet()
	{	
		$data['pagetitle'] = 'Scoresheet';
		$data['page'] = 'scoresheet';

		$scoresheet_id = param('id');

		$data['scoresheet'] = $this->model->getScoresheetData($scoresheet_id);

		$this->view('scoresheet', $data);
	}
	
}