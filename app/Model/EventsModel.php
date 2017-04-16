<?php 
namespace Model;
use \W\Model\Model as Model;
class EventsModel extends Model
{
	public function selectAct()
	{
		$sql = 'SELECT A.name, A.act_id FROM events as E, Activity as A WHERE A.act_id = E.id_activity';
		$sth = $this->dbh->prepare($sql);
		// $sth->bindValue(':id', $string, PARAM_INT);
		$sth->execute();
		return $sth->fetchAll();
	}
}