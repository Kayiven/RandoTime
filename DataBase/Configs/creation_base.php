<?php
session_start();
require_once './connection_db.php'; 

// Verify if compte open or not !
if (!isset($_SESSION['id'])) {
header("Location: ../Invité/Login.php");
exit;
}

try {

$sql = "CREATE DATABASE IF NOT EXISTS randotime";
$pdo->exec($sql);

echo "<script>alert('✅ Database Randotime créée avec succès !'); window.location.href='../../Views/Seassion/Admin/Dashboard-CreateData.php';</script>";

} catch (PDOException $e) {

echo "<script>alert('❌ Erreur lors de la création de la database: " . addslashes($e->getMessage()) . "'); window.location.href='../../Views/Seassion/Admin/Dashboard-CreateData.php';</script>";
}

