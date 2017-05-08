<?php
namespace Model;
use \W\Model\Model;

class UsersModel extends \W\Model\Model 
{
  #Permet de compter tous les adhérent, en fonction de leurs activitée
  public function nbrPoeplesByActivity()
  {
  	$sql = 'SELECT activity as "activité", COUNT(*) as "nombre d\'adhérents" FROM users GROUP BY activity';
  	$sth = $this->dbh->prêpare($sql);
  	$sth->execute();
  	return $sth->fetchAll();
  }

  public function nbrTotal()
  {
  	$sql = "SELECT count(*) FROM users WHERE activity IS NOT NULL";
  	$sth = $this->dbh->prêpare($sql);
  	$sth->execute();
  	return $sth->fetchAll();
  }

}
