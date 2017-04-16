<?php 
namespace Model;
use W\Model\Model as Model;


class EventsModel extends Model
{
	public function eventMedias()
	{
		$sql = 'SELECT * FROM events as E, medias as M WHERE M.id_related = E.id_event';
		$sth = $this->dbh->prepare($sql);

		$sth->execute();
		return $sth->fetchAll(\PDO::FETCH_ASSOC);
	}
}
