<?php 
namespace Model;

use \W\Model\Model as Model;

class SiteInfoModel extends Model
{
	public function SiteInfos()
	{
		$sql = 'SELECT * FROM site_info ORDER BY id DESC LIMIT 1';
		$sth = $this->dbh->prepare($sql);
		$sth->execute();

		return $sth->fetch();
	}
}
?>