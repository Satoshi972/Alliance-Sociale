<?php

namespace Controller;

use \W\Controller\Controller;


class PartnersController extends MasterController
{
	public function partners()
	{
		$this->show('partners/partners');
	}


	public function addPartners()
	{

		$this->show('partners/add');
	}

}