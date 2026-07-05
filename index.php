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
    <title>LOJA</title>
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

  </head>
  <body>
      <a href="insert.php">Cadastrar Produto
      </a>
      <br><br>  
      <table class="table">
    <thead>
      <tr>
        <th scope="col">*</th>
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
                  <a href ="update.php?id=<?= $produto["id"] ?>" class="btn btn-primary">
                    Editar
                  </a>
                  <a href ="delete.php?id=<?= $produto["id"] ?>" class="btn btn-danger">
                    Excluir
                  </a>
                </td>
              </tr>
            <?php endforeach; ?>
        <?php endif; ?>    
      </tbody>
      </table>
  </body>
</html>