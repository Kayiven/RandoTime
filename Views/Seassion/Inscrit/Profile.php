<!-- Verification -->
<?php session_start();
require_once '../../../DataBase/Configs/connection_db.php';
// Verify if compte open or not !
if (!isset($_SESSION['id'])) {
header("Location: ../Invité/Login.php");
exit;
}

// === Fetch total numbers ===
$current_compte = $_SESSION['id'] ?? null;

if ($current_compte) {
// Total number of users (optional, for your chart)
$stmt = $pdo->query("SELECT COUNT(*) FROM compte");
$total_comptes = (int)$stmt->fetchColumn();

// Fetch logged-in user's full name (if comments store full name)
$stmt = $pdo->prepare("SELECT nom, prenom FROM compte WHERE id = :id LIMIT 1");
$stmt->execute(['id' => $current_compte]);
$userData = $stmt->fetch(PDO::FETCH_ASSOC);

if ($userData) {
$nom = $userData['nom'];
$prenom = $userData['prenom'];
$full_name = trim("$nom $prenom");

// Count comments made by this user
$stmt = $pdo->prepare("SELECT COUNT(*) FROM Avis_participants WHERE prenom = ?");
$stmt->execute([$full_name]);
$total_avis = (int)$stmt->fetchColumn();

// Count participations of this user
$stmt = $pdo->prepare("SELECT COUNT(*) FROM payments WHERE nom = ? AND prenom = ?");
$stmt->execute([$nom, $prenom]);
$total_participations = (int)$stmt->fetchColumn();

// Count compte of this user
if ($current_compte) {
$stmt = $pdo->prepare("SELECT COUNT(*) FROM compte WHERE id = ?");
$stmt->execute([$current_compte]);
$total_compte = (int)$stmt->fetchColumn();
}

// --- Calculate percentages ---
$total_global = $total_avis + $total_participations + $total_compte;
if ($total_global == 0) $total_global = 1; 

$percent_avis = round(($total_avis / $total_global) * 100);
$percent_participations = round(($total_participations / $total_global) * 100);
$percent_compte = round(($total_compte / $total_global) * 100);
}}

if ($current_compte) {
$stmt = $pdo->prepare("SELECT nom, prenom FROM compte WHERE id = :id LIMIT 1");
$stmt->execute(['id' => $current_compte]);
$userData = $stmt->fetch(PDO::FETCH_ASSOC);

if ($userData) {
$full_name = trim($userData['nom'] . ' ' . $userData['prenom']);
$stmt = $pdo->prepare("SELECT COUNT(*) FROM Avis_participants WHERE prenom = ?");
$stmt->execute([$full_name]);
$total_comments = (int)$stmt->fetchColumn();
}}

// 3️⃣ Activity time (number of logins or last login timestamp)q
$stmt = $pdo->prepare("SELECT last_login FROM compte WHERE id = :id LIMIT 1");
$stmt->execute(['id' => $current_compte]);
$last_login = $stmt->fetchColumn();

// Fetch prenom only
$current_account_id = $_SESSION['id'];
$stmt = $pdo->prepare("SELECT prenom FROM compte WHERE id = :id LIMIT 1");
$stmt->execute(['id' => $current_account_id]);
$prenom = $stmt->fetchColumn();

$id = $_SESSION['id'];
$nom = $_SESSION['nom'];
$prenom = $_SESSION['prenom'];
$email = $_SESSION['email'];

