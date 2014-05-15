<?php 
require_once('includes/init.php');
/*check if login*/
if ( $general->logged_in() === false ){
	$errors = ERROR_NO_LOGIN;
} else {
	$id_user = $_SESSION['id'];
}

if (isset($_POST['submit-atribute'])) {

	if(empty($_POST['atribute_name'])){
		$errors[] = ALL_FIELDS_MANDATORY;
	} else {
        
        if ($catalog->add_atribute($_POST['atribute_user'], $_POST['atribute_name'], $_POST['atribute_desc'] ) === false) {
            $errors[] = ERROR_ADDING_ATRIBUTE;
        }       
	}

	if(empty($errors) === true){		
		header('Location: atribute.php?success');
		exit();
	}
}
?>
<!--
Include html header
-->
<?php $title = TITLE_ADD_ATRIBUTE; include 'includes/header.php' ?>

<body>	
	<div id="container">
		<?php include 'includes/menu/menu.php'; ?>
		<div id="succes">
			<?php
				if (isset($_GET['success']) && empty($_GET['success'])) {
				  echo ATRIBUTE_ADDED;
				}
			?>
		</div>
		
		<div id="atribute">
			<h2><?php echo ADD_ATRIBUTE; ?></h2>
			<hr />
			
			<?php if(empty($errors) === true){ ?>

			<h4><?php echo EXISTING_ATRIBUTES; ?></h4>
			<select name='existing-atributes'>
				<?php 
						$db_table = 'atribute';
						$res = array();
						$res = $catalog->catalog_select_products_generic($db_table); 
						
						foreach ( $res as $vals ):
							echo '<option value="'.$vals['id'].'">' . $vals['atribute_name'].'</option>';
						endforeach;
					?>
			</select>
			<hr />
				
			<form method="post" action="">				
				<h4><?php echo ATRIBUTE_NAME; ?></h4>
				<input type="hidden" name="atribute_user" value="<?php echo $id_user; ?>"/>
				<input type="text" name="atribute_name" />
				<h4><?php echo ATRIBUTE_DESC; ?></h4>
				<input type="text" name="atribute_desc" />			
				<br>
				<input type="submit" name="submit-atribute" value="<?php echo ATRIBUTE_BUTON; ?>" />
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
