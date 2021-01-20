<?php


require 'layouts/header.php';
require './admin/modelos/Noticia.php';

$noticias = new Noticia();

$arrayNoticias = [];
$todasNoticias = $noticias->listarNoticia();

$arrayNoticias = $todasNoticias;

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