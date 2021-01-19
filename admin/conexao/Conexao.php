<?php


class Conexao {
    
   private $Bd;
   private $host;
   private $user;
   private $senha;
   
       public function __construct(){
        
        $this->Bd ="crud_noticia";
        $this->host="localhost";
        $this->user="root";
        $this->senha ="";

     }


     public function getConexao(){
         
        $con = new \PDO('mysql:host='.$this->host .';dbname='.$this->Bd,$this->user,$this->senha);
        
        return $con;
     }

}
?>
