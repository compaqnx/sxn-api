<div id="promo">
	<h2><?=TITLE_PROMO?></h2>
	<?php 
		$db_table = 'products';
		$filter = array('promotional',1);
		$res = array();
		$res = $catalog->catalog_select_products_generic($db_table, $filter,NULL);

		foreach ( $res as $vals ):
			echo "<div class='list'>";
			echo "<a href='product-description.php?product=".$general->clear_spaces($vals['product_name'])."&id=".$vals['id']."'>";
			echo "<img src=". BASE_URL . $vals['img'] ." width='75' align='left' title='".$vals['product_name']."' alt='".$vals['product_name']."' />";			
			echo strtoupper($vals['product_name']).'<br>';
			echo "</a>";
			echo $vals['product_desc'].'<br>';
			echo "<span class='obs'>";
				echo $vals['date_added'].'<br>';
			echo "</span>";
			echo "<hr />";
			//~ Product details button
			echo "<span class='buton'>";
			echo "<a href='product-description.php?product=".$general->clear_spaces($vals['product_name'])."&id=".$vals['id']."'>";
			echo PRODUCT_DETAIL_BUTTON;
			echo "</a>";
			echo "</span>";
			//~ Add to cart button
			echo "<span class='buton'>";
			echo "<a href='add-cart.php?product=".$general->clear_spaces($vals['product_name'])."&id=".$vals['id']."'>";
			echo ADD_TO_CART_BUTTON;
			echo "</a>";
			echo "</span>";
			echo "</div>";
		endforeach;
	?>		
</div>
