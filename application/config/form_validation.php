<?php 

$config=
[
	'login_rules'=>
	[
		[
			'field' => 'username',
		 	'label' => 'UserName',
			'rules' => 'required|max_length[20]'
		],
		[
			'field' => 'password',
		 	'label' => 'Password',
			'rules' => 'required|min_length[3]|max_length[20]'
		],
		
	],
	'signup_rules'=>
	[
		[
			'field' => 'username',
		 	'label' => 'UserName',
			'rules' => 'required|max_length[20]'
		],
		[
			'field' => 'password',
		 	'label' => 'Password',
			'rules' => 'required|min_length[3]|max_length[20]'
		],
		[
			'field' => 'confirm_password',
		 	'label' => 'Confirm Password',
			'rules' => 'required|min_length[3]|max_length[20]|matches[password]'
		],
		
	],
	'change_password_rules'=>
	[
		[
			'field' => 'password',
		 	'label' => 'Current Password',
			'rules' => 'required|min_length[3]|max_length[20]'
		],

		[
			'field' => 'new_password',
		 	'label' => 'New Password',
			'rules' => 'required|min_length[3]|max_length[20]|differs[password]'
		],

		[
			'field' => 'confirm_password',
		 	'label' => 'Confirm Password',
			'rules' => 'required|min_length[3]|max_length[20]|matches[new_password]'
		],
	],

];


?>