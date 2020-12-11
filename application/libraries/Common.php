<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
 AUTHOR : Shivaji Dalvi 
 Date : 15.01.2020
 */
class Common
{

	function encrypt_decrypt($action, $string)
	{
		$output = false;

		$key = 'aci#1234';

		// initialization vector
		$iv = md5(md5($key));

		if ($action == 'encrypt') {
			$output = @mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5($key), $string, MCRYPT_MODE_CBC, $iv);
			$output = base64_encode($output);
		} else if ($action == 'decrypt') {
			$output = @mcrypt_decrypt(MCRYPT_RIJNDAEL_256, md5($key), base64_decode($string), MCRYPT_MODE_CBC, $iv);
			$output = rtrim($output, "");
		}
		//echo $output;exit; 
		return $output;
	}


}	