<?php
session_start();
require_once './connection_db.php'; 

// Verify if compte open or not !
if (!isset($_SESSION['id'])) {
header("Location: ../Invité/Login.php");
exit;
}

$Avis_participants = file_get_contents(__DIR__ . '/../Tables/Avis_participants.sql');
$Contact = file_get_contents(__DIR__ . '/../Tables/Contact.sql');
$Daily_quotes = file_get_contents(__DIR__ . '/../Tables/Daily_quotes.sql');
$filter_page = file_get_contents(__DIR__ . '/../Tables/filter_page.sql');
$Galarie_activité = file_get_contents(__DIR__ . '/../Tables/Galarie_activité.sql');
$Galarie_picture = file_get_contents(__DIR__ . '/../Tables/Galarie_picture.sql');
$Payments = file_get_contents(__DIR__ . '/../Tables/Payments.sql');
$plus_promo = file_get_contents(__DIR__ . '/../Tables/plus_promo.sql');
$Plus_visiter = file_get_contents(__DIR__ . '/../Tables/Plus_visiter.sql');
$Pr_compte = file_get_contents(__DIR__ . '/../Tables/Pr_compte.sql');
$Sc_partenair = file_get_contents(__DIR__ . '/../Tables/Sc_partenair.sql');


try {

$pdo->exec("USE randotime");

$sqlFiles = [
$Avis_participants,
$Contact,
$Daily_quotes,
$filter_page,
$Galarie_activité,
$Galarie_picture,
$Payments,
$plus_promo,
$Plus_visiter,
$Pr_compte,
$Sc_partenair ];

foreach ($sqlFiles as $sql) {
if ($sql) {
 $pdo->exec($sql);

}}

 echo "<script>
alert('✅ Tables créées avec succès dans Randotime !');
window.location.href='../../Views/Seassion/Admin/Dashboard-CreateData.php';
</script>";

} catch (PDOException $e) {
echo "<script>
alert('❌ Erreur: " . addslashes($e->getMessage()) . "');
window.location.href='../../Views/Seassion/Admin/Dashboard-CreateData.php';
</script>";
}