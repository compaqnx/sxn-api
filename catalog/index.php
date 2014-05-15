<?php 
require_once('includes/init.php');
$general->logged_in_protect();
//~ storing the user's username after clearning for any html tags.
$username 	= htmlentities($user['username']);
?>
<!--
Include html header
-->
<?php $title = TITLE_INDEX; include 'includes/header.php' ?>

<body>	
	<div id="container">
		<div id="header">
			<?php include 'includes/top.php'; ?>
		</div>
		<div id="menu">
			<?php include 'includes/menu/menu.php'; ?>
		</div>
		<div id="clear"></div>
		
		<?php if ( $general->global_config_db('layout') == "2c" ) { ?>
			<div id="left">
				Left
			</div>
		<?php } ?>
		
		<div id="content">
					
		<!-- featured products div -->
		<?php if ( $general->global_config_db('promotions') == 1 ) { ?>
			<?php include "modules/products/promo.php"; ?>
		<?php } ?>
		<!-- end featured products div -->

		<!-- latest products div -->
		<?php if ( $general->global_config_db('latest') == 1 ) { ?>
			<?php include "modules/products/latest.php"; ?>
		<?php } ?>
		<!-- latest products div -->
		
		</div> <!-- end content div -->
				
		
	</div>
</body>
</html>
