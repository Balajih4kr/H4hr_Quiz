<?php

include 'libs/load.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<?php
    load_template('_head');
?>

</head>

<body>
	<!-- navbar_template -->
	<?php
load_template('_navbar');
?>

	<!-- landing template -->
	<?php
load_template('_login');
?>

	<!-- Script template -->
	<?php
load_template('_script');
?>
</body>

</html>