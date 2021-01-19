<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crud </title>
    <link rel="stylesheet" href="../public/reset.css">
    <link rel="stylesheet" href="../public/header.css">
    <link rel="stylesheet" href="../public/main.css">
    <link rel="stylesheet" href="../public/footer.css">

</head>

<body>
    <div class="container">

        <header>
            <ul class="header">
                <li class="header-item header-item_page">
                    <a href="../index.php"><img src="https://img.icons8.com/color/48/000000/news.png"/></a>
                </li>
                <li class="header-item header-item_page"><a href="../admin/CadastroCategoria.php">Cadastro Categoria</a></li>
                <li class="header-item header-item_page"><a href="../admin/CadastroNoticia.php">Cadastro noticia</a></li>
                <li class="header-item header-item_busca">
                    <form action="../admin/AcessoNoticia.php" method="GET">
                        <input type="text" name="filter" id="busca">
                        <input type="submit" id="lupa" value="buscar" />
                    </form>
                </li>
            </ul>
        </header>

        <main>