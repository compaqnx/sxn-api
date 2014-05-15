<?php 
require_once('includes/init.php');

$general->logged_out_protect();
//~ storing the user's username after clearning for any html tags.
$username 	= htmlentities($user['username']);
?>
<?php $title = 'Pagina 1'; include 'includes/header.php' ?>
<body>	
	<div id="container">
		<?php include 'includes/menu/menu.php'; ?>
		
		<h1>Hello <?php echo $username, '!'; ?></h1>
		
	</div>
</body>
</html>
