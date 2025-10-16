<?php session_start();
// Verify if compte open or not !
if (!isset($_SESSION['id'])) {
header("Location: ../Invité/Login.php");
exit;
}

require_once '../../../DataBase/Configs/connection_db.php';

// Get values from users compte
$nom = $_SESSION['nom'];
$prenom = $_SESSION['prenom'];

// ✅ Fetch stats only for this user
$stmt = $pdo->prepare("
SELECT COUNT(*) AS total_payments, COALESCE(SUM(price), 0) AS total_amount
FROM Payments
WHERE nom = ? AND prenom = ?
");
$stmt->execute([$nom, $prenom]);
$stats = $stmt->fetch(PDO::FETCH_ASSOC);

// ✅ Fetch payment history only for this user
$stmt = $pdo->prepare("
SELECT id, localisation, payment_method, price, status, created_at
FROM Payments
WHERE nom = ? AND prenom = ?
");
$stmt->execute([$nom, $prenom]);
$payments = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE HTML>
<HTML lang="en">

<HEAD>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="Description" content="width=device-width, initial-scale=1">
<meta name="KeyWords" content="width=device-width, initial-scale=1">
<title>history Payement</title>
<link href="../../../Util/Stylesheet/navbar.css" rel="stylesheet">
<link href="../../../Util/Stylesheet/footer.css" rel="stylesheet">
<link href="../../../Util/Stylesheet/global.css" rel="stylesheet">
<link href="../../../Util/Stylesheet/sliders.css" rel="stylesheet">
<link href="../../../Util/Stylesheet/history_paym.css" rel="stylesheet">
</HEAD>

<BODY>
<!-- Rappler le taskbar dans Acceuil -->
<?php require '../../Componet/navbar/navbar_v3.php';?>

<!-- Dashboard -->
<div class="dashboard-wrapper">
<div class="sidebar">
<h2>Dashboard</h2>
<div class="category active">Controle</div>
<div class="submenu">
<a href="./Profile.php">View Profile</a>
<a href="./Commentaires.php">View commentaire</a>
</div>
<div class="category active">History</div>
<div class="submenu">
<a href="#" class="active">View Payement</a>
</div>
<div class="category active">Paramettre</div>
<div class="submenu">
<a href="../../../DataBase/Actions/disconnect-sys.php">Deconnection</a></div>
</div></div>

<!-- Main -->
<div class="main-content">
<h1>History Payements</h1>
<!-- Stats --> 
<div class="stats-container">
<div class="stat-card"> <h3>Total Payments</h3>
<p><?= $stats['total_payments']; ?></p>
</div> 
<div class="stat-card"> 
<h3>Total Amount</h3> 
<p><?= number_format($stats['total_amount'], 2); ?> TND</p>
</div> </div> 
<!-- Table --> 
<div class="table-container">
<h2>Recent Payments</h2>
<div class="table-scroll">
<table>
<thead><tr>
<th>ID</th>
<th>Localisation</th>
<th>Method</th>
<th>Price (TND)</th>
<th>Status</th>
<th>Date</th>
</tr></thead>
<tbody>
<?php if ($payments): ?>
<?php foreach ($payments as $payment): ?>
<tr>
<td><?= htmlspecialchars($payment['id']); ?></td>
<td><?= htmlspecialchars($payment['localisation']); ?></td>
<td><?= htmlspecialchars($payment['payment_method']); ?></td>
<td><?= number_format($payment['price'], 2); ?></td>
<td><?= htmlspecialchars($payment['status']); ?></td>
<td><?= htmlspecialchars($payment['created_at']); ?></td>
</tr>
<?php endforeach; ?>
<?php else: ?>
<tr>
<td colspan="6" style="text-align:center;">No payments found</td>
</tr>
<?php endif; ?>
</tbody></table></div>
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
<script src="../../../Util/Javascript/sliders-v2.js"></script>
<script src="../../../Util/Javascript/animation.js"></script>
<script src="../../../Util/Javascript/datalist1.js"></script>
<script src="../../../Util/Javascript/modal.js"></script>

</BODY>
</HTML>


</BODY>