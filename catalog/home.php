<?php 
require_once('includes/init.php');

$general->logged_out_protect();
//~ storing the user's username after clearning for any html tags.
$username 	= htmlentities($user['username']);
?>
<?php $title = 'Pagina 1'; include 'includes/header.php' ?>
<body>	
	<div id="container">
		<div id="header">
			<?php include 'includes/top.php'; ?>
		</div>
		<div id="menu">
			<?php include 'includes/menu/menu.php'; ?>
		</div>
		<div id="clear"></div>
		<div id="content">
		<h1> <?=SALUT?> <i><?=$username. '!'?></i> </h1>
		<h2> <a href="<?=BASE_URL?>"><?=CATALOG_LINK?></a> </h2>
		
		<!-- featured products div -->
		<?php if ( $general->global_config_db('promotions') == 1 ) { ?>
			<h3><?=PROMOTIONAL_PRODUCTS_BROWSE?></h3>
			<?php include "modules/products/promo.php"; ?>
		<?php } ?>
		<!-- end featured products div -->
		
		</div> <!-- end content div -->
				
		
	</div>
</body>
</html>
