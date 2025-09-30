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

<div class="container_filter">
    <!-- title of filter -->
    <div class="container_tab">
        <div class="Name_filter">By Filter</div>
        <div class="Name_filter1">Name</div>
        <input type="text" placeholder="Saisir le nom emplacement!" class="recherche_place" name="name">
    </div>
    <hr class="space">

    <!-- stars categorie -->
    <div class="container_stars">
        <div class="Name-stars">Stars</div>
        <label><input type="checkbox" name="stars[]" value="all"> All</label><br>
        <label><input type="checkbox" name="stars[]" value="1"> 1 star</label><br>
        <label><input type="checkbox" name="stars[]" value="2"> 2 stars</label><br>
        <label><input type="checkbox" name="stars[]" value="3"> 3 stars</label><br>
        <label><input type="checkbox" name="stars[]" value="4"> 4 stars</label><br>
        <label><input type="checkbox" name="stars[]" value="5"> 5 stars</label>
    </div>
    <hr class="space">

    <!-- Date categorie -->
    <div class="container-date">
        <div class="Name-date">Date</div>
        <input type="date" name="date_start">
    </div>
    <hr class="space">

    <!-- Price categorie -->
    <div class="container-price">
        <div class="Name-price">Price</div>
        <input type="text" name="price" id="Price">
    </div>
    <hr class="space">

    <button type="submit" id="filterBtn">Appliquer</button>
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
<script src="../../../Util/Javascript/modal.js"></script>  
</body>
</html>