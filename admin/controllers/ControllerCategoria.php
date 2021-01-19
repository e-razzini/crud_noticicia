
<?php
require'../modelos/Categoria.php';

$inputDados = filter_input_array(INPUT_POST,FILTER_DEFAULT);
$getDatas = filter_input_array(INPUT_GET,FILTER_DEFAULT);

if(isset($inputDados['enviar'])){
   

    $categoriaInserir = new Categoria();
    $categoriaInserir->adicionarCategoria($inputDados['nome_categoria']);

    header("Location:../../index.php");

}