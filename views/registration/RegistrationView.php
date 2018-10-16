<div class="form">
	<div class="errors">
	<? 
	if($errors) {
		foreach($errors as $error) { ?>
			<h5><?=$error;?></h5>
	<? }} ?>
	
	</div>
	<? if($isRegistered) {
		echo "<h1>Check your email to confirm registration</h1>";
	} else { ?>
	<form action="/registration" method="post">
		<input type="text" name="text" placeholder="Login" value=<?=$name?>><br>
		<input type="email" name="email" placeholder="Email" value=<?=$email?>><br>
		<input type="password" name="password" placeholder="Password" value=<?=$password?>><br>
		<input type="submit" name="submit" value="Submit"><br>
	</form>
	<? } ?>
</div>