<?php require_once('includes/init.php'); ?>
<div id="latest">
	<h2><?=TITLE_PRODUCT_DESCRIPTION?></h2>
	<?php		
		$res = array();
		$product_id = $_GET['id'];
		$res = $catalog->product_detail($product_id); 

		foreach ( $res as $vals ):
			echo "<div class='list'>";
			echo "<img src=". BASE_URL . $vals['img'] ." width='75' align='left' title='".$vals['product_name']."' alt='".$vals['product_name']."' />";
			echo $vals['product_name'].'<br>';
			echo $vals['product_desc'].'<hr>';
			echo "<span class='obs'>";
				echo $vals['date_added'].'<br>';
			echo "</span>";
			echo "</div>";
		endforeach;
		?>		
</div>
