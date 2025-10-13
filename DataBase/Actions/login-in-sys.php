<?php
session_start();
require_once __DIR__ . '/../Configs/connection_db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
$username = trim($_POST['username'] ?? '');
$password = trim($_POST['password'] ?? '');
$_SESSION['old_username'] = $username;

if (!$username) {
$_SESSION['login-nom-error'] = "Error > Veuillez entrer votre nom ou email";
header('Location: ../../Views/Seassion/Invité/Login.php');
exit;
}

if (!$password) {
$_SESSION['login-pwd-error'] = "Error > Veuillez entrer votre mot de passe";
header('Location: ../../Views/Seassion/Invité/Login.php');
exit;
}

// Case-insensitive search
$sql = "SELECT * FROM compte WHERE LOWER(nom) = LOWER(?) OR LOWER(email) = LOWER(?)";
$stmt = $pdo->prepare($sql);
$stmt->execute([$username, $username]);
$user = $stmt->fetch();

if (!$user) {
$_SESSION['login-nom-error'] = "Error > Le nom/email que vous avez mis est incorrect!";
header('Location: ../../Views/Seassion/Invité/Login.php');
exit;
}

if (!password_verify($password, $user['motpass'])) {
$_SESSION['login-pwd-error'] = "Error > Le password que vous avez mis est incorrect!";
header('Location: ../../Views/Seassion/Invité/Login.php');
exit;
}

// Login OK
unset($_SESSION['old_username']);
$_SESSION['id']    = $user['id'];
$_SESSION['nom']   = $user['nom'];
$_SESSION['prenom']   = $user['prenom'];
$_SESSION['email'] = $user['email'];

$current_compte = $user['id'];

// Update last login time
$stmt = $pdo->prepare("UPDATE compte SET last_login = NOW() WHERE id = ?");
$stmt->execute([$current_compte]);

header('Location: ../../Views/Seassion/Inscrit/Home.php');
exit;
}
?>