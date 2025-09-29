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
</HEAD>

<BODY>
<!-- Rappler le taskbar dans Acceuil -->
<?php require '../../Componet/navbar/navbar_v3.php';?>