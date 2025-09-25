<?php
session_start(); 
if(
!isset($_SESSION['user_id'])||
!isset($_SESSION['nom'])||
!isset($_SESSION['email'])||
!isset($_SESSION['token'])){
// Not logged in correctly → redirect
header("Location: ../Invité/Login.php");   
exit;}?>

<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>Work</title>
</head>
<body>
 Welcome to page, <strong><?php echo htmlspecialchars($_SESSION['username']); ?></strong> 🎉
</body>
</html>