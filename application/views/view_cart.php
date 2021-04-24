<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php
     foreach ($this->cart->contents() as $item):
			echo form_hidden('cart['. $item['id'] .'][id]', $item['id']);
			echo form_hidden('cart['. $item['id'] .'][rowid]', $item['rowid']);
			echo form_hidden('cart['. $item['id'] .'][name]', $item['name']);
			echo form_hidden('cart['. $item['id'] .'][price]', $item['price']);
			echo form_hidden('cart['. $item['id'] .'][qty]', $item['qty']);

	endforeach;
		?>
</body>
</html>