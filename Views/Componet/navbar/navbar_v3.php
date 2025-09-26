<!-- Navbar::FlexNav -->
<div class="navbar_v1">
<img src="../../../Asset/FlexIcons/logo.svg" class="website_logo">
<ul class="list-v1">
<li><a href="../../Seassion/Invité/Acceuil.php">Acceuil</a></li>
<li><a href="../../Seassion/Invité/Apropos.php">Apropos</a></li>
<li><a href="../../Seassion/Invité/evenements.php">Destination</a></li>
<li><a href="../../Seassion/Invité/evenements.php">Événements</a></li>
<li><a href="../../Seassion/Invité/Galarie.php">Galarie</a></li>
<li><label class="more" onclick="more()" id="More">More</label></li></ul>
<!-- Navbar::FlexExtension -->
<ul class="list-v03">
<li class="search">
<span class="icon">🔍</span>
<input type="text" placeholder="Search..." id="searchInput" autocomplete="off"></li>
<div class="suggestions" id="suggestions"></div>
<li><img src="../../../Asset/FlexIcons/mode.png" class="profile-img"></li>
<li><img src="../../../Asset/FlexIcons/notification.png" class="notification_icon"></li>
<li><img src="../../../Asset/FlexIcons/profile_user.png" class="profile-img"></ul></div>
<!-- Navbar::Flexplus -->
<div class="box-flexplus" id="box-flexplus">
<ul class="list-v001">
<li><a href="../../Seassion/Invité/Contact.php">Contact</a></li>
<li><a href="../../Seassion/Invité/Faq.php">FAQ</a></li></ul></div>
<!-- Navbar::options -->
<div class="seasion-options" id="seasion-op">
<li class="seasion_email"><?php echo htmlspecialchars($_SESSION['email']); ?></li>
<li class="seasion_pic">
<img src="<?php echo htmlspecialchars($_SESSION['profile_image']); ?>" 
alt="Profile Picture" class="seasion-pic"></li>
<li class="seasion_nom">Welcome, <?php echo htmlspecialchars($_SESSION['nom']); ?> !</li>
<li><input type="submit" value="Parametre" class="li-txt1"></li>
<li><input type="submit" value="Disconnect" class="li-txt2"></li></div>