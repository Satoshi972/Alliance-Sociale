<?php
namespace Model;
use \W\Model\Model;

class UsersModel extends \W\Model\Model 
{
  #Permet de compter tous les adhérent, en fonction de leurs activitée
  public function nbrPoeplesByActivity()
  {
  	$sql = 'SELECT activity as "activity", COUNT(*) as "nbUsers" FROM users GROUP BY activity';
  	$sth = $this->dbh->prepare($sql);
  	$sth->execute();
  	return $sth->fetchAll();
  }

  public function nbrTotal()
  {
  	$sql = "SELECT count(*) FROM users WHERE activity IS NOT NULL";
  	$sth = $this->dbh->prepare($sql);
  	$sth->execute();
  	return $sth->fetchAll();
  }

  public function listPeopleByActivity($activity)
  {
    $sql = 'SELECT * FROM users WHERE activity = :activity';
    $sth = $this->dbh->prepare($sql);
    $sth->bindValue(':activity', $activity);
    $sth->execute();
    return $sth->fetchAll();
  }

}
