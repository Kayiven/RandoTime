<?php session_start();
// Verify if compte open or not !
if (!isset($_SESSION['id'])) {
header("Location: ../Invité/Login.php");
exit;
}?>

<!DOCTYPE HTML>
<HTML lang="en">

<HEAD>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="Description" content="width=device-width, initial-scale=1">
<meta name="KeyWords" content="width=device-width, initial-scale=1">
<title>Destination</title>
<link href="../../../Util/Stylesheet/navbar.css" rel="stylesheet">
<link href="../../../Util/Stylesheet/footer.css" rel="stylesheet">
<link href="../../../Util/Stylesheet/global.css" rel="stylesheet">
<link href="../../../Util/Stylesheet/destination.css" rel="stylesheet">
</HEAD>

<BODY>
<!-- Rappler le taskbar dans Acceuil -->
<?php require '../../Componet/navbar/navbar_v3.php';?>

<!-- Banner du Debut -->
<section class="hero">
<div class="hero-content">
<h1>Desination</h1>
<p>Decouver nous Destination avec nous!</p>
</div></section>

<?php
require_once __DIR__ . '/../../../database/Configs/connection_db.php';
$limit = 7; 
$page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($page - 1) * $limit;
$query = "SELECT * FROM filter WHERE 1=1";
$conditions = [];
$params = [];

// Name filter
if (!empty($_GET['name'])) {
$conditions[] = "name LIKE ?";
$params[] = "%" . trim($_GET['name']) . "%";
}

// Stars filter
if (!empty($_GET['stars'])) {
$stars = $_GET['stars'];
$placeholders = implode(',', array_fill(0, count($stars), '?'));
$conditions[] = "stars IN ($placeholders)";
$params = array_merge($params, $stars);
}

// Price filter
if (!empty($_GET['price']) && is_numeric($_GET['price'])) {
$conditions[] = "price <= ?";
$params[] = $_GET['price'];
}

// Adults filter
if (!empty($_GET['Adults'])) {
$adults = $_GET['Adults'];
$placeholders = implode(',', array_fill(0, count($adults), '?'));
$conditions[] = "adults IN ($placeholders)";
$params = array_merge($params, $adults);
}

// Children filter
if (!empty($_GET['Enfants'])) {
$children = $_GET['Enfants'];
$placeholders = implode(',', array_fill(0, count($children), '?'));
$conditions[] = "children IN ($placeholders)";
$params = array_merge($params, $children);
}

// Status filter
if (!empty($_GET['status'])) {
$conditions[] = "status = ?";
$params[] = $_GET['status'];
}

// Date filter (ensure your column type is DATE or DATETIME)
if (!empty($_GET['date_start'])) {
$conditions[] = "date >= ?";
$params[] = $_GET['date_start'];
}

// Merge conditions
if (!empty($conditions)) {
$query .= " AND " . implode(" AND ", $conditions);
}

// Count total results for pagination
$countQuery = "SELECT COUNT(*) FROM filter WHERE 1=1";
if (!empty($conditions)) {
$countQuery .= " AND " . implode(" AND ", $conditions); }
$countStmt = $pdo->prepare($countQuery);
$countStmt->execute($params);
$totalResults = $countStmt->fetchColumn();
$totalPages = ceil($totalResults / $limit);

// Add LIMIT and OFFSET directly (PDO cannot bind them)
$query .= " LIMIT $limit OFFSET $offset";
$stmt = $pdo->prepare($query);
$stmt->execute($params);
$places = $stmt->fetchAll(PDO::FETCH_ASSOC); ?>

<!-- FILTER FORM -->
<div class="page-container">
<form method="get" class="container_filter">
<div class="container_tab">
<div class="Name_filter">By Filter</div>
<input type="text" placeholder="Nom de place" name="name" value="<?= htmlspecialchars($_GET['name'] ?? '') ?>">
</div><hr class="space">

<div class="container_stars">
<div class="Name-stars">Stars</div><br>
<?php foreach (range(1,5) as $s): ?>
<label><input type="checkbox" name="stars[]" value="<?= $s ?>" <?= isset($_GET['stars']) && in_array($s,$_GET['stars']) ? 'checked' : '' ?>> <?= $s ?>&nbsp; stars</label><br>
<?php endforeach; ?></div>
<hr class="space">

<div class="container-date">
<div class="Name-date">Date</div>
<input type="date" name="date_start" value="<?= htmlspecialchars($_GET['date_start'] ?? '') ?>">
</div><hr class="space">

<div class="container-price">
<div class="Name-price">Max Prix</div>
<input type="text" name="price" id="Price"  placeholder="Prix maximum" value="<?= htmlspecialchars($_GET['price'] ?? '') ?>">
</div><hr class="space">

