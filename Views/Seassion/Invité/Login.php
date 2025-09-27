<?php
session_start();

// Destroy session if user goes back to login/registration
if (isset($_SESSION['id'])) {
session_unset();
session_destroy();
}?>

<!DOCTYPE HTML>
<HTML lang="en">

<HEAD>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="Description" content="width=device-width, initial-scale=1">
<meta name="KeyWords" content="width=device-width, initial-scale=1">
<title>Acceuil ( RT )</title>
<link href="../../../Util/Stylesheet/navbar.css" rel="stylesheet">
<link href="../../../Util/Stylesheet/footer.css" rel="stylesheet">
<link href="../../../Util/Stylesheet/global.css" rel="stylesheet">
<link href="../../../Util/Stylesheet/login.css" rel="stylesheet">
<link href="../../../Util/Stylesheet/error.css" rel="stylesheet">
</HEAD>

<BODY>
<!-- Rappler le taskbar dans Acceuil -->
<?php require '../../Componet/navbar/navbar_v2.php';?>

<!-- Formulaire Background  -->
<div class="background_form">

<!-- Formulaire of login  -->
<div class="login_formulaire">
<div class="text_1">Welcome To</div>
<div class="text_2">The Login</div>
<form action="../../../DataBase/Actions/login-in-sys.php" method="post">
<label class="label">Username / Email</label>
<input type="text" name="username" placeholder="Sasir votre username/email">
<div class="login-nom-error"><?= isset($_SESSION['login-nom-error']) ? htmlspecialchars($_SESSION['login-nom-error']) : '' ?></div>
<label class="label">Password</label>
<input type="password" name="password" placeholder="Sasir votre password">
<div class="login-pwd-error"><?= isset($_SESSION['login-pwd-error']) ? htmlspecialchars($_SESSION['login-pwd-error']) : '' ?></div>
<a href="./Oublier.php" class="Forget">Did you forget you pasword ?</a>
<button type="submit" class="connection">Connexion</button>
<button type="submit" class="Creation" formaction="../Invité/Inscription.php">Cree votre compte</button>
</form>

<!-- Social login -->
<div class="social-login">
<div class="divider"><span>Ou Login avec</span></div>
<div class="social-buttons">
<button class="reddit" onclick="window.location.href='https://www.reddit.com/login'">
<img src="../../../Asset/FlexIcons/reddit.png" alt="reddit">Reddit</button>
<button class="facebook" onclick="window.location.href='https://www.facebook.com/login'">
<img src="../../../Asset/FlexIcons/Facebook.png" alt="Facebook"> Facebook</button>
<button class="Gmail" onclick="window.location.href='https://accounts.google.com/'">
<img src="../../../Asset/FlexIcons/gmail.png" alt="Gmail"> Gmail</button>
</div><div id="alert-success" class="success <?= !empty($_SESSION['success']) ? 'show' : '' ?>">
<?= $_SESSION['success'] ?? '' ?></div></div>
</div></div>

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
<script src="../../../Util/Javascript/animation.js"></script>
<script src="../../../Util/Javascript/dropdown.js"></script>
<script src="../../../Util/Javascript/alert.js"></script>

<?php unset(
$_SESSION['login-nom-error'],
$_SESSION['login-pwd-error'],
$_SESSION['success']);?>

</BODY>
</HTML>


