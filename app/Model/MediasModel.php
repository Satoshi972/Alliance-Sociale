<?php 
namespace Model;
use W\Model\Model as Model;


class MediasModel extends Model
{
	public function listMediaFor($id)
	{
		if (!is_numeric($id))
		{
			return false;
		}

		$sql = 'SELECT M.* FROM medias as M, media_of as MO, Activity as A WHERE M.id = MO.id_media AND MO.id_related = A.:id';
		$sth = $this->dbh->prepare($sql);
		$sth->bindValue(':id', $id, PARAM_INT);
		$sth->execute();

		return $sth->fetchAll();
	}

	public function listMediaVisible()
	{
		$sql = 'SELECT M.* FROM medias as M, media_of as MO WHERE M.id = MO.id_media AND M.visible = 1';
		$sth = $this->dbh->prepare($sql);
		$sth->execute();

		return $sth->fetchAll();

	}

	/**
	*@param $url = url du fichier
	*@param visible = bool 0 ou 1, 0 par défaut
	*/
	public function insertMedia($url, $visible = 0)
	{

		$sql = 'INSERT INTO medias (url, visble) VALUES(:url,:visible)';	
		$sth = $this->dbh->prepare($sql);
		$sth->bindValue(':url', $visible);		
		$sth->bindValue(':visible',$visible,PARAM_INT);

		$sth->execute();

	}
	
	/**
	*@param idMedia = id du media en int
	*@param idRelated = id de l'activité ou de l'event string
	*/
	public function insertMediaFor($idMedia,$idRelated)
	{
		if (!is_numeric($idMedia) || !is_numeric(idRelated))
		{
			return false;
		}

		$sql = 'INSERT INTO medias_of (id_media, id_related) VALUES(:id_media,id_related)';	
		$sth = $this->dbh->prepare($sql);
		$sth->bindValue(':id_media', $idMedia, \PDO::PARAM_INT);		
		$sth->bindValue(':id_related',$idRelated,\PDO::PARAM_INT);

		$sth->execute();
	}

	public function nbMedias()
	{
		$sql = 'SELECT COUNT(*) FROM medias';	
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
}
