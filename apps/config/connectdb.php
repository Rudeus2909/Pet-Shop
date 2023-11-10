<?php
try {
  $conn = new PDO('mysql:host=localhost;dbname=shop', 'root', '');
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
  echo "Không thể kết nối đến CSDL" .$e->getMessage();
}