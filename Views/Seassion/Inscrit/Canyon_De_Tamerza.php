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
<title>Canyon De Tamerza</title>
<link href="../../../Util/Stylesheet/navbar.css" rel="stylesheet">
<link href="../../../Util/Stylesheet/footer.css" rel="stylesheet">
<link href="../../../Util/Stylesheet/global.css" rel="stylesheet">
<link href="../../../Util/Stylesheet/sliders.css" rel="stylesheet">
<link href="../../../Util/Stylesheet/Reservation_Generator.css" rel="stylesheet">
</HEAD>

<BODY>
<!-- Rappler le taskbar dans Acceuil -->
<?php require '../../Componet/navbar/navbar_v3.php';?>

<!-- SLIDER -->
<div class="slider">
<div class="slide active"><img src="../../../Asset/Catagories/canyon_tamerza.webp" alt="Image 1"></div>
<div class="slide"><img src="../../../Asset/Catagories/canon tamza 2.jpg" alt="Image 2"></div>
<div class="slide"><img src="../../../Asset/Catagories/canon tamza 3.jpg" alt="Image 3"></div>
</div>

<!-- CONTAINER -->
<div class="container">
<h2>Réservation - Randonnée à Canyon De Tamerza</h2>

<!-- INFO SECTION -->
<div class="info">
<div class="info-item"><span>Date</span><BR><strong>2025-10-16</strong></div>
<div class="info-item"><span>Adultes</span><BR><strong>3</strong></div>
<div class="info-item"><span>Enfants</span><BR><strong>1</strong></div>
<div class="info-item"><span>Prix </span><BR><strong>130.00 TND</strong></div>
<div class="info-item"><span>Status </span><BR><strong>Online</strong></div>
</div>

<!-- TRANSPORT -->
<div class="transport">
<h3>Transport Disponible</h3>
<p>🚌 <strong>Bus</strong> collectif : Départ à 8h30 depuis Tunis centre.</p>
</div>

<!-- Food Information -->
<div class="transport">
<h3>Information</h3>
<p><strong>🥐 Matin</strong> : Café, jus d’orange, pain, confiture et œufs.</p>
<p><strong>🍲 Déjeuner</strong> : Salade tunisienne, couscous au poulet, fruits de saison.</p>
<p><strong>🍛 Dîner</strong> : Soupe, grillade mixte, dessert local, boisson comprise.</p>
</div>

<!--  Search with Filter   -->
<div class="search-container">
<div class="search-tabs">
</div>
<form action="./payment.php" method="post" class="search-fields">
<div class="field-group">
<label for="destination">Destination</label>
<input type="text" name="destination" value="Canyon De Tamerza" readonly>
</div>
<div class="field-group">
<label for="depart">Date de départ</label>
<input type="date" name="date_start" value="2025-10-16" readonly>
</div>
<div class="field-group">
<label for="Price">Prix</label>
<input type="text" name="price" value="130.00 TND" readonly>
</div>
<div class="field-group">
<label>Voyageurs</label>
<div class="person-select">
<input type="text" name="voyageurs" value="3 Adultes, 1 Enfants" readonly>
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
<input type="hidden" name="Adults" id="adulteInput" value="3">
<input type="hidden" name="Enfants" id="enfantInput" value="1">
<button type="submit" class="search-btn">Reserver</button>
</form></div></div>

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
<script src="../../../Util/Javascript/sliderv3.js"></script>  
<script src="../../../Util/Javascript/modal.js"></script>

</body>
</html>