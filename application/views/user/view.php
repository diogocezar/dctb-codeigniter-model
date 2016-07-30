<div class="container">
	<div class="row">
		<div class="col-lg-12">
			<h1>{name_value}</h1>
			<p>{email_value}</p>
			<div class="box">
				<a href="{link_back}"><button class="btn btn-md btn-primary">Back</button></a>
				<?php if(Utility::is_logged()) : ?>
					<a href="{link_edit}"><button class="btn btn-md btn-primary">Edit</button></a>
					<a href="{link_delete}"><button class="btn btn-md btn-danger">Delete</button></a>
				<?php endif; ?>
			</div>
		</div>
	</div>
</div>