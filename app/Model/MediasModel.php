<?php 
namespace Model;
use W\Model\Model as Model;


class MediasModel extends Model
{
	public function nbMedias()
	{
		$sql = 'SELECT COUNT(*) FROM medias';	
		$sth = $this->dbh->prepare($sql);
		$sth->execute();

		return $sth->fetchColumn();
	}

	public function nbMediasGuest()
	{
		$sql = 'SELECT COUNT(*) FROM medias WHERE visible = 1';	
		$sth = $this->dbh->prepare($sql);
		$sth->execute();

		return $sth->fetchColumn();
	}

	public function listPageMedias($firstEntry, $MediasPerPages)
	{
		$sql = 'SELECT * FROM medias ORDER BY id DESC LIMIT :firstEntry, :MediasPerPages';	
		$sth = $this->dbh->prepare($sql);
		$sth->bindValue(':firstEntry', $firstEntry, \PDO::PARAM_INT);		
		$sth->bindValue(':MediasPerPages',$MediasPerPages,\PDO::PARAM_INT);

		$sth->execute();

		return $sth->fetchAll(\PDO::FETCH_ASSOC);
	}


	public function showToAll()
	{
		$sql = 'SELECT * FROM medias WHERE visible = 1  ORDER BY id DESC LIMIT :firstEntry, :MediasPerPages';	
		$sth = $this->dbh->prepare($sql);
		$sth->bindValue(':firstEntry', $firstEntry, \PDO::PARAM_INT);		
		$sth->bindValue(':MediasPerPages',$MediasPerPages,\PDO::PARAM_INT);

		$sth->execute();

		return $sth->fetchAll(\PDO::FETCH_ASSOC);
	}
}
