<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{title}</title>
	<link rel="stylesheet" type="text/css" href="{asset_url}css/src/bootstrap/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="{asset_url}css/src/style.css">
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="{home_link}">{name}</a>
			</div>

			<div class="collapse navbar-collapse">
			<ul class="nav navbar-nav">
				<li><a href="{home_link}">Home</a></li>
				<li><a href="{about_link}">About</a></li>
				<li><a href="{news_link}">News</a></li>
				<?php if(Utility::is_logged()) : ?>
					<li><a href="{user_link}">Users</a></li>
				<?php endif; ?>
			</ul>
			<ul class="nav navbar-nav navbar-right">
			<?php if(Utility::is_logged()) : ?>
				<li><a href="{logout_link}">Logout</a></li>
			<?php else: ?>
				<li><a href="{login_link}">Login</a></li>
			<?php endif; ?>
			</ul>
			</div>
		</div>
	</nav>