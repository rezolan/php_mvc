<?php
return array(
	'/news/list/([0-9]+)' => 'news/list/$1',
	'/news/list' => 'news/list',
	'/news' => 'news/index',
	'/products' => 'product/list',
	'/article/([0-9]+)' => 'article/index/$1',
	'/article' => 'article/index',
	'/article/show' => 'article/show',
	'/card' => 'card/index',
	'/card/buy' => 'card/buy',
	'/' => 'news/index');
