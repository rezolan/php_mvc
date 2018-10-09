<div class="form">
	<? echo $this->user; ?>
	<form action="/login" method="post">
		<input type="email" name="email_auto" placeholder="Email" value=<?=$loginEmail?>><br>
		<input type="password" name="password_auto" placeholder="Password" value=<?=$loginPassword?>><br>
		<input type="submit" name="submit_auto" value="Submit"><br>
	</form>
</div>