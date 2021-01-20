<?php


require 'layouts/header.php';
require './admin/modelos/Noticia.php';

$noticias = new Noticia();

$arrayNoticias = [];
$todasNoticias = $noticias->listarNoticia();

$arrayNoticias = $todasNoticias;
/*
function totalNoticias($todasNoticias){
    $outPut ="";
    foreach($todasNoticias as $value){

        $outPut .='<div class="container_cards">';
        $outPut .= '<div class="cards">';
        $outPut .='<h1 class="card_item">'. $value['titulo'] .'</h1>';
        $outPut .='<p class="card_item">'. $value['noticia'] .'</p>';
        $outPut .='<p class="card_item">'. $value['nome_categoria'] .'</p>';
        $outPut .='<p class="card_item">'. $value['data_da_noticia'] .'</p>';
        $outPut .='<a href="./admin/AcessoNoticia.php?id_noticia='.$value['id_noticia'] .'">';
        $outPut.= '<button class="card_btn-acesso">Acessar noticia</button></a>';       
        $outPut .='</div>';
        $outPut .='</div>';
    }
    return $outPut;
}
<?php echo totalNoticias($arrayNoticias);?>  
*/
?>

<?php foreach ($arrayNoticias as $noticia) { ?>

<div class="container_cards">
    <div class="cards">
        <h1 class="card_item"><?php echo $noticia['titulo']; ?></h1>
        <p class="card_item"> <?php echo $noticia['noticia']; ?></p>
        <p class="card_item"> <?php echo $noticia['nome_categoria']; ?> </p>
        <p class="card_item"> <?php echo $noticia['data_da_noticia']; ?></p>
        <a href="./admin/AcessoNoticia.php?id_noticia=<?php echo $noticia['id_noticia']; ?>"><button class="card_btn-acesso">Acesso noticia</button></a>
    </div>
</div>


<?php }
?>
<?php require 'layouts/footer.php'; ?>