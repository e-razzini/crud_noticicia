<?php

require '../layouts/header.php';
require '../admin/modelos/Noticia.php';
require '../admin/modelos/Categoria.php';

$dados = filter_input_array(INPUT_GET, FILTER_DEFAULT);
$datas = filter_input_array(INPUT_POST, FILTER_DEFAULT);

$cat = new Categoria();
$todasCategorias = $cat->listarCategoria();

if (isset($dados['id_noticia'])){

    $n = new Noticia();

    $notice = $n->listarUmaNoticia($dados['id_noticia']);
      
    foreach ($notice as $key ) {
        
    }
   
} else {
    
    $key['titulo'] = "";
    $key['noticia'] = "";
    $key['categoria_id'] = "";
    $key['id_noticia'] = "";
}

?>

<main>

    <div class="container_cadastro_noticia">

        <div class="cadastro_noticia">

            <form action="./controllers/ControllerNoticia.php" method="POST">
                <div>
                    <label for="titulo">titulo</label>
                </div>
                <div>
                    <input type="text" name="titulo" id="titulo" value="<?php echo $key['titulo'] ?>">
                </div>
                <input type="hidden" name="id_noticia" value="<?php echo $key['id_noticia'] ?>">
                <div>
                    <div>

                        <label for="categoria">categoria</label>
                    </div>

                    <select name="categoria_id" id="categoria">
                        <?php foreach ($todasCategorias as $valores) : ?>

                            <option value="<?php echo $valores['id_categoria'] ?>">
                                <?php echo $valores['nome_categoria'] ?>
                            </option>

                        <?php endforeach ?>
                    </select>
                </div>
                <div>

                    <label for="noticia">Noticia</label>
                </div>
                <div>
                    <textarea name="noticia" id="noticia" rows="5" cols="93"><?php echo $key['noticia'] ?></textarea>
                </div>
                <div>
                    <button type="submit" name="enviar">Enviar</button>
                </div>

            </form>
        </div>
    </div>

</main>
<?php
require '../layouts/footer.php';
?>