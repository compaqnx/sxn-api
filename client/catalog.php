<?php 
require_once('includes/init.php');
/*check if login*/
if ( $general->logged_in() === false ){
	$errors = ERROR_NO_LOGIN;
} else {
	$id_user = $_SESSION['id'];
}
?>
<!--
Include html header
-->
<?php $title = TITLE_CATALOG; include 'includes/header.php' ?>

<body>	
	<div id="container">
	<?php include 'includes/menu/menu.php'; ?>
	
	<h2><?php echo CATALOG_PAGE; ?></h2>
	
	<?php if(empty($errors) === true){ ?>
			<!-- Build catalog links -->
		<div id="wrap-links" style="border:1px solid #999; padding:5px;">
			<ul>
				<li><a href="atribute"> <?php echo ADD_ATRIBUTE; ?> </a></li>
				<li><a href="add-manufacturer"> <?php echo TITLE_ADD_MANUFACT; ?> </a></li>
				<li><a href="product-group"> <?php echo ADD_PRODUCT_GROUP; ?> </a></li>
				<li><a href="add-product"> <?php echo ADD_PRODUCT; ?> </a></li>				
			</ul>
		</div>
	<?php }
		else if(empty($errors) === false){
			echo '<p>'. $errors . '</p>';
		}
	?>

	</div>
</body>
</html>
