<?php 
namespace Model;


class ContactsModel extends \W\Model\Model
{
    
   public function findAll($orderBy = '', $orderDir = 'ASC', $limit, $offset = null, $firstEntry , $ContactPerPages)
	{

		$sql = 'SELECT * FROM ' . $this->table;
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
        if($limit == ''){
            $sql .= ' LIMIT :firstEntry, :ContactPerPages ';
            if($offset){
                $sql .= ' OFFSET '.$offset;
            }
        }
		$sth = $this->dbh->prepare($sql);
        $sth->bindValue(':firstEntry', $firstEntry, \PDO::PARAM_INT);		
		$sth->bindValue(':ContactPerPages', $ContactPerPages,\PDO::PARAM_INT);
		$sth->execute();

		return $sth->fetchAll();
	}
    
    public function findAllsearch($chainesearch, $orderBy = '', $orderDir = 'ASC', $limit, $offset = null, $firstEntry , $ContactPerPages)
	{
		$sql = 'SELECT * FROM ' . $this->table. ' WHERE title LIKE "%'. $chainesearch 
        .'%" OR mail LIKE "%'. $chainesearch 
        .'%" OR date LIKE "%'. $chainesearch 
        .'%"';
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
        if($limit == ''){
            $sql .= ' LIMIT :firstEntry, :ContactPerPages';
            if($offset){
                $sql .= ' OFFSET '.$offset;
            }
        }
		$sth = $this->dbh->prepare($sql);
        $sth->bindValue(':firstEntry', $firstEntry, \PDO::PARAM_INT);		
		$sth->bindValue(':ContactPerPages', $ContactPerPages,\PDO::PARAM_INT);
		$sth->execute();

		return $sth->fetchAll();
	}

	public function deleteAll()
	{
		#supprime toutes les entrées dans la table et remet le auto increment a 0
		$sql = 'TRUNCATE contacts';
		$sth = $this->dbh->prepare($sql);
		$sth->execute();
	}
    
     public function nbrTotal()
  {
    $sql = "SELECT count(*) as 'total' FROM contacts";
    $sth = $this->dbh->prepare($sql);
    $sth->execute();
    return $sth->fetchColumn();
  } 
    

    
    public function listPagecontact($firstEntry, $MediasPerPages)
	{
		$sql = 'SELECT * FROM medias ORDER BY id DESC LIMIT :firstEntry, :MediasPerPages';	
		$sth = $this->dbh->prepare($sql);
		$sth->bindValue(':firstEntry', $firstEntry, \PDO::PARAM_INT);		
		$sth->bindValue(':MediasPerPages',$MediasPerPages,\PDO::PARAM_INT);

		$sth->execute();

		return $sth->fetchAll(\PDO::FETCH_ASSOC);
	}
    
    
}

