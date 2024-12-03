<?php
    include_once '../Action/Conexao.php';
    include_once '../Action/Cardapio.php';
    include_once '../Action/CardapioDAO.php';
    $cardapio = new connect\Cardapio();
    $cardapioDAO = new connect\CardapioDAO();

    if (!isset($_GET['id'])) {
        header("Location: listagem.php");
    } 

    if (isset($_POST['btn-atualiza'])) {
        $nome = $_POST['nome'];
        $valor = $_POST['valor'];
        $descr = $_POST['descricao'];
        $tipo = $_POST['tipo'];

        if ($nome == "" || $valor == "" || $tipo == "") {
            echo "<script>Por favor, preencha todos campos com '*'</script>";
        } else {
            $cardapio->setId($_GET['id']);
            $cardapio->setNome($nome);
            $cardapio->setValor($valor);
            $cardapio->setDescricao($descr);
            $cardapio->setTipo($tipo);

            if ($cardapioDAO->update($cardapio)) {
                echo "
                <script>
                    var res = confirm('Atualizado com sucesso!');
                    if (res) {
                        window.location.replace('listagem.php');
                    }
                </script>";
            } else {
                echo "<script>alert('Erro ao atualizar!')</script>";
            }
        }
    }

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualizar</title>
</head>
<body>
    <?php
        foreach ($cardapioDAO->read() as $c):
            if ($c['id'] == $_GET['id']) {
    ?>
            <form action="atualizar.php" method="POST">
                Nome: <input type="text" name="nome" value="<?php echo $c['nome'] ?>" require>
                Valor: <input type="number" name="valor" value="<?php echo $c['valor'] ?>" require>
                Descrição: <input type="text" value="<?php echo $c['descricao'] ?>" name="descricao">
                <select name="tipo" require>
                    <option value="">--Por favor escolha uma opção--</option>
                    <option value="comida">Comida</option>
                    <option value="bebida">Bebida</option>
                    <option value="doce">Doce</option>
                </select>
                <input type="submit" name="btn-atualiza">
            <form>
    <?php
            }
        endforeach;
    ?>
</body>
</html>