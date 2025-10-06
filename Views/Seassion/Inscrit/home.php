<?php session_start();
// Verify if compte open or not !
if (!isset($_SESSION['id'])) {
header("Location: ../Invité/Login.php");
exit;
}

require_once __DIR__ . '/../../../database/Configs/connection_db.php';
$userId = $_SESSION['id'];

// fetch profile picture from compte table
$sql = "SELECT profile_pic FROM compte WHERE id = :id";
$stmt = $pdo->prepare($sql);
$stmt->execute(['id' => $userId]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

// fallback to default if empty or invalid
$defaultPic = "../../../Asset/FlexIcons/profile_user.png";
$_SESSION['profile_image'] = (!empty($user['profile_pic']) && file_exists($user['profile_pic'])) 
? $user['profile_pic'] : $defaultPic;?>

<!DOCTYPE HTML>
<HTML lang="en">

<HEAD>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="Description" content="width=device-width, initial-scale=1">
<meta name="KeyWords" content="width=device-width, initial-scale=1">
<title>Acceuil</title>
<link href="../../../Util/Stylesheet/navbar.css" rel="stylesheet">
<link href="../../../Util/Stylesheet/footer.css" rel="stylesheet">
<link href="../../../Util/Stylesheet/global.css" rel="stylesheet">
<link href="../../../Util/Stylesheet/sliders.css" rel="stylesheet">
<link href="../../../Util/Stylesheet/acceuil.css" rel="stylesheet">
</HEAD>

<BODY>
<!-- Rappler le taskbar dans Acceuil -->
<?php require '../../Componet/navbar/navbar_v3.php';?>

<!-- Slider -->
<div class="Sliders">
<div class="Slide active">
<img src="../../../Asset/Catagories/slider1.png" alt="slider Picture">
<div class="slide-text">
<h1>Découvrir Chebika </h1>
<p>paragraph writing are indispensable parts of any English <br>
writing comprehension syllabus. From lower grades to upper, all kinds 
<br>of students.</p></div>
<div class="borders-on-image">
<div class="border"></div>
<div class="border"></div>
<div class="border"></div>
</div></div>
<div class="Slide">
<img src="../../../Asset/Catagories/slider2.png" alt="slider Picture">
<div class="slide-text">
<h1>Découvrir CapBon </h1>
<p>paragraph writing are indispensable parts of any English <br>
writing comprehension syllabus. From lower grades to upper, all kinds 
<br>of students.</p></div>
<div class="borders-on-image">
<div class="border"></div>
<div class="border"></div>
<div class="border"></div>
</div></div>
<div class="Slide">
<img src="../../../Asset/Catagories/slider3.png" alt="slider Picture">
<div class="slide-text">
<h1>Découvrir Dahar </h1>
<p>paragraph writing are indispensable parts of any English <br>
writing comprehension syllabus. From lower grades to upper, all kinds 
<br>of students.</p></div>
<div class="borders-on-image">
<div class="border"></div>
<div class="border"></div>
<div class="border"></div>
</div></div></div>

<!--  Search with Filter   -->
<div class="search-container">
<div class="search-tabs">
<button class="tab active">Recherche Live</button>
</div>
<form action="./Destination.php" method="get" class="search-fields">
<div class="field-group">
<label for="destination">Destination</label>
<input type="text" id="destination" name="name" placeholder="Tapez votre destination">
</div>
<div class="field-group">
<label for="depart">Date de départ</label>
<input type="date" id="depart" name="date_start">
</div>
<div class="field-group">
<label for="Price">Prix maximum</label>
<input type="text" id="Price" name="price" id="Price" placeholder="Mettre ton prix">
</div>
<div class="field-group">
<label>Voyageurs</label>
<div class="person-select">
<button type="button" id="personToggle" class="search-person-btn">
 👤 1 Adulte, 0 Enfant
</button>
<div id="personBox" class="person-box">
<button type="button" class="person-close" onclick="closePersonBox()">✖</button> 
<div class="person-row">
<div class="title">Adulte(s)</div>
<div class="counter">
<button type="button" onclick="changeCount('adult', -1)">−</button>
<span id="adult">1</span>
<button type="button" onclick="changeCount('adult', 1)">+</button>
</div></div>
<div class="person-row">
<div class="title">Enfant(s)</div>
<div class="counter">
<button type="button" onclick="changeCount('child', -1)">−</button>
<span id="child">0</span>
<button type="button" onclick="changeCount('child', 1)">+</button>
</div></div>
</div></div></div>

<!-- Hidden inputs for counts -->
<input type="hidden" name="Adults[]" id="adulteInput" value="1">
<input type="hidden" name="Enfants[]" id="enfantInput" value="0">
<button type="submit" class="search-btn">Rechercher</button>
</form></div>

<!-- Small information Box -->
<div class="simple-features">
<div class="simple-box">
<img src="../../../Asset/FlexIcons/localisaton.png" alt="icon">
<h4>Randonnées</h4>
<p>Explore avec des guides locaux.</p></div>
<div class="simple-box">
<img src="../../../Asset/FlexIcons/flower.png" alt="icon">
<h4>Nature</h4>
<p>Découvre les paysages uniques.</p></div>
<div class="simple-box">
<img src="../../../Asset/FlexIcons/chat.png" alt="icon">
<h4>Communauté</h4>
<p>Rejoins les passionnés.</p></div>
<div class="simple-box">
<img src="../../../Asset/FlexIcons/event.png" alt="icon">
<h4>Événements</h4>
<p>Participe aux sorties locales.</p></div>
<div class="simple-box">
<img src="../../../Asset/FlexIcons/securite.png" alt="icon">
<h4>Sécurité</h4>
<p>Randonne avec confiance.</p></div></div>

<!-- Les Plus Visités -->
<?php require_once __DIR__ . '/../../../database/Configs/connection_db.php';
$bestPlaces = [];
if ($pdo instanceof PDO) { try {
$stmt = $pdo->query("SELECT * FROM Visités ORDER BY created_at DESC LIMIT 12");
$bestPlaces = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (Exception $e) {
error_log("⚠️ Query failed: " . $e->getMessage());}}?>
<h1 class="top">Les Plus Visités</h1>
<div class="slider-section">
<?php foreach ($bestPlaces as $place): ?>
<div class="card" onclick="flipCard(this)">
<img src="<?= htmlspecialchars($place['image_url'] ?? '') ?>" alt="<?= htmlspecialchars($place['title'] ?? '') ?>">
<div class="stars" aria-label="Note : <?= (int)($place['Star'] ?? 0) ?> sur 5 étoiles">
<?php $starCount = (int)($place['Star'] ?? 0);
for ($i = 1; $i <= 5; $i++) {
if ($i <= $starCount) {
echo '<svg viewBox="0 0 24 24"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 
9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/></svg>';
} else {
echo '<svg viewBox="0 0 24 24"><path d="M22 9.24l-7.19-.62L12 2 9.19 8.63 2 9.24l5.46 4.73-1.64
7.03L12 17.27l6.18 3.73-1.64-7.03L22 9.24zM12 15.4l-3.76 2.27 1-4.28-3.32-2.88 4.38-.38L12 6.1l1.71
4.03 4.38.38-3.32 2.88 1 4.28L12 15.4z"/></svg>';
}}?></div>
<h2 class="sub-title"><?= htmlspecialchars($place['title'] ?? '') ?></h2>
<p class="Description-1"><?= nl2br(htmlspecialchars($place['description'] ?? '')) ?></p>
<p><?php if (isset($_SESSION['id'])): ?>
<a href="<?= htmlspecialchars($place['link'] ?? '#') ?>" class="m">Voir plus</a>
<?php else: ?><a href="javascript:void(0);" 
onclick="alert('⚠️ Vous devez avoir un compte pour continuer'); window.location.href='./login.php';" class="m">Voir plus
</a><?php endif; ?></p>
<?php $price = $place['price'] ?? 0;
$discount = $place['discount'] ?? 0;
if (!empty($discount) && $discount < $price): 
$discountPercent = round((($price - $discount) / $price) * 100);?>
<div class="price">
<span class="old-price"><?= number_format($price, 2, ',', ' ') ?> TND</span>
<span class="new-price"><?= number_format($discount, 2, ',', ' ') ?> TND</span>
<span class="discount-badge">-<?= $discountPercent ?>%</span></div>
<?php elseif (!empty($price)): ?>
<div class="price"><?= number_format($price, 2, ',', ' ') ?> TND</div>
<?php else: ?>
<div class="price">Gratuit</div>
<?php endif; ?></div>
<?php endforeach; ?></div>

<!-- Les plus Reservés -->
<?php require_once __DIR__ . '/../../../database/Configs/connection_db.php';
$bestPlaces = [];
if ($pdo instanceof PDO) { try {
$stmt = $pdo->query("SELECT * FROM Reservés ORDER BY created_at DESC LIMIT 12");
$bestPlaces = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (Exception $e) {
error_log("⚠️ Query failed: " . $e->getMessage());}}?>
<h1 class="top">Les Plus Reservés</h1>
<div class="slider-section">
<?php foreach ($bestPlaces as $place): ?>
<div class="card" onclick="flipCard(this)">
<img src="<?= htmlspecialchars($place['image_url'] ?? '') ?>" alt="<?= htmlspecialchars($place['title'] ?? '') ?>">
<div class="stars" aria-label="Note : <?= (int)($place['Star'] ?? 0) ?> sur 5 étoiles">
<?php $starCount = (int)($place['Star'] ?? 0);
for ($i = 1; $i <= 5; $i++) {
if ($i <= $starCount) {
echo '<svg viewBox="0 0 24 24"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 
9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/></svg>';
} else {
echo '<svg viewBox="0 0 24 24"><path d="M22 9.24l-7.19-.62L12 2 9.19 8.63 2 9.24l5.46 4.73-1.64
7.03L12 17.27l6.18 3.73-1.64-7.03L22 9.24zM12 15.4l-3.76 2.27 1-4.28-3.32-2.88 4.38-.38L12 6.1l1.71
4.03 4.38.38-3.32 2.88 1 4.28L12 15.4z"/></svg>';
}}?></div>
<h2 class="sub-title"><?= htmlspecialchars($place['title'] ?? '') ?></h2>
<p class="Description-1"><?= nl2br(htmlspecialchars($place['description'] ?? '')) ?></p> 
<p><?php if (isset($_SESSION['id'])): ?>
<a href="<?= htmlspecialchars($place['link1'] ?? '#') ?>" class="m">Voir plus</a>
<?php else: ?><a href="javascript:void(0);" 
onclick="alert('⚠️ Vous devez avoir un compte pour continuer'); window.location.href='./login.php';" class="m">Voir plus
</a><?php endif; ?></p>
<?php $price = $place['price'] ?? 0;
$discount = $place['discount'] ?? 0;
if (!empty($discount) && $discount < $price): 
$discountPercent = round((($price - $discount) / $price) * 100);?>
<div class="price">
<span class="old-price"><?= number_format($price, 2, ',', ' ') ?> TND</span>
<span class="new-price"><?= number_format($discount, 2, ',', ' ') ?> TND</span>
<span class="discount-badge">-<?= $discountPercent ?>%</span></div>
<?php elseif (!empty($price)): ?>
<div class="price"><?= number_format($price, 2, ',', ' ') ?> TND</div>
<?php else: ?>
<div class="price">Gratuit</div>
<?php endif; ?></div>
<?php endforeach; ?></div>

<!-- En Promotion -->
<?php require_once __DIR__ . '/../../../database/Configs/connection_db.php';
$bestPlaces = [];
if ($pdo instanceof PDO) { try {
$stmt = $pdo->query("SELECT * FROM Promotion ORDER BY created_at DESC LIMIT 6");
$bestPlaces = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (Exception $e) {
error_log("⚠️ Query failed: " . $e->getMessage());}}?>
<h1 class="top">En Promotion</h1>
<div class="slider-section">
<?php foreach ($bestPlaces as $place): ?>
<div class="card" onclick="flipCard(this)">
<img src="<?= htmlspecialchars($place['image_url'] ?? '') ?>" alt="<?= htmlspecialchars($place['title'] ?? '') ?>">
<div class="stars" aria-label="Note : <?= (int)($place['Star'] ?? 0) ?> sur 5 étoiles">
<?php $starCount = (int)($place['Star'] ?? 0);
for ($i = 1; $i <= 5; $i++) {
if ($i <= $starCount) {
echo '<svg viewBox="0 0 24 24"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 
9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/></svg>';
} else {
echo '<svg viewBox="0 0 24 24"><path d="M22 9.24l-7.19-.62L12 2 9.19 8.63 2 9.24l5.46 4.73-1.64
7.03L12 17.27l6.18 3.73-1.64-7.03L22 9.24zM12 15.4l-3.76 2.27 1-4.28-3.32-2.88 4.38-.38L12 6.1l1.71
4.03 4.38.38-3.32 2.88 1 4.28L12 15.4z"/></svg>';
}}?></div>
<h2 class="sub-title"><?= htmlspecialchars($place['title'] ?? '') ?></h2>
<p class="Description-1"><?= nl2br(htmlspecialchars($place['description'] ?? '')) ?></p>
<p><?php if (isset($_SESSION['id'])): ?>
<a href="<?= htmlspecialchars($place['link2'] ?? '#') ?>" class="m">Voir plus</a>
<?php else: ?><a href="javascript:void(0);" 
onclick="alert('⚠️ Vous devez avoir un compte pour continuer'); window.location.href='./login.php';" class="m">Voir plus
</a><?php endif; ?></p>  
<?php $price = $place['price'] ?? 0;
$discount = $place['discount'] ?? 0;
if (!empty($discount) && $discount < $price): 
$discountPercent = round((($price - $discount) / $price) * 100);?>
<div class="price">
<span class="old-price"><?= number_format($price, 2, ',', ' ') ?> TND</span>
<span class="new-price"><?= number_format($discount, 2, ',', ' ') ?> TND</span>
<span class="discount-badge">-<?= $discountPercent ?>%</span></div>
<?php elseif (!empty($price)): ?>
<div class="price"><?= number_format($price, 2, ',', ' ') ?> TND</div>
<?php else: ?>
<div class="price">Gratuit</div>
<?php endif; ?></div>
<?php endforeach; ?></div>

<!-- Partenair Logos ou Link -->
<?php require_once __DIR__ . '/../../../database/Configs/connection_db.php';
$partenair = [];
if ($pdo) { try {
$stmt = $pdo->query("SELECT * FROM Partenair ORDER BY id ASC LIMIT 9");
$partenair = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (Exception $e) {
error_log("⚠️ Query partenair failed: " . $e->getMessage());
$partenair = [];
}}?>
<div class="titre_partenair">Partenair Company</div>
<div class="slider-container">
<button class="btn left" id="leftBtn">&#10094;</button>
<div class="logos-view">
<div class="logos-track" id="logosTrack">
<?php if (!empty($partenair)): ?>
<?php foreach ($partenair as $p): ?>
<?php if (!empty($p['site_web'])): ?>
<a href="<?= htmlspecialchars($p['site_web']) ?>" target="_blank">
<img src="../../Asset/Catagories/<?= htmlspecialchars($p['logo_url']) ?>" 
alt="<?= htmlspecialchars($p['nom']) ?>"></a>
<?php else: ?>
<img src="../../Asset/Catagories/<?= htmlspecialchars($p['logo_url']) ?>" 
alt="<?= htmlspecialchars($p['nom']) ?>">
<?php endif; ?>
<?php endforeach; ?>
<?php endif; ?>
</div></div>
<button class="btn right" id="rightBtn">&#10095;</button></div>

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
<script src="../../../Util/Javascript/sliders-v2.js"></script>
<script src="../../../Util/Javascript/animation.js"></script>
<script src="../../../Util/Javascript/datalist1.js"></script>
<script src="../../../Util/Javascript/modal.js"></script>

</BODY>
</HTML>