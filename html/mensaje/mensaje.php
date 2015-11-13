<div class="row">
	<div class="col-lg-6 col-lg-offset-3">
		<br>
		<?php
		if (isset($_GET['m'])) {
			if ($_GET['m'] == 1) {
		?>
				<div class="alert alert-dismissible alert-success">
					<button type="button" class="close" data-dismiss="alert"><span class="glyphicon glyphicon-remove-circle"></span></button>
					<strong>Los datos se <?=$_GET['a']?> satisfactoriamente.</strong>
				</div>
		<?php				
			} elseif ($_GET['m'] == 2) {
		?>
				<div class="alert alert-dismissible alert-danger">
					<button type="button" class="close" data-dismiss="alert"><span class="glyphicon glyphicon-remove-circle"></span></button>
					<strong>No se ejecuto la acción, ya que: <?=$_GET['e']?>.</strong>
				</div>
		<?php
			}
		}
		?>
	</div>
</div>