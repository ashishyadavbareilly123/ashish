<?php
$config = [
	//add_article_rules form ka name h
	'add_product' => [
		[
			'field' => 'fld_product_name',
			'lable' => 'product',
			'rules' => 'required',
		],
		[
			'field' => 'fld_total_stock',
			'lable' => 'stock',
			'rules' => 'required',
		],
		[
			'field' => 'fld_product_price',
			'lable' => 'price',
			'rules' => 'required',
		],
		[
			'field' => 'fld_product_desc',
			'lable' => 'description',
			'rules' => 'required',
		],
	],
	'login_rules' => [
		[
			'field' => 'username',
			'lable' => 'Username',
			'rules' => 'required',
		],
		[
			'field' => 'password',
			'lable' => 'Password',
			'rules' => 'required',
		],
	],
	'article_register_rules' => [
		[
			'field' => 'username',
			'lable' => 'Username',
			'rules' => 'required',
		],
		[
			'field' => 'password',
			'lable' => 'Password',
			'rules' => 'required',
		],
		[
			'field' => 'fname',
			'lable' => 'First Name',
			'rules' => 'required',
		],
		[
			'field' => 'lname',
			'lable' => 'Last Name',
			'rules' => 'required',
		],
		[
			'field' => 'email',
			'lable' => 'Email',
			'rules' => 'required|valid_email',
		],
	],
];

?>