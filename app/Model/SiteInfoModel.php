<?php 
namespace Model;

use \W\Model\Model as Model;

class SiteInfo extends Model
{
	
	public function siteIfo()
	{
		$sql = 'SELECT M.url, SI.* FROM medias as M, media_of as MO, site_info as SI WHERE SI.id = MO.id_related AND M.id = MO.id_media';
		$sth = $this->dbh->prepare($sql);
		$sth->execute();

		return $sth->fetch();
	}

	public function UpdateInfo($data, $id)
	{
		$sql = 'UPDATE site_info SET ';
		foreach($data as $key => $value){
			$sql .= "`$key` = :$key, ";
		}
	}

}
?>