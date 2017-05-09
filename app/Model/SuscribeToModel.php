<?php 
namespace Model;
use W\Model\Model as Model;

class SuscribeToModel extends Model
{
	public function suscribeTo($id)
	{
		$sql = 'SELECT * FROM suscribe_to WHERE id_usr = :id';
		$sth = $this->dbh->prepare($sql);
		$sth->bindValue(':id',$id, \PDO::PARAM_INT);
		$sth->execute();
		return $sth->fetchAll();
	}

	public function insertTo($activity)
	{
		$sql = 'SELECT MAX(id) FROM users';
		$sth = $this->dbh->prepare($sql);
		$sth->execute();
		$id = $sth->fetchColumn();

		$sql = "";
		$sth = "";

		$sql = 'INSERT INTO suscribe_to (id_usr, activity) VALUES (:id, :activity)';
		$sth = $this->dbh->prepare($sql);
		$sth->bindValue(':id',$id, \PDO::PARAM_INT);
		$sth->bindValue(':activity',$activity);
		$sth->execute();
	}
	public function updateTo($activity, $id)
	{
		$sql = 'INSERT INTO suscribe_to (id_usr, activity) VALUES (:id, :activity)';
		$sth = $this->dbh->prepare($sql);
		$sth->bindValue(':id',$id, \PDO::PARAM_INT);
		$sth->bindValue(':activity',$activity);
		$sth->execute();
	}

	public function deleteTo($id)
	{
		$sql = 'DELETE FROM suscribe_to WHERE id_usr = :id';
		$sth = $this->dbh->prepare($sql);
		$sth->bindValue(':id',$id, \PDO::PARAM_INT);
		$sth->execute();
	}
}