if (isset($_POST['update_field'])) {
$field = $_POST['field'];
$new_value = trim($_POST['new_value']);

if (!empty($new_value)) {
$allowed_fields = ['nom', 'prenom', 'email'];
if (in_array($field, $allowed_fields)) {
$sql = "UPDATE compte SET $field = ? WHERE id = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$new_value, $id]);

// Met à jour la session
$_SESSION[$field] = $new_value;

// Crée un message temporaire
$_SESSION['message'] = ucfirst($field) . " mis à jour avec succès ✅";

// Redirection (pour éviter renvoi du form)
header("Location: " . $_SERVER['PHP_SELF']);
exit;

}} else {
$_SESSION['message'] = "Veuillez entrer une valeur valide ⚠️";
header("Location: " . $_SERVER['PHP_SELF']);
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
<link href="../../../Util/Stylesheet/profile.css" rel="stylesheet">
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
<a href="./Profile.php" class="active">View Profile</a>
<a href="./Commentaires.php">View commentaire</a>
</div>
<div class="category active">History</div>
<div class="submenu">
<a href="./history_payement.php">View Payement</a>
</div>
<div class="category active">Paramettre</div>
<div class="submenu">
<a href="../../../DataBase/Actions/disconnect-sys.php">Deconnection</a></div>
</div>

<div class="main-content" style="display:flex; gap:40px; align-items:flex-start;">
    
<!-- Left + right combined wrapper -->
<div class="dashboard-row" style="display:flex; gap:40px; align-items:flex-start;">

<!-- Left column -->
<div class="left-column" style="display:flex; flex-direction:column; gap:20px;">
        
<!-- Horizontal stats -->
<div class="stats-container-horizontal">
<div class="stat-box">
<div class="stat-title"><span class="color-box tspace green"></span>Commentaires</div>
<div class="stat-value"><?= $total_comments ?></div>
</div>
<div class="stat-box">
<div class="stat-title"><span class="color-box tspace orange"></span>Participations</div>
<div class="stat-value"><?= $total_participations ?></div>
</div>
<div class="stat-box">
<div class="stat-title"><span class="color-box tspace bleu"></span>Last Time</div>
<div class="stat-value"> <?= htmlspecialchars($last_login ? date('H:i:s', strtotime($last_login)) : '-') ?></div>
</div></div>

<!-- Content title & description -->
<div class="content-box">
<h1 class="content-title">Controle de Compte</h1>
<p class="content-description">
Voir des petit information sur votre <strong>compte</strong> ou 
change se que vous voulez ici, tout à votre Service.
</p>
</div>

<!-- User info box -->
<div class="user-info-box">
<?php if (!empty($_SESSION['message'])): ?>
<p id="update-msg" style="color:green;"><?php echo $_SESSION['message']; ?></p>
<?php unset($_SESSION['message']);?>
<?php endif; ?>

<!-- NOM -->
<p><strong>Nom :</strong>
<span id="text_nom"><?php echo htmlspecialchars($_SESSION['nom']); ?></span>
<button type="button" class="edit-btn" data-field="nom">Modifier</button>
<form method="post" class="edit-form" id="form_nom" style="display:none;">
<input type="text" name="new_value" class="input_style" value="<?php echo htmlspecialchars($_SESSION['nom']); ?>">
<input type="hidden" name="field" value="nom" class="input_style">
<button type="submit" name="update_field" class="save-btn">Enregistrer</button>
<button type="button" class="cancel-btn">Annuler</button>
</form></p>

<!-- PRENOM -->
<p><strong>Prénom :</strong>
<span id="text_prenom"><?php echo htmlspecialchars($prenom); ?></span>
<button type="button" class="edit-btn" data-field="prenom" >Modifier</button>
<form method="post" class="edit-form" id="form_prenom" style="display:none;">
<input type="text" name="new_value" class="input_style" value="<?php echo htmlspecialchars($prenom); ?>">
<input type="hidden" name="field" value="prenom" class="input_style">
<button type="submit" name="update_field" class="save-btn">Enregistrer</button>
<button type="button" class="cancel-btn">Annuler</button>
</form></p>

<!-- EMAIL -->
<p><strong>Email :</strong>
<span id="text_email"><?php echo htmlspecialchars($_SESSION['email']); ?></span>
<button type="button" class="edit-btn" data-field="email">Modifier</button>
<form method="post" class="edit-form" id="form_email" style="display:none;">
<input type="email" name="new_value" class="input_style" value="<?php echo htmlspecialchars($_SESSION['email']); ?>">
<input type="hidden" name="field" value="email" class="input_style">
<button type="submit" name="update_field" class="save-btn">Enregistrer</button>
<button type="button" class="cancel-btn">Annuler</button>
</form></p>

<!-- MOT DE PASSE (juste affichage, pas modif ici) --><p>
<strong>Mot de passe :</strong> ********</p>
</div></div>


<!-- Right column: donut chart -->
<div class="right-column">
<div class="dashboard">
<h2>Répartition des Comptes & Commentaires</h2>
<canvas id="circleChart" width="300" height="300"></canvas>
<div class="stats-info">
<div class="stat">
<div><span class="color-box yellow"></span>Participations</div>
<span class="value"><?= $total_participations ?>%</span>
</div>
<div class="stat">
<div><span class="color-box green"></span>Commentaires</div>
<span class="value"><?= $percent_avis ?>%</span>
</div>
<div class="stat">
<div><span class="color-box bleu"></span>TotalComptes</div>
<span class="value"><?= $total_compte ?>%</span>
</div></div></div>
</div>
</div></div></div>

<!-- Recall full code of char -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
const totalAvis = <?= $total_avis ?>;
const total_participations = <?= $total_participations ?>;
const total_compte = <?= $total_compte ?>;
</script>

<!-- Footer -->
<footer class="footer">
<div class="footer-content">
<div class="footer-logo">
<img src="../../../Asset/FlexIcons/logo.svg" alt="RondoTime Logo">
<p>Explorez les plus beaux endroits de la Tunisie avec RondoTime. 
Réservez, partez et vivez l’aventure !</p></div>
<div class="footer-section">
<h4>Navigation</h4><ul>
<li><a href="./Home.php">Acceuil</a></li>
<li><a href="./About.php">Apropos</a></li>
<li><a href="./Destination.php">Destinations</a></li>
<li><a href="./Picture.php">Galarie</a></li>
</ul></div>
<div class="footer-section">
<h4>Extension</h4><ul>
<li><a href="./Support.php">Contact</a></li>
<li><a href="./Question.php">FAQ</a></li>
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
<li><a href="https://www.facebook.com">Facebook</a></li>
<li><a href="https://www.instagram.com">Instagram</a></li>
<li><a href="https://x.com">twitter</a></li>
<li><a href="https://www.reddit.com">Reddit</a></li>
</ul></div>
<div class="footer-contact">
<h4>Contact</h4>
<p>📞 +216 90 000 000</p>
<p>📧 contact@rondotime.tn</p>
<div class="social-icons">
<a href="https://www.facebook.com"><img src="../../../Asset/FlexIcons/Facebook.png" alt="Facebook"></a>
<a href="https://www.instagram.com"><img src="../../../Asset/FlexIcons/instagram.png" alt="Instagram"></a>
<a href="https://x.com"><img src="../../../Asset/FlexIcons/gmail.png" alt="Gmail"></a>
<a href="https://www.reddit.com"><img src="../../../Asset/FlexIcons/reddit.png" alt="Reddit"></a>
</div></div></div>
<div class="footer-bottom">
&copy; 2025 RondoTime. Tous droits réservés.</div></footer>

<!-- Javascript Requirement -->
<script src="../../../Util/Javascript/dropdown.js"></script>
<script src="../../../Util/Javascript/datalist1.js"></script>
<script src="../../../Util/Javascript/char.Js"></script>
<script src="../../../Util/Javascript/Lisenar_Form.js"></script>

</BODY>
</HTML>