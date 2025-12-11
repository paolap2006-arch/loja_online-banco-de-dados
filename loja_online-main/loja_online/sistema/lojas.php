<?php 
    include 'conexao.php';
    $sql = $pdo->query("SELECT * FROM loja");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css">
    <title>Página Principal</title>
</head>

<body>

    <div class="container">
        <h1>Página Principal</h1>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Nome</th>
                    <th scope="col">telefone</th>
                    <th scope="col">rua</th>
                    <th scope="col">numero</th>
                    <th scope="col">bairro</th>
                    <th scope="col">cep</th>
                    <th scope="col">complemento</th>
                    <th scope="col">cidade</th>
                    
                </tr>
            </thead>
            <tbody>
            <?php 
                while($linha = $sql->fetch(PDO::FETCH_ASSOC)){
            ?>
                <tr>
                    <th scope="row"><?php echo $linha['id']?></th>
                    <td><?php echo $linha['nome']?></td>
                    <td><?php echo $linha['telefone'] ?></td>
                    <td><?php echo $linha['rua'] ?></td>
                    <td><?php echo $linha['numero'] ?></td>
                    <td><?php echo $linha['bairro'] ?></td>
                    <td><?php echo $linha['cep'] ?></td>
                    <td><?php echo $linha['complemento'] ?></td>
                    <td><?php echo $linha['cidade'] ?></td>
                    <td><?php 
                        ?>
                    </td>
                    <td><?php ?></td>

                    <td><form action="editar.php" method="POST">

                        <button class="btn btn-primary" name="btnEditar" 
                        value="<?php echo $linha['id'];?>">Editar</button>
                    </form></td>

                    <td><form action="excluir.php" method="POST"> 

                        <button class="btn btn-danger" name="btnExcluir" 
                        value="<?php echo $linha['id'];?>">Excluir</button>
                    </form></td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
        
        <form action="adicionar.php" method="POST">
            <input type="text" name="txtid" 
            placeholder="Digite o id da loja.." required>

            <input type="text" name="txtnome" 
            placeholder="Digite o nome da loja.." required>
            
            <input type="text" name="txttelefone" 
            placeholder="Digite o telefone da loja..">

            <input type="text" name="txtrua" 
            placeholder="Digite a rua da loja..">

            <input type="text" name="txttelefone" 
            placeholder="Digite o telefone da loja..">

            <input type="submit" value="Salvar" name="btnSalvar" class="btn btn-success">
        </form>
    </div>
</body>

</html>