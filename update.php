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
    
    if (!$produto) {
    die("Produto não encontrado.");
    }

    if (isset($_POST["enviar"])){
        $nome = htmlspecialchars($_POST["nome"]);
        $preco = ($_POST["preco"]);
        $quantidade = ($_POST["quantidade"]);
        $categoria = htmlspecialchars($_POST["categoria"]);

        $erros = [];
        if(empty($nome)){
            $erros[] = "Nome do produto obrigatório para cadastro! ";
        }
        if(empty($preco)){
            $erros[] = "Preço necessário!  ";
        }
        if(count($erros) > 0){
            foreach($erros as $erro){
                echo "ERRO: " . $erro . "<br>";
            }
        }else{
            $sql = ("UPDATE produtos SET nome = :nome, preco = :preco, quantidade = :quantidade, categoria = :categoria WHERE id = :id");
            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                ":nome" => $nome,
                ":preco" => $preco,
                ":quantidade" => $quantidade,
                ":categoria" => $categoria,
                ":id" => $id
            ]);

            header("Location: index.php");
            exit;
        }
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>
        <div class="container mt-5">   
        <h1>Editar Produto</h1>
        <a href="index.php" class="btn btn-secondary mb-3">Voltar</a>
        <br><br>

            <form method="post" action="">

                <div class="mb-3">
                    <label for="formGroupExampleInput" class="form-label">Nome</label>
                    <input type="text" name="nome" class="form-control" value="<?= htmlspecialchars($produto['nome'])?>">
                </div>
                <div class="mb-3">
                    <label for="formGroupExampleInput2" class="form-label">Preço</label>
                    <input type="number" name="preco" class="form-control" value="<?= ($produto['preco'])?>">
                </div>
                <div class="mb-3">
                    <label for="formGroupExampleInput2" class="form-label">Quantidade</label>
                    <input type="number" name="quantidade" class="form-control" value="<?= ($produto['quantidade'])?>">
                </div>
                <div class="mb-3">
                <label for="formGroupExampleInput2" class="form-label">Categoria</label>
                    <input type="text" name="categoria" class="form-control" value="<?= htmlspecialchars($produto['categoria'])?>">
                </div>
                <button type="submit" name="enviar" class="btn btn-success">
                    Salvar
                </button>
            </form>
        </div>
    </body>
</html>