<?php

namespace Controller;

use \W\Controller\Controller;
use \Model\UsersModel as users;




class StatisticsController extends MasterController
{
	public function nbrPoeplesByActivity()
    {
        $users = new users();
        $list = $users->nbrPoeplesByActivity();
        $this->showJson($list);
    }

    public function nbrTotal()
    {
        $users = new users();
        $list = $users->nbrTotal();
        $this->showJson($list);
    }

    public function nbrTotalA()
    {
        $users = new users();
        $list = $users->nbrTotalA();
        $this->showJson($list);
    }

    public function listPeopleByActivity($activity)
    {
    	$users = new users();
        $list = $users->listPeopleByActivity($activity);
        $params = [
            'users' => $list,
            'activitySelected' => $activity,
        ];
        $this->show('statistics/userStatList', $params);
    }

	public function users()
	{
        $this->show('statistics/userStat');
	}

}