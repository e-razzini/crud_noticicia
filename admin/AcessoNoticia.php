<?php

require '../layouts/header.php';
require './modelos/Noticia.php';

$get_dados = filter_input_array(INPUT_GET, FILTER_DEFAULT);
$noticiaRetornada = [];

if (isset($get_dados['id_noticia'])) {

    $noticias = new Noticia();

    $noticiaAtual = $noticias->listarUmaNoticia($get_dados['id_noticia']);
    $noticiaRetornada = $noticiaAtual;
}

if (isset($get_dados['filter']) && $get_dados['filter'] != null) {

    $noticia = new Noticia();

    $filt = $get_dados['filter'];

    $not =  $noticia->buscar($get_dados['filter']);

    $noticiaRetornada = $not;
}

?>
<main>


    <div class="container_acesso_noticia">

        <div class="acesso_noticia">

            <?php

            foreach ($noticiaRetornada as  $noticia) { ?>
                <ul>
                    <li>
                        <h1><?php echo $noticia['titulo']; ?></h1>
                    </li>
                    <li>
                        <p><?php echo $noticia['noticia']; ?></p>
                    </li>
                    <li><?php echo $noticia['nome_categoria']; ?></li>
                    <li><?php echo $noticia['data_da_noticia']; ?></li>

                    <a href="./controllers/ControllerNoticia.php?delete_noticia=<?php echo $noticia['id_noticia']; ?>"><button>deletar</button></a>
                    <a href="./CadastroNoticia.php?edit_noticia=<?php echo $noticia['id_noticia'] ?>"><button type="submit" name="editar">editar</button></a>
                </ul>
            <?php
            } ?>
        </div>
    </div>
</main>
<?php require '../layouts/footer.php'; ?>