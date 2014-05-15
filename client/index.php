<?php 
require_once('includes/init.php');
$general->logged_in_protect();

?>
<!--
Include html header
-->
<?php $title = TITLE_INDEX; include 'includes/header.php' ?>

<body>	
	<div id="container">
		<?php include 'includes/menu/menu.php'; ?>

		<h1>Welcome to our site!</h1>
	</div>
</body>
</html>
