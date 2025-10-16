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
<title>Apropos</title>
<link href="../../../Util/Stylesheet/navbar.css" rel="stylesheet">
<link href="../../../Util/Stylesheet/footer.css" rel="stylesheet">
<link href="../../../Util/Stylesheet/global.css" rel="stylesheet">
<link href="../../../Util/Stylesheet/apropos.css" rel="stylesheet">
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

<!--  Information history -->
<div class="about-section">
<h2 class="about-title">Notre Agence</h2>
<div class="about-content">
<img src="../../../Asset/Catagories/agence1.webp" alt="Randonnée" class="about-image">
<div class="about-text">
<p>Chez RondoTime, nous croyons que chaque randonnée est une aventure à vivre pleinement. Notre mission est de faciliter
l’exploration des plus beaux sentiers, en mettant à disposition des parcours sélectionnés, des conseils pratiques et une
communauté engagée. Que vous soyez débutant ou passionné, RondoTime vous accompagne pour faire de chaque sortie un
moment inoubliable au cœur de la nature.</p>
</div></div></div>
<div class="about-section">
<div class="about-content reverse">
<div class="about-text">
<p>Chez RondoTime, nous proposons une variété d’activités en pleine nature adaptées à tous les niveaux. De la randonnée
pédestre aux balades en famille, chaque parcours est pensé pour offrir une expérience unique. Nous mettons également en
avant des sorties thématiques comme la découverte de la faune, des randonnées au coucher du soleil ou encore des
circuits culturels à travers les <br>paysages tunisiens.</p></div>
<img src="../../../Asset/Catagories/agence2.jpg" alt="Randonnée" class="about-image">
</div></div>
<div class="about-section">
<div class="about-content">
<img src="../../../Asset/Catagories/agence1.webp" alt="Randonnée" class="about-image">
<div class="about-text">
<p>Chez RondoTime, nous croyons que chaque randonnée est une aventure à vivre pleinement. Notre mission est de faciliter
l’exploration des plus beaux sentiers, en mettant à disposition des parcours sélectionnés, des conseils pratiques et une
communauté engagée. Que vous soyez débutant ou passionné, RondoTime vous accompagne pour faire de chaque sortie un
moment inoubliable au cœur de la nature.</p>
</div></div></div>

<!-- Mission and Values -->
<section class="mission">
<h2>Notre Mission Et Nos Valeurs</h2>
<div class="mission-cards">
<div class="card">
<h3>Adventure</h3>
<p>Offrir des expériences de randonnée uniques et sécurisées.</p></div>
<div class="card">
<h3>Durabilité</h3>
<p>Engagé à protéger l'environnement.</p></div>
<div class="card">
<h3>Communauté</h3>
<p>Établir des liens solides avec les communautés locales.</p></div>
</div></section>

<!-- Timeline -->
<section class="timeline">
<h2>Notre histoire</h2>
<div class="timeline-container">
<div class="timeline-item" data-aos="fade-right">
<div class="timeline-year">2010</div>
<div class="timeline-content">
<h3>Fondé</h3>
<p>RandoTime Adventures est née avec pour mission de reconnecter les gens à la nature.</p>
</div></div>
<div class="timeline-item">
<div class="timeline-year">2015</div>
<div class="timeline-content">
<h3>Premier voyage international</h3>
<p>Nous avons élargi nos horizons au-delà de nos sentiers locaux et avons guidé notre premier groupe en Tunisie.</p>
</div></div>
<div class="timeline-item">
<div class="timeline-year">2018</div>
<div class="timeline-content">
<h3>10,000+ Clients</h3>
<p>Nous avons atteint une étape importante en guidant plus de 10 000 aventuriers en toute sécurité.</p>
</div></div>
<div class="timeline-item">
<div class="timeline-year">2020</div>
<div class="timeline-content">
<h3>Reconnaissance</h3>
<p>Nous avons été reconnus comme l'une des principales agences Randonnée au monde.</p>
</div></div>
</div></section>

<!-- Stats Section -->
<?php require_once __DIR__ . '/../../../database/Configs/connection_db.php';
$stats = [ 'visiteurs' => 0, 'inscriptions' => 0, 'commentaires' => 0 ];
if ($pdo) {try {
$stats['visiteurs'] = $pdo->query("SELECT COUNT(*) FROM compte")->fetchColumn();
$stats['inscriptions'] = $pdo->query("SELECT COUNT(*) FROM compte")->fetchColumn();
$stats['commentaires'] = $pdo->query("SELECT COUNT(*) FROM Avis_participants")->fetchColumn();
} catch (Exception $e) {
error_log("⚠️ Stats query failed: " . $e->getMessage()); }}?>
<section class="stats">
<h2>Nos statistiques</h2>
<div class="stats-cards">
<div class="card">
<h3><?= htmlspecialchars($stats['visiteurs']) ?></h3>
<p>Visiteurs</p></div>
<div class="card" >
<h3><?= htmlspecialchars($stats['inscriptions']) ?></h3>
<p>Inscriptions</p></div>
<div class="card">
<h3><?= htmlspecialchars($stats['commentaires']) ?></h3>
<p>Commentaires</p></div>
</div></section>

=<!-- Equipe de web -->
<section class="team">
<h2>Notre Equipe</h2>
<div class="team-container">
 
<!-- Ligne Devs -->
<div class="team-row">
<div class="member">
<img src="../../../Asset/Catagories/dev2.jpg" alt="John Doe">
<h4>John Doe</h4>
<p>Front-end Developer</p></div>
<div class="member">
<img src="../../../Asset/Catagories/dev1.jpg" alt="Jane Smith">
<h4>Emily Smith</h4>
<p>Front-end Developer</p></div>
<div class="member">
<img src="../../../Asset/Catagories/dev3.jpg" alt="Alex Johnson">
<h4>Alex Johnson</h4>
<p>Back-end Developer</p></div>
<div class="member">
<img src="../../../Asset/Catagories/dev7.jpg" alt="Emily Davis">
<h4>Amine lakhnech</h4>
<p>Back-end Developer</p>
</div></div>

<!-- Ligne UI/Desgin -->
<div class="team-row">
<div class="member">
<img src="../../../Asset/Catagories/dev6.jpg" alt="Michael Brown">
<h4>Alia Brown</h4>
<p>Wordpress Designer</p></div>
<div class="member" >
<img src="../../../Asset/Catagories/dev5.jpg" alt="Sarah Wilson">
<h4>Sarah Wilson</h4>
<p>Wordpress Designer</p></div>
<div class="member">
<img src="../../../Asset/Catagories/dev4.PNG" alt="David Lee">
<h4>David Lee</h4>
<p>UI Designer</p></div>
<div class="member" >
<img src="../../../Asset/Catagories/dev8.jpg" alt="Anna Kim">
<h4>Ameni Bouazza</h4>
<p>UI Designer</p>
</div></div>
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
</body>
</html>