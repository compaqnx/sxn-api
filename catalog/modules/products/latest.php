<div id="latest">
	<h2><?=TITLE_LATEST?></h2>
	<?php 
		$db_table = 'products';
		$filter = array('promotional',1);
		$res = array();
		$res = $catalog->catalog_select_products_generic($db_table, NULL, 3); 

		foreach ( $res as $vals ):
			echo "<div class='list'>";
			echo "<a href='product-description.php?product=".$general->clear_spaces($vals['product_name'])."&id=".$vals['id']."'>";
			echo "<img src=". BASE_URL . $vals['img'] ." width='75' align='left' title='".$vals['product_name']."' alt='".$vals['product_name']."' />";			
			echo $vals['product_name'].'<br>';
			echo "</a>";
			echo $vals['product_desc'].'<hr>';
			echo "<span class='obs'>";
				echo $vals['date_added'].'<br>';
			echo "</span>";
			echo "</div>";
		endforeach;
		?>		
</div>
