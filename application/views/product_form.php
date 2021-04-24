<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<form method="POST" action="<?php echo base_url() ?>add_cart">
	<div>
		<label>id</label>
		<input type="number" name="id" min="1">
	</div>

	<div>
		<label>name</label>
		<input type="text" name="name">
	</div>

	<div>
		<label>price</label>
		<input type="number" name="price" min="1">
	</div>

	<div>
		<label>qty</label>
		<input type="number" name="qty" min="1">
	</div>

	<input type="submit" name="submit">

</form>
</body>
</html>