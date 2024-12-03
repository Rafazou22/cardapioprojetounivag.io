<?php
    include_once '../Action/Conexao.php';
    include_once '../Action/Cardapio.php';
    include_once '../Action/CardapioDAO.php';
    $cardapio = new connect\Cardapio();
    $cardapioDAO = new connect\CardapioDAO();

    if (isset($_GET['id'])) {
        $cardapioDAO->delete($_GET['id']);
        header('Location: listagem.php');
    }
?>