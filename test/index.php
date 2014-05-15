<?php 
require '../_core/init.php';
/*check if login*/
if ( $general->logged_in() === false ){
	$errors = ERROR_NO_LOGIN;
} else {
	$id_user = $_SESSION['id'];
}

?><!--
Include html header
-->
<?php $title = TITLE_CATALOG; include 'header.php' ?>

<body>	
	<div id="container">
		<?php //include '../catalog/includes/menu/menu.php'; ?>
		
		
		<div id="atribute">
			<h2><?php echo "TEST - produse"; ?></h2>
			
			<?php if(empty($errors) === true){ ?>
					<?php 
						$table = 'atribute';
						$res = array();
						$res = $client->client_select_generic($table); 
						
						foreach ( $res as $vals ):
							echo '<a href="product-group.php?atribute_id='.$vals['id'].'">' . $vals['atribute_name'].'</a><br>';
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
