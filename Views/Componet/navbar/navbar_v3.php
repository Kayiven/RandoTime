<?php 
// Start session only if not already started
if (session_status() === PHP_SESSION_NONE) {
session_start(); 
}
// Get user info from session
$userName  = $_SESSION['user_nom']  ?? 'Invité';
$userEmail = $_SESSION['user_email'] ?? '';

require_once '../../../database/Configs/connection_db.php';

$current_compte = $_SESSION['id'] ?? null;
$userData = [];

if ($current_compte) {
$stmt = $pdo->prepare("SELECT nom, prenom, email, photo FROM compte WHERE id = :id LIMIT 1");
$stmt->execute(['id' => $current_compte]);
$userData = $stmt->fetch(PDO::FETCH_ASSOC);
}?>

<!-- Navbar::FlexNav -->
<div class="navbar_v1">
<img src="../../../Asset/FlexIcons/logo.svg" class="website_logo">
<ul class="list-v1">
<li><a href="../../Seassion/Inscrit/Home.php">Acceuil</a></li>
<li><a href="../../Seassion/Inscrit/About.php">Apropos</a></li>
<li><a href="../../Seassion/Inscrit/Destination.php">Destination</a></li>
<li><a href="../../Seassion/Inscrit/evenements.php">Événements</a></li>
<li><a href="../../Seassion/Inscrit/Picture.php">Galarie</a></li>
<li><label class="more" onclick="more()" id="More">More</label></li></ul>
<!-- Navbar::FlexExtension -->
<ul class="list-v03">
<li class="search">
<span class="icon">🔍</span>
<input type="text" placeholder="Search..." id="searchInput" autocomplete="off"></li>
<div class="suggestions" id="suggestions"></div>
<li><img src="<?php echo htmlspecialchars($userData['photo'] ? '../../../Asset/Uploads/' . $userData['photo'] : '../../../Asset/FlexIcons/profile_user.png'); ?>" class="profile-img1"  onclick="compte3()" id="seasion-compte3"></ul></div>
<!-- Navbar::Flexplus -->
<div class="box-flexplus2" id="box-flexplus">
<ul class="list-v001">
<li><a href="../../Seassion/Inscrit/Support.php">Contact</a></li>
<li><a href="../../Seassion/Inscrit/Question.php">FAQ</a></li></ul></div>
<!-- Navbar::options -->
<form action="#" method="post">
<div class="seasion-options" id="seasion-op">
<li class="seasion_email"><?php echo htmlspecialchars($_SESSION['email']); ?></li>
<li class="seasion_pic">
<img src="<?php echo htmlspecialchars($userData['photo'] ? '../../../Asset/Uploads/' . $userData['photo'] : '../../../Asset/FlexIcons/profile_user.png'); ?>" 
alt="Profile Picture" class="seasion-pic" ></li>
<li class="seasion_nom">Welcome, <b><?php echo htmlspecialchars($_SESSION['nom']);?></b> !</li>
<li><input type="submit" value="Parametre" class="Parametre" formaction="../../Seassion/Inscrit/Profile.php"></li>
<li><input type="submit" value="Disconnect" class="Disconnect" formaction="../../../DataBase/Actions/disconnect-sys.php"></li></div></form>