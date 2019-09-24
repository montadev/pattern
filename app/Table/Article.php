<?php

namespace App\Table;


class Article{


    //private $texte;

     public function getUrl()
     {

        return "index.php?p=article&id=".$this->id;
     }

     
     public function getContenu()
     {
         return $this->texte;
     }

     

}