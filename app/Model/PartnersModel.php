<?php
namespace Model;
use \W\Model\Model;

class PartnersModel extends \W\Model\Model 
{
   public function ShowAllPartners()
   {
   		$sql = "SELECT url, name as 'alt' FROM partners";
   		$sth = $this->dbh->prepare($sql);
   		$sth->execute();
   		return $sth->fetchAll();
   }
}
