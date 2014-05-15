<?php 
require_once('includes/init.php');
/*check if login*/
if ( $general->logged_in() === false ){
	$errors = ERROR_NO_LOGIN;
} else {
	$id_user = $_SESSION['id'];
}

if (isset($_POST['submit-manufact'])) {

	if(empty($_POST['manufact_name'])){
		$errors[] = ALL_FIELDS_MANDATORY;
	} else {
        
        if ( $catalog->add_manufacturer($_POST['manufact_user'], $_POST['manufact_name'] ) === false) {
            $errors[] = ERROR_ADDING_MANUFACT;
        }       
	}

	if(empty($errors) === true){		
		header('Location: add-manufacturer.php?success');
		exit();
	}
}

?>
<?php $title = TITLE_ADD_MANUFACT; include 'includes/header.php' ?>

<body>	
	<div id="container">
		<?php include 'includes/menu/menu.php'; ?>
		<div id="succes">
			<?php
				if (isset($_GET['success']) && empty($_GET['success'])) {
				  echo MANUFACT_ADDED;
				}
			?>
		</div>
		
		<div id="atribute">
			<h2><?php echo TITLE_ADD_MANUFACT; ?></h2>
			
			<?php if(empty($errors) === true){ ?>

			<form method="post" action="">
				<h4><?php echo MANUFACT_NAME; ?></h4>
				<input type="hidden" name="manufact_user" value="<?php echo $id_user; ?>"/>
				<input type="text" name="manufact_name" />				
				<br>
				<input type="submit" name="submit-manufact" value="<?php echo MANUFACT_BUTON; ?>" />
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
