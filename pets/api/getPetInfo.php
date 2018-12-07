<?php
      include '../database.php';
      $conn = getDatabaseConnection();
      
      $sql = "SELECT *, YEAR(CURDATE()) - yob age FROM name WHERE id = :id";
      
      $stmt = $conn->prepare($sql);  
      $stmt->execute(array(":id"=>$_GET['id']));
      $record = $stmt->fetch(PDO::FETCH_ASSOC);
      echo json_encode($record);
?>