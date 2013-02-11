<?php

class api_controller extends controller {
	public function __construct()
	{

		$this->model = new dgs_model();
		
		$page = param('f');

		if($page == FALSE) {
			$page = 'error';
		}

		$this->$page();
	}

	public function allmsg()
	{
		$data = $this->model->getMessages();

		echo json_encode($data);
	}

	public function profilemsg()
	{
		$data = $this->model->getMessages(null, $_SESSION['uid']);

		echo json_encode($data);

	}

	public function poolmsg()
	{
		$data = $this->model->getMessages($_SESSION['oncourse'], null);

		echo json_encode($data);
	}

	public function error()
	{
		echo json_encode(null);
	}

}