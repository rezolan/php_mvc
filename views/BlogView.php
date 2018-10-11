<section class="blog">
<?
$i = 0;
foreach($data as $post) {
	if ($blog_id !== $post['blog_id']) {
		if($i !== 0) {
			?>
				</section>
				<? if($_SESSION['user_id']) { ?>
					<form action="/blog/comment/<?=$blog_id;?>" method="post">
						<textarea cols="50" rows="5" name="comment"></textarea><br>
						<input type="submit"/>
					</form>
				<? } ?>
				</div>
			<?
		}
		echo '<div class="post-wrapper">';
		?>
			<article class="posts">
				<h2><?=$post['title'];?></h2>
				<p><?=$post['content'];?></p>
			</article>
			<section  class="comments">
				<article>
					<h4><?=$post['login'];?></h4>
					<p><?=$post['comment'];?></p>
				</article>
		<?
	} else {
		?>
			<article>
				<h4><?=$post['login'];?></h4>
				<p><?=$post['comment'];?></p>
			</article>
		<?
	}
	$blog_id = $post['blog_id'];
	$i++;
}
?>
</section>
	<? if($_SESSION['user_id']) { ?>
		<form action="/blog/comment/<?=$blog_id;?>" method="post">
			<textarea cols="50" rows="5" name="comment"></textarea><br>
			<input type="submit"/>
		</form>
	<? } ?>
	</div>
</section>