<?php 
require_once('includes/init.php');

$general->logged_out_protect();
//~ storing the user's username after clearning for any html tags.
$username 	= htmlentities($user['username']);
?>
<?php $title = isset($username) ? $username.TITLE_ACCOUNT : "&raquo;".TITLE_ACCOUNT; ?>
<?php require_once(DIR_TEMPLATE . $template . "/layout/header.php"); ?>
<body>	
	<div id="container">
		<div id="header">
			<?php require_once(DIR_TEMPLATE . $template . "/layout/top.php"); ?>
		</div>
		<div id="menu">
			<?php require_once(DIR_TEMPLATE . $template . "/menu/menu.php"); ?>
		</div>
		<div id="clear"></div>
		<div id="content">
		<h1> <?=SALUT?> <i><?=$username. '!'?></i> </h1>
		<h2> <a href="<?=BASE_URL?>"><?=CATALOG_LINK?></a> </h2>
		
		<!-- featured products div -->
		<?php if ( $general->modules_config_db('promo') == 1 ) { ?>
			<h3><?=PROMOTIONAL_PRODUCTS_BROWSE?></h3>
			<?php include "modules/products/promo.php"; ?>
		<?php } ?>
		<!-- end featured products div -->
		
		</div> <!-- end content div -->
				
		
	</div>
</body>
</html>
