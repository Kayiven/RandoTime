<?php session_start();?>

<!DOCTYPE HTML>
<HTML lang="en">

<HEAD>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="Description" content="width=device-width, initial-scale=1">
<meta name="KeyWords" content="width=device-width, initial-scale=1">
<title>Inscription</title>
<link href="../../../Util/Stylesheet/navbar.css" rel="stylesheet">
<link href="../../../Util/Stylesheet/footer.css" rel="stylesheet">
<link href="../../../Util/Stylesheet/global.css" rel="stylesheet">
<link href="../../../Util/Stylesheet/inscription.css" rel="stylesheet">
<link href="../../../Util/Stylesheet/error.css" rel="stylesheet">
</HEAD>

<BODY>
<!-- Rappler le taskbar dans Acceuil -->
<?php require '../../Componet/navbar/navbar_v2.php';?>

<!-- Formulaire of Inscription  -->
<div class="background_form">
<div class="login_formulaire">
<div class="text_1">Inscripter Vous De</div>
<div class="text_2">Ce moments</div>

<form action="../../../DataBase/Actions/Inscription-sys.php" method="post" class="form-grid">
<div class="form-group">
<label class="label">Premier nom</label>
<input type="text" name="register-nom" placeholder="Sasir votre nom (oubligatoir)">
<div class="error-nom"><?= isset($_SESSION['error-nom']) ? htmlspecialchars($_SESSION['error-nom']) : '' ?>
</div></div>

<div class="form-group">
<label class="label">Dernier prenom</label>
<input type="text" name="register-prenom" placeholder="Sasir votre prenom (oubligatoir)">
<div class="error-prenom"><?= isset($_SESSION['error-prenom']) ? htmlspecialchars($_SESSION['error-prenom']) : '' ?>
</div></div>

<div class="form-group full-width">
<label class="label">Email</label>
<div class="email-wrapper">
<input type="text" name="register-email" placeholder="Saisir votre email (obligatoire)">
    
<!-- hidden input for full email -->
<input type="hidden" name="register-full-email" id="register-full-email">

<!-- custom dropdown -->
<div class="custom-select">
<div class="selected" data-value="@gmail.com">@gmail.com</div>
<div class="options">
<div data-value="@gmail.com">@gmail.com</div>
<div data-value="@yahoo.fr">@yahoo.fr</div>
<div data-value="@outlook.com">@outlook.com</div>
</div></div></div>
<div class="error-email"><?= isset($_SESSION['error-email']) ? htmlspecialchars($_SESSION['error-email']) : '' ?>
</div></div>

<div class="form-group">
<label class="label">Mot de passe</label>
<input type="password" name="register-password" placeholder="Sasir votre Mot de pass (oubligatoir)">
<div class="error-pwd"><?= isset($_SESSION['error-pwd']) ? htmlspecialchars($_SESSION['error-pwd']) : '' ?>
</div></div>

<div class="form-group ">
<label class="label">Confirmer le mot de passe</label>
<input type="password" name="register-confirm-password" placeholder="Confirm le mot de passe (oubligatoir)">
<div class="error-pwd"><?= isset($_SESSION['error-pwd']) ? htmlspecialchars($_SESSION['error-pwd']) : '' ?>
</div></div>

<!-- custom radio -->
<div class="form-group">
<label class="label">Sexe</label>
<div class="radio-group" id="genderGroup">
<label class="radio-option">
<input type="radio" name="gender" value="male" checked>
<span class="custom-radio">Homme</span></label>

<label class="radio-option">
<input type="radio" name="gender" value="female">
<span class="custom-radio">Femme</span></label>
</div></div>

<div class="form-group">
<label class="label">Date de naissance</label>
<div class="birthday-group">
<!-- Day -->
<select name="birth-day" class="birthday-select" required>
<option value="" hidden>DD</option>
<?php for ($d = 1; $d <= 31; $d++): ?>
<option value="<?= $d ?>"><?= $d ?></option>
<?php endfor; ?>
</select>

<!-- Month -->
<select name="birth-month" class="birthday-select" required>
<option value="" hidden>MM</option>
<?php
$months = [
1 => 'Jan', 2 => 'Feb', 3 => 'Mar', 4 => 'Apr',
5 => 'May', 6 => 'Jun', 7 => 'Jul', 8 => 'Aug',
9 => 'Sep', 10 => 'Oct', 11 => 'Nov', 12 => 'Dec'];
foreach ($months as $num => $name):?>
<option value="<?= $num ?>"><?= $name ?></option>
<?php endforeach; ?>
</select>

<!-- Year -->
<select name="birth-year" class="birthday-select" required>
<option value="" hidden >YYYY</option>
<?php for ($y = date('Y'); $y >= 1900; $y--): ?>
<option value="<?= $y ?>"><?= $y ?></option>
<?php endfor; ?>
</select></div></div>

<div class="form-group full-width">
<label class="label">Téléphone</label>
<div class="phone-wrapper">
<input type="text" class="phone-code" name="register-phone-extension" value="+216" readonly>
<input type="tel" name="register-phone" placeholder="Sasir votre telephone (oubligatoire)" 
maxlength="8" pattern="[0-9]{8}" required>
</div></div>
<div class="error-phone"><?= isset($_SESSION['error-phone']) ? htmlspecialchars($_SESSION['error-phone']) : '' ?></div>

<!-- custom Checkbox -->
<div class="form-group full-width">
<label class="checkbox-container">
<input type="checkbox" name="terms" required>
<span class="custom-checkbox"></span>
<span class="checkbox-label">J’accepte les termes et conditions</span>
</label></div>     

<div class="form-group full-width">
<button type="submit" class="connection" name="Inscription">Connexion</button>
<div class="form-group full-width">
<span class="compte">Vous avez deja compte ? <a href ="../Invité/Login.php">Connection</a></span>
<div id="alert-failed" class="Failed <?= !empty($_SESSION['Failed']) ? 'show' : '' ?>">
<?= $_SESSION['Failed'] ?? '' ?></div>
</div></div>
</div></form></div></div></div>

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
<script src="../../../Util/Javascript/alert.js"></script>

<!-- unset all error after refresh -->
<?php unset(
$_SESSION['error-nom'],
$_SESSION['error-prenom'],
$_SESSION['error-email'],
$_SESSION['error-pwd'],
$_SESSION['error-phone'],
$_SESSION['success'],
$_SESSION['Failed']);?>

</BODY>
</HTML>
