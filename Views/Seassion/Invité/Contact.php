<!DOCTYPE HTML>
<HTML lang="en">

<HEAD>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="Description" content="width=device-width, initial-scale=1">
<meta name="KeyWords" content="width=device-width, initial-scale=1">
<title>contact</title>
<link href="../../../Util/Stylesheet/navbar.css" rel="stylesheet">
<link href="../../../Util/Stylesheet/footer.css" rel="stylesheet">
<link href="../../../Util/Stylesheet/global.css" rel="stylesheet">
<link href="../../../Util/Stylesheet/contact.css" rel="stylesheet">
</HEAD>

<BODY>
<!-- Rappler le taskbar dans Acceuil -->
<?php require '../../Componet/navbar/navbar_v1.php';?>

<!-- Banner du Debut -->
<section class="hero">
<div class="hero-content">
<h1>Contact Nous</h1>
<p>demande nous vous besion</p>
</div></section>

<!-- Localisation Contact -->
<div class="contact-page">
<div class="map-container">
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3203.7861098765174!2d10.181533!3d36.806495!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1302e5b768b29055%3A0x7e5f0f3fa4dc6f66!2sTunis%2C%20Tunisie!5e0!3m2!1sfr!2stn!4v1711822500000!5m2!1sfr!2stn"  
allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe></div>

<!-- form Contact -->
<div class="contact-wrapper">
<div class="contact-form">
<h2>Contactez-nous</h2>
<form action="../../../DataBase/Actions/Contact-sys.php" method="post">
<div class="form-row">
<input type="text" name="nom" placeholder="Votre nom" required>
<input type="email" name="email" placeholder="Votre email" required></div>
<div class="form-row">
<input type="text" name="sujet" placeholder="Sujet" maxlength="30" required>
<input type="text" name="telephone" id="Price" maxlength="8" placeholder="Téléphone (optionnel)" required>
</div><div class="error-ctelehpone"></div>
<textarea name="message" rows="5" placeholder="Votre message..." maxlength="255" required></textarea>
<button type="submit">Envoyer</button></form></div>
<div class="contact-right">

<!-- Coordonnées -->
<div class="contact-details">
<h2>Nos coordonnées</h2>
<p>📍 Tunis, Passage</p>
<p>📧 Rando@gmail.com</p>
<p>📞 +216 22 555 444</p>
</div>

<!-- Social -->
<div class="social-box">
<h2>Nos SocialMedia</h2>
<a href="https://facebook.com" target="_blank" class="social-btn facebook">📘 Facebook</a>
<a href="https://instagram.com" target="_blank" class="social-btn instagram">📸 Instagram</a>
<a href="https://twitter.com" target="_blank" class="social-btn twitter">🐦 Twitter</a></div>
</div></div></div>
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
<script src="../../../Util/Javascript/modal.js"></script>
  
</body>
</html>