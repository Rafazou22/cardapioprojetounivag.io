<?php

    include_once 'Action/Conexao.php';
    include_once 'Action/Cardapio.php';
    include_once 'Action/CardapioDAO.php';
    
    $cardapioDAO = new connect\CardapioDAO();
    $listagem_default = 'todos';

    if (isset($_GET['listar'])) {
        $listagem_default = $_GET['listar'];
    }

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cardápio Online</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header class="header">
        <div class="header-top">
            <h1 class="restaurant-name">Nome do Restaurante</h1>
            <a class="cart" href="carrinho.html" onclick="listaItens()">
                Carrinho
                <div class="contagem">
                    0
                </div>
            </a>
        </div>
        <hr>
        <div class="search-bar">
            Buscar: <input type="search" placeholder="Pesquise sua comida aqui" class="search-bar-input">
        </div>
        <div class="secao-filtros">
            <a href="index.php?listar=todos" class="secao-filtros-nome">Todos</a>
            <a href="index.php?listar=comida" class="secao-filtros-nome">Comida</a>
            <a href="index.php?listar=bebida" class="secao-filtros-nome">Bebida</a>
            <a href="index.php?listar=doce" class="secao-filtros-nome">Doces</a>
        </div>
    </header>
    
    <main class="menu">
    <?php
    foreach ($cardapioDAO->read() as $c):
        if ($listagem_default == 'todos'):
    ?>
        <div class="menu-item">
            <div class="item-image">Foto</div>
            <div class="item-details" onclick="AdicionaCarrinho(this)">
                <h2 class="item-name"><?php echo $c['nome']; ?></h2>
                <p class="item-description"><?php echo $c['descricao']; ?></p>
                <div class="ajuste">
                    <p class="item-description-<?php echo $c['tipo']; ?>"><?php echo $c['tipo']; ?></p>
                </div>
                <p class="item-price"><?php echo "R$ ".$c['valor']; ?></p>
            </div> 
        </div>   
    <?php
        elseif ($c['tipo'] == $listagem_default):
    ?>
        <div class="menu-item">
            <div class="item-image">Foto</div>
            <div class="item-details" onclick="AdicionaCarrinho(this)">
                <h2 class="item-name"><?php echo $c['nome']; ?></h2>
                <p class="item-description"><?php echo $c['descricao']; ?></p>
                <div class="ajuste">
                    <p class="item-description-<?php echo $c['tipo']; ?>"><?php echo $c['tipo']; ?></p>
                </div>
                <p class="item-price"><?php echo "R$ ".$c['valor']; ?></p>
            </div> 
        </div>   
    <?php
        endif;
    endforeach;

    ?>
    </main>

    <footer class="footer">
        <p>Localização...</p>
    </footer>

    <script src="app.js"></script>

</body>
</html>
