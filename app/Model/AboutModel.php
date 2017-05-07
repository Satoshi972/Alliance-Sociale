<?php 
namespace Model;
use W\Model\Model as Model;

class AboutModel extends Model
{
	public function Aboutinfos()
	{
		$sql = 'SELECT * FROM about ORDER BY id DESC LIMIT 1';
		$sth = $this->dbh->prepare($sql);
		$sth->execute();

		return $sth->fetch();
	}
}