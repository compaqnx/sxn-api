<?php
require_once('includes/init.php');
$general->logged_in_protect();

if (empty($_POST) === false) {

	$username = trim($_POST['username']);
	$password = trim($_POST['password']);

	if (empty($username) === true || empty($password) === true) {
		$errors[] = 'Sorry, but we need your username and password.';
	} else if ($users->user_exists($username) === false) {
		$errors[] = 'Sorry that username doesn\'t exists.';
	} else if ($users->email_confirmed($username) === false) {
		$errors[] = 'Sorry, but you need to activate your account. 
					 Please check your email.';
	} else {
		if (strlen($password) > 18) {
			$errors[] = 'The password should be less than 18 characters, without spacing.';
		}
		$login = $users->login($username, $password);
		if ($login === false) {
			$errors[] = 'Sorry, that username/password is invalid';
		}else {
			session_regenerate_id(true);// destroying the old session id and creating a new one
			$_SESSION['id'] =  $login;
			header('Location: home');
			exit();
		}
	}
} 
?>
<!--
Include html header
-->
<?php $title = TITLE_LOGIN; ?>
<?php require_once(DIR_TEMPLATE . $template . "/layout/header.php"); ?>

<body>	
	<div id="container">
	<?php require_once(DIR_TEMPLATE . $template . "/menu/menu.php"); ?>

		<h1>Login</h1>

		<?php 
		if(empty($errors) === false){
			echo '<p>' . implode('</p><p>', $errors) . '</p>';	
		}
		?>

		<form method="post" action="">
			<h4><?=USER?></h4>
			<input type="text" name="username" value="<?php if(isset($_POST['username'])) echo htmlentities($_POST['username']); ?>" />
			<h4><?=PASS?></h4>
			<input type="password" name="password" />
			<br>
			<input type="submit" name="submit" />
		</form>
		<br>
		<a href="confirm-recover.php"><?=FORGOT_USERNAME?></a>

	</div>
</body>
</html>
