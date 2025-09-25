<?php session_start();
require_once __DIR__ . '/../Configs/connection_db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';
$_SESSION['old_username'] = $username; // Keep entered username

// Username/email empty
if (!$username) {
$_SESSION['login-nom-error'] = "Error > Veuillez entrer votre nom ou email";
header('Location: ../../Views/Seassion/Invité/Login.php');
exit;
}

// Password empty
if (!$password) {
$_SESSION['login-pwd-error'] = "Error > Veuillez entrer votre mot de passe";
header('Location: ../../Views/Seassion/Invité/Login.php');
exit;
}

// Search user by username or email
$sql = "SELECT * FROM compte WHERE nom COLLATE utf8mb4_bin = ? OR email COLLATE utf8mb4_bin = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$username, $username]);
$user = $stmt->fetch();

if (!$user) {
// Username/email not found
$_SESSION['login-nom-error'] = "Error > Le nom/email que vous avez mis est incorrect!";
header('Location: ../../Views/Seassion/Invité/Login.php');
exit;
}

if (!password_verify($password, $user['motpass'])) {
// Password wrong
$_SESSION['login-pwd-error'] = "Error > Le password que vous avez mis est incorrect!";
header('Location: ../../Views/Seassion/Invité/Login.php');
exit;
}

// Login OK
unset($_SESSION['old_username']);
$_SESSION['user_nom'] = $user['nom'];
$_SESSION['user_email'] = $user['email'];

header('Location: ../../Views/Seassion/Inscrit/work.php');
exit;
}?>