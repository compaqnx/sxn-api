<?php 
require_once('includes/init.php');
$general->logged_out_protect();
$members 		=$users->get_users();
$member_count 	= count($members);
?>
<?php $title = TITLE_ALL_USERS; include 'includes/header.php' ?>
<body>	
	<div id="container">
		<?php include 'includes/menu/menu.php';?>
		<h1><?=TITLE_ALL_USERS?></h1>
		<p>We have a total of <strong><?php echo $member_count; ?></strong> registered users. </p>

		<?php 

		foreach ($members as $member) {
			$username = htmlentities($member['username']);
			?>

			<p><a href="profile.php?username=<?php echo $username; ?>"><?php echo $username?></a> joined: <?php echo date('F j, Y', $member['time']) ?></p>
			<?php
		}

		?>

	</div>
</body>
</html>
