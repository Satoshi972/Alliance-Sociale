<?php

namespace Controller;

use \W\Controller\Controller;

class FrontController extends Controller
{

	public function accession()
	{
		$this->show('accession/accession');
	}

}