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
			<li><a href="<?php echo site_url('/news/create') ?>">News Create</a></li>
		</ul>
	</nav>
	<h1>
		<?php echo $title; ?>
	</h1>