<div id="latest">
	<h2><?=TITLE_LATEST?></h2>
	<?php 
		$db_table = 'products';
		$filter = array('promotional',1);
		$res = array();
		$res = $catalog->catalog_select_products_generic($db_table); 

		foreach ( $res as $vals ):
			echo "<div class='list'>";
			echo "<img src=". BASE_URL . $vals['img'] ." width='75' align='left' title='".NO_IMAGE."' />";
			echo $vals['product_name'].'<br>';
			echo $vals['product_desc'].'<hr>';
			echo "<span class='obs'>";
				echo $vals['date_added'].'<br>';
			echo "</span>";
			echo "</div>";
		endforeach;
		?>		
</div>
