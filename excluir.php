<?php 
include_once '../TCC/assets/php/conexao.php';
  if (!isset($_SESSION["id-artigo-delete"])) {
       $id_delete = $_POST['id-artigo-delete'];
       $sql_id_delete = "SELECT * FROM article WHERE id_article=$id_delete";
       $sql_query_delete = $conn->query($sql_id_delete) or die($conn->errorInfo()); 

        if ($sql_query_delete->rowCount() > 0) {
            $sql_delete = "DELETE FROM article WHERE id_article=$id_delete";
            $sql_query_delete_result = $conn->query($sql_delete) or die($conn->errorInfo()); 
        }
    }
    header('Location: home.php');

?>