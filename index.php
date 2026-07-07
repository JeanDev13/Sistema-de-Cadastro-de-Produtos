<?php

    require "conect.php";
    
    $stmt = $pdo->query("SELECT * FROM produtos");
    $produtos = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <title>LOJA</title>
  </head>

  <body>
    <div class="container mt-5"> 
      <div class="card p-4 shadow">
        <h1 class="text-center mb-4">Controle de Produtos</h1>
          <?php if (isset($_GET["sucesso"])): ?>

            <?php if ($_GET["sucesso"] == "cadastrado"): ?>
                <div class="alert alert-success">
                    Produto cadastrado com sucesso!
                </div>
            <?php elseif ($_GET["sucesso"] == "editado"): ?>
                <div class="alert alert-primary">
                    Produto editado com sucesso!
                </div>
            <?php elseif ($_GET["sucesso"] == "deletado"): ?>
                <div class="alert alert-danger">
                    Produto excluído com sucesso!
                </div>
            <?php endif; ?>
          <?php endif; ?>
      <a href="insert.php" class="btn btn-success mb-3"> + Cadastrar Produto
      </a>  
      <table class="table table-hover">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Produto</th>
        <th scope="col">Preço</th>
        <th scope="col">Quantidade</th>
        <th scope="col">Categoria</th>
        <th scope="col">Ações</th>
      </tr>
    </thead>
    <tbody>
        
        <?php if (count($produtos) == 0): ?>
        <tr>
          <td colspan="5">Nenhum produto cadastrado ainda.</td>
        </tr>
        <?php else: ?>
            <?php foreach($produtos as $produto):?>
              <tr>
                <th scope="row"><?= $produto["id"] ?></th>
                <td><?= $produto["nome"] ?></td>
                <td><?= $produto["preco"] ?></td>
                <td><?= $produto["quantidade"] ?></td>
                <td><?= $produto["categoria"] ?></td>
                
                <td>
                  <a href ="update.php?id=<?= $produto["id"] ?>" class="btn btn-primary btn-sm">
                    Editar
                  </a>
                  <a href ="delete.php?id=<?= $produto["id"] ?>" class="btn btn-danger btn-sm">
                    Excluir
                  </a>
                  <a href="view.php?id=<?= $produto["id"] ?>" class="btn btn-info btn-sm">
                    Visualizar
                  </a>
                </td>
              </tr>
            <?php endforeach; ?>
        <?php endif; ?>    
      </tbody>
      </table>
    </div>
  </div>
  </body>
</html>