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
		
		<?php if ( $general->global_config_db('main_menu') == 1 ) { ?>
		<div id="menu">
			<?php require_once('includes/menu/menu.php'); ?>
		</div>
		<?php } ?>
		
		<div id="clear"></div>
		
		<div id="wrap">

		<?php if ( $general->global_config_db('layout') == "2c" ) { ?>
			<div id="left">
				<?php require_once(DIR_TEMPLATE . $template . "/layout/left.php"); ?>
			</div>
		<?php } ?>
		
		<?php if ( $general->global_config_db('layout') == "3c" ) { ?>
			<div id="left">
				<?php require_once(DIR_TEMPLATE . $template . "/layout/right.php"); ?>
			</div>
		<?php } ?>
		
		<div id="content">
			<?php require_once(DIR_TEMPLATE . $template . "/layout/content.php"); ?>		
		</div> <!-- end content div -->
		</div>
		
	</div>
</body>
</html>
