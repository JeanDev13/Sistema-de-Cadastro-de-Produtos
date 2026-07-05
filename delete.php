<?php 

    require "conect.php";

    if(!isset($_GET["id"])){
        header ("Location: index.php");
        exit; 
    }

    $id = $_GET["id"];

    $sql = ("DELETE FROM produtos WHERE id = :id");
    $stmt = $pdo->prepare($sql);
    $stmt->execute([":id" => $id]);

    header("Location: index.php?sucesso=deletado");
    exit;

?>