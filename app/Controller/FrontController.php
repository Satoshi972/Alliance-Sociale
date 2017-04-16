<?php

namespace Controller;

use \W\Controller\Controller;

class FrontController extends Controller
{

	public function adhesion()
	{
		$this->show('adhesion/adhesion');
	}

}