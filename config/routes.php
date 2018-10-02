<?php
return array(
	'/product/([0-9]+)' => 'product/product/$1',
	'/([0-9]+)' => 'product/index/$1',
	'/news' => 'news/list',
	'/([a-zA-Z/]+)' => 'error/notfound',
	'/' => 'product/index');
