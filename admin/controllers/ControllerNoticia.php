<?php
require'../modelos/Noticia.php';

$input_dados = filter_input_array(INPUT_POST,FILTER_DEFAULT);
$get_dados =filter_input_array(INPUT_GET,FILTER_DEFAULT);



//Deletar noticia
if(isset($get_dados['delete_noticia'])){
    
   
     $noticia = new Noticia();
    
     $noticiaDeletada= $noticia->deletarNoticia($get_dados['delete_noticia']);
    
     header("Location:../../index.php");
 
}

// inserir noticia
if(isset($input_dados['enviar'])){
      
   if($input_dados['id_noticia']){

        $noticia = new Noticia();
        $noticia->alterarNoticia($input_dados['id_noticia'],$input_dados['titulo'],$input_dados['noticia'],$input_dados['categoria_id']);  
   }else {

        $noticia = new Noticia();
         $noticia->inserirNoticia($input_dados['titulo'],$input_dados['noticia'],$input_dados['categoria_id']);  
     }
    header("Location:../../index.php");
     
    
}