<div class="container_Adults">
<div class="Name-Adults">Adults</div><br>
<?php foreach (range(1,6) as $a): ?>
<label><input type="checkbox" name="Adults[]" value="<?= $a ?>" <?= isset($_GET['Adults']) && in_array($a,$_GET['Adults']) ? 'checked' : '' ?>> <?= $a ?>&nbsp; Adults</label><br>
<?php endforeach; ?></div>
<hr class="space">

<div class="container_Enfants">
<div class="Name-Enfants">Enfants</div><br>
<?php foreach (range(1,4) as $c): ?>
<label><input type="checkbox" name="Enfants[]" value="<?= $c ?>" <?= isset($_GET['Enfants']) && in_array($c,$_GET['Enfants']) ? 'checked' : '' ?>> <?= $c ?> &nbsp;Enfants</label><br>
<?php endforeach; ?></div>
<hr class="space">

<div class="container_status">
<div class="Name-status"><b>Status</b></div><br>
<label><input type="radio" name="status" value="online" <?= (isset($_GET['status']) && $_GET['status']=='online')?'checked':'' ?>>&nbsp; Online</label><br>
<label><input type="radio" name="status" value="offline" <?= (isset($_GET['status']) && $_GET['status']=='offline')?'checked':'' ?>>&nbsp; Offline</label>
</div><hr class="space">
<button type="submit" id="filterBtn">Apply Filter</button></form>

<!-- RESULTS CARDS -->
<div class="container-card-filter">
<?php if(!empty($places)): ?>
<?php foreach($places as $place): ?>
<div class="card">

<!-- IMAGE LEFT -->
<div class="card-image">
<img src="<?= htmlspecialchars($place['image']) ?>" alt="image"></div>
<div class="card-info">
 <div class="card-title">
<div class="contain-card-name"><?= htmlspecialchars($place['name']) ?></div>
<div class="contain-card-subtitle"><?= htmlspecialchars($place['subtitle']) ?></div></div>

<!-- STARS -->
<div class="stars" aria-label="Note : <?= (int)($place['stars'] ?? 0) ?> sur 5 étoiles">
<?php $starCount = (int)($place['stars'] ?? 0);
for ($i = 1; $i <= 5; $i++) {
if ($i <= $starCount) {
echo '<svg viewBox="0 0 24 24" class="star filled"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 
9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/></svg>';
} else {
echo '<svg viewBox="0 0 24 24" class="star"><path d="M22 9.24l-7.19-.62L12 2 9.19 8.63 2 9.24l5.46 4.73-1.64
7.03L12 17.27l6.18 3.73-1.64-7.03L22 9.24zM12 15.4l-3.76 2.27 1-4.28-3.32-2.88 4.38-.38L12 6.1l1.71
4.03 4.38.38-3.32 2.88 1 4.28L12 15.4z"/></svg>';
}}?> 

<!-- BOOK NOW BUTTON -->
<form method="post">
<button formaction="<?= htmlspecialchars($place['link']) ?>">More Détaille</button>
</form>
</div>

<!-- DETAILS TABLE -->
<div class="card-details">
<div class="detail">
<div class="label">Date</div>
<div class="value"><?= htmlspecialchars($place['date']) ?></div>
</div>
<div class="detail">
<div class="label">Adults</div>
<div class="value"><?= htmlspecialchars($place['adults']) ?></div>
</div>
<div class="detail">
<div class="label">Enfants</div>

<div class="value"><?= htmlspecialchars($place['children']) ?></div>
</div>
<div class="detail">
<div class="label">Prix</div>
<div class="value"><?= htmlspecialchars($place['price']) ?> TND</div>
</div>
<div class="detail">
<div class="label">Status</div>
<div class="value <?= $place['status'] === 'online' ? 'online' : 'offline' ?>">
<?= htmlspecialchars($place['status']) ?>
</div></div></div>
</div></div>
<?php endforeach; ?>
<?php else: ?>
<div>No results found.</div>
<?php endif; ?>
</div></div>

<!-- PAGINATION -->
<?php if($totalPages > 1): ?>
<div class="pagination">
<?php for($p=1; $p<=$totalPages; $p++):
$queryParams = $_GET;
$queryParams['page'] = $p;
$url = '?'.http_build_query($queryParams); ?>
<a href="<?= $url ?>" class="<?= $p==$page ? 'active' : '' ?>"><?= $p ?></a>
<?php endfor; ?></div>
<?php endif; ?></div>

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
<script src="../../../Util/Javascript/modal.js"></script>  
</body>
</html>