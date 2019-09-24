<?php

namespace App;

class Database{


    private $db_name;
    private $db_user;
    private $db_pass;
    private $db_host;
    private $pdo;

   public function __construct($db_name,$db_user='root',$db_pass='',$db_host='localhost')
   {

       $this->db_name=$db_name;
       $this->db_user=$db_user;
       $this->db_pass=$db_pass;
       $this->db_host=$db_host;   
   }

   private function getPDO()
   {

    
    $pdo = new \PDO('mysql:dbname='.$this->db_name.';host='.$this->db_host, $this->db_user, $this->db_pass);

    $pdo->setAttribute(\PDO::ATTR_ERRMODE , \PDO::ERRMODE_EXCEPTION);

     return $this->pdo=$pdo;
   }

   public function query($statement,$class_name)
   {
       
        $req=$this->getPDO()->query($statement);

        $data=$req->fetchAll(\PDO::FETCH_CLASS,$class_name);
        
        
        return $data;
   }


   public function prepare($statement,$attributes,$class_name)
   {
    $req=$this->getPDO()->prepare($statement);

    $req->execute([$attributes]);

    $data=$req->fetchAll(\PDO::FETCH_CLASS,$class_name);

    return $data;
   }
}