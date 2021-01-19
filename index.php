<?php


require 'layouts/header.php';
require './admin/modelos/Noticia.php';

$noticias = new Noticia();

$todasNoticias = $noticias->listarNoticia();


function totalNoticias($todasNoticias){
    $outPut ="";
    foreach($todasNoticias as $value){

        $outPut .='<div class="container_cards">';
        $outPut .= '<div class="cards">';
        $outPut .='<h1 class="card_item">'. $value['titulo'] .'</h1>';
        $outPut .='<p class="card_item">'. $value['noticia'] .'</p>';
        $outPut .='<p class="card_item">'. $value['nome_categoria'] .'</p>';
        $outPut .='<p class="card_item">'. $value['data_da_noticia'] .'</p>';
        $outPut .='<a href="./admin/AcessoNoticia.php?id_noticia=<?php echo'.$value['id_noticia'] .'?>"'.'><button class="card_btn-acesso">Acessar noticia</button></a>';       
        $outPut .='</div>';
        $outPut .='</div>';
    }
    return $outPut;
}

?>
<link rel="stylesheet" href="./public/acessoNoticia.css">
          
    <?php echo totalNoticias($todasNoticias);?>  



        
<?php require'layouts/footer.php';?>