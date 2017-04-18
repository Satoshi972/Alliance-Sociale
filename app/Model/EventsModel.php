<?php 
namespace Model;

class EventsModel extends \W\Model\Model
{
    
  	public function findAllEventsFut($orderBy = '', $orderDir = 'ASC', $limit = null, $offset = null)
	{

		$sql = 'SELECT * FROM ' . $this->table. ' WHERE start > NOW()';
		if (!empty($orderBy)){

			//sécurisation des paramètres, pour éviter les injections SQL
			if(!preg_match('#^[a-zA-Z0-9_$]+$#', $orderBy)){
				die('Error: invalid orderBy param');
			}
			$orderDir = strtoupper($orderDir);
			if($orderDir != 'ASC' && $orderDir != 'DESC'){
				die('Error: invalid orderDir param');
			}
			if ($limit && !is_int($limit)){
				die('Error: invalid limit param');
			}
			if ($offset && !is_int($offset)){
				die('Error: invalid offset param');
			}

			$sql .= ' ORDER BY '.$orderBy.' '.$orderDir;
		}
        if($limit){
            $sql .= ' LIMIT '.$limit;
            if($offset){
                $sql .= ' OFFSET '.$offset;
            }
        }
		$sth = $this->dbh->prepare($sql);
        
		$sth->execute();

		return $sth->fetchAll();
	}
    
    public function findAllEventsPres($orderBy = '', $orderDir = 'ASC', $limit = null, $offset = null)
	{

		$sql = 'SELECT * FROM ' . $this->table. ' WHERE start = NOW() OR start < NOW() AND end > NOW()';
		if (!empty($orderBy)){

			//sécurisation des paramètres, pour éviter les injections SQL
			if(!preg_match('#^[a-zA-Z0-9_$]+$#', $orderBy)){
				die('Error: invalid orderBy param');
			}
			$orderDir = strtoupper($orderDir);
			if($orderDir != 'ASC' && $orderDir != 'DESC'){
				die('Error: invalid orderDir param');
			}
			if ($limit && !is_int($limit)){
				die('Error: invalid limit param');
			}
			if ($offset && !is_int($offset)){
				die('Error: invalid offset param');
			}

			$sql .= ' ORDER BY '.$orderBy.' '.$orderDir;
		}
        if($limit){
            $sql .= ' LIMIT '.$limit;
            if($offset){
                $sql .= ' OFFSET '.$offset;
            }
        }
		$sth = $this->dbh->prepare($sql);
        
		$sth->execute();

		return $sth->fetchAll();
	}
    
    public function findAllEventsPas($orderBy = '', $orderDir = 'ASC', $limit = null, $offset = null)
	{

		$sql = 'SELECT * FROM ' . $this->table. ' WHERE end < NOW() OR start < NOW() AND end IS NULL';
		if (!empty($orderBy)){

			//sécurisation des paramètres, pour éviter les injections SQL
			if(!preg_match('#^[a-zA-Z0-9_$]+$#', $orderBy)){
				die('Error: invalid orderBy param');
			}
			$orderDir = strtoupper($orderDir);
			if($orderDir != 'ASC' && $orderDir != 'DESC'){
				die('Error: invalid orderDir param');
			}
			if ($limit && !is_int($limit)){
				die('Error: invalid limit param');
			}
			if ($offset && !is_int($offset)){
				die('Error: invalid offset param');
			}

			$sql .= ' ORDER BY '.$orderBy.' '.$orderDir;
		}
        if($limit){
            $sql .= ' LIMIT '.$limit;
            if($offset){
                $sql .= ' OFFSET '.$offset;
            }
        }
		$sth = $this->dbh->prepare($sql);
        
        $sth->execute();
        
		return $sth->fetchAll(\PDO::FETCH_ASSOC);
	}

	public function selectAct()
	{

		$sql = 'SELECT A.name, A.act_id FROM events as E, Activity as A WHERE A.act_id = E.id_activity';
		$sth = $this->dbh->prepare($sql);
		// $sth->bindValue(':id', $string, PARAM_INT);
		$sth->execute();

		return $sth->fetchAll();
	}
  
	public function eventMedias()
	{
		$sql = 'SELECT * FROM events as E, medias as M WHERE M.id_related = E.id_event';
		$sth = $this->dbh->prepare($sql);

		$sth->execute();
		return $sth->fetchAll(\PDO::FETCH_ASSOC);
	}

}

