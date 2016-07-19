<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Página <?php echo $title; ?></title>
</head>
<body>
	<nav>
		<ul>
			<li><a href="<?php echo site_url('/') ?>">Home</a></li>
			<li><a href="<?php echo site_url('/about') ?>">About</a></li>
			<li><a href="<?php echo site_url('/news') ?>">News</a></li>
			<?php
			$logged = $this->session->get_userdata("logged");
			if(isset($logged['logged']) && $logged['logged'] == 1){
			?>
				<li><a href="<?php echo site_url('/news/create') ?>">News Create</a></li>
				<li><a href="<?php echo site_url('/login/logout') ?>">Logout</a></li>
			<?php } else { ?>
				<li><a href="<?php echo site_url('login') ?>">Login</a></li>
			<?php } ?>
		</ul>
	</nav>
	<h1>
		<?php echo $title; ?>
	</h1>