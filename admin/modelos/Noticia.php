<?php
//$caminho ='admin\modelos\Conexao.php';
require'C:\Users\Elton\Desktop\Projeto_dev\admin\conexao\Conexao.php';


class Noticia {

       private $conexao;
       
       public function __construct(){

           $con = new Conexao();
           $this->conexao =$con->getConexao();
       }
       
       public function listarNoticia(){



           $query = "SELECT 
           noticia.id_noticia as id_noticia,
           noticia.titulo as titulo,
           noticia.noticia as noticia,
           noticia.data_da_noticia as data_da_noticia,
           categoria.nome_categoria as nome_categoria           
            FROM noticia INNER JOIN categoria
            ON  categoria.id_categoria = noticia.categoria_id ORDER BY  id_noticia DESC LIMIT 6";
            $q = $this->conexao->prepare($query);
            $q->execute();
            return $q->fetchAll();
          }
          public  function buscar($filter){

            $query = "SELECT 
            noticia.id_noticia as id_noticia,
            noticia.titulo as titulo,
            noticia.noticia as noticia,
            noticia.data_da_noticia as data_da_noticia,
            categoria.nome_categoria as nome_categoria           
            FROM noticia INNER JOIN categoria
            ON  categoria.id_categoria = noticia.categoria_id                    
            WHERE titulo LIKE  ? 
            OR  noticia like ? 
            OR nome_categoria LIKE ?;";                               
            $q = $this->conexao->prepare($query);
            $q->bindValue(1,"%$filter%");
            $q->bindValue(2,"%$filter%");
            $q->bindValue(3,"%$filter%");
            $q->execute();
            return $q->fetchAll();

          }

          public function listarUmaNoticia($id_noticia){
            
            $query = "SELECT
           noticia.id_noticia as id_noticia,
           noticia.titulo as titulo,
           noticia.noticia as noticia,
           noticia.data_da_noticia as data_da_noticia,
           categoria.nome_categoria as nome_categoria           
           FROM noticia INNER JOIN categoria
           ON  categoria.id_categoria = noticia.categoria_id          
           WHERE id_noticia=?;";
          $q = $this->conexao->prepare($query);
          $q->bindParam(1,$id_noticia);
          $q->execute();
          return $q->fetchAll();
        }
       public function inserirNoticia($titulo,$noticia,$categoria){
        
                 
         $query = "INSERT INTO noticia(titulo,noticia,categoria_id,data_da_noticia) VALUES(?,?,?,?);";
         $q = $this->conexao->prepare($query);

         $dataDeCriacaoNoticia =date('Y-m-d H:m:s');
         
         $q->bindParam(1,$titulo);
         $q->bindParam(2,$noticia);
         $q->bindParam(3,$categoria);
         $q->bindParam(4,$dataDeCriacaoNoticia);
         $q->execute();
        
         
       }
       public function alterarNoticia($id_noticia,$titulo,$noticia,$categoria){

        
        $dataDeCriacaoNoticia =date('Y-m-d H:m:s');

        $query ="UPDATE noticia SET titulo=?, noticia=?,categoria_id =?,data_da_noticia =? WHERE id_noticia =?;";  
        $q =$this->conexao->prepare($query);
        $q->bindParam(1,$titulo);
        $q->bindParam(2,$noticia);
        $q->bindParam(3,$categoria);
        $q->bindParam(4,$dataDeCriacaoNoticia);
        $q->bindParam(5,$id_noticia);
        $q->execute();
        
       }
       public function deletarNoticia($id_noticia){

         $query = "DELETE FROM noticia WHERE id_noticia=?;";
         $q =$this->conexao->prepare($query);
         $q->bindParam(1,$id_noticia);
         $q->execute();
       }

}