<?php
session_start(); if(
!isset($_SESSION['user_id'])||
!isset($_SESSION['nom'])||
!isset($_SESSION['email'])||
!isset($_SESSION['token'])){
header("Location: ../Invité/Login.php");   
exit;}?>

<!DOCTYPE HTML>
<HTML lang="en">

<HEAD>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="Description" content="width=device-width, initial-scale=1">
<meta name="KeyWords" content="width=device-width, initial-scale=1">
<title>Acceuil</title>
<link href="../../../Util/Stylesheet/navbar.css" rel="stylesheet">
<link href="../../../Util/Stylesheet/footer.css" rel="stylesheet">
<link href="../../../Util/Stylesheet/global.css" rel="stylesheet">
<link href="../../../Util/Stylesheet/sliders.css" rel="stylesheet">
<link href="../../../Util/Stylesheet/acceuil.css" rel="stylesheet">
</HEAD>

<!-- Rappler le taskbar dans Acceuil -->
<?php require '../../Componet/navbar/navbar_v3.php';?>

<body>
 Welcome to page, <strong><?php echo htmlspecialchars($_SESSION['nom']); ?></strong> 🎉
</body>
</html>