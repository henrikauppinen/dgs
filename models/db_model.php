<?php

# database model

class db_model {

	public function __construct()
	{
		$this->connect();
	}

	private function connect()
	{

		require 'config.php';

		$link = mysql_connect($db_host, $db_user, $db_pass) or die ("Ongelma tietokantapalvelimessa $db_host");
		mysql_select_db($db_name, $link) or die ("Tietokantaa $db_name ei löydy palvelimelta $db_host!");
	}

	public function query($query = NULL)
	{
		if($query == NULL) {
			die('Query on tyhjä mitä vittua');
		}

		$re = mysql_query($query) or die(mysql_error().': '.$query);

		return $re;
	}

}