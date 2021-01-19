<?php

require '../layouts/header.php';
?>

<div class="container_cadastro_categoria">

    <div class="cadastro_categoria">
        <form action="./controllers/ControllerCategoria.php" method="POST">

            <div>
                <label for="nome_categoria">Nome</label>
            </div>
            <div>
                <input type="text" name="nome_categoria" id="nome_categoria" value="">
            </div>
            <input type="hidden" name="id_categoria" value="">
            <div>
                <button type="submit" name="enviar">Enviar</button>
            </div>


        </form>
    </div>
</div>


<?php
require '../layouts/footer.php';
?>