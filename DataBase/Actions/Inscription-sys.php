<?php session_start();

require_once __DIR__ . '/../Configs/connection_db.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['Inscription'])) {

// Recal name of field
$profile_pic = '../../Asset/FlexIcons/profile_user.png';
$role = 'Member';
$gender = $_POST['gender'] ?? '';
$nom = trim($_POST['register-nom'] ?? '');
$prenom = trim($_POST['register-prenom'] ?? '');
$password = $_POST['register-password'] ?? '';
$password_confirm = $_POST['register-confirm-password'] ?? '';
$email = $_POST['register-full-email'] ?? '';
$phone_number = $_POST['register-phone'] ?? '';
$phone_extension = $_POST['register-phone-extension'] ?? '';
$telephone = $phone_extension . $phone_number;  
$day =  $_POST['birth-day'];
$month =  $_POST['birth-month'];
$year =  $_POST['birth-year'];
$date = sprintf('%04d-%02d-%02d', $year, $month, $day);      

// Password verification
if ($password !== $password_confirm) {
$_SESSION['error-pwd'] = "Error > Password doesn't match with other password";
header("Location: ../../Views/Seassion/Invité/Inscription.php");
exit;
}

// Email syntax verification
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
$_SESSION['error-email'] = "Error > Email is invalid!";
header("Location: ../../Views/Seassion/Invité/Inscription.php");
exit;
}

if (strlen($password) !== 16) {
$_SESSION['error-pwd'] = "Error > Le mot doit contenir 16 caractères.";
header("Location: ../../Views/Seassion/Invité/Inscription.php");
exit;
}

// Génération ID et token sécurisé
$userId = bin2hex(random_bytes(8)); 
$token  = bin2hex(random_bytes(16));
$passwordHash = password_hash($password, PASSWORD_DEFAULT);

// Vérification si email, nom, prénom ou téléphone existe déjà
$stmt = $pdo->prepare("SELECT * FROM compte WHERE email = ? OR nom = ? OR prenom = ? OR telephone = ?");
$stmt->execute([$email, $nom, $prenom, $telephone]);
$existing = $stmt->fetch();

if ($existing) {
if ($existing['email'] === $email) $_SESSION['error-email'] = "Error > Email already exists!";
if ($existing['nom'] === $nom) $_SESSION['error-nom'] = "Error > Name already exists!";
if ($existing['prenom'] === $prenom) $_SESSION['error-prenom'] = "Error > Prenom already exists!";
if ($existing['telephone'] == $telephone) $_SESSION['error-phone'] = "Error > Phone number already exists!";

// Message général d’échec
$_SESSION['Failed'] = "Error > le compte failed a inscrire !";
header("Location: ../../Views/Seassion/Invité/Inscription.php");
exit;
}

// Insertion dans la DB
$stmt = $pdo->prepare("INSERT INTO compte
(id, token, nom, prenom, email, birthday, telephone, gender, role, motpass, profile_pic)
VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

if ($stmt->execute([$userId, $token, $nom, $prenom, $email, $date, $telephone, $gender, $role, $passwordHash, $profile_pic])) {
$_SESSION['id'] = $userId;
$_SESSION['token'] = $token;
$_SESSION['nom'] = $nom;
$_SESSION['email'] = $email;
session_regenerate_id(true);

$_SESSION['success'] = "⭐ Your account has been created successfully!";
header("Location: ../../Views/Seassion/Invité/Login.php");
exit;

}}?>