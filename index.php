<?php


require 'layouts/header.php';
require './admin/modelos/Noticia.php';

$get_dados = filter_input_array(INPUT_GET, FILTER_DEFAULT);
$arrayNoticias = [];

$noticias = new Noticia();
$arrayNoticias = [];
$todasNoticias = $noticias->listarNoticia();

$arrayNoticias = $todasNoticias;

if (isset($get_dados['id_acesso'])) {

    $noticia = new Noticia();
    $umaNoticia = $noticia->listarUmaNoticia($get_dados['id_acesso']);
    $arrayNoticias = $umaNoticia;
}
if(isset($get_dados['filter'])){

    $noticia = new Noticia();
    $umaNoticia = $noticia->buscar($get_dados['filter']);
    $arrayNoticias = $umaNoticia;
}
?>
<link rel="stylesheet" href="./public/acessoNoticia.css">
<?php foreach ($arrayNoticias as $noticia) { ?>

    <div class="container_cards">

        <div class="cards">
            <h1 class="card_item"><?php echo $noticia['titulo']; ?></h1>
            <p class="card_item"> <?php echo $noticia['noticia']; ?></p>
            <p class="card_item">categoria: <?php echo $noticia['nome_categoria']; ?> </p>
            <p class="card_item">Data: <?php echo $noticia['data_da_noticia']; ?></p>

            <?php if (isset($get_dados['id_acesso'])) { ?>

                <a href="./admin/controllers/ControllerNoticia.php?delete_noticia=<?php echo $noticia['id_noticia']; ?>"><button class="card_btn-acesso">deletar</button></a>
                <a href="./admin/CadastroNoticia.php?id_noticia=<?php echo $noticia['id_noticia']; ?>"><button class="card_btn-acesso">editar</button></a>

            <?php
            } else { ?>

                <a href="index.php?id_acesso=<?php echo $noticia['id_noticia']; ?>"><button class="card_btn-acesso">Acesso noticia</button></a>

            <?php
            }
            ?>
        </div>
    </div>


<?php }
?>
<?php require 'layouts/footer.php'; ?>