<?php 

namespace Model;
use W\Model\Model as Model;


class ActivityModel extends Model
{

	public function findWhitAuthor($id_activity)
	{
		if (!is_numeric($id_activity)){
			return false;
		}

		$sql ='SELECT * FROM activity as A, category as U WHERE A.idUsr = U.id AND A.id = :id';
		$sth = $this->dbh->prepare($sql);
		$sth->bindValue(':id', $id_activity);
		$sth->execute();

		return $sth->fetch();
	}
}

?>