<?php session_start();
// Verify if compte open or not !
if (!isset($_SESSION['id'])) {
header("Location: ../Invité/Login.php");
exit;
}

// payment.php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
$destination = $_POST['destination'] ?? '';
$date_start = $_POST['date_start'] ?? '';
$price = $_POST['price'] ?? '';
$voyageurs = $_POST['voyageurs'] ?? '';
$adults = $_POST['Adults'] ?? '';
$children = $_POST['Enfants'] ?? '';
} else {
header("Location: index.php");
exit;
}?>

<!DOCTYPE HTML>
<HTML lang="en">

<HEAD>
<meta charset="UTF-8">
<title>Paiement - <?= htmlspecialchars($destination) ?></title>
<link href="../../../Util/Stylesheet/navbar.css" rel="stylesheet">
<link href="../../../Util/Stylesheet/footer.css" rel="stylesheet">
<link href="../../../Util/Stylesheet/global.css" rel="stylesheet">
<link href="../../../Util/Stylesheet/payment.css" rel="stylesheet">
</HEAD>

<BODY>

<!-- Rappler le taskbar dans Acceuil -->
<?php require '../../Componet/navbar/navbar_v3.php';?>

<div class="payment-container">
<h2>💳 Confirmation de Paiement</h2>

<div class="detail"><span>Destination :</span><strong><?= htmlspecialchars($destination) ?></strong></div>
<div class="detail"><span>Date de départ :</span><strong><?= htmlspecialchars($date_start) ?></strong></div>
<div class="detail"><span>Voyageurs :</span><strong><?= htmlspecialchars($voyageurs) ?></strong></div>
<div class="detail"><span>Adultes :</span><strong><?= htmlspecialchars($adults) ?></strong></div>
<div class="detail"><span>Enfants :</span><strong><?= htmlspecialchars($children) ?></strong></div>
<div class="total">Total : <?= htmlspecialchars($price) ?></div>

<form action="./process_payment.php" method="post">
<input type="hidden" name="destination" value="<?= htmlspecialchars($destination) ?>">
<input type="hidden" name="amount" value="<?= htmlspecialchars($price) ?>">

<!-- PAYMENT METHOD SECTION -->
<div class="payment-method">
<h3>💰 Choisissez votre mode de paiement</h3>

<div class="payment-options">
<label class="payment-option">
<input type="radio" name="payment_method" value="Carte_bancaire" required>
<span>💳 Credit Card</span>
</label>

<label class="payment-option">
<input type="radio" name="payment_method" value="PayPal">
<span>🧾 PayPal</span>
</label>

<label class="payment-option">
<input type="radio" name="payment_method" value="Visa">
<span>💳 Visa</span>
</label>
</div></div>

<button type="submit" class="pay-btn">Procéder au paiement</button>
</form></div>

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
<script src="../../../Util/Javascript/datalist1.js"></script>
<script src="../../../Util/Javascript/dropdown.js"></script>

</BODY>
</HTML>