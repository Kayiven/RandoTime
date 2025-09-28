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
<?php require '../../Componet/navbar/navbar_v1.php';?>

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
<h2>Our Mission & Values</h2>
<div class="mission-cards">
<div class="card">
<h3>Adventure</h3>
<p>Delivering unique and safe hiking experiences.</p></div>
<div class="card">
<h3>Sustainability</h3>
<p>Committed to protecting the environment.</p></div>
<div class="card">
<h3>Community</h3>
<p>Building strong bonds with local communities.</p></div>
</div></section>

<!-- Timeline -->
<section class="timeline">
<h2>Our Story</h2>
<div class="timeline-container">
<div class="timeline-item" data-aos="fade-right">
<div class="timeline-year">2010</div>
<div class="timeline-content">
<h3>Founded</h3>
<p>EcoHike Adventures was born with a mission to reconnect people with nature.</p>
</div></div>
<div class="timeline-item">
<div class="timeline-year">2015</div>
<div class="timeline-content">
<h3>First International Trip</h3>
<p>We expanded beyond our local trails and guided our first group in Morocco.</p>
</div></div>
<div class="timeline-item">
<div class="timeline-year">2018</div>
<div class="timeline-content">
<h3>10,000+ Clients</h3>
<p>We reached a milestone by guiding over 10,000 adventurers safely.</p>
</div></div>
<div class="timeline-item">
<div class="timeline-year">2020</div>
<div class="timeline-content">
<h3>Recognition</h3>
<p>We were recognized as one of the top eco-friendly agencies worldwide.</p>
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
<h2>Nos Stats</h2>
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
<script src="../../../Util/Javascript/datalist.js"></script>  
</body>
</html>