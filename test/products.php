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
		<?php //include '../furnizor/includes/menu/menu.php'; ?>
		
		
		<div id="atribute">
			<h2><?php echo "TEST - produse"; ?></h2>
			
			
					<?php 
						//~ $filter = filter after incoming atribute ID
						$table = 'products';
						
						//~ $filter = array('id_product_group', htmlspecialchars($_GET['product_group_id']));
						$filter = array('id_product_group', htmlspecialchars($_GET['product_group_id']));
						$res = array();
						$res = $client->client_select_generic($table, $filter); 
						
						echo PRODUCT_DETAILS . '<hr />';
						
						foreach ( $res as $vals ):							
							echo '<a href="products.php?product_group_id='.$vals['id'].'"><b>' . $vals['product_name'].'</b>: <i>'.$vals['product_desc'].'</i></a><br>';
						endforeach;
						
						//~ Comanda: daca esti logat
						 if(empty($errors) === true){ 
							echo BUY_NOW;
						} if(empty($errors) === false){
							echo '<p>'. htmlentities($errors) . '</p>';
						}					
					?>		
		</div>
		
	</div>
</body>
</html>

