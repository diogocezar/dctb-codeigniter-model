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
				<label for="id_name">Title</label>
				<input type="input" class="form-control" placeholder="Title" name="title" id="title" value="{title_value}">
			</div>
			<div class="form-group">
				<label for="id_name">Text</label>
				<textarea class="form-control" placeholder="Text" name="text" id="text">{text_value}</textarea>
			</div>
			<div class="box-footer">
	        	<button class="btn btn-md btn-primary" type="submit">Save</button>
	        	<a href="{link_back}"><button class="btn btn-md btn-danger" type="button">Back</button></a>
	      	</div>
			</form>
		</div>
	</div>
</div>