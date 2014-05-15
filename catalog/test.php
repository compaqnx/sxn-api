<?php 
require '../_core/init.php';
/*check if login*/
if ( $general->logged_in() === false ){
	$errors = ERROR_NO_LOGIN;
} else {
	$id_user = $_SESSION['id'];
}

?>
<?php $title = TITLE_CATALOG; include 'includes/header.php' ?>
<body>	
	<div id="container">
		<?php include 'includes/menu/menu.php'; ?>
		
		
		<div id="atribute">
			<h2><?php echo "TEST - produse"; ?></h2>
			
			<?php if(empty($errors) === true){ ?>
					<?php 
						$db_table = 'products';
						//~ $filter = array('id_atribute',7);
						$filter = array('id_product_group',3);
						$res = array();
						$res = $catalog->catalog_select_products_generic($db_table, $filter); 
						
						foreach ( $res as $vals ):
							echo $vals['product_name'].'<br>';
						endforeach;
					?>		
		</div>
		<?php 
		} if(empty($errors) === false){
			echo '<p>'. htmlentities($errors) . '</p>';	
		}
		?>

	</div>
</body>
</html>
