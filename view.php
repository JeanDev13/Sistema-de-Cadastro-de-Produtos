<?php

    require "conect.php";

    if(!isset($_GET["id"])){
        header ("Location: index.php");
        exit;
    }

    $id = $_GET["id"];

    $sql = ("SELECT * FROM produtos WHERE id = :id");
    $stmt = $pdo->prepare($sql);
    $stmt->execute([":id" => $id]);
    $produto = $stmt->fetch(PDO::FETCH_ASSOC);

    if(!$produto){
        echo '
            <div class="container mt-5">
                <div class= "alert alert-danger" role="alert">
                Produto não encontrado.
                </div>

                <a href="index.php" class="btn btn-secondary">
                    Voltar
                </a>
            </div>';
        exit;
    } 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <title>Visualizar Produto</title>
</head>
<body>
    <div class="container mt-5">
    <div class="card shadow p-4">
        <h1 class="text-center mb-4">Visualizar Produto</h1>
        <div class="d-flex gap-2 mb-4">
            <a href="index.php" class="btn btn-secondary btn-sm">
                ← Voltar
            </a>
            <a href="update.php?id=<?= $produto['id'] ?>" class="btn btn-primary btn-sm">
                Editar Produto
            </a>
        </div>

        <hr>

        <div class="detalhe">
            <strong>Nome:</strong>
            <span><?= htmlspecialchars($produto['nome']) ?></span>
        </div>
        <div class="detalhe">
            <strong>Preço:</strong>
            <span>R$ <?= number_format($produto['preco'], 2, ',', '.') ?></span>
        </div>
        <div class="detalhe">
            <strong>Quantidade:</strong>
            <span><?= $produto['quantidade'] ?></span>
        </div>
        <div class="detalhe">
            <strong>Categoria:</strong>
            <span><?= htmlspecialchars($produto['categoria']) ?></span>
        </div>
    </div>
</div>
</body>
</html>