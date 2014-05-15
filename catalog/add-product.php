<?php 
require_once('includes/init.php');
/*check if login*/
if ( $general->logged_in() === false ){
	$errors = ERROR_NO_LOGIN;
} else {
	$id_user = $_SESSION['id'];
}

if (isset($_POST['submit-product'])) {

	if(empty($_POST['product_name']) || empty($_POST['product_desc'])){
		$errors[] = ALL_FIELDS_MANDATORY;
	} else {
        
        if ($catalog->add_products($_POST['user'], 
				$_POST['select_product_group'], 
				$_POST['product_name'], 
				$_POST['product_desc'], 
				$_POST['select-atribute'],
				$_POST['weight']			
			) === false) {
            $errors[] = ERROR_ADDING_PRODUCT;
        }       
	}

	if(empty($errors) === true){		
		header('Location: catalog.php?success');
		exit();
	}
}

?>
<?php $title = TITLE_ADD_PRODUCT; include 'includes/header.php' ?>
<body>	
	<div id="container">
		<?php include 'includes/menu/menu.php'; ?>
		<p class='bcrumbs'><?=$general->breadcrumbs()?></p>
		<div id="succes">
			<?php
				if (isset($_GET['success']) && empty($_GET['success'])) {
				  echo PRODUCT_ADDED;
				}
			?>
		</div>
		
		
		<div id="product-group">
		</div>
		<div id="product">
			<h2><?php echo ADD_PRODUCT; ?></h2>
			
			<?php if(empty($errors) === true){ ?>

			<form method="post" action="">
				<h4><?php echo LIST_ATRIBUTES; ?></h4>
				<select name="select-atribute">
					<option value="0"> <?php echo NO_ATRIBUTE; ?> </option>
					<?php 
						$atributes = array();
						$attributes = $catalog->select_all_atributes(); 
						
						foreach ( $attributes as $vals ):
							echo '<option value="'.$vals['id'].'">' . $vals['atribute_name'] . '</option>';
						endforeach;
					?>
				</select>
				<h4><?php echo LIST_PRODUCT_GROUP; ?></h4>
				<select name="select_product_group">
					<option value="0"> <?php echo NO_PGN; ?> </option>
					<?php 
						$pgn = array();
						$pgn = $catalog->select_all_product_groups(NULL, $id_user); 
						
						foreach ( $pgn as $val_pgn ):
							echo '<option value="'.$val_pgn['id'].'">' . $val_pgn['product_group_name'] . '</option>';
						endforeach;
					?>
				</select>
				<h4><?php echo PRODUCT_NAME; ?></h4>
				<input type="hidden" name="user" value="<?php echo $id_user; ?>"/>
				<input type="text" name="product_name" />
				<h4><?php echo PRODUCT_DESC; ?></h4>
				<textarea name="product_desc"></textarea>
				<h4><?php echo PRODUCT_WEIGHT; ?></h4>
				<input type="text" name="weight" />
				<hr>
				<input type="submit" name="submit-product" value="<?php echo PRODUCT_BUTON; ?>" />
			</form>
		</div>
		<?php 
		} if(empty($errors) === false){
			echo '<p>'. $errors . '</p>';	
		}
		?>

	</div>
</body>
</html>
