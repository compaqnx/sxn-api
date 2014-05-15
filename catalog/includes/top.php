<?
echo "<span class='obs'>";
if ( isset($user) )
	echo WELCOME . $user['username'];
else
	echo WELCOME_GUEST;
echo "</span>";
?>
