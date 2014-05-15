<ul>
	<li><a href="index">Home</a></li>
	<?php 
/* scoase .php din linkuri cu .htaccess */
	if($general->logged_in()){?>
		<li><a href="members">Members</a></li>
		<li><a href="profile.php?username=<?php echo $user['username'];?>">Profile</a></li>
		<li><a href="settings">Settings</a></li>
		<li><a href="catalog"><?php echo CATALOG_PAGE; ?></a></li>
		<!--
		<li><a href="product-group"><?php echo ADD_PRODUCT_GROUP; ?></a></li>		
		<li><a href="atribute"><?php echo ADD_ATRIBUTE; ?></a></li>
		-->
		<li><a href="change-password">Change password</a></li>
		<li><a href="logout">Log out</a></li>
		<li><a href="test">TEST</a></li>
	<?php
	}else{?>
		<li><a href="register">Register</a></li>
		<li><a href="login">Login</a></li>
	<?php
	}
	?>
</ul>
<hr />
