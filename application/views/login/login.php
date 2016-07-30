<div class="container">
	<div class="row">
		<div class="col-lg-12">
			<form class="form-signin" role="form" method="post" action="{action_login}">
				<h2 class="form-signin-heading">Please Login</h2>
				<div class="form-group">
					<label for="id_name">User</label>
					<input type="text" class="form-control" placeholder="Email address" required autofocus name="user" id="user">
				</div>
				<div class="form-group">
					<label for="id_name">Password</label>
					<input type="password" class="form-control" placeholder="Password" required name="pass" id="pass">
				</div>
				<div class="box-footer">
	            	<button class="btn btn-md btn-primary" type="submit">Login</button>
	          	</div>
				<?php if (@Utility::has_error($error)) : ?>
					<div class="alert alert-danger" role="alert" style="margin-top: 10px;">{error}</div>
				<?php endif; ?>
			</form>
		</div>
	</div>
</div>