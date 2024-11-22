<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $usr = $_POST['usr'] ?? '';
  $pass = $_POST['pass'] ?? '';
  if (!empty($usr) && !empty($pass)){
    $dbFile = 'db.php';
    if (file_exists($dbFile)) {
      $db = new SQLite3($dbFile);
      $query = $db->prepare("SELECT * FROM usuarios WHERE usr = :usr");
      $query->bindValue(':usr', $usr);
      $result = $query->execute();

      if ($result) {
        $userData = $result->fetchArray(SQLITE3_ASSOC);
        if ($userData) {
          $_SESSION['usuario'] = $usr;
          if ($usr == 'adm' && $pass == 'adm')
          {
            header("Location: cadastro_produto.php"); 
            exit();
          } else {
          header("Location: register.php"); 
          exit(); 
      }} else {
        echo "Erro de consulta ao banco de dados. <br>";
      }
      $db->close();
      } else {
      echo "Banco de dados não encontrado.<br>";
    }
      if ($usr != $userData) {
        header("Location: index.html"); 
        exit;
      }
      else {
        header("Location: cadastro_produto");
    
      }
}}}
?>