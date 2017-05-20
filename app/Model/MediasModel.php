<?php 
namespace Model;
use W\Model\Model as Model;


class MediasModel extends Model
{
	public function nbMedias()
	{
		$sql = 'SELECT COUNT(*) FROM events as E, medias as M WHERE M.id_related = E.id_event';	
		$sth = $this->dbh->prepare($sql);
		$sth->execute();

		return $sth->fetchColumn();
	}

	public function nbMediasGuest()
	{
		$sql = 'SELECT COUNT(*) FROM events as E, medias as M WHERE M.id_related = E.id_event AND visible = 1';	
		$sth = $this->dbh->prepare($sql);
		$sth->execute();

		return $sth->fetchColumn();
	}

	public function listPageMedias($firstEntry, $MediasPerPages)
	{
		$sql = 'SELECT m.id, e.title, m.url FROM events as E, medias as M WHERE M.id_related = E.id_event ORDER BY M.id DESC LIMIT :firstEntry, :MediasPerPages';	
		$sth = $this->dbh->prepare($sql);
		$sth->bindValue(':firstEntry', $firstEntry, \PDO::PARAM_INT);		
		$sth->bindValue(':MediasPerPages',$MediasPerPages,\PDO::PARAM_INT);

		$sth->execute();

		return $sth->fetchAll(\PDO::FETCH_ASSOC);
	}


	public function showToAll()
	{
		$sql = 'SELECT m.id, e.title, m.url FROM events as E, medias as M WHERE M.id_related = E.id_event AND visible = 1  ORDER BY M.id DESC LIMIT :firstEntry, :MediasPerPages';	
		$sth = $this->dbh->prepare($sql);
		$sth->bindValue(':firstEntry', $firstEntry, \PDO::PARAM_INT);		
		$sth->bindValue(':MediasPerPages',$MediasPerPages,\PDO::PARAM_INT);

		$sth->execute();

		return $sth->fetchAll(\PDO::FETCH_ASSOC);
	}
}
