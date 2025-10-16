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
<title>Dashboard Database</title>
<link href="../../../Util/Stylesheet/navbar.css" rel="stylesheet">
<link href="../../../Util/Stylesheet/footer.css" rel="stylesheet">
<link href="../../../Util/Stylesheet/global.css" rel="stylesheet">
<link href="../../../Util/Stylesheet/sliders.css" rel="stylesheet">
<link href="../../../Util/Stylesheet/Dashboard-Admin.css" rel="stylesheet"> 
</HEAD>

<BODY>
<!-- Rappler le taskbar dans Acceuil -->
<?php require '../../Componet/navbar/navbar_v3.php';?>

<!-- Dashboard -->
<div class="dashboard-wrapper">
  <div class="sidebar">
    <h2>Dashboard</h2>
    <div class="category active">DataBase</div>
    <div class="submenu">
      <a href="./Dashboard-Admin.php" >View Comptes</a>
      <a href="./Dashboard-Contact.php" >View Contact</a>
      <a href="./Dashboard-payements.php">View Payements</a>
    </div>
    <div class="category active">Creation</div>
    <div class="submenu">
      <a href="./Dashboard-CreateData.php" class="active">Create Database</a>
    </div>
    <div class="category active">Paramettre</div>
    <div class="submenu">
      <a href="../../../DataBase/Actions/disconnect-sys.php">Deconnection</a>
    </div>
</div>

  <!-- Main Content Next to Sidebar -->
<div class="db-content">
  <h2 class="db-title">⚙️ Database Tools</h2>

  <div class="db-actions">
    <!-- Create Database Form -->
    <form action="../../../DataBase/Configs/creation_base.php" method="post">
      <button type="submit" class="db-btn db-create">Create Database</button>   
      <p>Button pour creation du Randotime Database</p>
   
    </form>

    <!-- Create Tables Form -->
    <form action="../../../DataBase/Configs/create_tables.php" method="post">
      <button type="submit" class="db-btn db-tables" disabled>Create Tables</button>
      <p>Button pour creation les Tables du baseDonnee</p>
    </form>
 </div>
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

</BODY>
</HTML>