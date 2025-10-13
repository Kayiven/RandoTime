<?php
require_once __DIR__ . '/../Configs/connection_db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
$nom = trim($_POST["nom"]);
$email = trim($_POST["email"]);
$sujet = trim($_POST["sujet"]);
$telephone = trim($_POST["telephone"]);
$message = trim($_POST["message"]);

// 🔹 3. Si tout est valide → insérer dans la base
$sql = "INSERT INTO contact (nom, email, Title, telephone, sujet, date)
VALUES (?, ?, ?, ?, ?, NOW())";

$stmt = $pdo->prepare($sql);
$success = $stmt->execute([$nom, $email, $sujet, $telephone, $message]);

if ($success) {
echo "<script>
alert('Message envoyé avec succès !');
window.location.href='../../Views/Seassion/Invité/Contact.php';
</script>";
} else {
echo "<script>
alert('Erreur lors de l\'envoi du message.');
window.location.href='../../Views/Seassion/Invité/Contact.php';
</script>";
 }
}
?>
