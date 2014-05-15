<!-- featured products div -->
<?php if ( $general->modules_config_db('promo') == 1 ) { ?>
<?php include "modules/products/promo.php"; ?>
<?php } ?>
<!-- end featured products div -->

<!-- latest products div -->
<?php if ( $general->modules_config_db('latest') == 1 ) { ?>
<?php include "modules/products/latest.php"; ?>
<?php } ?>
<!-- latest products div -->
