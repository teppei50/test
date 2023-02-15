<?php

namespace cafe\db;

function dbconnect()
{

    $user = 'root';
    $pass = 'Sandar1125';
    $dsn  = 'mysql:host=localhost;dbname=cafe';
    try {
        $dbh = new \PDO($dsn, $user, $pass, [
          \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
          \PDO::ATTR_EMULATE_PREPARES => false,
        ]);
      } catch (\PDOException $e) {
        echo '接続失敗' . $e->getMessage();
        exit();
      };
    
      return $dbh;
    }
    
    function getAllContents()
    {
    
      $dbh = dbconnect();
    
      $dbh->beginTransaction();
    
      $sql = "SELECT * FROM contacts";
      $stmt = $dbh->query($sql);
    
      $dbh->commit();
    
      return $stmt;
    }
    
    function definition()
    {
    
      $dbh = dbconnect();
    
      $stmt = $dbh->prepare("INSERT INTO contacts (id, name, kana, tel, email, body, created_at) VALUES (:id, :name, :kana, :tel, :email, :body, now())");
    
      $id = 0;
      $name = $_POST["name"];
      $kana = $_POST["kana"];
      $tel = $_POST["tel"];
      $email = $_POST["email"];
      $body = $_POST["body"];
    
      $stmt->bindParam(':id', $id, \PDO::PARAM_INT);
      $stmt->bindParam(':name', $name, \PDO::PARAM_STR);
      $stmt->bindParam(':kana', $kana, \PDO::PARAM_STR);
      $stmt->bindParam(':tel', $tel, \PDO::PARAM_STR);
      $stmt->bindParam(':email', $email, \PDO::PARAM_STR);
      $stmt->bindParam(':body', $body, \PDO::PARAM_STR);
    
      $stmt->execute();
    
      return $stmt;
    }
    
