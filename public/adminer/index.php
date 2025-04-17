<?php
// function adminer_object() {
// 	include_once "./adminer-plugins/login-password-less.php";
// 	return new Adminer\Plugins(array(
// 		// TODO: inline the result of password_hash() so that the password is not visible in source codes
// 		new AdminerLoginPasswordLess(password_hash("YOUR_PASSWORD_HERE", PASSWORD_DEFAULT)),
// 	));
// }

require_once('adminer-plugins/login-password-less.php');

return new AdminerLoginPasswordLess(password_hash($_ENV["ADMINER_PASSWORD"], PASSWORD_DEFAULT));

include "./adminer007.php";
