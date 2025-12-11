<?php 
    include 'conexao.php';
    $sql = $pdo->query("SELECT * FROM Produto");
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
        <h1>P R O D U T O S</h1>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Descrição</th>
                    <th scope="col">Preço</th>
                    <th scope="col">Tipo</th>
                    <th scope="col">Categoria</th>
                    <th scope="col">Data de Lançamento</th>
                    <th scope="col">Desconto</th>
                    <th scope="col">Editar</th>
                    <th scope="col">Excluir</th>
                </tr>
            </thead>
            <tbody>
            <?php 
                while($linha = $sql->fetch(PDO::FETCH_ASSOC)){
            ?>
                <tr>
                    <th scope="row"><?php echo $linha['id']?></th>
                    <td><?php echo $linha['nome']?></td>
                    <td><?php echo $linha['descricao'] ?></td>
                    <td><?php echo $linha['preco'] ?></td>
                    <td><?php echo $linha['tipo'] ?></td>
                    <td><?php echo $linha['categoria'] ?></td>
                    <td><?php 
                        $partes = explode('-', $linha['data_lancamento']);
                        $data = "".$partes[2]."/".$partes[1]."/".$partes[0];
                        echo $data ?>
                    </td>
                    <td><?php echo $linha['desconto_usados'] ?></td>
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
            <input type="text" name="txt#" 
            placeholder="Digite o #.." required>

            <input type="text" name="txtnome" 
            placeholder="Digite o nome.." required>

            <input type="text" name="txtdescricao" 
            placeholder="Digite a descricao.." required>

            <input type="text" name="txtpreco" 
            placeholder="Digite o preco.." required>

            <input type="text" name="txttipo" 
            placeholder="Digite o tipo.." required>

            <input type="text" name="txtcategoria" 
            placeholder="Digite a categoria.." required>
            
            <input type="date" name="txtData" 
            placeholder="Digite a data..">

            <input type="text" name="txtdesconto" 
            placeholder="Digite o desconto.." required>

            <input type="submit" value="Salvar" name="btnSalvar" class="btn btn-success">
        </form>
    </div>
</body>

</html>