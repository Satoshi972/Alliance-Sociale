<?php

namespace Controller;

use \W\Controller\Controller;

class TeamController extends Controller
{

	public function equipe()
	{
		$this->show('team/team');
	}

}