<?php 
namespace Model;


class Reset_pswModel extends \W\Model\Model
{
   public function findAll2($token, $orderBy = '', $orderDir = 'ASC', $limit = null, $offset = null)
	{
		$sql = 'SELECT * FROM ' . $this->table. ' WHERE token = :token';
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
        $sth ->bindValue(':token', $token, \PDO::PARAM_INT);
		$sth->execute();

		return $sth->fetchAll();
	}
    
        public function findAll3($token, $orderBy = '', $orderDir = 'ASC', $limit = null, $offset = null)
	{
		$sql = 'SELECT r.token, r.email, u.firstname , u.lastname, u.id FROM ' . $this->table. ' AS r INNER JOIN users AS u ON r.email = u.email WHERE r.token = :token';
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
        $sth ->bindValue(':token', $token, \PDO::PARAM_INT);
		$sth->execute();

		return $sth->fetchAll();
	}

     public function findAll4($token, $orderBy = '', $orderDir = 'ASC', $limit = null, $offset = null)
	{
		$sql = 'SELECT r.id, r.token, r.email, u.firstname , u.lastname FROM ' . $this->table. ' AS r INNER JOIN users AS u ON r.email = u.email WHERE r.token = :token';
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
        $sth ->bindValue(':token', $token, \PDO::PARAM_INT);
		$sth->execute();

		return $sth->fetchAll();
	}
}