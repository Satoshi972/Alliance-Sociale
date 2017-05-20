<?php

namespace Controller;

use \W\Controller\Controller;
use \Model\UsersModel as users;




class StatisticsController extends MasterController
{
	public function nbrPoeplesByActivity()
    {
        $roles = ['admin','editor'];
        $this->allowTo($roles);
        
        $users = new users();
        $list = $users->nbrPoeplesByActivity();
        $this->showJson($list);
    }

    public function nbrTotal()
    {
        $roles = ['admin','editor'];
        $this->allowTo($roles);
        
        $users = new users();
        $list = $users->nbrTotal();
        $this->showJson($list);
    }

    public function nbrTotalA()
    {
        $roles = ['admin','editor'];
        $this->allowTo($roles);
        
        $users = new users();
        $list = $users->nbrTotalA();
        $this->showJson($list);
    }

    public function listPeopleByActivity($activity, $page)
    {
        $roles = ['admin','editor'];
        $this->allowTo($roles);
    	
        $users = new users();

        $PeoplePerPages  = 50;
        $nbPoeple        = $users->nbrTotal();
        $nbPages         = ceil($nbPoeple/$PeoplePerPages);

        
        if(isset($page))
        {
              $currentPage=intval($page);
     
             if($currentPage>$nbPages)
             {
                  $currentPage=$nbPages;
             }
        }
        else
        {
             $currentPage=1; 
        }

        $firstEntry= ($currentPage-1)*$PeoplePerPages; 
        // $users= $usersModel->filterByAge($age1, $age2, $firstEntry, $PeoplePerPages);

        $list = $users->listPeopleByActivity($activity, $firstEntry, $PeoplePerPages);

        $params = [
            'users' => $list,
            'activitySelected' => $activity,
            'page'  => $page,
            'nbPages' => $nbPages,
        ];
        $this->show('statistics/userStatList', $params);
    }

	public function users()
	{
        $roles = ['admin','editor'];
        $this->allowTo($roles);
        
        $this->show('statistics/userStat');
	}

}