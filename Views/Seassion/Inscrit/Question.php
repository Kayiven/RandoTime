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
<title>FAQ</title>
<link href="../../../Util/Stylesheet/navbar.css" rel="stylesheet">
<link href="../../../Util/Stylesheet/footer.css" rel="stylesheet">
<link href="../../../Util/Stylesheet/global.css" rel="stylesheet">
<link href="../../../Util/Stylesheet/faq.css" rel="stylesheet">
</HEAD>

<BODY>
<!-- Rappler le taskbar dans Acceuil -->
<?php require '../../Componet/navbar/navbar_v3.php';?>

<!-- Banner du Debut -->
<section class="hero">
<div class="hero-content">
<h1>Apropos de nous</h1>
<p>découvrez-nous dès aujourd'hui !</p>
</div></section>

<!-- Questione/Reponse -->
<h1 class="title-question3">Questions fréquentes</h1>
<div class="container-quest">
<div class="question-title"><span class="sp-green">+</span> Comment réserver une randonnée ?</div>
<p class="question-decription">Créez un compte, choisissez votre randonnée et suivez les instructions pour finaliser la réservation</p></div>
<div class="container-quest">
<div class="question-title"><span class="sp-green">+</span> Est-ce que les randonnées sont adaptées aux débutants ?</div>
<p class="question-decription">Oui, nous proposons différents niveaux de difficulté, clairement indiqués sur chaque fiche.</p></div>
<div class="container-quest">
<div class="question-title"><span class="sp-green">+</span> Pourquoi je ne reçois pas l’email de confirmation ?</div>
<p class="question-decription">Vérifier les spams, adresse correcte, etc.</p></div>
<div class="container-quest">
<div class="question-title"><span class="sp-green">+</span> Quels modes de paiement acceptez-vous ?</div>
<p class="question-decription">Carte bancaire, PayPal, Premier Card</p></div>
<div class="container-quest">
<div class="question-title"><span class="sp-green">+</span> Je n’arrive pas à me connecter, que faire ?</div>
<p class="question-decription">Réinitialisation de mot de passe ou contact support.</p></div>
<div class="container-quest">
<div class="question-title"><span class="sp-green">+</span> Comment puis-je contacter un guide ?</div>
<p class="question-decription">Une fois la réservation effectuée, vous recevrez les coordonnées de votre guide par email.</p></div>
<div class="container-quest">
<div class="question-title"><span class="sp-green">+</span> Puis-je annuler ma réservation ?</div>
<p class="question-decription">Oui, selon nos conditions d'annulation, vous pouvez annuler jusqu'à 48h avant la date prévue.</p></div>
<h1 class="title-Conseils3">Conseils fréquentes</h1>
<div class="container-quest">
<div class="question-title"><span class="sp-green">+</span> Comment prendre de belles photos en randonnée ?</div>
<p class="question-decription">Choisir les bonnes heures (matin/soir), penser au cadrage.</p></div>
<div class="container-quest">
<div class="question-title"><span class="sp-green">+</span> Comment se préparer physiquement avant une longue randonnée ?</div>
<p class="question-decription">Marcher régulièrement, s’habituer au port du sac, s’échauffer.</p></div>
<div class="container-quest">
<div class="question-title"><span class="sp-green">+</span> Que faire si la météo change soudainement ?</div>
<p class="question-decription">Toujours vérifier la météo avant de partir, prévoir un plan B.</p></div>
<div class="container-quest">
<div class="question-title"><span class="sp-green">+</span> Comment choisir la randonnée idéale pour moi ?</div>
<p class="question-decription">Évalue ton niveau, la distance, le dénivelé et la météo.</p></div>

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
<script src="../../../Util/Javascript/datalist1.js"></script>
  
</body>
</html>