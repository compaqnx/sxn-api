<?php 
require '../_core/init.php';
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
<?php $title = TITLE_CATALOG; include 'header.php' ?>

<body>	
	<div id="container">
		<?php //include '../furnizor/includes/menu/menu.php'; ?>
		
		
		<div id="atribute">
			<h2><?php echo "TEST - produse"; ?></h2>
			
			<?php if(empty($errors) === true){ ?>
					<?php 
						if ( isset($table_prefix) ) $users_table = $table_prefix.'users'; else $users_table = 'users';
						//~ $filter = filter after incoming atribute ID
						$table = 'product_group';
						$filter = array('id_atribute', htmlspecialchars($_GET['atribute_id']));
						$res = array();
						$res = $client->client_select_generic($table, $filter); 
						
						foreach ( $res as $vals ):
							echo '<div id="product-frame">';
							//~ find details about publisher (restaurant owner)
							$published_by = $client->client_show_details($users_table, $vals['id_user']);
							
							echo '<a href="products.php?'.$general->seoUrl($vals['product_group_name']).'&product_group_id='.$vals['id'].'">' . $vals['product_group_name'].'</a>';
							echo '<p class="obs">* '.$vals['product_group_desc'].'</p>';
							echo '<p class="obs">' . PUBLISHED_BY . '<a href="user_details.php?id_user='.$vals['id_user'].'"><b> * '. '<img src=' . DIR_AVATARS. $published_by['image_location'] . ' width="45" align="left" />' . $published_by['username'] . '</b></a></p>';
							echo '</div>';
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
