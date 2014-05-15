<?php 
require_once('includes/init.php');
/*check if login*/
if ( $general->logged_in() === false ){
	$errors = ERROR_NO_LOGIN;
} else {
	$id_user = $_SESSION['id'];
}

if (isset($_POST['submit-product-group'])) {

	if(empty($_POST['product_group_name'])){
		$errors[] = ALL_FIELDS_MANDATORY;
	} else {
        
        if ($catalog->add_product_group($_POST['product_group_user'], $_POST['product_group_name'], $_POST['product_group_desc'], $_POST['select-atribute'] ) === false) {
            $errors[] = ERROR_ADDING_PROD_GROUP;
        }       
	}

	if(empty($errors) === true){		
		header('Location: product-group.php?success');
		exit();
	}
}

?>
<!--
Include html header
-->
<?php $title = TITLE_ADD_PG; include 'includes/header.php' ?>

<body>	
	<div id="container">
		<?php include 'includes/menu/menu.php'; ?>
		<div id="succes">
			<?php
				if (isset($_GET['success']) && empty($_GET['success'])) {
				  echo PRODUCT_GROUP_ADDED;
				}
			?>
		</div>
		
		<div id="atribute">
			<h2><?php echo ADD_PRODUCT_GROUP; ?></h2>
			
			<?php if(empty($errors) === true){ ?>

			<form method="post" action="">
				<h4><?php echo PRODUCT_GROUP_NAME; ?></h4>
				<input type="hidden" name="product_group_user" value="<?php echo $id_user; ?>"/>
				<input type="text" name="product_group_name" />
				<h4><?php echo PRODUCT_GROUP_DESC; ?></h4>
				<input type="text" name="product_group_desc" />			
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
				<h4><?php echo AVAILABILITY; ?></h4>
				<label for="from">De la:</label>				
				<input type="text" name="from" />
				<label for="from">Pana la:</label>
				<input type="text" name="to" />
				<hr>
				<input type="submit" name="submit-product-group" value="<?php echo PRODUCT_GROUP_BUTON; ?>" />
			</form>			
		</div>
		<?php 
		} if(empty($errors) === false){
			echo '<p>'. htmlentities($errors) . '</p>';	
		}
		?>

	</div>
</body>
</html>
