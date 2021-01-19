<?php 

include_once('C:\Users\Elton\Desktop\Projeto_dev\admin\conexao\Conexao.php');

class Categoria {

    private $conexao;


    public function __construct()
    {
        $con = new Conexao();
        $this->conexao = $con->getConexao();
    }


    public function listarCategoria(){
        $query ="SELECT * from categoria;";
        $q =$this->conexao->prepare($query);
        $q->execute();
        return $q->fetchAll();
    }
    public function adicionarCategoria($nome){
        
       try {


           $query = "INSERT INTO categoria(nome_categoria)VALUES(?);";
           $q =$this->conexao->prepare($query);
           $q->bindParam(1,$nome);
           $q->execute();

       }catch(PDOException $e){
               echo "Erro de cadastro ou ja cadastrado:". $e->getMessage();
       }
        
    }


}
