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
  </head>
  <body>
      <table class="table">
    <thead>
      <tr>
        <th scope="col">*</th>
        <th scope="col">Produto</th>
        <th scope="col">Preço</th>
        <th scope="col">Quantidade</th>
        <th scope="col">Categoria</th>
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
              </tr>
            <?php endforeach; ?>
        <?php endif; ?>    
      </tbody>
      </table>
  </body>
</html>