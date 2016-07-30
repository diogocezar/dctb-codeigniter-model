<div class="container">
	<div class="row">
		<div class="col-lg-12">
			<h1>{title}</h1>
		</div>
		<?php if (Utility::has_error($validation_errors)) : ?>
			<div class="col-lg-12">
				{validation_errors}
			</div>
		<?php endif; ?>
		<div class="col-lg-12">
			{form_open}
			<div class="form-group">
				<label for="name">Name</label>
				<input type="input" class="form-control" placeholder="Name" name="name" id="name" value="{name_value}">
			</div>
			<div class="form-group">
				<label for="email">Email</label>
				<input type="input" class="form-control" placeholder="Email" name="email" id="email" value="{email_value}">
			</div>
			<div class="form-group">
				<label for="user_type">User Type</label>
				<select class="form-control" id="user_type" name="user_type">
				{user_type}
					<option value="{id}" {selected}>{name}</option>
				{/user_type}
				</select>
			</div>
			<div class="form-group">
				<label for="password">Password</label>
				<input type="password" class="form-control" placeholder="Password" name="password" id="password">
			</div>
			<div class="box-footer">
	        	<button class="btn btn-md btn-primary" type="submit">Save</button>
	        	<a href="{link_back}"><button class="btn btn-md btn-danger" type="button">Back</button></a>
	      	</div>
			</form>
		</div>
	</div>
</div>