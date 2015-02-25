<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>Manajemen Layanan</title>
	<?php 
	foreach($css_files as $file): ?>
		<link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
	<?php endforeach; ?>
	<?php foreach($js_files as $file): ?>
    	<script src="<?php echo $file; ?>"></script>
	<?php endforeach; ?>
</head>
<body>
	<div>
        <?php echo $output; ?>
    </div>
</body>
</html>
