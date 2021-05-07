<?php
if (!isset($_SESSION['id']))
	header('location: ' . URLROOT . '/index');
if (!isset($data['tab']))
	header('location: ' . URLROOT . '/users/afficherList');
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<title>Brainstormers</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>
	<script src="https://unpkg.com/feather-icons"></script>
	<link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/style.css" />
	<link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/profile.css" />
	<link rel="shortcut icon" href="<?php echo URLROOT ?>/public/img/logo.png" type="image/x-icon">
</head>

<body>
	<div id="loading"><img src="<?php echo URLROOT ?>/public/img/logo.png" alt="loader" class="loader" height="300px">
	</div>
	<!--wrapper start-->
	<div class="wrapper collapse">
		<!--header menu start-->
		<header>
			<div id="stars"></div>
			<div id="stars2"></div>
			<div id="stars3"></div>
			<div class="left_area">
				<h3>Zoo <span>Pro</span></h3>
			</div>
			<div class="sidebar-btn">
				<i class="fas fa-bars"></i>
			</div>
			<div class="right_area">
				<a href="#" id="themeButton">
					<i class="themebtn" data-feather="sun"></i>
				</a>
			</div>
		</header>
		<!--header menu end-->
		<!--sidebar start-->
		<div class="sidebar">
			<div class="sidebar-menu">
				<li class="logo">
					<img src="<?php echo URLROOT ?>/public/img/logo.png" alt="logo" />
				</li>
				<li class="item">
					<a href="<?php echo URLROOT ?>/pages/dashboard" class="menu-btn">
						<i class="fas fa-chart-line"></i><span> Dashboard</span>
					</a>
				</li>
				<li class="item active">
					<a href="<?php echo URLROOT ?>/pages/usersV" class="menu-btn">
						<i class="fas fa-user-circle"></i><span> Profile</span>
					</a>
				</li>
				<li class="item">
					<a href="<?php echo URLROOT ?>/pages/employes" class="menu-btn">
						<i class="fas fa-user-friends"></i><span>Employés</span>
					</a>
				</li>
				<li class="item " id="profile">
					<a href="#" class="menu-btn profilebtn">
						<i class="fas fa-paw"></i><span> Animaux<i class="fas fa-chevron-down drop-down"></i></span>
					</a>
					<div class="sub-menu-profile">
						<a href="<?php echo URLROOT ?>/pages/animaux"><i class="fas fa-hippo"></i><span>Animaux</span></a>
						<a href="<?php echo URLROOT ?>/pages/regime"><i class="fas fa-bone"></i><span>Régime
								alimentaire</span></a>
					</div>
				</li>

				<li class="item" id="messages">
					<a href="#" class="menu-btn">
						<i class="fas fa-leaf"></i><span>Végetation<i class="fas fa-chevron-down drop-down"></i></span>
					</a>
					<div class="sub-menu-messages">
						<a href="<?php echo URLROOT ?>/pages/plante"><i class="fas fa-seedling"></i><span>Plantes</span></a>
						<a href="<?php echo URLROOT ?>/pages/espece"><i class="fas fa-tree"></i><span>Espéce
								vegetale</span></a>
					</div>
				</li>
				<li class="item" id="settings">
					<a href="#" class="menu-btn">
						<i class="fas fa-igloo"></i><span>Enclos<i class="fas fa-chevron-down drop-down"></i></span>
					</a>
					<div class="sub-menu-settings">
						<a href="<?php echo URLROOT ?>/pages/enclos"><i class="fas fa-dungeon"></i><span>Enclos</span></a>
						<a href="<?php echo URLROOT ?>/pages/typeEnclos"><i class="fas fa-landmark"></i><span>TypeEnclos</span></a>
					</div>
				</li>
				<li class="item" id="event">
					<a href="#" class="menu-btn">
						<i class="fas fa-calendar-alt"></i><span> Evénements<i class="fas fa-chevron-down drop-down"></i></span>
					</a>
					<div class="sub-menu-events">
						<a href="<?php echo URLROOT ?>/pages/evenement"><i class="fas fa-calendar-day"></i><span>Evenement</span></a>
						<a href="<?php echo URLROOT ?>/pages/sponsor"><i class="fas fa-hand-holding-usd"></i><span>Sponsor</span></a>
					</div>
				</li>
				<li class="item">
					<a href="<?php echo URLROOT; ?>/users/logout" class="menu-btn">
						<i class="fas fa-sign-out-alt"></i><span> Logout</span>
					</a>
				</li>
			</div>
		</div>
		<!--sidebar end-->
		<!--main container start-->
		<div class="main-container">
			<form method="POST" action="<?php echo URLROOT; ?>/users/deleteUpdatePic" class="card" style="max-width: 700px;margin-left: 50%;transform: translate(-50%);display:flex;flex-direction: column;justify-content: center;align-items: center;">
				<div style="display: flex;flex-direction:column;justify-content: space-evenly;align-items: center;">
					<h2 style="margin-bottom: 20px;color: var(--accent);">Welcome back!</h2>
					<div class="profilePic" style="background-image: url('<?php echo URLROOT; ?>/img/<?php echo $_SESSION['image']; ?>');"></div>
					<div style="display: flex;flex-direction:column;">
						<label  for="file" class="label-file">Choisir une image</label>
						<input type="file" id="file" name="file" class="input-file"	accept="image/x-png,image/gif,image/jpeg">

					</div>
				</div>
				<div style="margin-top: 10px;display:flex;">
					<input name="save" type="submit" class="btn" value="Sauvegarder" style="margin-right: 1%;" />
					<input name="delete" type="submit" class="btn" value="Supprimer" style="margin-left: 1%;" />
				</div>
			</form>
			<div class="updatePass">
				<form class="card profile" method="POST" action="<?php echo URLROOT; ?>/users/deleteUpdate">
					<p class="sectionTitle">Mon profile</p>
					<div class="input-field one">
						<i class="fas fa-user"></i>
						<input type="text" placeholder="Username" name="username" value='<?php echo $_SESSION['username']; ?>' required />
					</div>
					<div class="input-field two">
						<i class="fas fa-envelope"></i>
						<input type="text" placeholder="Email" name="email" value="<?php echo $_SESSION['email']; ?>" required />
					</div>
					<div class="input-field three">
						<i class="fas fa-lock"></i>
						<input type="password" placeholder="Old Password" name="password" required />
					</div>

					<p id="error-msg"><?php if (isset($data['error'])) {
											echo $data['error'];
										} ?></p>
					<div class="btn-div">
						<input name="update" type="submit" class="btn" value="Sauvegrader" style="margin-right:2%" />
						<input name="delete" type="submit" class="btn" value="Supprimer" />
					</div>
				</form>
				<form class="card pass" method="POST" action="<?php echo URLROOT; ?>/users/updatePass">
					<p class="sectionTitle">Mot de passe</p>
					<div class="input-field one">
						<i class="fas fa-lock"></i>
						<input id="card-newPass" type="password" placeholder="Password" name="password" required />
					</div>
					<div class="input-field two">
						<i class="fas fa-lock"></i>
						<input id="card-confirmPass" type="password" placeholder="Confirm Password" name="confirmPassword" required />
					</div>
					<div class="input-field three">
						<i class="fas fa-lock"></i>
						<input type="password" placeholder="Old Password" name="oldPassword" required />
					</div>
					<p id="error-msgPass"><?php if (isset($data['errorPass'])) {
												echo $data['errorPass'];
											} ?></p>
					<div class="btn-div">
						<input name="update" type="submit" class="btn" value="Changer" id="card-changerPass" />
					</div>
				</form>
			</div>

			<div class="container">
				<div class="error-table">
					<?php if (isset($data['errorUpdate'])) {
						echo $data['errorUpdate'];
					} ?>
				</div>
				<div style="display: flex;">
					<button class="triButton"><i class="fas fa-align-left"></i>
						<p>Filtres</p>
					</button>
					<div class="input-field" style="margin-left: 10%;position: relative;width:100%;">
						<i class="fas fa-search"></i>
						<input style="overflow: hidden;" id="rechercher" type="text" placeholder="Rechercher par nom d'utilisateur" name="Rechercher" />
					</div>
				</div>
				<div class="triAndFilter">
					<div class="card" style="position: relative;display:flex;justify-content: space-evenly;">
						<div class="tri">
							<h3>Tri</h3>
							<a href="<?php echo URLROOT; ?>/users/trier/ID">ID</a>
							<a href="<?php echo URLROOT; ?>/users/trier/USERNAME">USERNAME</a>
							<a href="<?php echo URLROOT; ?>/users/trier/EMAIL">EMAIL</a>
							<a href="<?php echo URLROOT; ?>/users/trier/ROLE_ID">ROLE</a>
						</div>
						<div class="filter">
							<h3>Filtre</h3>
							<a href="<?php echo URLROOT; ?>/users/filtrer/admin">ADMIN</a>
							<a href="<?php echo URLROOT; ?>/users/filtrer/utilisateur">UTILISATEUR</a>
						</div>
						<div class="removeFT">
							<a style="font-weight: 800;" href="<?php echo URLROOT; ?>/users/filtrer/afficherList">Supprimer les filtres</a>
						</div>
					</div>
				</div>
				<ul class="responsive-table">
					<li class="table-header">
						<div class="col col-1">ID</div>
						<div class="col col-2">Username</div>
						<div class="col col-3">Email</div>
						<div class="col col-4">Role</div>
						<div class="col col-5">
						</div>
					</li>
					<?php echo $data['tab']; ?>

				</ul>
				<div class="overlay">
					<div class="popup">
						<a class="close" href="#">&times;</a>
						<form class="content" action="<?php echo URLROOT; ?>/users/deleteUpdateTab" method="POST">
							<h2>Modifier ce profile</h2>
							<input type="text" placeholder="id" name="id" style="display: none;" class="id-popup" />
							<div class="input-field one">
								<i class="fas fa-user"></i>
								<input type="text" placeholder="Username" name="username" class="username-popup" required />
							</div>
							<div class="input-field two">
								<i class="fas fa-envelope"></i>
								<input type="text" placeholder="Email" name="email" class="email-popup" required />
							</div>
							<div class="radio-field">
								<label>
									<input type="radio" name="admin" value='1' class="admin-popup" />
									<span class="design"></span>
									<span class="text">Admin</span>
								</label>

								<label>
									<input type="radio" name="admin" value='0' class="user-popup" />
									<span class="design"></span>
									<span class="text">Utilisateur</span>
								</label>
							</div>
							<div id="errorPop"></div>
							<div class="buttonsP">
								<input id="sauvegarderB" name="update" type="submit" class="btn" value="Sauvegrader" />
								<input name="delete" type="submit" class="btn" value="Supprimer" />
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		<!--main container end-->
	</div>
	<!--wrapper end-->
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
	<script src="<?php echo URLROOT ?>/public/js/sidebar.js"></script>
	<script src="<?php echo URLROOT ?>/public/js/theme.js"></script>
	<script src="<?php echo URLROOT ?>/public/js/profile.js"></script>

</body>

</html>