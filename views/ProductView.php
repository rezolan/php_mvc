<div class = "container">
	<aside class="categories">
		<ul>
			<li><a href="/">All</a></li>
			<? foreach($categories as $cat) { ?>
			<li><a href="/<?=$cat['id'];?>"><?=$cat['name'];?></a></li>
			<?}?>
		</ul>
	</aside>
	<section class="content">
		<? foreach($products as $product) { ?>
		<article>
			<img src="<?=$product['img'];?>" alt="<?=$product['name']; ?>"/>
			<h2>
				<a href="/product/<?=$product['id']; ?>">
					<?=$product['brand'].' '.$product['name']; ?>
				</a>
			</h2>
			<h3>
				<?=$product['category_name'];?>
			</h3>
			<span class="price">
				<?=$product['price'].' $';?>
			</span>
			<?
			if($product['is_available']) {
			 	echo "<span class='available' style='color:green'>Available</span>";
			}else {
				echo "<span class='available' style='color:red'>Not Available</span>";}?>
		</article>
		<? } ?>
	</section>
</div>