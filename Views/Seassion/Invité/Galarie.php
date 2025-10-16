<!DOCTYPE HTML>
<HTML lang="en">

<HEAD>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="Description" content="width=device-width, initial-scale=1">
<meta name="KeyWords" content="width=device-width, initial-scale=1">
<title>Galarie</title>
<link href="../../../Util/Stylesheet/navbar.css" rel="stylesheet">
<link href="../../../Util/Stylesheet/footer.css" rel="stylesheet">
<link href="../../../Util/Stylesheet/global.css" rel="stylesheet">
<link href="../../../Util/Stylesheet/galarie.css" rel="stylesheet">
</HEAD>

<BODY>
<!-- Rappler le taskbar dans Acceuil -->
<?php require '../../Componet/navbar/navbar_v1.php';?>

<!-- Banner du Debut -->
<section class="hero">
<div class="hero-content">
<h1>Galaries Pic</h1>
<p>Decouvre Nous Image Prise en Rondonnée</p>
</div></section>

<!-- Galaries Photo -->
<?php require_once __DIR__ . '/../../../database/Configs/connection_db.php';
$photos = [];
if ($pdo) {try {
$stmt = $pdo->query("SELECT image, titre FROM Galarie_picture ORDER BY id ASC LIMIT 12");
$photos = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (Exception $e) {
error_log("⚠️ Query galerie failed: " . $e->getMessage()); }}?>
<section class="gallery">
<h2>Galerie Picture</h2>
<div class="gallery-container">
<?php foreach ($photos as $photo): ?>
<div class="gallery-item">
<img src="../../Asset/Catagories/<?= htmlspecialchars($photo['image']) ?>"
 alt="<?= htmlspecialchars($photo['titre']) ?>">
<div class="overlay"><?= htmlspecialchars($photo['titre']) ?>
</div></div>
<?php endforeach; ?>
</div></section>

<!-- Quote of the day  -->
<section class="quote-section">
<?php try {
require_once __DIR__ . '/../../../database/Configs/connection_db.php';
$stmt = $pdo->query("SELECT texte FROM Daily_quotes ORDER BY RAND() LIMIT 1");
$quotes = $stmt->fetchAll();
foreach ($quotes as $q) {
echo "<blockquote>\" " . htmlspecialchars($q['texte']) . " \"</blockquote>"; 
}} catch (PDOException $e) {
echo "";}?>
</section>

<!-- Galaries Photo -->
<?php require_once __DIR__ . '/../../../database/Configs/connection_db.php';
$photos = [];
if ($pdo) {try {
$stmt = $pdo->query("SELECT image, titre FROM Galarie_activité ORDER BY id ASC LIMIT 12");
$photos = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (Exception $e) {
error_log("⚠️ Query galerie failed: " . $e->getMessage()); }}?>
<section class="gallery2">
<h2>Galerie D'activites</h2>
<div class="gallery-container2">
<?php foreach ($photos as $photo): ?>
<div class="gallery-item2">
<img src="../../Asset/Catagories/<?= htmlspecialchars($photo['image']) ?>"
 alt="<?= htmlspecialchars($photo['titre']) ?>">
<div class="overlay2"><?= htmlspecialchars($photo['titre']) ?>
</div></div>
<?php endforeach;?>
</div></section>

<!-- Avis participants -->
<?php require_once __DIR__ . '/../../../database/Configs/connection_db.php';
$avis = [];
if ($pdo) {try {
$stmt = $pdo->query("SELECT prenom, photo, commentaire FROM Avis_participants ORDER BY id ASC LIMIT 10");
$avis = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (Exception $e) {
error_log("⚠️ Query avis failed: " . $e->getMessage()); }}?>
<section class="testimonials">
<h2>Nos participants</h2>
<div class="testimonial-container">
<?php foreach ($avis as $a): ?>
<div class="testimonial">
<img src="../../../Asset/Catagorie/<?= htmlspecialchars($a['photo']) ?>" alt="<?= htmlspecialchars($a['prenom']) ?>">
<h4><?= htmlspecialchars($a['prenom']) ?></h4>
<p><?= htmlspecialchars($a['commentaire']) ?></p></div>
<?php endforeach; ?>
</div></section>

<!-- Space -->
<div class="space"></div>

<!-- Footer -->
<footer class="footer">
<div class="footer-content">
<div class="footer-logo">
<img src="../../../Asset/FlexIcons/logo.svg" alt="RondoTime Logo">
<p>Explorez les plus beaux endroits de la Tunisie avec RondoTime. 
Réservez, partez et vivez l’aventure !</p></div>
<div class="footer-section">
<h4>Navigation</h4><ul>
<li><a href="./Acceuil.php">Acceuil</a></li>
<li><a href="./Apropos.php">Apropos</a></li>
<li><a href="./Galarie.php">Galarie</a></li>
</ul></div>
<div class="footer-section">
<h4>Extension</h4><ul>
<li><a href="./Contact.php">Contact</a></li>
<li><a href="./Faq.php">FAQ</a></li>
</ul></div>
<div class="footer-section">
<h4>Placement</h4><ul>
<li><a href="javascript:void(0);" onclick="alert('⚠️ Vous devez avoir un compte pour continuer'); window.location.href='./login.php';">plage tabarka</a></li>
<li><a href="javascript:void(0);" onclick="alert('⚠️ Vous devez avoir un compte pour continuer'); window.location.href='./login.php';">Ribat Monastir</a></li>
<li><a href="javascript:void(0);" onclick="alert('⚠️ Vous devez avoir un compte pour continuer'); window.location.href='./login.php';">Kairouan Mosque</a></li>
<li><a href="javascript:void(0);" onclick="alert('⚠️ Vous devez avoir un compte pour continuer'); window.location.href='./login.php';">Villes anciennes</a></li>
</ul></div>
<div class="footer-section">
<h4>More</h4><ul>
<li><a href="javascript:void(0);" onclick="alert('⚠️ Vous devez avoir un compte pour continuer'); window.location.href='./login.php';">canyon tamerza</a></li>
<li><a href="javascript:void(0);" onclick="alert('⚠️ Vous devez avoir un compte pour continuer'); window.location.href='./login.php';">Médina Tunis</a></li>
<li><a href="javascript:void(0);" onclick="alert('⚠️ Vous devez avoir un compte pour continuer'); window.location.href='./login.php';">sidi bou said</a></li>
<li><a href="javascript:void(0);" onclick="alert('⚠️ Vous devez avoir un compte pour continuer'); window.location.href='./login.php';">hammamet</a></li>
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
<a href="https://www.instagram.com"><img src="../../../Asset/FlexIcons//instagram.png" alt="Instagram"></a>
<a href="https://x.com"><img src="../../../Asset/FlexIcons/gmail.png" alt="Gmail"></a>
<a href="https://www.reddit.com"><img src="../../../Asset/FlexIcons/reddit.png" alt="Reddit"></a>
</div></div></div>
<div class="footer-bottom">
&copy; 2025 RondoTime. Tous droits réservés.</div></footer>

<!-- Javascript Requirement -->
<script src="../../../Util/Javascript/dropdown.js"></script>
<script src="../../../Util/Javascript/datalist.js"></script>

</BODY>
</HTML>