<div class="container">
	<div class="row">
		<div class="col-lg-12">
			<h1>{title}</h1>
			<?php if(Utility::is_logged()) : ?>
				<div class="box">
					<a href="{link_add}"><button class="btn btn-md btn-primary">Add</button></a>
				</div>
			<?php endif; ?>
			<div class="list-group">
				{news}
					<a href="{link_view}" class="list-group-item">{title}</a>
				{/news}
			</div>
		</div>
	</div>
</div>