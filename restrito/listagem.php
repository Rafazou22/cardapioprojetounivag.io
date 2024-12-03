<?php
    include_once '../Action/Conexao.php';
    include_once '../Action/Cardapio.php';
    include_once '../Action/CardapioDAO.php';
    $cardapio = new connect\Cardapio();
    $cardapioDAO = new connect\CardapioDAO();

    session_start();
    if (empty($_SESSION['logado']) || $_SESSION['logado'] == false) {
        header("Location: login.php");
    }

    if (isset($_POST['deslogar'])) {
        $_SESSION['logado'] = false;
        header("Location: login.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listagem</title>
    <link href="style.css" rel="stylesheet" />
</head>
<body>
    <p><a href="adicionar.php">Adicionar</a></p>

    <center>
    <table>

        <tr>
            <td>Foto</td>
            <td>Nome</td>
            <td>Descrição</td>
            <td>Tipo</td>
            <td>Valor</td>
            <td>Editar</td>
            <td>Excluir</td>
        </tr>
        <?php
            foreach ($cardapioDAO->read() as $c):
        ?>
        <tr>
            <td><?php echo $c['foto'] ?></td>
            <td><?php echo $c['nome'] ?></td>
            <td><?php echo $c['descricao'] ?></td>
            <td><?php echo $c['tipo'] ?></td>
            <td><?php echo $c['valor'] ?></td>
            <td><a href="atualizar.php?id=<?php echo $c['id'] ?>">Editar</a></td>
            <td><a href="excluir.php?id=<?php echo $c['id'] ?>">Excluir</a></td>
        </tr>
        <?php
            endforeach;
        ?>

    </table>
    </center>
    <hr>
    <center>
        <form action="" method="POST">
            <button type="submit" name="deslogar">sair</button>    
        </form>
    </center>
</body>
</html>