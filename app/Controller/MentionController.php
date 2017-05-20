<?php

namespace Controller;

use \W\Controller\Controller;

class MentionController extends Controller
{

	public function mentionLegal()
	{
		$this->show('mention/mention');
	}

}