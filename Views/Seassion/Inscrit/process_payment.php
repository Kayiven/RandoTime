<?php  
session_start();
require_once __DIR__ . '/../../../database/Configs/connection_db.php';

// Verify if compte open or not !
if (!isset($_SESSION['id'])) {
header("Location: ../Invité/Login.php");
exit;
}

// ✅ Données reçues depuis la page précédente
$nom = $_SESSION['nom'];
$prenom = $_SESSION['prenom'];
$localisation = $_POST['destination'] ?? 'Inconnue';
$payment_method = $_POST['payment_method'] ?? 'Carte Bancaire';
$price = isset($_POST['amount']) ? floatval($_POST['amount']) : 0.00;

// ✅ Statut par défaut : confirmé
$status = 'confirmed';

try {
// Insertion dans la table Payments
$stmt = $pdo->prepare("
INSERT INTO Payments (nom, prenom, localisation, payment_method, price, status)
VALUES (?, ?, ?, ?, ?, ?)");
$stmt->execute([$nom, $prenom, $localisation, $payment_method, $price, $status]);

// ✅ Succès → alerte + redirection
echo "<script>
alert('✅ Paiement confirmé ! Merci $prenom pour votre réservation à $localisation.');
window.location.href = './Destination.php';</script>";

} catch (PDOException $e) {
$msg = addslashes($e->getMessage());
echo "<script>alert('❌ Erreur lors du paiement : $msg');</script>";
}

?>
