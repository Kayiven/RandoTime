<!-- Verification -->
<?php session_start();
require_once '../../../DataBase/Configs/connection_db.php';
// Verify if compte open or not !
if (!isset($_SESSION['id'])) {
header("Location: ../Invité/Login.php");
exit;
}

$current_compte = $_SESSION['id'] ?? null;
$commentaires = [];
$userData = [];

// Fetch nom, prenom, and photo for the logged-in user (for posting new comments)
if ($current_compte) {
$stmt = $pdo->prepare("SELECT nom, prenom, photo FROM compte WHERE id = :id LIMIT 1");
$stmt->execute(['id' => $current_compte]);
$userData = $stmt->fetch(PDO::FETCH_ASSOC);
}

// Fetch all comments (no filtering, show all)
$stmt = $pdo->prepare("SELECT * FROM Avis_participants ORDER BY date ASC");
$stmt->execute();
$commentaires = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Handle new comment submission
if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['commentaire'])) {
if ($userData) {
$nom = $userData['nom'];
$prenom = $userData['prenom'];
$photo = $userData['photo'] ?? '../../Asset/FlexIcons/profile_user.png';
$commentaire = htmlspecialchars($_POST['commentaire']);

// Combine nom + prenom to store together
$full_name = trim("$nom $prenom");

// Insert new comment
$stmt = $pdo->prepare("
INSERT INTO Avis_participants (prenom, photo, commentaire)
VALUES (?, ?, ?)");
$stmt->execute([$full_name, $photo, $commentaire]);

header("Location: commentaires.php");
exit;
}}?>

<!DOCTYPE HTML>
<HTML lang="en">

<HEAD>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="Description" content="width=device-width, initial-scale=1">
<meta name="KeyWords" content="width=device-width, initial-scale=1">
<title>Profile</title>
<link href="../../../Util/Stylesheet/navbar.css" rel="stylesheet">
<link href="../../../Util/Stylesheet/footer.css" rel="stylesheet">
<link href="../../../Util/Stylesheet/global.css" rel="stylesheet">
<link href="../../../Util/Stylesheet/Commentaires.css" rel="stylesheet">
</HEAD>
<BODY>

<!-- Rappler le taskbar dans Acceuil -->
<?php require '../../Componet/navbar/navbar_v3.php';?>

<!-- Dashboard -->
<div class="dashboard-wrapper">
<div class="sidebar">
<h2>Dashboard</h2>
<div class="category active">Controle</div>
<div class="submenu">
<a href="./Profile.php">View Profile</a>
<a href="./Commentaires.php" class="active">View commentaire</a>
</div>
<div class="category active">History</div>
<div class="submenu">
<a href="#">View Payement</a>
</div>
<div class="category active">Paramettre</div>
<div class="submenu">
<a href="../../../DataBase/Actions/disconnect-sys.php">Deconnection</a>
</div></div>

<!-- Main Content -->
<div class="comment-section">
<div class="user-header">
<img src="../../../Asset/Uploads/<?= htmlspecialchars($userData['photo'] ?? '../../Asset/FlexIcons/profile_user.png') ?>" alt="photo" class="profile-photo">
<h3><?= htmlspecialchars($userData['nom'] . ' ' . $userData['prenom']) ?></h3>
</div><h4>Vos Commentaires</h4><BR>
<div class="comment-box">
<?php if (!empty($commentaires)): ?>
<?php foreach ($commentaires as $c): ?>
<div class="comment">
<div class="comment-header">
<!-- Use the photo stored in the comment, not logged-in user -->
<img src="../../../Asset/Uploads/<?= htmlspecialchars($c['photo'] ?? 'profile_user.png') ?>" 
alt="photo" class="comment-photo">
<span class="comment-name"><?= htmlspecialchars($c['prenom']) ?></span>
<span class="comment-date"><?= htmlspecialchars($c['date']) ?></span>
</div>
<p class="comment-text"><?= htmlspecialchars($c['commentaire']) ?></p></div>
<?php endforeach; ?>
<?php else: ?>
<p class="no-comment">Aucun commentaire pour le moment.</p>
<?php endif; ?>
</div>

<form method="POST" class="comment-form">
<textarea name="commentaire" placeholder="Écrire un commentaire..." required></textarea>
<button type="submit">Envoyer</button>
</form></div>
</div>

<!-- Footer -->
<footer class="footer">
<div class="footer-content">
<div class="footer-logo">
<img src="../../../Asset/FlexIcons/logo.svg" alt="RondoTime Logo">
<p>Explorez les plus beaux endroits de la Tunisie avec RondoTime. 
Réservez, partez et vivez l’aventure !</p></div>
<div class="footer-section">
<h4>Navigation</h4><ul>
<li><a href="#">Acceuil</a></li>
<li><a href="#">Apropos</a></li>
<li><a href="#">Destinations</a></li>
<li><a href="#">Événements</a></li>
</ul></div>
<div class="footer-section">
<h4>Extension</h4><ul>
<li><a href="#">Galarie</a></li>
<li><a href="#">Contact</a></li>
<li><a href="#">Blog</a></li>
<li><a href="#">FAQ</a></li>
</ul></div>
<div class="footer-section">
<h4>Placement</h4><ul>
<li><a href="#">plage tabarka</a></li>
<li><a href="#">Ribat Monastir</a></li>
<li><a href="#">Kairouan Mosque</a></li>
<li><a href="#">Villes anciennes</a></li>
</ul></div>
<div class="footer-section">
<h4>More</h4><ul>
<li><a href="#">canyon tamerza</a></li>
<li><a href="#">Médina Tunis</a></li>
<li><a href="#">sidi bou said</a></li>
<li><a href="#">hammamet</a></li>
</ul></div>
<div class="footer-section">
<h4>Social</h4><ul>
<li><a href="#">Facebook</a></li>
<li><a href="#">Instagram</a></li>
<li><a href="#">twitter</a></li>
<li><a href="#">Reddit</a></li>
</ul></div>
<div class="footer-contact">
<h4>Contact</h4>
<p>📞 +216 90 000 000</p>
<p>📧 contact@rondotime.tn</p>
<div class="social-icons">
<a href="#"><img src="../../../Asset/FlexIcons/Facebook.png" alt="Facebook"></a>
<a href="#"><img src="../../../Asset/FlexIcons//instagram.png" alt="Instagram"></a>
<a href="#"><img src="../../../Asset/FlexIcons/gmail.png" alt="Gmail"></a>
<a href="#"><img src="../../../Asset/FlexIcons/reddit.png" alt="Reddit"></a>
</div></div></div>
<div class="footer-bottom">
&copy; 2025 RondoTime. Tous droits réservés.</div></footer>

<!-- Javascript Requirement -->
<script src="../../../Util/Javascript/dropdown.js"></script>
<script src="../../../Util/Javascript/datalist1.js"></script>

</BODY>
</HTML>