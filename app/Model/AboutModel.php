<?php 
namespace Model;

use \W\Model\Model as Model;

class AboutModel extends Model
{
	public function infoAbout()
	{
		$sql = 'SELECT * FROM about LIMIT 1';
		$sth = $this->dbh->prepare($sql);
		$sth->execute();

		return $sth->fetch();
	}
}
?>