<?php
namespace Model;
use \W\Model\Model;

class UsersModel extends \W\Model\Model 
{
  #Permet de compter tous les adhérent, en fonction de leurs activitée
  public function nbrPoeplesByActivity()
  {
  	$sql = 'SELECT activity as "activity", COUNT(*) as "nbUsers" FROM users u, suscribe_to s WHERE id_usr = u.id GROUP BY activity';
  	$sth = $this->dbh->prepare($sql);
  	$sth->execute();
  	return $sth->fetchAll();
  }

  public function nbrTotal()
  {
    $sql = "SELECT count(*) as 'total' FROM users";
    $sth = $this->dbh->prepare($sql);
    $sth->execute();
    return $sth->fetchColumn();
  } 

  public function nbrTotalA()
  {
  	$sql = "SELECT count(*) as 'total' FROM users u, suscribe_to s WHERE id_usr = u.id";
  	$sth = $this->dbh->prepare($sql);
  	$sth->execute();
  	return $sth->fetchColumn();
  }

  public function listPeopleByActivity($activity, $firstEntry, $PeoplePerPages)
  {
    $sql = 'SELECT * FROM users u, suscribe_to s WHERE id_usr = u.id AND activity = :activity ORDER BY u.id DESC LIMIT :firstEntry, :PeoplePerPages';
    $sth = $this->dbh->prepare($sql);
    $sth->bindValue(':activity', $activity);
    $sth->bindValue(':firstEntry', $firstEntry, \PDO::PARAM_INT);
    $sth->bindValue(':PeoplePerPages', $PeoplePerPages, \PDO::PARAM_INT);
    $sth->execute();
    return $sth->fetchAll(\PDO::FETCH_ASSOC);
  }

  public function filterByAge($age1 = 0, $age2 = 150,$firstEntry ,$PeoplePerPages)
  {
    /*
      Renvoie un nombre de jours, donc il faut faire un calcul via le nombre de jour
      1  an  = 365
      5  ans = 1825
      15 ans = 5475
      18 ans = 6570
    */
    $sql = 'SELECT * FROM users WHERE DATEDIFF(CURRENT_DATE, birthday) BETWEEN :age1 AND :age2 ORDER BY id DESC LIMIT :firstEntry, :PeoplePerPages';
    $sth = $this->dbh->prepare($sql);
    $sth->bindValue(':age1', $age1, \PDO::PARAM_INT);
    $sth->bindValue(':age2', $age2, \PDO::PARAM_INT);
    $sth->bindValue(':firstEntry', $firstEntry, \PDO::PARAM_INT);
    $sth->bindValue(':PeoplePerPages', $PeoplePerPages, \PDO::PARAM_INT);
    $sth->execute();
    return $sth->fetchAll(\PDO::FETCH_ASSOC);
  }

  public function searchPeoples($search)
  {
    $sql = "SELECT * FROM users WHERE firstname LIKE '%$search%' OR lastname LIKE '%$search%'";
    $sth = $this->dbh->prepare($sql);
    $sth->execute();
    return $sth->fetchAll(\PDO::FETCH_ASSOC);
  }

}
