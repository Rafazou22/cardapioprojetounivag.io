<?php
    include_once '../Action/Conexao.php';
    include_once '../Action/Cardapio.php';
    include_once '../Action/CardapioDAO.php';
    $cardapio = new connect\Cardapio();
    $cardapioDAO = new connect\CardapioDAO();

    if (isset($_POST['btn-envio'])) {
        $nome = $_POST['nome'];
        $valor = $_POST['valor'];
        $descr = $_POST['descricao'];
        $tipo = $_POST['tipo'];

        if ($nome == "" || $valor == "" || $tipo == "") {
            echo "<script>Por favor, preencha todos campos com '*'</script>";
        } else {
            $cardapio->setNome($nome);
            $cardapio->setValor($valor);
            $cardapio->setDescricao($descr);
            $cardapio->setTipo($tipo);

            if ($cardapioDAO->create($cardapio)) {
                echo "
                <script>
                    var res = confirm('Adicionado com sucesso!');
                    if (res) {
                        window.location.replace('listagem.php');
                    }
                </script>";
            } else {
                echo "<script>alert('Erro ao adicionar!')</script>";
            }
        }
    }

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionando</title>
</head>
<body>
    <form action="adicionar.php" method="POST">
        Nome: <input type="text" name="nome" require>
        Valor: <input type="number" name="valor" require>
        Descrição: <input type="text" name="descricao">
        <select name="tipo" require>
            <option value="">--Por favor escolha uma opção--</option>
            <option value="comida">Comida</option>
            <option value="bebida">Bebida</option>
            <option value="doce">Doce</option>
        </select>
        <input type="submit" name="btn-envio">
    <form>
</body>
</html>