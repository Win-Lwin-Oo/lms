<?php
	function randomPassword() {
		$alpha = "abcdefghijklmnopqrstuvwxyz$&#?ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
		$pass = array();
		$alphaLength = strlen($alpha)-1;
		
		for( $i = 0; $i<8; $i++){
			$n = rand(0, $alphaLength);
			$pass[] = $alpha[$n];
		}
		return implode($pass);
	}
	
	function userName($username){
		$cap = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
		$name = array();
		$userName = "";
		
		for ($i=0;$i<strlen($username)-1;$i++){
			preg_match('/^[A-Z]+/',$username[$i],$out1);
			$userName .= implode($out1);
		}
		
		return $userName;
		
	}
	

?>