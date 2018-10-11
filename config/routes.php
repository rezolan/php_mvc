<?php
return array(
	'/admin/addPost' => 'admin/addPost',
	'/admin' => 'admin/index',
	'/blog/comment/([0-9]+)' => 'blog/addComment/$1',
	'/blog' => 'blog/list',
	'/exit' => 'registration/destroy',
	'/login' => 'registration/autorisation',
	'/registration' => 'registration/register',
	'/product/([0-9]+)' => 'product/product/$1',
	'/([0-9]+)/page-([0-9]+)' => 'product/index/$1/$2',
	'/page-([0-9]+)' => 'product/index//$1',
	'/([0-9]+)' => 'product/index/$1',
	'/news' => 'news/list',
	'/[a-zA-Z/0-9\-.]+' => 'error/notfound',
	'/' => 'product/index');
